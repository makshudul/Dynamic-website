<?php 

session_start();

if (!isset($_SESSION['User_login'])) {
    header('location:../login_page.php');
}
include '../db.php';
            // this code is view code 
$select_user="SELECT *FROM users WHERE status=0";
$select_use_result=mysqli_query($bd_connect,$select_user);
                //   this code is where status ==1 set 
$select_trashed_user="SELECT *FROM users WHERE status=1";
$select_trashed_use_result=mysqli_query($bd_connect,$select_trashed_user);

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
                                   <th>Name</th>
                                   <th>Email</th>
                                   <th>Image</th>
                                   <th>Action</th>
                                </tr>
                                <?php foreach ($select_use_result as $index=>$User) { ?>
                              
                                <tr>
                                    <td> <?= $index+1?></td>
                                    <td> <?= $User['name']?></td>
                                    <td> <?= $User['email']?></td>
                                   <td>
                                     <img width="100" src="/panda/uploads/users/<?= $User['profile_img']?>" alt="">
                                    </td>
                             
                                    <td>
                                        <a href="single_user.php?id=<?= $User['id']?>" class=" btn btn-success">View</a>
                                        <a href="edit_users.php?id=<?= $User['id']?>" class=" btn btn-primary">Edit</a>
                                        <button name="user_status.php?id=<?= $User['id']?>" type="button" class="soft_delete  btn btn-warning">Soft Delete</button>
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
 
 
 <!-- this code is soft delete  -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card  mt-3 ">
                        <div class="card-header">
                             <h3 class=" text-center">Trashed User</h3>
                        </div>
                                 
                        <div class="card-body">
                            <table class="table table-striped">
                                <tr>
                                   <th>SL</th>
                                   <th>Name</th>
                                   <th>Email</th>
                                   <th>Image</th>
                                   <th>Action</th>
                                </tr>
                                <?php foreach ($select_trashed_use_result as $index=>$trashed_user) { ?>
                              
                                <tr>
                                    <td> <?= $index+1?></td>
                                    <td> <?= $trashed_user['name']?></td>
                                    <td> <?= $trashed_user['email']?></td>
                                    <td>
                                     <img width="100" src="/panda/uploads/users/<?= $trashed_user['profile_img']?>" alt="">
                                    </td>
                                    <td>
                                       <a href="user_status.php?id=<?= $trashed_user['id']?>" class=" btn btn-success"> ReStore</a>
                                       <?php if ($_SESSION['role']==1 || $_SESSION['role']== 2) { ?>
                                        <button name="delete.php?id=<?= $trashed_user['id']?>" type="button" class=" delete btn btn-danger"> Delete</button>
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

      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    <!-- Optional JavaScript -->
                                             <!-- this code is sweet aleart  -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                                             <!-- this code is delete code  -->
    <script>
   $('.delete').click(function(){
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
<?php if(isset($_SESSION['delete_user'])){ ?>
        Swal.fire(
      'Deleted!',
      '<?= $_SESSION['delete_user'] ?>',
      'success')
        <?php } unset($_SESSION['delete_user'])?>
    </script>
    

                        <!-- this code is soft delete code  -->
 <script>
   $('.soft_delete').click(function(){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, soft delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    var link=$(this).attr('name');
                    window.location.href=link;
                }
                      })
});
<?php if(isset($_SESSION['soft_delete_user'])){ ?>
        Swal.fire(
      ' Soft Deleted!',
      '<?= $_SESSION['soft_delete_user'] ?>',
      'success')
        <?php } unset($_SESSION['soft_delete_user'])?>
    </script>
    
    <?php 
 require '../dashboard_includes/footer.php';
 ?>