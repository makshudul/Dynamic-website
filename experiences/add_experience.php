<?php 
session_start();
include '../db.php';
$years=$_POST['years'];
$company_name=$_POST['company_name'];
$position=$_POST['position'];
$deparment=$_POST['deparment'];
$description=mysqli_real_escape_string($bd_connect,$_POST['description']);
if (empty($years)) {
     $_SESSION['empty_experience_year']='Please Enter Years';
     header('location:add_experience_page.php');
}
else if (empty($company_name)){
    $_SESSION['empty_experience_company_name']=' Please Enter Company Name';
    header('location:add_experience_page.php');
    
}
else if (empty($position)){
    $_SESSION['empty_experience_position']=' Please Enter Your Position';
    header('location:add_experience_page.php');  
}
else if (empty($deparment)){
    $_SESSION['empty_experience_deparment']=' Please Enter Deparment';
    header('location:add_experience_page.php');  
}
else if (empty($description)){
    $_SESSION['empty_experience_description']=' Please Enter Description';
    header('location:add_experience_page.php');  
}
else {

            $insert="INSERT INTO experiences(years,company_name,position,deparment,description)VALUES('$years','$company_name','$position','$deparment','$description')";
            $insert_result= mysqli_query($bd_connect,$insert);          
            $_SESSION['add_experience_success']=' Add Success!';
            header('location:view_experience.php');
}



?>