<?php
session_start();
include '../db.php';
$id=$_GET['id'];
$select_img="SELECT * FROM logos WHERE id=$id";
$select_result=mysqli_query($bd_connect,$select_img);
$after_assoc=mysqli_fetch_assoc($select_result);
$delete_from="../uploads/logos/".$after_assoc['logo'];
unlink($delete_from);

$delete_user="DELETE FROM logos WHERE id='$id'";
$delete_result=mysqli_query($bd_connect,$delete_user);
header('location:logo_view.php');

?>