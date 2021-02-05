<?php
ob_start();
include("classes.php");
$x=new order_details();

$id=$_GET['id'];
$x->delete($id);

header("location:order.php");
?>