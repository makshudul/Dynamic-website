<?php 
session_start();
include 'db.php';
          //  mint it when your are use foreach loop then not use $after_assoc there wish use $after_assoc
                  // this code is select banner 
  $select="SELECT * FROM banner WHERE status=1";
  $select_result=mysqli_query($bd_connect,$select);
  $after_assoc=mysqli_fetch_assoc($select_result);
                //  this code is select logo 
    $select_logo="SELECT *FROM logos WHERE status=1";
    $select_logo_result=mysqli_query($bd_connect,$select_logo);
    $after_logo_assoc=mysqli_fetch_assoc($select_logo_result);

    //  this code is about me 
    $select_about="SELECT *FROM abouts WHERE status=1";
    $select_about_result=mysqli_query($bd_connect,$select_about);
    $after_about_assoc=mysqli_fetch_assoc($select_about_result);

              // this code is skill 
    $select_skill="SELECT *FROM skills WHERE status=1";
    $select_skill_result=mysqli_query($bd_connect,$select_skill);
    
            //  this code is services 
    $select_services="SELECT *FROM services WHERE status=1";
    $select_services_result=mysqli_query($bd_connect,$select_services);   
            //  this code is experience 
    $select_experiences="SELECT *FROM experiences WHERE status=1";
    $select_experiences_result=mysqli_query($bd_connect,$select_experiences);
            //  this code is projects 
    $select_project="SELECT *FROM projects WHERE status=1";
    $select_use_project=mysqli_query($bd_connect,$select_project);
                // this code is view commments 
    $select_comments="SELECT *FROM comments WHERE status=1";
    $select_comments_result=mysqli_query($bd_connect,$select_comments);
            //  this code is view news 
    $select_news="SELECT *FROM news WHERE status=1";
    $select_news_result=mysqli_query($bd_connect,$select_news);
                      // this code is view patner code 
    $select_patner="SELECT *FROM patner WHERE status=1";
    $select_patner_result=mysqli_query($bd_connect,$select_patner);

             // this code is view social 
    $select_social="SELECT *FROM social";
    $select_social_result=mysqli_query($bd_connect,$select_social);
                 // this code is view code 
    $select_footer="SELECT *FROM footers WHERE status=1";
    $select_footer_result=mysqli_query($bd_connect,$select_footer);
    $after_footer_assoc=mysqli_fetch_assoc($select_footer_result);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Richard. - Easy Onepage Personal Template">
    <meta name="author" content="Paul">
    
    <!-- CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="/panda/dashboard_assests/lib/font-awesome/css/font-awesome.css" rel="stylesheet">

    <title>Richard. - Easy Onepage Personal Template</title>
  </head>
