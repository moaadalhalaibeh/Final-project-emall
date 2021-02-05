<?php
ob_start();
include("headers.php");
$x=new products();
$id=$_GET['id'];
$data=$x->readByCatId($id);


?>

<!-- / Promo section -->
  <!-- Products section -->

<style>
  h2{
    padding:10px !important;
    width:80% !important;
    margin-left:16% !important;
}
ul{
  width:100% !important;
}
.aa-product-catg li{
margin:0px 0px 30px 20px !important;
width:25%  !important;
  }
</style>
  <section id="aa-slider">
    <div class="aa-slider-area">
          
                <img id=""data-seq src="img/prodcut.jpg" width="100%" height="900px" alt="Men slide img" />
              <div class="seq-title">
                <p  style="letter-spacing:30px;">PRODUCTS</p>                
              </div>
         
        </div>
</section>


  <section id="aa-promo">
    <div class="container" style="text-align:center">
      <h1 style="font-weight:bold;letter-spacing:10px;text-shadow:0px 6px 5px black, 0px -1px 5px red;">Products</h1>
      <div class="row col-md-12">
          <div class="aa-promo-area">
            <div class="row">    
  <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                <!-- start prduct navigation -->
                
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <!-- Start men product category -->
                    <div class="tab-pane fade in active" id="men">
                      <ul class="aa-product-catg">
                        <!-- start single product item -->
                        <?php
                        if(!empty($data)){
                        foreach($data as $k=>$v){
                        ?>
                        <li style="border:1px solid black;box-shadow:10px 10px 20px black;padding-bottom:50px;">
                          <figure>
                            <a class="aa-product-img" href="#"><img src="../admin/images/products/<?php echo $v['pro_image']?>" width=250px height=300px></a>
                            <?php
                            
                            if($check == 1){
                            
                            ?>
                            <form action="" method="post">
                            
                            <a class="aa-add-card-btn" href="product-page.php?id=<?php echo $v['pro_id']?>"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                            </form>
                            <?php
                            };
                            
                            ?>  
                            
                            <figcaption>
                              <h4 class="aa-product-title"><a href="product-page.php?id='<?php echo $v['pro_id']?>'"><?php echo $v['pro_name'] ?></a></h4>
                              <span class="aa-product-price"><?php echo $v['pro_price']." $"; ?></span><span class="aa-product-price"></span><br>
                              <?php
                              $y=new vendor();
                              $venData=$y->readById($v['ven_id']);
                              ?>
                            </figcaption>
                          </figure>                        
                          <div class="aa-product-hvr-content">
                          <span style="background-color:white;font-size:20px;font-weight:bold;padding:7px;border-radius:10px;">Vendor :<a href="vendor-product.php?id=<?php echo $venData[0]['vendor_id'];  ?>"  style="color:red;"><?php echo $venData[0]['vendor_name'];  ?></a> </span>
                        
                          </div>
                          <!-- product badge -->
                        </li>
                        <?php

                        }}
                        ?>              
                      </ul>
                    </div>
                    <!-- / electronic product category -->
                  </div>
                  <!-- quick view modal -->                  
                  <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">                      
                        <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <div class="row">
                            <!-- Modal view slider -->
                            <div class="col-md-6 col-sm-6 col-xs-12">                              
                              <div class="aa-product-view-slider">                                
                                <div class="simpleLens-gallery-container" id="demo-1">
                                  <div class="simpleLens-container">
                                      <div class="simpleLens-big-image-container">
                                          <a class="simpleLens-lens-image" data-lens-image="img/view-slider/large/polo-shirt-1.png">
                                              <img src="img/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image">
                                          </a>
                                      </div>
                                  </div>
                                  <div class="simpleLens-thumbnails-container">
                                      <a href="#" class="simpleLens-thumbnail-wrapper"
                                         data-lens-image="img/view-slider/large/polo-shirt-1.png"
                                         data-big-image="img/view-slider/medium/polo-shirt-1.png">
                                          <img src="img/view-slider/thumbnail/polo-shirt-1.png">
                                      </a>                                    
                                      <a href="#" class="simpleLens-thumbnail-wrapper"
                                         data-lens-image="img/view-slider/large/polo-shirt-3.png"
                                         data-big-image="img/view-slider/medium/polo-shirt-3.png">
                                          <img src="img/view-slider/thumbnail/polo-shirt-3.png">
                                      </a>

                                      <a href="#" class="simpleLens-thumbnail-wrapper"
                                         data-lens-image="img/view-slider/large/polo-shirt-4.png"
                                         data-big-image="img/view-slider/medium/polo-shirt-4.png">
                                          <img src="img/view-slider/thumbnail/polo-shirt-4.png">
                                      </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- Modal view content -->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="aa-product-view-content">
                                <h3>T-Shirt</h3>
                                <div class="aa-price-block">
                                  <span class="aa-product-view-price">$34.99</span>
                                  <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
                                <h4>Size</h4>
                                <div class="aa-prod-view-size">
                                  <a href="#">S</a>
                                  <a href="#">M</a>
                                  <a href="#">L</a>
                                  <a href="#">XL</a>
                                </div>
                                <div class="aa-prod-quantity">
                                  <form action="">
                                    <select name="" id="">
                                      <option value="0" selected="1">1</option>
                                      <option value="1">2</option>
                                      <option value="2">3</option>
                                      <option value="3">4</option>
                                      <option value="4">5</option>
                                      <option value="5">6</option>
                                    </select>
                                  </form>
                                  <p class="aa-prod-category">
                                    Category: <a href="#">Polo T-Shirt</a>
                                  </p>
                                </div>
                                <div class="aa-prod-view-bottom">
                                  <a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                                  <a href="#" class="aa-add-to-cart-btn">View Details</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>                        
                      </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                  </div><!-- / quick view modal -->              
              </div>
            </div>
          </div>
        </div>
      </div>
      <a class="aa-browse-btn" href="home.php" style="background-color:black;"><span class="fa fa-long-arrow-left"> Back</span></a>

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