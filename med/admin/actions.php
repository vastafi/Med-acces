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
    <link href="assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="assets/plugins/simplebar/simplebar.css" rel="stylesheet" />

    <!-- shop CSS -->
    <link id="shop-css" href="assets/css/style.css" rel="stylesheet" />

    <!-- FAVICON -->
    <link href="assets/img/logo/medacces_logo.jpg"rel="shortcut icon" />

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
                    <h1>What do we do with expired products?</h1>
                    <p class="breadcrumbs"><span><a href="dashboard.php">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Actions
                    </p>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-default">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <h3 align="center">PROCEDURE IN RESPECT OF RETURN OF TIME EXPIRED DRUGS OR MEDICINE</h3>
                                        <br>
                                        <h3>Procedures to be followed</h3>
                                        <img src="assets/img/proc/proc1.png" alt="My image" />
                                        <h4>A. Option:</h4>
                                        <br>
                                        <h5>   1 Return of Time Expired Goods to be Treated as Fresh Supply:</h5>
                                        <br>
                                        <h6> a. Person returning the time expired goods is a registered person</h6>
                                        Return of goods to be treated as fresh supply Value of the said goods as shown in the invoice on the basis of which the goods were supplied earlier
                                        may be taken as the value of such return supply Recipient is eligible to avail Input Tax Credit on said return supply subject to section 16 of the CGST
                                        Act.
                                        <h6> b. Person returning the time expired goods is a composition taxpayer </h6>
                                        Return the said goods by issuing a bill of supply and pay tax at the rate applicable Recipient is not eligible to avail ITC of said return supply
                                        <h6>  c. Person returning the time expired goods is an unregistered person:</h6>
                                        Recipient may return the said goods by issuing any commercial document without charging any tax.
                                        <br>
                                        <img src="assets/img/proc/proc2.png" alt="My image" />
                                        <br>
                                        <br> <h5>Reversal of Credit when the Goods Are Destroyed by the Manufacturer </h5>
                                        <br>
                                        Where the time expired goods which have been returned by the retailer/wholesaler are destroyed by the manufacturer, he/she is required to reverse the
                                        ITC availed on the return supply in terms of section 17(5) (h) of the CGST Act. However, ITC which is required to be reversed in such scenario is the
                                        ITC availed on the return supply and not the ITC that is attributable to the manufacture of such time expired goods.
                                        <br>
                                        <img src="assets/img/proc/proc3.png" alt="My image" />
                                        <br>
                                        <b>Illustration:</b> Supposedly, manufacturer has availed ITC of Rs. 10/- at the time of manufacture of medicines valued at Rs. 100/-. At the time of return
                                        of such medicine on the account of expiry, the ITC available to the manufacturer on the basis of fresh invoice issued by wholesaler is Rs. 15/-.
                                        So, when the time expired goods are destroyed by the manufacturer he would be required to reverse ITC of Rs. 15/- and not of Rs. 10/-.
                                        <b> Note:</b> Most of the cases the Time Expired Goods are Destroyed in a Controlled Manner by the Manufacturer of Pharma / Medicines.
                                        Therefore they need to Reverse the Credit.
                                        <br>
                                        <br> <h4>B. Option : </h4>
                                        <br>
                                        <h5> 2 Return of time expired goods by issuing Credit Note:</h5>
                                        <br>
                                        <b>  a.</b> As per section 34(1) of the CGST Act, the manufacturer or the wholesaler who has supplied the goods to the wholesaler or retailer,
                                        as the case may be, has the option to issue a credit note in relation to the time expired goods returned by the wholesaler or retailer,
                                        as the case may be.
                                        <br> <b> b.</b> If the credit note is issued within the time limit specified in section 34(2) of the CGST Act, the tax liability may
                                        be adjusted by the supplier, provided the person returning the time expired goods has either not availed the ITC or if availed has reversed
                                        the ITC so availed against the goods being returned. However, if the time limit has expired, a credit note may still be issued but the tax
                                        liability cannot be adjusted by him in his hands
                                        <br>
                                        <b> c.</b> Further, in case they are returned beyond the time period specified and a credit note
                                        is issued, there is no requirement to declare such credit note on the common portal by the supplier as tax liability cannot be adjusted in this case.
                                        <br>
                                        <img src="assets/img/proc/proc4.png" alt="My image" />
                                        <br><br> The provisions of the Section 34, ibid, are reproduced for the benefit of readers as under;
                                        <br>
                                        <br><h5>Sec 34.</h5>
                                        <br>
                                        <b>(1)</b> of CGST Act :Where a tax invoice has been issued for supply of any goods or services or both and the taxable value or tax charged in that
                                        tax invoice is found to exceed the taxable value or tax payable in respect of such supply, or where the goods supplied are returned by the recipient,
                                        or where goods or services or both supplied are found to be deficient, the registered person, who has supplied such goods or services or both, may issue
                                        to the recipient a credit note containing such particulars as may be prescribed.
                                        <br>
                                        <b>(2)</b> Any registered person who issues a credit note in relation to a
                                        supply of goods or services or both shall declare the details of such credit note in the return for the month during which such credit note has been
                                        issued but not later than September following the end of the financial year in which such supply was made, or the date of furnishing of the relevant
                                        annual return, whichever is earlier, and the tax liability shall be adjusted in such manner as may be prescribed: Provided that no reduction in output
                                        tax liability of the supplier shall be permitted, if the incidence of tax and interest on such supply has been passed on to any other person.
                                        <br>
                                        <br><h5>COLLECTION POINTS OF EXPIRED MEDICINES:</h5>
                                         <br>
<pre>
- 3/2, Calea Ieşilor street;;
- 13, Grigore Vieru street;;
- 11, Kyiv street;
- 21/6, Dacia street;
- 1, Ion Dumeniuc;
</pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

<!-- Chart -->
<script src="assets/plugins/charts/Chart.min.js"></script>
<script src="assets/js/chart.js"></script>

<!-- Google map chart -->
<script src="assets/plugins/charts/google-map-loader.js"></script>
<script src="assets/plugins/charts/google-map.js"></script>

<!-- Date Range Picker -->
<script src="assets/plugins/daterangepicker/moment.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="assets/js/date-range.js"></script>

<!-- Option Switcher -->
<script src="assets/plugins/options-sidebar/optionswitcher.js"></script>

<!-- shop Custom -->
<script src="assets/js/main.js"></script>
</body>

</html>