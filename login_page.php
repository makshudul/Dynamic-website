<?php
 session_start();
?>
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


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="/panda/dashboard_assests/css/starlight.css">
  </head>

  <body>

    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">
      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Panda <span class="tx-info tx-normal">admin</span></div>
        <div class="tx-center mg-b-60">Professional Admin Template Design</div>
        <form action="/panda/login.php" method="POST">
        <div class="form-group">
          <input type="email" name="email" class="form-control" placeholder="Enter your email">
        </div><!-- form-group -->
        <div class="form-group">
          <input type="password" name="password" class="form-control" placeholder="Enter your password">
        </div><!-- form-group -->
        <button type="submit" class="btn btn-info btn-block">Sign In</button>
        </form>
        <div class="mg-t-60 tx-center">Not yet a member? <a href="singup_page.php" class="tx-info">Sign Up</a></div>
       
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->
      <!-- this code is sweet aleart  -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
       <!-- wrong password  -->
    <script>
      <?php if(isset($_SESSION['worngpassword'])) {?>
        Swal.fire({
                 icon: 'error',
                  title: 'Oops...',
            title: '<?=$_SESSION['worngpassword']?>',
            showConfirmButton: false,
            timer: 1500
          })
      <?php } unset($_SESSION['worngpassword']) ?>
    </script>
      <!-- wrong email  -->
      <script>
      <?php if(isset($_SESSION['invlid_email'])) {?>
        Swal.fire({
                 icon: 'error',
                  title: 'Oops...',
            title: '<?=$_SESSION['invlid_email']?>',
            showConfirmButton: false,
            timer: 1500
          })
      <?php } unset($_SESSION['invlid_email']) ?>
    </script>

    <script src="/panda/dashboard_assests/lib/jquery/jquery.js"></script>
    <script src="/panda/dashboard_assests/lib/popper.js/popper.js"></script>
    <script src="/panda/dashboard_assests/lib/bootstrap/bootstrap.js"></script>

  </body>
</html>
