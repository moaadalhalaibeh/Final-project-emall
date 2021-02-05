<?php
session_start();
include("classes.php");
$check=1;
if(!empty($_SESSION['user'])){
  foreach($_SESSION['user'] as $user=>$NewCheck){
    $id=$user;
    $check=$NewCheck;
  }
} 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Home</title>
    
    <!-- Font awesome -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">   
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="css/jquery.simpleLens.css">    
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="css/nouislider.css">
    <!-- Theme color -->
    <link id="switcher" href="css/theme-color/default-theme.css" rel="stylesheet">
    <!-- <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="css/style.css" rel="stylesheet">    

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  
      <style>
        body{
          color:black !important;
        }
        #menu{
          background-color:black;
          
        }
        #menu li{
            letter-spacing:3px; 
            margin-right:10px;   
        }
        #nav-list{
          margin-left:20% !important;
        }
        #aa-header{
            background: linear-gradient(250deg, black,gray, black);
        }
        #sequence{
          height:900px !important;
        }
        .aa-promo-banner{
          width:32.5% !important;
          height:400px !important;
          float:left !important;
          margin:10px 0px 10px 10px !important;
          box-shadow:10px 10px 20px black,-3px -3px 20px black;
        }
        .aa-promo-area{
          width:100% !important;
        }
        .category{
          font-size:40px !important;
        }
        .seq-title p{
          font-size:50px !important;
          letter-spacing:20px !important; 
          margin-left:15% !important; 
          color:white !important; 
          background-color:rgb(0,0,0,0.8);

        }
       
        @media only screen and (max-width: 600px) {
          #nav-list{
          margin-left:0px !important;
        }
        .aa-promo-banner{
          width:45% !important;
          height:250px !important;
          float:left !important;
          margin:10px !important;
        }
        .seq-title p{
          font-size:30px !important;
          letter-spacing:10px !important; 
          margin-left:0px !important; 
        }
        .small-span{
          margin:0px !important;
        }
        }
        
      </style>
  </head>
  <body> 
   <!-- wpf loader Two -->
  
    <!-- / wpf loader Two -->       
  <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#" style="background-color:gray;"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->


  <!-- Start header section -->
  <header id="aa-header" >
    <!-- start header top  -->
   
              <!-- / header top left -->
    
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="index.html">
                  <span class="fa fa-shopping-cart" style="color:black;"></span>
                  <p style="color:white">Jordan <strong style="color:black">E-Mall</strong> <span>Your Shopping Partner</span></p>
                </a>
                <!-- img based logo -->
                <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
              </div>
              <!-- / logo  -->
               <!-- cart box -->
              <div class="aa-cartbox">
              <?php
                  if($check == 1){
                  
                  ?>

                <a class="aa-cart-link" href="#">
                  <span class="fa fa-shopping-basket" style="color:black;"></span>
                  <span class="aa-cart-title" style="font-weight:bold;color:white">SHOPPING CART</span>
                </a>
               


              
                <div class="aa-cartbox-summary">
                  <ul>
                  <?php
                $x=new products();
                if(isset($_SESSION['cart'])){    
                  foreach($_SESSION['cart'] as $k=>$v){
                    $data=$x->readById($k);
                ?>
                    <li>
                      <a class="aa-cartbox-img" href="#"><img src="../admin/images/products/<?php echo $data[0]['pro_image']; ?>" width=150px height=150px alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="product-page.php?id=<?php echo $data[0]['pro_id'];?>"><?php echo $data[0]['pro_name'];?></a></h4>
                        <p><?php echo $v." x ".$data[0]['pro_price']."$" ; ?></p>
                      </div>
                      <a href="remove.php?pro_id=<?php echo $data[0]['pro_id']; ?>&id=<?php echo $data[0]['cat_id'];?>" ><span class="fa fa-times">
                   
                      </span></a>
                    </li>
                    <?php
                      }}
                      if(empty($_SESSION['cart'])){
                        echo "No products Yet !";
                      }
                    ?>

            
                  </ul>
                  <a class="aa-cartbox-checkout aa-primary-btn" href="checkout.php">Checkout</a>
                </div>
              </div>
              <?php
                  };
                ?>
              <!-- / cart box -->
              <!-- search box -->
              
              <!-- / search box -->             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
  <!-- / header section -->
  <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse " >
            <!-- Left nav -->
            <ul class="nav navbar-nav" id="nav-list" >
            <?php
                  if($check == 2){
                    echo "<style>
                    #nav-list{
                      margin-left:22% !important;
                    }</style>";
                  };
                  ?>
                  <li><a href="home.php">Home</a></li>
                  <?php
                  if($check == 1){
                    echo "<li><a href='customer-profile.php'>My Profile</a></li>";
                  }else{
                    echo "<li><a href='vendor-profile.php'>My Profile</a></li>";
                  }
                  ?>
                  <?php
                  if($check == 2){
                    echo "<li ><a href='vendor-manage-product.php'>Manage Product</a></li>";
                    echo "<li ><a href='order.php'>Orders</a></li>";

                  }
                  ?>
                  
                  
                  <?php
                  if($check == 1){
                  
                  ?>
                  <li ><a href="cart.php">My Cart</a></li>
                  <li ><a href="checkout.php">Checkout</a></li>
                  <li><a href='history.php' >Orders History</a></li>

                  <?php
                  }
                  ?>
                  <?php
                  if(isset($_SESSION['user'])){
                    echo "<li><a href='logout.php'>Log Out</a></li>";
                  }else{
                    echo "<li><a href='login.php' >Login/SignUP</a></li>";
                  }
                  ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>
  <!-- / menu -->
  <!-- Start slider -->
  
        <!-- slider navigation btn -->
        <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
          <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
          <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
        </fieldset>
      </div>
    </div>
  </section>
  <!-- / slider -->
  <!-- Start Promo section -->
 
              <!-- promo left -->
              