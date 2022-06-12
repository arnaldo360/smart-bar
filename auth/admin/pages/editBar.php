 <?php
    include('../backend/authentication.php');
    include_once("../backend/adminController.php");

    global $username;
    global $user_id;

    ?>

 <?php include_once("../backend/editBarController.php"); ?>

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
                 <li class="breadcrumb-item active">Edit Bar</li>
             </ol>
         </nav>
     </div><!-- End Page Title -->
     <section class="section">
         <div class="row">
             <div class="col-lg-12">

                 <div class="card">
                     <div class="card-body">
                         <h5 class="card-title">Edit Bar</h5>

                         <!-- Floating Labels Form -->
                         <form class="row g-3 needs-validation" action="../backend/editBarController.php?id= <?php echo $_GET['id']; ?>" method="POST" enctype="multipart/form-data" novalidate>
                             <div class="col-md-6">
                                 <div class="form-floating">
                                     <input type="text" class="form-control" id="floatingName" placeholder="Bar Name" name="barName" required>
                                     <label for="floatingName">Bar Name</label>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-floating">
                                     <input type="text" class="form-control" id="floatingNum" placeholder="Brella Number" name="brellaNum" required>
                                     <label for="floatingNum">Brella Number</label>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="text" class="form-control" id="floatingName" placeholder="Bar Owner Fullname" name="barOwner" required>
                                     <label for="floatingName">Bar Owner</label>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="email" class="form-control" id="floatingEmail" placeholder="Bar Email" name="barEmail" required>
                                     <label for="floatingEmail">Bar Email</label>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="text" class="form-control" id="floatingMobile" placeholder="Bar Contact" name="barContact" required>
                                     <label for="floatingMobile">Bar Mobile</label>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-floating">
                                     <input type="number" class="form-control" id="floatingNum" placeholder="Number of Employees" name="num_employees" required>
                                     <label for="floatingNum">Number of Employees</label>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-floating">
                                     <input type="text" class="form-control" id="floatingAdd" placeholder="Physical Address" name="address" required>
                                     <label for="floatingAdd">Physical Address</label>
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