<?php
session_start();
include '../db.php';
$name=$_POST['name'];
$email=$_POST['email'];
$role=$_POST['role'];
$password=password_hash($_POST['password'],PASSWORD_DEFAULT);
                    //  this code is already register code 
 $select_user=" SELECT COUNT(*) as email_exit FROM users WHERE email='$email'";
 $select_user_result=mysqli_query($bd_connect,$select_user);
 $after_count=mysqli_fetch_assoc($select_user_result);

 if (empty($name)) {
     $_SESSION['name_empty']='Name is required';
     header('location:resgistration.php');
 }
 else if(empty($email)){
    $_SESSION['email_empty']='Email is Required';
    header('location:resgistration.php');
}
else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $_SESSION['email_wrong']='Please Enter  Valid Email';
    header('location:resgistration.php');
}
else if(empty($_POST['password'])){
    $_SESSION['password_empty']='Password is Required';
    header('location:resgistration.php');
}
else if ($after_count['email_exit']==1) {
    $_SESSION['email_already_register']=' Email Already Register';
    header('location:resgistration.php');
}
else {
     // this code profile image infromation 
    $uploaded_file= $_FILES['profile_image'];
    $after_explode= explode('.',$uploaded_file['name']);
    $extention= end($after_explode);
    $allowed_extention=array('jpg','png','jpeg','gif','PNG');
    if (in_array($extention,$allowed_extention)) {
        if ($uploaded_file['size']<=500000) {
            $insert="INSERT INTO users(name,email,password,role)VALUES('$name','$email','$password',$role)";
            $insert_result=mysqli_query($bd_connect,$insert);          
            $_SESSION['register_success']=' User Registered Success!';
            header('location:resgistration.php');
            //  this code use id name extension  new location and database name update 
            $last_id=mysqli_insert_id($bd_connect);
            $file_name=$last_id.'.'.$extention;
            $new_location='../uploads/users/'.$file_name;
            move_uploaded_file($uploaded_file['tmp_name'],$new_location);
                                // this code is update id and file extension 
            $update_profile_image="UPDATE users SET profile_img='$file_name' WHERE id=$last_id";
            $update_result=mysqli_query($bd_connect,$update_profile_image);
        }
        else {
            $_SESSION['big_image']='Image Size is big !';
            header('location:resgistration.php');
        }
       
   }
    else {
    
        $_SESSION['extention_error']='Extension Not Vaild  !';
        header('location:resgistration.php');
    }
   

}


?>