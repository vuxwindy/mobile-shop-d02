<?php
    session_start();
    include_once "config/connectDB.php"; 
?>

<?php include_once "modules/head/head.php" ?>


<!--	Header	-->
<div id="header">
    <div class="container">
        <div class="row">
            <?php include_once "modules/logo/logo.php"; ?>
            <?php include_once "modules/search/search_box.php"; ?>
            <?php include_once "modules/cart/cart_notification.php"; ?>
        </div>
    </div>
    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#menu">
        <span class="navbar-toggler-icon"></span>
    </button>
</div>
<!--	End Header	-->


<!--	Body Show Product	-->
<div id="body">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <?php include_once "modules/header/menu.php"; ?>
            </div>
        </div>
        <div class="row">
            <div id="main" class="col-lg-8 col-md-12 col-sm-12">
                <!--	Slider	-->
                <?php include_once "modules/slide/slide.php"; ?>
                <!--	End Slider	-->
                <?php
                if (isset($_GET['page_layout'])) {
                    switch ($_GET['page_layout']) {
                        case 'product':
                            include_once "modules/product/product.php";
                            break;
                        case 'category':
                            include_once "modules/category/category.php";
                            break;
                        case 'search':
                            include_once "modules/search/search.php";
                            break;
                        case 'cart':
                            include_once "modules/cart/cart.php";
                            break;
                        case 'success':
                            include_once "modules/cart/success.php";
                            break;
                    }
                } else {
                    include_once "modules/product/featured.php";
                    include_once "modules/product/lasted.php";
                }
                ?>


            </div>

            <div id="sidebar" class="col-lg-4 col-md-12 col-sm-12">
                <?php include_once "modules/banner/banner.php"; ?>
            </div>
        </div>
    </div>
</div>
<!--	End Body	-->

<!-- Footer -->
<?php include_once "modules/footer/footer.php"; ?>