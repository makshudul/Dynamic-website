<?php
session_start();
include '../db.php';
$id=$_GET['id'];
$select_img="SELECT * FROM banner WHERE id=$id";
$select_result=mysqli_query($bd_connect,$select_img);
$after_assoc=mysqli_fetch_assoc($select_result);
$delete_from="../uploads/banners/".$after_assoc['background_image'];
unlink($delete_from);

$delete_user="DELETE FROM banner WHERE id='$id'";
$delete_result=mysqli_query($bd_connect,$delete_user);
$_SESSION['delete_banner_user']=' Delete succesful';
header('location:user_view.php');

?>