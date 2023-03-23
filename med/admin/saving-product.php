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
	$category=$_POST['category'];
	$product=$_POST['product'];
    $pharmaForm=$_POST['pharmaForm'];
    $brand=$_POST['brand'];
    $codeATC=$_POST['codeATC'];
    $registrationNumber=$_POST['registrationNumber'];
    $dateManufacture=$_POST['dateManufacture'];
    $expirationData=$_POST['expirationData'];
    $dose=$_POST['dose'];
    $producer=$_POST['producer'];
    $importer=$_POST['importer'];
    $quantity=$_POST['quantity'];
    $status=$_POST['status'];
    $discount=$_POST['discount'];
    $subcategory=$_POST['subcategory'];
	$price1=$_POST['price1'];
	$price2=$_POST['price2'];
	$group_tag=$_POST['group_tag'];
	$details=$_POST['details'];
	$description=$_POST['description'];
	$image=$_FILES["imageUpload"]["name"];
	move_uploaded_file($_FILES["imageUpload"]["tmp_name"],"productimages/".$_FILES["imageUpload"]["name"]);
	$sql="insert into tblproducts(categoryName,productName,pharmaForm,brandName,codeATC,registrationNumber,dateManufacture,expirationDate,dose,producteur,importateur,quantity,status,productDiscount,subcategory,productPrice,priceBefore,groupTag, productDetails,productDescription,productImage)values(:category,:product,:pharmaForm,:brand,:codeATC,:registrationNumber,:dateManufacture,:expirationData,:dose,:producer,:importer,:quantity,:status,:discount,:subcategory,:price1,:price2,:group_tag,:details,:description,:image)";
	$query=$dbh->prepare($sql);
	$query->bindParam(':category',$category,PDO::PARAM_STR);
	$query->bindParam(':product',$product,PDO::PARAM_STR);
    $query->bindParam(':pharmaForm',$pharmaForm,PDO::PARAM_STR);
    $query->bindParam(':brand',$brand,PDO::PARAM_STR);
    $query->bindParam(':codeATC',$codeATC,PDO::PARAM_STR);
    $query->bindParam(':registrationNumber',$registrationNumber,PDO::PARAM_STR);
    $query->bindParam(':dateManufacture',$dateManufacture,PDO::PARAM_STR);
    $query->bindParam(':expirationData',$expirationData,PDO::PARAM_STR);
    $query->bindParam(':dose',$dose,PDO::PARAM_STR);
    $query->bindParam(':producer',$producer,PDO::PARAM_STR);
    $query->bindParam(':importer',$importer,PDO::PARAM_STR);
    $query->bindParam(':quantity',$quantity,PDO::PARAM_STR);
    $query->bindParam(':status',$status,PDO::PARAM_STR);
    $query->bindParam(':discount',$discount,PDO::PARAM_STR);
    $query->bindParam(':subcategory',$subcategory,PDO::PARAM_STR);
    $query->bindParam(':price1',$price1,PDO::PARAM_STR);
	$query->bindParam(':price2',$price2,PDO::PARAM_STR);
	$query->bindParam(':details',$details,PDO::PARAM_STR);
	$query->bindParam(':description',$description,PDO::PARAM_STR);
	$query->bindParam(':group_tag',$group_tag,PDO::PARAM_STR);
    $query->bindParam(':image',$image,PDO::PARAM_STR);

	$query->execute();
	$LastInsertId=$dbh->lastInsertId();
	if ($LastInsertId>0) 
	{
		?>
		<script >
			swal.fire({
				'title': 'Thank you',
				'text': 'Saved successfuly',
				'icon': 'success',
				'type': 'success'
			}).then( () => {
				location.href = 'product-add.php'
			})
		</script>
		<?php
	}
	else
	{
		echo '<script>alert("Something Went Wrong. Please try again")</script>';
	}
}
?>