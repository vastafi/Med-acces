<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['login']))
{
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $sql ="SELECT * FROM tbladmin WHERE username=:username and password=:password";
    $query=$dbh->prepare($sql);
    $query-> bindParam(':username', $username, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
    {
        foreach ($results as $result) 
        {
            $_SESSION['odmsaid']=$result->id;
            $_SESSION['login']=$result->username;
            $_SESSION['names']=$result->firstName;
            $_SESSION['permission']=$result->adminName;
            $_SESSION['companyname']=$result->companyName;
            $get=$result->Status;
        }
        $aa= $_SESSION['odmsaid'];
        $sql="SELECT * from tbladmin  where id=:aa";
        $query = $dbh -> prepare($sql);
        $query->bindParam(':aa',$aa,PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0)
        {
            foreach($results as $row)
            {            
                if($row->status=="1")
                { 
                 echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";      
             } else
             { 
                echo "<script>
                alert('Your account was disabled! Approach Admin.');document.location ='index.php';
                </script>";
            }
        } 
    } 
} else{
    echo "<script>alert('Invalid Details');</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
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
	
	<!-- Shop CSS -->
	<link id="Shop-css" rel="stylesheet" href="assets/css/style.css" />
	
	<!-- FAVICON -->
	<link href="assets/img/logo/medacces_logo.jpg" rel="shortcut icon" />
</head>

<body class="sign-inup" id="body" style="background-image: url('assets/img/bg/bg.jpg')">
	<div class="container d-flex align-items-center justify-content-left form-height-login pt-24px pb-24px">
		<div class="row justify-content-left">
			<div class="col-lg-6 col-md-10">
				<div class="card">
					<div class="card-header bg-secondary">
						<div class="ec-brand">
							<a href="../index.php" title="Med">
								<img class="ec-brand-icon" style="height: 65px" src="assets/img/logo/medacces_logo-removebg-preview.png" alt="" />
							</a>
						</div>
					</div>
					<div class="card-body p-5">
						<h4 class="text-dark mb-5">Sign In</h4>
						
						<form role="form" id=""  method="post" enctype="multipart/form-data">
							<div class="row">
								<div class="form-group col-md-12 mb-4">
									<input type="text" name="username" class="form-control" id="username" placeholder="Username">
								</div>
								
								<div class="form-group col-md-12 ">
									<input type="password" name="password" class="form-control" id="password" placeholder="Password">
								</div>
								
								<div class="col-md-12">
									<div class="d-flex my-2 justify-content-between">
										
										<p><a class="text-secondary" href="forgot-password.php">Forgot Password?</a></p>
									</div>
									
									<button type="submit" name="login" class="btn btn-secondary btn-block mb-4">Sign In</button>
									
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Javascript -->
	<script src="assets/plugins/jquery/jquery-3.5.1.min.js"></script>
	<script src="assets/plugins/jquery/jquery.notify.min.js"></script>
	<script src="assets/plugins/jquery/jquery.bundle.notify.min.js"></script>
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<script src="assets/plugins/jquery-zoom/jquery.zoom.min.js"></script>
	<script src="assets/plugins/slick/slick.min.js"></script>
	
	<!-- Shop Custom -->	
	<script src="assets/js/main.js"></script>
</body>
</html>