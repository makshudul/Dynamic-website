<?php
session_start();
 include '../db.php';
$id=$_GET['id'];
$select_status="SELECT * FROM patner WHERE id=$id";
$select_status_result=mysqli_query($bd_connect,$select_status);
$status_after_assoc=mysqli_fetch_assoc($select_status_result);
            // patner status count
            $select_user=" SELECT COUNT(*) as counts FROM patner WHERE status=1";
            $select_user_result=mysqli_query($bd_connect,$select_user);
            $after_count=mysqli_fetch_assoc($select_user_result);

    if ($status_after_assoc['status']==1) {
     
       if($after_count['counts']==2){
        $_SESSION['patner_2_active_item']='Must be  2 Item Active ';
       header('location:patner_view.php');             
       }
       else{
    $update_status="UPDATE patner SET status=0 WHERE id=$id";
    $udate_result=mysqli_query($bd_connect,$update_status);
    $_SESSION['patner_deactive_access']='Deactive Success';
    header('location:patner_view.php');
     }
  }

   else{
            
    if($after_count['counts']==4){
      $_SESSION['patner_4item_active_item']='Must be 4 Item Active ';
     header('location:patner_view.php');             
     }
     else{
        $update_status="UPDATE patner SET status=1 WHERE id=$id";
        $udate_result=mysqli_query($bd_connect,$update_status);
        $_SESSION['patner_active_access']='Active Success';
        header('location:patner_view.php');
     }
        
        }





?>