<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(strlen($_SESSION['odmsaid'])==0)
{
    header('location:index.php');
}

?>
<form method="post" id="brand-form"  enctype="multipart/form-data">
    <div id="form_status"></div>
    <?php
    $sid= $_POST['edit_id5'];
    $sql="SELECT * from suppliers where id=:sid ";
    $query2 = $dbh -> prepare($sql);
    $query2-> bindParam(':sid', $sid, PDO::PARAM_STR);
    $query2->execute();
    $results2=$query2->fetchAll(PDO::FETCH_OBJ);
    if($query2->rowCount() > 0)
    {
        foreach($results2 as $row2)
        {
            $_SESSION['editpid']=$row2->id;
            ?>
            <div class="row mb-2">

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="FirstName">Name</label>
                        <input type="text" class="form-control" name="name" value="<?php  echo $row2->nameSupplier;?>" id="name">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" value="<?php  echo $row2->email;?>" id="email">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Mobile">Contact No.</label>
                        <input type="text" class="form-control" value="<?php  echo $row2->contactNumber;?>"  name="phone" id="phone" >
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Mobile">Address</label>
                        <input type="text" class="form-control" value="<?php  echo $row2->address;?>"  name="address" id="address" >
                    </div>
                </div>
            </div>
            <div class="modal-footer px-4">
                <button type="button" class="btn btn-secondary btn-pill" data-bs-dismiss="modal">Cancel</button>
            </div>
            <?php
        }
    } ?>
</form>