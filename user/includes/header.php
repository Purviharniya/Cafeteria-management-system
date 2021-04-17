<?php 
include("../config.php");
?>

<?php  
if(isset($_SESSION['admin_sid']))
{
	header("location:admin_index.php");
}
elseif(isset($_SESSION['customer_sid'])){
    header("location:customer_index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <title>CMS</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="../vendor/images/logo.jpg">

    <!-- CORE CSS-->

    <link href="vendor/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="vendor/css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->
    <link href="vendor/css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="vendor/css/layouts/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="vendor/css/custom/custom2.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="vendor/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet"
        media="screen,projection">

    <style type="text/css">
    .input-field div.error {
        position: relative;
        top: -1rem;
        left: 0rem;
        font-size: 0.8rem;
        color: #FF4081;
        -webkit-transform: translateY(0%);
        -ms-transform: translateY(0%);
        -o-transform: translateY(0%);
        transform: translateY(0%);
    }

    .input-field label.active {
        width: 100%;
    }

    .left-alert input[type=text]+label:after,
    .left-alert input[type=password]+label:after,
    .left-alert input[type=email]+label:after,
    .left-alert input[type=url]+label:after,
    .left-alert input[type=time]+label:after,
    .left-alert input[type=date]+label:after,
    .left-alert input[type=datetime-local]+label:after,
    .left-alert input[type=tel]+label:after,
    .left-alert input[type=number]+label:after,
    .left-alert input[type=search]+label:after,
    .left-alert textarea.materialize-textarea+label:after {
        left: 0px;
    }

    .right-alert input[type=text]+label:after,
    .right-alert input[type=password]+label:after,
    .right-alert input[type=email]+label:after,
    .right-alert input[type=url]+label:after,
    .right-alert input[type=time]+label:after,
    .right-alert input[type=date]+label:after,
    .right-alert input[type=datetime-local]+label:after,
    .right-alert input[type=tel]+label:after,
    .right-alert input[type=number]+label:after,
    .right-alert input[type=search]+label:after,
    .right-alert textarea.materialize-textarea+label:after {
        right: 70px;
    }
    </style>
</head>

<body class="">
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>