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
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/mdi/css/materialdesignicons.min.css">

    <!-- PLUGINS CSS STYLE -->
    <link href="assets/plugins/simplebar/simplebar.css" rel="stylesheet" />

    <!-- Shop CSS -->
    <link id="Shop-css" href="assets/css/style.css" rel="stylesheet" />

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
                    <h1>Purchase</h1>
                    <p class="breadcrumbs"><span><a href="dashboard.php">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Purchase
                    </p>
                </div>

                <div class="row">
                    <div class="row col-md-12 mt-4">
                        <div class="col-md-3">
                            <label class="font-weight-bold" for="">Start Date: </label>
                            <input type="date" class="form-control" id="start_date" onchange="#">
                        </div>
                        <div class="col-md-3">
                            <label class="font-weight-bold" for="">End Date: </label>
                            <input type="date" class="form-control" id="end_date" onchange="#">
                        </div>
                        <div class="col-md-3">
                            <br>
                            <button class="btn btn-success" onclick="location.reload();"><i class="mdi mdi-refresh"></i></button>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card card-default">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="responsive-data-table" class="table" style="width:100%">
                                        <thead>

                                        <tr>
                                            <th>No.</th>
                                            <th>Purchase Date</th>
                                            <th>Voucher Number</th>
                                            <th>Invoice No</th>
                                            <th>Supplier Name</th>
                                            <th>Total Amount</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php

                                        $sql="SELECT * from purchases ORDER BY voucherNumber DESC";
                                        $query = $dbh -> prepare($sql);
                                        $query->execute();
                                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                                        if($query->rowCount() > 0)
                                        {
                                            foreach($results as $row)
                                            {

                                                ?>
                                                <tr>
                                                    <td><?php  echo htmlentities($row->invoiceNumber);?></td>
                                                    <td><?php  echo htmlentities($row->paymentStatus);?></td>
                                                    <td><?php  echo htmlentities(date("d-m-Y", strtotime($row->puchaseDate)));?></td>
                                                    <td><?php  echo htmlentities($row->supplierName);?></td>
                                                    <td><?php  echo htmlentities($row->totalAmount);?></td>
                                                 </tr>
                                                <?php
                                            }
                                        } ?>
                                        </tbody>
                                        <?php
//                                        $start_date=0;
//                                         $end_date=0;
//
//                                            $total = 0;
//                                            if ($start_date == "" || $end_date == "")
//                                                $query = "SELECT * FROM purchases";
//                                            else
//                                                $query = "SELECT * FROM purchases WHERE purchaseDate BETWEEN '$start_date' AND '$end_date'";
//
//                                            while ($row = mysqli_fetch_array($query)) {
//                                                $total = $total + $row['totalAmount'];
//                                            }

                                        ?>
                                        <tfoot class="font-weight-bold">
                                        <tr style="text-align: right; font-size: 24px;">
                                            <td colspan="5" style="color: #0538e0;">&nbsp;Total Purchase = </td>
                                            <td style="color: red;"><?php //echo $total; ?>MDL</td>
                                        </tr>

                                    </table>
                                    <div class="col-md-12 text-center">
                                        <button class="btn btn-primary" onclick="#">Print</button>
                                    </div>
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