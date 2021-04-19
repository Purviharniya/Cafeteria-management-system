<?php

include "includes/customer_header.php";

?>
<!-- //////////////////////////////////////////////////////////////////////////// -->

<!-- START CONTENT -->
<section id="content">

    <!--breadcrumbs start-->

    <!--breadcrumbs end-->


    <!--start container-->
    <div class="container">

        <form class="formValidate" id="formValidate" method="post" action="place-order.php" novalidate="novalidate">
            <?php
if (isset($_SESSION['error_message'])) {?>
            <div class="alert alert-danger">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <?php echo $_SESSION['error_message']; ?>
            </div>
            <?php
unset($_SESSION['error_message']);
}
?>

            <div class="row">
                <div class="col s12 m4 l3">
                    <h4 class="header">Order Food</h4>
                </div>

                <div>
                    <table id="data-table-customer" class="responsive-table display" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Item Price/Piece</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
$result = mysqli_query($con, "SELECT * FROM items where not deleted;");
while ($row = mysqli_fetch_array($result)) {
    echo '<tr><td>' . $row["name"] . '</td><td class="menu-img"><img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" id="' . $row["id"] . '_image" name="' . $row['id'] . '_image" type="file" data-error=".errorTxt' . $row["id"] . '"></td><td>' . $row["price"] . '</td>';
    echo '<td><div class="input-field col s12"><label for=' . $row["id"] . ' class="">Quantity</label>';
    echo '<input id="' . $row["id"] . '" name="' . $row['id'] . '" type="text" data-error=".errorTxt' . $row["id"] . '"><div class="errorTxt' . $row["id"] . '"></div></td></tr>';
}
?>
                        </tbody>
                    </table>
                </div>
                <div class="input-field col s12">
                    <i class="mdi-editor-mode-edit prefix"></i>
                    <textarea id="description" name="description" class="materialize-textarea"></textarea>
                    <label for="description" class="">Any note(optional)</label>
                </div>
                <div>
                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light right deep-purple darken-4" type="submit" name="action">Order
                            <i class="mdi-content-send right"></i>
                        </button>
                    </div>
                </div>
        </form>
        <div class="divider"></div>

    </div>
    </div>
    <!--end container-->

</section>
<!-- END CONTENT -->
<?php

include "includes/customer_footer.php";

?>

<script type="text/javascript">
$("#formValidate").validate({
            rules: {
                <?php
$result = mysqli_query($con, "SELECT * FROM items where not deleted;");
while ($row = mysqli_fetch_array($result)) {
    echo $row["id"] . ':{
				min: 0,
				max: 10
				},
				';
}
echo '},';
?>
                messages: {
                    <?php
$result = mysqli_query($con, "SELECT * FROM items where not deleted;");
while ($row = mysqli_fetch_array($result)) {
    echo $row["id"] . ':{
				min: "Minimum 0",
				max: "Maximum 10"
				},
				';
}
echo '},';
?>
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