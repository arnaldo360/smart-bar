 <?php
    include('../auth/authentication.php');
    include("../backend/employeeController.php");
    include("../backend/customerController.php");

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
                 <?php if (isset($_GET["redirect"]) && !empty($_GET["redirect"])) : ?>
                     <?php if ($_GET["redirect"] == "success") : ?>
                         <div class="alert alert-info alert-dismissible fade show" role="alert">
                             <i class="bi bi-check-circle me-1"></i>
                             Password Changing succesfully!
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                     <?php endif; ?>
                 <?php endif; ?>

                 <div class="card">
                     <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                         <img src="../assets/img/undraw_profile_pic.png" alt="Profile" class="rounded-circle">
                         <h2><?php if ($role == 1) {
                                    echo $adminFullName;
                                } elseif ($role == 2) {
                                    echo $employeeFullName;
                                } elseif ($role == 3) {
                                    echo $customerFullName;
                                }
                                ?></h2>
                         <h3><?php
                                if ($role == 1) {
                                    echo 'Administrator';
                                } elseif ($role == 2) {
                                    echo 'Employee';
                                } elseif ($role == 3) {
                                    echo 'Customer';
                                }
                                ?></h3>
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
                                     <div class="col-lg-9 col-md-8">
                                         <?php if ($role == 1) {
                                                echo $adminFullName;
                                            } elseif ($role == 2) {
                                                echo $employeeFullName;
                                            } elseif ($role == 3) {
                                                echo $customerFullName;
                                            }
                                            ?>
                                     </div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Phone</div>
                                     <div class="col-lg-9 col-md-8">
                                         <?php if ($role == 1) {
                                                echo $adminContact;
                                            } elseif ($role == 2) {
                                                echo $employeeMobile;
                                            } elseif ($role == 3) {
                                                echo $customerMobile;
                                            }
                                            ?>
                                     </div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Email</div>
                                     <div class="col-lg-9 col-md-8">
                                         <?php if ($role == 1) {
                                                echo $adminEmail;
                                            } elseif ($role == 2) {
                                                echo $employeeEmail;
                                            } elseif ($role == 3) {
                                                echo $customerEmail;
                                            }
                                            ?>
                                     </div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Address</div>
                                     <div class="col-lg-9 col-md-8">
                                         <?php if ($role == 1) {
                                                echo "";
                                            } elseif ($role == 2) {
                                                echo $employeePhysicalAdd;
                                            } elseif ($role == 3) {
                                                echo $customerPhysicalAdd;
                                            }
                                            ?>
                                     </div>
                                 </div>



                             </div>

                             <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                 <!-- Profile Edit Form -->
                                 <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data" novalidate>

                                     <div class="row mb-3">
                                         <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="fullName" type="text" class="form-control" id="fullName" value="<?php if ($role == 1) {
                                                                                                                                echo $adminFullName;
                                                                                                                            } elseif ($role == 2) {
                                                                                                                                echo $employeeFullName;
                                                                                                                            } elseif ($role == 3) {
                                                                                                                                echo $customerFullName;
                                                                                                                            }
                                                                                                                            ?>">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="phone" type="text" class="form-control" id="Phone" value="<?php if ($role == 1) {
                                                                                                                        echo $adminContact;
                                                                                                                    } elseif ($role == 2) {
                                                                                                                        echo $employeeMobile;
                                                                                                                    } elseif ($role == 3) {
                                                                                                                        echo $customerMobile;
                                                                                                                    }
                                                                                                                    ?>">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="email" type="email" class="form-control" id="Email" value="<?php if ($role == 1) {
                                                                                                                            echo $adminEmail;
                                                                                                                        } elseif ($role == 2) {
                                                                                                                            echo $employeeEmail;
                                                                                                                        } elseif ($role == 3) {
                                                                                                                            echo $customerEmail;
                                                                                                                        }
                                                                                                                        ?>">
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="text" type="text" class="form-control" id="address" value="<?php if ($role == 1) {
                                                                                                                            echo $adminPhysicalAdd;
                                                                                                                        } elseif ($role == 2) {
                                                                                                                            echo $employeePhysicalAdd;
                                                                                                                        } elseif ($role == 3) {
                                                                                                                            echo $customerPhysicalAdd;
                                                                                                                        }
                                                                                                                        ?>">
                                         </div>
                                     </div>

                                     <div class="text-center">
                                         <button type="submit" class="btn btn-primary">Save Changes</button>
                                     </div>
                                 </form><!-- End Profile Edit Form -->

                             </div>

                             <?php require_once("../backend/changePassword.php"); ?>
                             <div class="tab-pane fade pt-3" id="profile-change-password">
                                 <!-- Change Password Form -->

                                 <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data" novalidate>


                                     <div class="row mb-3">
                                         <label for="new_Password" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="new_password" type="password" class="form-control <?php echo (!empty($new_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $new_password; ?>" id="new_Password">
                                             <span class="invalid-feedback"><?php echo $new_password_err; ?></span>
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="confirm_password" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="confirm_password" type="password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" id="comfirm_Password">
                                             <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                                         </div>
                                     </div>

                                     <div class="text-center">
                                         <button type="submit" class="btn btn-primary">Change Password</button>
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

 <?php include_once("include/bodyClosing.php"); ?>