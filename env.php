<?php
if (file_exists(__DIR__ . '/env.local.php')) {
    include __DIR__ . '/env.local.php';
    return;
}

const DBNAME = "if0_42324969_fanta";
const DBCHARSET = "utf8mb4";
const DBUSER = "if0_42324969";
const DBPASS = "EY4tiD9wMKCRD6";
const DBHOST = "127";
const BASE_URL = "https://quanaev2.free.je/";
if (!function_exists('route')) {
    function route($url) {
        return BASE_URL.$url;
    }
}

if (!function_exists('flash')) {
    function flash($key,$msg,$route)  {
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
        header('location:'.BASE_URL.$route.$separator.'msg='.$key);die;
    }
}