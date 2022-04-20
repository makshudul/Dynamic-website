<?php
session_start();
 include '../db.php';
$id=$_GET['id'];
$select_status="SELECT * FROM experiences WHERE id=$id";
$select_status_result=mysqli_query($bd_connect,$select_status);
$status_after_assoc=mysqli_fetch_assoc($select_status_result);
   // experiences status count
   $select_user=" SELECT COUNT(*) as counts FROM experiences WHERE status=1";
   $select_user_result=mysqli_query($bd_connect,$select_user);
   $after_count=mysqli_fetch_assoc($select_user_result);

    if ($status_after_assoc['status']==1) {
              
                 if($after_count['counts']==2){
                    $_SESSION['experiences_2_item']='Must be 2 Item Active ';
                    header('location:view_experience.php');
                     
                 }
                 else{
                    $update_status="UPDATE experiences SET status=0 WHERE id=$id";
                    $udate_result=mysqli_query($bd_connect,$update_status);
                    $_SESSION['experiences_deactive_access']='Deactive Success';
                    header('location:view_experience.php');
                 }
    }

   else{
      if($after_count['counts']==4){
         $_SESSION['experiences_4_over_item']='Only 4 Item Active ';
         header('location:view_experience.php');
          
      }
       else{
         // this active only useing id 
         $update_status="UPDATE experiences SET status=1 WHERE id=$id";
         $udate_result=mysqli_query($bd_connect,$update_status);
         $_SESSION['experiences_active_access']='Active Success';
         header('location:view_experience.php');
     
      }
        
       
        
        }





?>