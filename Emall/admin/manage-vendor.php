<?php
session_start();
if(!$_SESSION['admin_id']){
header("location:login-admin.php");
}
include("classes.php");
include("headers.php");
$x=new vendor();
$data=$x->readAll();

if(isset($_POST['save'])){
if(empty($_POST['vendor_name'])){
    $error_name="Enter vendor Name !";
}else{
    $x->vendor_name     =$_POST['vendor_name'];
}


if(empty($_POST['vendor_email'])){
    $error_email="Enter vendor email !";
}else{
    $x->vendor_email    =$_POST['vendor_email'];
}


if(empty($_POST['vendor_pass'])){
    $error_password="Enter vendor Password !";
}else{
    $x->vendor_password =$_POST['vendor_pass'];
}


if(empty($_POST['vendor_mobile'])){
    $error_mobile="Enter vendor Mobile Number !";
}else{
    $x->vendor_mobile   =$_POST['vendor_mobile'];
}


if(empty($_POST['vendor_address'])){
    $error_address="Enter vendor Address !";
}else{
    $x->vendor_address  =$_POST['vendor_address'];
}


if(empty($_FILES['vendor_image']['name'])){
    $error_image="Enter vendor image !";
}else{
    $x->vendor_image    =$_FILES['vendor_image']['name'];
	$tmp              =$_FILES['vendor_image']['tmp_name'];
	$path             = "images/";
    move_uploaded_file($tmp, $path . $x->vendor_image);
}
 $flag=0;
 if(!empty($data)){
 foreach($data as $k => $v){
    if($v['vendor_email'] == $x->vendor_email){
        $flag=1;
    }
 }}

 if($flag === 1){
    $error_email_exist="The Email Is Already Exist";
 }else{
 if (empty($error_name)&&empty($error_email) &&empty($error_image) && empty($error_password) && empty($error_mobile) && empty($error_address)) {
    $x->create();
}
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
                                    <h4 class="card-title">Add Vendors</h4>
                                    <?php 
                                     if (isset($error_name)) {
                                        echo "<div class='error badge badge-danger' role='alert'>";
                                        echo "* ".$error_name;
                                        echo "</div>";
                                    }
                                    ?>
                                    <div class="form-group row"> 
                                        <div class="col-sm-9">
                                            <input type="text" name="vendor_name" class="form-control" id="fname" placeholder="Full Name">
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
                                            <input type="email" name="vendor_email" class="form-control" id="lname" placeholder="Email">
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
                                            <input type="password" name="vendor_pass"  class="form-control" id="lname" placeholder="Password">
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
                                            <input type="text" name="vendor_mobile" class="form-control" id="lname" placeholder="Mobile Number">
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
                                            <input type="text" name="vendor_address" class="form-control" id="lname" placeholder="Address">
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
                                <div class="card-body">
                                <h5 class="card-title m-b-0">Vendors</h5>
                            </div>
                            <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">Full Name</th>
                                      <th scope="col">Email</th>
                                      <th scope="col">Mobile Number</th>
                                      <th scope="col">Address</th>
                                      <th scope="col">Image</th>
                                      <th scope="col">Edit</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                <?php                                
                                  $data1=$x->readAll();
                                  if(empty($data1)){
                                echo "<div class='alert alert-danger' role='alert' style='text-align:center;'> No Vendors Yet !!!</div>";  
                                }else{
                                  foreach($data1 as $k => $v)
                                  {
                                    echo "<tr>";
                                    echo "<th scope='row'>{$v['vendor_name']}</th>";
                                    echo "<td>{$v['vendor_email']}</td>";
                                    echo "<td>{$v['vendor_mobile']}</td>";
                                    echo "<td>{$v['vendor_address']}</td>";
                                    echo "<td><img src='images/{$v['vendor_image']}' width='100px' height='100px'></td>";
                                    echo "<td>";
                                    echo "<a href='delete-vendor.php?id={$v['vendor_id']}'><i style='color:red;margin-top:5px;font-size:20px' ;aria-hidden='true' class='fa fa-trash'></i></a>";
                                    echo "<a href='edit-vendor.php?id={$v['vendor_id']}'> <i style='color:green;margin-top:5px;font-size:25px;' class='m-r-10 mdi mdi-pencil-box-outline'></i></a>";
                                    echo "</td>";
                                    echo "</tr>";
                                    }
                                }
                                ?>
                                  </tbody>
                            </table>
                        </div>

<?php
include("footer.php");
?>

</body>
</html>