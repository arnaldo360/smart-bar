 <?php
    include('../auth/authentication.php');
    include_once("../backend/employeeController.php");
    include_once("../backend/customerController.php");

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
         <h1>Employees</h1>
         <nav>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                 <li class="breadcrumb-item">Users</li>
                 <li class="breadcrumb-item active">Create Employees</li>
             </ol>
         </nav>
     </div><!-- End Page Title -->
     <section class="section">
         <div class="row">
             <div class="col-lg-12">

                 <div class="card">
                     <div class="card-body">
                         <h5 class="card-title">Create Employees</h5>

                         <!-- Floating Labels Form -->
                         <form class="row g-3 needs-validation" novalidate>
                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="text" class="form-control" id="floatingfName" placeholder="Employee Firstname" required>
                                     <label for="floatingfName">Firstname</label>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="text" class="form-control" id="floatinglName" placeholder="Employees Lastname" required>
                                     <label for="floatinglName">Lastname</label>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="email" class="form-control" id="floatingEmail" placeholder="Employees Email" required>
                                     <label for="floatingEmail">Email address</label>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="text" class="form-control" id="floatingMobile" placeholder="Employees Contact" required>
                                     <label for="floatingMobile">Mobile</label>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="date" class="form-control" id="floatingDate" placeholder="Employees Date Of Birth" required>
                                     <label for="floatingDate">Date Of Birth</label>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-floating mb-3">
                                     <select class="form-select" id="floatingSelect" aria-label="State" required>
                                         <option selected>Select Gender</option>
                                         <option value="Male">Male</option>
                                         <option value="Female">Female</option>
                                     </select>
                                     <label for="floatingSelect">Gender</label>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="text" class="form-control" id="floatingTitle" placeholder="Employees Title" required>
                                     <label for="floatingTitle">Title</label>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-floating mb-3">
                                     <select class="form-select" id="floatingSelect" aria-label="State" required>
                                         <option selected>Select Bar</option>
                                         <option value="1">Smart</option>
                                         <option value="2">Java</option>
                                     </select>
                                     <label for="floatingSelect">Bar</label>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-floating mb-3">
                                     <select class="form-select" id="floatingSelect" aria-label="State" required>
                                         <option selected>Select Department</option>
                                         <option value="1">Sales</option>
                                         <option value="2">Finance</option>
                                     </select>
                                     <label for="floatingSelect">Department</label>
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