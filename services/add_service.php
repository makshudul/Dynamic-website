<?php 
session_start();
include '../db.php';
$logo=$_POST['logo'];
$title=$_POST['title'];
$description=mysqli_real_escape_string($bd_connect,$_POST['description']);
if (empty($logo)) {
     $_SESSION['empty_service_logo']='Please Enter Title';
     header('location:add_service_page.php');
}
else if (empty($description)){
    $_SESSION['empty_service_description']=' Please Enter Description';
    header('location:add_service_page.php');
    
}
else if (empty($title)){
    $_SESSION['empty_service_title']=' Please Enter Title';
    header('location:add_service_page.php');
    
}
else {

            $insert="INSERT INTO services(logo,title,description)VALUES('$logo','$title','$description')";
            $insert_result= mysqli_query($bd_connect,$insert);          
            $_SESSION['add_service_success']=' Add Success!';
            header('location:view_service.php');
}



?>