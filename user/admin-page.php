<?php
include "includes/admin_header.php";
?>

<!-- START CONTENT -->
<section id="content">

    <!--breadcrumbs start-->

    <!--breadcrumbs end-->


    <!--start container-->
    <div class="container">

        <form class="formValidate" id="formValidate" method="post" action="handlers/menu-router.php"
            novalidate="novalidate">
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
                    <h4 class="breadcrumbs-title">Edit Menu Items</h4>
                </div>
                <div>
                    <table id="data-table-admin" class="responsive-table display" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Item Price/Piece</th>
                                <th>Image</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
$result = mysqli_query($con, "SELECT * FROM items where deleted='0'");
while ($row = mysqli_fetch_array($result)) {
    echo '<tr><td><div class="input-field col s12"><label for="' . $row["id"] . '_name">Name</label>';
    echo '<input value="' . $row["name"] . '" id="' . $row["id"] . '_name" name="' . $row['id'] . '_name" type="text" data-error=".errorTxt' . $row["id"] . '"><div class="errorTxt' . $row["id"] . '"></div></td>';
    echo '<td><div class="input-field col s12 "><label for="' . $row["id"] . '_price">Price</label>';
    echo '<input value="' . $row["price"] . '" id="' . $row["id"] . '_price" name="' . $row['id'] . '_price" type="text" data-error=".errorTxt' . $row["id"] . '"><div class="errorTxt' . $row["id"] . '"></div></td>';
    echo '<td>';
    if ($row['deleted'] == 0) {
        $text1 = 'selected';
        $text2 = '';
    } else {
        $text1 = '';
        $text2 = 'selected';
    }
    echo '
					<img class="admin-menu-img" src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" id="' . $row["id"] . '_image" name="' . $row['id'] . '_image" type="file" data-error=".errorTxt' . $row["id"] . '"><div class="errorTxt' . $row["id"] . '"></div>
                    </td>
                    <td> <button class="btn waves-effect waves-light right deep-purple darken-4" type="submit" value="' . $row["id"] . '" name="delete_item">Delete
                    <i class="mdi-content-send right"></i>
                </button></td>
                    </tr>';
}
?>
                        </tbody>
                    </table>
                </div>
                <div class="input-field col s12">
                    <button class="btn waves-effect waves-light right deep-purple darken-4" type="submit" name="action">Modify
                        <i class="mdi-content-send right"></i>
                    </button>
                </div>
            </div>
        </form>
        <form class="formValidate" id="formValidate1" method="post" action="handlers/add-item.php"
            novalidate="novalidate" enctype="multipart/form-data">
            <div class="row">
                <div class="col s12 m4 l3">
                    <h4 class="header">Add Item</h4>
                </div>
                <div>
                    <table>
                        <thead>
                            <tr>
                                <th data-field="id">Name</th>
                                <th data-field="name">Item Price/Piece</th>
                                <th data-field="image">Image</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

echo '<tr><td><div class="input-field col s12"><label for="name">Name</label>';
echo '<input id="name" name="name" type="text" data-error=".errorTxt01"><div class="errorTxt01"></div></td>';
echo '<td><div class="input-field col s12 "><label for="price" class="">Price</label>';
echo '<input id="price" name="price" type="text" data-error=".errorTxt02"><div class="errorTxt02"></div></td>';

echo '<td><div class="input-field col s12 ">';
echo '
					<input type="file" id="image" name="image" data-error=".errorTxt03"><div class="errorTxt01"></div></td>';
echo '<td></tr>';
?>
                        </tbody>
                    </table>
                </div>
                <div class="input-field col s12">
                    <button class="btn waves-effect waves-light right deep-purple darken-4" type="submit" name="action">Add
                        <i class="mdi-content-send right"></i>
                    </button>
                </div>
            </div>
        </form>
        <div class="divider"></div>

    </div>
    </div>
    </div>
    <!--end container-->

</section>
<!-- END CONTENT -->
</div>
<!-- END WRAPPER -->
<?php
include "includes/admin_footer.php";
?>

<script type="text/javascript">
$("#formValidate").validate({
            rules: {
                <?php
$result = mysqli_query($con, "SELECT * FROM items");
while ($row = mysqli_fetch_array($result)) {
    echo $row["id"] . '_name:{
				required: true,
				minlength: 5,
				maxlength: 20
				},';
    echo $row["id"] . '_price:{
				required: true,
				min: 0
				},';
}
echo '},';
?>
                messages: {
                    <?php
$result = mysqli_query($con, "SELECT * FROM items");
while ($row = mysqli_fetch_array($result)) {
    echo $row["id"] . '_name:{
				required: "Ener item name",
				minlength: "Minimum length is 5 characters",
				maxlength: "Maximum length is 20 characters"
				},';
    echo $row["id"] . '_price:{
				required: "Ener price of item",
				min: "Minimum item price is Rs. 0"
				},';
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
<script type="text/javascript">
$("#formValidate1").validate({
    rules: {
        name: {
            required: true,
            minlength: 5
        },
        price: {
            required: true,
            min: 0
        },
    },
    messages: {
        name: {
            required: "Enter item name",
            minlength: "Minimum length is 5 characters"
        },
        price: {
            required: "Enter item price",
            minlength: "Minimum item price is Rs.0"
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

?>