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
         <h1>Users</h1>
         <nav>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                 <li class="breadcrumb-item">Users</li>
                 <li class="breadcrumb-item active">Edit Employee Profile</li>
             </ol>
         </nav>
     </div><!-- End Page Title -->

     <?php require_once("../backend/employeeDetails.php"); ?>

     <section class="section profile">
         <div class="row">
             <div class="col-xl-4">

                 <div class="card">
                     <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                         <img src="../assets/img/undraw_profile_pic.png" alt="Profile" class="rounded-circle">
                         <h2><?php echo $employeeFullName; ?></h2>
                         <h3>EMPLOYEE</h3>
                         <h2><?php echo $employeeBar;  ?></h2>
                         <div class="social-links mt-2">
                             <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                             <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                             <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                             <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                         </div>
                     </div>
                 </div>

             </div>

             <div class="col-xl-8">

                 <div class="card">
                     <div class="card-body pt-3">

                         <?php if (isset($_GET["redirect"]) && !empty($_GET["redirect"])) : ?>
                             <?php if ($_GET["redirect"] == "success") : ?>
                                 <div class="alert alert-info alert-dismissible fade show" role="alert">
                                     <i class="bi bi-check-circle me-1"></i>
                                     Profile Update succesfully!
                                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                 </div>
                             <?php endif; ?>
                         <?php endif; ?>

                         <!-- Bordered Tabs -->
                         <ul class="nav nav-tabs nav-tabs-bordered">

                             <li class="nav-item">
                                 <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                             </li>

                         </ul>
                         <div class="tab-content pt-2">

                             <div class="tab-pane fade fade show active profile-edit pt-3" id="profile-edit">

                                 <!-- Profile Edit Form -->
                                 <form class="row g-3 needs-validation" id="editEmployeeForm" action="../backend/editEmployeeController.php?id= <?php echo $_GET['id']; ?>" method="POST" novalidate>

                                     <div class="row mb-3">
                                         <label for="fullname" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="fullname" type="text" class="form-control <?php echo (!empty($fullname_err)) ? 'is-invalid' : ''; ?>" id="fullname" value="<?php echo $employeeFullName; ?>">
                                             <span class="invalid-feedback"><?php echo $fullname_err; ?></span>
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="mobile" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="mobile" type="text" class="form-control <?php echo (!empty($mobile_err)) ? 'is-invalid' : ''; ?>" id="mobile" value="<?php echo $employeeContact; ?>">
                                             <span class="invalid-feedback"><?php echo $mobile_err; ?></span>
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="email" type="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" id="username" value="<?php echo $employeeEmail; ?>" disabled>
                                             <span class="invalid-feedback"><?php echo $email_err; ?></span>
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="Gender" class="col-md-4 col-lg-3 col-form-label">Gender</label>
                                         <div class="col-md-8 col-lg-9">
                                             <select name="gender" class="form-control <?php echo (!empty($gender_err)) ? 'is-invalid' : ''; ?>" id="gender" value="<?php echo $employeeGender; ?>">
                                                 <option selected>Select Gender</option>
                                                 <option value="Male">Male</option>
                                                 <option value="Female">Female</option>
                                             </select>
                                             <span class="invalid-feedback"><?php echo $gender_err; ?></span>
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="date" class="col-md-4 col-lg-3 col-form-label">Date Of Birth</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="dateOfBirth" type="date" class="form-control <?php echo (!empty($date_err)) ? 'is-invalid' : ''; ?>" id="dateOfBirth" value="<?php echo $employeeDoB; ?>">
                                             <span class="invalid-feedback"><?php echo $date_err; ?></span>
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="Adreess" class="col-md-4 col-lg-3 col-form-label">Adreess</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="address" type="text" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>" id="addreess" value="<?php echo $employeePhysicalAdd; ?>">
                                             <span class="invalid-feedback"><?php echo $address_err; ?></span>
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="Email" class="col-md-4 col-lg-3 col-form-label">Title</label>
                                         <div class="col-md-8 col-lg-9">
                                             <select name="title" class="form-control <?php echo (!empty($title_err)) ? 'is-invalid' : ''; ?>" id="title" value="<?php echo $employeeTitle; ?>">
                                                 <option selected>Select Title</option>
                                                 <option value="Counter">Counter</option>
                                                 <option value="Waiter">Waiter</option>
                                                 <option value="Waitress">Waitress</option>
                                             </select>
                                             <span class="invalid-feedback"><?php echo $title_err; ?></span>
                                         </div>
                                     </div>

                                     <div class="text-center">
                                         <button type="submit" name="saveChanges" class="btn btn-primary">Save Changes</button>
                                         <a href="viewEmployee.php"><button type="button" class="btn btn-danger">Cancel</button></a>
                                     </div>
                                 </form><!-- End Profile Edit Form -->

                             </div>



                         </div><!-- End Bordered Tabs -->

                     </div>
                 </div>

             </div>
         </div>
     </section>

 </main><!-- End #main -->


 <?php include_once("include/footer.php"); ?>

 <?php include_once("../backend/formValidationScript.php"); ?>

 <?php include_once("include/bodyClosing.php"); ?>