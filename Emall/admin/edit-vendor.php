<?php
session_start();
if(!$_SESSION['admin_id']){
header("location:login-admin.php");
}
ob_start();
include("classes.php");
include("headers.php");
$x=new vendor();
$data=$x->readAll();
$id=$_GET['id'];
$NewData=$x->readById($id);
if(isset($_POST['save'])){
if(empty($_POST['vendor_name'])){
    $error_name="Vendor Name can't be empty !";
}else{
    $x->vendor_name     =$_POST['vendor_name'];
}


if(empty($_POST['vendor_email'])){
    $error_email="Vendor email can't be empty !";
}else{
    $x->vendor_email    =$_POST['vendor_email'];
}


if(empty($_POST['vendor_pass'])){
    $error_password="Vendor password can't be empty !";
}else{
    $x->vendor_password =$_POST['vendor_pass'];
}


if(empty($_POST['vendor_mobile'])){
    $error_mobile="Vendor mobile can't be empty !";
}else{
    $x->vendor_mobile   =$_POST['vendor_mobile'];
}


if(empty($_POST['vendor_address'])){
    $error_address="Vendor address can't be empty !";
}else{
    $x->vendor_address  =$_POST['vendor_address'];
}
    $x->vendor_image    =$_FILES['vendor_image']['name'];
	$tmp              =$_FILES['vendor_image']['tmp_name'];
	$path             = "images/";
    move_uploaded_file($tmp, $path . $x->vendor_image);

 

 
 if (empty($error_name)&&empty($error_email) &&empty($error_image) && empty($error_password) && empty($error_mobile) && empty($error_address)) {
    $x->update($id);
    header("location:manage-vendor.php");
 }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
input{
    margin-left:20%;
}
button{
    margin-left:50% !important;
}
.error{
    margin-left:15% !important;
}
.done{
    margin-left:50% !important;
border:1px solid black;
font-weight:bold;
}
@media only screen and (max-width: 600px) {
    input{
    margin-left:0px;
}
button{
    margin-left:40% !important;
}
}

</style>
</head>
<body>
    

    <div class="card-body" >

    <form action="" method="post" enctype="multipart/form-data">
                                    <h4 class="card-title">Update Vendor</h4>
                                    <?php 
                                     if (isset($error_name)) {
                                        echo "<div class='error badge badge-danger' role='alert'>";
                                        echo "* ".$error_name;
                                        echo "</div>";
                                    }
                                    ?>
                                    <div class="form-group row"> 
                                        <div class="col-sm-9">
                                            <input type="text" name="vendor_name" class="form-control" id="fname" value=<?php
                                            foreach($NewData as $k => $v){
                                                echo $v['vendor_name'];
                                            }
                                            ?>>
                                        </div>
                                    </div>


                                    <?php 
                                     if (isset($error_email)) {
                                        echo "<div class='error badge badge-danger' role='alert'>";
                                        echo "* ".$error_email;
                                        echo "</div>";
                                    }
                                    if (isset($error_email_exist)) {
                                        echo "<div class='error badge badge-danger' role='alert'>";
                                        echo "* ".$error_email_exist;
                                        echo "</div>";
                                    }
                                    ?>
                                    <div class="form-group row">
                                        <div class="col-sm-9">
                                            <input type="email" name="vendor_email" class="form-control" id="lname" value=<?php
                                            foreach($NewData as $k => $v){
                                                echo $v['vendor_email'];
                                            }
                                            ?>>
                                        </div>
                                    </div>


                                    <?php 
                                     if (isset($error_password)) {
                                        echo "<div class='error badge badge-danger' role='alert'>";
                                        echo "* ".$error_password;
                                        echo "</div>";
                                    }
                                    ?>
                                    <div class="form-group row">
                                        <div class="col-sm-9">
                                            <input type="password" name="vendor_pass"  class="form-control" id="lname" value=<?php
                                            foreach($NewData as $k => $v){
                                                echo $v['vendor_password'];
                                            }
                                            ?>>
                                        </div>
                                    </div>


                                    <?php 
                                     if (isset($error_mobile)) {
                                        echo "<div class='error badge badge-danger' role='alert'>";
                                        echo "* ".$error_mobile;
                                        echo "</div>";
                                    }
                                    ?>
                                    <div class="form-group row">
                                        <div class="col-sm-9">
                                            <input type="text" name="vendor_mobile" class="form-control" id="lname" value=<?php
                                            foreach($NewData as $k => $v){
                                                echo $v['vendor_mobile'];
                                            }
                                            ?>>
                                        </div>
                                    </div>

                                    
                                    <?php 
                                     if (isset($error_address)) {
                                        echo "<div class='error badge badge-danger' role='alert'>";
                                        echo "* ".$error_address;
                                        echo "</div>";
                                    }
                                    ?>
                                    <div class="form-group row">
                                        <div class="col-sm-9">
                                            <input type="text" name="vendor_address" class="form-control" id="lname" value=<?php
                                            foreach($NewData as $k => $v){
                                                echo $v['vendor_address'];
                                            }
                                            ?>>
                                        </div>
                                    </div>

                                    <?php 
                                     if (isset($error_image)) {
                                        echo "<div class='error badge badge-danger' role='alert'>";
                                        echo "* ".$error_image;
                                        echo "</div>";
                                    }
                                    ?>
                                    <div class="form-group row">
                                        <div class="col-sm-9">
                                        <input type="file" class="form-control" name="vendor_image">
                                        </div>
                                    </div>


                                </div>

                                <button type="submit" name="save" class="btn btn-outline-secondary btn-lg">Save</button>

    </form>
<hr>
                           

<?php
include("footer.php");
?>

</body>
</html>