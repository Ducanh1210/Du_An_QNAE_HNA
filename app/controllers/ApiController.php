<?php
namespace App\Controllers;

use App\Models\SettingModel;
use App\Models\ProductModel;
use App\Models\NewsModel;
use App\Models\CategoryModel;

class ApiController extends BaseController {
    
    /**
     * API: Nhận form đặt bàn/đặt ship và trả về Zalo deep link
     * Called via AJAX from the static frontend
     */
    public function booking() {
        header('Content-Type: application/json; charset=utf-8');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Headers: Content-Type');

        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            echo json_encode(['status' => 'ok']);
            exit;
        }

        $fullname = $_POST['fullname'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $num_guests = $_POST['num_guests'] ?? 1;
        $booking_date = $_POST['booking_date'] ?? '';
        $booking_time = $_POST['booking_time'] ?? '';
        $note = $_POST['note'] ?? '';

        if (empty($fullname) || empty($phone)) {
            echo json_encode(['success' => false, 'message' => 'Vui lòng nhập tên và số điện thoại']);
            exit;
        }

        // Build Zalo deep link message
        $settingModel = new SettingModel();
        $zaloOaId = $settingModel->getValue('zalo_oa_id');

        $message = "ĐẶT BÀN\n";
        $message .= "Tên: $fullname\n";
        $message .= "SĐT: $phone\n";
        $message .= "Số khách: $num_guests\n";
        if ($booking_date) $message .= "Ngày: $booking_date\n";
        if ($booking_time) $message .= "Giờ: $booking_time\n";
        if ($note) $message .= "Ghi chú: $note";

        $zaloLink = '';
        if (!empty($zaloOaId)) {
            $zaloLink = 'https://zalo.me/' . $zaloOaId;
        }

        echo json_encode([
            'success' => true,
            'message' => 'Đặt bàn thành công! Đang chuyển đến Zalo...',
            'zalo_link' => $zaloLink,
            'zalo_text' => $message
        ], JSON_UNESCAPED_UNICODE);
        exit;
    }

    public function shipping() {
        header('Content-Type: application/json; charset=utf-8');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Headers: Content-Type');

        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            echo json_encode(['status' => 'ok']);
            exit;
        }

        $fullname = $_POST['fullname'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $address = $_POST['address'] ?? '';
        $note = $_POST['note'] ?? '';

        if (empty($fullname) || empty($phone)) {
            echo json_encode(['success' => false, 'message' => 'Vui lòng nhập tên và số điện thoại']);
            exit;
        }

        $settingModel = new SettingModel();
        $zaloOaId = $settingModel->getValue('zalo_oa_id');

        $message = "ĐẶT SHIP\n";
        $message .= "Tên: $fullname\n";
        $message .= "SĐT: $phone\n";
        if ($address) $message .= "Địa chỉ: $address\n";
        if ($note) $message .= "Ghi chú: $note";

        $zaloLink = '';
        if (!empty($zaloOaId)) {
            $zaloLink = 'https://zalo.me/' . $zaloOaId;
        }

        echo json_encode([
            'success' => true,
            'message' => 'Đặt ship thành công! Đang chuyển đến Zalo...',
            'zalo_link' => $zaloLink,
            'zalo_text' => $message
        ], JSON_UNESCAPED_UNICODE);
        exit;
    }

    /**
     * API: Trả về settings JSON
     */
    public function settings() {
        header('Content-Type: application/json; charset=utf-8');
        header('Access-Control-Allow-Origin: *');

        $settingModel = new SettingModel();
        $settings = $settingModel->getAll();
        $result = [];
        if ($settings) {
            foreach ($settings as $s) {
                $result[$s->setting_key] = $s->setting_value;
            }
        }

        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }

    /**
     * API: Trả về danh sách sản phẩm theo category
     */
    public function products() {
        header('Content-Type: application/json; charset=utf-8');
        header('Access-Control-Allow-Origin: *');

        $categoryId = $_GET['category_id'] ?? null;
        $productModel = new ProductModel();

        if ($categoryId) {
            $data = $productModel->getByCategory($categoryId);
        } else {
            $data = $productModel->getActive();
        }

        echo json_encode(['success' => true, 'data' => $data], JSON_UNESCAPED_UNICODE);
        exit;
    }

    /**
     * API: Trả về danh sách tin tức theo category
     */
    public function news() {
        header('Content-Type: application/json; charset=utf-8');
        header('Access-Control-Allow-Origin: *');

        $categoryId = $_GET['category_id'] ?? null;
        $newsModel = new NewsModel();

        if ($categoryId) {
            $data = $newsModel->getByCategory($categoryId);
        } else {
            $data = $newsModel->getActive();
        }

        echo json_encode(['success' => true, 'data' => $data], JSON_UNESCAPED_UNICODE);
        exit;
    }

    /**
     * API: Trả về chi tiết sản phẩm theo id
     */
    public function productDetail() {
        header('Content-Type: application/json; charset=utf-8');
        header('Access-Control-Allow-Origin: *');

        $proId = $_GET['proId'] ?? null;
        if (!$proId) {
            echo json_encode(['Success' => false, 'Message' => 'Thiếu proId'], JSON_UNESCAPED_UNICODE);
            exit;
        }

        $productModel = new ProductModel();
        $p = $productModel->getById($proId);

        if (!$p) {
            echo json_encode(['Success' => false, 'Message' => 'Sản phẩm không tồn tại'], JSON_UNESCAPED_UNICODE);
            exit;
        }

        // Map fields to match what frontend expects
        $imgUrl = $p->img_thumbnail;
        if ($imgUrl) {
            if (!preg_match('/^images\//', $imgUrl) && !preg_match('/^https?:\/\//', $imgUrl)) {
                $imgUrl = '../MVC/' . $imgUrl;
            }
        } else {
            $imgUrl = 'images/produc.webp';
        }

        $formattedData = [
            'ProId' => $p->id,
            'ProName' => $p->name,
            'ProOriginPrice' => $p->price,
            'ProSapo' => $p->overview,
            'ProContent' => $p->content,
            'ProLinkDetail' => 'javascript:;',
            'LstImage' => [
                ['SrcOrigin' => $imgUrl, 'thumb' => $imgUrl]
            ]
        ];

        echo json_encode(['Success' => true, 'Data' => $formattedData], JSON_UNESCAPED_UNICODE);
        exit;
    }
}

