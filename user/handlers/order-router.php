<?php
include '../../config.php';
include '../includes/wallet.php';
if (isset($_POST['action'])) {
    $total = 0;
    $address = htmlspecialchars($_POST['address']);
    $description = htmlspecialchars($_POST['description']);
    $payment_type = $_POST['payment_type'];
    $total = $_POST['total'];
    $sql = "INSERT INTO orders (customer_id, payment_type, address, total, description) VALUES ($user_id, '$payment_type', '$address', $total, '$description')";
    if ($con->query($sql) === true) {
        $order_id = $con->insert_id;
        foreach ($_POST as $key => $value) {
            if (is_numeric($key)) {
                $result = mysqli_query($con, "SELECT * FROM items WHERE id = $key");
                while ($row = mysqli_fetch_array($result)) {
                    $price = $row['price'];
                }
                $price = $value * $price;
                $sql = "INSERT INTO order_details (order_id, item_id, quantity, price) VALUES ($order_id, $key, $value, $price)";
                $con->query($sql) === true;
            }
        }
        if ($_POST['payment_type'] == 'Wallet') {
            $balance = $balance - $total;
            $sql = "UPDATE wallet_details SET balance = $balance WHERE wallet_id = $wallet_id;";
            $con->query($sql) === true;
        }
        header("location: ../orders.php");
    }
} else {
    header("location: ../all-orders.php");
}