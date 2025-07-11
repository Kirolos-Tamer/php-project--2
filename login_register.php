<?php
session_start();
require_once 'config.php';

if (isset($_POST['register'])) {
    $firstname = $_POST['firstname'];
    $secondname = $_POST['lastname'];
    $username = $_POST['username'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $checkUserName = $conn->query("SELECT username FROM users WHERE username = '$username'");
    $checkPhoneNumber = $conn->query("SELECT phonenumber FROM users WHERE phonenumber = '$phonenumber'");
    $checkEmail = $conn->query("SELECT email FROM users WHERE email = '$email'");

    if ($checkEmail && $checkEmail->num_rows > 0) {
        $_SESSION['register_error'] = 'Email is already registered';
        $_SESSION['active_form'] = 'register';
    } elseif ($checkUserName && $checkUserName->num_rows > 0) {
        $_SESSION['register_error'] = 'Username is already taken';
        $_SESSION['active_form'] = 'register';
    } elseif ($checkPhoneNumber && $checkPhoneNumber->num_rows > 0) {
        $_SESSION['register_error'] = 'Phone number is already registered';
        $_SESSION['active_form'] = 'register';
    } else {
        $insert = $conn->query("INSERT INTO users (firstname, lastname, username, phonenumber, email, password)
        VALUES ('$firstname','$secondname','$username','$phonenumber','$email','$password')");

        if ($insert) {
            $_SESSION['login_success'] = 'Registered successfully! Please login';
            $_SESSION['active_form'] = 'login';
        } else {
            $_SESSION['register_error'] = 'Registration failed: ' . $conn->error;
            $_SESSION['active_form'] = 'register';
        }
    }
    header("Location: index.php");
    exit();
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email = '$email' OR username = '$email'");

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION["firstname"] = $user["firstname"];
            $_SESSION["secondname"] = $user["lastname"];
            $_SESSION["username"] = $user["username"];
            $_SESSION["phonenumber"] = $user["phonenumber"];
            $_SESSION["email"] = $user["email"];
            header("Location: home.php");
            exit();
        }
    }

    $_SESSION['login_error'] = 'Incorrect email or password';
    $_SESSION['active_form'] = 'login';

    header("Location: index.php");
    exit();
}
?>
