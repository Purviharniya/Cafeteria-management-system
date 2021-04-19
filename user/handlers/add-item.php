<?php
include '../../config.php';

$name = $_POST['name'];
$price = $_POST['price'];
$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
$sql = "INSERT INTO items (name, price,image) VALUES ('$name', $price,'$image')";
$con->query($sql);
$_SESSION['success_message'] = "Item added successfully!";
header("location: ../admin-page.php");