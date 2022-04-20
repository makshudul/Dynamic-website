<?php 

session_start();
if (!isset($_SESSION['User_login'])) {
    header('location:../login_page.php');
}
include '../db.php';
$id=$_POST['id'];
$years=$_POST['years'];
$company_name=$_POST['company_name'];
$position=$_POST['position'];
$deparment=$_POST['deparment'];
$description=mysqli_real_escape_string($bd_connect,$_POST['description']);
if (empty($years)) {
     $_SESSION['empty_edit_experience_year']='Please Enter Years';
     header('location:edit_experience_page.php');
}
else if (empty($company_name)){
    $_SESSION['empty_edit_experience_company_name']=' Please Enter Company Name';
    header('location:edit_experience_page.php');
    
}
else if (empty($position)){
    $_SESSION['empty_edit_experience_position']=' Please Enter Your Position';
    header('location:edit_experience_page.php');  
}
else if (empty($deparment)){
    $_SESSION['empty_edit_experience_deparment']=' Please Enter Deparment';
    header('location:edit_experience_page.php');  
}
else if (empty($description)){
    $_SESSION['empty_edit_experience_description']=' Please Enter Description';
    header('location:edit_experience_page.php');  
}

else {
          $update="UPDATE experiences SET years='$years',company_name='$company_name',position='$position',deparment='$deparment',description='$description' WHERE id=$id";
           $insert_result= mysqli_query($bd_connect,$update);          
           $_SESSION['edit_experience_success']=' Update Success!';
           header('location:view_experience.php');
}
?>