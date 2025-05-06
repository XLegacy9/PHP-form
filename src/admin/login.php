<?php
session_start();
require_once '../php/headers.php';

// Admin credentials
define('ADMIN_USERNAME', 'admin');
// In production, use a properly hashed password stored securely
define('ADMIN_PASSWORD', '$2y$10$YourSecureHashHere'); // Replace with actual hash

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = $_POST['password'];

    if ($username === ADMIN_USERNAME && $password === 'admin123') {
        $_SESSION['admin'] = true;
        $_SESSION['admin_username'] = ADMIN_USERNAME; // Set the admin username
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Invalid credentials';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/animations.css">
</head>
<body>
    <div class="container">
        <form method="POST" class="admin-login-form">
            <h2 class="form-title">Admin Login</h2>
            <?php if (isset($error)): ?>
                <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>
            
            <div class="form-group">
                <input type="text" id="username" name="username" required>
                <label for="username">Username</label>
            </div>

            <div class="form-group">
                <input type="password" id="password" name="password" required>
                <label for="password">Password</label>
            </div>

            <button type="submit" class="submit-btn">Login</button>
        </form>
    </div>
</body>
</html>