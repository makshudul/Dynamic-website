<?php
session_start();
include '../db.php';
$id=$_GET['id'];
$delete_skill="DELETE FROM footers WHERE id='$id'";
$delete_result=mysqli_query($bd_connect,$delete_skill);
$_SESSION['delete_footer_user']=' Delete succesful';
header('location:view_footer.php');

?>