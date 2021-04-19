<?php

include "includes/customer_header.php";

?>
<!-- START CONTENT -->
<section id="content">

    <!--breadcrumbs start-->
    <div id="breadcrumbs-wrapper">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l12">
                    <h5 class="breadcrumbs-title">Feedbacks</h5>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->


    <!--start container-->
    <div class="container">
        <p class="caption">If you're experiencing any issues, contact us by writing your feedback.</p>
        <div class="divider"></div>
        <div class="row">
            <div class="col s12 m4 l3">
                <h4 class="header">Add a Feedback</h4>
            </div>
            <div>
                <div class="card-panel">
                    <div class="row">
                        <form class="formValidate" id="formValidate" method="post" action="handlers/add-ticket.php"
                            novalidate="novalidate" class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="subject" id="subject" type="text" data-error=".errorTxt1">
                                    <label for="subject" class="">Subject</label>
                                    <div class="errorTxt1"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea name="description" id="description" class="materialize-textarea validate"
                                        data-error=".errorTxt2"></textarea>
                                    <label for="description" class="">Description</label>
                                    <div class="errorTxt2"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s4">
                                    <select name="type">
                                        <option disabled selected>Choose a type</option>
                                        <option value="Support">Support</option>
                                        <option value="Payment">Payment</option>
                                        <option value="Complaint">Complaint</option>
                                        <option value="Others">Others</option>
                                    </select>
                                    <label>Type</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="hidden" value="<?php echo $user_id; ?>" name="id">
                                        <button class="btn waves-effect waves-light right deep-purple darken-4" type="submit"
                                            name="action">Submit
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


        <!-- END CONTENT -->
    </div>


    <!--start container-->
    <div class="container">
        <p class="caption">List of your tickets</p>
        <div class="divider"></div>
        <div id="work-collections">
            <ul id="projects-collection" class="collection">
                <?php
if (isset($_GET['status'])) {
    $status = $_GET['status'];
} else {
    $status = '%';
}
$sql = mysqli_query($con, "SELECT * FROM tickets WHERE poster_id = $user_id AND status LIKE '$status' AND not deleted;");
while ($row = mysqli_fetch_array($sql)) {
    echo '<a href="view-ticket.php?id=' . $row['id'] . '"class="collection-item">
                                        <div class="row">
                                            <div class="col s6">
                                                <p class="collections-title">' . $row['subject'] . '</p>
                                            </div>
                                            <div class="col s2">
                                            <span class="task-cat cyan">' . $row['status'] . '</span></div>
                                            <div class="col s2">
                                            <span class="task-cat grey darken-3">' . $row['type'] . '</span></div>
                                            <div class="col s2">
                                            <span class="badge">' . $row['date'] . '</span></div>
                                        </div>
                                    </a>';
}
?>
            </ul>
        </div>
        <div class="divider"></div>

    </div>
    <!--end container-->


    <!-- END CONTENT -->
    <?php

include "includes/customer_footer.php";

?>
    <script type="text/javascript">
    $("#formValidate").validate({
        rules: {
            subject: {
                required: true,
                minlength: 5,
                maxlength: 100
            },
            description: {
                required: true,
                minlength: 20,
                maxlength: 300
            },
            type: {
                required: true,
            },
        },
        messages: {
            subject: {
                required: "Provide a subject",
                minlength: "Minimum 5 characters are required.",
                maxlength: "Maximum 100 characters are required."
            },
            description: {
                required: "Provide description of your problem",
                minlength: "Minimum 20 characters are required.",
                maxlength: "Maximum 3000 characters are required."
            },
            type: {
                required: "Please specify type of your problem",
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

    </html>