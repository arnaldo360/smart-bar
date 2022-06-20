 <?php
    include('../backend/authentication.php');
    include_once("../backend/adminController.php");

    global $username;
    global $user_id;

    ?>

 <?php include("include/title.php"); ?>

 <?php include("include/header.php"); ?>

 <?php include("include/sidebar.php"); ?>

 <main id="main" class="main">
     <div class="pagetitle">
         <h1>Bar</h1>
         <nav>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                 <li class="breadcrumb-item">Bar</li>
                 <li class="breadcrumb-item active">Activate Bar</li>
             </ol>
         </nav>
     </div><!-- End Page Title -->
     <section class="section">
         <div class="row">
             <div class="col-lg-12">

                 <div class="alert alert-danger alert-dismissible fade show">
                     <form action="../backend/activateBarController.php?id=<?php echo $_GET["id"]; ?>" method="POST">
                         <h4 class="alert-heading">Activate Bar</h4>
                         <p>Activate this record? </p>
                         <hr>
                         <div class="text-center">
                             <button type="submit" class="btn btn-danger">Yes</button>
                             <a href="viewBar.php"><button type="button" class="btn btn-secondary">No</button></a>

                         </div>
                     </form>
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>

             </div>
         </div>
     </section>

 </main><!-- End #main -->


 <?php include_once("include/footer.php"); ?>

 <?php include_once("include/bodyClosing.php"); ?>