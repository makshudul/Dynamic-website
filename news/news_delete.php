<?php
session_start();
include '../db.php';
$id=$_GET['id'];
$select_img="SELECT * FROM news WHERE id=$id";
$select_result=mysqli_query($bd_connect,$select_img);
$after_assoc=mysqli_fetch_assoc($select_result);
$delete_from="../uploads/news/".$after_assoc['image'];
unlink($delete_from);

$delete_user="DELETE FROM news WHERE id='$id'";
$delete_result=mysqli_query($bd_connect,$delete_user);
$_SESSION['delete_news_user']=' Delete succesful';
header('location:view_news.php');

?>