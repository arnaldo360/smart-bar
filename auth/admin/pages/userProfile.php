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
         <h1>Profile</h1>
         <nav>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                 <li class="breadcrumb-item">Users</li>
                 <li class="breadcrumb-item active">Profile</li>
             </ol>
         </nav>
     </div><!-- End Page Title -->

     <section class="section profile">
         <div class="row">
             <div class="col-xl-4">

                 <div class="card">
                     <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                         <img src="../../../assets/img/undraw_profile_pic.png" alt="Profile" class="rounded-circle">
                         <h2><?php echo $superAdminFullName; ?></h2>
                         <h3>ADMINISTRATOR</h3>
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
                                 <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                             </li>

                             <li class="nav-item">
                                 <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                             </li>

                             <li class="nav-item">
                                 <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                             </li>

                         </ul>
                         <div class="tab-content pt-2">

                             <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                 <h5 class="card-title">Profile Details</h5>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                     <div class="col-lg-9 col-md-8"><?php echo $superAdminFullName; ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Company</div>
                                     <div class="col-lg-9 col-md-8">Tech Solution Limited</div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Job</div>
                                     <div class="col-lg-9 col-md-8">Web Designer & Developer</div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Address</div>
                                     <div class="col-lg-9 col-md-8">Akratema St, Kijitonyama</div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Phone</div>
                                     <div class="col-lg-9 col-md-8"><?php echo $superAdminContact; ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Email</div>
                                     <div class="col-lg-9 col-md-8"><?php echo $superAdminEmail; ?></div>
                                 </div>

                             </div>

                             <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                 <!-- Profile Edit Form -->
                                 <form class="row g-3 needs-validation" id="userProfileForm" action="../backend/editProfileController.php" method="POST" novalidate>

                                     <div class="row mb-3">
                                         <label for="fullname" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="fullname" type="text" class="form-control <?php echo (!empty($fullname_err)) ? 'is-invalid' : ''; ?>" id="fullName" value="<?php echo $superAdminFullName; ?>">
                                             <span class="invalid-feedback"><?php echo $fullname_err; ?></span>
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="mobile" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="mobile" type="text" class="form-control <?php echo (!empty($mobile_err)) ? 'is-invalid' : ''; ?>" id="Phone" value="<?php echo $superAdminContact; ?>">
                                             <span class="invalid-feedback"><?php echo $mobile_err; ?></span>
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="email" type="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" id="Email" value="<?php echo $superAdminEmail; ?>">
                                             <span class="invalid-feedback"><?php echo $email_err; ?></span>
                                         </div>
                                     </div>

                                     <div class="text-center">
                                         <button type="submit" class="btn btn-primary">Save Changes</button>
                                         <a href="userProfile.php"><button type="button" class="btn btn-danger">Cancel</button></a>
                                     </div>
                                 </form><!-- End Profile Edit Form -->

                             </div>

                             <div class="tab-pane fade pt-3" id="profile-change-password">
                                 <!-- Change Password Form -->
                                 <form class="row g-3 needs-validation" action="../backend/changePassController.php" method="POST" novalidate>

                                     <div class="row mb-3">
                                         <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="newpassword" type="password" class="form-control <?php echo (!empty($newpassword_err)) ? 'is-invalid' : ''; ?>" id="newPassword">
                                             <span class="invalid-feedback"><?php echo $newpassword_err; ?></span>
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="renewpassword" type="password" class="form-control <?php echo (!empty($renewpassword_err)) ? 'is-invalid' : ''; ?>" id="renewPassword">
                                             <span class="invalid-feedback"><?php echo $renewpassword_err; ?></span>
                                         </div>
                                     </div>

                                     <div class="text-center">
                                         <button type="submit" class="btn btn-primary">Change Password</button>
                                         <a href="userProfile.php"><button type="button" class="btn btn-danger">Cancel</button></a>
                                     </div>
                                 </form><!-- End Change Password Form -->

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