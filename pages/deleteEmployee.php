 <?php
    include('../auth/authentication.php');
    include_once("../backend/employeeController.php");
    include_once("../backend/customerController.php");
    include_once("../backend/managerController.php");

    global $role;
    global $username;
    global $user_id;
    global $barId;

    ?>

 <?php include("include/title.php"); ?>

 <?php include("include/header.php"); ?>

 <?php include("include/sidebar.php"); ?>

 <main id="main" class="main">
     <div class="pagetitle">
         <h1>Employee</h1>
         <nav>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                 <li class="breadcrumb-item">Users</li>
                 <li class="breadcrumb-item active">Delete Employee</li>
             </ol>
         </nav>
     </div><!-- End Page Title -->
     <section class="section">
         <div class="row">
             <div class="col-lg-12">

                 <div class="alert alert-danger alert-dismissible fade show">
                     <form action="../backend/deleteEmployeeController.php?id=<?php echo $_GET["id"]; ?>" method="POST">
                         <h4 class="alert-heading">Delete Employee</h4>
                         <p>Are you sure deleting this record? </p>
                         <hr>
                         <div class="text-center">
                             <button type="submit" class="btn btn-danger">Delete</button>
                             <a href="viewEmployee.php"><button type="button" class="btn btn-secondary">Cancel</button></a>

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