<body>
   
   <!-- Loader -->
   <div class="loader">
    <div class="spinner"><div class="double-bounce1"></div><div class="double-bounce2"></div></div>
   </div>
  
    <!-- Click capture -->
   <div class="click-capture d-lg-none"></div>

    <!-- Navbar -->  
    <nav id="scrollspy" class="navbar navbar-desctop">
        
      <div class="d-flex position-relative w-100">

        <!-- Brand-->
        <a class="navbar-brand" href="#">
          <img style="width: 100px; " src="uploads/logos/<?=$after_logo_assoc['logo']?>" alt="">
        </a>
          <ul class="navbar-nav-desctop mr-auto d-none d-lg-block">
            <li><a class="nav-link" href="#home">Home</a></li>
            <li><a class="nav-link" href="#about">About</a></li>
            <li><a class="nav-link" href="#experience">Experience</a></li>
            <li><a class="nav-link" href="#projects">Projects</a></li>
            <li><a class="nav-link" href="#testimonials">Testimonials</a></li>
          </ul>

        <!-- Social -->
        <ul class="social-icons mr-auto mr-lg-0 d-none d-sm-block">
        <?php foreach ($select_social_result as $social) {?>
           <li><a target="_blank" href="<?=$social['link']?>"><i class="<?=$social['icon']?>"></i></a></li>
         <?php } ?>
        </ul>

        <!-- Toggler -->
        <button class="toggler d-lg-none ml-auto">
          <span class="toggler-icon"></span>
          <span class="toggler-icon"></span>
          <span class="toggler-icon"></span>
        </button>
      </div>
    </nav>


    <!-- Navbar Mobile -->  
    <nav id="navbar-mobile" class="navbar navbar-mobile d-lg-none">
      <ion-icon class="close" name="close-outline"></ion-icon>

      <!-- Social -->
      <ul class="social-icons mr-auto mr-lg-0">
      <?php foreach ($select_social_result as $social) {?>
         <li><a target="_blank" href="<?=$social['link']?>"><i class="<?=$social['icon']?>"></i></a></li>
      <?php } ?>
      </ul>

      <ul class="navbar-nav navbar-nav-mobile">
        <li><a class="nav-link" href="#home">Home</a></li>
        <li><a class="nav-link" href="#about">About</a></li>
        <li><a class="nav-link" href="#experience">Experience</a></li>
        <li><a class="nav-link" href="#projects">Projects</a></li>
        <li><a class="nav-link" href="#testimonials">Testimonials</a></li>
       </ul>
       <div class="navbar-mobile-footer">
        <p>© 2020 Richard. All Rights Reserved.</p>
       </div>
    </nav>

    <!-- Masthead -->  
    <main id="home" class="masthead jarallax" style="background-image:url('/panda/uploads/banners/<?=$after_assoc['background_image']?>');" role="main">
      <div class="opener">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-lg-5">
              <h1><?= $after_assoc['title']?></h1>
              <p class="lead mt-4 mb-5"><?= $after_assoc['description']?></p>
              <button type="button" class="btn" data-toggle="modal" data-target="#send-request">Let's talk</button>
          </div>
          </div>
        </div>
      </div>
    </main>

    <!-- About -->
    <section id="about" class="section">
     <div class="container">
       <h2 data-aos="fade-up"><?= $after_about_assoc['title']?></h2>
       <section class="mt-4">
          <div class="row">
            <div class="col-md-6 col-lg-5 mb-5 mb-md-0" data-aos="fade-up">
              <p><?= $after_about_assoc['description']?> </p>
              <div class="experience d-flex align-items-center">
                <div class="experience-number text-parallax"><?= $after_about_assoc['years']?></div><div class="text-dark mt-3 ml-4">Years<br> of experience</div>
              </div>
            </div>
   
           

            <div class="col-md-5 offset-lg-2" data-aos="fade-in" data-aos-delay="50">
            <?php foreach ($select_skill_result as $skill) {?>
              <h6 class="mt-0"><?= $skill['skill_name']?></h6>
              <div class="progress mb-5">
                <div class="progress-bar" role="progressbar" data-aos="width" style="width: <?= $skill['percentage']?>%" aria-valuenow="<?= $skill['percentage']?>" aria-valuemin="0" aria-valuemax="100">
                </div>
              </div>
              <?php   } ?>
            </div>
          
          </div>
        </section>
      </div>
    </section>
    
    <section class="section bg-dark">
     <div class="container">
        <div class="container">
          <div class="row">
          <?php foreach ($select_services_result as $service) { ?>
            <div class="col-md-4 mb-4 mb-md-0" data-aos="fade-in">
             <i style="font-size:50px;" class="<?=$service['logo']?>"></i>
              <h6 class="text-white"><?=$service['title']?> </h6>
              <p><?= $service['description']?></p>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </section>
      
     <!-- Experience -->
     <section id="experience" class="section pb-0">
      <div class="container">
        <div class="row align-items-end">
          <div class="col-md-6" data-aos="fade-up"><h2 class="mb-3 mb-md-0">Experience</h2></div>
          <div class="col-md-5 offset-md-1 text-md-right"><h6 class="my-0 text-gray"><a download href="uploads/cv/cv.pdf">Download my cv</a></h6></div>
        </div>
        <div class="mt-5 pt-5">
          <!-- start  -->
          <div class="row-experience row justify-content-between" data-aos="fade-up">
            <?php foreach ($select_experiences_result as $experience) { ?>
            <div class="col-md-4">
              <div class="h6 my-0 text-gray"><?=$experience['years']?></div>
              <h5 class="mt-2 text-primary text-uppercase"><?=$experience['company_name']?></h5>
            </div>
            <div class="col-md-4">
              <h5 class="mb-3 mt-0 text-uppercase"><?=$experience['position']?><br><?=$experience['deparment']?></h5>
            </div>
            <div class="col-md-4">
              <p class="mb-3"><?=$experience['description']?></p>
            </div>
            <?php }?>
          </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Projects -->
    <section id="projects" class="section">
     <div class="container">
        <div class="row align-items-end">
          <div class="col-md-6" data-aos="fade-up"><h2 class="mb-3 mb-md-0">Featured projects</h2></div>
          <div class="col-md-5 offset-md-1 text-md-right"><h6 class="my-0 text-gray"><a href="#">View all projects</a></h6></div>
        </div>
        <div class="mt-5 pt-5" data-aos="fade-in">
          <div class="carousel-project owl-carousel">
            <!-- start  -->
            <?php foreach($select_use_project as $projects) {?>
           <div class="project-item">
              <a href="#project<?=$projects['id']?>" class="popup-with-zoom-anim">
                <figure class="position-relative">
                  <img alt="" class="w-100" src="/panda/uploads/projects/<?=$projects['image']?>">
                  <figcaption class="text-white">
                    <h3 class="mb-2 text-white"><?=$projects['project_type']?></h3>
                    <p><?=$projects['title']?></p>
                  </figcaption>
                </figure>
              </a>
           </div>
           <?php  }?>
           <!-- end  -->
         </div>
        </div>
      </div>
    </section>

    <!-- Project Modal Dialog 1 -->
    <?php foreach($select_use_project as $projects1) {?>
    <div id="project<?=$projects1['id']?>" class="container mfp-hide zoom-anim-dialog">
      <h2 class="mt-0"><?=$projects1['project_type']?></h2>
      <div class="mt-5 pt-2 text-dark">
        <div class="row">
          <div class="mb-5 col-md-6 col-lg-3">
            <h6 class="my-0">Clients:</h6>
            <span><?=$projects1['clients']?></span>
          </div>
          <div class="mb-5 col-md-6 col-lg-3">
            <h6 class="my-0">Completion:</h6>
            <span><?=$projects1['completion']?></span>
          </div>
          <div class="mb-5 col-md-6 col-lg-3">
            <h6 class="my-0">Project Type:</h6>
            <span><?=$projects1['title']?></span>
          </div>
          <div class="mb-5 col-md-6 col-lg-3">
            <h6 class="my-0">Authors</h6>
            <span><?=$projects1['authors']?></span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-3">
            <h6 class="my-0">Budget:</h6>
            <span>$<?=$projects1['budget']?></span>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6 class="my-0">Authors</h6>
            <span><?=$projects1['authors']?></span>
          </div>
        </div>
      </div>
      <img alt="" class="mt-5 pt-2 w-100" src="/panda/uploads/projects/<?=$projects1['image']?>">
    </div>
    <?php  }?>
 
           <!-- end  -->



    
    <!-- Testimonials -->
    <section id="testimonials" class="testimonials section">
      <div class="container">
         <div class="carousel-testimonials owl-carousel">
           <?php foreach($select_comments_result as $comments) {?>
           <div class="col-testimonial" data-aos="fade-up">
              <span class="quiote">"</span>
              <p data-aos="fade-up"><?=$comments['description']?></p>
              <p class="mt-5 text-dark" data-aos="fade-up"><strong><?=$comments['name']?></strong> - <?=$comments['position']?></p>
           </div>
           <?php } ?>
         </div>
       </div>
    </section>

     <!-- News -->
    <section id="news" class="section bg-light">
     <div class="container">
        <div class="row align-items-end">
          <div class="col-md-6" data-aos="fade-up"><h2 class="mb-3 mb-md-0">Latest news</h2></div>
          <div class="col-md-5 offset-md-1 text-md-right"><h6 class="text-gray my-0"><a href="#">View all news</a></h6></div>
        </div>
        <div class="mt-5 pt-5">
          <div class="row-news row">
          <?php foreach($select_news_result as $news) {?>
            <div class="col-news col-md-6 col-lg-4" data-aos="fade-in" data-aos-delay="0">
              <figure class="position-relative">
                <div class="position-relative">
                  <a href=""><img alt="" class="w-100 d-block" src="/panda/uploads/news/<?=$news['image']?>"></a>
                  <mark class="date"><?=$news['date']?></mark>
                </div>
                <figcaption><h5><a href=""><?=$news['title']?></a></h5><?=$news['description']?>
                </figcaption>
              </figure>
              
            </div>
            <?php }?>
         </div>
        </div>
      </div>
    </section>

    <!-- Partners -->
    <section class="section-sm">
       <div class="container">
         <div class="row-partners row">
         <?php foreach($select_patner_result as $patner) {?>
           <div class="col-partner col-md-6 col-lg-3" data-aos="fade-in">
              <img alt="" src="/panda/uploads/patners/<?=$patner['image']?>">
           </div>
           <?php }?>
         </div>
       </div>
    </section>


    <!-- Footer -->  
    <footer>
      <div class="section bg-dark py-5 pb-0">
        <div class="container">
          <div class="row">
           <div class="col-md-6 col-lg-3">
             <h6 class="text-white mb-4">Phone:</h6>
             <p class="text-white mb-4"><?=$after_footer_assoc['phone']?></p>
            </div>
            <div class="col-md-6 col-lg-3">
             <h6 class="text-white mb-4">Email:</h6>
             <p class="text-white mb-4"><?=$after_footer_assoc['email']?></p>
            </div>
            <div class="col-md-6 col-lg-3">
              <h6 class="text-white mb-4">Follow me:</h6>
              <ul class="social-icons">
              <?php foreach ($select_social_result as $social) {?>
                <li><a target="_blank" href="<?=$social['link']?>"><i class="<?=$social['icon']?>"></i></a></li>
              <?php } ?>
            </ul>
            </div>
            <div class="col-md-6 col-lg-3">
              <h6 class="text-white mb-4">Subscribe:</h6>
              <form  action="/panda/subscribes/add_subscribe.php" method="POST">
                <div class="input-group">
                  <input id="mc-email" type="email" name="email" class="form-control" placeholder="Email">
                  <div class="input-group-append">
                    <button class="btn" type="submit">Go</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-copy section-sm">
        <div class="container"><?=$after_footer_assoc['copyright']?></div>
       </div>
    </footer>
     
    <!-- Modal -->
    <div class="modal fade" id="send-request">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title mt-0">Send request</h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Leave your contacts and our managers will contact you soon.</p>
             <form action="/panda/messages/add_message.php" method="POST">
             <div class="form-group">
               <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
             <div class="form-group">
               <input type="email" name="email"  class="form-control" required="" placeholder="Email *">
             </div>
             <div class="form-group">
              <textarea rows="3" name="message"  class="form-control" placeholder="Message"></textarea>
             </div>
             <div class="form-group mb-0 text-right">
               <button type="submit" class="btn">Submit</button>
             </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- this code is sweet aleart  -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

             <!-- resgistration success code  -->
   <script>
      <?php if(isset($_SESSION['message_success'])) {?>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '<?=$_SESSION['message_success']?>',
            showConfirmButton: false,
            timer: 1500
          })
      <?php } unset($_SESSION['message_success']) ?>
    </script>
                      <!-- name empty code  -->
                      <script>
      <?php if(isset($_SESSION['message_name_empty'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['message_name_empty']?>',
                })
      <?php } unset($_SESSION['message_name_empty']) ?>
    </script>
                      <!-- email  code  -->
                      <script>
      <?php if(isset($_SESSION['message_email_empty'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['message_email_empty']?>',
                })
      <?php } unset($_SESSION['message_email_empty']) ?>
    </script>
                      <!--  message box empty code  -->
     <script>
      <?php if(isset($_SESSION['message_box_empty'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['message_box_empty']?>',
                })
      <?php } unset($_SESSION['message_box_empty']) ?>
    </script>
                       <!--  email wrong empty code  -->
    <script>
      <?php if(isset($_SESSION['message_email_wrong'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['message_email_wrong']?>',
                })
      <?php } unset($_SESSION['message_email_wrong']) ?>
    </script>

    <!-- ............................................................. this code is subscribes message >........................  -->
                        <!--  email empty code  -->
                        <script>
      <?php if(isset($_SESSION['subscribe_email_empty'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['subscribe_email_empty']?>',
                })
      <?php } unset($_SESSION['subscribe_email_empty']) ?>
    </script>
                        <!--  not vaild email empty code  -->
                        <script>
      <?php if(isset($_SESSION['subscribe_email_wrong'])) {?>
        Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?=$_SESSION['subscribe_email_wrong']?>',
                })
      <?php } unset($_SESSION['subscribe_email_wrong']) ?>
    </script>
            <!--  subscribe success code  -->
   <script>
      <?php if(isset($_SESSION['subscribes_message_success'])) {?>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '<?=$_SESSION['subscribes_message_success']?>',
            showConfirmButton: false,
            timer: 1500
          })
      <?php } unset($_SESSION['subscribes_message_success']) ?>
    </script>
                
    
<!-- Optional JavaScript -->
<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/popper.min.js" ></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
<script src="js/jarallax.min.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/interface.js"></script>
</body>
</html>