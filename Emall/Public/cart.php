<?php
ob_start();
include("headers.php");
if(isset($_POST['update'])){
foreach($_SESSION['cart'] as $k1 => $v1){
    $new="update-id-".$k1;
    $_SESSION['cart'][$k1]=$_POST[$new];
}
header('location:cart.php');
}
?>
<style>
    h1{
        margin-left:25%;
    }
    #cart-view{
        margin:150px 0px;
    }
    .cart-view-table{
        box-shadow:0px 14px 20px black;

    }
    #no-product{
      font-size:25px;
      margin-left:30%;
    }
    @media only screen and (max-width: 600px) {

      #no-product{
      font-size:15px;
      margin-left:30%;
    }
    }
</style>
<section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-11">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="" method="post">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Delete</th>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php
                    $x=new products();
                    $total=0;
                    
                    if(empty($_SESSION['cart'])){
                        echo "<p id='no-product' style='color:red;'>You Don't Have Any Products Yet !</[h1]>";
                    }else{
                        foreach($_SESSION['cart'] as $k=>$v){
                            $data = $x->readById($k);

                    ?>
                      <tr>
                        <td><a class="remove" href="cart-remove.php?id=<?php echo $data[0]['pro_id'];?>"><fa class="fa fa-close"></fa></a></td>
                        <td><a href="product-page.php?id=<?php echo $data[0]['pro_id'];?>"><img src="../admin/images/products/<?php echo $data[0]['pro_image'];?>" alt="img"></a></td>
                        <td><a class="aa-cart-title" href="product-page.php?id=<?php echo $data[0]['pro_id'];?>"><?php echo $data[0]['pro_name'];?></a></td>
                        <td><?php echo $data[0]['pro_price']. " $";?></td>
                        <td><input class="aa-cart-quantity" type="number" name="update-id-<?php echo $k;?>" value=<?php echo $v;?>></td>
                        <td><?php echo $data[0]['pro_price'] * $v . " $";?></td>
                        <?php $total+= $data[0]['pro_price'] * $v ;?>
                      </tr>
                      <?php
                    }}
                      ?>
                      <tr>
                        <td colspan="6" class="aa-cart-view-bottom">
                          
                          <button  class="aa-cart-view-btn" type="submit" name="update" style="background-color:black;">Update Cart</button>
                        </td>
                      </tr>
                      </tbody>
                  </table>
                </div>
             </form>
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Cart Totals</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Subtotal</th>
                     <td><?php echo $total. " $"; ?></td>
                   </tr>
                   <tr>
                     <th>Total</th>
                     <td><?php echo $total. " $"; ?></td>
                   </tr>
                 </tbody>
               </table>
               <a href="checkout.php" class="aa-cart-view-btn" style="background-color:black;">Proced to Checkout</a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->






<?php
include("footer.php");

?>