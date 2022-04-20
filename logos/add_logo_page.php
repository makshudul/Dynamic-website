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
                  <div class="col-lg-8 m-auto">
                     <div class="card">
                         <div class="card-header ">
                           <div>
                             <h3 class="float-left">Add Logo</h3>
                           </div>
                            </div>
                            <div class="card-footer ">
                           <div>
                           <form action="add_logo.php" method="POST" enctype="multipart/form-data">
                             <div class="form-group">
                                <label >logo</label>
                                <input type="file" name="logo" class="form-control">
                             </div>
                             <div class="text-center">  
                               <button type="submit" class="btn btn-primary"> Add logo</button>
                            </div>
                              
                            </form>
                           </div>
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
                   <!-- empty logo code  -->
    <script>
      <?php if(isset($_SESSION['edit_logo_image_empty'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['edit_logo_image_empty']?>',
                })
      <?php } unset($_SESSION['edit_logo_image_empty']) ?>
    </script>
                          <!-- image size exits code  -->
    <script>
      <?php if(isset($_SESSION['edit_logo_file_big'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['edit_logo_file_big']?>',
                })
      <?php } unset($_SESSION['edit_logo_file_big']) ?>
    </script>
                              <!-- extension size exits code  -->
                              <script>
      <?php if(isset($_SESSION['edit_logo_extenion_not'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['edit_logo_extenion_not']?>',
                })
      <?php } unset($_SESSION['edit_logo_extenion_not']) ?>
    </script>
                          
       
       