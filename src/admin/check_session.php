<?php
function checkAdminSession() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true || !isset($_SESSION['admin_username'])) {
        header('Location: login.php');
        exit;
    }
}