<?php 
session_start();
include'../db.php';
$id=$_GET['id'];
$single_user="SELECT * FROM users WHERE id=$id";
$single_user_result=mysqli_query($bd_connect,$single_user);
$after_assoc=mysqli_fetch_assoc($single_user_result);
if($after_assoc['status']==0){
    $update_status="UPDATE users SET status=1 WHERE id=$id";
    $update_status_result=mysqli_query($bd_connect,$update_status);
    $_SESSION['soft_delete_user']=' Soft Delete succesful';
     header('location:user_view.php');
}
else {
    $update_status22="UPDATE users SET status=0 WHERE id=$id";
    $update_status_result22=mysqli_query($bd_connect,$update_status22);
     header('location:user_view.php');
}

?>