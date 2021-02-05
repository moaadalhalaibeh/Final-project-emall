<?php
ob_start();
include("headers.php");
if(isset($_SESSION['user'])){
    foreach($_SESSION['user'] as $user=>$NewCheck){
      $id=$user;
      $check=$NewCheck;
    }
  }
$x=new vendor();
$data=$x->readById($id);




if(isset($_POST['save'])){

    $x->vendor_mobile       = $_POST['mobile'];
    $x->vendor_password     = $_POST['pass'];
    $x->vendor_Newpass      = $_POST['new_pass'];
    $conf_pass              = $_POST['conf_pass'];
    $x->vendor_image        = $_FILES['vendor-image']['name'];
	$tmp                    = $_FILES['vendor-image']['tmp_name'];
	$path                   = "../admin/images/";
	move_uploaded_file($tmp, $path . $x->vendor_image);
    
    if($x->vendor_password === $data[0]['vendor_password']){
    if($x->vendor_Newpass === $conf_pass){
        $x->updateProfilePass($id);

    }else{
        echo "<scritp>alert('no no no ')</scritp>";
    }
    }else {
        echo "<scritp>alert('heheheh ')</scritp>";
    }
    

    if(!empty($x->vendor_image)){
        $x->updateProfilePic($id);
    }
    if(!empty($x->vendor_mobile)){
        $x->updateProfileNumber($id);
        
    }
    echo "<span style='color;red' !important;>".$vendor_password."</span>";
    echo "<span style='color;red' !important;>".$vendor_Newpass."</span>";
    echo "<span style='color;red' !important;>".$conf_pass."</span>";
    echo "<span style='color;red' !important;>".$data[0]['vendor_password']."</span>";
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
        #sequence{
        }
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
                  

<div class="profile">
        <img id="prof"  src="../admin/images/<?php {echo $data[0]['vendor_image'];}?>" alt="" >
        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" disabled value="<?php echo $data[0]['vendor_name'];  ?>" class="inputs" style="background-color:gray;color:white;"><br>
            <input type="email" disabled value="<?php echo $data[0]['vendor_email'];  ?>" class="inputs" style="background-color:gray;color:white;"><br>
            <input type="text" class="inputs" name="mobile" value="<?php echo $data[0]['vendor_mobile']; ?>" ><br>
            <input type="file" name="vendor-image" id="img" style="display:none;"/>
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




            </div>
        </div>
                    </div>
</div>
    <?php
include("footer.php");
?>
