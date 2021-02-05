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


$conn = mysqli_connect("localhost","root","","emall");
        $query="SELECT order_id FROM orders ORDER BY order_id desc ";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result);
        foreach ($row as $key => $value) {
          $Last=$value;
        }
$Firstdata=$d->readByOrderId($Last);    
	
?>

<style>
    .checkout-right{
        
        margin:150px 60%;
        text-align:center;
    }
    body{
        text-align:center;
    }
    .thanks{
        margin-left:10%;
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
                    
              
                <h1 class="thanks">Thank You !</h1>
                <h3 class="thanks">Your Process Completed .</h3>
<hr>

              <div class="col-xs-6">
                <div class="checkout-right">
                  <h1 style="margin:50px 0px;">Order Summary</h1>
                  <div class="aa-order-summary-area">
                    <table class="table table-responsive">
                      <thead>
                      <tr>
                      <td colspan=2><strong>Your Order Id : <span style="color:red;"><?php echo $Last;?></span></strong></td>
                      </tr>
                        <tr>
                          <th>Product</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                          $x=new products();
                          $total=0;
                         
                              foreach($Firstdata as $k => $v){
                                  $data=$x->readById($v['pro_id']);
                          ?>
                        <tr>

                          <td><?php echo $data[0]['pro_name'];?> <strong> x <?php echo $v['qty'] ;?></strong></td>
                          <td><?php echo $data[0]['pro_price']. " $";?></td>
                        </tr>
                       <?php
                    $total +=  $data[0]['pro_price']  * $v['qty'];
                    }
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
                    <a href="home.php" type="submit" name="order"  class="aa-browse-btn">Home</a>                
                  </div>
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