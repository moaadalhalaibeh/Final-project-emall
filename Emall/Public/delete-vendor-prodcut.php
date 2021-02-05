<?php
include("classes.php");
$id=$_GET['id'];
$x=new products();
$x->delete($id);
header('location:vendor-manage-product.php');
?>