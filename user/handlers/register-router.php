<?php
include '../../config.php';
// $name = $username = $password = $phone = '';

$name = htmlspecialchars($_POST['name']);
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
$phone = $_POST['phone'];

// echo $_POST['name'];
// echo "<script>console.log('$name');</script>";

if ($name == '' || $username == '' || $password == '' || $phone == '') {

    $_SESSION['error_message'] = "All the fields are required!";
    header("location: ../register.php");
    exit();
}

function number($length)
{
    $result = '';

    for ($i = 0; $i < $length; $i++) {
        $result .= mt_rand(0, 9);
    }

    return $result;
}

$sql_check = mysqli_query($con, "SELECT * from users where username='$username' or contact='$phone'");
if (mysqli_num_rows($sql_check) > 0) {
    $_SESSION['error_message'] = "User with this username or phone number already exists!";
    header("location: ../register.php");
    exit();
}
// echo mysqli_num_rows($sql_check);

$sql = "INSERT INTO users (name, username, password, contact) VALUES ('$name', '$username', '$password', $phone);";
if ($con->query($sql) == true) {
    $user_id = $con->insert_id;
    $sql = "INSERT INTO wallet(customer_id) VALUES ($user_id)";
    if ($con->query($sql) == true) {
        $wallet_id = $con->insert_id;
        $cc_number = number(16);
        $cvv_number = number(3);
        $sql = "INSERT INTO wallet_details(wallet_id, number, cvv) VALUES ($wallet_id, $cc_number, $cvv_number)";
        $con->query($sql);
    }
}
header("location: ../login.php");