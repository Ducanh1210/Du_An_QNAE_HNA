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
        $basePath = dirname(dirname(dirname(__DIR__)));
        $jsonPath = $basePath . '/gdquannhau/data/settings.json';
        $this->settingModel->exportToJson($jsonPath);

        // Export local settings.json for localhost
        $localJsonPath = $basePath . '/Du_An_QNAE_HNA/data/settings.json';
        $this->settingModel->exportToJson($localJsonPath);

        flash('success', 'Cập nhật cài đặt thành công', 'settings');
    }
}
