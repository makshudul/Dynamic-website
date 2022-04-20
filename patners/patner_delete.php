<?php
session_start();
include '../db.php';
$id=$_GET['id'];
$select_img="SELECT * FROM patner WHERE id=$id";
$select_result=mysqli_query($bd_connect,$select_img);
$after_assoc=mysqli_fetch_assoc($select_result);
$delete_from="../uploads/patners/".$after_assoc['image'];
unlink($delete_from);

$delete_user="DELETE FROM patner WHERE id='$id'";
$delete_result=mysqli_query($bd_connect,$delete_user);
header('location:patner_view.php');
$_SESSION['delete_patner_message']='Delete Successfull';


?>