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
#cart-view{
    margin-bottom:100px;
}
.cart-view-area{
    margin:50px 0px 150px 0px;
   
}

.new-cart-view-table{
    
    overflow: scroll !important;
    height:400px !important;
}
</style>


<section id="aa-slider">
    <div class="aa-slider-area">
          
                <img id=""data-seq src="img/order.jpg" width="100%" height="900px" alt="Men slide img" />
              <div class="seq-title">
                <p style="letter-spacing:30px;">Orders </p>                
              </div>
         
        </div>
</section>

<section id="cart-view">
   <div class="container">
   
   <h1>My Orders</h1>
   <hr>

     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table new-cart-view-table"style="margin-bottom:70px;box-shadow:10px 10px 25px black,-3px -3px 25px black;">
             <form action="">
               <div class="table-responsive" >
                  <table class="table" >
                    <thead>
                      <tr>
                        <th>Customer</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Done</th>
                      </tr>
                    </thead>
                    <tbody>

                        <?php
                        $order_det=new order_details();
                        $order_data=$order_det->readByVenId($vendor_Id);
                        $cust_info=new customer();
                        if(empty($order_data)){
                            echo "<h3 style='margin-left:40%;font-weight:bold;color:red;'>No Orders Yet !</h3>";
                        }else{
                        foreach ($order_data as $key => $value) {
                        $prodcutData=$x->readById($value['pro_id']);
                        $info=$cust_info->readById($value['cust_id']);
                        foreach ($info as $custKey => $custValue) {
                        ?>
                      <tr>
                        <td><?php echo $custValue['cust_name']; ?></td>
                        <td><?php echo $custValue['cust_mobile']; ?></td>
                        <td><?php echo $custValue['cust_address']; ?></td>
                        <td><?php echo $prodcutData[0]['pro_name']; ?></td>
                        <td><?php echo $value['qty']; ?></td>
                        <td><?php echo $prodcutData[0]['pro_price'] ." $"; ?></td>
                        <td><a class="edit" href="done-vendor-prodcut.php?id='<?php echo $value['order_det_id']; ?>'"><fa class="fa fa-check"></fa></a></td>
                      </tr>
                    
                      <?php
                        }
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
   </div>
 </section>

<?php
include("footer.php");
?>