<?php 

session_start();
if (!isset($_SESSION['User_login'])) {
    header('location:../login_page.php');
}
include '../db.php';
$id=$_POST['id'];
$logo=$_POST['logo'];
$title=$_POST['title'];
$description=mysqli_real_escape_string($bd_connect,$_POST['description']);

if (empty($logo)) {
    $_SESSION['empty_edit_service_logo']='Please Enter Title';
    header('location:view_service.php');
}
else if (empty($description)){
   $_SESSION['empty_edit_service_description']=' Please Enter Description';
   header('location:view_service.php');
   
}
else if (empty($title)){
   $_SESSION['empty_edit_service_title']=' Please Enter Title';
   header('location:view_service.php');
   
}

else {
          $update="UPDATE services SET logo='$logo',title='$title',description='$description' WHERE id=$id";
           $insert_result= mysqli_query($bd_connect,$update);          
           $_SESSION['edit_service_success']=' Update Success!';
           header('location:view_service.php');
}
?>