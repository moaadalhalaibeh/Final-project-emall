<?php
ob_start();
include("headers.php");
$x=new products();
$id=$_GET['id'];
$data=$x->readById($id);
$y=new category();

$catData=$y->readById($data[0]['cat_id']);


if(isset($_POST['save'])){
  $_SESSION['cart'][$data[0]['pro_id']]=$_POST['quant'];
  header("location:product-page.php?id=$id");
}

?>

<!-- / Promo section -->
  <!-- Products section -->

<style>
  h2{
    padding:10px !important;
    width:80% !important;
    margin-left:16% !important;
}
#aa-promo
{
    margin:70px 0px 300px 0px;
}
.Newrow{
    border:1px solid black;
    padding:20px;
    box-shadow:10px 10px 20px black;
}
#qua
{
    width:50px;
    text-align:center;
    margin-left:5px;
    margin-top:25px;
}

</style>



  <section id="aa-promo">
    <div class="container" >
    <div class="row Newrow">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row Newrow" style="padding:150px 0px;">
                <!-- Modal view slider -->
                <div class="col-md-6 col-sm-5 col-xs-12"  >                              
                  <div class="aa-product-view-slider ">                                
                    <div id="demo-1" class="simpleLens-gallery-container">
                      <div class="simpleLens-container" style="float:right">
                        <div class="simpleLens-big-image-container"><a data-lens-image="../admin/images/products/<?php echo $data[0]['pro_image']?>" class="simpleLens-lens-image">
                        <img  src="../admin/images/products/<?php echo $data[0]['pro_image']?>" class="simpleLens-big-image" width="350px" height="350px"></a></div>
                      </div>
                      <div class="simpleLens-thumbnails-container">
                         
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal view content -->
                <div class="col-md-6 col-sm-7 col-xs-12 " >
                  <div class="aa-product-view-content"  >
                    <h3><?php echo $data[0]['pro_name']?></h3>
                    <div class="aa-price-block">
                      <span class="aa-product-view-price" style="margin-top:45px;">Price: <?php echo $data[0]['pro_price']."$"?></span>
                    </div>
                    <p style="margin-top:25px;"><?php echo $data[0]['pro_desc']?></p>
                   
                                
                    </div>
                    <div class="aa-prod-quantity">
                      
                      <p class="aa-prod-category" style="font-weight:bold;margin-top:25px;">

                      <span >Category :</span> <a href="product.php?id=<?php echo $data[0]['cat_id']?>"><?php echo $catData[0]['cat_name'] ?></a>
                      </p>
                    </div>
                    <div class="aa-prod-view-bottom">
                        <?php
                         if($check == 1){
                            
                        ?>
                        <form action="" method="post">
                        <span style="font-weight:bold;margin-top:25px;">Quantity :</span><input  name="quant" id="qua" type="number" value="1" ><br>
                        <button type="submit" name="save" style="margin-top:25px;" class="aa-add-to-cart-btn" >Add To Cart</a>
                      <?php
                         }
                        ?>
                        </form>
                        
                     
                        
                    </div>
                  </div>
                </div>
              </div>
            </div>
    </div>
  </section>
</div>
</div>
</div>
</div>
</div>




<?php
include("footer.php");
?>