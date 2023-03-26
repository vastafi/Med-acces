<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>Medicines and Pharmaceuticals - Shopping Portal</title>
    <meta name="keywords" content="catalog, drugs, pharmaceutical products, management" />
    <meta name="description" content="The best management of drugs and pharmaceutical products with multiple suppliers.">
    <meta name="author" content="V.A.">

    <!-- site Favicon -->
    <link rel="icon" href="assets/images/logo/medacces_logo.jpg" sizes="32x32" />
    <link rel="apple-touch-icon" href="assets/images/logo/medacces_logo.jpg" />
    <meta name="msapplication-TileImage" content="assets/images/logo/medacces_logo.jpg"/>

    <!-- css Icon Font -->
    <link rel="stylesheet" href="assets/css/vendor/ecicons.min.css" />

    <!-- css All Plugins Files -->
    <link rel="stylesheet" href="assets/css/plugins/animate.css" />
    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/countdownTimer.css" />
    <link rel="stylesheet" href="assets/css/plugins/slick.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/bootstrap.css" />

    <!-- Main Style -->
    <link rel="stylesheet" href="assets/css/demo.css" />
    <!-- <script src='https://www.google.com/recaptcha/api.js'></script> -->
    <script>
        function openFAQ(evt, faqName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(faqName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>

</head>
<body>
<div id="ec-overlay"><span class="loader_img"></span></div>
<!-- Header start  -->
<?php @include("includes/header.php");?>
<!-- Header End  -->

<!-- Ekka Cart Start -->
<?php @include("includes/shoppingcart.php");?>
<!-- Ekka Cart End -->

<!-- Ec breadcrumb start -->
<div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row ec_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12"></div>
                    <div class="col-md-6 col-sm-12">
                        <!-- ec-breadcrumb-list start -->
                        <ul class="ec-breadcrumb-list">
                            <li class="ec-breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="ec-breadcrumb-item active">Frequent questions </li>
                        </ul>
                        <!-- ec-breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Ec breadcrumb end -->

<!-- Start Register -->
<section class="ec-page-content section-space-p">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="section-title">
                    <h2 class="ec-title">Frequent questions</h2>
                    <p class="sub-title mb-3">You can find the most frequent questions here!</p>
                </div>
            </div>
            <div class="ec-register-wrapper">
                <div class="ec-register-container">
                    <div class="ec-register-form">
                        <div class="tab">
                            <button class="tablinks" onclick="openFAQ(event, 'Questions1')">Questions 1</button>
                            <button class="tablinks" onclick="openFAQ(event, 'Questions2')">Questions 2</button>
                            <button class="tablinks" onclick="openFAQ(event, 'Questions3')">Questions 3</button>
                            <button class="tablinks" onclick="openFAQ(event, 'Questions4')">Questions 4</button>
                            <button class="tablinks" onclick="openFAQ(event, 'Questions5')">Questions 5</button>
                        </div>
                        <br>
                        <div id="Questions1" class="tabcontent">
                             <h3> What products can be bought on your website?</h3>
                            <p>Our offer includes medical and pharmaceutical products from various categories such as drugs, generic drugs, homeopathic drugs, herbal drugs, diabetes products, cancer products, heart disease products, asthma products, treatment of autoimmune diseases and more. All our products are classified by categories and subcategories to make your search easier.</p>
                        </div>
                        <br>
                        <div id="Questions2" class="tabcontent">
                            <h3> How can the products be purchased?</h3>
                            <p>Products can be purchased through our website using secure payment methods. Payment can be made by bank card, bank transfer or PayPal account.</p>
                        </div>
                        <br>
                        <div id="Questions3" class="tabcontent">
                            <h3>Is there a quantity limit on the products you can buy?</h3>
                            <p>Yes, there is a quantity limit on the products you can purchase. Available quantities for each product are specified on the product page.</p>
                        </div>
                        <br>
                        <div id="Questions4" class="tabcontent">
                            <h3>Where can I get information about the products you sell?</h3>
                            <p>All information about our products can be found on our website. Each product has a dedicated page where product details such as description, price, available quantity and other relevant information are displayed.</p>
                        </div>
                        <br>
                        <div id="Questions5" class="tabcontent">
                            <h3>What happens if the product I ordered is out of stock?</h3>
                            <p>If the ordered product is no longer in stock, we will refund your money as soon as possible.</p>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Register -->

<!-- Footer Start -->
<?php @include("includes/footer.php");?>
<!-- Footer Area End -->

<!-- Vendor JS -->
<script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
<script src="assets/js/vendor/jquery.notify.min.js"></script>
<script src="assets/js/vendor/jquery.bundle.notify.min.js"></script>
<script src="assets/js/vendor/popper.min.js"></script>
<script src="assets/js/vendor/bootstrap.min.js"></script>
<script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
<script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>

<!--Plugins JS-->
<script src="assets/js/plugins/swiper-bundle.min.js"></script>
<script src="assets/js/plugins/countdownTimer.min.js"></script>
<script src="assets/js/plugins/scrollup.js"></script>
<script src="assets/js/plugins/jquery.zoom.min.js"></script>
<script src="assets/js/plugins/slick.min.js"></script>
<script src="assets/js/plugins/infiniteslidev2.js"></script>
<script src="assets/js/plugins/fb-chat.js"></script>

<!-- Main Js -->
<script src="assets/js/vendor/index.js"></script>
<script src="assets/js/demoss.js"></script>
<script src="assets/js/main.js"></script>


</body>
</html>

