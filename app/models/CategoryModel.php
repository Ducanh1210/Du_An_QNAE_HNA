<?php
namespace App\Models;

class CategoryModel extends BaseModel {
    
    public function getAll() {
        $sql = "SELECT * FROM categories ORDER BY type, sort_order DESC, id DESC";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function getByType($type) {
        $sql = "SELECT * FROM categories WHERE type = ? AND is_active = 1 ORDER BY sort_order DESC, id DESC";
        $this->setQuery($sql);
        return $this->loadAllRows([$type]);
    }

    public function getById($id) {
        $sql = "SELECT * FROM categories WHERE id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }

    public function create($name, $slug, $type, $sort_order = 0) {
        $sql = "INSERT INTO categories (name, slug, type, sort_order) VALUES (?, ?, ?, ?)";
        $this->setQuery($sql);
        return $this->execute([$name, $slug, $type, $sort_order]);
    }

    public function update($id, $name, $slug, $type, $sort_order = 0) {
        $sql = "UPDATE categories SET name = ?, slug = ?, type = ?, sort_order = ? WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$name, $slug, $type, $sort_order, $id]);
    }

    public function delete($id) {
        $sql = "DELETE FROM categories WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
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
