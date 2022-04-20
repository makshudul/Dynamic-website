<?php 
session_start();
include '../db.php';
$email=$_POST['email'];
$message=mysqli_real_escape_string($bd_connect,$_POST['message']);

 if(empty($email)){
   $_SESSION['subscribe_email_empty']='Email is Required';
   header('location:../index.php');
}
else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
   $_SESSION['subscribe_email_wrong']='Please Enter  Valid Email';
   header('location:../index.php');
}

else{
    $insert="INSERT INTO subscribes (email)VALUES('$email')";
    $insert_result= mysqli_query($bd_connect,$insert);          
    $_SESSION['subscribes_message_success']=' Subscribes  Successful !';
    header('location:../index.php');
}


 




?>