<?php
// --- VPS / PRODUCTION CONFIGURATION ---
// Thay đổi các thông số này cho phù hợp với VPS của bạn
const DBHOST = "sql202.infinityfree.com";
const DBNAME = "if0_42324969_fanta";
const DBUSER = "if0_42324969";
const DBPASS = "EY4tiD9wMKCRD6";
const BASE_URL = "https://quanaev2.free.je/"; 
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