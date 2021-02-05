<?php
include("headers.php");

$x=new category();
$data=$x->readAll();
?>
<section id="aa-slider">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
        <div class="seq-screen">
          <ul class="seq-canvas">
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="img/mens1.jpg" alt="Men slide img" />
              </div>
              <div class="seq-title">
               <span class="small-span"data-seq style="margin-left:15%;">Save Up to 75% Off</span>                
                <p data-seq>Men Collection</p>                
              </div>
            </li>
     
            <!-- single slide item -->  
             <li>
              <div class="seq-model">
                <img data-seq src="img/collection.jpg" alt="Male Female slide img" />
              </div>
              <div class="seq-title">
                <span data-seq  class="small-span" style="margin-left:15%;">Save Up to 50% Off</span>                
                <p data-seq>Best Collection</p>                
              </div>
            </li>                   
          </ul>
        </div>
</section>
              <!-- promo right -->
              <section id="aa-promo">
    <div class="container" style="text-align:center">
      <h1 style="font-weight:bold;letter-spacing:10px;text-shadow:0px 6px 5px black, 0px -1px 5px red;">Categories</h1>
      <div class="row">
          <div class="aa-promo-area">
            <div class="row">
                 <?php
                 foreach($data as $k=>$v){
                  echo "<div class='aa-single-promo-right'>";
                  echo "<div class='aa-promo-banner'>" ;                  
                  echo "<img src='../admin/images/category/{$v['cat_image']}' alt='img'>";                    
                  echo "<div class='aa-prom-content'>";
                  echo "<h4 class='category' style='color:black;'><a  href='Product.php?id={$v['cat_id']}'>{$v['cat_name']}</a></h4>";   
                  echo "<span>{$v['cat_desc']}</span>";                     
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";
                 }
                 ?>
              
              </div>
            </div>
          </div>
        </div>
    
    
  </section>
  
 
  
 

  <?php
  include("footer.php");
  ?>