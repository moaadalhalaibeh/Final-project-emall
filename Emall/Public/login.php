<?php
ob_start();
include("headers.php");
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
          header("location:home.php");
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
          header("location:home.php");
          }else{
            $err="Something wrong ,Please Try Again ...";
          }
        
      
    }
    }
  }


if(isset($_POST['register'])){
if($_POST['registerType']==1){
if(empty($_POST['username'])){
    $error_name="Enter Customer Name !";
}else{
    $c->cust_name     =$_POST['username'];
}


if(empty($_POST['email'])){
    $error_email="Enter Customer email !";
}else{
    $c->cust_email    =$_POST['email'];
}


if(empty($_POST['pass'])){
    $error_password="Enter Customer Password !";
}else{
    $c->cust_password =$_POST['pass'];
}


if(empty($_POST['mobile'])){
    $error_mobile="Enter Customer Mobile Number !";
}else{
    $c->cust_mobile   =$_POST['mobile'];
}


if(empty($_POST['address'])){
    $error_address="Enter Customer Address !";
}else{
    $c->cust_address  =$_POST['address'];
}


if(empty($_FILES['image']['name'])){
    $error_image="Enter Customer image !";
}else{
    $c->cust_image    =$_FILES['image']['name'];
	$tmp              =$_FILES['image']['tmp_name'];
	$path             = "../admin/images/";
    move_uploaded_file($tmp, $path . $c->cust_image);
}
$data=$c->readAll();
 $flag=0;
 foreach($CustomerData as $k => $v){
    if($v['cust_email'] == $c->cust_email){
        $flag=1;
    }
 }

 if($flag === 1){
    $error_email_exist="The Email Is Already Exist";
 }else{
 if (empty($error_name)&&empty($error_email) &&empty($error_image) && empty($error_password) && empty($error_mobile) && empty($error_address)) {
    $c->create();
}
}
}





if($_POST['registerType']==2){
    if(empty($_POST['username'])){
        $error_name="Enter Vendor Name !";
    }else{
        $v->vendor_name     =$_POST['username'];
    }
    
    
    if(empty($_POST['email'])){
        $error_email="Enter Vendor email !";
    }else{
        $v->vendor_email    =$_POST['email'];
    }
    
    
    if(empty($_POST['pass'])){
        $error_password="Enter Vendor Password !";
    }else{
        $v->vendor_password =$_POST['pass'];
    }
    
    
    if(empty($_POST['mobile'])){
        $error_mobile="Enter Vendor Mobile Number !";
    }else{
        $v->vendor_mobile   =$_POST['mobile'];
    }
    
    
    if(empty($_POST['address'])){
        $error_address="Enter Vendor Address !";
    }else{
        $v->vendor_address  =$_POST['address'];
    }
    
    
    if(empty($_FILES['image']['name'])){
        $error_image="Enter Vendor image !";
    }else{
        $v->vendor_image    =$_FILES['image']['name'];
        $tmp              =$_FILES['image']['tmp_name'];
        $path             = "../admin/images/";
        move_uploaded_file($tmp, $path . $v->vendor_image);
    }
     $flag=0;
     foreach($VendorData as $k1 => $v1){
        if($v1['vendor_email'] == $v->vendor_email){
            $flag=1;
        }
     }
    
     if($flag === 1){
        $error_email_exist="The Email Is Already Exist";
     }else{
     if (empty($error_name)&&empty($error_email) &&empty($error_image) && empty($error_password) && empty($error_mobile) && empty($error_address)) {
        $v->create();
    }
    }
    }
}
?>
<section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
              <div class="col-md-6">
                <div class="aa-myaccount-login">

                <h4>Login</h4>

                 <form action="" class="aa-login-form" method="post">
                     <?php
                     if (isset($err)){
                        echo "<h3 style='color:red;'>$err</h3>";
                        echo "<br>";

                    }
                     ?>
                  <label for="">Username or Email address<span>*</span></label>
                   <input type="text" name="email" placeholder="Username or email">
                   <label for="">Password<span>*</span></label>
                    <input type="password" name="pass"  placeholder="Password">
                    <span>Login As : </span><select name="loginType" id="" style="display:block;">
                    <option value="1" selected>Customer</option>
                    <option value="2">Vendor</option>
                    </select>   
                    <button type="submit" name="login" class="aa-browse-btn" style="background-color:black;color:white;border:none;">Login</button><br><br><br><br>
               
                </form>
                </div>
              </div>


              <div class="col-md-6">
                <div class="aa-myaccount-register">                 
                 <h4>Register</h4>
                 <form action="" class="aa-login-form" method="post" enctype="multipart/form-data">
                 <?php 
                                     if (isset($error_name)) {
                                        echo "<div class='error badge badge-danger' role='alert'>";
                                        echo "* ".$error_name;
                                        echo "</div>";
                                        echo "<br>";

                                    }
                                    ?>
                    <label for="">Username <span>*</span></label>
                    <input type="text" name="username" placeholder="Username"><br>


                    <?php 
                                     if (isset($error_email)) {
                                        echo "<div class='error badge badge-danger' role='alert'>";
                                        echo "* ".$error_email;
                                        echo "</div>";
                                        echo "<br>";

                                    }
                                    if (isset($error_email_exist)) {
                                        echo "<div class='error badge badge-danger' role='alert'>";
                                        echo "* ".$error_email_exist;
                                        echo "</div>";
                                        echo "<br>";

                                    }
                                    ?>
                    <label for="">Email address<span>*</span></label>
                    <input type="text" name="email" placeholder="Email address"><br>


                    <?php 
                                     if (isset($error_password)) {
                                        echo "<div class='error badge badge-danger' role='alert'>";
                                        echo "* ".$error_password;
                                        echo "</div>";
                                        echo "<br>";

                                    }
                                    ?>
                    <label for="">Password<span>*</span></label>
                    <input type="password" name="pass" placeholder="Password"><br>



                    <?php 
                                     if (isset($error_mobile)) {
                                        echo "<div class='error badge badge-danger' role='alert'>";
                                        echo "* ".$error_mobile;
                                        echo "</div>";
                                        echo "<br>";

                                    }
                                    ?>
                    <label for="">Mobile Number<span>*</span></label>
                    <input type="text"  name="mobile" placeholder="Mobile Number"><br>



                    <?php 
                                     if (isset($error_address)) {
                                        echo "<div class='error badge badge-danger' role='alert'>";
                                        echo "* ".$error_address;
                                        echo "</div>";
                                        echo "<br>";

                                    }
                                    
                                    ?>
                    <label for="">Address<span>*</span></label>
                    <input type="text" name="address" placeholder="Address"><br>


                    <?php 
                                     if (isset($error_image)) {
                                        echo "<div class='error badge badge-danger' role='alert'>";
                                        echo "* ".$error_image;
                                        echo "</div>";
                                        echo "<br>";

                                    }
                                    ?>
                    <label for="">Choose Image<span>*</span></label>
                    <input type="file" name="image"><br><br>
                    <span>Login As : </span><select name="registerType" id="" style="display:block;">
                    <option value="1" selected>Customer</option>
                    <option value="2">Vendor</option>
                    </select>   
                    <button type="submit" name="register" class="aa-browse-btn" style="background-color:black;color:white;border:none;">Register</button>                    
                  </form>
                </div>
              </div>
            </div>          
         </div>
       </div>
     </div>
   </div>
 </section>

<?php
include("footer.php");
?>