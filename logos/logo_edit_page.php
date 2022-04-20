<?php
session_start();
if (!isset($_SESSION['User_login'])) {
  header('location:../login_page.php');
}
include '../db.php';
$id=$_GET['id'];
$single_user="SELECT * FROM logos WHERE id='$id'";
$single_user_result=mysqli_query($bd_connect,$single_user);  
$after_assoc=mysqli_fetch_assoc($single_user_result);
?>
<?php 

require '../dashboard_includes/header.php';

?>
   <!-- ########## START: MAIN PANEL ########## -->
   <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="/panda/deashboard.php">Panda</a>
        <a class="breadcrumb-item" href="index.html">Edit</a>
      </nav>
      <div class="row">
                  <div class="col-lg-6 m-auto">
                     <div class="card ">
                         <div class="card-header ">
                             <h3> Logo update</h3>
                            </div>
                            <div class="card-body">
                              <form action="edit_logo.php" method="POST" enctype="multipart/form-data">
                               <div class="form-group">
                               <input type="text" placeholder="Enter Name" name="id" class="form-control " value="<?=$after_assoc['id']?>">
                               </div>
                             
                               <div class="form-group">
                                <label for="exampleInputPassword1">Present image </label>
                                <img width="200" src="/panda/uploads/logos/<?= $after_assoc['logo']?>" alt="">
                               </div>
                               <div class="form-group">
                                <label >Profile Image</label>
                                <input type="file" name="logo" class="form-control">
                             </div>
                             <div class="text-center">  <button type="submit" class="btn btn-success">Update</button></div>
                          
                            </form>
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
    <!-- Optional JavaScript -->
    
    <!-- this code is sweet aleart  -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                   <!-- email exits code  -->
    <script>
      <?php if(isset($_SESSION['file_big'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['file_big']?>',
                })
      <?php } unset($_SESSION['file_big']) ?>
    </script>

     <script>
      <?php if(isset($_SESSION['extenion_not'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['extenion_not']?>',
                })
      <?php } unset($_SESSION['extenion_not']) ?>
    </script>
  