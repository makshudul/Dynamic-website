<?php
session_start();
if (!isset($_SESSION['User_login'])) {
  header('location:../login_page.php');
}
include '../db.php';
$id=$_GET['id'];
$single_user="SELECT * FROM skills WHERE id='$id'";
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
                             <h3> Skills Update</h3>
                            </div>
                            <div class="card-body">
                              <form action="edit_skill.php" method="POST" enctype="multipart/form-data">
                               <div class="form-group">
                               <input type="hidden" placeholder="Enter Name" name="id" class="form-control " value="<?=$after_assoc['id']?>">
                                <label >Skill Name</label>
                                <input type="text" placeholder="Enter Name" name="skill_name" class="form-control" value="<?=$after_assoc['skill_name']?>">
                               </div>
                               <div class="form-group">
                                <label for="exampleInputPassword1">Percentage</label>
                                <input type="text" placeholder="Enter Name" name="percentage" class="form-control" value="<?=$after_assoc['percentage']?>">
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
   