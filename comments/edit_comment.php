<?php 

session_start();
if (!isset($_SESSION['User_login'])) {
    header('location:../login_page.php');
}
include '../db.php';
$id=$_POST['id'];
$name=$_POST['name'];
$position=$_POST['position'];
$description=mysqli_real_escape_string($bd_connect,$_POST['description']);

if (empty($name)) {
    $_SESSION['empty_edit_comment_name']='Please Enter Name';
    header('location:view_comment.php');
}
else if (empty($description)){
   $_SESSION['empty_edit_comment_description']=' Please Enter Description';
   header('location:view_comment.php');
   
}
else if (empty($position)){
   $_SESSION['empty_edit_comment_position']=' Please Enter Position';
   header('location:view_comment.php');
   
}

else {
          $update="UPDATE comments SET name='$name',position='$position',description='$description' WHERE id=$id";
           $insert_result= mysqli_query($bd_connect,$update);          
           $_SESSION['edit_comment_success']=' Update Success!';
           header('location:view_comment.php');
}
?>