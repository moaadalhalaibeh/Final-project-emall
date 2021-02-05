<?php
ob_start();
include("headers.php");
if(isset($_POST['update'])){
foreach($_SESSION['cart'] as $k1 => $v1){
    $new="update-id-".$k1;
    $_SESSION['cart'][$k1]=$_POST[$new];
}
}
$o=new orders();
$v=new vendor();
$p=new products();
$d=new order_details();
if(isset($_POST['order'])){
    if(empty($_SESSION['cart'])){
      $empty_cart= "<h1 style='color:red;'>your cart is empty !!</h1>";
    }else{
    if(isset($_SESSION['user'])){
        $proData=$p->readById($k);

        $o->cust_id=$id;
        $o->vendor_id=$proData[0]['ven_id'];
        $o->create();
        $conn = mysqli_connect("localhost","root","","emall");
        $query="SELECT order_id FROM orders ORDER BY order_id desc ";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result);
        foreach ($row as $key => $value) {
          $Last=$value;
        }
        print_r($Last);

        foreach ($_SESSION['cart'] as $key => $value) {
           $d->order_id=$Last;
           $d->pro_id=$key;
	         $d->qty=$value;
           $totals= $value * $proData[0]['pro_price'];
           $d->total=$totals;
           $d->ven_id=$proData[0]['ven_id'];
           $d->cust_id=$id;
           $d->order_date=date("Y-m-d");
           $d->create();
           echo $d->order_date;
           unset($_SESSION['cart']);
           header("location:final-checkout.php");
        }
    }else{
      header("location:login.php");
    }
  }

}		
?>

<style>
    .checkout-right{
        
        margin:150px 60%;
        text-align:center;
    }
</style>
 <!-- Cart view section -->
 <section id="checkout">
 <div class="row">

   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="checkout-area">
          <form action="" method="post">
            <div class="row">
                    <!-- Coupon section -->
                     
                    <!-- Login section -->
                    
              
               
              <div class="col-xs-6">
                <div class="checkout-right">
                  <h1>Checkout</h1>
                  <div class="aa-order-summary-area">
                    <table class="table table-responsive">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                          $x=new products();
                          $total=0;
                          if(empty($_SESSION['cart'])){
                              echo "<h1 style='color:red;'>No Products Yet !</h1>";
                          }else{
                              foreach($_SESSION['cart'] as $k => $v){
                                  $data=$x->readById($k);
                          ?>
                        <tr>
                          <td><?php echo $data[0]['pro_name'];?> <strong> x <?php echo $v ;?></strong></td>
                          <td><?php echo $data[0]['pro_price']. " $";?></td>
                        </tr>
                       <?php
                    $total +=  $data[0]['pro_price']  * $v;
                    }}
                       ?>
                      </tbody>
                      <tfoot>                         
                         <tr>
                          <th>Total</th>
                          <td><?php echo $total ." $";?></td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <div class="aa-payment-method">                    
                    <button href="#" type="submit" name="order"  class="aa-browse-btn">Place Order</a> 
                      
                  </div>
                  <?php
                    if(!empty($empty_cart)){
                      echo $empty_cart;
                    }
                    ?>             
                </div>
              </div>
            </div>
          </form>
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