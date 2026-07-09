<?php
// --- VPS / PRODUCTION CONFIGURATION ---
// Thay đổi các thông số này cho phù hợp với VPS của bạn
const DBHOST = "127.0.0.1";
const DBNAME = "quannhau";
const DBUSER = "webquannhau";
const DBPASS = "quannhauanhem123@";
const BASE_URL = "https://quannhauanhem.com/";
const DBCHARSET = "utf8mb4";

// =========================================================================
// HELPER FUNCTIONS
// =========================================================================
if (!function_exists('route')) {
    // Helper function to generate full URL path
    function route($url) {
        return BASE_URL . $url;
    }
}

if (!function_exists('flash')) {
    // Helper function to set session flash messages and redirect
    function flash($key, $msg, $route)  {
        $_SESSION[$key] = $msg;
        switch ($key) {
            case 'success':
                unset($_SESSION['errors']);
                break;
            case 'errors':
                unset($_SESSION['success']);
                break;
        }
        $separator = strpos($route, '?') !== false ? '&' : '?';
        header('location:' . BASE_URL . $route . $separator . 'msg=' . $key);
        die;
    }
}