<!-- footer -->  

<style></style>
<footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
     <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-top-area">
            <div class="row">
              
              <div class="col-md-6 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Jordan E-Mall </h3>
                    <ul class="aa-footer-nav">
                      <li style="color:gray;">It is a website specialized in electronic commerce, where it is based on connecting the seller with the buyer in an easy and smooth way</li>
                      
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <h3>Main Menu</h3>
                  <ul class="aa-footer-nav">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Our Services</a></li>
                    <li><a href="#">Our Products</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                </div>
              </div>
              

              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Contact Us</h3>
                    <address>
                      <p> Jordan al-zarqa</p>
                      <p><span class="fa fa-phone"></span>+692789906924</p>
                      <p><span class="fa fa-envelope"></span>moaad.alhalaibeh@gmail.com</p>
                    </address>
                    <div class="aa-footer-social">
                      <a href="#"><span class="fa fa-facebook"></span></a>
                      <a href="#"><span class="fa fa-twitter"></span></a>
                      <a href="#"><span class="fa fa-google-plus"></span></a>
                      <a href="#"><span class="fa fa-youtube"></span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
    <!-- footer-bottom -->
    
  </footer>
  <!-- / footer -->

  <!-- Login Modal -->  
  
    <?php
    $c=new customer();
    $v=new vendor();
    $CustomerData=$c->readAll();
    $VendorData=$v->readAll();
    $err="";
    if(isset($_POST['login'])){
      if($_POST['loginType']==1){
        foreach($CustomerData as $k => $v){
          if($_POST['email'] == $v['cust_email'] && $_POST['pass'] == $v['cust_password'] ){
          echo "welcome customer";
          $_SESSION['user'][$v['cust_id']]=1;
          }else{
            $err="Something wrong ,Please Try Again ...";
          }
        }
      }
      if($_POST['loginType']==2){
        foreach($VendorData as $k1 => $v1){
          if($_POST['email'] == $v1['vendor_email'] && $_POST['pass'] == $v1['vendor_password'] ){
          echo "welcome vendor";
          $_SESSION['user'][$v1['vendor_id']]=2;
          }else{
            $err2="Something wrong ,Please Try Again ...";
          }
        
      
    }
    }
  }
    ?>

  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">                      
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Login or Register</h4>
          <form class="aa-login-form" action="" method="post">
            <?php
            
            ?>
            <label for="">Username or Email address<span>*</span></label>
            <input type="text" name="email" placeholder="Username or email">
            <label for="">Password<span>*</span></label>
            <input type="password" name="pass" placeholder="Password">
            <span>Login As : </span><select name="loginType" id="" style="display:block;">
              <option value="1" selected>Customer</option>
              <option value="2">Vendor</option>
            </select>
            
            <button class="aa-browse-btn" type="submit" name="login" style="background-color:black;border:none;color:white;">Login</button><br><br>
            <div class="aa-register-now">
              Don't have an account?<a href="account.html" style="color:blue;">Register now!</a>
            </div>
          </form>
        </div>                        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>    

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.js"></script>  
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="js/jquery.smartmenus.js"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="js/jquery.smartmenus.bootstrap.js"></script>  
  <!-- To Slider JS -->
  <script src="js/sequence.js"></script>
  <script src="js/sequence-theme.modern-slide-in.js"></script>  
  <!-- Product view slider -->
  <script type="text/javascript" src="js/jquery.simpleGallery.js"></script>
  <script type="text/javascript" src="js/jquery.simpleLens.js"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="js/slick.js"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="js/nouislider.js"></script>
  <!-- Custom js -->
  <script src="js/custom.js"></script> 

  </body>
</html>