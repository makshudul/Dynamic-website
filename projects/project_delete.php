<?php
session_start();
include '../db.php';
$id=$_GET['id'];
$select_img="SELECT * FROM projects WHERE id=$id";
$select_result=mysqli_query($bd_connect,$select_img);
$after_assoc=mysqli_fetch_assoc($select_result);
$delete_from="../uploads/projects/".$after_assoc['image'];
unlink($delete_from);

$delete_user="DELETE FROM projects WHERE id='$id'";
$delete_result=mysqli_query($bd_connect,$delete_user);
$_SESSION['delete_project_message']=' Delete succesful';
header('location:view_projects.php');

?>