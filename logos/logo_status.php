<?php
session_start();
 include '../db.php';
$id=$_GET['id'];
$select_status="SELECT * FROM logos WHERE id=$id";
$select_status_result=mysqli_query($bd_connect,$select_status);
$status_after_assoc=mysqli_fetch_assoc($select_status_result);


    if ($status_after_assoc['status']==1) {
                 // banner status count
     $select_user=" SELECT COUNT(*) as counts FROM logos WHERE status=1";
     $select_user_result=mysqli_query($bd_connect,$select_user);
     $after_count=mysqli_fetch_assoc($select_user_result);
       if($after_count['counts']==1){
        $_SESSION['logo_active_item']='Must be 1 Item Active ';
       header('location:logo_view.php');             
       }
       else{
    $update_status="UPDATE logos SET status=0 WHERE id=$id";
    $udate_result=mysqli_query($bd_connect,$update_status);
    $_SESSION['logo_deactive_access']='Deactive Success';
    header('location:logo_view.php');
     }
  }

   else{
            // this code all table status=0 
        $update_status="UPDATE logos SET status=0";
        $udate_result=mysqli_query($bd_connect,$update_status);
        // this active only useing id 
        $update_status="UPDATE logos SET status=1 WHERE id=$id";
        $udate_result=mysqli_query($bd_connect,$update_status);
        $_SESSION['logo_active_access']='Active Success';
        header('location:logo_view.php');
            
        
        }





?>