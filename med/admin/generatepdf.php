<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
function check_login()
{
	if(strlen($_SESSION['odmsaid'])==0)
	{   
		$host = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra="user-invoice.php";     
		$_SESSION["id"]="";
		header("Location: http://$host$uri/$extra");
	}
}
ob_start();
require('fpdf/fpdf.php');

class myPDF extends FPDF{
	
     // Page footer
	function Footer()	{
    // Position at 1.5 cm from bottom
		$this->SetY(-15);
    // Arial italic 8
		$this->SetFont('Arial','',8);
    // Page number
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
}

$pdf = new myPDF('p','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetTextColor(0,0,0);

$invoice=($_GET['search']);
$sql="SELECT * from  tblcompany ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
	foreach($results as $row)	{
		$date = date('d-m-y');
		$user2=($_GET['userid']);
        //set font to arial, bold, 14pt
		$pdf->SetFont('Arial','B',14);

        //cell(width , height , text , border , endline , [align])

		$pdf->Cell(130 ,5,$row->companyName,0,0);
		$pdf->Cell (59 ,5,'Invoice',0,1);//end of line

		//set font to arial, regular, 12pt
		$pdf->SetFont('Arial','',12);

		$pdf->Cell(130 ,5,''.$row->companyAddress.'',0,0);
		$pdf->Cell (59 ,5,' ',0,1);//end of line

		$pdf->Cell(130 ,5,''.$row->companyEmail.'',0,0);
		$pdf->Cell (25 ,5,'Date ',0,0);
		$pdf->Cell (34 ,5,''.$date.'',0,1);//end of line

		$pdf->Cell(130 ,5,''.'0'.$row->companyPhone.'',0,0);
		$pdf->Cell (25 ,5,'Invoice # ',0,0);
		$pdf->Cell (34 ,5,''.$invoice.'',0,1);//end of line

		$pdf->Cell(130 ,5,'',0,0);
		$pdf->Cell (25 ,5,'Customer ID ',0,0);
		$pdf->Cell (34 ,5,''.$user2.'',0,1);//end of line
	}

}

//make a dummy empty cell as a vertical spacer
$pdf->Cell (189 ,10,'',0,1);//end of line
$user=($_GET['userid']);
$sql2="SELECT * from  users where id='$user' ";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
if($query2->rowCount() > 0){
	foreach($results2 as $row2)	{
		//Billing address
		$pdf->Cell (100  ,5,'Billing to',0,1);//end of line
		//add dummy cell at begining of each line for indetation
		$pdf->Cell(10 ,5,'',0,0);
		$pdf->Cell (90 ,5,$row2->name,0,1);

		$pdf->Cell(10 ,5,'',0,0);
		$pdf->Cell (90 ,5,$row2->email,0,1);

		$pdf->Cell(10 ,5,'',0,0);
		$pdf->Cell (90 ,5,'0'.$row2->contactNo,0,1);

		$pdf->Cell(10 ,5,'',0,0);
		$pdf->Cell (90 ,5,''.$row2->billingAddress.' '.$row2->billingCountry.'',0,1);

	}
}
//make a dummy empty cell as a vertical spacer
$pdf->Cell (189 ,10,'',0,1);

// code for print Heading of tables
$pdf->SetFont('Arial','B',12); 

$pdf->Cell(10 ,8,'No',1,0);
$pdf->Cell (80 ,8,'Name',1,0);
$pdf->Cell (20 ,8,'Quantity',1,0);
$pdf->Cell (39 ,8,'Price (units)',1,0);
$pdf->Cell (40 ,8,'Amount',1,1);//end of line

$pdf->SetFont('Arial','',12); 
//SQL to get 10 records
$invoice=($_GET['search']);
if(isset($invoice)&& !empty($invoice)){
	$query="SELECT tblproducts.productName,tblproducts.productPrice,orders.quantity  from orders join tblproducts on tblproducts.id=orders.productid where orders.invoiceNumber='$invoice'";
	$cnt=1;
	foreach ($dbh->query($query) as $row) 	{
		$pdf->Cell(10 ,8,$cnt,1,0);
		$pdf->Cell (80 ,8,$row['productName'],1,0);
		$pdf->Cell (20 ,8,$row['quantity'],1,0);
		$pdf->Cell (39 ,8,(number_format($row['productPrice'],0)),1,0,'R');
		$pdf->Cell (40 ,8,(number_format(($row['quantity']*$row['productPrice']),0)),1,1,'R');
		$subtotal=($row['quantity']*$row['productPrice']);
		$grandtotal+=$subtotal; 
		$cnt++;

	}
}
$pdf->Cell(110 ,8,'',0,0);
$pdf->Cell (39 ,8,'Subtotal',0,0);
$pdf->Cell (40 ,8,(number_format($grandtotal,0)),1,1,'R');//end of line

$pdf->Cell(110 ,8,'',0,0);
$pdf->Cell (39 ,8,'Tax (10%)',0,0);
$pdf->Cell (40 ,8,(number_format((0.1*$grandtotal),0)),1,1,'R');//end of line


$pdf->Cell(110 ,8,'',0,0);
$pdf->Cell (39 ,8,'Total',0,0);
$pdf->Cell (40 ,8,(number_format(((0.1*$grandtotal)+$grandtotal),0)),1,1,'R');//end of line
/// end of records /// 

$pdf->Output();
ob_end_flush();
?>