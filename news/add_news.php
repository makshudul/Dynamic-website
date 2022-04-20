<?php 
session_start();
include '../db.php';
$date=$_POST['date'];
$title=$_POST['title'];
$destription=mysqli_real_escape_string($bd_connect,$_POST['destription']);
if (empty($title)) {
     $_SESSION['empty_title']='Please Enter Title';
     header('location:add_news_page.php');
}
if (empty($date)) {
    $_SESSION['empty_date']='Please Enter Date';
    header('location:add_banner_page.php');
}
else if (empty($destription)){
    $_SESSION['empty_description']=' Please Enter Description';
    header('location:add_news_page.php');
    
}
else if (empty( $_FILES['image'] ['name'])) {
    $_SESSION['empty_banner_image']=' Please Enter Image';
    header('location:add_news_page.php');
}
else {
    $uploaded_file= $_FILES['image'];
    $after_explode= explode('.',$uploaded_file['name']);
    $extention= end($after_explode);
    $allowed_extention=array('jpg','png','jpeg','gif','PNG');
    if (in_array($extention,$allowed_extention)) {
        if ($uploaded_file['size']<=500000) {
            $insert="INSERT INTO news(date,title,description)VALUES('$date','$title','$destription')";
            $insert_result= mysqli_query($bd_connect,$insert);          
            $_SESSION['add_success']=' Add Success!';
            header('location:view_news.php');
            //  this code use id name extension  new location and database name update 
            $last_id=mysqli_insert_id($bd_connect);
            $file_name=$last_id.'.'.$extention;
            $new_location='../uploads/news/'.$file_name;
            move_uploaded_file($uploaded_file['tmp_name'],$new_location);
                                // this code is update id and file extension 
            $update_banner_image="UPDATE news SET image='$file_name' WHERE id=$last_id";
            $update_result=mysqli_query($bd_connect,$update_banner_image);
        }
        else {
            $_SESSION['big_image']='Image Size is big !';
            header('location:add_news_page.php');
        }
       
   }
    else {
    
        $_SESSION['extention_error']='Extension Not Vaild  !';
        header('location:add_news_page.php');
    }
}



?>