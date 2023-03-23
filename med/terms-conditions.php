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
                            <li class="ec-breadcrumb-item active">Terms & Conditions </li>
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
                    <h2 class="ec-title">Terms & Conditions</h2>
                    <p class="sub-title mb-3">Always be aware of the system requirements!</p>
                </div>
            </div>
            <div class="ec-register-wrapper">
                <div class="ec-register-container">
                    <div class="ec-register-form">
                        <!-- Ekka Cart End -->
                        <div class="conta">
                            <p>This pharmaceutical management system (AMMPF) is offered by Med Acces. By using this System, you agree to be bound by the terms and conditions below (hereinafter referred to as "These Terms").
                            <p>By using this website and all the services we offer, users automatically accept the following terms and conditions:</p>
                            <ul>
                                <li>- Users agree to comply with all applicable laws and regulations.</li>
                                <li>- Users will provide correct and complete information during registration and at any other time during the use of the system.</li>
                                <li>- Users will not use this system to commit illegal or unethical activities.</li>
                                <li>- Users will not use this system to transmit or distribute inappropriate or offensive material.</li>
                                <li>- Users will not use this system to promote products or services or advertise.</li>
                                <li>- Users shall not attempt to access or manipulate data or information stored in the system.</li>
                                <li>- A user's account and passwords will not be disclosed to others.</li>
                            </ul>
                            <br>
                            <h5> 1. PROPERTY RIGHTS</h5>
                            The System and all content, information and materials contained in the System are the property and copyright of Us or our content providers and may not be copied, reproduced, distributed or modified without our written consent.
                            <h5> 2. RULES OF CONDUCT</h5>
                            We reserve the right to remove any content or information posted on the System that does not comply with these Terms or is otherwise unacceptable to Us.
                            <h5> 3. WARRANTIES</h5>
                            We are committed to providing an acceptable level of quality with respect to the System and the services provided, but we make no guarantee that the System will operate without interruptions or errors.
                            <h5> 4. LIABILITY</h5>
                            We reserve the right to change these Terms without any prior notice. Any changes will take effect immediately after they are published on the System.
                            <h5> 5. APPLICABLE LAW</h5>
                            These Terms are governed by and construed in accordance with the laws of our state.</p>
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

