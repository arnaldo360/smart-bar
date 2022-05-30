 <?php
    include('../auth/authentication.php');
    include("../backend/adminController.php");
    include("../backend/customerController.php");

    global $role;
    global $username;
    global $user_id;

    ?>>

 <?php include("include/title.php"); ?>

 <?php include("include/header.php"); ?>

 <?php include("include/sidebar.php"); ?>

 <main id="main" class="main">
     <div class="pagetitle">
         <h1>Department</h1>
         <nav>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                 <li class="breadcrumb-item">Department</li>
                 <li class="breadcrumb-item active">Create Department</li>
             </ol>
         </nav>
     </div><!-- End Page Title -->
     <section class="section">
         <div class="row">
             <div class="col-lg-12">

                 <div class="card">
                     <div class="card-body">
                         <h5 class="card-title">Create Department</h5>

                         <!-- Floating Labels Form -->
                         <form class="row g-3 needs-validation" novalidate>
                             <div class="col-md-12">
                                 <div class="form-floating">
                                     <input type="text" class="form-control" id="floatingName" placeholder="Department Name" required>
                                     <label for="floatingName">Department Name</label>
                                 </div>
                             </div>
                             <div class="col-12">
                                 <div class="form-floating">
                                     <textarea class="form-control" placeholder="Department Description" id="floatingTextarea" style="height: 100px;"></textarea>
                                     <label for="floatingTextarea">Description</label>
                                 </div>
                             </div>
                             <div class="text-center">
                                 <button type="submit" class="btn btn-primary">Submit</button>
                                 <button type="reset" class="btn btn-secondary">Reset</button>
                             </div>
                         </form><!-- End floating Labels Form -->

                     </div>
                 </div>

             </div>
         </div>
     </section>

 </main><!-- End #main -->


 <?php include_once("include/footer.php"); ?>

 <?php include_once("include/bodyClosing.php"); ?>