<?php 
session_start();
include '../db.php';
$name=$_POST['name'];
$email=$_POST['email'];
$message=mysqli_real_escape_string($bd_connect,$_POST['message']);
if (empty($name)) {
    $_SESSION['message_name_empty']='Name is required';
    header('location:../index.php');
}
else if(empty($email)){
   $_SESSION['message_email_empty']='Email is Required';
   header('location:index.php');
}
else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
   $_SESSION['message_email_wrong']='Please Enter  Valid Email';
   header('location:index.php');
}
else if(empty($message)){
   $_SESSION['message_box_empty']='Message is Required';
   header('location:index.php');
}
else{
    $insert="INSERT INTO messages(name,email,message)VALUES('$name','$email','$message')";
    $insert_result= mysqli_query($bd_connect,$insert);          
    $_SESSION['message_success']=' Message Success!';
    header('location:../index.php');
}


 




?>