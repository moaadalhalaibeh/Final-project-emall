<?php
session_start();
$pro_id=$_GET['id'];
unset($_SESSION['cart'][$pro_id]);
header("location:cart.php");
?>