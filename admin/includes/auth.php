<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!defined('ADMIN_LOGIN_USERNAME')) {
    define('ADMIN_LOGIN_USERNAME', 'admin');
}
if (!defined('ADMIN_LOGIN_PASSWORD')) {
    define('ADMIN_LOGIN_PASSWORD', 'admin@123');
}

function admin_is_logged_in() {
    return !empty($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
}

function require_admin_login() {
    if (admin_is_logged_in()) {
        return;
    }

    $current = $_SERVER['REQUEST_URI'] ?? '/admin/index.php';
    $redirect = urlencode($current);
    header("Location: login.php?redirect={$redirect}");
    exit;
}

