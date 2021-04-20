<?php include "./includes/customer_header.php";
$total = 0;
$count = 1;
// print_r($_POST);
foreach ($_POST as $key => $value) {
    if (is_numeric($key) && $value == '') {
        $count = 0;
        // echo $key . "," . $value . "," . $count;
        // echo "<br>";
    } else if (is_numeric($key) && $value != '') {
        $count = 1;
        break;
    }
}
// echo $count;
if ($count == 0) {
    $_SESSION['error_message'] = "Please select a dish!";
    header("Location: index.php");
}
?>

<!-- //////////////////////////////////////////////////////////////////////////// -->

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
        <p class="caption">Provide required delivery and payment details.</p>
        <div class="divider"></div>
        <div class="row">
            <div class="col s12 m4 l3">
                <h4 class="header">Details</h4>
            </div>
            <div>
                <div class="card-panel">
                    <div class="row">
                        <form class="formValidate col s12 m12 l6" id="formValidate" method="post"
                            action="confirm-order.php" novalidate="novalidate">
                            <div class="row">
                                <div class="input-field col s12">
                                    <label for="payment_type">Payment Type</label><br><br>
                                    <select id="payment_type" name="payment_type" required>
                                        <option value="Wallet" selected>Wallet</option>
                                        <option value="Cash On Delivery" <?php if (!$verified) {
    echo 'disabled';
}
?>>Cash on Delivery
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="mdi-action-home prefix"></i>
                                    <textarea name="address" id="address" class="materialize-textarea validate"
                                        data-error=".errorTxt1" required><?php echo $address; ?></textarea>
                                    <label for="address" class="">Address</label>
                                    <div class="errorTxt1"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="mdi-action-credit-card prefix"></i>
                                    <input name="cc_number" id="cc_number" type="text" data-error=".errorTxt2"
                                        value="8919791029866590">
                                    <label for="cc_number" class="">Card Number</label>
                                    <div class="errorTxt2"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="mdi-communication-vpn-key prefix"></i>
                                    <input name="cvv_number" id="cvv_number" type="text" data-error=".errorTxt3"
                                        required value="969">
                                    <label for="cvv_number" class="">CVV Number</label>
                                    <div class="errorTxt3"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <button class="btn cyan waves-effect waves-light right" type="submit"
                                            name="action">Submit
                                            <i class="mdi-content-send right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <?php
foreach ($_POST as $key => $value) {
    if ($key == 'action' || $value == '') {
        break;
    }
    echo '<input name="' . $key . '" type="hidden" value="' . $value . '">';
}
?>
                        </form>
                    </div>
                </div>
            </div>
            <div class="divider"></div>

        </div>
        <!--end container-->

    </div>

    <div class="container">
        <p class="caption">Estimated Receipt</p>
        <div class="divider"></div>
        <!--editableTable-->
        <div id="work-collections" class="seaction">
            <div class="row">
                <div>
                    <ul id="issues-collection" class="collection">
                        <?php
echo '<li class="collection-item avatar">
        <i class="mdi-content-content-paste red circle"></i>
        <p><strong>Name:</strong>' . $name . '</p>
		<p><strong>Contact Number:</strong> ' . $contact . '</p>
        <a href="#" class="secondary-content"><i class="mdi-action-grade"></i></a>';
// print_r($_POST);
foreach ($_POST as $key => $value) {
    if ($value == '') {
        continue;
    }
    if (is_numeric($key)) {
        // echo "hi";
        echo $key;
        $result = mysqli_query($con, "SELECT * FROM items WHERE id = $key");
        while ($row = mysqli_fetch_array($result)) {
            $price = $row['price'];
            $item_name = $row['name'];
            $item_id = $row['id'];
        }
        $price = $value * $price;
        echo '<li class="collection-item">
        <div class="row">
            <div class="col s7">
                <p class="collections-title"><strong>#' . $item_id . ' </strong>' . $item_name . '</p>
            </div>
            <div class="col s2">
                <span>Quantity- ' . $value . '</span>
            </div>
            <div class="col s3">
                <span>Rs. ' . $price . '</span>
            </div>
        </div>
    </li>';
        $total = $total + $price;
    }
}
echo '<li class="collection-item">
        <div class="row">
            <div class="col s7">
                <p class="collections-title"> Total</p>
            </div>
            <div class="col s2">
                <span>&nbsp;</span>
            </div>
            <div class="col s3">
                <span><strong>Rs. ' . $total . '</strong></span>
            </div>
        </div>
    </li>';
if (!empty($_POST['description'])) {
    echo '<li class="collection-item avatar"><p><strong>Note: </strong>' . htmlspecialchars($_POST['description']) . '</p></li>';
}

?>
                    </ul>


                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!--end container-->

</section>
<!-- END CONTENT -->
</div>
<!-- END WRAPPER -->

<?php

include "./includes/customer_footer.php";

?>
<script type="text/javascript">
$("#formValidate").validate({
    rules: {
        address: {
            required: true,
            minlength: 5
        },
        cc_number: {
            required: true,
            minlength: 16,
        },
        cvv_number: {
            required: true,
            minlength: 3,
        },
    },
    messages: {
        address: {
            required: "Enter a address",
            minlength: "Enter at least 5 characters"
        },
        cc_number: {
            required: "Please provide card number",
            minlength: "Enter 16 digit card number",
        },
        cvv_number: {
            required: "Please provide CVV number",
            minlength: "Enter 3 digit cvv number",
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
$('#cc_number').formatter({
    'pattern': '{{9999}}-{{9999}}-{{9999}}-{{9999}}',
    'persistent': true
});
$('#cvv_number').formatter({
    'pattern': '{{9}}-{{9}}-{{9}}',
    'persistent': true
});
$('#payment_type').change(function() {
    if ($(this).val() === 'Cash On Delivery') {
        $("#cc_number").prop('disabled', true);
        $("#cvv_number").prop('disabled', true);
    }
    if ($(this).val() === 'Wallet') {
        $("#cc_number").prop('disabled', false);
        $("#cvv_number").prop('disabled', false);
    }
});
</script>
</body>

</html>