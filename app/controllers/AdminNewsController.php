<?php
namespace App\Controllers;

use App\Models\NewsModel;
use App\Models\CategoryModel;

class AdminNewsController extends BaseController {
    
    private $newsModel;
    private $categoryModel;

    public function __construct() {
        $this->newsModel = new NewsModel();
        $this->categoryModel = new CategoryModel();
    }

    public function index() {
        $data = $this->newsModel->getAll();
        $this->render('admin.news.list', compact('data'));
    }

    public function add() {
        $categories = $this->categoryModel->getByType('news');
        $this->render('admin.news.form', ['categories' => $categories, 'news' => null]);
    }

    public function store() {
        $category_id = $_POST['category_id'] ?? null;
        $title = $_POST['title'] ?? '';
        $slug = $this->createSlug($title);
        $overview = $_POST['overview'] ?? '';
        $content = $_POST['content'] ?? '';
        $is_active = isset($_POST['is_active']) ? 1 : 0;

        $img_thumbnail = '';
        if (!empty($_FILES['img_thumbnail']['name'])) {
            $img_thumbnail = uploadFile($_FILES['img_thumbnail'], 'news');
        }

        $errors = [];
        if (empty($title)) $errors[] = "Tiêu đề không được để trống";
        if (empty($category_id)) $errors[] = "Vui lòng chọn danh mục";

        if (count($errors) > 0) {
            flash('errors', $errors, 'news/create');
        }

        $check = $this->newsModel->create($category_id, $title, $slug, $img_thumbnail, $overview, $content, $is_active);
        if ($check) {
            flash('success', 'Thêm tin tức thành công', 'news');
        } else {
            flash('errors', 'Thêm tin tức thất bại', 'news/create');
        }
    }

    public function edit($id) {
        $categories = $this->categoryModel->getByType('news');
        $news = $this->newsModel->getById($id);
        if (!$news) {
            flash('errors', 'Tin tức không tồn tại', 'news');
        }
        $this->render('admin.news.form', compact('categories', 'news'));
    }

    public function update($id) {
        $category_id = $_POST['category_id'] ?? null;
        $title = $_POST['title'] ?? '';
        $slug = $this->createSlug($title);
        $overview = $_POST['overview'] ?? '';
        $content = $_POST['content'] ?? '';
        $is_active = isset($_POST['is_active']) ? 1 : 0;

        if (!empty($_FILES['img_thumbnail']['name'])) {
            $existing = $this->newsModel->getById($id);
            $img_thumbnail = uploadFile($_FILES['img_thumbnail'], 'news');
            if ($img_thumbnail && $existing && !empty($existing->img_thumbnail)) {
                if (file_exists($existing->img_thumbnail)) {
                    unlink($existing->img_thumbnail);
                }
            }
        } else {
            $existing = $this->newsModel->getById($id);
            $img_thumbnail = $existing ? $existing->img_thumbnail : '';
        }

        $errors = [];
        if (empty($title)) $errors[] = "Tiêu đề không được để trống";
        if (empty($category_id)) $errors[] = "Vui lòng chọn danh mục";

        if (count($errors) > 0) {
            flash('errors', $errors, 'news/' . $id . '/edit');
        }

        $check = $this->newsModel->update($id, $category_id, $title, $slug, $img_thumbnail, $overview, $content, $is_active);
        if ($check) {
            flash('success', 'Cập nhật tin tức thành công', 'news');
        } else {
            flash('errors', 'Cập nhật thất bại', 'news/' . $id . '/edit');
        }
    }

    public function delete($id) {
        $news = $this->newsModel->getById($id);
        if ($news && !empty($news->img_thumbnail)) {
            if (file_exists($news->img_thumbnail)) {
                unlink($news->img_thumbnail);
            }
        }
        $this->newsModel->delete($id);
        flash('success', 'Xóa tin tức thành công', 'news');
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
