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
            'phone_datban', 'phone_datship', 'zalo_oa_id'
        ];

        $updateData = [];
        foreach ($keys as $key) {
            $updateData[$key] = $_POST[$key] ?? '';
        }

        $this->settingModel->updateMultiple($updateData);

        // Export settings.json for frontend
        $basePath = dirname(dirname(dirname(__DIR__)));
        $jsonPath = $basePath . '/gdquannhau/data/settings.json';
        $this->settingModel->exportToJson($jsonPath);

        flash('success', 'Cập nhật cài đặt thành công', 'settings');
    }
}
