<?php 
session_start();
include '../db.php';
$skill_name=$_POST['skill_name'];
$percentage=$_POST['percentage'];
if (empty($skill_name)) {
     $_SESSION['empty_skill_name']='Please Enter Title';
     header('location:add_skill_page.php');
}
else if (empty($percentage)){
    $_SESSION['empty_skill_percentage']=' Please Enter Description';
    header('location:add_skill_page.php');
    
}
else {

            $insert="INSERT INTO skills(skill_name,percentage)VALUES('$skill_name','$percentage')";
            $insert_result= mysqli_query($bd_connect,$insert);          
            $_SESSION['add_skill_success']=' Add Success!';
            header('location:view_skill.php');
}



?>