<?php
include("classes.php");
$id=$_GET['id'];
$x=new customer();
$x->delete($id);
header('location:manage-customer.php');
?>