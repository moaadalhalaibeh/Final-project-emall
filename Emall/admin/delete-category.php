<?php
include("classes.php");
$id=$_GET['id'];
$x=new category();
$x->delete($id);
header('location:manage-category.php');
?>