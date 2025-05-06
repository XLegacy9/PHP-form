<?php
session_start();
require_once 'php/headers.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/animations.css">
</head>
<body>
    <?php if (isset($_SESSION['alert'])): ?>
    <div id="alert-data" 
         data-message="<?php echo htmlspecialchars($_SESSION['alert']['message']); ?>" 
         data-type="<?php echo htmlspecialchars($_SESSION['alert']['type']); ?>">
    </div>
    <?php 
        unset($_SESSION['alert']);
    endif; 
    ?>
    <div id="alert" class="alert"></div>
    <div class="container">
        <form id="modernForm" action="php/process-form.php" method="POST">
            <?php 
            
            $csrf_token = bin2hex(random_bytes(32));
            $_SESSION['csrf_token'] = $csrf_token;
            ?>
            <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">

            <h2 class="form-title">Registration Form</h2>
            
            <div class="form-group">
                <input type="text" id="username" name="username" required>
                <label for="username">Username</label>
                <span class="error-message"></span>
            </div>

            <div class="form-group">
                <input type="email" id="email" name="email" required>
                <label for="email">Email</label>
                <span class="error-message"></span>
            </div>

            <div class="form-group">
                <input type="password" id="password" name="password" required>
                <label for="password">Password</label>
                <span class="error-message"></span>
            </div>

            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>
    <script src="js/alerts.js"></script>
    <script src="js/validation.js"></script>
</body>
</html>