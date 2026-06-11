<?php
namespace App\Controllers;

use App\Models\CategoryModel;

class AdminCategoryController extends BaseController {
    
    private $categoryModel;

    public function __construct() {
        $this->categoryModel = new CategoryModel();
    }

    public function index() {
        $data = $this->categoryModel->getAll();
        $this->render('admin.categories.list', compact('data'));
    }

    public function store() {
        $name = $_POST['name'] ?? '';
        $type = $_POST['type'] ?? 'product';
        $sort_order = intval($_POST['sort_order'] ?? 0);
        $slug = $this->createSlug($name);

        if (empty($name)) {
            flash('errors', 'Tên danh mục không được để trống', 'categories');
        }

        $check = $this->categoryModel->create($name, $slug, $type, $sort_order);
        if ($check) {
            flash('success', 'Thêm danh mục thành công', 'categories');
        } else {
            flash('errors', 'Thêm danh mục thất bại', 'categories');
        }
    }

    public function update($id) {
        $name = $_POST['name'] ?? '';
        $type = $_POST['type'] ?? 'product';
        $sort_order = intval($_POST['sort_order'] ?? 0);
        $slug = $this->createSlug($name);

        if (empty($name)) {
            flash('errors', 'Tên danh mục không được để trống', 'categories');
        }

        $check = $this->categoryModel->update($id, $name, $slug, $type, $sort_order);
        if ($check) {
            flash('success', 'Cập nhật danh mục thành công', 'categories');
        } else {
            flash('errors', 'Cập nhật thất bại', 'categories');
        }
    }

    public function delete($id) {
        $this->categoryModel->delete($id);
        flash('success', 'Xóa danh mục thành công', 'categories');
    }

    private function createSlug($str) {
        $str = mb_strtolower($str, 'UTF-8');
        $str = preg_replace('/[áàảãạăắằẳẵặâấầẩẫậ]/u', 'a', $str);
        $str = preg_replace('/[éèẻẽẹêếềểễệ]/u', 'e', $str);
        $str = preg_replace('/[íìỉĩị]/u', 'i', $str);
        $str = preg_replace('/[óòỏõọôốồổỗộơớờởỡợ]/u', 'o', $str);
        $str = preg_replace('/[úùủũụưứừửữự]/u', 'u', $str);
        $str = preg_replace('/[ýỳỷỹỵ]/u', 'y', $str);
        $str = preg_replace('/[đ]/u', 'd', $str);
        $str = preg_replace('/[^a-z0-9\s-]/', '', $str);
        $str = preg_replace('/[\s-]+/', '-', $str);
        return trim($str, '-');
    }
}
