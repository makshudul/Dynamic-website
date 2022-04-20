<?php 

session_start();

if (!isset($_SESSION['User_login'])) {
    header('location:../login_page.php');
}
include '../db.php';
            // this code is view code 
$select_project="SELECT *FROM projects";
$select_use_project=mysqli_query($bd_connect,$select_project);


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
                            <div class="float-left"> <h3>Project view</h3> </div>
                        </div>
                        
                        <div class="card-body">
                            <table class="table table-striped">
                                <tr>
                                   <th>SL</th>
                                   <th>Title</th>
                                   <th>Project Type</th>
                                   <th>Clients</th>
                                   <th>Completion</th>
                                   <th>Authors</th>
                                   <th>Budget</th>
                                   <th>Image</th>
                                   <th>Action</th>
                                </tr>
                                <?php foreach ($select_use_project as $index=>$User) { ?>
                              
                                <tr>
                                    <td> <?= $index+1?></td>
                                    <td> <?= $User['title']?></td>
                                    <td> <?= $User['project_type']?></td>  
                                    <td> <?= $User['clients']?></td>
                                    <td> <?= $User['completion']?></td>
                                    <td> <?= $User['authors']?></td>
                                    <td> <?= $User['budget']?></td>
                                   <td>
                                     <img width="50" src="/panda/uploads/projects/<?= $User['image']?>" alt="">
                                    </td>
                             
                                    <td>
                                        <?php if($User['status']==0) {?>
                                            <a href="project_status.php?id=<?= $User['id']?>" class=" btn btn-secondary">Deactive</a>
                                            <?php } else {?>
                                                <a href="project_status.php?id=<?= $User['id']?>" class=" btn btn-success">Active</a>
                                            <?php }?>
                                            <?php if($User['status']==0) {?>
                                        <button name="project_delete.php?id=<?= $User['id']?>" type="button" class=" delete_project btn btn-danger"> Delete</button>
                                        <?php }?>
                                    </td>
                                </tr>
                                      
                                   <?php }?>
                                  <!-- this code is no data found -->
                                  <?php if (mysqli_num_rows($select_use_project)==0) {?>
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
      <?php if(isset($_SESSION['active_project_access'])) {?>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '<?=$_SESSION['active_project_access']?>',
            showConfirmButton: false,
            timer: 1500
          })
      <?php } unset($_SESSION['active_project_access']) ?>
    </script>
                <!--  deactive_project_access code  -->
   <script>
      <?php if(isset($_SESSION['deactive_project_access'])) {?>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '<?=$_SESSION['deactive_project_access']?>',
            showConfirmButton: false,
            timer: 1500
          })
      <?php } unset($_SESSION['deactive_project_access']) ?>
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

               <!-- 2 item must be active  -->
                            
   <script>
      <?php if(isset($_SESSION['project_1item'])) {?>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: '<?=$_SESSION['project_1item']?>',
            showConfirmButton: false,
            timer: 1500
          })
      <?php } unset($_SESSION['project_1item']) ?>
    </script>
                <!-- 3 item over not active  -->
                            
   <script>
      <?php if(isset($_SESSION['project_active_3_item'])) {?>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: '<?=$_SESSION['project_active_3_item']?>',
            showConfirmButton: false,
            timer: 1500
          })
      <?php } unset($_SESSION['project_active_3_item']) ?>
    </script>

       <!-- Delete code  -->
       <script>
   $('.delete_project').click(function(){
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
<?php if(isset($_SESSION['delete_project_message'])){ ?>
        Swal.fire(
      'Deleted!',
      '<?= $_SESSION['delete_project_message'] ?>',
      'success')
        <?php } unset($_SESSION['delete_project_message'])?>
    </script>