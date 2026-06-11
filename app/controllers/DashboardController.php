<?php
namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\NewsModel;
use App\Models\CategoryModel;

class DashboardController extends BaseController {
    
    public function index() {
        $productModel = new ProductModel();
        $newsModel = new NewsModel();
        $categoryModel = new CategoryModel();

        $totalProducts = $productModel->countAll();
        $totalNews = $newsModel->countAll();
        $categories = $categoryModel->getAll();
        $totalCategories = $categories ? count($categories) : 0;
        $recentProducts = $productModel->getAll();
        $recentNews = $newsModel->getAll();

        // Limit recent items
        if ($recentProducts && count($recentProducts) > 5) {
            $recentProducts = array_slice($recentProducts, 0, 5);
        }
        if ($recentNews && count($recentNews) > 5) {
            $recentNews = array_slice($recentNews, 0, 5);
        }

        $this->render('admin.dashboard', compact(
            'totalProducts', 'totalNews', 'totalCategories',
            'recentProducts', 'recentNews'
        ));
    }
}
