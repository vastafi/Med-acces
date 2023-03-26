<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(strlen($_SESSION['odmsaid'])==0)
{
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Admin Dashboard">

    <title>Medicines and Pharmaceuticals - Admin Dashboard</title>

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/mdi/css/materialdesignicons.min.css">

    <!-- PLUGINS CSS STYLE -->
    <link href="assets/plugins/simplebar/simplebar.css" rel="stylesheet" />

    <!-- Shop CSS -->
    <link id="Shop-css" rel="stylesheet" href="assets/css/style.css" />

    <!-- FAVICON -->
    <link href="assets/img/logo/medacces_logo.jpg" rel="shortcut icon" />
</head>

<body class="ec-header-fixed ec-sidebar-fixed ec-sidebar-dark ec-header-light" id="body">

<!-- WRAPPER -->
<div class="wrapper">

    <!-- LEFT MAIN SIDEBAR -->
    <?php @include("includes/sidebar.php");?>

    <!-- PAGE WRAPPER -->
    <div class="ec-page-wrapper">

        <!-- Header -->
        <?php @include("includes/header.php");?>

        <!-- CONTENT WRAPPER -->
        <div class="ec-content-wrapper">
            <div class="content">
                <div class="breadcrumb-wrapper breadcrumb-wrapper-2">
                    <h1>Invoice Detail</h1>
                    <p class="breadcrumbs"><span><a href="dashboard.php">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Invoice
                    </p>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="ec-odr-dtl card card-default">
                            <div class="card-header card-header-border-bottom d-flex justify-content-between">
                                <h2 class="ec-odr">Invoice Detail<br>
                                    <span class="small">Invoice ID: #<?php echo $_GET['invid'];?></span>
                                </h2>
                            </div>
                            <div class="card-body">
                                <?php
                                $user=($_GET['uid']);
                                $sql2="SELECT users.name,users.email,users.contactNo,users.billingAddress,invoice.totalAmount,invoice.invoiceDate from users join invoice on invoice.userId=users.id where users.id='$user' limit 1 ";
                                $query2 = $dbh -> prepare($sql2);
                                $query2->execute();
                                $results2=$query2->fetchAll(PDO::FETCH_OBJ);
                                if($query2->rowCount() > 0)
                                {
                                    foreach($results2 as $row2)
                                    {  ?>
                                        <div class="row">
                                            <div class="col-xl-3 col-lg-6">
                                                <address class="info-grid">
                                                    <div class="info-title"><strong>Customer ID:&nbsp;<?php echo $user;?></strong></div><br>
                                                    <div class="info-content">
                                                        <?php echo $row2->name;?>.<br>
                                                        <?php echo $row2->email;?><br>
                                                        <?php echo $row2->billingAddress;?><?php echo $row2->billingCountry;?><br>
                                                        0<?php echo $row2->contactNo;?>
                                                    </div>
                                                </address>
                                            </div>
                                            <div class="col-xl-3 col-lg-6">
                                                <address class="info-grid">
                                                    <div class="info-title"><strong>Shipped To:</strong></div><br>
                                                    <div class="info-content">
                                                        <?php echo $row2->email;?><br>
                                                        <?php echo $row2->billingAddress;?><br>
                                                        <?php echo $row2->billingCity;?><?php echo $row2->billingCountry;?>
                                                        0 <?php echo $row2->contactNo;?>
                                                    </div>
                                                </address>
                                            </div>
                                            <div class="col-xl-3 col-lg-6">
                                                <address class="info-grid">
                                                    <div class="info-title"><strong>Total:</strong></div><br>
                                                    <div class="info-content">
                                                        <?php echo $row2->totalAmount;?>
                                                    </div>
                                                </address>
                                            </div>
                                            <div class="col-xl-3 col-lg-6">
                                                <address class="info-grid">
                                                    <div class="info-title"><strong>Invoice Date:</strong></div><br>
                                                    <div class="info-content">
                                                        <?php  echo htmlentities(date("d-m-Y", strtotime($row2->invoiceDate)));?>
                                                    </div>
                                                </address>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>

                            </div>
                        </div>

                    </div>
                </div>
            </div> <!-- End Content -->
        </div> <!-- End Content Wrapper -->
        <!-- Footer -->
        <?php @include("includes/footer.php");?>

    </div> <!-- End Page Wrapper -->
</div> <!-- End Wrapper -->

<!-- Common Javascript -->
<script src="assets/plugins/jquery/jquery-3.5.1.min.js"></script>
<script src="assets/plugins/jquery/jquery.notify.min.js"></script>
<script src="assets/plugins/jquery/jquery.bundle.notify.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/plugins/simplebar/simplebar.min.js"></script>
<script src="assets/plugins/jquery-zoom/jquery.zoom.min.js"></script>
<script src="assets/plugins/slick/slick.min.js"></script>

<!-- Option Switcher -->
<script src="assets/plugins/options-sidebar/optionswitcher.js"></script>

<!-- Shop Custom -->
<script src="assets/js/main.js"></script>
</body>
</html>
