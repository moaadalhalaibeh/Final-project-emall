<?php
ob_start();
include("headers.php");
$x=new products();
    
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
</style>


<section id="aa-slider">
    <div class="aa-slider-area">
          
    <img id=""data-seq src="img/order.jpg" width="100%" height="900px" alt="Men slide img" />
              <div class="seq-title">
                <p style="letter-spacing:30px;">My Orders </p>                
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
           <div class="cart-view-table"style="margin-bottom:70px;box-shadow:10px 10px 25px black,-3px -3px 25px black;">
             <form action="">
               <div class="table-responsive" >
                  <table class="table" >
                    <thead>
                      <tr>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Date</th>
                      </tr>
                    </thead>
                    <tbody>

                        <?php
                        if(empty($_SESSION['user'])){
                            echo "<h3 style='margin-left:40%;font-weight:bold;color:red;'>Please Log In First ... !</h3>";
                        }else{
                        $order_det=new order_details();
                        $order_data=$order_det->readByCustId($id);
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
                        <td><?php echo "<img src='../admin/images/products/{$prodcutData[0]['pro_image']}' width=100px height=100px>"?></td>
                        <td><?php echo $prodcutData[0]['pro_name']; ?></td>
                        <td><?php echo $value['qty']; ?></td>
                        <td><?php echo $prodcutData[0]['pro_price'] ." $"; ?></td>
                        <td><?php echo $value['order_date']; ?></td>
                      </tr>
                    
                      <?php
                        }
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