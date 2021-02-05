<?php
session_start();
if(!$_SESSION['admin_id']){
header("location:login-admin.php");
}
include("classes.php");
include("headers.php");
$x=new customer();
if(isset($_POST['save'])){
if(empty($_POST['customer_name'])){
    $error_name="Enter Customer Name !";
}else{
    $x->cust_name     =$_POST['customer_name'];
}


if(empty($_POST['customer_email'])){
    $error_email="Enter Customer email !";
}else{
    $x->cust_email    =$_POST['customer_email'];
}


if(empty($_POST['customer_pass'])){
    $error_password="Enter Customer Password !";
}else{
    $x->cust_password =$_POST['customer_pass'];
}


if(empty($_POST['customer_mobile'])){
    $error_mobile="Enter Customer Mobile Number !";
}else{
    $x->cust_mobile   =$_POST['customer_mobile'];
}


if(empty($_POST['customer_address'])){
    $error_address="Enter Customer Address !";
}else{
    $x->cust_address  =$_POST['customer_address'];
}


if(empty($_FILES['cust_image']['name'])){
    $error_image="Enter Customer image !";
}else{
    $x->cust_image    =$_FILES['cust_image']['name'];
	$tmp              =$_FILES['cust_image']['tmp_name'];
	$path             = "images/";
    move_uploaded_file($tmp, $path . $x->cust_image);
}
$data=$x->readAll();
 $flag=0;
 if(!empty($data)){
 foreach($data as $k => $v){
    if($v['cust_email'] == $x->cust_email){
        $flag=1;
    }
 }
}
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
                                    <h4 class="card-title">Add Customers</h4>
                                    <?php 
                                     if (isset($error_name)) {
                                        echo "<div class='error badge badge-danger' role='alert'>";
                                        echo "* ".$error_name;
                                        echo "</div>";
                                    }
                                    ?>
                                    <div class="form-group row"> 
                                        <div class="col-sm-9">
                                            <input type="text" name="customer_name" class="form-control" id="fname" placeholder="Full Name">
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
                                            <input type="email" name="customer_email" class="form-control" id="lname" placeholder="Email">
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
                                            <input type="password" name="customer_pass"  class="form-control" id="lname" placeholder="Password">
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
                                            <input type="text" name="customer_mobile" class="form-control" id="lname" placeholder="Mobile Number">
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
                                            <input type="text" name="customer_address" class="form-control" id="lname" placeholder="Address">
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
                                        <input type="file" class="form-control" name="cust_image">
                                        </div>
                                    </div>


                                </div>

                                <button type="submit" name="save" class="btn btn-outline-secondary btn-lg">Save</button>

    </form>
<hr>
                                <div class="card-body">
                                <h5 class="card-title m-b-0">Customers</h5>
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
                                echo "<div class='alert alert-danger' role='alert' style='text-align:center;'> No Customers Yet !!!</div>";  
                                }else{
                                  foreach($data1 as $k => $v)
                                  {
                                    echo "<tr>";
                                    echo "<th scope='row'>{$v['cust_name']}</th>";
                                    echo "<td>{$v['cust_email']}</td>";
                                    echo "<td>{$v['cust_mobile']}</td>";
                                    echo "<td>{$v['cust_address']}</td>";
                                    echo "<td><img src='images/{$v['cust_image']}' width='100px' height='100px'></td>";
                                    echo "<td>";
                                    echo "<a href='delete-customer.php?id={$v['cust_id']}'><i style='color:red;margin-top:5px;font-size:20px' ;aria-hidden='true' class='fa fa-trash'></i></a>";
                                    echo "<a href='edit-customer.php?id={$v['cust_id']}'> <i style='color:green;margin-top:5px;font-size:25px;' class='m-r-10 mdi mdi-pencil-box-outline'></i></a>";
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