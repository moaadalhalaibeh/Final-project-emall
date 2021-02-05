<?php
session_start();
if(!$_SESSION['admin_id']){
header("location:login-admin.php");
}
ob_start();

include("classes.php");
include("headers.php");
$x=new category();
$data=$x->readAll();
$id=$_GET['id'];
$NewData=$x->readById($id);
if(isset($_POST['save'])){
if(empty($_POST['cat_name'])){
    $error_name="Category can't be empty !";
}else{
    $x->cat_name     =$_POST['cat_name'];
}
if(empty($_POST['cat_desc'])){
    $error_desc="Descreption  can't be empty !";
}else{
    $x->cat_desc   =$_POST['cat_desc'];
}

    $x->cat_image     =$_FILES['cat_image']['name'];
	$tmp              =$_FILES['cat_image']['tmp_name'];
	$path             = "images/category/";
    move_uploaded_file($tmp, $path . $x->cat_image);

 
 if (empty($error_name)&&empty($error_email) ) {
    $x->update($id);
    header("location:manage-category.php");


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
                                    <h4 class="card-title">Update Categories</h4>
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
                                            <input type="text" name="cat_name" class="form-control" id="fname" value=<?php
                                            foreach($NewData as $k => $v){
                                                echo $v['cat_name'];
                                            }
                                            ?>>
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
                                            <input type="text" name="cat_desc" class="form-control" id="lname" value='<?php
                                            foreach($NewData as $k => $v){
                                                echo $v['cat_desc'];
                                            }
                                            ?>'>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-9">
                                            <input type="file" name="cat_image" class="form-control" id="lname" >
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