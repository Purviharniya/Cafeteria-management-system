<?php
include "shared/header.php"
?>

<!--Page header & Title-->
<section id="page_header">
    <div class="page_title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title">Our Food</h2>
                    <p>Check out our menu and some of our special, featured recipies!</p>
                </div>
            </div>
        </div>
    </div>
</section>



<!--Welcome-->
<section id="welcome" class="padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="heading">Welcome to CMS</h2>
                <hr class="heading_space">
            </div>
            <div class="col-md-7 col-sm-6">
                <p class="half_space">Launched in Mumbai, CMS has grown from a home project to one of the largest
                    food aggregators in the world. We are present in 20 countries and 19900+ cities globally,
                    enabling our vision of better food for more people. We not only connect people to food in every
                    context but work closely with restaurants to enable a sustainable ecosystem.</p>
                <p class="half_space"></p>
                <p class="half_space">It was popularised in the 1960s with the release of Letraset sheets containing
                    Lorem Ipsum passages, and Lorem Ipsum Lorem Ipsum Lorem Ipsum.</p>
                <ul class="welcome_list">
                    <li>Business Events</li>
                    <li>Birthdays</li>
                    <li>Weddings</li>
                    <li>Party & Others</li>
                </ul>
            </div>
            <div class="col-md-5 col-sm-6">
                <img class="img-responsive" src="vendor/images/welcome.jpg" alt="welcome CMS">
            </div>
        </div>
    </div>
</section>


<!--Food Facilities-->
<section id="food" class="padding bg_grey">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="heading">Our &nbsp; Menu</h2>
                <hr class="heading_space">
            </div>
        </div>
        <div class="row">
            <?php include "components/food_page/menu.php";?>
            <div class="col-md-8 grid_layout">
                <div class="row">
                    <div class="zerogrid">
                        <div class="wrap-container">
                            <div class="wrap-content clearfix">
                                <div class="col-1-2">
                                    <div class="wrap-col first">
                                        <div class="item-container">
                                            <img src="vendor/images/gallery/coldbeverages/cb9.jpg" alt="cook" />
                                            <div class="overlay">
                                                <a class="overlay-inner fancybox"
                                                    href="vendor/images/gallery/coldbeverages/cb9.jpg"
                                                    data-fancybox-group="gallery">
                                                    Mint Lychee Collins
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1-2">
                                    <div class="wrap-col first">
                                        <div class="item-container">
                                            <img src="vendor/images/gallery/appetizers/a12.jpg" alt="cook" />
                                            <div class="overlay">
                                                <a class="overlay-inner fancybox"
                                                    href="vendor/images/gallery/appetizers/a12.jpg"
                                                    data-fancybox-group="gallery">
                                                    Cream cheese sandwich
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1-2">
                                    <div class="wrap-col">
                                        <div class="item-container">
                                            <img src="vendor/images/gallery/hotbeverages/hb10.jpg" alt="cook" />
                                            <div class="overlay">
                                                <a class="overlay-inner fancybox"
                                                    href="vendor/images/gallery/hotbeverages/hb10.jpg"
                                                    data-fancybox-group="gallery">
                                                    Vanilla custard strawberry crumbles
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1-2">
                                    <div class="wrap-col">
                                        <div class="item-container">
                                            <img src="vendor/images/gallery/minibites/mb6.jpg" alt="cook" />
                                            <div class="overlay">
                                                <a class="fancybox overlay-inner"
                                                    href="vendor/images/gallery/minibites/mb6.jpg"
                                                    data-fancybox-group="gallery">
                                                    Sweet potato crostini
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Featured Receipes -->
<?php
include "components/index_page/featured_recipies.php";
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


<!--Footer-->

<?php
include "shared/footer.php"
?>

</body>

</html>