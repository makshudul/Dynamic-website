<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Starlight Responsive Bootstrap 4 Admin Template</title>

    <!-- vendor css -->
    <link href="/panda/dashboard_assests/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/panda/dashboard_assests/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="/panda/dashboard_assests/lib/select2/css/select2.min.css" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="/panda/dashboard_assests/css/starlight.css">
  </head>

  <body>

    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-md-100v">

      <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Panda <span class="tx-info tx-normal">admin</span></div>
        <div class="tx-center mg-b-60">Welcome Panda Sing Up Page</div>
         <form action="sing_up.php" method="POST">
        <div class="form-group">
          <input type="Email" class="form-control" name="email" placeholder="Enter your Email">
        </div><!-- form-group -->
        <div class="form-group">
          <input type="text" class="form-control" name="name" placeholder="Enter your fullname">
        </div><!-- form-group -->
        <div class="form-group">
          <input type="password" class="form-control" name="password" placeholder="Enter your password">
        </div><!-- form-group -->
        <button type="submit" class="btn btn-info btn-block">Sign Up</button>
        </form>
        <div class="mg-t-40 tx-center">Already have an account? <a href="login_page.php" class="tx-info">Sign In</a></div>
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->

    <script src="../lib/jquery/jquery.js"></script>
    <script src="../lib/popper.js/popper.js"></script>
    <script src="../lib/bootstrap/bootstrap.js"></script>
    <script src="../lib/select2/js/select2.min.js"></script>
    <script>
      $(function(){
        'use strict';

        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });
      });

    </script>
       <!-- this code is sweet aleart  -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
       <!-- name password  -->
    <script>
      <?php if(isset($_SESSION['name_singup_empty'])) {?>
        Swal.fire({
                 icon: 'error',
                  title: 'Oops...',
            title: '<?=$_SESSION['name_singup_empty']?>',
            showConfirmButton: false,
            timer: 1500
          })
      <?php } unset($_SESSION['name_singup_empty']) ?>
    </script>
      <!--  email_singup_empty empty  -->
      <script>
      <?php if(isset($_SESSION['email_singup_empty'])) {?>
        Swal.fire({
                 icon: 'error',
                  title: 'Oops...',
            title: '<?=$_SESSION['email_singup_empty']?>',
            showConfirmButton: false,
            timer: 1500
          })
      <?php } unset($_SESSION['email_singup_empty']) ?>
    </script>
       <!--  email_singup_wrong empty  -->
       <script>
      <?php if(isset($_SESSION['email_singup_wrong'])) {?>
        Swal.fire({
                 icon: 'error',
                  title: 'Oops...',
            title: '<?=$_SESSION['email_singup_wrong']?>',
            showConfirmButton: false,
            timer: 1500
          })
      <?php } unset($_SESSION['email_singup_wrong']) ?>
    </script>
       <!--  password_singup_empty empty  -->
       <script>
      <?php if(isset($_SESSION['password_singup_empty'])) {?>
        Swal.fire({
                 icon: 'error',
                  title: 'Oops...',
            title: '<?=$_SESSION['password_singup_empty']?>',
            showConfirmButton: false,
            timer: 1500
          })
      <?php } unset($_SESSION['password_singup_empty']) ?>
    </script>
       <!--  email_singup_already_register empty  -->
       <script>
      <?php if(isset($_SESSION['email_singup_already_register'])) {?>
        Swal.fire({
                 icon: 'error',
                  title: 'Oops...',
            title: '<?=$_SESSION['email_singup_already_register']?>',
            showConfirmButton: false,
            timer: 1500
          })
      <?php } unset($_SESSION['email_singup_already_register']) ?>
    </script>

  </body>
</html>
