<?php
 session_start();
 if (!isset($_SESSION['User_login'])) {
     header('location:../login_page.php');
 }
include '../db.php';
$id=$_GET['id'];
$single_user="SELECT * FROM users WHERE id='$id'";
$single_user_result=mysqli_query($bd_connect,$single_user);
$after_assoc=mysqli_fetch_assoc($single_user_result);

?>
<?php 
 require '../dashboard_includes/header.php';
 ?>
   <!-- ########## START: MAIN PANEL ########## -->
   <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Panda</a>
        <a class="breadcrumb-item" href="index.html">Single View </a>
      </nav>

      <div class="sl-pagebody">
    
      <div class="row">
               <div class="col-lg-6 m-auto pt-2">
                   <div class="card">
                       <div class="card-header text-center">
                           <h3> <strong class=" text-success"><?=$after_assoc['name'] ?> </strong> Information</h3>
                       </div>
                       <div class="card-body">
                         <table class="table table-striped">
                             <tr>
                                 <td>Name</td>
                                 <td><?=$after_assoc['name'] ?> </td>
                             </tr>
                             <tr>
                                 <td>Email</td>
                                 <td><?=$after_assoc['email'] ?> </td>
                             </tr>
                             <tr>
                                 <td>Image</td>
                            <td>  <img width="300" src="/panda/uploads/users/<?= $after_assoc['profile_img']?>" alt=""></td>
                             </tr>


                         </table>
                         <div class="text-center pb-3">
                         <a href="user_view.php" class="btn btn-success ">Back</a>
                         </div>
                       </div>
                   </div>
               </div>
           </div>


      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->


  <?php 
 require '../dashboard_includes/footer.php';
 ?>