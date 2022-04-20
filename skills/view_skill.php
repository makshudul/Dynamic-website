<?php 

session_start();

if (!isset($_SESSION['User_login'])) {
    header('location:../login_page.php');
}
include '../db.php';
            // this code is view code 
$select_skill="SELECT *FROM skills";
$select_use_result=mysqli_query($bd_connect,$select_skill);


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
                            <div class="float-left"> <h3>Skill view</h3> </div>
                        </div>
                        
                        <div class="card-body">
                            <table class="table table-striped">
                                <tr>
                                   <th>SL</th>
                                   <th>Skill Name</th>
                                   <th>Percentage</th>
                                   <th>Action</th>
                                </tr>
                                <?php foreach ($select_use_result as $index=>$User) { ?>
                              
                                <tr>
                                    <td> <?= $index+1?></td>
                                    <td> <?= $User['skill_name']?></td>
                                    <td> <?= $User['percentage']?></td>
                             
                                    <td>
                                        <?php if($User['status']==0) {?>
                                            <a href="skill_status.php?id=<?= $User['id']?>" class=" btn btn-secondary">Deactive</a>
                                            <?php } else {?>
                                                <a href="skill_status.php?id=<?= $User['id']?>" class=" btn btn-success">Active</a>
                                            <?php }?>
                                            <a href="edit_skill_page.php?id=<?= $User['id']?>" class=" btn btn-primary">edit</a>
                                            <?php if($User['status']==0) {?>
                                            <button name="skill_delete.php?id=<?= $User['id']?>" type="button" class=" skill_delete btn btn-danger"> Delete</button>
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
      <?php if(isset($_SESSION['add_skill_success'])) {?>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '<?=$_SESSION['add_skill_success']?>',
            showConfirmButton: false,
            timer: 1500
          })
      <?php } unset($_SESSION['add_skill_success']) ?>
    </script>
                <!-- active_access  code  -->
   <script>
      <?php if(isset($_SESSION['skill_active_access'])) {?>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '<?=$_SESSION['skill_active_access']?>',
            showConfirmButton: false,
            timer: 1500
          })
      <?php } unset($_SESSION['skill_active_access']) ?>
    </script>
                    <!-- active_ 3 over acive  code  -->
   <script>
      <?php if(isset($_SESSION['skill_3_over_item'])) {?>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: '<?=$_SESSION['skill_3_over_item']?>',
            showConfirmButton: false,
            timer: 1500
          })
      <?php } unset($_SESSION['skill_3_over_item']) ?>
    </script>
                <!--  deactive_access code  -->
   <script>
      <?php if(isset($_SESSION['skill_deactive_access'])) {?>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '<?=$_SESSION['skill_deactive_access']?>',
            showConfirmButton: false,
            timer: 1500
          })
      <?php } unset($_SESSION['skill_deactive_access']) ?>
    </script>
                 <!--  edit access code  -->
   <script>
      <?php if(isset($_SESSION['edit_skill_success'])) {?>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '<?=$_SESSION['edit_skill_success']?>',
            showConfirmButton: false,
            timer: 1500
          })
      <?php } unset($_SESSION['edit_skill_success']) ?>
    </script>

               <!-- all item not be deactive  -->
                                <!--  delete access code  -->
   <script>
      <?php if(isset($_SESSION['skill_1item'])) {?>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: '<?=$_SESSION['skill_1item']?>',
            showConfirmButton: false,
            timer: 1500
          })
      <?php } unset($_SESSION['skill_1item']) ?>
    </script>
                 <!-- delete success  code  -->
                 <script>
   $('.skill_delete').click(function(){
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
<?php if(isset($_SESSION['delete_skill_user'])){ ?>
        Swal.fire(
      'Deleted!',
      '<?= $_SESSION['delete_skill_user'] ?>',
      'success')
        <?php } unset($_SESSION['delete_skill_user'])?>
    </script>
                     <!-- empty skill name code  -->
    <script>
      <?php if(isset($_SESSION['empty_skill_name'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['empty_skill_name']?>',
                })
      <?php } unset($_SESSION['empty_skill_name']) ?>
    </script>
                       <!-- empty skill percentage -->
     <script>
      <?php if(isset($_SESSION['empty_skill_percentage'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['empty_skill_percentage']?>',
                })
      <?php } unset($_SESSION['empty_skill_percentage']) ?>
    </script>
                         <!-- empty edit skill name code  -->
                         <script>
      <?php if(isset($_SESSION['edit_skill_page'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['edit_skill_page']?>',
                })
      <?php } unset($_SESSION['edit_skill_page']) ?>
    </script>
                       <!-- empty edit skill percentage -->
     <script>
      <?php if(isset($_SESSION['empty_edit_skill_percentage'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['empty_edit_skill_percentage']?>',
                })
      <?php } unset($_SESSION['empty_edit_skill_percentage']) ?>
    </script>
       