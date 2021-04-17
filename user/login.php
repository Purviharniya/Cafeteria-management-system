<?php
include "includes/header.php";
?>

<div class="register-wrapper">
    <div class="form-div card z-depth-5">
        <div class="card-header">
            <div class="card-title reg-head center-align">
                Login
            </div>
            <div class="card-content">
                <form method="post" action="routers/router.php" class="login-form col s12" id="form">
                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="mdi-social-person-outline prefix"></i>
                            <input name="username" id="username" type="text">
                            <label for="username">Username</label>
                        </div>
                    </div>
                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="mdi-action-lock-outline prefix"></i>
                            <input name="password" id="password" type="password">
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <a href="javascript:void(0);" onclick="document.getElementById('form').submit();"
                            class="btn waves-effect waves-light col s12">Login</a>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <p class="margin center medium-small sign-up">Don't have an account? <a
                                    href="register.php">Register</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include "includes/footer.php";
?>

<script type="text/javascript">
$("#formValidate").validate({
    rules: {
        username: {
            required: true,
            minlength: 5
        },
        name: {
            required: true,
            minlength: 5
        },
        password: {
            required: true,
            minlength: 5
        },
        phone: {
            required: true,
            minlength: 4
        },
    },
    messages: {
        username: {
            required: "Enter username",
            minlength: "Minimum 5 characters are required."
        },
        name: {
            required: "Enter name",
            minlength: "Minimum 5 characters are required."
        },
        password: {
            required: "Enter password",
            minlength: "Minimum 5 characters are required."
        },
        phone: {
            required: "Specify contact number.",
            minlength: "Minimum 4 characters are required."
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