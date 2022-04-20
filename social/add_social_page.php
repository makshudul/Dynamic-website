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
                              <form action="add_social.php" method="POST" >
                              <div class="form-group">
                                <label class="form-lable" >Name </label>
                                <input type="text" placeholder="Enter Icon Name" name="name" class="form-control">
                             </div> 
                              <div class="form-group">
                                <label class="form-lable" >Icon </label>
                                <input type="text" placeholder="Enter Fontsome Icon" name="icon" class="form-control">
                             </div> 
                             <div class="form-group">
                                <label >Link</label>
                                <textarea type="text" placeholder="Enter Link " name="link" class="form-control"></textarea>
                             </div>
                           
                             <div class="text-center">  
                               <button type="submit" class="btn btn-primary"> Add About</button>
                            </div>
                              
                            </form>
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
                   <!-- title exits code  -->
    <script>
      <?php if(isset($_SESSION['empty_social_name'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['empty_social_name']?>',
                })
      <?php } unset($_SESSION['empty_social_name']) ?>
    </script>
                       <!-- empty_social_icon exits code  -->
                       <script>
      <?php if(isset($_SESSION['empty_social_icon'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['empty_social_icon']?>',
                })
      <?php } unset($_SESSION['empty_social_icon']) ?>
    </script>
                          <!--  Years Empty code  -->
    <script>
      <?php if(isset($_SESSION['empty_social_link'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['empty_social_link']?>',
                })
      <?php } unset($_SESSION['empty_social_link']) ?>
    </script>
       