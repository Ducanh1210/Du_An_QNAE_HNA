<?php
namespace App\Models;

class NewsModel extends BaseModel {
    
    public function getAll() {
        $sql = "SELECT n.*, c.name as category_name 
                FROM news n 
                LEFT JOIN categories c ON n.category_id = c.id 
                ORDER BY n.created_at DESC";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function getByCategory($categoryId) {
        $sql = "SELECT n.*, c.name as category_name 
                FROM news n 
                LEFT JOIN categories c ON n.category_id = c.id 
                WHERE n.category_id = ? AND n.is_active = 1 
                ORDER BY n.created_at DESC";
        $this->setQuery($sql);
        return $this->loadAllRows([$categoryId]);
    }

    public function getById($id) {
        $sql = "SELECT n.*, c.name as category_name 
                FROM news n 
                LEFT JOIN categories c ON n.category_id = c.id 
                WHERE n.id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }

    public function create($category_id, $title, $slug, $img_thumbnail, $overview, $content, $is_active = 1) {
        $sql = "INSERT INTO news (category_id, title, slug, img_thumbnail, overview, content, is_active) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $this->setQuery($sql);
        return $this->execute([$category_id, $title, $slug, $img_thumbnail, $overview, $content, $is_active]);
    }

    public function update($id, $category_id, $title, $slug, $img_thumbnail, $overview, $content, $is_active = 1) {
        $sql = "UPDATE news SET category_id = ?, title = ?, slug = ?, img_thumbnail = ?, overview = ?, content = ?, is_active = ? WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$category_id, $title, $slug, $img_thumbnail, $overview, $content, $is_active, $id]);
    }

    public function delete($id) {
        $sql = "DELETE FROM news WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }

    public function countAll() {
        $sql = "SELECT COUNT(*) FROM news";
        $this->setQuery($sql);
        return $this->loadRecord();
    }

    public function getActive() {
        $sql = "SELECT n.*, c.name as category_name 
                FROM news n 
                LEFT JOIN categories c ON n.category_id = c.id 
                WHERE n.is_active = 1 
                ORDER BY n.created_at DESC";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function getForHome() {
        $sql = "SELECT n.*, c.name as category_name 
                FROM news n 
                INNER JOIN categories c ON n.category_id = c.id 
                WHERE n.is_active = 1 AND c.sort_order = 1 AND c.type = 'news'
                ORDER BY n.created_at DESC";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
}
