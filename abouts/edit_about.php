<?php 

session_start();
if (!isset($_SESSION['User_login'])) {
    header('location:../login_page.php');
}
 
include '../db.php';
$id=$_POST['id'];
$title=$_POST['title'];
$years=$_POST['years'];
$destription=mysqli_real_escape_string($bd_connect,$_POST['destription']);

if (empty($title)) {
    $_SESSION['empty_edit_about_title']='Please Enter Title';
    header('location:view_about.php');
}
else if (empty($destription)){
   $_SESSION['empty_edit_about_description']=' Please Enter Description';
   header('location:view_about.php');
   
}
else if (empty($years)){
   $_SESSION['empty_edit_about_years']=' Please Enter Years';
   header('location:view_about.php');
}
else {
    $update="UPDATE abouts SET title='$title',description='$destription',years='$years' WHERE id=$id";
           $insert_result= mysqli_query($bd_connect,$update);          
           $_SESSION['edit_about_success']=' Update Success!';
           header('location:view_about.php');
}
?>