<?php 
session_start();
include '../db.php';
$id=$_POST['id'];

 if (empty( $_FILES['logo'] ['name'])) {
    $_SESSION['edit_logo_image_empty']=' Please Enter Image';
    header('location:logo_edit_page.php');
}
else{
    if ($_FILES['logo']['name']!='') {
        // this code profile image infromation 
          $uploaded_file=$_FILES['logo'];
          $after_explode=explode('.',$uploaded_file['name']);
          $extention=end($after_explode);
          $allowed_extention=array('jpg','png','jpeg','gif','PNG');
      if (in_array($extention,$allowed_extention)) {
          if ($uploaded_file['size']<=500000) {
                // this code is old pic delete 
          $selete="SELECT *FROM logos WHERE id=$id";
          $select_query=mysqli_query($bd_connect,$selete);
          $after_assoc=mysqli_fetch_assoc($select_query);
          $delete_from="../uploads/logos/".$after_assoc['logo'];
          unlink($delete_from);
               //  this code use id name extension  new location and database name update 
               $file_name=$id.'.'.$extention;
               $new_location='../uploads/logos/'.$file_name;
               move_uploaded_file($uploaded_file['tmp_name'],$new_location);
               // this code update code 
               
              $update="UPDATE logos SET logo ='$file_name' WHERE id=$id";
              $update_result=mysqli_query($bd_connect,$update);
              $_SESSION['edit_logo_success']=' Update success';
              header('location:logo_view.php');
         
  
          }
          else {
              header('location:logo_edit_page.php');
              $_SESSION['edit_logo_file_big']=' This image is too big';
          }
  
      }
      else {
          header('location:logo_edit_page.php');
          $_SESSION['edit_logo_extenion_not']='This extention not allowed';
      }
     
      }
}

?>