<?php
include "shared/header.php"
?>

<!-- REVOLUTION SLIDER -->


<?php
include "components/index_page/home_slider.php";
?>


<!--Features Section-->
<section class="feature_wrap padding-half" id="specialities">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="heading ">Our &nbsp; Specialities</h2>
                <hr class="heading_space">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6 feature text-center">
                <i class="icon-cake"></i>
                <h3><a href="./user/register.php"> Dessert</a></h3>
                <p> Enjoy Delicious Food!</p>
            </div>
            <div class="col-md-3 col-sm-6 feature text-center">
                <i class="icon-food"></i>
                <h3><a href="./user/register.php">Appetizers</a></h3>
                <p> Enjoy Delicious Food!</p>
            </div>
            <div class="col-md-3 col-sm-6 feature text-center">
                <i class="icon-glass"></i>
                <h3><a href="./user/register.php">Cold Beverages</a></h3>
                <p> Enjoy Delicious Food!</p>
            </div>
            <div class="col-md-3 col-sm-6 feature text-center">
                <i class="icon-coffee"></i>
                <h3><a href="./user/register.php">Hot Beverges</a></h3>
                <p> Enjoy Delicious Food!</p>
            </div>
        </div>

    </div>
</section>


<!--Services plus working hours-->
<?php

include "components/index_page/services.php";

?>

<!-- image with content -->
<section class="info_section paralax">
    <div class="container">
        <div class="row">
            <div class="col-md-2"> </div>
            <div class="col-md-8">
                <div class="text-center">
                    <h2 class="heading_space">HOT Deal of the Day</h2>
                    <p class="heading_space detail">Enjoy Delicious Food!</p>
                    <a href="./user/register.php" class="btn-common-white page-scroll">Order Now</a>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</section>

<!-- Food Gallery -->
<?php

include "components/index_page/delicious_food_container.php";

?>


<!-- facts counter  -->
<?php
include "components/index_page/facts.php";
?>

<!--Featured Receipes -->
<?php
include "components/index_page/featured_recipies.php";
?>


<!-- Our cheffs -->

<?php
include "components/index_page/cheffs.php";
?>

<!-- testinomial -->
<section id="testinomial" class="padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="heading">Our &nbsp; happy &nbsp; Customers</h2>
                <hr class="heading_space">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="testinomial-slider" class="owl-carousel text-center">
                    <div class="item">
                        <h3>Awesome Food. Food from some of the finest restaurants in India!</h3>
                        <p>Customer Name</p>
                    </div>
                    <div class="item">
                        <h3>Good Recipes, Nice staff and customer care. A good service overall</h3>
                        <p>Customer Name</p>
                    </div>
                    <div class="item">
                        <h3>Awesome Food. Food from some of the finest restaurants in India!</h3>
                        <p>Customer Name</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?php
include "shared/footer.php"
?>