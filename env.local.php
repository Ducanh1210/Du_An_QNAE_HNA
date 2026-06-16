<?php
const DBNAME = "quannhau";
const DBCHARSET = "utf8mb4";
const DBUSER = "root";
const DBPASS = "";
const DBHOST = "localhost";
const BASE_URL = "http://localhost/Du_An_QNAE_HNA/";

if (!function_exists('route')) {
    function route($url) {
        return BASE_URL.$url;
    }
}

// key co the truyen success hoac errors
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

