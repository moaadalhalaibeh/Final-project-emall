<?php
ob_start();
include("headers.php");
$x=new customer();

if(isset($_SESSION['user'])){
    foreach($_SESSION['user'] as $user=>$NewCheck){
      $id=$user;
      $check=$NewCheck;
    }
    $data=$x->readById($id);

  }


if(isset($_POST['save'])){

    $x->cust_mobile       = $_POST['mobile'];
    $x->cust_password     = $_POST['pass'];
    $x->cust_Newpass      = $_POST['new_pass'];
    $conf_pass              = $_POST['conf_pass'];
    $x->cust_image        = $_FILES['cust-image']['name'];
	$tmp                    = $_FILES['cust-image']['tmp_name'];
	$path                   = "../admin/images/";
	move_uploaded_file($tmp, $path . $x->cust_image);
    
    if($x->cust_password === $data[0]['cust_password']){
    if($x->cust_Newpass === $conf_pass){
        $x->updateProfilePass($id);

    }else{
        
        $no_conf="New Password Doesn't Match , Please Try Again ..";
    }
    }else {
       $not_pass="Not Your Password , Please Try Again .. ";
    }
    

    if(!empty($x->cust_image)){
        $x->updateProfilePic($id);
    }
    if(!empty($x->cust_mobile)){
        $x->updateProfileNumber($id);
        
    }
    
}


?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideToggle("slow");
  });
});
</script>

    <style>
      
    .profile
    {
        text-align:center;
        color:white;
        background-image:linear-gradient(45deg,white  15%,gray 85%,white);
        width:80%;
        height:auto;
        border-radius:50px 0px 50px 0px;
        margin:40px auto;
        padding-bottom:20px;


    }
        #prof{
            height:350px;
            width:350px;
            border-radius:50%;
            margin:50px 30%;
            box-shadow:-1px 2px 30px black;
        }
        input{
            margin:15px auto;
            text-align:center;
            
        }
        .inputs{
            margin:15px auto;
            height:40px;
            width:30%;
            text-align:center;
            border:0px solid black !important; 
            box-shadow:-2px 16px 30px black;

            color:black;
            background-color:white;
        }
        #shrink{
            margin:30px auto;
            height:40px;
            width:25%;
            text-align:center;
            border:2px solid black !important; 
            border-radius:5px;
            color:white;
            background-color:black;
            transition:.5s;
        }
        #shrink:hover{
            margin:30px auto;
            height:40px;
            width:10%;
            text-align:center;
            border:2px solid black !important; 
            border-radius:5px;
            color:white;
            background-color:black;
            transition:1s;

        }
         #flip {
        text-align: center;
        background-color:black;
        color:white;
        padding:10px;
        width:20%;
        margin:30px auto;
        font-weight:bold;
        display:block;
        cursor:pointer;
        transition:.7s;
        border-radius:5px;
        }
        #flip:hover {
        text-align: center;
        background-color:white;
        color:black;
        padding:10px;
        border-radius:15px 0px 15px 0px;
        width:20%;
        margin:30px auto;
        font-weight:bold;
        display:block;
        cursor:pointer;
        transition:1s;
        box-shadow:-1px 2px 30px black;


        }


#panel {
text-align: center;
padding: 10px;
  display: none;
  margin-bottom:40px;
}
h1{
    margin-left:42%;
    margin-top:50px !important;

}
h2{
    padding:10px !important;
    width:80% !important;
    margin-left:16% !important;
}


@media only screen and (max-width: 600px) {
   #login
{
    font-size:25px !important;
}

#prof{
    width:150px;
    height:150px;
}
#flip,#shrink{
    width:150px;

}
#flip:hover,#shrink:hover{
    width:150px;

}
.inputs{
    width:300px;

}
}
    </style>



<section id="aa-slider">
    <div class="aa-slider-area">
          
                <img id=""data-seq src="img/profile.jpg" width="100%" height="700px" alt="Men slide img" />
              <div class="seq-title">
                <p style="letter-spacing:30px;">PROFILE</p>                
              </div>
         
        </div>
</section>



<div class="container">

<div class="row">

<div class="col-md-12">
<h1>My Profile</h1>

<div class="aa-myaccount-login">
                  
<?php
if(isset($_SESSION['user'])){

?>
<div class="profile">
    <?php
    if(!empty($no_conf)){
        echo $no_conf;
    }
    if(!empty($not_pass)){
        echo $not_pass;
    }
    ?>
        <img id="prof"  src="../admin/images/<?php {echo $data[0]['cust_image'];}?>" alt="" >
        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" disabled value="<?php echo $data[0]['cust_name'];  ?>" class="inputs" style="background-color:gray;color:white;"><br>
            <input type="email" disabled value="<?php echo $data[0]['cust_email'];  ?>" class="inputs" style="background-color:gray;color:white;"><br>
            <input type="text" class="inputs" name="mobile" value="<?php echo $data[0]['cust_mobile']; ?>" ><br>
            <input type="file" name="cust-image" id="img" style="display:none;"/>
            <label for="img" style="background-color:black;color:white;padding:10px;border-radius:5px;cursor:pointer;margin-top:10px;">Upload New Image</label>    

            <div id="flip">Change Password</div>
            <?php
if (isset($err)){
    echo "$err";
}

?>
            <div id="panel">
            <input type="password" class="inputs" name="pass" placeholder="Your Password"><br>
            <input type="password" class="inputs" name="new_pass" placeholder="New Password"><br>
            <input type="password" class="inputs" name="conf_pass" placeholder="Confirm Password">
            </div>   
            <button type="submit" id="shrink" name="save" > Save </button>
            </form>
    </div>
<?php
}else{
echo "<div id='login' style='text-align:center;font-size:30px;color:red;border:1px dotted black;box-shadow:0px 10px 20px black;padding:20px;margin:150px 0px;'>Please <a href='login.php'> Log In Or Sign UP</a> First</div>";
}?>



            </div>
        </div>
                    </div>
</div>




    <?php
include("footer.php");
?>
