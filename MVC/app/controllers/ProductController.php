<?php

namespace App\Controllers;

use App\Models\Product;

class ProductController extends BaseController
{
    public $product;

    public function __construct()
    {
        $this->product = new Product();
    }
    public function index()
    {
        $data = $this->product->getALL();

        $this->render('product.list', compact('data'));
    }

    public function delete($id)
    {
        $this->product->delete($id);
        flash('success', 'xoa thanh conbg', 'posts');
    }

    public function add()
    {
        $cate = $this->product->getAllcategori();
        $this->render('product.add', compact('cate'));
    }
    public function store()
    {
        $category_id = $_POST['category_id'];
        $name = $_POST['name'];
        $img_thumbnail = uploadFile($_FILES['img_thumbnail']);
        $overview = $_POST['overview'];
        $content = $_POST['content'];
        $created_at = date('Y-m-d H:i:s');

        $erros = [];
        if (empty($category_id)) {
            $erros[] = "nhap id";
        }
        if (empty($name)) {
            $erros[] = "nhap name";
        }
        if (empty($created_at)) {
            $erros[] = "nhap ngay";
        }
        if (empty($overview)) {
            $erros[] = "nhap nd";
        }
        if (empty($content)) {
            $erros[] = "nhap nd2";
        }
        if (count($erros) > 0) {
            flash('errors', $erros, 'post/creat');
        }
        $check = $this->product->creat($category_id, $name, $img_thumbnail, $overview, $content, $created_at);
        if ($check) {
            flash('success', 'Thêm bài viết thành công', 'posts');
        } else {
            flash('errors', 'Thêm bài viết thất bại', 'post/creat');
        }
    }

    public function edit($id)
    {
        $cate = $this->product->getAllcategori();
        $post = $this->product->getbyid($id);

        $this->render('product.edit', compact('cate', 'post'));
    }
    public function update($id)
    {
        $category_id = $_POST['category_id'];
        $name = $_POST['name'];

        $overview = $_POST['overview'];
        $content = $_POST['content'];
        $created_at = date('Y-m-d H:i:s');

        if (!empty($_FILES['img_thumbnail']['name'])) {
            $img_thumbnail = uploadFile($_FILES['img_thumbnail']);
        } else {
            $img_thumbnail = $this->product->getbyid($id)->img_thumbnail;
        }
        $erros = [];
        if (empty($category_id)) {
            $erros[] = "nhap id";
        }
        if (empty($name)) {
            $erros[] = "nhap name";
        }
        if (empty($created_at)) {
            $erros[] = "nhap ngay";
        }
        if (empty($overview)) {
            $erros[] = "nhap nd";
        }
        if (empty($content)) {
            $erros[] = "nhap nd2";
        }
        if (count($erros) > 0) {
            flash('errors', $erros, 'post/creat');
        }
        $check = $this->product->update($id, $category_id, $name, $img_thumbnail, $overview, $content);
        if ($check) {

            flash('success', 'cap nhat bài viết thành công', 'posts/' . $id . '/edit');
        } else {

            flash('errors', 'Thêm bài viết thất bại', 'post/edit/' . $id);
        }
    }
}
