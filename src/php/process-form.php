<?php
session_start();
require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verify CSRF token
    if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die('CSRF token validation failed');
    }

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try {
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username, $email, $password]);
        
        $_SESSION['alert'] = [
            'type' => 'success',
            'message' => 'Registration successful!'
        ];
    } catch(PDOException $e) {
        $_SESSION['alert'] = [
            'type' => 'error',
            'message' => 'Registration failed. Please try again.'
        ];
    }
    
    // Redirect back to the form
    header("Location: ../index.php");
    exit();
}