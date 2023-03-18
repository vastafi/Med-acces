<?php
include('includes/dbconnection.php');

if(isset($_POST["Import"])){
    echo $filename=$_FILES["file"]["tmp_name"];
    if($_FILES["file"]["size"] > 0)
    {
        $file = fopen($filename, "r");
        while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
        {
            //It wiil insert a row to our subject table from our csv file`
            $sql = "INSERT into tblproducts (`id`, `categoryName`, `subcategory`, `brandName` , `productName` , `pharmaForm`, `dose`, `volume`, `division`, `codeATC`, `registrationNumber`, `dateManufacture`, `expirationDate`, `groupTag`, `quantity`,`status`, `producteur` ,`importateur`, `productImage` , `productImage2`, `productImage3`,`productImage4`, `productPrice`,`priceBefore` , `productDiscount` , `productDescription` , `productDetails`, `productStatus`, `postingDate`, `updationDate`) 
	            	values('$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]','$emapData[7]','$emapData[8]','$emapData[9]','$emapData[10]','$emapData[11]','$emapData[12]','$emapData[13]','$emapData[14]','$emapData[15]','$emapData[16]','$emapData[17]','$emapData[18]','$emapData[19]','$emapData[20]','$emapData[21]','$emapData[22]','$emapData[23]','$emapData[24]','$emapData[25]','$emapData[26]','$emapData[27]','$emapData[28]','$emapData[29]','$emapData[30]')";

            $result = mysqli_query( $con, $sql );
            if(! $result )
            {
                echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"index.php\"
						</script>";

            }

        }
        fclose($file);
        //throws a message if data successfully imported to mysql database from excel file
        echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"index.php\"
					</script>";

        //close of connection
        mysqli_close($con);
    }
}
?>		 