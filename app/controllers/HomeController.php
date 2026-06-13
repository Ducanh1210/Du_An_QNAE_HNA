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

        $products = $productModel->getForHome();
        $news = $newsModel->getForHome();

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
        $categoryModel = new CategoryModel();

        $categories = $categoryModel->getByType('news');
        $news = $newsModel->getActive();

        $this->render('client.news', compact('categories', 'news'));
    }

    public function newsDetail($slug)
    {
        $newsModel = new NewsModel();
        $detail = $newsModel->getBySlug($slug);
        
        if (!$detail) {
            header('Location: ' . BASE_URL . 'tin-tuc');
            exit;
        }

        // Get related news (latest 3 active news excluding current)
        $allNews = $newsModel->getActive();
        $relatedNews = array_slice(array_filter($allNews, function($item) use ($detail) {
            return $item->id != $detail->id;
        }), 0, 3);
        
        $this->render('client.news-detail', compact('detail', 'relatedNews'));
    }

    public function contact()
    {
        $this->render('client.contact');
    }
}
?>