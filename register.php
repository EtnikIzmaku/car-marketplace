<?php
session_start();
include 'backend/User.php';

$userObj = new User();
$fieldErrors = [];
$formError = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $full_name = trim($_POST['fullName']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirmPassword']);

    $fieldErrors = [];
    $formError = '';

    if ($userObj->emailExists($email)) {
        $fieldErrors['email'] = "Ky email është regjistruar më parë";
    } else {
        $register = $userObj->register($full_name, $email, $password);

        if ($register) {
            $_SESSION['success'] = "Regjistrimi i suksesshëm! Ju lutem logohuni.";
            header("Location: login.php");
            exit;
        } else {
            $formError = "Gabim gjatë regjistrimit. Provo përsëri.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BLITZ Auto Market - Register</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="css/auth.css">
</head>
<body>
  <a href="index.php" class="back-btn"><i class="bi bi-chevron-left"></i>&nbsp; Back</a>
  <div class="login-container">
    <h2>Create Your Account</h2>

    <?php if(!empty($errors)): ?>
      <div class="errors">
        <ul>
          <?php foreach($errors as $error): ?>
            <li><?= htmlspecialchars($error) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <form novalidate id="registerForm" method="POST" action="">
      <label for="fullName">Full Name</label>
      <input type="text" id="fullName" name="fullName" placeholder="Enter your full name" required <?= isset($fieldErrors['fullName']) ? 'class="invalid"' : '' ?> >
      <?php if(isset($fieldErrors['fullName'])): ?>
        <div class="error-message"><?= htmlspecialchars($fieldErrors['fullName']) ?></div>
      <?php endif; ?>

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

      <label for="confirmPassword">Confirm Password</label>
      <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm your password" required <?= isset($fieldErrors['confirmPassword']) ? 'class="invalid"' : '' ?> >
      <?php if(isset($fieldErrors['confirmPassword'])): ?>
        <div class="error-message"><?= htmlspecialchars($fieldErrors['confirmPassword']) ?></div>
      <?php endif; ?>

      <?php if (!empty($formError)): ?>
        <div class="error-message"><?= htmlspecialchars($formError) ?></div>
      <?php endif; ?>

      <button type="submit">Register</button>

      <p class="register-link">Already have an account? <a href="login.php">Login</a></p>
    </form>
  </div>

  <script src="js/auth.js"></script>
</body>
</html>
