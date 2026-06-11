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
            return $destPath; // Trả về đường dẫn để lưu vào database
        }
    
        return null; // Trả về null nếu có lỗi
    }

}

if (!function_exists('request_uri')) {
    function request_uri() {
        return isset($_GET['url']) ? '/' . $_GET['url'] : '/';
    }
}
?>