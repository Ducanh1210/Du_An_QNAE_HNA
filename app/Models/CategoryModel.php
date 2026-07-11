<?php
namespace App\Models;

class CategoryModel extends BaseModel {
    
    public function getAll() {
        $sql = "SELECT c.*, 
                       (SELECT COUNT(*) FROM products WHERE category_id = c.id) as product_count,
                       (SELECT COUNT(*) FROM news WHERE category_id = c.id) as news_count
                FROM categories c 
                ORDER BY c.type, c.sort_order ASC, c.id ASC";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function getByType($type) {
        $sql = "SELECT * FROM categories WHERE type = ? AND is_active = 1 ORDER BY sort_order ASC, id ASC";
        $this->setQuery($sql);
        return $this->loadAllRows([$type]);
    }

    public function getById($id) {
        $sql = "SELECT * FROM categories WHERE id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }

    public function create($name, $slug, $type, $sort_order = 0) {
        if ($sort_order == 0) {
            $sqlMax = "SELECT MAX(sort_order) FROM categories WHERE type = ?";
            $this->setQuery($sqlMax);
            $max = intval($this->loadRecord([$type]));
            $sort_order = $max + 1;
        }

        $sql = "INSERT INTO categories (name, slug, type, sort_order, show_home) VALUES (?, ?, ?, ?, 0)";
        $this->setQuery($sql);
        return $this->execute([$name, $slug, $type, $sort_order]);
    }

    public function update($id, $name, $slug, $type, $sort_order = 0, $show_home = 0) {
        $sql = "UPDATE categories SET name = ?, slug = ?, type = ?, sort_order = ?, show_home = ? WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$name, $slug, $type, $sort_order, $show_home, $id]);
    }

    public function delete($id) {
        $sql = "DELETE FROM categories WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }

    public function checkNameExists($name, $id = null) {
        $sql = "SELECT COUNT(*) FROM categories WHERE name = ?";
        $params = [$name];
        if ($id) {
            $sql .= " AND id != ?";
            $params[] = $id;
        }
        $this->setQuery($sql);
        return $this->loadRecord($params) > 0;
    }

    public function countProducts($id) {
        $sql = "SELECT COUNT(*) FROM products WHERE category_id = ?";
        $this->setQuery($sql);
        return $this->loadRecord([$id]);
    }

    public function countNews($id) {
        $sql = "SELECT COUNT(*) FROM news WHERE category_id = ?";
        $this->setQuery($sql);
        return $this->loadRecord([$id]);
    }
}
