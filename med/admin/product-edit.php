<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(strlen($_SESSION['odmsaid'])==0)
{	
	header('location:index.php');
}
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
	$eib= $_SESSION['editbid'];
	$category=$_POST['category'];
	$subcategory=$_POST['subcategory'];
	$brand=$_POST['brand'];
    $pharmaForm=$_POST['pharmaForm'];
    $codeATC=$_POST['codeATC'];
    $registrationNumber=$_POST['registrationNumber'];
    $dateManufacture=$_POST['dateManufacture'];
    $expirationData=$_POST['expirationData'];
    $dose=$_POST['dose'];
    $producer=$_POST['producer'];
    $importer=$_POST['importer'];
	$details=$_POST['details'];
	$description=$_POST['description'];
	$product=$_POST['product'];
	$price1=$_POST['price1'];
    //$status=$_POST['status'];
	$discount=$_POST['discount'];
	$price2=$_POST['price2'];
	$tag=$_POST['tag'];
	$sql4="update tblproducts set productName=:product,pharmaForm=:pharmaForm,codeATC=:codeATC,registrationNumber=:registrationNumber,dateManufacture=:dateManufacture, expirationDate=:expirationData, dose=:dose,producteur=:producer, importateur=:importer, productPrice=:price1,priceBefore=:price2,brandName=:brand,productDiscount=:discount,subcategory=:subcategory,categoryName=:category,productDetails=:details,productDescription=:description,groupTag=:tag where id=:eib";
	$query=$dbh->prepare($sql4);
	$query->bindParam(':category',$category,PDO::PARAM_STR);
	$query->bindParam(':brand',$brand,PDO::PARAM_STR);
    $query->bindParam(':pharmaForm',$pharmaForm,PDO::PARAM_STR);
    $query->bindParam(':codeATC',$codeATC,PDO::PARAM_STR);
    $query->bindParam(':registrationNumber',$registrationNumber,PDO::PARAM_STR);
    $query->bindParam(':dateManufacture',$dateManufacture,PDO::PARAM_STR);
    $query->bindParam(':expirationData',$expirationData,PDO::PARAM_STR);
    $query->bindParam(':dose',$dose,PDO::PARAM_STR);
    $query->bindParam(':producer',$producer,PDO::PARAM_STR);
    $query->bindParam(':importer',$importer,PDO::PARAM_STR);
    $query->bindParam(':details',$details,PDO::PARAM_STR);
	$query->bindParam(':product',$product,PDO::PARAM_STR);
	$query->bindParam(':description',$description,PDO::PARAM_STR);
	$query->bindParam(':price1',$price1,PDO::PARAM_STR);
	$query->bindParam(':price2',$price2,PDO::PARAM_STR);
	$query->bindParam(':tag',$tag,PDO::PARAM_STR);
	$query->bindParam(':subcategory',$subcategory,PDO::PARAM_STR);
	$query->bindParam(':discount',$discount,PDO::PARAM_STR);
	$query->bindParam(':eib',$eib,PDO::PARAM_STR);
	$query->execute();
	if ($query->execute())
	{
		echo '<script>alert("updated successfuly")</script>';
	}else{
		echo '<script>alert("update failed! try again later")</script>';
	}
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
		function getSubcat(val) {
			$.ajax({
				type: "POST",
				url: "get_subcat.php",
				data:'cat_id='+val,
				success: function(data){
					$("#subcategory").html(data);
				}
			});
		}
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
							<h1>Add Product</h1>
							<p class="breadcrumbs">
								<span><a href="dashboard.php">Home</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Product
							</p>
						</div>
						<div>
							<a href="product-list.php" class="btn btn-primary"> View All
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card card-default">
								<div class="card-header card-header-border-bottom">
									<h2>Edit Product</h2>
								</div>

								<div class="card-body">
									<div class="row ec-vendor-uploads">
										<div class="col-lg-12">
											<div class="ec-vendor-upload-detail">
												<?php
												$eid=intval($_GET['productid']);
												$sql2="SELECT tblproducts.*,tblcategory.categoryName as catname,tblcategory.id as cid,subcategory.subcategory as subcatname,tblbrand.BrandName as brand, tblbrand.id as bid,subcategory.id as subcatid from tblproducts join tblcategory on tblcategory.id=tblproducts.CategoryName join subcategory on subcategory.id=tblproducts.subCategory join tblbrand on tblbrand.id=tblproducts.BrandName where tblproducts.id=:eid";
												$query2 = $dbh -> prepare($sql2);
												$query2-> bindParam(':eid', $eid, PDO::PARAM_STR);
												$query2->execute();
												$results=$query2->fetchAll(PDO::FETCH_OBJ);
												if($query2->rowCount() > 0)
												{
													foreach($results as $row)
													{
														$_SESSION['editbid']=$row->id;
														?>
														<form class="row g-3" method="post" >
															<div class="col-md-3">
																<label for="inputEmail4" class="form-label">Product Image1</label>
																<img  src="productimages/<?php echo htmlentities($row->productImage);?>"   alt="Product Image" width="200px;">
																<div style="text-align: center;"><a href="#" >Update</a></div>
																
															</div>
															<div class="col-md-3">
																<label class="form-label">Product Image2</label>
																<img  src="productimages/<?php echo htmlentities($row->productImage2);?>"   alt="Product Image" width="200px;">
																<div style="text-align: center;"><a href="#" >Update</a></div>
															</div>
															<div class="col-md-3">
																<label class="form-label">Product Image3</label>
																<img  src="productimages/<?php echo htmlentities($row->productImage3);?>"   alt="Product Image" width="200px;">
																<div style="text-align: center;"><a href="#" >Update</a></div>
															</div>
															<div class="col-md-3">
																<label class="form-label">Product Image4</label>
																<img  src="productimages/<?php echo htmlentities($row->productImage4);?>"   alt="Product Image" width="200px;">
																<div style="text-align: center;"><a href="#" >Update</a></div>
															</div>
														</form>
														<form class="row g-3" style="margin-top: 30px;" method="post" >
															<div class="col-md-6">
																<label for="inputEmail4" class="form-label">Product name</label>
																<input type="text" name="product" value="<?php  echo $row->productName;?>" id="product" class="form-control slug-title" id="inputEmail4">
															</div>
                                                            <div class="col-md-6">
                                                                <label for="inputEmail4" class="form-label">Pharma Form</label>
                                                                <input type="text" name="pharmaForm" value="<?php  echo $row->pharmaForm;?>" id="pharmaForm" class="form-control slug-title" id="inputEmail4">
                                                            </div>
															<div class="col-md-6">
																<label class="form-label">Select Brand</label>
																<select  name="brand" id="brand"  class="form-select">
																	<option value="<?php  echo $row->bid;?>"><?php  echo $row->brand;?></option>
																	<?php
																	$sql3="SELECT * from  tblbrand";
																	$query3 = $dbh -> prepare($sql3);
																	$query3->execute();
																	$results3=$query3->fetchAll(PDO::FETCH_OBJ);
																	if($query3->rowCount() > 0)
																	{
																		foreach($results3 as $row3)
																		{
																			if($row->brand==$row3->brandName)
																			{
																				continue;
																			}
																			else{
																				?> 
																				<option value="<?php  echo $row3->id;?>">
																					<?php  echo $row3->brandName;?>

																				</option>
																				<?php
																			} 
																		}
																	} ?>
																</select>
															</div>
															<div class="col-md-6">
																<label class="form-label">Select Categories</label>
																<select  name="category" id="category" onChange="getSubcat(this.value);" class="form-select">
																	<option value="<?php  echo $row->cid;?>"><?php  echo $row->catname;?></option>
																	<?php
																	$sql2="SELECT * from  tblcategory";
																	$query2 = $dbh -> prepare($sql2);
																	$query2->execute();
																	$results2=$query2->fetchAll(PDO::FETCH_OBJ);
																	if($query2->rowCount() > 0)
																	{
																		foreach($results2 as $row2)
																		{
																			if($row->catname==$row2->categoryName)
																			{
																				continue;
																			}
																			else{
																				?> 
																				<option value="<?php  echo $row2->id;?>">
																					<?php  echo $row2->categoryName;?>

																				</option>
																				<?php 
																			}
																		}
																	} ?>
																</select>
															</div>
															<div class="col-md-6">
																<label class="form-label">Select Sub-Categories</label>
																<select  name="subcategory" id="subcategory" class="form-select" required>
																	<option value="<?php  echo $row->subcatid;?>"><?php  echo $row->subcatname;?></option>

																</select>
															</div>
															<div class="col-md-12">
																<label class="form-label">Sort Description</label>
																<textarea class="form-control" id="description" name="description" rows="2"><?php  echo $row->productDescription;?></textarea>
															</div>

															<div class="col-md-3">
																<label class="form-label">Price <span>(In MDL)</span></label>
																<input type="number" class="form-control" value="<?php  echo $row->productPrice;?>" name="price1" id="price1">
															</div>
															<div class="col-md-3">
																<label class="form-label">Price Before <span>(In MDL)</span></label>
																<input type="number" class="form-control" value="<?php  echo $row->priceBefore;?>" name="price2" id="price2">
															</div>
                                                            <div class="col-md-3">
                                                                <label class="form-label">Code ATC</label>
                                                                <input type="text" class="form-control" value="<?php  echo $row->codeATC;?>" name="codeATC" id="codeATC">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="form-label">Registration number</label>
                                                                <input type="text" class="form-control" value="<?php  echo $row->registrationNumber;?>" name="registrationNumber" id="registrationNumber">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="form-label">Date of manufacture</label>
                                                                <input type="text" class="form-control" value="<?php  echo $row->dateManufacture;?>" name="dateManufacture" id="dateManufacture">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="form-label">Expiration date</label>
                                                                <input type="text" class="form-control" value="<?php  echo $row->expirationDate;?>" name="expirationDate" id="expirationDate">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="form-label">Division</label>
                                                                <input type="text" class="form-control" value="<?php  echo $row->division;?>" name="division" id="division">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="form-label">Dose</label>
                                                                <input type="text" class="form-control" value="<?php  echo $row->dose;?>" name="dose" id="dose">
                                                            </div>

                                                            <div class="col-md-3">
                                                                <label class="form-label">Producer</label>
                                                                <input type="text" class="form-control" value="<?php  echo $row->producteur;?>" name="producteur" id="producteur">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="form-label">Importer</label>
                                                                <input type="text" class="form-control" value="<?php  echo $row->importateur;?>" name="importateur" id="importateur">
                                                            </div>


															<div class="col-md-3">
																<label class="form-label">Discount</label>
																<input type="number" class="form-control" value="<?php  echo $row->productDiscount;?>" name="discount" id="discount">
															</div>
															<div class="col-md-3">
																<label class="form-label">Quantity</label>
																<input type="number" class="form-control" value="<?php  echo $row->quantity;?>" name="quantity1" id="quantity1" readonly>
															</div>
															<div class="col-md-12">
																<label class="form-label">Full Detail</label>
																<textarea class="form-control"  name="details" id="details" rows="4"><?php  echo $row->productDetails;?></textarea>
															</div>
															<div class="col-md-12">
																<label class="form-label">Product Tags <span>(Type and make comma to separate tags)</span></label>
																<input type="text" class="form-control" id="tag"
																name="tag" value="<?php  echo $row->groupTag;?>" placeholder=""
																data-role="tagsinput" />
															</div>
															<input type="hidden" name="token" value="FsWga4&@f6aw" />
															<div class="col-md-12">
																<button type="submit" name="submit" class="btn btn-primary">Update</button>
															</div>
														</form>
														<?php 
													}
												} ?>
											</div>
										</div>
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
</body>

</html>