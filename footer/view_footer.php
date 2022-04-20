<?php 

session_start();

if (!isset($_SESSION['User_login'])) {
    header('location:../login_page.php');
}
include '../db.php';
            // this code is view code 
$select_footer="SELECT *FROM footers";
$select_footer_result=mysqli_query($bd_connect,$select_footer);


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
                            <div class="float-left"> <h3>Service view</h3> </div>
                        </div>
                        
                        <div class="card-body">
                            <table class="table table-striped">
                                <tr>
                                   <th>SL</th>
                                   <th>Phone</th>
                                   <th>Email</th>
                                   <th>Copyright</th>
                                   <th>Action</th>
                                </tr>
                                <?php foreach ($select_footer_result as $index=>$User) { ?>
                              
                                <tr>
                                    <td> <?= $index+1?></td>
                                    <td> <?= $User['phone']?></td>
                                    <td> <?= $User['email']?></td>
                                    <td> <?= $User['copyright']?></td>
                                    <td>     
                                    <?php if($User['status']==0) {?>
                                            <a href="footer_status.php?id=<?= $User['id']?>" class=" btn btn-secondary">Deactive</a>
                                            <?php } else {?>
                                                <a href="footer_status.php?id=<?= $User['id']?>" class=" btn btn-success">Active</a>
                                            <?php }?>
                                     <button name="footer_delete.php?id=<?= $User['id']?>" type="button" class=" footer_delete btn btn-danger"> Delete</button>
                                    </td>
                                </tr>
                                      
                                   <?php }?>
                                  <!-- this code is no data found -->
                                  <?php if (mysqli_num_rows($select_footer_result)==0) {?>
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
      <?php if(isset($_SESSION['add_footer_success'])) {?>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '<?=$_SESSION['add_footer_success']?>',
            showConfirmButton: false,
            timer: 1500
          })
      <?php } unset($_SESSION['add_footer_success']) ?>
    </script>
     
                 <!-- delete success  code  -->
                 <script>
   $('.footer_delete').click(function(){
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
<?php if(isset($_SESSION['delete_footer_user'])){ ?>
        Swal.fire(
      'Deleted!',
      '<?= $_SESSION['delete_footer_user'] ?>',
      'success')
        <?php } unset($_SESSION['delete_footer_user'])?>
    </script>
                    <!-- social deactive  -->
<script>
      <?php if(isset($_SESSION['footer_deactive'])) {?>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '<?=$_SESSION['footer_deactive']?>',
            showConfirmButton: false,
            timer: 1500
          })
      <?php } unset($_SESSION['footer_deactive']) ?>
    </script>
                    <!-- social footer_active  -->
<script>
      <?php if(isset($_SESSION['footer_active'])) {?>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '<?=$_SESSION['footer_active']?>',
            showConfirmButton: false,
            timer: 1500
          })
      <?php } unset($_SESSION['footer_active']) ?>
    </script>


 
       