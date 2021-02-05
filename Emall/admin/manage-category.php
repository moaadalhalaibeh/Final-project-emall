<?php
session_start();
if(!$_SESSION['admin_id']){
header("location:login-admin.php");
}
include("classes.php");
include("headers.php");
$x=new category();
$data=$x->readAll();
if(isset($_POST['save'])){
if(empty($_POST['cat_name'])){
    $error_name="Enter Category !";
}else{
    $x->cat_name     =$_POST['cat_name'];
}
if(empty($_POST['cat_desc'])){
    $error_desc="Enter Descreption !";
}else{
    $x->cat_desc   =$_POST['cat_desc'];
}
if(empty($_FILES['cat_image']['name'])){
    $error_image="Choose Image !";
}else{
    $x->cat_image     =$_FILES['cat_image']['name'];
	$tmp              =$_FILES['cat_image']['tmp_name'];
	$path             = "images/category/";
    move_uploaded_file($tmp, $path . $x->cat_image);
}
 

$flag=0;
if(!empty($data)){
 foreach($data as $k => $v){
    if($v['cat_name'] == $x->cat_name){
        $flag=1;
    }
 }}

 if($flag === 1){
    $error_email_exist="The Category Is Already Exist";
 }else{
 if (empty($error_name)&&empty($error_email) &&empty($error_image)) {
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
                                    <h4 class="card-title">Add Categories</h4>
                                    <br>
                                    <?php 
                                     if (isset($error_name)) {
                                        echo "<div class='error badge badge-danger' role='alert'>";
                                        echo "* ".$error_name;
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
                                            <input type="text" name="cat_name" class="form-control" id="fname" placeholder="Category">
                                        </div>
                                    </div>
                                    <?php 
                                     if (isset($error_desc)) {
                                        echo "<div class='error badge badge-danger' role='alert'>";
                                        echo "* ".$error_desc;
                                        echo "</div>";
                                    } 
                                    ?>
                                    <div class="form-group row">
                                        <div class="col-sm-9">
                                            <input type="text" name="cat_desc" class="form-control" id="lname" placeholder="Description">
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
                                            <input type="file" name="cat_image" class="form-control" id="lname" >
                                        </div>
                                    </div>


                                </div>

                                <button type="submit" name="save" class="btn btn-outline-secondary btn-lg">Save</button>

 </form>
<hr>
                                <div class="card-body">
                                <h5 class="card-title m-b-0">Categories</h5>
                            </div>
                            <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Category</th>
                                      <th scope="col">Description</th>
                                      <th scope="col">Image</th>
                                      <th scope="col">Edit</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                                $data1=$x->readAll();
                                if(empty($data1)){
                                    echo "<div class='alert alert-danger' role='alert' style='text-align:center !important;'> No Categories  Yet !!!</div>";  
                                }else{
                                  foreach($data1 as $k => $v)
                                  {
                                    echo "<tr>";
                                    echo "<th scope='row'>{$v['cat_id']}</th>";
                                    echo "<td>{$v['cat_name']}</td>";
                                    echo "<td>{$v['cat_desc']}</td>";
                                    echo "<td><img src='images/category/{$v['cat_image']}' width=80px height=80px></td>";
                                    echo "<td>";
                                    echo "<a href='delete-category.php?id={$v['cat_id']}'><i style='color:red;margin-top:5px;font-size:20px' ;aria-hidden='true' class='fa fa-trash'></i></a>";
                                    echo "<a href='edit-category.php?id={$v['cat_id']}'> <i style='color:green;margin-top:5px;font-size:25px;' class='m-r-10 mdi mdi-pencil-box-outline'></i></a>";
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