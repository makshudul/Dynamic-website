<?php
session_start();
include '../db.php';
$id=$_GET['id'];
$delete_message="DELETE FROM subscribes WHERE id='$id'";
$delete_result=mysqli_query($bd_connect,$delete_message);
$_SESSION['delete_subscribes_message']=' Delete succesful';
header('location:view_subscribe.php');

?>