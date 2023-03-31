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
    <link id="Shop-css" rel="stylesheet" href="assets/css/style.css" />
    <link id="Shop-css" rel="stylesheet" href="assets/css/form-validate.css" />

    <link rel="stylesheet" type="text/css" href="assets/sweetalert2/sweetalert2.min.css">

    <!-- FAVICON -->
    <link href="assets/img/logo/medacces_logo.jpg" rel="shortcut icon" />
    <script>

    </script>
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
                <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                    <div>
                        <h1>Add Supplier</h1>
                        <p class="breadcrumbs">
                            <span><a href="dashboard.php">Home</a></span>
                            <span><i class="mdi mdi-chevron-right"></i></span>Supplier
                        </p>
                    </div>
                    <div>
                        <a href="manage_supplier.php" class="btn btn-primary"> View All
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-default">
                            <div class="card-header card-header-border-bottom">
                                <h2>Add Supplier</h2>
                            </div>
                            <div class="card-body">
                                <div class="row ec-vendor-uploads">
                                    <form class="row g-3" method="post"  id="fruitkha-contact"  enctype="multipart/form-data">
                                        <div class="col-lg-8">
                                            <div class="ec-vendor-upload-detail">
                                                <div class="row col-md-12 mt-4">
                                                    <div class="col-md-12">
                                                        <label for="nameSupplier" class="form-label">Supplier name</label>
                                                        <input type="text" name="nameSupplier" id="nameSupplier" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="row col-md-12 mt-4">
                                                    <div class="col-md-12">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="email" name="email" id="email" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="row col-md-12 mt-4">
                                                    <div class="col-md-6">
                                                        <label for="contactNumber" class="form-label">Contact number</label>
                                                        <input  name="contactNumber" id="contactNumber"  class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="row col-md-12 mt-4">
                                                    <div class="col-md-6">
                                                        <label for="address" class="form-label">Address</label>
                                                        <input type="text" name="adress" id="address" class="form-control" required>
                                                    </div>
                                                </div>
                                                <br>
                                                <input type="hidden" name="token" value="FsWga4&@f6aw" />
                                                     <div class="col-md-12">
                                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                                    </div>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Content -->
        </div> <!-- End Content Wrapper -->

    <!-- Common Javascript -->
    <script src="assets/plugins/jquery/jquery-3.5.1.min.js"></script>
    <script src="assets/plugins/jquery/jquery.notify.min.js"></script>
    <script src="assets/plugins/jquery/jquery.bundle.notify.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/plugins/tags-input/bootstrap-tagsinput.js"></script>
    <script src="assets/plugins/simplebar/simplebar.min.js"></script>
    <script src="assets/plugins/jquery-zoom/jquery.zoom.min.js"></script>
    <script src="assets/plugins/slick/slick.min.js"></script>

    <!-- Option Switcher -->
    <script src="assets/plugins/options-sidebar/optionswitcher.js"></script>

    <!-- form validation js -->
    <script src="assets/js/form-validate.js"></script>
    <script src="assets/sweetalert2/sweetalert2.min.js"></script>

    <!-- Shop Custom -->
    <script src="assets/js/main.js"></script>
        <?php
        if(isset($_POST['submit']))
        {
            if( empty( $_POST['token'] ) ){
                echo '<span class="notice">Error!</span>';
                exit;
            }
            if( $_POST['token'] != 'FsWga4&@f6aw' ){
                echo '<span class="notice">Error!</span>';
                exit;
            }
            $nameSupplier=$_POST['nameSupplier'];
            $email=$_POST['email'];
            $contactNumber=$_POST['contactNumber'];
            $address=$_POST['address'];
            $sql="insert into suppliers(nameSupplier,email,contactNumber,address) values(:nameSupplier,:email,:contactNumber,:address)";
            $query=$dbh->prepare($sql);
            $query->bindParam(':nameSupplier',$nameSupplier,PDO::PARAM_STR);
            $query->bindParam(':email',$email,PDO::PARAM_STR);
            $query->bindParam(':contactNumber',$contactNumber,PDO::PARAM_STR);
            $query->bindParam(':address',$address,PDO::PARAM_STR);
            $query->execute();
            $LastInsertId=$dbh->lastInsertId();
            if ($LastInsertId>0)
            {
                ?>
                <script >
                    swal.fire({
                        'title': 'Thank you',
                        'text': 'Saved successfully',
                        'icon': 'success',
                        'type': 'success'
                    }).then( () => {
                        location.href = 'supplier_add.php'
                    })
                </script>
                <?php
            }
            else
            {
                echo '<script>alert("Ok. Try again")</script>';
            }
        }


        ?>
</body>

</html>