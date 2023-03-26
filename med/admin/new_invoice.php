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

    <!-- Data-Tables -->
    <link href='assets/plugins/data-tables/datatables.bootstrap5.min.css' rel='stylesheet'>
    <link href='assets/plugins/data-tables/responsive.datatables.min.css' rel='stylesheet'>

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
                    <h1>New Invoice</h1>
                    <p class="breadcrumbs"><span><a href="dashboard.php">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Invoice
                    </p>
                </div>
                <!-- customer details content -->
                <div class="row col col-md-12">
                    <div class="col col-md-3 form-group">
                        <label class="font-weight-bold" for="customers_name">Customer Name :</label>
                        <input id="customers_name" type="text" class="form-control" placeholder="Customer Name" name="customers_name">
                        <div id="customer_suggestions" class="list-group position-fixed"></div>
                    </div>
                    <div class="col col-md-3 form-group">
                        <label class="font-weight-bold" for="customers_address">Address :</label>
                        <input id="customers_address" type="text" class="form-control" name="customers_address" placeholder="Address">
                    </div>
                    <div class="col col-md-2 form-group">
                        <label class="font-weight-bold" for="invoice_number">Invoice Number :</label>
                        <input id="invoice_number" type="text" class="form-control" name="invoice_number" placeholder="Invoice Number">
                    </div>
                    <div class="col col-md-2 form-group">
                        <label class="font-weight-bold" for="">Payment Type :</label>
                        <select id="payment_type" class="form-control">
                            <option value="1">Cash Payment</option>
                            <option value="2">Card Payment</option>
                            <option value="3">Net Banking</option>
                        </select>
                    </div>
                    <div class="col col-md-2 form-group">
                        <label class="font-weight-bold" for="">Date :</label>
                        <input type="date" class="datepicker form-control hasDatepicker" id="invoice_date" value='<?php echo date('Y-m-d'); ?>'">
                        <code class="text-danger small font-weight-bold float-right" id="date_error" style="display: none;"></code>
                    </div>
                </div>
                <!-- customer details content end -->

                <!-- new user button -->
                <div class="row col col-md-12">
                    <div class="col col-md-2 form-group">
                        <button type="button" class="btn btn-primary" data-bs-target="#addUser" data-bs-toggle="modal">
                            Add User
                        </button>
                    </div>

                    <div class="col col-md-1 form-group"></div>
                    <div class="col col-md-2 form-group">
                        <label class="font-weight-bold" for="customers_contact_number">Contact Number :</label>
                        <input id="customers_contact_number" type="number" class="form-control" name="customers_contact_number" placeholder="Contact Number">
                    </div>
                </div>
                <!-- closing new user button -->
                <!-- Add User Modal  -->
                <div class="modal fade modal-add-contact" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div id="form_status"></div>
                            <form method="post" id="user-contact" onSubmit="return valid_datas( this );" enctype="multipart/form-data">
                                <div class="modal-header px-4">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Add New User</h5>
                                </div>

                                <div class="modal-body px-4">
                                    <div class="form-group row mb-6">
                                        <label for="coverImage" class="col-sm-4 col-lg-2 col-form-label">User
                                            Image</label>

                                        <div class="col-sm-8 col-lg-10">
                                            <div class="custom-file mb-1">
                                                <input type="file" class="custom-file-input" name="coverImage" id="coverImage"
                                                >
                                                <label class="custom-file-label" for="coverImage">Choose
                                                    file...</label>
                                                <div class="invalid-feedback">Example invalid custom file feedback
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="firstName">First name</label>
                                                <input type="text" class="form-control" name="firstName" id="firstName" >
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="lastName">Last name</label>
                                                <input type="text" class="form-control" name="lastName" id="lastName">
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group mb-4">
                                                <label for="userName">User name</label>
                                                <input type="text" class="form-control" name="username" id="username"
                                                >
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group mb-4">
                                                <label for="email">Staff ID</label>
                                                <input type="text" class="form-control" name="staffid" id="staffid"
                                                >
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group mb-4">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" onBlur="checkAvailability()" name="email" id="email"
                                                >
                                                <span id="user-availability-status" style="font-size:12px;"></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group mb-4">
                                                <label for="Birthday">Birthday</label>
                                                <input type="text" class="form-control" placeholder="dd/mm/yyyy" name="Birthday" id="Birthday"
                                                >
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group mb-4">
                                                <label for="mobileno">Mobile Number</label>
                                                <input type="text" class="form-control" name="mobileno" id="mobileno"
                                                >
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-4">
                                                <label for="dignity">Permission</label>
                                                <select class="form-control" name="dignity" id="dignity">
                                                    <option value="">Select permisions</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="User">User</option>
                                                    <option value="Manager">Manager</option>
                                                    <option value="Sales">Sales</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-4">
                                                <label for="password">password</label>
                                                <input type="password" class="form-control" name="password" id="password">
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group mb-4">
                                                <label for="event">Confirm Password</label>
                                                <input type="password" class="form-control" name="confirmpassword" id="confirmpassword"
                                                >
                                            </div>
                                            <input type="hidden" name="token" value="FsWga4&@f6aw" />
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer px-4">
                                    <button type="button" class="btn btn-secondary btn-pill"
                                            data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary btn-pill">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col col-md-12">
                    <hr class="col-md-12" style="padding: 0px; border-top: 3px solid  #0d6efd;">
                </div>

                <!-- add medicines -->
                <div class="row col col-md-12">
                    <div class="row col col-md-12 font-weight-bold">
                        <div class="col col-md-2">Medicine Name</div>
                        <div class="col col-md-2">Id</div>
                        <div class="col col-md-1">Ava.Qty.</div>
                        <div class="col col-md-1">Expiry</div>
                        <div class="col col-md-1">Quantity</div>
                        <div class="col col-md-1">MRP</div>
                        <div class="col col-md-1">Discount(%)</div>
                        <div class="col col-md-1">Total</div>
                        <div class="col col-md-2">Action</div>
                    </div>
                </div>

                <div class="col col-md-12">
                    <hr class="col-md-12" style="padding: 0px; border-top: 2px solid  #0d6efd;">
                </div>

                <table id="responsive-data-table" class="table">
                    <tbody>
                    <br>
                    <br>
                    </tbody>
                </table>

                <div class="col col-md-12">
                    <hr class="col-md-12" style="padding: 0px; border-top: 2px solid #0d6efd;">
                </div>

                <div class="row col col-md-12 ">

                </div>
                <!-- end medicines -->

                <div class="row col col-md-12">
                    <div class="col col-md-6 form-group"></div>
                    <div class="col col-md-2 form-group float-right">
                        <label class="font-weight-bold" for="">Total Amount:</label>
                        <input type="text" class="form-control" value="0" id="total_amount">
                    </div>
                    <div class="col col-md-2 form-group float-right">
                        <label class="font-weight-bold" for="">Total Discount :</label>
                        <input type="text" class="form-control" value="0" id="total_discount" >
                    </div>
                    <div class="col col-md-2 form-group float-right">
                        <label class="font-weight-bold" for="">Net Total :</label>
                        <input type="text" class="form-control" value="0" id="net_total">
                    </div>
                </div>

                <div class="col col-md-12">
                    <hr class="col-md-12" style="padding: 0px;">
                </div>

                <div class="row col col-md-12">
                    <div id="save_button" class="col col-md-2 form-group float-right">
                        <label class="font-weight-bold" for=""></label>
                        <button class="btn btn-success form-control font-weight-bold" onclick="#">Save</button>
                    </div>
                    <div id="new_invoice_button" class="col col-md-2 form-group float-right"  style="display: none;">
                        <label class="font-weight-bold" for=""></label>
                        <button class="btn btn-primary form-control font-weight-bold" onclick="#">New Invoice</button>
                    </div>
                    <div id="print_button" class="col col-md-2 form-group float-right" style="display: none;">
                        <label class="font-weight-bold" for=""></label>
                        <button class="btn btn-warning form-control font-weight-bold" onclick="#">Print</button>
                    </div>
                    <div class="col col-md-4 form-group"></div>
                    <div class="col col-md-2 form-group float-right">
                        <label class="font-weight-bold" for="">Paid Amount :</label>
                        <input type="text" class="form-control" name="total_discount" onkeyup="#">
                    </div>
                    <div class="col col-md-2 form-group float-right">
                        <label class="font-weight-bold" for="">Change :</label>
                        <input type="text" class="form-control" id="change_amt">
                    </div>
                </div>
                <div id="invoice_acknowledgement" class="col-md-12 h5 text-success font-weight-bold text-center" style="font-family: sans-serif;"</div>
        </div>
        <!-- form content end -->
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

<!-- Data-Tables -->
<script src='assets/plugins/data-tables/jquery.datatables.min.js'></script>
<script src='assets/plugins/data-tables/datatables.bootstrap5.min.js'></script>
<script src='assets/plugins/data-tables/datatables.responsive.min.js'></script>

<!-- Option Switcher -->
<script src="assets/plugins/options-sidebar/optionswitcher.js"></script>

<!-- Shop Custom -->
<script src="assets/js/main.js"></script>

</body>

</html>
