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
         <h1>Order</h1>
         <nav>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                 <li class="breadcrumb-item">Order</li>
                 <li class="breadcrumb-item active">Create Order</li>
             </ol>
         </nav>
     </div><!-- End Page Title -->
     <section class="section">
         <div class="row">
             <div class="col-lg-12">

                 <div class="card">
                     <div class="card-body">
                         <h5 class="card-title">Create Order</h5>

                         <!-- Floating Labels Form -->
                         <form class="row g-3 needs-validation" novalidate>
                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="text" class="form-control" id="floatingName" placeholder="Bar Name" required>
                                     <label for="floatingName">Bar Name</label>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="text" class="form-control" id="floatingNum" placeholder="Brella Number" required>
                                     <label for="floatingNum">Brella Number</label>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="text" class="form-control" id="floatingName" placeholder="Bar Owner Fullname" required>
                                     <label for="floatingName">Bar Owner</label>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="email" class="form-control" id="floatingEmail" placeholder="Bar Email" required>
                                     <label for="floatingEmail">Bar Email</label>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="text" class="form-control" id="floatingMobile" placeholder="Bar Contact" required>
                                     <label for="floatingMobile">Mobile</label>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="number" class="form-control" id="floatingNum" placeholder="Number of Employees" required>
                                     <label for="floatingNum">Number of Employees</label>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="text" class="form-control" id="floatingName" placeholder="Your Name" required>
                                     <label for="floatingName">Your Name</label>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="text" class="form-control" id="floatingName" placeholder="Your Name" required>
                                     <label for="floatingName">Your Name</label>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="text" class="form-control" id="floatingName" placeholder="Your Name" required>
                                     <label for="floatingName">Your Name</label>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-floating mb-3">
                                     <select class="form-select" id="floatingSelect" aria-label="State" required>
                                         <option selected>Select Region</option>
                                         <option value="1">Arusha</option>
                                         <option value="2">Dar</option>
                                     </select>
                                     <label for="floatingSelect">Region</label>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-floating mb-3">
                                     <select class="form-select" id="floatingSelect" aria-label="State" required>
                                         <option selected>Select District</option>
                                         <option value="1">Oregon</option>
                                         <option value="2">DC</option>
                                     </select>
                                     <label for="floatingSelect">District</label>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-floating mb-3">
                                     <select class="form-select" id="floatingSelect" aria-label="State" required>
                                         <option selected>Select Ward</option>
                                         <option value="1">Oregon</option>
                                         <option value="2">DC</option>
                                     </select>
                                     <label for="floatingSelect">Ward</label>
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