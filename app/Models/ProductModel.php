<?php
namespace App\Models;

class ProductModel extends BaseModel {
    
    public function getAll($search = '', $categoryId = null) {
        $sql = "SELECT p.*, c.name as category_name 
                FROM products p 
                LEFT JOIN categories c ON p.category_id = c.id";
        
        $where = [];
        $params = [];

        if (!empty($search)) {
            $where[] = "REPLACE(REPLACE(p.name, 'đ', 'd'), 'Đ', 'D') LIKE ?";
            $params[] = "%" . str_replace(['đ', 'Đ'], ['d', 'd'], $search) . "%";
        }

        if (!empty($categoryId)) {
            $where[] = "p.category_id = ?";
            $params[] = $categoryId;
        }

        if (count($where) > 0) {
            $sql .= " WHERE " . implode(" AND ", $where);
        }

        $sql .= " ORDER BY p.sort_order ASC, p.created_at DESC";
        
        $this->setQuery($sql);
        return $this->loadAllRows($params);
    }

    public function getByCategory($categoryId) {
        $sql = "SELECT p.*, c.name as category_name 
                FROM products p 
                LEFT JOIN categories c ON p.category_id = c.id 
                WHERE p.category_id = ? AND p.is_active = 1 
                ORDER BY p.sort_order ASC";
        $this->setQuery($sql);
        return $this->loadAllRows([$categoryId]);
    }

    public function getById($id) {
        $sql = "SELECT p.*, c.name as category_name 
                FROM products p 
                LEFT JOIN categories c ON p.category_id = c.id 
                WHERE p.id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }

    public function create($category_id, $name, $slug, $price, $img_transparent, $video_url, $images, $overview, $content, $is_active = 1, $sort_order = 0) {
        $sql = "INSERT INTO products (category_id, name, slug, price, img_transparent, video_url, images, overview, content, is_active, sort_order) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $this->setQuery($sql);
        return $this->execute([$category_id, $name, $slug, $price, $img_transparent, $video_url, $images, $overview, $content, $is_active, $sort_order]);
    }

    public function update($id, $category_id, $name, $slug, $price, $img_transparent, $video_url, $images, $overview, $content, $is_active = 1, $sort_order = 0) {
        $sql = "UPDATE products SET category_id = ?, name = ?, slug = ?, price = ?, img_transparent = ?, video_url = ?, images = ?, overview = ?, content = ?, is_active = ?, sort_order = ? WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$category_id, $name, $slug, $price, $img_transparent, $video_url, $images, $overview, $content, $is_active, $sort_order, $id]);
    }

    public function delete($id) {
        $sql = "DELETE FROM products WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }

    public function countAll() {
        $sql = "SELECT COUNT(*) FROM products";
        $this->setQuery($sql);
        return $this->loadRecord();
    }

    public function getActive() {
        $sql = "SELECT p.*, c.name as category_name 
                FROM products p 
                LEFT JOIN categories c ON p.category_id = c.id 
                WHERE p.is_active = 1 
                ORDER BY p.sort_order ASC";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function getLatest($limit = 3) {
        $sql = "SELECT p.*, c.name as category_name 
                FROM products p 
                LEFT JOIN categories c ON p.category_id = c.id 
                WHERE p.is_active = 1 
                AND c.id != 2 AND c.name NOT LIKE '%uống%'
                ORDER BY p.updated_at DESC LIMIT $limit";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function getForHome() {
        $sql = "SELECT p.*, c.name as category_name 
                FROM products p 
                INNER JOIN categories c ON p.category_id = c.id 
                WHERE p.is_active = 1 AND c.show_home = 1 AND c.type = 'product'
                ORDER BY p.sort_order ASC";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
}
