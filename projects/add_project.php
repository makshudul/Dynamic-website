<?php 
session_start();
include '../db.php';
$title=$_POST['title'];
$project_type=$_POST['project_type'];
$clients=$_POST['clients'];
$completion=$_POST['completion'];
$authors=$_POST['authors'];
$budget=$_POST['budget'];

if (empty($title)) {
     $_SESSION['empty_project_title']='Please Enter Title';
     header('location:add_project_page.php');
}
else if (empty($project_type)){
    $_SESSION['empty_project_description']=' Please Enter Project type';
    header('location:add_project_page.php');
    
}
else if (empty( $_FILES['project_image'] ['name'])) {
    $_SESSION['empty_project__image']=' Please Enter Image';
    header('location:add_project_page.php');
}
else if (empty($clients)){
    $_SESSION['empty_project_clients']=' Please Enter Client';
    header('location:add_project_page.php');
    
}
else if (empty($completion)){
    $_SESSION['empty_project_completion']=' Please Enter Completion';
    header('location:add_project_page.php');
    
}
else if (empty($authors)){
    $_SESSION['empty_project_authors']=' Please Enter Authors';
    header('location:add_project_page.php');
    
}
else if (empty($budget)){
    $_SESSION['empty_project_budget']=' Please Enter Budget';
    header('location:add_project_page.php');
    
}

else {
    $uploaded_file= $_FILES['project_image'];
    $after_explode= explode('.',$uploaded_file['name']);
    $extention= end($after_explode);
    $allowed_extention=array('jpg','png','jpeg','gif','PNG');
    if (in_array($extention,$allowed_extention)) {
        if ($uploaded_file['size']<=5000000) {
            $insert="INSERT INTO projects(title,project_type,clients,completion,authors,budget)VALUES('$title','$project_type','$clients','$completion','$authors','$budget')";
            $insert_result= mysqli_query($bd_connect,$insert);          
            $_SESSION['add_project_success']=' Add Success!';
            header('location:view_projects.php');
            //  this code use id name extension  new location and database name update 
            $last_id=mysqli_insert_id($bd_connect);
            $file_name=$last_id.'.'.$extention;
            $new_location='../uploads/projects/'.$file_name;
            move_uploaded_file($uploaded_file['tmp_name'],$new_location);
                                // this code is update id and file extension 
            $update_banner_image="UPDATE projects SET image='$file_name' WHERE id=$last_id";
            $update_result=mysqli_query($bd_connect,$update_banner_image);
        }
        else {
            $_SESSION['big_project_image']='Image Size is big !';
            header('location:add_project_page.php');
        }
       
   }
    else {
    
        $_SESSION['extention_project_error']='Extension Not Vaild  !';
        header('location:add_project_page.php');
    }
}



?>