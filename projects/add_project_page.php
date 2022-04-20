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
                             <h3 class="float-left">Add Projects</h3>
                           </div>
                            </div>
                            <div class="card-body">
                              <form action="add_project.php" method="POST" enctype="multipart/form-data">
                               <div class="form-group">
                                <label class="form-lable" > Title </label>
                                <input type="text" placeholder="Enter Title" name="title" class="form-control">
                             </div>
                             <div class="form-group">
                                <label class="form-lable" > Project type </label>
                                <input type="text" placeholder="Enter Project type" name="project_type" class="form-control">
                             </div>
                             <div class="form-group">
                                <label class="form-lable" > Clients </label>
                                <input type="text" placeholder="Enter clients" name="clients" class="form-control">
                             </div>
                             <div class="form-group">
                                <label class="form-lable" > Completion </label>
                                <input type="date" placeholder="Enter Completion" name="completion" class="form-control">
                             </div>
                             <div class="form-group">
                                <label class="form-lable" > Authors </label>
                                <input type="text" placeholder="Enter Authors " name="authors" class="form-control">
                             </div>
                             <div class="form-group">
                                <label class="form-lable" > Budget </label>
                                <input type="text" placeholder="Enter Budget" name="budget" class="form-control">
                             </div>
                             <div class="form-group">
                                <label > Background Image</label>
                                <input type="file" name="project_image" class="form-control">
                             </div>
                             <div class="text-center">  
                               <button type="submit" class="btn btn-primary"> Add Banner</button>
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
      <?php if(isset($_SESSION['empty_title'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['empty_title']?>',
                })
      <?php } unset($_SESSION['empty_title']) ?>
    </script>
                       <!-- description exits code  -->
                       <script>
      <?php if(isset($_SESSION['empty_description'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['empty_description']?>',
                })
      <?php } unset($_SESSION['empty_description']) ?>
    </script>
                          <!-- image size exits code  -->
    <script>
      <?php if(isset($_SESSION['big_image'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['big_image']?>',
                })
      <?php } unset($_SESSION['big_image']) ?>
    </script>
                              <!-- extension size exits code  -->
                              <script>
      <?php if(isset($_SESSION['extention_error'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['extention_error']?>',
                })
      <?php } unset($_SESSION['extention_error']) ?>
    </script>
                              <!-- image empty code  -->
                              <script>
      <?php if(isset($_SESSION['empty_banner_image'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['empty_banner_image']?>',
                })
      <?php } unset($_SESSION['empty_banner_image']) ?>
    </script>
       
       