<?php
session_start();
 include '../db.php';
$id=$_GET['id'];
$select_status="SELECT * FROM projects WHERE id=$id";
$select_status_result=mysqli_query($bd_connect,$select_status);
$status_after_assoc=mysqli_fetch_assoc($select_status_result);
    // banner status count
    $select_user=" SELECT COUNT(*) as counts FROM projects WHERE status=1";
    $select_user_result=mysqli_query($bd_connect,$select_user);
    $after_count=mysqli_fetch_assoc($select_user_result);

    if ($status_after_assoc['status']==1) {
             
                 if($after_count['counts']==2){
                    $_SESSION['project_1item']='Must be 2 Item Active ';
                    header('location:view_projects.php');
                     
                 }
                 else{
                    $update_status="UPDATE projects SET status=0 WHERE id=$id";
                    $udate_result=mysqli_query($bd_connect,$update_status);
                    $_SESSION['deactive_project_access']='Deactive Success';
                    header('location:view_projects.php');
                 }
    }

   else{
      if($after_count['counts']==3){
         $_SESSION['project_active_3_item']='Only 3  Item Active ';
         header('location:view_projects.php');
          
      }
      else{
     
        // this active only useing id 
        $update_status="UPDATE projects SET status=1 WHERE id=$id";
        $udate_result=mysqli_query($bd_connect,$update_status);
        $_SESSION['active_project_access']='Active Success';
        header('location:view_projects.php');
      }
        
        }





?>