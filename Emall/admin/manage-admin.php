<?php
session_start();
if(!$_SESSION['admin_id']){
header("location:login-admin.php");
}
include("classes.php");
include("headers.php");
$x=new admin();
$data=$x->readAll();

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

 $flag=0;
 if(!empty($data)){
 foreach($data as $k => $v){
    if($v['admin_email'] == $x->admin_email){
        $flag=1;
    }
 }
}
 if($flag === 1){
    $error_email_exist="The Email Is Already Exist";
 }else{
 if (empty($error_name)&&empty($error_email) &&empty($error_image) && empty($error_password)) {
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

    <form action="" method="post">
                                    <h4 class="card-title">Add Admin</h4>
                                    <?php 
                                     if (isset($error_name)) {
                                        echo "<div class='error badge badge-danger' role='alert'>";
                                        echo "* ".$error_name;
                                        echo "</div>";
                                    }
                                    
                                    ?>
                                    <div class="form-group row">
                                        <div class="col-sm-9">
                                            <input type="text" name="admin_name" class="form-control" id="fname" placeholder="Full Name">
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
                                            <input type="email" name="admin_email" class="form-control" id="lname" placeholder="Email">
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
                                            <input type="password" name="admin_pass" class="form-control" id="lname" placeholder="Password Here">
                                        </div>
                                    </div>
                                    
                                </div>

                                <button type="submit" name="save" class="btn btn-outline-secondary btn-lg">Save</button>

 </form>
<hr>
                                <div class="card-body">
                                <h5 class="card-title m-b-0">Admins</h5>
                            </div>
                            <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Full Name</th>
                                      <th scope="col">Email</th>
                                      <th scope="col">Edit</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                <?php
                                $data1=$x->readAll();
                                if(empty($data1)){
                                    echo "<div class='alert alert-danger' role='alert' style='text-align:center !important;'> No Admins  Yet !!!</div>";  
                                }else{
                                  foreach($data1 as $k => $v)
                                  {
                                    echo "<tr>";
                                    echo "<th scope='row'>{$v['admin_id']}</th>";
                                    echo "<td>{$v['admin_fullname']}</td>";
                                    echo "<td>{$v['admin_email']}</td>";
                                    echo "<td>";
                                    echo "<a href='delete-admin.php?id={$v['admin_id']}'><i style='color:red;margin-top:5px;font-size:20px' ;aria-hidden='true' class='fa fa-trash'></i></a>";
                                    echo "<a href='edit-admin.php?id={$v['admin_id']}'> <i style='color:green;margin-top:5px;font-size:25px;' class='m-r-10 mdi mdi-pencil-box-outline'></i></a>";
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