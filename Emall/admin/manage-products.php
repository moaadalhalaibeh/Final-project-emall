<?php
session_start();
if(!$_SESSION['admin_id']){
header("location:login-admin.php");
}
include("classes.php");
include("headers.php");
$x=new products();
$data=$x->readAll();
$y=new category();

$CatData=$y->readAll();
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
if(empty($_FILES['pro_image']['name'])){
    $error_image="Choose Image !";
}else{
    $x->pro_image     =$_FILES['pro_image']['name'];
	$tmp              =$_FILES['pro_image']['tmp_name'];
	$path             = "images/products/";
    move_uploaded_file($tmp, $path . $x->pro_image);
}
$x->cat_id   =$_POST['pro_cat'];

 if (empty($error_name)&&empty($error_desc) &&empty($error_image) &&empty($error_price)) {
    $x->create();

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
                                    <h4 class="card-title">Add Products</h4>
                                    <?php 
                                     if (isset($error_name)) {
                                        echo "<div class='error badge badge-danger' role='alert'>";
                                        echo "* ".$error_name;
                                        echo "</div>";
                                    }
                                    ?>
                                    <div class="form-group row"> 
                                        <div class="col-sm-9">
                                            <input type="text" name="pro_name" class="form-control" id="fname" placeholder="Products">
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
                                            <input type="text" name="pro_desc" class="form-control" id="lname" placeholder="Product Description">
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
                                            <input type="text" name="pro_price" class="form-control" id="lname" placeholder="Price">
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
                                                 echo "<option value='{$v['cat_id']}'>{$v['cat_name']}</option>";
                                             }
                                           ?>
                                         

                                       </select>
                                    </div>


                                </div>

                                <button type="submit" name="save" class="btn btn-outline-secondary btn-lg">Save</button>

</form>
<hr>

                                <div class="card-body">
                                <h5 class="card-title m-b-0">Products</h5>
                            </div>
                            <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Products</th>
                                      <th scope="col">Description</th>
                                      <th scope="col">Price</th>
                                      <th scope="col">Category</th>
                                      <th scope="col">Image</th>
                                      <th scope="col">Vendor</th>
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
                                    echo "<th scope='row'>{$v['pro_id']}</th>";
                                    echo "<td>{$v['pro_name']}</td>";
                                    echo "<td>{$v['pro_desc']}</td>";
                                    echo "<td>{$v['pro_price']} $</td>";
                                    $cat=$y->readById($v['cat_id']);
                                    echo "<td>{$cat[0]['cat_name']}</td>";
                                    $z=new vendor();
                                    $VenData=$z->readById($v['ven_id']);
                                    echo "<td><img src='images/products/{$v['pro_image']}' width=80px height=80px></td>";
                                    echo "<td>".$VenData[0]['vendor_name']."</td>";
                                    echo "<td>";
                                    echo "<a href='delete-product.php?id={$v['pro_id']}'><i style='color:red;margin-top:5px;font-size:20px' ;aria-hidden='true' class='fa fa-trash'></i></a>";
                                    echo "<a href='edit-product.php?id={$v['pro_id']}'> <i style='color:green;margin-top:5px;font-size:25px;' class='m-r-10 mdi mdi-pencil-box-outline'></i></a>";
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