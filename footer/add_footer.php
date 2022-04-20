<?php 
session_start();
include '../db.php';
$phone=$_POST['phone'];
$email=$_POST['email'];
$copyright=mysqli_real_escape_string($bd_connect,$_POST['copyright']);
if (empty($phone)) {
     $_SESSION['empty_footer_name']='Please Enter phone';
     header('location:add_footer_page.php');
}
else if (empty($copyright)){
    $_SESSION['empty_footer_copyright']=' Please Enter copyright';
    header('location:add_footer_page.php');
    
}
else if(empty($email)){
    $_SESSION['email_footer_empty']='Email is Required';
    header('location:add_footer_page.php');
}
else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $_SESSION['email_footer_wrong']='Please Enter  Valid Email';
    header('location:add_footer_page.php');
}
else {

            $insert="INSERT INTO footers(phone,email,copyright)VALUES('$phone','$email','$copyright')";
            $insert_result= mysqli_query($bd_connect,$insert);          
            $_SESSION['add_footer_success']=' Add Success!';
            header('location:view_footer.php');
}



?>