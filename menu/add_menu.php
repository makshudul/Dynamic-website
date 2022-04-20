<?php 
session_start();
include '../db.php';
$name=$_POST['name'];
$link=mysqli_real_escape_string($bd_connect,$_POST['link']);
if (empty($name)) {
     $_SESSION['empty_menu_name']='Please Enter name';
     header('location:add_menu_page.php');
}
else if (empty($link)){
    $_SESSION['empty_menu_link']=' Please Enter link';
    header('location:add_menu_page.php');
    
}
else {

            $insert="INSERT INTO menu(name,link)VALUES('$name','$link')";
            $insert_result= mysqli_query($bd_connect,$insert);          
            $_SESSION['add_menu_success']=' Add Success!';
            header('location:view_menu.php');
}



?>