<?php
session_start();
 include '../db.php';
$id=$_GET['id'];
$select_status="SELECT * FROM comments WHERE id=$id";
$select_status_result=mysqli_query($bd_connect,$select_status);
$status_after_assoc=mysqli_fetch_assoc($select_status_result);
   // skills status count
   $select_user=" SELECT COUNT(*) as counts FROM comments WHERE status=1";
   $select_user_result=mysqli_query($bd_connect,$select_user);
   $after_count=mysqli_fetch_assoc($select_user_result);

    if ($status_after_assoc['status']==1) {
              
                 if($after_count['counts']==3){
                    $_SESSION['comments_3_item']='Must be 3 Item Active ';
                    header('location:view_comment.php');
                     
                 }
                 else{
                    $update_status="UPDATE comments SET status=0 WHERE id=$id";
                    $udate_result=mysqli_query($bd_connect,$update_status);
                    $_SESSION['comments_deactive_access']='Deactive Success';
                    header('location:view_comment.php');
                 }
    }

   else{
      if($after_count['counts']==5){
         $_SESSION['comments_5_over_item']='Only 5 Item Active ';
         header('location:view_comment.php');
          
      }
               else{
         // this active only useing id 
         $update_status="UPDATE comments SET status=1 WHERE id=$id";
         $udate_result=mysqli_query($bd_connect,$update_status);
         $_SESSION['comments_active_access']='Active Success';
         header('location:view_comment.php');
     
      }
        
       
        
        }





?>