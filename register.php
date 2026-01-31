<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BLITZ Auto Market - Register</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css">
  <!-- Lidhur me te njejtin CSS si Login -->
  <link rel="stylesheet" href="css/auth.css">
</head>
<body>
  <a href="index.php" class="back-btn"><i class="bi bi-chevron-left"></i>&nbsp; Back</a>
  <div class="login-container">
    <h2>Create Your Account</h2>
    <form id="registerForm">
      <label for="fullName">Full Name</label>
      <input type="text" id="fullName" placeholder="Enter your full name">
      <label for="email">Email</label>
      <input type="email" id="email" placeholder="Enter your email">
      <label for="password">Password</label>
      <input type="password" id="password" placeholder="Enter your password">
      <label for="confirmPassword">Confirm Password</label>
      <input type="password" id="confirmPassword" placeholder="Confirm your password">
      <button type="submit">Register</button>

      <p class="register-link">Already have an account? <a href="login.php">Login</a></p>
    </form>
  </div>

  <!-- Poashtu edhe JS eshte i perbashket -->
  <script src="js/auth.js"></script>
</body>
</html>
