<?php 

session_start();
if (!isset($_SESSION['User_login'])) {
    header('location:../login_page.php');
}
 
include '../db.php';
$id=$_POST['id'];
$skill_name=$_POST['skill_name'];
$percentage=$_POST['percentage'];


if (empty($skill_name)) {
    $_SESSION['empty_edit_about_title']='Please Enter Title';
    header('location:edit_skill_page.php');
}
else if (empty($percentage)){
   $_SESSION['empty_edit_skill_percentage']=' Please Enter Description';
   header('location:edit_skill_page.php');
   
}

else {
    $update="UPDATE skills SET skill_name='$skill_name',percentage='$percentage' WHERE id=$id";
           $insert_result= mysqli_query($bd_connect,$update);          
           $_SESSION['edit_skill_success']=' Update Success!';
           header('location:view_skill.php');
}
?>