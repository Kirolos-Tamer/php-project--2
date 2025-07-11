<?php
session_start();
$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? ''
];
$activeForm = $_SESSION['active_form'] ?? 'login';
session_unset();

function showError($error) {
    return !empty($error) ? "<p class='error-message'>$error</p>" : '';
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>GitHub</title>
  
  <!-- Logo icon -->
  <link rel="icon" href="assets/images/logo.ico" />
  <!-- Font Awesome css -->
  <link rel="stylesheet" href="assets/css/all.min.css" />
  <!-- Bootstrap css -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <!-- Normalize css -->
  <link rel="stylesheet" href="assets/css/normalize.css" />
  <!-- Fonts css -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
    rel="stylesheet" />
  <!-- Style File -->
  <link rel="stylesheet" href="assets/css/sign.css" />
</head>
<body>

<div class="form-box" id="login-form" style="<?= ($activeForm !== 'login') ? 'display:none;' : '' ?>" >
  <div class="container">
    <div class="form-logo">
      <img src="assets/images/logo.jpg" alt="Logo-image">
    </div>
    <h3 class="form-label">Sign in to GitHub</h3>
    <?= showError($errors['login']); ?>
    <form action="login_register.php" method="post" class="signin">
      <label for="email">Username or email address</label>
      <input type="text" id="email" name="email" required>
      <label for="password">Password</label>
      <input type="password" id="password" name="password" required>
      <input type="submit" name="login" value="Sign in">
    </form>
    <div class="form-depandency">
      <p>Sign in with a passkey</p>
      <p>New to GitHub? <a href="#" onclick="showForm('register-form')">Create an account</a></p>
    </div>
    
      <ul class="links">
        <li><a href="#">Terms</a></li>
        <li><a href="#">Privacy</a></li>
        <li><a href="#">Docs</a></li>
        <li><a href="#">Contact GitHub Support</a></li>
        <li><a href="#">Manage cookies</a></li>
        <li><a href="#">Do not share my personal information</a></li>
      </ul>
  </div>
</div>

<div class="form-box" id="register-form" style="<?= ($activeForm !== 'register') ? 'display:none;' : '' ?>" >
  <div class="container">
    <div class="form-logo">
      <img src="assets/images/logo.jpg" alt="Logo-image">
    </div>
    <h3 class="form-label">Sign up to GitHub</h3>
    <?= showError($errors['register']); ?>
    <form action="login_register.php" method="post" class="signup">
      <div class="input-container">
        <label for="firstname">First Name</label>
        <input type="text" id="firstname" name="firstname" required>
      </div>
      <div class="input-container">
        <label for="secondname">Last Name</label>
        <input type="text" id="secondname" name="lastname" required>
      </div>
      <div class="input-container">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="input-container">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="input-container">
        <label for="phonenumber">Phone Number</label>
        <input type="tel" id="phonenumber" name="phonenumber" required>
      </div>
      <div class="input-container">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" 
          pattern="^(?=.*[a-zA-Z])(?=.*\d)(?=.*[\W_]).{8,}$" 
          title="Password must be at least 8 characters, and include letters, numbers, and special characters." 
          required >
      </div>
      <input type="submit" name="register" value="Sign up">
    </form>
    <div class="form-depandency">
      <p>Sign in with a passkey</p>
      <p>Already have an account? <a href="#" onclick="showForm('login-form')">Sign in</a></p>
    </div>
    
      <ul class="links">
        <li><a href="#">Terms</a></li>
        <li><a href="#">Privacy</a></li>
        <li><a href="#">Docs</a></li>
        <li><a href="#">Contact GitHub Support</a></li>
        <li><a href="#">Manage cookies</a></li>
        <li><a href="#">Do not share my personal information</a></li>
      </ul>

  </div>
</div>

<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/script.js"></script>

</body>
</html>
