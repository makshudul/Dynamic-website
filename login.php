<?php
session_start();
include 'db.php';
$email=$_POST['email'];
$password=$_POST['password'];
 $select_user=" SELECT COUNT(*) as email_exit,name, profile_img,role,id FROM users WHERE email='$email'";
 $select_user_result=mysqli_query($bd_connect,$select_user);
 $after_count=mysqli_fetch_assoc($select_user_result);
 if($after_count['email_exit']==1){
    $select_user2=" SELECT * FROM users WHERE email='$email'";
    $select_user_result2=mysqli_query($bd_connect,$select_user2);
    $after_count2=mysqli_fetch_assoc($select_user_result2);
    if(password_verify($password,$after_count2['password'])){
        $_SESSION['User_login']='login Successful';
        $_SESSION['name']=$after_count['name'];
        $_SESSION['role']=$after_count['role'];
        $_SESSION['id']=$after_count['id'];
        $_SESSION['profile_img']=$after_count['profile_img'];
        header('location:/panda/users/user_view.php');
    }
    else {
        $_SESSION['worngpassword']=' Wrong Password';
        header('location:login_page.php');
         }
 }
 else {
     $_SESSION['invlid_email']=' Email Does Not Exist';
     header('location:login_page.php');
 }


?>