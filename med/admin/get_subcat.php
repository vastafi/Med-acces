<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(!empty($_POST["cat_id"])) 
{
 $id=intval($_POST['cat_id']);
$query=mysqli_query($con,"SELECT * FROM subcategory WHERE categoryId=$id");
?>
<option value="">Select Subcategory</option>
<?php
 while($row=mysqli_fetch_array($query))
 {
  ?>
  <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['subcategory']); ?></option>
  <?php
 }
}
?>