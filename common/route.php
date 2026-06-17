<?php

use Phroute\Phroute\RouteCollector;

error_reporting(E_ALL);
ini_set('display_errors', 1);

$url = !isset($_GET['url']) ? "/" : $_GET['url'];
try{
    $router = new RouteCollector();

    // ========== CLIENT FRONTEND ==========
    $router->get('/', [App\Controllers\HomeController::class, 'index']);
    $router->get('/gioi-thieu', [App\Controllers\HomeController::class, 'about']);
    $router->get('/thuc-don', [App\Controllers\HomeController::class, 'menu']);
    $router->get('/tin-tuc', [App\Controllers\HomeController::class, 'news']);
    $router->get('/tin-tuc/{slug}', [App\Controllers\HomeController::class, 'newsDetail']);
    $router->get('/lien-he', [App\Controllers\HomeController::class, 'contact']);

    // ========== AUTHENTICATION ==========
    $router->get('/login', [App\Controllers\AuthController::class, 'login']);
    $router->post('/login', [App\Controllers\AuthController::class, 'postLogin']);
    $router->get('/logout', [App\Controllers\AuthController::class, 'logout']);

    // Bộ lọc kiểm tra quyền truy cập Admin
    $router->filter('auth', function() {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASE_URL . 'login');
            exit;
        }
    });

    // ========== ADMIN MODULES (PROTECTED) ==========
    $router->group(['before' => 'auth'], function($router) {
        // ========== DASHBOARD ==========
        $router->get('/admin', [App\Controllers\DashboardController::class, 'index']);

        // ========== PRODUCTS ==========
        $router->get('/products', [App\Controllers\AdminProductController::class, 'index']);
        $router->get('/products/create', [App\Controllers\AdminProductController::class, 'add']);
        $router->post('/products/store', [App\Controllers\AdminProductController::class, 'store']);
        $router->get('/products/{id}/edit', [App\Controllers\AdminProductController::class, 'edit']);
        $router->post('/products/{id}/update', [App\Controllers\AdminProductController::class, 'update']);
        $router->get('/products/{id}/delete', [App\Controllers\AdminProductController::class, 'delete']);

        // ========== NEWS ==========
        $router->get('/news', [App\Controllers\AdminNewsController::class, 'index']);
        $router->get('/news/create', [App\Controllers\AdminNewsController::class, 'add']);
        $router->post('/news/store', [App\Controllers\AdminNewsController::class, 'store']);
        $router->get('/news/{id}/edit', [App\Controllers\AdminNewsController::class, 'edit']);
        $router->post('/news/{id}/update', [App\Controllers\AdminNewsController::class, 'update']);
        $router->get('/news/{id}/delete', [App\Controllers\AdminNewsController::class, 'delete']);

        // ========== CATEGORIES ==========
        $router->get('/categories', [App\Controllers\AdminCategoryController::class, 'index']);
        $router->post('/categories/store', [App\Controllers\AdminCategoryController::class, 'store']);
        $router->post('/categories/{id}/update', [App\Controllers\AdminCategoryController::class, 'update']);
        $router->get('/categories/{id}/delete', [App\Controllers\AdminCategoryController::class, 'delete']);

        // ========== SETTINGS ==========
        $router->get('/settings', [App\Controllers\AdminSettingController::class, 'index']);
        $router->post('/settings/update', [App\Controllers\AdminSettingController::class, 'update']);

        // ========== CHANGE PASSWORD ==========
        $router->get('/change-password', [App\Controllers\AuthController::class, 'changePassword']);
        $router->post('/change-password', [App\Controllers\AuthController::class, 'postChangePassword']);
    });

    // ========== API (for frontend) ==========
    $router->post('/api/booking', [App\Controllers\ApiController::class, 'booking']);
    $router->post('/api/shipping', [App\Controllers\ApiController::class, 'shipping']);
    $router->get('/api/settings', [App\Controllers\ApiController::class, 'settings']);
    $router->get('/api/products', [App\Controllers\ApiController::class, 'products']);
    $router->get('/api/news', [App\Controllers\ApiController::class, 'news']);
    $router->get('/api/product-detail', [App\Controllers\ApiController::class, 'productDetail']);

    # NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
    $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

    // Print out the value returned from the dispatched function
    echo $response;
}catch(Exception $e){
    var_dump($e->getMessage());die;
}

?>