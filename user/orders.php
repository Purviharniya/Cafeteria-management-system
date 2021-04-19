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
                    <h5 class="breadcrumbs-title">Past Orders</h5>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->


    <!--start container-->
    <div class="container">
        <p class="caption">List of your past orders with details</p>
        <div class="divider"></div>
        <!--editableTable-->
        <div id="work-collections" class="seaction">

            <?php
if (isset($_GET['status'])) {
    $status = $_GET['status'];
} else {
    $status = '%';
}
$sql = mysqli_query($con, "SELECT * FROM orders WHERE customer_id = $user_id AND status LIKE '$status';;");
echo '              <div class="row">
                <div>
                    <h4 class="header">List</h4>
                    <ul id="issues-collection" class="collection">';
while ($row = mysqli_fetch_array($sql)) {
    $status = $row['status'];
    echo '<li class="collection-item avatar">
                              <i class="mdi-content-content-paste red circle"></i>
                              <span class="collection-header">Order No. ' . $row['id'] . '</span>
                              <p><strong>Date:</strong> ' . $row['date'] . '</p>
                              <p><strong>Payment Type:</strong> ' . $row['payment_type'] . '</p>
							  <p><strong>Address: </strong>' . $row['address'] . '</p>
                              <p><strong>Status:</strong> ' . ($status == 'Paused' ? 'Paused <a  data-position="bottom" data-delay="50" data-tooltip="Please contact administrator for further details." class="btn-floating waves-effect waves-light tooltipped cyan">    ?</a>' : $status) . '</p>
							  ' . (!empty($row['description']) ? '<p><strong>Note: </strong>' . $row['description'] . '</p>' : '') . '
							  <a href="#" class="secondary-content"><i class="mdi-action-grade"></i></a>
                              </li>';
    $order_id = $row['id'];
    $sql1 = mysqli_query($con, "SELECT * FROM order_details WHERE order_id = $order_id;");
    while ($row1 = mysqli_fetch_array($sql1)) {
        $item_id = $row1['item_id'];
        $sql2 = mysqli_query($con, "SELECT * FROM items WHERE id = $item_id;");
        while ($row2 = mysqli_fetch_array($sql2)) {
            $item_name = $row2['name'];
        }
        echo '<li class="collection-item">
                            <div class="row">
                            <div class="col s7">
                            <p class="collections-title"><strong>#' . $row1['item_id'] . '</strong> ' . $item_name . '</p>
                            </div>
                            <div class="col s2">
                            <span>Quantity- ' . $row1['quantity'] . ' </span>
                            </div>
                            <div class="col s3">
                            <span>Rs. ' . $row1['price'] . '</span>
                            </div>
                            </div>
                            </li>';
        $id = $row1['order_id'];
    }
    echo '<li class="collection-item">
                                        <div class="row">
                                            <div class="col s7">
                                                <p class="collections-title"> Total</p>
                                            </div>
                                            <div class="col s2">
											<span> </span>
                                            </div>
                                            <div class="col s3">
                                                <span><strong>Rs. ' . $row['total'] . '</strong></span>
                                            </div>';
    if (!preg_match('/^Cancelled/', $status)) {
        if ($status != 'Delivered') {
            echo '<form action="handlers/cancel-order.php" method="post">
										<input type="hidden" value="' . $id . '" name="id">
										<input type="hidden" value="Cancelled by Customer" name="status">
										<input type="hidden" value="' . $row['payment_type'] . '" name="payment_type">
										<button class="btn waves-effect waves-light right submit" type="submit" name="action">Cancel Order
                                              <i class="mdi-content-clear right"></i>
										</button>
										</form>';
        }
    }
    echo '</div></li>';

}
?>
            </ul>
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

include "includes/customer_footer.php";
?>
</body>

</html>