<?php 
session_start();
include '../db.php';
$name=$_POST['name'];
$icon=$_POST['icon'];
$link=mysqli_real_escape_string($bd_connect,$_POST['link']);
if (empty($name)) {
     $_SESSION['empty_social_name']='Please Enter name';
     header('location:add_social_page.php');
}
else if (empty($icon)){
    $_SESSION['empty_social_icon']=' Please Enter icon';
    header('location:add_social_page.php');
    
}
else if (empty($link)){
    $_SESSION['empty_social_link']=' Please Enter link';
    header('location:add_social_page.php');
    
}
else {

            $insert="INSERT INTO social(name,icon,link)VALUES('$name','$icon','$link')";
            $insert_result= mysqli_query($bd_connect,$insert);          
            $_SESSION['add_social_success']=' Add Success!';
            header('location:view_social.php');
}



?>