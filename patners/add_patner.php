<?php 
session_start();
include '../db.php';
$image=$_FILES['image']['name'];

 if (empty( $_FILES['image'] ['name'])) {
    $_SESSION['empty_patner_image']=' Please Enter Image';
    header('location:add_patner_page.php');
}
else {
    $uploaded_file= $_FILES['image'];
    $after_explode= explode('.',$uploaded_file['name']);
    $extention= end($after_explode);
    $allowed_extention=array('jpg','png','jpeg','gif','PNG');
    if (in_array($extention,$allowed_extention)) {
        if ($uploaded_file['size']<=500000) {
            $insert="INSERT INTO patner(image)VALUES('$image')";
            $insert_result= mysqli_query($bd_connect,$insert);          
            $_SESSION['add_Patner_success']=' Add Success!';
            header('location:patner_view.php');
            //  this code use id name extension  new location and database name update 
            $last_id=mysqli_insert_id($bd_connect);
            $file_name=$last_id.'.'.$extention;
            $new_location='../uploads/patners/'.$file_name;
            move_uploaded_file($uploaded_file['tmp_name'],$new_location);
                                // this code is update id and file extension 
            $update_patner_image="UPDATE patner SET image='$file_name' WHERE id=$last_id";
            $update_result=mysqli_query($bd_connect,$update_patner_image);
        }
        else {
            $_SESSION['patner_big_image']='Image Size is big !';
            header('location:add_patner_page.php');
        }
       
   }
    else {
    
        $_SESSION['patner_extention_error']='Extension Not Vaild  !';
        header('location:add_patner_page.php');
    }
}



?>