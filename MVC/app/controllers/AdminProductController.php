<?php
namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;

class AdminProductController extends BaseController {
    
    private $productModel;
    private $categoryModel;

    public function __construct() {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
    }

    public function index() {
        $data = $this->productModel->getAll();
        $this->render('admin.products.list', compact('data'));
    }

    public function add() {
        $categories = $this->categoryModel->getByType('product');
        $this->render('admin.products.form', ['categories' => $categories, 'product' => null]);
    }

    public function store() {
        $category_id = $_POST['category_id'] ?? null;
        $name = $_POST['name'] ?? '';
        $slug = $this->createSlug($name);
        $price = intval($_POST['price'] ?? 0);
        $overview = $_POST['overview'] ?? '';
        $content = $_POST['content'] ?? '';
        $is_active = isset($_POST['is_active']) ? 1 : 0;
        $sort_order = intval($_POST['sort_order'] ?? 0);

        $img_thumbnail = '';
        if (!empty($_FILES['img_thumbnail']['name'])) {
            $img_thumbnail = uploadFile($_FILES['img_thumbnail'], 'products');
        }

        $errors = [];
        if (empty($name)) $errors[] = "Tên sản phẩm không được để trống";
        if (empty($category_id)) $errors[] = "Vui lòng chọn danh mục";

        if (count($errors) > 0) {
            flash('errors', $errors, 'products/create');
        }

        $check = $this->productModel->create($category_id, $name, $slug, $price, $img_thumbnail, $overview, $content, $is_active, $sort_order);
        if ($check) {
            flash('success', 'Thêm sản phẩm thành công', 'products');
        } else {
            flash('errors', 'Thêm sản phẩm thất bại', 'products/create');
        }
    }

    public function edit($id) {
        $categories = $this->categoryModel->getByType('product');
        $product = $this->productModel->getById($id);
        if (!$product) {
            flash('errors', 'Sản phẩm không tồn tại', 'products');
        }
        $this->render('admin.products.form', compact('categories', 'product'));
    }

    public function update($id) {
        $category_id = $_POST['category_id'] ?? null;
        $name = $_POST['name'] ?? '';
        $slug = $this->createSlug($name);
        $price = intval($_POST['price'] ?? 0);
        $overview = $_POST['overview'] ?? '';
        $content = $_POST['content'] ?? '';
        $is_active = isset($_POST['is_active']) ? 1 : 0;
        $sort_order = intval($_POST['sort_order'] ?? 0);

        if (!empty($_FILES['img_thumbnail']['name'])) {
            $img_thumbnail = uploadFile($_FILES['img_thumbnail'], 'products');
        } else {
            $existing = $this->productModel->getById($id);
            $img_thumbnail = $existing ? $existing->img_thumbnail : '';
        }

        $errors = [];
        if (empty($name)) $errors[] = "Tên sản phẩm không được để trống";
        if (empty($category_id)) $errors[] = "Vui lòng chọn danh mục";

        if (count($errors) > 0) {
            flash('errors', $errors, 'products/' . $id . '/edit');
        }

        $check = $this->productModel->update($id, $category_id, $name, $slug, $price, $img_thumbnail, $overview, $content, $is_active, $sort_order);
        if ($check) {
            flash('success', 'Cập nhật sản phẩm thành công', 'products');
        } else {
            flash('errors', 'Cập nhật thất bại', 'products/' . $id . '/edit');
        }
    }

    public function delete($id) {
        $this->productModel->delete($id);
        flash('success', 'Xóa sản phẩm thành công', 'products');
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
