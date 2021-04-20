<?php
include "includes/admin_header.php";
$continue = 0;
if ($_SESSION['admin_sid'] == session_id()) {
    $ticket_id = $_GET['id'];
    $sql1 = "SELECT * FROM tickets WHERE id = $ticket_id;";
    if (mysqli_num_rows(mysqli_query($con, $sql1)) > 0) {
        $row = $con->query($sql1)->fetch_assoc();
        $type = $row['type'];
        $subject = $row['subject'];
        $description = $row['description'];
        $date = $row['date'];
        $status = $row['status'];
        $continue = 1;
    } else {
        $continue = 0;
    }

}

if ($continue) {
    ?>

<!-- START CONTENT -->
<section id="content">

    <!--breadcrumbs start-->
    <div id="breadcrumbs-wrapper">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l12">
                    <h5 class="breadcrumbs-title">Provide Order Details</h5>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->


    <!--start container-->
    <div class="container">
        <p class="caption">Receipt</p>
        <div class="divider"></div>
        <!--editableTable-->
        <div class="section">
            <?php
echo '<ul id="task-card" class="collection with-header">
									<div id="card-alert" class="card deep-purple darken-4">
										<div class="card-content white-text">
										<span class="card-title white-text darken-1">Ticket No. ' . $ticket_id . '</span>
										<p><strong>Subject: </strong>' . $subject . '</p>
										<p><strong>Status: </strong>' . $status . '</p>
										<p><strong>Type: </strong>' . $type . '</p>
										</div>
										<div class="card-action deep-purple darken-4">
										<form method="post" action="routers/ticket-status.php">
										<input type="hidden" name="ticket_id" value="' . $ticket_id . '">
										<input type="hidden" name="status" value="' . ($status != 'Closed' ? 'Closed' : 'Open') . '">
										<button class="waves-effect waves-light deep-purple darken-1 btn white-text" type="submit" name="action">'
        . ($status != 'Closed' ? 'Close<i class="mdi-navigation-close"></i>' : 'Reopen<i class="mdi-navigation-check"></i>') . '
										</button>
										</form>
										</div>
									</div>
                                </ul>';
    echo '<ul id="issues-collection" class="collection">';
    $sql1 = mysqli_query($con, "SELECT * from ticket_details WHERE ticket_id = $ticket_id;");
    while ($row1 = mysqli_fetch_array($sql1)) {
        $sql2 = "SELECT * FROM users WHERE id = " . $row1['user_id'] . ";";
        if (mysqli_num_rows(mysqli_query($con, $sql2)) > 0) {
            $row2 = $con->query($sql2)->fetch_assoc();
            $name = $row2['name'];
            $role1 = $row2['role'];
        }
        echo '
								  <li class="collection-item  avatar">
									  <i class="' . ($role1 == 'Administrator' ? 'mdi-action-star-rate' : 'mdi-social-person') . ' deep-purple darken-1 circle"></i>
									  <span class="collection-header"> ' . $name . '</span>
									  <p><strong>Date:</strong> ' . $row1['date'] . '</p>
									  <p><strong>Role:</strong> ' . $role1 . '</p>
									  <a href="#" class="secondary-content">
									  <i class="mdi-action-grade"></i></a>
								  </li>
								  <li class="collection-item">
									  <div class="row">
									  <p class="caption">' . $row1['description'] . '</p>
									  </div>
									  </li>';
    }
    echo '</ul>';
    if ($status != 'Closed') {
        echo '
							  <div class="card-panel">
                  <div class="row">
                    <form class="formValidate" id="formValidate" method="post" action="handlers/ticket-message.php" novalidate="novalidate" class="col s12">
                      <div class="row">
					  <input type="hidden" name="role" value="' . $role . '">
					  <input type="hidden" name="ticket_id" value="' . $ticket_id . '">
                        <div class="input-field col s12">
                          <i class="mdi-action-home prefix"></i>
                          <textarea name="message" id="message" class="materialize-textarea validate" data-error=".errorTxt1"></textarea>
                          <label for="message" class="">Add a reply</label>
						  <div class="errorTxt1"></div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <button class="btn waves-effect waves-light right deep-purple darken-1" type="submit" name="action">Reply
                              <i class="mdi-content-send right"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>';
    }
    ?>
        </div>
    </div>
    </div>
    </div>
    <!--end container-->

</section>
<!-- END CONTENT -->
</div>
<!-- END WRAPPER -->

</div>
<!-- END MAIN -->

<?php
include "includes/admin_footer.php";

    ?>

<script type="text/javascript">
$("#formValidate").validate({
    rules: {
        message: {
            required: true,
            minlength: 5,
            maxlength: 300
        },
    },
    messages: {
        message: {
            required: "Please provide a reply.",
            minlength: "Minimum 5 characters are required.",
            maxlength: "Maximum 3000 characters are required."
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
<?php
}
?>