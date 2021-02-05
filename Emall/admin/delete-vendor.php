<?php
include("classes.php");
$id=$_GET['id'];
$x=new vendor();
$x->delete($id);
header('location:manage-vendor.php');
?>