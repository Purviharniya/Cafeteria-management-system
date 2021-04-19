<?php
include '../config.php';
include 'includes/wallet.php';

if ($_SESSION['customer_sid'] == session_id()) {
    $name = $_SESSION['name'];
    $role = $_SESSION['role'];
    $user_id = $_SESSION['user_id'];
    $result = mysqli_query($con, "SELECT * FROM users where id = $user_id");
    while ($row = mysqli_fetch_array($result)) {
        $name = $row['name'];
        $address = $row['address'];
        $contact = $row['contact'];
        $verified = $row['verified'];
    }
} elseif ($_SESSION['admin_sid'] == session_id()) {
    $name = $_SESSION['name'];
    $role = $_SESSION['role'];
    header("location:admin-page.php");
} else {
    header("location:login.php");
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
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="vendor/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet"
        media="screen,projection">
    <link href="vendor/js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet"
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

<body>
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START HEADER -->
    <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="navbar-color">
                <div class="nav-wrapper">
                    <ul class="left">
                        <li>
                            <h1 class="logo-wrapper"><a href="index.php" class="brand-logo darken-1"><img
                                        src="../vendor/images/logo.jpg" height="40" alt="logo"></a> <span
                                    class="logo-text">Logo</span></h1>
                        </li>
                    </ul>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="#" class="waves-effect waves-block waves-light"
                                style="font=-weight:700;font-size:1.5rem;">Rs. <?php echo $balance; ?></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- end header nav-->
    </header>
    <!-- END HEADER -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START MAIN -->
    <div id="main">
        <!-- START WRAPPER -->
        <div class="wrapper">

            <!-- START LEFT SIDEBAR NAV-->
            <aside id="left-sidebar-nav">
                <ul id="slide-out" class="side-nav fixed leftside-navigation">
                    <li class="user-details cyan darken-2">
                        <div class="row">
                            <div class="col col s4 m4 l4">
                                <img src="images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
                            </div>
                            <div class="col col s8 m8 l8">
                                <ul id="profile-dropdown" class="dropdown-content">
                                    <li><a href="routers/logout.php"><i class="mdi-hardware-keyboard-tab"></i>
                                            Logout</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col col s8 m8 l8">
                                <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn"
                                    href="#" data-activates="profile-dropdown"><?php echo $name; ?> <i
                                        class="mdi-navigation-arrow-drop-down right"></i></a>
                                <p class="user-roal"><?php echo $role; ?></p>
                            </div>
                        </div>
                    </li>
                    <li class="bold active"><a href="index.php" class="waves-effect waves-cyan"><i
                                class="mdi-editor-border-color"></i> Order Food</a>
                    </li>
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i
                                        class="mdi-editor-insert-invitation"></i> Orders</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="orders.php">All Orders</a>
                                        </li>
                                        <?php
$sql = mysqli_query($con, "SELECT DISTINCT status FROM orders WHERE customer_id = $user_id;");
while ($row = mysqli_fetch_array($sql)) {
    echo '<li><a href="orders.php?status=' . $row['status'] . '">' . $row['status'] . '</a>
                                    </li>';
}
?>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i
                                        class="mdi-action-question-answer"></i> Feedbacks</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="feedbacks.php">All Feedbacks</a>
                                        </li>
                                        <?php
$sql = mysqli_query($con, "SELECT DISTINCT status FROM tickets WHERE poster_id = $user_id AND not deleted;");
while ($row = mysqli_fetch_array($sql)) {
    echo '<li><a href="tickets.php?status=' . $row['status'] . '">' . $row['status'] . '</a>
                                    </li>';
}
?>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="bold"><a href="details.php" class="waves-effect waves-cyan"><i
                                class="mdi-social-person"></i> Edit Details</a>
                    </li>
                </ul>
                <a href="#" data-activates="slide-out"
                    class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i
                        class="mdi-navigation-menu"></i></a>
            </aside>
            <!-- END LEFT SIDEBAR NAV-->