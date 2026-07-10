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
        $productModel = new ProductModel();
        $latestProducts = $productModel->getLatest(3);
        
        $this->render('client.about', compact('latestProducts'));
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
        $search = isset($_GET['q']) ? trim($_GET['q']) : '';
        $news = $newsModel->getActive($search);

        $this->render('client.news', compact('categories', 'news', 'search'));
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

    public function sitemap()
    {
        $newsModel = new NewsModel();
        $newsList = $newsModel->getActive();

        header("Content-Type: application/xml; charset=utf-8");
        
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

        // Static routes
        $staticRoutes = [
            '',
            'gioi-thieu',
            'thuc-don',
            'tin-tuc',
            'lien-he'
        ];

        foreach ($staticRoutes as $route) {
            $xml .= '  <url>' . PHP_EOL;
            $xml .= '    <loc>' . BASE_URL . $route . '</loc>' . PHP_EOL;
            $xml .= '    <changefreq>daily</changefreq>' . PHP_EOL;
            $xml .= '    <priority>' . ($route === '' ? '1.0' : '0.8') . '</priority>' . PHP_EOL;
            $xml .= '  </url>' . PHP_EOL;
        }

        // Dynamic news detail routes
        foreach ($newsList as $item) {
            $xml .= '  <url>' . PHP_EOL;
            $xml .= '    <loc>' . BASE_URL . 'tin-tuc/' . htmlspecialchars($item->slug) . '</loc>' . PHP_EOL;
            $xml .= '    <lastmod>' . date('Y-m-d', strtotime($item->created_at)) . '</lastmod>' . PHP_EOL;
            $xml .= '    <changefreq>weekly</changefreq>' . PHP_EOL;
            $xml .= '    <priority>0.6</priority>' . PHP_EOL;
            $xml .= '  </url>' . PHP_EOL;
        }

        $xml .= '</urlset>';
        echo $xml;
        exit;
    }
}
?>