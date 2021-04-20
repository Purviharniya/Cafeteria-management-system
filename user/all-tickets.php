<?php
include "includes/admin_header.php";
?>

<!-- START CONTENT -->
<section id="content">

    <!--breadcrumbs start-->
    <div id="breadcrumbs-wrapper">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l12">
                    <h5 class="breadcrumbs-title">Tickets</h5>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->

    <!--start container-->
    <div class="container">
        <p class="caption">List of tickets by all customers</p>
        <div class="divider"></div>
        <div id="work-collections">
            <ul id="projects-collection" class="collection">
                <?php
if (isset($_GET['status'])) {
    $status = $_GET['status'];
} else {
    $status = '%';
}
$sql = mysqli_query($con, "SELECT * FROM tickets WHERE status LIKE '$status';");
while ($row = mysqli_fetch_array($sql)) {
    echo '<a href="view-ticket-admin.php?id=' . $row['id'] . '"class="collection-item">
                                        <div class="row">
                                            <div class="col s6">
                                                <p class="collections-title" style="color:#311b92;">' . $row['subject'] . '</p>
                                            </div>
                                            <div class="col s2">
                                            <span class="task-cat deep-purple darken-1">' . $row['status'] . '</span></div>
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
    </div>
    <!-- END MAIN -->
</section>

<?php
include "includes/admin_footer.php";
?>

</body>

</html>