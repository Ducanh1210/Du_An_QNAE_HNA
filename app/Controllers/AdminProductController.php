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
        $search = isset($_GET['q']) ? trim($_GET['q']) : '';
        $category_id = isset($_GET['category_id']) ? $_GET['category_id'] : '';
        $data = $this->productModel->getAll($search, $category_id);
        $categories = $this->categoryModel->getByType('product');
        $this->render('admin.products.list', compact('data', 'categories', 'search', 'category_id'));
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

        $img_transparent = '';
        if (!empty($_FILES['img_transparent']['name'])) {
            $img_transparent = uploadFile($_FILES['img_transparent'], 'products');
        }

        $video_url = '';
        if (!empty($_FILES['video_url']['name'])) {
            $video_url = uploadFile($_FILES['video_url'], 'products');
        }

        $uploaded_images = [];
        if (!empty($_FILES['product_images']['name'][0])) {
            $filesCount = count($_FILES['product_images']['name']);
            for ($i = 0; $i < $filesCount; $i++) {
                $file = [
                    'name' => $_FILES['product_images']['name'][$i],
                    'type' => $_FILES['product_images']['type'][$i],
                    'tmp_name' => $_FILES['product_images']['tmp_name'][$i],
                    'error' => $_FILES['product_images']['error'][$i],
                    'size' => $_FILES['product_images']['size'][$i]
                ];
                $path = uploadFile($file, 'products');
                if ($path) {
                    $uploaded_images[] = $path;
                }
            }
        }
        $images = json_encode($uploaded_images);

        $errors = [];
        if (empty($name)) $errors[] = "Tên sản phẩm không được để trống";
        if (empty($category_id)) $errors[] = "Vui lòng chọn danh mục";

        if (count($errors) > 0) {
            flash('errors', $errors, 'products/create');
        }

        $check = $this->productModel->create($category_id, $name, $slug, $price, $img_thumbnail, $img_transparent, $video_url, $images, $overview, $content, $is_active, $sort_order);
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

        $existing = $this->productModel->getById($id);

        if (!empty($_FILES['img_thumbnail']['name'])) {
            $img_thumbnail = uploadFile($_FILES['img_thumbnail'], 'products');
            if ($img_thumbnail && $existing && !empty($existing->img_thumbnail)) {
                if (file_exists($existing->img_thumbnail)) {
                    unlink($existing->img_thumbnail);
                }
            }
        } else {
            $img_thumbnail = $existing ? $existing->img_thumbnail : '';
        }

        if (!empty($_FILES['img_transparent']['name'])) {
            $img_transparent = uploadFile($_FILES['img_transparent'], 'products');
            if ($img_transparent && $existing && !empty($existing->img_transparent)) {
                if (file_exists($existing->img_transparent)) {
                    unlink($existing->img_transparent);
                }
            }
        } else {
            $img_transparent = $existing ? $existing->img_transparent : '';
        }

        $video_url = '';
        if (!empty($_FILES['video_url']['name'])) {
            $video_url = uploadFile($_FILES['video_url'], 'products');
            if ($video_url && $existing && !empty($existing->video_url)) {
                if (file_exists($existing->video_url)) {
                    unlink($existing->video_url);
                }
            }
        } else {
            $video_url = $existing ? $existing->video_url : '';
        }

        // Handle existing gallery images remaining
        $existing_images = $_POST['existing_images'] ?? [];
        if ($existing && !empty($existing->images)) {
            $old_album = json_decode($existing->images, true);
            if (is_array($old_album)) {
                foreach ($old_album as $old_img) {
                    if (!in_array($old_img, $existing_images)) {
                        if (file_exists($old_img)) {
                            unlink($old_img);
                        }
                    }
                }
            }
        }

        // Upload new gallery images
        $new_uploaded = [];
        if (!empty($_FILES['product_images']['name'][0])) {
            $filesCount = count($_FILES['product_images']['name']);
            for ($i = 0; $i < $filesCount; $i++) {
                $file = [
                    'name' => $_FILES['product_images']['name'][$i],
                    'type' => $_FILES['product_images']['type'][$i],
                    'tmp_name' => $_FILES['product_images']['tmp_name'][$i],
                    'error' => $_FILES['product_images']['error'][$i],
                    'size' => $_FILES['product_images']['size'][$i]
                ];
                $path = uploadFile($file, 'products');
                if ($path) {
                    $new_uploaded[] = $path;
                }
            }
        }

        $combined_images = array_merge($existing_images, $new_uploaded);
        $images = json_encode($combined_images);

        $errors = [];
        if (empty($name)) $errors[] = "Tên sản phẩm không được để trống";
        if (empty($category_id)) $errors[] = "Vui lòng chọn danh mục";

        if (count($errors) > 0) {
            flash('errors', $errors, 'products/' . $id . '/edit');
        }

        $check = $this->productModel->update($id, $category_id, $name, $slug, $price, $img_thumbnail, $img_transparent, $video_url, $images, $overview, $content, $is_active, $sort_order);
        if ($check) {
            flash('success', 'Cập nhật sản phẩm thành công', 'products');
        } else {
            flash('errors', 'Cập nhật thất bại', 'products/' . $id . '/edit');
        }
    }

    public function delete($id) {
        $product = $this->productModel->getById($id);
        if ($product) {
            if (!empty($product->img_thumbnail) && file_exists($product->img_thumbnail)) {
                unlink($product->img_thumbnail);
            }
            if (!empty($product->img_transparent) && file_exists($product->img_transparent)) {
                unlink($product->img_transparent);
            }
            if (!empty($product->video_url) && file_exists($product->video_url)) {
                unlink($product->video_url);
            }
            if (!empty($product->images)) {
                $album = json_decode($product->images, true);
                if (is_array($album)) {
                    foreach ($album as $img) {
                        if (file_exists($img)) {
                            unlink($img);
                        }
                    }
                }
            }
        }
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
