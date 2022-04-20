<?php
session_start();
include '../db.php';
$id=$_SESSION['id'];
$password=password_hash($_POST['password'],PASSWORD_DEFAULT);
 $update_profile_users="UPDATE users SET password='$password' WHERE id='$id'";
 $update_result=mysqli_query($bd_connect,$update_profile_users);
 $_SESSION['update_succesful']='Update Successful';
 header('location:edit_profile_page.php');


?>