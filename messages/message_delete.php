<?php
session_start();
include '../db.php';
$id=$_GET['id'];
$delete_message="DELETE FROM messages WHERE id='$id'";
$delete_result=mysqli_query($bd_connect,$delete_message);
$_SESSION['delete_message']=' Delete succesful';
header('location:view_message.php');

?>