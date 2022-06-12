 <?php
    include('../auth/authentication.php');
    include("../backend/employeeController.php");
    include("../backend/customerController.php");
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
         <h1>Profile</h1>
         <nav>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                 <li class="breadcrumb-item">Users</li>
                 <li class="breadcrumb-item active">Profile</li>
             </ol>
         </nav>
     </div><!-- End Page Title -->


     <?php if ($role == 1) {

         $fullname = 'fullname';
         $email = "email";
         $contact = "contact";
         $gender = "gender";


            echo "
            <section class='section profile'>
         <div class='row'>
             <div class='col-xl-4'>
                 
                 <div class='card'>
                     <div class='card-body profile-card pt-4 d-flex flex-column align-items-center'>

                         <img src='../assets/img/undraw_profile_pic.png' alt='Profile' class='rounded-circle'>
                         <h2></h2>
                         <h3>Administrator</h3>
                         <div class='social-links mt-2'>
                             <a href='#' class='twitter'><i class='bi bi-twitter'></i></a>
                             <a href='#' class='facebook'><i class='bi bi-facebook'></i></a>
                             <a href='#' class='instagram'><i class='bi bi-instagram'></i></a>
                             <a href='#' class='linkedin'><i class='bi bi-linkedin'></i></a>
                         </div>
                     </div>
                 </div>

             </div>

             <div class='col-xl-8'>

                 <div class='card'>
                     <div class='card-body pt-3'>
                         <!-- Bordered Tabs -->
                         <ul class='nav nav-tabs nav-tabs-bordered'>

                             <li class='nav-item'>
                                 <button class='nav-link active' data-bs-toggle='tab' data-bs-target='#profile-overview'>Overview</button>
                             </li>

                             <li class='nav-item'>
                                 <button class='nav-link' data-bs-toggle='tab' data-bs-target='#profile-edit'>Edit Profile</button>
                             </li>

                             <li class='nav-item'>
                                 <button class='nav-link' data-bs-toggle='tab' data-bs-target='#profile-change-password'>Change Password</button>
                             </li>

                         </ul>
                         <div class='tab-content pt-2'>

                             <div class='tab-pane fade show active profile-overview' id='profile-overview'>
                                 <h5 class='card-title'>Profile Details</h5>

                                 <div class='row'>
                                     <div class='col-lg-3 col-md-4 label'>Fullname</div>
                                     <div class='col-lg-9 col-md-8'>
                                         " . $adminFullName . "
                                     </div>
                                 </div>

                                 <div class='row'>
                                     <div class='col-lg-3 col-md-4 label'>Phone</div>
                                     <div class='col-lg-9 col-md-8'>
                                         " . $adminMobile . "
                                            
                                     </div>
                                 </div>

                                 <div class='row'>
                                     <div class='col-lg-3 col-md-4 label'>Email</div>
                                     <div class='col-lg-9 col-md-8'>
                                     " . $adminEmail . "
                                     </div>
                                 </div>

                                 <div class='row'>
                                     <div class='col-lg-3 col-md-4 label'>Email</div>
                                     <div class='col-lg-9 col-md-8'>
                                     " . $adminGender . "
                                     </div>
                                 </div>

                                 <div class='row'>
                                     <div class='col-lg-3 col-md-4 label'>Address</div>
                                     <div class='col-lg-9 col-md-8'>
                                         " . $adminPhysicalAdd . "
                                     </div>
                                 </div>



                             </div>
            
            ";
        ?>

         <?php

            echo " 
                            <div class='tab-pane fade profile-edit pt-3' id='profile-edit'>

                                 <!-- Profile Edit Form -->
                                 <form action='' method='POST' enctype='multipart/form-data' novalidate>

                                     <div class='row mb-3'>
                                         <label for='fullName' class='col-md-4 col-lg-3 col-form-label'>Full Name</label>
                                         <div class='col-md-8 col-lg-9'>
                                             <input name='fullName' type='text' class='form-control' id='fullName' name='fullname' value=" . $adminFullName . ">
                                         </div>
                                     </div>

                                     <div class='row mb-3'>
                                         <label for='Phone' class='col-md-4 col-lg-3 col-form-label'>Phone</label>
                                         <div class='col-md-8 col-lg-9'>
                                             <input name='phone' type='text' class='form-control' id='Phone' name='contact' value=" . $adminMobile . ">
                                         </div>
                                     </div>

                                     <div class='row mb-3'>
                                         <label for='Email' class='col-md-4 col-lg-3 col-form-label'>Email</label>
                                         <div class='col-md-8 col-lg-9'>
                                             <input name='email' type='email' class='form-control' id='Email' name='email' value=" . $adminEmail . ">
                                         </div>
                                     </div>

                                     <div class='row mb-3'>
                                         <label for='Gender' class='col-md-4 col-lg-3 col-form-label'>Gender</label>
                                         <div class='col-md-8 col-lg-9'>
                                            <select class='form-select'>
                                                <option selected>" . $adminGender . "</option>
                                                <option value'Male'>Male</option>
                                                <option value'Female'>Female</option>
                                            </select>
                                        </div>
                                     </div>

                                     <div class='row mb-3'>
                                         <label for='address' class='col-md-4 col-lg-3 col-form-label'>Address</label>
                                         <div class='col-md-8 col-lg-9'>
                                             <input name='text' type='text' class='form-control' id='address' name='address' value=" . $adminPhysicalAdd . ">
                                         </div>
                                     </div>

                                     <div class='text-center'>
                                         <button type='submit' class='btn btn-primary'>Save Changes</button>
                                     </div>
                                 </form><!-- End Profile Edit Form -->

                             </div>
                                ";

            ?>

     <?php

            echo "
                                <div class='tab-pane fade pt-3' id='profile-change-password'>
                                 <!-- Change Password Form -->

                                 <form action='' method='POST' enctype='multipart/form-data' novalidate>


                                     <div class='row mb-3'>
                                         <label for='new_Password' class='col-md-4 col-lg-3 col-form-label'>New Password</label>
                                         <div class='col-md-8 col-lg-9'>
                                             <input name='new_password' type='password' class='form-control' value='' id='new_Password'>
                                             <span class='invalid-feedback'></span>
                                         </div>
                                     </div>

                                     <div class='row mb-3'>
                                         <label for='confirm_password' class='col-md-4 col-lg-3 col-form-label'>Re-enter New Password</label>
                                         <div class='col-md-8 col-lg-9'>
                                             <input name='confirm_password' type='password' class='form-control' id='comfirm_Password'>
                                             <span class='invalid-feedback'></span>
                                         </div>
                                     </div>

                                     <div class='text-center'>
                                         <button type='submit' class='btn btn-primary'>Change Password</button>
                                     </div>
                             
                                 </form><!-- End Change Password Form -->

                             </div>

                         </div><!-- End Bordered Tabs -->

                     </div>
                 </div>

             </div>
         </div>
     </section>
         
         ";
        } elseif ($role == 2) {


            echo "
            <section class='section profile'>
         <div class='row'>
             <div class='col-xl-4'>
                 
                 <div class='card'>
                     <div class='card-body profile-card pt-4 d-flex flex-column align-items-center'>

                         <img src='../assets/img/undraw_profile_pic.png' alt='Profile' class='rounded-circle'>
                         <h2></h2>
                         <h3>Employee</h3>
                         <div class='social-links mt-2'>
                             <a href='#' class='twitter'><i class='bi bi-twitter'></i></a>
                             <a href='#' class='facebook'><i class='bi bi-facebook'></i></a>
                             <a href='#' class='instagram'><i class='bi bi-instagram'></i></a>
                             <a href='#' class='linkedin'><i class='bi bi-linkedin'></i></a>
                         </div>
                     </div>
                 </div>

             </div>

             <div class='col-xl-8'>

                 <div class='card'>
                     <div class='card-body pt-3'>
                         <!-- Bordered Tabs -->
                         <ul class='nav nav-tabs nav-tabs-bordered'>

                             <li class='nav-item'>
                                 <button class='nav-link active' data-bs-toggle='tab' data-bs-target='#profile-overview'>Overview</button>
                             </li>

                             <li class='nav-item'>
                                 <button class='nav-link' data-bs-toggle='tab' data-bs-target='#profile-edit'>Edit Profile</button>
                             </li>

                             <li class='nav-item'>
                                 <button class='nav-link' data-bs-toggle='tab' data-bs-target='#profile-change-password'>Change Password</button>
                             </li>

                         </ul>
                         <div class='tab-content pt-2'>

                             <div class='tab-pane fade show active profile-overview' id='profile-overview'>
                                 <h5 class='card-title'>Profile Details</h5>

                                 <div class='row'>
                                     <div class='col-lg-3 col-md-4 label'>Fullname</div>
                                     <div class='col-lg-9 col-md-8'>
                                         " . $employeeFullName . "
                                     </div>
                                 </div>

                                 <div class='row'>
                                     <div class='col-lg-3 col-md-4 label'>Phone</div>
                                     <div class='col-lg-9 col-md-8'>
                                         " . $employeeMobile . "
                                            
                                     </div>
                                 </div>

                                 <div class='row'>
                                     <div class='col-lg-3 col-md-4 label'>Email</div>
                                     <div class='col-lg-9 col-md-8'>
                                     " . $employeeEmail . "
                                     </div>
                                 </div>

                                 <div class='row'>
                                     <div class='col-lg-3 col-md-4 label'>Gender</div>
                                     <div class='col-lg-9 col-md-8'>
                                     " . $employeeGender . "
                                     </div>
                                 </div>

                                 <div class='row'>
                                     <div class='col-lg-3 col-md-4 label'>Address</div>
                                     <div class='col-lg-9 col-md-8'>
                                         " . $employeePhysicalAdd . "
                                     </div>
                                 </div>



                             </div>
            
            ";
        ?>

         <?php

            echo " 
                            <div class='tab-pane fade profile-edit pt-3' id='profile-edit'>

                                 <!-- Profile Edit Form -->
                                 <form action='' method='POST' enctype='multipart/form-data' novalidate>

                                     <div class='row mb-3'>
                                         <label for='fullName' class='col-md-4 col-lg-3 col-form-label'>Full Name</label>
                                         <div class='col-md-8 col-lg-9'>
                                             <input name='fullName' type='text' class='form-control' id='fullName' name='fullname' value=" . $employeeFullName . ">
                                         </div>
                                     </div>

                                     <div class='row mb-3'>
                                         <label for='Phone' class='col-md-4 col-lg-3 col-form-label'>Phone</label>
                                         <div class='col-md-8 col-lg-9'>
                                             <input name='phone' type='text' class='form-control' id='Phone' name='contact' value=" . $employeeMobile . ">
                                         </div>
                                     </div>

                                     <div class='row mb-3'>
                                         <label for='Email' class='col-md-4 col-lg-3 col-form-label'>Email</label>
                                         <div class='col-md-8 col-lg-9'>
                                             <input name='email' type='email' class='form-control' id='Email' name='email' value=" . $employeeEmail . ">
                                         </div>
                                     </div>

                                     <div class='row mb-3'>
                                         <label for='Gender' class='col-md-4 col-lg-3 col-form-label'>Gender</label>
                                         <div class='col-md-8 col-lg-9'>
                                            <select class='form-select'>
                                                <option selected>" .$employeeGender . "</option>
                                                <option value'Male'>Male</option>
                                                <option value'Female'>Female</option>
                                            </select>
                                        </div>
                                     </div>

                                     <div class='row mb-3'>
                                         <label for='address' class='col-md-4 col-lg-3 col-form-label'>Address</label>
                                         <div class='col-md-8 col-lg-9'>
                                             <input name='text' type='text' class='form-control' id='address' name='address' value=" . $employeePhysicalAdd . ">
                                         </div>
                                     </div>

                                     <div class='text-center'>
                                         <button type='submit' class='btn btn-primary'>Save Changes</button>
                                     </div>
                                 </form><!-- End Profile Edit Form -->

                             </div>
                                ";

            ?>

     <?php

            echo "
                                <div class='tab-pane fade pt-3' id='profile-change-password'>
                                 <!-- Change Password Form -->

                                 <form action='../backend/changePassword.php' method='POST' enctype='multipart/form-data' novalidate>


                                     <div class='row mb-3'>
                                         <label for='new_Password' class='col-md-4 col-lg-3 col-form-label'>New Password</label>
                                         <div class='col-md-8 col-lg-9'>
                                             <input name='new_password' type='password' class='form-control' value='' id='new_Password'>
                                             <span class='invalid-feedback'></span>
                                         </div>
                                     </div>

                                     <div class='row mb-3'>
                                         <label for='confirm_password' class='col-md-4 col-lg-3 col-form-label'>Re-enter New Password</label>
                                         <div class='col-md-8 col-lg-9'>
                                             <input name='confirm_password' type='password' class='form-control' id='comfirm_Password'>
                                             <span class='invalid-feedback'></span>
                                         </div>
                                     </div>

                                     <div class='text-center'>
                                         <button type='submit' class='btn btn-primary'>Change Password</button>
                                     </div>
                             
                                 </form><!-- End Change Password Form -->

                             </div>

                         </div><!-- End Bordered Tabs -->

                     </div>
                 </div>

             </div>
         </div>
     </section>
         
         ";
        } elseif ($role == 3) {

            $fullname = "fullname";
            $email = "email";
            $contact = "contact";
            $gender = "gender";


            echo "
            <section class='section profile'>
         <div class='row'>
             <div class='col-xl-4'>
                 
                 <div class='card'>
                     <div class='card-body profile-card pt-4 d-flex flex-column align-items-center'>

                         <img src='../assets/img/undraw_profile_pic.png' alt='Profile' class='rounded-circle'>
                         <h2></h2>
                         <h3>Customer</h3>
                         <div class='social-links mt-2'>
                             <a href='#' class='twitter'><i class='bi bi-twitter'></i></a>
                             <a href='#' class='facebook'><i class='bi bi-facebook'></i></a>
                             <a href='#' class='instagram'><i class='bi bi-instagram'></i></a>
                             <a href='#' class='linkedin'><i class='bi bi-linkedin'></i></a>
                         </div>
                     </div>
                 </div>

             </div>

             <div class='col-xl-8'>

                 <div class='card'>
                     <div class='card-body pt-3'>
                         <!-- Bordered Tabs -->
                         <ul class='nav nav-tabs nav-tabs-bordered'>

                             <li class='nav-item'>
                                 <button class='nav-link active' data-bs-toggle='tab' data-bs-target='#profile-overview'>Overview</button>
                             </li>

                             <li class='nav-item'>
                                 <button class='nav-link' data-bs-toggle='tab' data-bs-target='#profile-edit'>Edit Profile</button>
                             </li>

                             <li class='nav-item'>
                                 <button class='nav-link' data-bs-toggle='tab' data-bs-target='#profile-change-password'>Change Password</button>
                             </li>

                         </ul>
                         <div class='tab-content pt-2'>

                             <div class='tab-pane fade show active profile-overview' id='profile-overview'>
                                 <h5 class='card-title'>Profile Details</h5>

                                 <div class='row'>
                                     <div class='col-lg-3 col-md-4 label'>Fullname</div>
                                     <div class='col-lg-9 col-md-8'>
                                         " . $customerFullName . "
                                     </div>
                                 </div>

                                 <div class='row'>
                                     <div class='col-lg-3 col-md-4 label'>Phone</div>
                                     <div class='col-lg-9 col-md-8'>
                                         " . $customerMobile . "
                                            
                                     </div>
                                 </div>

                                 <div class='row'>
                                     <div class='col-lg-3 col-md-4 label'>Email</div>
                                     <div class='col-lg-9 col-md-8'>
                                     " . $customerEmail . "
                                     </div>
                                 </div>

                                 <div class='row'>
                                     <div class='col-lg-3 col-md-4 label'>Email</div>
                                     <div class='col-lg-9 col-md-8'>
                                     " . $customerGender . "
                                     </div>
                                 </div>

                                 <div class='row'>
                                     <div class='col-lg-3 col-md-4 label'>Address</div>
                                     <div class='col-lg-9 col-md-8'>
                                         " . $customerPhysicalAdd . "
                                     </div>
                                 </div>



                             </div>
            
            ";
        ?>

         <?php

            echo " 
                            <div class='tab-pane fade profile-edit pt-3' id='profile-edit'>

                                 <!-- Profile Edit Form -->
                                 <form action='../auth/customer/editProfile.php' method='POST' enctype='multipart/form-data' novalidate>

                                     <div class='row mb-3'>
                                         <label for='fullName' class='col-md-4 col-lg-3 col-form-label'>Full Name</label>
                                         <div class='col-md-8 col-lg-9'>
                                             <input name='fullName' type='text' class='form-control' id='fullName' name= .$fullname . value=" . $customerFullName . ">
                                         </div>
                                     </div>

                                     <div class='row mb-3'>
                                         <label for='Phone' class='col-md-4 col-lg-3 col-form-label'>Phone</label>
                                         <div class='col-md-8 col-lg-9'>
                                             <input name='phone' type='text' class='form-control' id='Phone' name= . $contact .  value=" . $customerMobile . ">
                                         </div>
                                     </div>

                                     <div class='row mb-3'>
                                         <label for='Email' class='col-md-4 col-lg-3 col-form-label'>Email</label>
                                         <div class='col-md-8 col-lg-9'>
                                             <input name='email' type='email' class='form-control' id='Email' name=. $email . value=" . $customerEmail . ">
                                         </div>
                                     </div>

                                     <div class='row mb-3'>
                                         <label for='Gender' class='col-md-4 col-lg-3 col-form-label'>Gender</label>
                                         <div class='col-md-8 col-lg-9'>
                                            <select class='form-select' name=.$gender.>
                                                <option selected>" . $customerGender . "</option>
                                                <option value'Male'>Male</option>
                                                <option value'Female'>Female</option>
                                            </select>
                                        </div>
                                     </div>

                                     <div class='row mb-3'>
                                         <label for='address' class='col-md-4 col-lg-3 col-form-label'>Address</label>
                                         <div class='col-md-8 col-lg-9'>
                                             <input name='text' type='text' class='form-control' id='address' name='address' value=" . $customerPhysicalAdd . ">
                                         </div>
                                     </div>

                                     <div class='text-center'>
                                         <button type='submit' class='btn btn-primary'>Save Changes</button>
                                     </div>
                                 </form><!-- End Profile Edit Form -->

                             </div>
                                ";

            ?>

     <?php

            echo "
                                <div class='tab-pane fade pt-3' id='profile-change-password'>
                                 <!-- Change Password Form -->

                                 <form action='' method='POST' enctype='multipart/form-data' novalidate>


                                     <div class='row mb-3'>
                                         <label for='new_Password' class='col-md-4 col-lg-3 col-form-label'>New Password</label>
                                         <div class='col-md-8 col-lg-9'>
                                             <input name='new_password' type='password' class='form-control' value='' id='new_Password'>
                                             <span class='invalid-feedback'></span>
                                         </div>
                                     </div>

                                     <div class='row mb-3'>
                                         <label for='confirm_password' class='col-md-4 col-lg-3 col-form-label'>Re-enter New Password</label>
                                         <div class='col-md-8 col-lg-9'>
                                             <input name='confirm_password' type='password' class='form-control' id='comfirm_Password'>
                                             <span class='invalid-feedback'></span>
                                         </div>
                                     </div>

                                     <div class='text-center'>
                                         <button type='submit' class='btn btn-primary'>Change Password</button>
                                     </div>
                             
                                 </form><!-- End Change Password Form -->

                             </div>

                         </div><!-- End Bordered Tabs -->

                     </div>
                 </div>

             </div>
         </div>
     </section>
         
         ";
        }
        ?>



 </main><!-- End #main -->


 <?php include_once("include/footer.php"); ?>

 <?php include_once("include/bodyClosing.php"); ?>