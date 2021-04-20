<?php
include '../../config.php';
$user_id = $_SESSION['user_id'];

$name = htmlspecialchars($_POST['name']);
$username = htmlspecialchars($_POST['username']);
$phone = $_POST['phone'];
$email = htmlspecialchars($_POST['email']);
$address = htmlspecialchars($_POST['address']);

if ($_POST['password'] != '') {
    $password = htmlspecialchars($_POST['password']);
    $sql = "UPDATE users SET name = '$name', username = '$username', password='$password', contact=$phone, email='$email', address='$address' WHERE id = $user_id;";
} else {
    $sql = "UPDATE users SET name = '$name', username = '$username', contact=$phone, email='$email', address='$address' WHERE id = $user_id;";
}

if ($con->query($sql) == true) {
    $_SESSION['name'] = $name;
}
$_SESSION['success_message'] = "Details updated successfully!";
header("location: ../details.php");