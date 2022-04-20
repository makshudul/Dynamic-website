<?php
session_start();
include 'db.php';
$name=$_POST['name'];
$email=$_POST['email'];
$password=password_hash($_POST['password'],PASSWORD_DEFAULT);
                    //  this code is already register code 
 $select_user=" SELECT COUNT(*) as email_exit FROM singup WHERE email='$email'";
 $select_user_result=mysqli_query($bd_connect,$select_user);
 $after_count=mysqli_fetch_assoc($select_user_result);

 if (empty($name)) {
     $_SESSION['name_singup_empty']='Name is required';
     header('location:singup_page.php');
 }
 else if(empty($email)){
    $_SESSION['email_singup_empty']='Email is Required';
    header('location:singup_page.php');
}
else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $_SESSION['email_singup_wrong']='Please Enter  Valid Email';
    header('location:singup_page.php');
}
else if(empty($_POST['password'])){
    $_SESSION['password_singup_empty']='Password is Required';
    header('location:singup_page.php');
}
else if ($after_count['email_exit']==1) {
    $_SESSION['email_singup_already_register']=' Email Already Register';
    header('location:singup_page.php');
}
else {

            $insert="INSERT INTO singup(name,email,password)VALUES('$name','$email','$password')";
            $insert_result=mysqli_query($bd_connect,$insert);          
            $_SESSION['singup_success']=' Sing Up Success!';
            header('location:login_page.php');
    
   

}


?>