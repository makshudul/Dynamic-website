<?php 
session_start();
if (!isset($_SESSION['User_login'])) {
    header('location:../login_page.php');
}
 
include '../db.php';
$id=$_POST['id'];
$name=$_POST['name'];
$email=$_POST['email'];
$password=password_hash($_POST['password'],PASSWORD_DEFAULT);
if (!empty($_POST['password'])) {
    if ($_FILES['profile_image']['name']!='') {
      // this code profile image infromation 
        $uploaded_file=$_FILES['profile_image'];
        $after_explode=explode('.',$uploaded_file['name']);
        $extention=end($after_explode);
        $allowed_extention=array('jpg','png','jpeg','gif','PNG');
    if (in_array($extention,$allowed_extention)) {
        if ($uploaded_file['size']<=500000) {
              // this code is old pic delete 
        $selete="SELECT *FROM users WHERE id=$id";
        $select_query=mysqli_query($bd_connect,$selete);
        $after_assoc=mysqli_fetch_assoc($select_query);
        $delete_from="../uploads/users/".$after_assoc['profile_img'];
        unlink($delete_from);
             //  this code use id name extension  new location and database name update 
             $file_name=$id.'.'.$extention;
             $new_location='../uploads/users/'.$file_name;
             move_uploaded_file($uploaded_file['tmp_name'],$new_location);
             // this code update code 
             
            $update="UPDATE users SET name='$name',email='$email',password='$password',profile_img ='$file_name' WHERE id=$id";
            $update_result=mysqli_query($bd_connect,$update);
            header('location:user_view.php');
       

        }
        else {
            header('location:edit_users.php');
            $_SESSION['file_big']=' This image is too big';
        }

    }
    else {
        header('location:edit_users.php');
        $_SESSION['extenion_not']='This extention not allowed';
    }
   
    }
        else {

                $update="UPDATE users SET name='$name',email='$email',password='$password' WHERE id=$id";
                $update_result=mysqli_query($bd_connect,$update);
                header('location:user_view.php');
        }
 
}
else {
    if ($_FILES['profile_image']['name']!='') {
      // this code profile image infromation 
        $uploaded_file=$_FILES['profile_image'];
        $after_explode=explode('.',$uploaded_file['name']);
        $extention=end($after_explode);
        $allowed_extention=array('jpg','png','jpeg','gif','PNG');
    if (in_array($extention,$allowed_extention)) {
        if ($uploaded_file['size']<=500000) {
                   // this code is old pic delete 
        $selete="SELECT *FROM users WHERE id=$id";
        $select_query=mysqli_query($bd_connect,$selete);
        $after_assoc=mysqli_fetch_assoc($select_query);
        $delete_from="../uploads/users/".$after_assoc['profile_img'];
        unlink($delete_from);
             //  this code use id name extension  new location and database name update 
             $file_name=$id.'.'.$extention;
             $new_location='../uploads/users/'.$file_name;
             move_uploaded_file($uploaded_file['tmp_name'],$new_location);

             // this code update code 
             $update="UPDATE users SET name='$name',email='$email',password='$password', profile_img ='$file_name' WHERE id=$id";
            $update_result=mysqli_query($bd_connect,$update);
            header('location:user_view.php');
       

        }
        else {
            header('location:edit_users.php');
            $_SESSION['extenion_not']=' This extention not allowed';
        }

    }
    else {
        header('location:edit_users.php');
        $_SESSION['extenion_not']=' This extention not allowed';
    }
    
    }
    else {
        $update="UPDATE users SET name='$name',email='$email',password='$password' WHERE id=$id";
        $update_result=mysqli_query($bd_connect,$update);
        header('location:user_view.php');
    }
}

?>