<?php
session_start();
$pro_id=$_GET['pro_id'];
$id=$_GET['id'];
unset($_SESSION['cart'][$pro_id]);
header("location:product-page.php?id=$pro_id");
?>