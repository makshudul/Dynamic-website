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
                             <h3 class="float-left">Edit Profile </h3>
                           </div>
                            </div>
                            <div class="card-body">
                              <form action="edit_profile.php" method="POST">
                             <div class="form-group">
                                <label>Password</label>
                                <input type="password"  placeholder="Password"name="password" class="form-control">
                             </div>
                             <div class="text-center">  
                               <button type="submit" class="btn btn-primary">update</button>
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
       

    <!-- Optional JavaScript -->

    <!-- this code is sweet aleart  -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

             <!-- resgistration success code  -->
   <script>
      <?php if(isset($_SESSION['update_succesful'])) {?>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '<?=$_SESSION['update_succesful']?>',
            showConfirmButton: false,
            timer: 1500
          })
      <?php } unset($_SESSION['update_succesful']) ?>
    </script>
                  