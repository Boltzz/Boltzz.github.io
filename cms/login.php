<?php
require_once 'classes/User.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = new User();
    $loggedInUser = $user->login($_POST['username'], $_POST['password']);
    if ($loggedInUser) {
        $_SESSION['user'] = $loggedInUser;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>CMS Login</title>
</head>
<body>
    <div class="section">
        <h2>Login to CMS</h2>
        <?php if (isset($error)): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>