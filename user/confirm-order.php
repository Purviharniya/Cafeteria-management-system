<?php

include "includes/customer_header.php";
$continue = 0;
$total = 0;
?>

<!-- START CONTENT -->
<section id="content" style="min-height:100vh;">

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
        <div id="work-collections" class="seaction">
            <div class="row">
                <div>
                    <ul id="issues-collection" class="collection">
                        <?php
echo '<li class="collection-item avatar">
        <i class="mdi-content-content-paste red circle"></i>
        <p><strong>Name:</strong>' . $name . '</p>
		<p><strong>Contact Number:</strong> ' . $contact . '</p>
		<p><strong>Address:</strong> ' . htmlspecialchars($_POST['address']) . '</p>
		<p><strong>Payment Type:</strong> ' . $_POST['payment_type'] . '</p>
        <a href="#" class="secondary-content"><i class="mdi-action-grade"></i></a>';

foreach ($_POST as $key => $value) {
    if (is_numeric($key)) {
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
                <span>' . $value . ' Pieces</span>
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

if ($_POST['payment_type'] == 'Wallet') {
    echo '<div id="basic-collections" class="section" style="padding-top:50px;">
		<div class="row">
			<div class="collection">
				<a href="#" class="collection-item">
					<div class="row"><div class="col s7">Current Balance</div><div class="col s3">' . $balance . '</div></div>
				</a>
				<a href="#" class="collection-item active">
					<div class="row"><div class="col s7">Balance after purchase</div><div class="col s3">' . ($balance - $total) . '</div></div>
				</a>
			</div>
		</div>
	</div>';
}

?>
                        <form action="handlers/order-router.php" method="post">
                            <?php
foreach ($_POST as $key => $value) {
    if (is_numeric($key)) {
        echo '<input type="hidden" name="' . $key . '" value="' . $value . '">';
    }
}
?>
                            <input type="hidden" name="payment_type" value="<?php echo $_POST['payment_type']; ?>">
                            <input type="hidden" name="address"
                                value="<?php echo htmlspecialchars($_POST['address']); ?>">
                            <?php if (isset($_POST['description'])) {echo '<input type="hidden" name="description" value="' . htmlspecialchars($_POST['description']) . '">';}?>
                            <?php if ($_POST['payment_type'] == 'Wallet') {
    echo '<input type="hidden" name="balance" value="<?php echo ($balance-$total);?>">';
                            }

                            ?>
                            <input type="hidden" name="total" value="<?php echo $total; ?>">
                            <div class="input-field col s12">
                                <button class="btn cyan waves-effect waves-light right" type="submit" name="action"
                                    <?php if ($_POST['payment_type'] == 'Wallet') {if ($balance - $total < 0) {echo 'disabled';}}?>>Confirm
                                    Order
                                    <i class="mdi-content-send right"></i>
                                </button>
                            </div>
                        </form>
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

<?php include "includes/customer_footer.php";?>
</body>

</html>