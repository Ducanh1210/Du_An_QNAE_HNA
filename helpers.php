<?php
if (!function_exists('uploadFile')) {

function uploadFile(array $file, $folder = 'examples')
    {
        // Kiểm tra nếu không có file hoặc file lỗi
        if (!isset($file['error']) || $file['error'] !== UPLOAD_ERR_OK) {
            return null;
        }
    
        // Lấy phần mở rộng file (jpg, png, ...)
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        
        // Đặt tên file tránh trùng
        $fileName = time() . '-' . uniqid() . '.' . $ext;
    
        // Thư mục lưu trữ
        $uploadDir = 'storage/uploads/' . trim($folder, '/') . '/';
    
        // Tạo thư mục nếu chưa có
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
    
        // Đường dẫn đầy đủ
        $destPath = $uploadDir . $fileName;
    
        // Di chuyển file
        if (move_uploaded_file($file['tmp_name'], $destPath)) {
            // Nếu là file PNG và thư viện GD khả dụng, tiến hành tự động cắt sát vật thể
            if (strtolower($ext) === 'png' && extension_loaded('gd')) {
                autocropTransparentPng($destPath);
            }
            return $destPath; // Trả về đường dẫn để lưu vào database
        }
    
        return null; // Trả về null nếu có lỗi
    }

}

if (!function_exists('autocropTransparentPng')) {
    /**
     * Tự động nhận diện và cắt sát phần khoảng trống trong suốt (transparent border) của ảnh PNG.
     */
    function autocropTransparentPng($filePath) {
        if (!file_exists($filePath)) return false;
        
        $img = @imagecreatefrompng($filePath);
        if (!$img) return false;

        $width = imagesx($img);
        $height = imagesy($img);

        $top = null;
        $bottom = null;
        $left = null;
        $right = null;

        // Quét các pixel của ảnh để tìm vùng chứa vật thể (không trong suốt hoàn toàn)
        for ($y = 0; $y < $height; $y++) {
            for ($x = 0; $x < $width; $x++) {
                $color = imagecolorat($img, $x, $y);
                // Lấy kênh alpha (trong GD: 127 = trong suốt tuyệt đối, 0 = hiển thị rõ hoàn toàn)
                $alpha = ($color >> 24) & 0x7F;
                
                if ($alpha < 120) { // Nếu pixel này có độ hiển thị (> 5% opacity)
                    if ($top === null) $top = $y;
                    $bottom = $y;
                    
                    if ($left === null || $x < $left) $left = $x;
                    if ($right === null || $x > $right) $right = $x;
                }
            }
        }

        // Nếu không quét được vùng hiển thị nào (ảnh trống trơn), giải phóng bộ nhớ và thoát
        if ($top === null) {
            imagedestroy($img);
            return false;
        }

        // Thêm một khoảng đệm nhỏ (padding) 5px để ảnh không bị cắt quá sát mép
        $padding = 5;
        $left = max(0, $left - $padding);
        $top = max(0, $top - $padding);
        $right = min($width - 1, $right + $padding);
        $bottom = min($height - 1, $bottom + $padding);

        $cropWidth = $right - $left + 1;
        $cropHeight = $bottom - $top + 1;

        // Tiến hành crop ảnh theo khung bao quanh vật thể
        $cropped = imagecrop($img, [
            'x' => $left,
            'y' => $top,
            'width' => $cropWidth,
            'height' => $cropHeight
        ]);

        if ($cropped !== false) {
            // Giữ lại cấu hình kênh alpha (trong suốt)
            imagealphablending($cropped, false);
            imagesavealpha($cropped, true);
            
            // Lưu đè lại file cũ
            imagepng($cropped, $filePath);
            imagedestroy($cropped);
        }
        
        imagedestroy($img);
        return true;
    }
}

if (!function_exists('request_uri')) {
    function request_uri() {
        return isset($_GET['url']) ? '/' . $_GET['url'] : '/';
    }
}
?>