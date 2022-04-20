<?php 
session_start();
include '../db.php';
$title=$_POST['title'];
$years=$_POST['years'];
$destription=mysqli_real_escape_string($bd_connect,$_POST['destription']);

if (empty($title)) {
     $_SESSION['empty_about_title']='Please Enter Title';
     header('location:add_about_page.php');
}
else if (empty($destription)){
    $_SESSION['empty_about_description']=' Please Enter Description';
    header('location:add_about_page.php');
    
}
else if (empty($years)){
    $_SESSION['empty_about_years']=' Please Enter Years';
    header('location:add_about_page.php');
}
else {

            $insert="INSERT INTO abouts(title,description,years)VALUES('$title','$destription','$years')";
            $insert_result= mysqli_query($bd_connect,$insert);          
            $_SESSION['add_about_success']=' Add Success!';
            header('location:view_about.php');
}



?>