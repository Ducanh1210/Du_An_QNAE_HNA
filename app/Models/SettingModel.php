<?php
namespace App\Models;

class SettingModel extends BaseModel {
    
    public function getAll() {
        $sql = "SELECT * FROM settings ORDER BY id ASC";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function getByKey($key) {
        $sql = "SELECT * FROM settings WHERE setting_key = ?";
        $this->setQuery($sql);
        return $this->loadRow([$key]);
    }

    public function getValue($key) {
        $row = $this->getByKey($key);
        return $row ? $row->setting_value : '';
    }

    public function updateByKey($key, $value) {
        $sql = "UPDATE settings SET setting_value = ? WHERE setting_key = ?";
        $this->setQuery($sql);
        return $this->execute([$value, $key]);
    }

    public function updateMultiple($data) {
        foreach ($data as $key => $value) {
            $this->updateByKey($key, $value);
        }
        return true;
    }

    /**
     * Export settings to a JSON file for the static frontend to read
     */
    public function exportToJson($filePath) {
        $settings = $this->getAll();
        $result = [];
        if ($settings) {
            foreach ($settings as $s) {
                $result[$s->setting_key] = $s->setting_value;
            }
        }
        $dir = dirname($filePath);
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        file_put_contents($filePath, json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        return true;
    }
}
