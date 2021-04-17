<?php
ob_start();
session_start();
$timezone = date_default_timezone_set("Asia/Kolkata");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cms";
$con = mysqli_connect($servername, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    echo "Could not connect to the database:" . mysqli_connect_errno();
}