<?php
ob_start();
include("headers.php");
$id=$_GET['id'];
$vendor_Id=1;

$x=new products();
$ProData=$x->readById($id);
$y=new category();
$CatData=$y->readAll();


if(isset($_POST['add'])){
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
        $path             = "../admin/images/products/";
        move_uploaded_file($tmp, $path . $x->pro_image);
    
    $x->cat_id   =$_POST['pro_cat'];
    $x->ven_id   =$vendor_Id;
     if (empty($error_name)&&empty($error_desc) &&empty($error_price)) {
        $x->update($id);
        header("location:vendor-manage-product.php");
    }
}
    
?>
<style>
.aa-myaccount-login{
margin:40px 0px 80px 5%;

}
.add{
    
    width:150px;
    height:40px;
    padding:50px;
    margin-left:40%;
    margin-top:20px;
    color:white;
    font-size:20px !important;
    background-color:black;
    border:none;
    box-shadow:0px 10px 20px black;
    transition: 0.3s;
}
.add:hover{
    background-color:gray;
    color:black;
   
}
h1{
    margin-left:40%;
    margin-top:50px !important;

}
.remove{
    font-size:25px;
}
.edit{
    font-size:25px;
    color:green;
}

h2{
    padding:10px !important;
    width:80% !important;
    margin-left:16% !important;
}
</style>


<section id="aa-slider">
    <div class="aa-slider-area">
          
                <img id=""data-seq src="img/edit.jpg" width="100%" height="900px" alt="Men slide img" />
              <div class="seq-title">
                <h2 style="letter-spacing:30px;">EDITING</h2>                
              </div>
         
        </div>
</section>


<div class="container">

<div class="row">

<div class="col-md-12">
<h1>Edit Product</h1>

<div class="aa-myaccount-login">
                    <form action="" method="post" enctype="multipart/form-data" class="aa-login-form">


                    <?php 
                    if (isset($error_name)) {
                    echo "<div class='error badge badge-danger' role='alert'>";
                    echo "* ".$error_name;
                    echo "</div>";
                    }
                    ?>
                    <input type="text" name="pro_name" value=<?php
                    echo $ProData[0]['pro_name'];
                    ?>
                    >



                    <?php 
                    if (isset($error_desc)) {
                    echo "<div class='error badge badge-danger' role='alert'>";
                    echo "* ".$error_desc;
                    echo "</div>";
                    }
                    ?>
                    <input type="text" name="pro_desc" value='<?php
                    echo $ProData[0]['pro_desc'];
                    ?>'
                    >



                    <?php 
                    if (isset($error_price)) {
                    echo "<div class='error badge badge-danger' role='alert'>";
                    echo "* ".$error_price;
                    echo "</div>";
                    }
                    ?>
                    <input type="text" name="pro_price" value=<?php
                    echo $ProData[0]['pro_price'];
                    ?>
                    >




                    <?php 
                    if (isset($error_image)) {
                    echo "<div class='error badge badge-danger' role='alert'>";
                    echo "* ".$error_image;
                    echo "</div>";
                    }
                    ?>
                    <input type="file" name="pro_image" ><br>





                    <span>Category: </span><select name="pro_cat" id="">
                        <?php
                        foreach($CatData as $k=>$v){
                        if($v['cat_id']==$ProData[0]['cat_id']){
                        echo "<option value='{$v['cat_id']}' selected>{$v['cat_name']}</option>";
                        }else{
                        echo "<option value='{$v['cat_id']}'>{$v['cat_name']}</option>";
                        }
                    }
                        ?>
                    </select><br>
                        <button type="submit" name="add" class="add">Done</button>
                    </form>
            </div>
        </div>
                    </div>
</div>

<?php
include("footer.php");
?>