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
  <link rel="icon" href="assets/images/logo.ico" />
  <link rel="stylesheet" href="assets/css/all.min.css" />
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/normalize.css" />
  <link rel="stylesheet" href="assets/css/sign.css" />
</head>
<body>

<div class="form-box" id="login-form" style="<?= ($activeForm !== 'login') ? 'display:none;' : '' ?>">
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
      <p><a href="#" onclick="showForm('register-form')">New to GitHub? Create an account</a></p>
    </div>
  </div>
</div>

<div class="form-box" id="register-form" style="<?= ($activeForm !== 'register') ? 'display:none;' : '' ?>">
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
        <input type="password" id="password" name="password" required>
      </div>
      <input type="submit" name="register" value="Sign up">
    </form>
    <div class="form-depandency">
      <p><a href="#" onclick="showForm('login-form')">Already have an account? Sign in</a></p>
    </div>
  </div>
</div>

<script src="assets/js/bootstrap.min.js"></script>
<script>
function showForm(formId) {
  const login = document.getElementById('login-form');
  const register = document.getElementById('register-form');

  if (formId === 'login-form') {
    login.style.display = 'block';
    register.style.display = 'none';
  } else {
    login.style.display = 'none';
    register.style.display = 'block';
  }
}
</script>

</body>
</html>
