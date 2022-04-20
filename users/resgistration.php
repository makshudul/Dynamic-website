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
                             <h3 class="float-left">Registration From</h3>
                           </div>
                            
                            </div>
                            <div class="card-body">
                              <form action="register_post.php" method="POST" enctype="multipart/form-data">
                               <div class="form-group">
                                <label class="form-lable" >Name</label>
                                <input type="text" placeholder="Enter Name" name="name" class="form-control">
                             </div>
                             <div class="form-group">
                                <label >Email address</label>
                                <input type="email" placeholder="Enter email"name="email" class="form-control">
                             </div>
                             <div class="form-group">
                                <label>Password</label>
                                <input type="password"  placeholder="Password"name="password" class="form-control">
                             </div>
                             <div class="form-group">
                                <label >Profile Image</label>
                                <input type="file" name="profile_image" class="form-control">
                             </div>
                             <div class="form-group">
                                <label >Profile Image</label>
                                  <select name="role" class="form-control">
                                   <option value="">.... Select Role ......</option>
                                   <option value="1">Super Admin</option>
                                   <option value="2">Admin</option>
                                   <option value="3">Moderator</option>
                                   <option value="4">Editor</option>
                                  </select>
                             </div>
                             <div class="text-center">  
                               <button type="submit" class="btn btn-primary">Register</button>
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
      <?php if(isset($_SESSION['register_success'])) {?>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '<?=$_SESSION['register_success']?>',
            showConfirmButton: false,
            timer: 1500
          })
      <?php } unset($_SESSION['register_success']) ?>
    </script>
                   <!-- email exits code  -->
    <script>
      <?php if(isset($_SESSION['email_wrong'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['email_wrong']?>',
                })
      <?php } unset($_SESSION['email_wrong']) ?>
    </script>
                          <!-- empty name   -->
                          <script>
      <?php if(isset($_SESSION['name_empty'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['name_empty']?>',
                })
      <?php } unset($_SESSION['name_empty']) ?>
    </script>   
                           <!-- empty password -->
    <script>
      <?php if(isset($_SESSION['password_empty'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['password_empty']?>',
                })
      <?php } unset($_SESSION['password_empty']) ?>
    </script>
                           <!-- empty email   -->
   <script>
      <?php if(isset($_SESSION['email_empty'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['email_empty']?>',
                })
      <?php } unset($_SESSION['email_empty']) ?>
    </script>    
                           <!--  email  already register -->
   <script>
      <?php if(isset($_SESSION['email_already_register'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['email_already_register']?>',
                })
      <?php } unset($_SESSION['email_already_register']) ?>
    </script>      
                               <!--  image empty -->
   <script>
      <?php if(isset($_SESSION['extention_error'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['extention_error']?>',
                })
      <?php } unset($_SESSION['extention_error']) ?>
    </script>               
  