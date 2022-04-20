<?php
session_start();
include '../db.php';
$id=$_GET['id'];
$delete_user="DELETE FROM abouts WHERE id='$id'";
$delete_result=mysqli_query($bd_connect,$delete_user);
$_SESSION['delete_abouts_user']=' Delete succesful';
header('location:view_about.php');

?>