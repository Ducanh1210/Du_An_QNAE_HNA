<?php
namespace App\Models;

class NewsModel extends BaseModel {
    
    public function getAll($search = '', $categoryId = null) {
        $sql = "SELECT n.*, c.name as category_name 
                FROM news n 
                LEFT JOIN categories c ON n.category_id = c.id";
        
        $where = [];
        $params = [];

        if (!empty($search)) {
            $where[] = "REPLACE(REPLACE(n.title, 'đ', 'd'), 'Đ', 'D') LIKE ?";
            $params[] = "%" . str_replace(['đ', 'Đ'], ['d', 'd'], $search) . "%";
        }

        if (!empty($categoryId)) {
            $where[] = "n.category_id = ?";
            $params[] = $categoryId;
        }

        if (count($where) > 0) {
            $sql .= " WHERE " . implode(" AND ", $where);
        }

        $sql .= " ORDER BY n.created_at DESC";
        
        $this->setQuery($sql);
        return $this->loadAllRows($params);
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

    public function getBySlug($slug) {
        $sql = "SELECT n.*, c.name as category_name 
                FROM news n 
                LEFT JOIN categories c ON n.category_id = c.id 
                WHERE n.slug = ? AND n.is_active = 1";
        $this->setQuery($sql);
        return $this->loadRow([$slug]);
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

    public function checkTitleExists($title, $id = null) {
        $sql = "SELECT COUNT(*) FROM news WHERE title = ?";
        $params = [$title];
        if ($id) {
            $sql .= " AND id != ?";
            $params[] = $id;
        }
        $this->setQuery($sql);
        return $this->loadRecord($params) > 0;
    }

    public function countAll() {
        $sql = "SELECT COUNT(*) FROM news";
        $this->setQuery($sql);
        return $this->loadRecord();
    }

    public function getActive($search = '') {
        $sql = "SELECT n.*, c.name as category_name, c.slug as category_slug 
                FROM news n 
                LEFT JOIN categories c ON n.category_id = c.id 
                WHERE n.is_active = 1";
        
        $params = [];
        if (!empty($search)) {
            $sql .= " AND (REPLACE(REPLACE(n.title, 'đ', 'd'), 'Đ', 'D') LIKE ? OR REPLACE(REPLACE(n.overview, 'đ', 'd'), 'Đ', 'D') LIKE ?)";
            $cleanSearch = "%" . str_replace(['đ', 'Đ'], ['d', 'd'], $search) . "%";
            $params[] = $cleanSearch;
            $params[] = $cleanSearch;
        }

        $sql .= " ORDER BY n.created_at DESC";
        $this->setQuery($sql);
        return $this->loadAllRows($params);
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
