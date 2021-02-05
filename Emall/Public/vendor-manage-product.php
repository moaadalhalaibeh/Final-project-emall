<?php
ob_start();
include("headers.php");
$vendor_Id=$id;
$x=new products();
$y=new category();
$CatData=$y->readAll();
$ProData=$x->readByVendorId($vendor_Id);

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
    if(empty($_FILES['pro_image']['name'])){
        $error_image="Choose Image !";
    }else{
        $x->pro_image     =$_FILES['pro_image']['name'];
        $tmp              =$_FILES['pro_image']['tmp_name'];
        $path             = "../admin/images/products/";
        move_uploaded_file($tmp, $path . $x->pro_image);
    }
    $x->cat_id   =$_POST['pro_cat'];
    $x->ven_id   =$vendor_Id;
     if (empty($error_name)&&empty($error_desc) &&empty($error_image) &&empty($error_price)) {
        $x->create();
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
          
                <img id=""data-seq src="img/manage.jpg" width="100%" height="900px" alt="Men slide img" />
              <div class="seq-title">
                <p style="letter-spacing:30px;">Manage <br>Products</p>                
              </div>
         
        </div>
</section>




<div class="container">

<div class="row">

<div class="col-md-12">
<h1>Add Product</h1>

<div class="aa-myaccount-login">
                    <form action="" method="post" enctype="multipart/form-data" class="aa-login-form">


                    <?php 
                    if (isset($error_name)) {
                    echo "<div class='error badge badge-danger' role='alert'>";
                    echo "* ".$error_name;
                    echo "</div>";
                    }
                    ?>
                    <input type="text" name="pro_name" placeholder="Product Name">



                    <?php 
                    if (isset($error_desc)) {
                    echo "<div class='error badge badge-danger' role='alert'>";
                    echo "* ".$error_desc;
                    echo "</div>";
                    }
                    ?>
                    <input type="text" name="pro_desc" placeholder="Product Descreption">



                    <?php 
                    if (isset($error_price)) {
                    echo "<div class='error badge badge-danger' role='alert'>";
                    echo "* ".$error_price;
                    echo "</div>";
                    }
                    ?>
                    <input type="text" name="pro_price" placeholder="price">




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
                        echo "<option value='{$v['cat_id']}'>{$v['cat_name']}</option>";
                        }
                        ?>
                    </select><br>
                        <button type="submit" name="add" class="add">Add</button>
                    </form>
            </div>
        </div>
                    </div>
</div>




<section id="cart-view">
   <div class="container">
       <hr>
   <h1>Edit Product</h1>

   <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table"style="margin-bottom:70px;box-shadow:10px 10px 25px black,-3px -3px 25px black;">
             <form action="">
               <div class="table-responsive" >
                  <table class="table" >
                    <thead>
                      <tr>
                        <th>Delete</th>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Descreption</th>
                        <th>Edit</th>
                      </tr>
                    </thead>
                    <tbody>

                        <?php
                        if(empty($ProData)){
                            echo "<h3 style='margin-left:40%;font-weight:bold;color:red;'>No Products Yet !</h3>";
                        }else{
                        foreach($ProData as $k=>$v){
                        ?>
                      <tr>
                        <td><a class="remove" href="delete-vendor-prodcut.php?id='<?php echo $v['pro_id']; ?>'"><fa class="fa fa-close"></fa></a></td>
                        <td><img src="../admin/images/products/<?php echo $v['pro_image']; ?>" alt="img"></td>
                        <td><?php echo $v['pro_name']; ?></td>
                        <?php 
                        $catName=$y->readById($v['cat_id']);
                        echo "<td>".$catName[0]['cat_name']."</td>";
                        ?>
                        <td><?php echo $v['pro_price']." $"; ?></td>
                        <td><?php echo $v['pro_desc']; ?></td>
                        <td><a class="edit" href="edit-vendor-prodcut.php?id='<?php echo $v['pro_id']; ?>'"><fa class="fa fa-edit"></fa></a></td>
                      </tr>
                    
                      <?php
                        }
                    }
                      ?>

                      
                      
                      </tbody>
                  </table>
                </div>
             </form>




             
             <!-- Cart Total view -->
             
           </div>
         </div>
       </div>
     </div>



   


             
             <!-- Cart Total view -->
             
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>

<?php
include("footer.php");
?>