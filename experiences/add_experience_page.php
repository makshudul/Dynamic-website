<?php 
session_start();
if (!isset($_SESSION['User_login'])) {
   header('location:../login_page.php');
 }
?>

<?php 
 require '../dashboard_includes/header.php';
 ?>
     <!-- ########## START: MAIN PANEL ########## -->
     <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Pages</a>
        <span class="breadcrumb-item active">Blank Page</span>
      </nav>

      <div class="sl-pagebody">
      <div class="row">
                  <div class="col-lg-6 m-auto pt-3">
                     <div class="card">
                         <div class="card-header ">
                           <div>
                             <h3 class="float-left">Add Service</h3>
                           </div>
                            </div>
                            <div class="card-body">
                              <form action="add_experience.php" method="POST" >
                              <div class="form-group">
                                <label class="form-lable" >Year(Start - End) </label>
                                <input type="text" placeholder="Enter Year " name="years" class="form-control">
                             </div> 
                               <div class="form-group">
                                <label class="form-lable" >Company Name </label>
                                <input type="text" placeholder="Enter Conpany Name" name="company_name" class="form-control">
                             </div> 
                            
                               <div class="form-group">
                                <label class="form-lable" > Company Position </label>
                                <input type="text" placeholder="Enter Company Position" name="position" class="form-control">
                             </div> 
                             <div class="form-group">
                                <label class="form-lable" >  Deparment  </label>
                                <input type="text" placeholder="Enter Deparment" name="deparment" class="form-control">
                             </div> 
                             <div class="form-group">
                                <label >Description</label>
                                <textarea type="text" placeholder="Enter Description" name="description" class="form-control"></textarea>
                             </div>
                           
                             <div class="text-center">  
                               <button type="submit" class="btn btn-primary"> Add About</button>
                            </div>
                              
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
   <!-- this code is sweet aleart  -->
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                  
                    <!-- empty_experience_year exits code  -->
    <script>
      <?php if(isset($_SESSION['empty_experience_year'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['empty_experience_year']?>',
                })
      <?php } unset($_SESSION['empty_experience_year']) ?>
    </script>
                       <!-- empty_experience_description exits code  -->
                       <script>
      <?php if(isset($_SESSION['empty_experience_description'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['empty_experience_description']?>',
                })
      <?php } unset($_SESSION['empty_experience_description']) ?>
    </script>
                          <!--  empty_experience_company_name Empty code  -->
    <script>
      <?php if(isset($_SESSION['empty_experience_company_name'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['empty_experience_company_name']?>',
                })
      <?php } unset($_SESSION['empty_experience_company_name']) ?>
    </script>
                          <!--  empty_experience_position Empty code  -->
                          <script>
      <?php if(isset($_SESSION['empty_experience_position'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['empty_experience_position']?>',
                })
      <?php } unset($_SESSION['empty_experience_position']) ?>
    </script>
                          <!--  empty_experience_deparment Empty code  -->
                          <script>
      <?php if(isset($_SESSION['empty_experience_deparment'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['empty_experience_deparment']?>',
                })
      <?php } unset($_SESSION['empty_experience_deparment']) ?>
    </script>
       