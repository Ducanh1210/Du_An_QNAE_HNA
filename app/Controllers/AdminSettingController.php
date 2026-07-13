<?php
namespace App\Controllers;

use App\Models\SettingModel;

class AdminSettingController extends BaseController {
    
    private $settingModel;

    public function __construct() {
        $this->settingModel = new SettingModel();
    }

    public function index() {
        $settings = $this->settingModel->getAll();
        $data = [];
        if ($settings) {
            foreach ($settings as $s) {
                $data[$s->setting_key] = $s->setting_value;
            }
        }
        $this->render('admin.settings.form', compact('data'));
    }

    public function update() {
        $keys = [
            'zalo_link', 'facebook_link', 'tiktok_link', 
            'instagram_link', 'youtube_link',
            'phone_datban', 'phone_datship', 'zalo_oa_id_datban', 'zalo_oa_id_datship'
        ];

        $updateData = [];
        foreach ($keys as $key) {
            $updateData[$key] = $_POST[$key] ?? '';
        }

        $this->settingModel->updateMultiple($updateData);

        // Export settings.json for frontend
        $jsonPath = dirname(dirname(__DIR__)) . '/data/settings.json';
        $success = $this->settingModel->exportToJson($jsonPath);
        
        if (!$success) {
            flash('error', 'Cập nhật database thành công nhưng không thể ghi file data/settings.json do lỗi phân quyền (Permission Denied). Vui lòng chmod 777 hoặc chown thư mục data/ trên VPS.', 'settings');
        } else {
            flash('success', 'Cập nhật cài đặt thành công', 'settings');
        }
    }
}
