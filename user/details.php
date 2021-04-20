<?php
include "includes/customer_header.php";
$user_id = $_SESSION['user_id'];

$result = mysqli_query($con, "SELECT * FROM users where id = $user_id");
while ($row = mysqli_fetch_array($result)) {
    $name = $row['name'];
    $address = $row['address'];
    $contact = $row['contact'];
    $email = $row['email'];
    $username = $row['username'];
}
if ($_SESSION['customer_sid'] == session_id()) {
    ?>

<body>
    <!-- START CONTENT -->
    <section id="content">

        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col s12 m12 l12">
                        <h5 class="breadcrumbs-title">User Details</h5>
                    </div>
                </div>
            </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
            <p class="caption">Edit your details here which are required for delivery and contact.</p>
            <div class="divider"></div>
            <?php
if (isset($_SESSION['success_message'])) {?>
            <div class="alert alert-success">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <?php echo $_SESSION['success_message']; ?>
            </div>
            <?php
unset($_SESSION['success_message']);
    }
    ?>
            <div class="row">
                <div class="col s12 m4 l3">
                    <h4 class="header">Details</h4>
                </div>
                <div>
                    <div class="card-panel">
                        <div class="row">
                            <form class="formValidate" id="formValidate" method="post"
                                action="handlers/details-router.php" novalidate="novalidate" class="col s12">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="mdi-social-person prefix"></i>
                                        <input name="username" id="username" type="text"
                                            value="<?php echo $username; ?>" data-error=".errorTxt1">
                                        <label for="username" class="">Username</label>
                                        <div class="errorTxt1"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="mdi-social-person-outline prefix"></i>
                                        <input name="name" id="name" type="text" value="<?php echo $name; ?>"
                                            data-error=".errorTxt2">
                                        <label for="name" class="">Name</label>
                                        <div class="errorTxt2"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="mdi-communication-email prefix"></i>
                                        <input name="email" id="email" type="email" value="<?php echo $email; ?>"
                                            data-error=".errorTxt3">
                                        <label for="email" class="">Email</label>
                                        <div class="errorTxt3"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="mdi-action-lock-outline prefix"></i>
                                        <input name="password" id="password" type="password" data-error=".errorTxt4">
                                        <label for="password" class="">Password</label>
                                        <div class="errorTxt4"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="mdi-notification-phone-in-talk prefix"></i>
                                        <input name="phone" id="phone" type="number" value="<?php echo $contact; ?>"
                                            data-error=".errorTxt5">
                                        <label for="phone" class="">Contact</label>
                                        <div class="errorTxt5"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="mdi-action-home prefix"></i>
                                        <textarea name="address" id="address" class="materialize-textarea validate"
                                            data-error=".errorTxt6"><?php echo $address; ?></textarea>
                                        <label for="address" class="">Address</label>
                                        <div class="errorTxt6"></div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <button class="btn  waves-effect waves-light right deep-purple darken-4 "
                                                type="submit" name="action">Submit
                                                <i class="mdi-content-send right"></i>
                                            </button>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="divider"></div>

            </div>
            <!--end container-->

    </section>
    <!-- END CONTENT -->
    </div>
    <!-- END WRAPPER -->

    </div>
    <!-- END MAIN -->

    <script type="text/javascript">
    $("#formValidate").validate({
        rules: {
            username: {
                required: true,
                minlength: 5,
                maxlength: 10
            },
            name: {
                required: true,
                minlength: 5,
                maxlength: 15
            },
            email: {
                required: true,
                maxlength: 35,
            },
            password: {
                required: true,
                minlength: 5,
                maxlength: 16,
            },
            phone: {
                required: true,
                minlength: 4,
                maxlength: 11
            },
            address: {
                required: true,
                minlength: 10,
                maxlength: 300
            },
        },
        messages: {
            username: {
                required: "Enter username",
                minlength: "Minimum 5 characters are required.",
                maxlength: "Maximum 10 characters are required."
            },
            name: {
                required: "Enter name",
                minlength: "Minimum 5 characters are required.",
                maxlength: "Maximum 15 characters are required."
            },
            email: {
                required: "Enter email",
                maxlength: "Maximum 35 characters are required."
            },
            password: {
                required: "Enter password",
                minlength: "Minimum 5 characters are required.",
                maxlength: "Maximum 16 characters are required."
            },
            phone: {
                required: "Specify contact number.",
                minlength: "Minimum 4 characters are required.",
                maxlength: "Maximum 11 digits are accepted."
            },
            address: {
                required: "Specify address",
                minlength: "Minimum 10 characters are required.",
                maxlength: "Maximum 300 characters are accepted."
            },
        },
        errorElement: 'div',
        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        }
    });
    </script>


</body>
<?php

    include "includes/customer_footer.php";
    ?>

</html>
<?php
} else {
    if ($_SESSION['admin_sid'] == session_id()) {
        header("location:admin-page.php");
    } else {
        header("location:login.php");
    }
}
?>