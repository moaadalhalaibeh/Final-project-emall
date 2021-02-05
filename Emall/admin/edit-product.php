<?php
session_start();
if(!$_SESSION['admin_id']){
header("location:login-admin.php");
}
ob_start();

include("classes.php");
include("headers.php");
$x=new products();
$data=$x->readAll();
$y=new category();
$id=$_GET['id'];
$CatData=$y->readAll();
$NewData=$x->readById($id);
if(isset($_POST['save'])){
if(empty($_POST['pro_name'])){
    $error_name="Enter Product !";
}else{
    $x->pro_name     =$_POST['pro_name'];
}
if(empty($_POST['pro_desc'])){
    $error_desc="Enter Descreption !";
}else{
    $x->pro_desc   =$_POST['pro_desc'];
}
if(empty($_POST['pro_price'])){
    $error_price="Enter Price !";
}else{
    $x->pro_price   =$_POST['pro_price'];
}
    $x->pro_image     =$_FILES['pro_image']['name'];
	$tmp              =$_FILES['pro_image']['tmp_name'];
	$path             = "images/products/";
    move_uploaded_file($tmp, $path . $x->pro_image);
$x->cat_id   =$_POST['pro_cat'];

 if (empty($error_name)&&empty($error_email) &&empty($error_image) &&empty($error_price)) {
    $x->update($id);
    header("location:manage-products.php");

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

p{
    font-size:15px;
    font-weight:bold;
    margin-left:16%;
}
button{
    margin-left:50% !important;
}
select{
    width:100px;
    height:30px;
    margin-left:10px;
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
                                    <h4 class="card-title">Update Product</h4>
                                    <?php 
                                     if (isset($error_name)) {
                                        echo "<div class='error badge badge-danger' role='alert'>";
                                        echo "* ".$error_name;
                                        echo "</div>";
                                    }
                                    ?>
                                    <div class="form-group row"> 
                                        <div class="col-sm-9">
                                            <input type="text" name="pro_name" class="form-control" id="fname" value=<?php
                                            foreach($NewData as $k => $v){
                                                echo $v['pro_name'];
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
                                            <input type="text" name="pro_desc" class="form-control" id="lname" value='<?php
                                            foreach($NewData as $k => $v){
                                                echo $v['pro_desc'];
                                            }
                                            ?>'>
                                        </div>
                                    </div>

                                    <?php 
                                     if (isset($error_price)) {
                                        echo "<div class='error badge badge-danger' role='alert'>";
                                        echo "* ".$error_price;
                                        echo "</div>";
                                    }
                                    ?>
                                    <div class="form-group row">
                                        <div class="col-sm-9">
                                            <input type="text" name="pro_price" class="form-control" id="lname"value=<?php
                                            foreach($NewData as $k => $v){
                                                echo $v['pro_price'];
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
                                            <input type="file" name="pro_image" class="form-control" id="lname" >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <p>
                                            Category: 
                                        </p>
                                       <select name="pro_cat" id="" style="">
                                           <?php
                                             foreach($CatData as $k => $v){
                                                 if($v['cat_id'] == $NewData[0]['cat_id']){
                                                 echo "<option value='{$v['cat_id']}' selected>{$v['cat_name']}</option>";
                                             }else{
                                                echo "<option value='{$v['cat_id']}'>{$v['cat_name']}</option>";

                                             }
                                            }
                                           ?>
                                         

                                       </select>
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