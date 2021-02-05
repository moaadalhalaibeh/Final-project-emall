<?php
include("classes.php");
$id=$_GET['id'];
$x=new admin();
$x->delete($id);
header("location:manage-admin.php");
?>