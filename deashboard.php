
<?php 
session_start();
if (!isset($_SESSION['User_login'])) {
  header('location:/panda/login_page.php');
}
require 'dashboard_includes/header.php';
?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Pages</a>
        <span class="breadcrumb-item active">Blank Page</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title ">
          <h1>Wel Come panda</h1>
          <p>This page still working </p>
        </div><!-- sl-page-title -->

      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
<?php 
require 'dashboard_includes/footer.php';
?>

   