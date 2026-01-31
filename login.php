<?php
session_start();
include 'backend/User.php';

$userObj = new User();
$errors = [];
$fieldErrors = [];
$formError = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $user = $userObj->login($email, $password);
    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = (int)$user['role'];
        $_SESSION['full_name'] = $user['full_name'];

        header("Location: index.php");
        exit;
    } else {
        if (!$userObj->emailExists($email)) {
            $fieldErrors['email'] = "Ky user nuk ekziston";
        } else {
            $fieldErrors['password'] = "Password i gabuar";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BLITZ Auto Market - Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="css/auth.css">
</head>
<body>
  <a href="index.php" class="back-btn"><i class="bi bi-chevron-left"></i>&nbsp; Back</a>
  <div class="login-container">
    <h2>Login to BLITZ Auto Market</h2>

    <form id="loginForm" novalidate method="POST" action="">
      
      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Enter your email" required <?= isset($fieldErrors['email']) ? 'class="invalid"' : '' ?> >
      <?php if(isset($fieldErrors['email'])): ?>
        <div class="error-message"><?= htmlspecialchars($fieldErrors['email']) ?></div>
      <?php endif; ?>

      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Enter your password" required <?= isset($fieldErrors['password']) ? 'class="invalid"' : '' ?> >
      <?php if(isset($fieldErrors['password'])): ?>
        <div class="error-message"><?= htmlspecialchars($fieldErrors['password']) ?></div>
      <?php endif; ?>

      <div class="options-row">
        <div class="checkbox-container">
          <input type="checkbox" id="rememberMe">
          <label for="rememberMe">Remember me</label>
        </div>
        <div class="forgot-password">
          <a href="#">Forgot password?</a>
        </div>
      </div>

      <button type="submit">Login</button>

      <p class="register-link">Don't have an account? <a href="register.php">Register</a></p>
    </form>
  </div>

  <script src="js/auth.js"></script>
</body>
</html>
