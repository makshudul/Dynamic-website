<?php 

session_start();

if (!isset($_SESSION['User_login'])) {
    header('location:../login_page.php');
}
include '../db.php';
            // this code is view code 
$select_user="SELECT *FROM banner";
$select_use_result=mysqli_query($bd_connect,$select_user);


?>
 <?php 
 require '../dashboard_includes/header.php';
 ?>
 <!-- ########## START: MAIN PANEL ########## -->
 <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Panda</a>
        <a class="breadcrumb-item" href="index.html">Users</a>
        <span class="breadcrumb-item active">View</span>
      </nav>
      
      <div class="sl-pagebody">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card ">
                        <div class="card-header">
                            <div class="float-left"> <h3>User Info</h3> </div>
                        </div>
                        
                        <div class="card-body">
                            <table class="table table-striped">
                                <tr>
                                   <th>SL</th>
                                   <th>Title</th>
                                   <th>Description</th>
                                   <th>Background Image</th>
                                   <th>Action</th>
                                </tr>
                                <?php foreach ($select_use_result as $index=>$User) { ?>
                              
                                <tr>
                                    <td> <?= $index+1?></td>
                                    <td> <?= $User['title']?></td>
                                    <td> <?= substr( $User['description'],0,20).'....Read More'?></td>
                                   <td>
                                     <img width="200" src="/panda/uploads/banners/<?= $User['background_image']?>" alt="">
                                    </td>
                             
                                    <td>
                                        <?php if($User['status']==0) {?>
                                            <a href="banner_status.php?id=<?= $User['id']?>" class=" btn btn-secondary">Deactive</a>
                                            <?php } else {?>
                                                <a href="banner_status.php?id=<?= $User['id']?>" class=" btn btn-success">Active</a>
                                            <?php }?>
                                            <?php if($User['status']==0) {?>
                                        <a href="/banners/banner_delete.php?id=<?= $User['id']?>" class=" btn btn-danger">Delete</a>
                                        <?php }?>
                                    </td>
                                </tr>
                                      
                                   <?php }?>
                                  <!-- this code is no data found -->
                                  <?php if (mysqli_num_rows($select_use_result)==0) {?>
                                     <tr>
                                         <td colspan="4" class=" text-center"> <strong > No data found</strong></td>
                                     </tr>
                                <?php } ?>
                            </table>
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
 <!-- this code is sweet aleart  -->
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

             <!-- add success code  -->
   <script>
      <?php if(isset($_SESSION['add_success'])) {?>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '<?=$_SESSION['add_success']?>',
            showConfirmButton: false,
            timer: 1500
          })
      <?php } unset($_SESSION['add_success']) ?>
    </script>
                <!-- active_access  code  -->
   <script>
      <?php if(isset($_SESSION['active_access'])) {?>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '<?=$_SESSION['active_access']?>',
            showConfirmButton: false,
            timer: 1500
          })
      <?php } unset($_SESSION['active_access']) ?>
    </script>
                <!--  deactive_access code  -->
   <script>
      <?php if(isset($_SESSION['deactive_access'])) {?>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '<?=$_SESSION['deactive_access']?>',
            showConfirmButton: false,
            timer: 1500
          })
      <?php } unset($_SESSION['deactive_access']) ?>
    </script>
                 <!--  delete access code  -->
   <script>
      <?php if(isset($_SESSION['delete_banner_user'])) {?>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '<?=$_SESSION['delete_banner_user']?>',
            showConfirmButton: false,
            timer: 1500
          })
      <?php } unset($_SESSION['delete_banner_user']) ?>
    </script>

               <!-- all item not be deactive  -->
                                <!--  delete access code  -->
   <script>
      <?php if(isset($_SESSION['1item'])) {?>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: '<?=$_SESSION['1item']?>',
            showConfirmButton: false,
            timer: 1500
          })
      <?php } unset($_SESSION['1item']) ?>
    </script>