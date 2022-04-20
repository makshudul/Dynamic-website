<?php 

session_start();

if (!isset($_SESSION['User_login'])) {
    header('location:../login_page.php');
}
include '../db.php';
            // this code is view code 
$select_about="SELECT *FROM abouts";
$select_use_result=mysqli_query($bd_connect,$select_about);


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
                            <div class="float-left"> <h3>About info</h3> </div>
                        </div>
                        
                        <div class="card-body">
                            <table class="table table-striped">
                                <tr>
                                   <th>SL</th>
                                   <th>Title</th>
                                   <th>Description</th>
                                   <th>Years</th>
                                   <th>Action</th>
                                </tr>
                                <?php foreach ($select_use_result as $index=>$User) { ?>
                              
                                <tr>
                                    <td> <?= $index+1?></td>
                                    <td> <?= $User['title']?></td>
                                    <td> <?= substr( $User['description'],0,20).'....Read More'?></td>
                                    <td> <?= $User['years']?></td>
                             
                                    <td>
                                        <?php if($User['status']==0) {?>
                                            <a href="about_status.php?id=<?= $User['id']?>" class=" btn btn-secondary">Deactive</a>
                                            <?php } else {?>
                                                <a href="about_status.php?id=<?= $User['id']?>" class=" btn btn-success">Active</a>
                                            <?php }?>
                                            <a href="edit_about_page.php?id=<?= $User['id']?>" class=" btn btn-primary">edit</a>
                                            <?php if($User['status']==0) {?>
                                            <button name="about_delete.php?id=<?= $User['id']?>" type="button" class=" about_delete btn btn-danger"> Delete</button>
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
      <?php if(isset($_SESSION['add_about_success'])) {?>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '<?=$_SESSION['add_about_success']?>',
            showConfirmButton: false,
            timer: 1500
          })
      <?php } unset($_SESSION['add_about_success']) ?>
    </script>
                <!-- active_access  code  -->
   <script>
      <?php if(isset($_SESSION['about_active_access'])) {?>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '<?=$_SESSION['about_active_access']?>',
            showConfirmButton: false,
            timer: 1500
          })
      <?php } unset($_SESSION['about_active_access']) ?>
    </script>
                <!--  deactive_access code  -->
   <script>
      <?php if(isset($_SESSION['about_deactive_access'])) {?>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '<?=$_SESSION['about_deactive_access']?>',
            showConfirmButton: false,
            timer: 1500
          })
      <?php } unset($_SESSION['about_deactive_access']) ?>
    </script>
                 <!--  delete access code  -->
   <script>
      <?php if(isset($_SESSION['edit_about_success'])) {?>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '<?=$_SESSION['edit_about_success']?>',
            showConfirmButton: false,
            timer: 1500
          })
      <?php } unset($_SESSION['edit_about_success']) ?>
    </script>

               <!-- all item not be deactive  -->
                                <!--  delete access code  -->
   <script>
      <?php if(isset($_SESSION['about_1item'])) {?>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: '<?=$_SESSION['about_1item']?>',
            showConfirmButton: false,
            timer: 1500
          })
      <?php } unset($_SESSION['about_1item']) ?>
    </script>
                 <!-- delete success  code  -->
                 <script>
   $('.about_delete').click(function(){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    var link=$(this).attr('name');
                    window.location.href=link;
                }
                      })
});
<?php if(isset($_SESSION['delete_abouts_user'])){ ?>
        Swal.fire(
      'Deleted!',
      '<?= $_SESSION['delete_abouts_user'] ?>',
      'success')
        <?php } unset($_SESSION['delete_abouts_user'])?>
    </script>
                     <!-- empty title code  -->
    <script>
      <?php if(isset($_SESSION['empty_edit_about_title'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['empty_edit_about_title']?>',
                })
      <?php } unset($_SESSION['empty_edit_about_title']) ?>
    </script>
                       <!-- empty description -->
     <script>
      <?php if(isset($_SESSION['empty_edit_about_description'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['empty_edit_about_description']?>',
                })
      <?php } unset($_SESSION['empty_edit_about_description']) ?>
    </script>
                     <!-- empty years -->
                     <script>
      <?php if(isset($_SESSION['empty_edit_about_years'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['empty_edit_about_years']?>',
                })
      <?php } unset($_SESSION['empty_edit_about_years']) ?>
    </script>