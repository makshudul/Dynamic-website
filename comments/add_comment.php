<?php 
session_start();
include '../db.php';
$name=$_POST['name'];
$position=$_POST['position'];
$description=mysqli_real_escape_string($bd_connect,$_POST['description']);
if (empty($name)) {
     $_SESSION['empty_comment_name']='Please Enter Name';
     header('location:add_comment_page.php');
}
else if (empty($description)){
    $_SESSION['empty_comment_description']=' Please Enter Description';
    header('location:add_comment_page.php');
    
}
else if (empty($position)){
    $_SESSION['empty_comment_position']=' Please Enter Position';
    header('location:add_comment_page.php');
    
}
else {

            $insert="INSERT INTO comments(name,position,description)VALUES('$name','$position','$description')";
            $insert_result= mysqli_query($bd_connect,$insert);          
            $_SESSION['add_comment_success']=' Add Success!';
            header('location:view_comment.php');
}



?>