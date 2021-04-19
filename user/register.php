<?php
include "includes/header.php";
?>

<div class="register-wrapper">
    <div class="form-div card z-depth-5">
        <div class="card-header">
            <div class="card-title reg-head center-align">
                Register
            </div>
            <div class="card-content">
                <form class="formValidate" id="formValidate" method="post" action="handlers/register-router.php"
                    novalidate="novalidate" class="col s12">
                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="mdi-social-person-outline prefix"></i>
                            <input name="username" id="username" type="text" data-error=".errorTxt1">
                            <label for="username">Username</label>
                            <div class="errorTxt1"></div>
                        </div>

                    </div>

                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="mdi-social-person prefix"></i>
                            <input name="name" id="name" type="text" data-error=".errorTxt2">
                            <label for="name">Name</label>
                            <div class="errorTxt2"></div>
                        </div>
                    </div>
                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="mdi-action-lock-outline prefix"></i>
                            <input name="password" id="password" type="password" data-error=".errorTxt3">
                            <label for="password">Password</label>
                            <div class="errorTxt3"></div>
                        </div>
                    </div>
                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="mdi-communication-phone prefix"></i>
                            <input name="phone" id="phone" type="number" data-error=".errorTxt4">
                            <label for="phone">Phone</label>
                            <div class="errorTxt4"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <a href="javascript:void(0);" onclick="document.getElementById('formValidate').submit();"
                                class="btn waves-effect waves-light col s12">Register</a>
                        </div>

                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <p class="margin center medium-small sign-up">Already have an account? <a
                                    href="login.php">Login</a></p>
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