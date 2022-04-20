<?php 
session_start();
include '../db.php';
$id=$_GET['id'];
$single_user="SELECT * FROM footers WHERE id=$id";
$single_user_result=mysqli_query($bd_connect,$single_user);
$after_assoc=mysqli_fetch_assoc($single_user_result);
if($after_assoc['status']==1){
    $update_status="UPDATE footers SET status=0 WHERE id=$id";
    $update_status_result=mysqli_query($bd_connect,$update_status);
    $_SESSION['footer_deactive']=' Deactive succesful';
     header('location:view_footer.php');
}
else {
    $update_status22="UPDATE footers SET status=0 ";
    $update_status_result22=mysqli_query($bd_connect,$update_status22);
       
     $update_status22="UPDATE footers SET status=1 WHERE id=$id";
     $update_status_result22=mysqli_query($bd_connect,$update_status22);
      header('location:view_footer.php');
      $_SESSION['footer_active']=' Active succesful';
}

?>