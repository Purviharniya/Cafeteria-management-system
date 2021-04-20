<?php
include '../../config.php';
if (isset($_POST['action'])) {
    $status = $_POST['status'];
    $id = $_POST['id'];

    $sql = "UPDATE orders SET status='$status' WHERE id=$id;";
    $con->query($sql);

    header("location: ../all-orders.php");
} else {
    header("location: ../all-orders.php");
}