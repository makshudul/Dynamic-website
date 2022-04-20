<?php
session_start();
if (!isset($_SESSION['User_login'])) {
  header('location:../login_page.php');
}
include '../db.php';
$id=$_GET['id'];
$single_user="SELECT * FROM experiences WHERE id='$id'";
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
                             <h3> Service Update</h3>
                            </div>
                            <div class="card-body">
                              <form action="edit_experience.php" method="POST">
                               <div class="form-group">
                               <input type="hidden" placeholder="Enter Name" name="id" class="form-control " value="<?=$after_assoc['id']?>">
                                <label >Years ( start - End )</label>
                                <input type="text" placeholder="Enter Years" name="years" class="form-control" value="<?=$after_assoc['years']?>">
                               </div>
                               <div class="form-group">
                                <label >Company Name </label>
                                <input type="text" placeholder="Enter Company Name" name="company_name" class="form-control" value="<?=$after_assoc['company_name']?>">
                               </div>
                               <div class="form-group">
                                <label >position</label>
                                <input type="text" placeholder="Enter Position" name="position" class="form-control" value="<?=$after_assoc['position']?>">
                               </div>
                               <div class="form-group">
                                <label >Deperment</label>
                                <input type="text" placeholder="Enter Deparment" name="deparment" class="form-control" value="<?=$after_assoc['deparment']?>">
                               </div>
                               <div class="form-group">
                                <label >Description</label>
                                <textarea type="text" placeholder="Enter Description" name="description" class="form-control"><?=$after_assoc['description']?></textarea>
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
   
                         <!-- empty empty_edit_experience_year -->
                         <script>
      <?php if(isset($_SESSION['empty_edit_experience_year'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['empty_edit_experience_year']?>',
                })
      <?php } unset($_SESSION['empty_edit_experience_year']) ?>
    </script>
                         <!-- empty empty_edit_experience_company_name  code  -->
                         <script>
      <?php if(isset($_SESSION['empty_edit_experience_company_name'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['empty_edit_experience_company_name']?>',
                })
      <?php } unset($_SESSION['empty_edit_experience_company_name']) ?>
    </script>
                       <!-- empty edit empty_edit_experience_position -->
     <script>
      <?php if(isset($_SESSION['empty_edit_experience_position'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['empty_edit_experience_position']?>',
                })
      <?php } unset($_SESSION['empty_edit_experience_position']) ?>
    </script>
                     <!-- empty edit empty_edit_experience_deparment -->
                     <script>
      <?php if(isset($_SESSION['empty_edit_experience_deparment'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['empty_edit_experience_deparment']?>',
                })
      <?php } unset($_SESSION['empty_edit_experience_deparment']) ?>
    </script>
                     <!-- empty  empty_edit_experience_description -->
                     <script>
      <?php if(isset($_SESSION['empty_edit_experience_description'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['empty_edit_experience_description']?>',
                })
      <?php } unset($_SESSION['empty_edit_experience_description']) ?>
    </script>
       