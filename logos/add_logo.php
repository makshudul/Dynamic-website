<?php 
session_start();
include '../db.php';
$logo=$_FILES['logo']['name'];

 if (empty( $_FILES['logo'] ['name'])) {
    $_SESSION['empty_logo_image']=' Please Enter Image';
    header('location:add_logo_page.php');
}
else {
    $uploaded_file= $_FILES['logo'];
    $after_explode= explode('.',$uploaded_file['name']);
    $extention= end($after_explode);
    $allowed_extention=array('jpg','png','jpeg','gif','PNG');
    if (in_array($extention,$allowed_extention)) {
        if ($uploaded_file['size']<=500000) {
            $insert="INSERT INTO logos(logo)VALUES('$logo')";
            $insert_result= mysqli_query($bd_connect,$insert);          
            $_SESSION['add_logo_success']=' Add Success!';
            header('location:logo_view.php');
            //  this code use id name extension  new location and database name update 
            $last_id=mysqli_insert_id($bd_connect);
            $file_name=$last_id.'.'.$extention;
            $new_location='../uploads/logos/'.$file_name;
            move_uploaded_file($uploaded_file['tmp_name'],$new_location);
                                // this code is update id and file extension 
            $update_banner_image="UPDATE logos SET logo='$file_name' WHERE id=$last_id";
            $update_result=mysqli_query($bd_connect,$update_banner_image);
        }
        else {
            $_SESSION['logo_big_image']='Image Size is big !';
            header('location:add_logo_page.php');
        }
       
   }
    else {
    
        $_SESSION['logo_extention_error']='Extension Not Vaild  !';
        header('location:add_logo_page.php');
    }
}



?>