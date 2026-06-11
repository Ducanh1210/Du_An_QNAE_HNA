<?php
namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\NewsModel;
use App\Models\CategoryModel;

class HomeController extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();
        $newsModel = new NewsModel();

        $products = $productModel->getActive();
        $news = $newsModel->getActive();

        $this->render('client.index', compact('products', 'news'));
    }

    public function about()
    {
        $this->render('client.about');
    }

    public function menu()
    {
        $productModel = new ProductModel();
        $categoryModel = new CategoryModel();

        $categories = $categoryModel->getByType('product');
        $products = $productModel->getActive();

        $this->render('client.menu', compact('categories', 'products'));
    }

    public function news()
    {
        $newsModel = new NewsModel();
        $news = $newsModel->getActive();

        $this->render('client.news', compact('news'));
    }

    public function contact()
    {
        $this->render('client.contact');
    }
}
?>