<?php
session_start();
if(!$_SESSION['admin_id']){
header("location:login-admin.php");
}
ob_start();
include("classes.php");
include("headers.php");

$x=new admin();
$data=$x->readAll();
$id=$_GET['id'];
$NewData=$x->readById($id);
if(isset($_POST['save'])){

if (empty($_POST['admin_name'])) {
    $error_name="name is required";
 }else{
     $x->admin_name=$_POST['admin_name'];
 }
 if (empty($_POST['admin_email'])) {
    $error_email="email is required";
 }else{
     $x->admin_email=$_POST['admin_email'];
 }
 if (empty($_POST['admin_pass'])) {
    $error_password="password is required";
 }else{
     $x->admin_password=$_POST['admin_pass'];
 }

 

 
 if (empty($error_name)&&empty($error_email) &&empty($error_image) && empty($error_password)) {
    $x->update($id);
    header("location:manage-admin.php");

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

    <form action="" method="post">
                                    <h4 class="card-title">Update Admin</h4>
                                    <?php 
                                     if (isset($error_name)) {
                                        echo "<div class='error badge badge-danger' role='alert'>";
                                        echo "* ".$error_name;
                                        echo "</div>";
                                    }
                                    
                                    ?>
                                    <div class="form-group row">
                                        <div class="col-sm-9">
                                            <input type="text" name="admin_name" class="form-control" id="fname" value=<?php
                                            foreach($NewData as $k => $v){
                                                echo $v['admin_fullname'];
                                            }
                                            ?>>
                                        </div>
                                    </div>
                                   
                                    <br>
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
                                            <input type="email" name="admin_email" class="form-control" id="lname" value=<?php
                                            foreach($NewData as $k => $v){
                                                echo $v['admin_email'];
                                            }
                                            ?>>
                                        </div>
                                    </div>
                                    
                                    <br>
                                    <?php 
                                     if (isset($error_password)) {
                                        echo "<div class='error badge badge-danger' role='alert'>";
                                        echo "* ".$error_password;
                                        echo "</div>";
                                    }
                                    ?>
                                    <div class="form-group row">
                                        <div class="col-sm-9">
                                            <input type="password" name="admin_pass" class="form-control" id="lname" value=<?php
                                            foreach($NewData as $k => $v){
                                                echo $v['admin_password'];
                                            }
                                            ?>>
                                        </div>
                                    </div>
                                    
                                </div>

                                <button type="submit" name="save" class="btn btn-outline-secondary btn-lg">Update</button>

 </form>
<hr>
                             

<?php
include("footer.php");
?>

</body>
</html>