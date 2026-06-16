<?php
const DBNAME = "if0_42192573_quanae";
const DBCHARSET = "utf8mb4";
const DBUSER = "if0_42192573";
const DBPASS = "MhAswqtZYBmk4kC";
const DBHOST = "sql113.infinityfree.com";
const BASE_URL = "http://quanae.xo.je/";
function route($url) {
    return BASE_URL.$url;
}
// key co the truyen success hoac errors
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