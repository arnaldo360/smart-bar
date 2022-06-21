 <?php
    include('../auth/authentication.php');
    include("../backend/employeeController.php");
    include("../backend/customerController.php");
    include_once("../backend/managerController.php");

    global $role;
    global $username;
    global $userId;
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

     <?php if (isset($_GET["redirect"]) && !empty($_GET["redirect"])) : ?>
         <?php if ($_GET["redirect"] == "success") : ?>
             <div class="alert alert-info alert-dismissible fade show" role="alert">
                 <i class="bi bi-check-circle me-1"></i>
                 Profile Updated succesfully!
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
         <?php endif; ?>
     <?php endif; ?>


     <?php if ($role == 1) {

            echo "
            <section class='section profile'>
         <div class='row'>
             <div class='col-xl-4'>
                 
                 <div class='card'>
                     <div class='card-body profile-card pt-4 d-flex flex-column align-items-center'>

                         <img src='../assets/img/undraw_profile_pic.png' alt='Profile' class='rounded-circle'>
                         <h2>$managerFullName</h2>
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
                                         " . $managerFullName . "
                                     </div>
                                 </div>

                                 <div class='row'>
                                     <div class='col-lg-3 col-md-4 label'>Phone</div>
                                     <div class='col-lg-9 col-md-8'>
                                         " . $managerMobile . "
                                            
                                     </div>
                                 </div>

                                 <div class='row'>
                                     <div class='col-lg-3 col-md-4 label'>Email</div>
                                     <div class='col-lg-9 col-md-8'>
                                     " . $managerEmail . "
                                     </div>
                                 </div>

                                 <div class='row'>
                                     <div class='col-lg-3 col-md-4 label'>Gender</div>
                                     <div class='col-lg-9 col-md-8'>
                                     " . $managerGender . "
                                     </div>
                                 </div>

                                 <div class='row'>
                                     <div class='col-lg-3 col-md-4 label'>Address</div>
                                     <div class='col-lg-9 col-md-8'>
                                         " . $managerPhysicalAdd . "
                                     </div>
                                 </div>

                                 <div class='row'>
                                     <div class='col-lg-3 col-md-4 label'>Date Of Birth</div>
                                     <div class='col-lg-9 col-md-8'>
                                         " . $managerDoB . "
                                     </div>
                                 </div>

                                 <div class='row'>
                                     <div class='col-lg-3 col-md-4 label'>Status</div>
                                     <div class='col-lg-9 col-md-8'>
                                         " . $managerStatus . "
                                     </div>
                                 </div>

                                 <div class='row'>
                                     <div class='col-lg-3 col-md-4 label'>Created At</div>
                                     <div class='col-lg-9 col-md-8'>
                                         " . $createdAt . "
                                     </div>
                                 </div>

                             </div>


                            <div class='tab-pane fade profile-edit pt-3' id='profile-edit'>

                                 <!-- Profile Edit Form -->
                                 <form action='../backend/editManagerProfileController.php' method='POST' id='editUserForm' enctype='multipart/form-data' novalidate>

                                     <div class='row mb-3'>
                                         <label for='fullName' class='col-md-4 col-lg-3 col-form-label'>Full Name</label>
                                         <div class='col-md-8 col-lg-9'>
                                             <input type='text' class='form-control' id='fullName' name='fullname' value='$managerFullName'>
                                         </div>
                                     </div>

                                     <div class='row mb-3'>
                                         <label for='Phone' class='col-md-4 col-lg-3 col-form-label'>Phone</label>
                                         <div class='col-md-8 col-lg-9'>
                                             <input name='mobile' type='text' class='form-control' id='mobile' name='contact' value=" . $managerMobile . ">
                                         </div>
                                     </div>

                                     <div class='row mb-3'>
                                         <label for='Email' class='col-md-4 col-lg-3 col-form-label'>Email</label>
                                         <div class='col-md-8 col-lg-9'>
                                             <input type='email' class='form-control' id='Email' name='email' value=" . $managerEmail . ">
                                         </div>
                                     </div>

                                     <div class='row mb-3'>
                                         <label for='Gender' class='col-md-4 col-lg-3 col-form-label'>Gender</label>
                                         <div class='col-md-8 col-lg-9'>
                                            <select class='form-select' id='gender' name='gender'>
                                                <option selected>Select Gender</option>
                                                <option value'Male'>Male</option>
                                                <option value'Female'>Female</option>
                                            </select>
                                        </div>
                                     </div>

                                     <div class='row mb-3'>
                                         <label for='address' class='col-md-4 col-lg-3 col-form-label'>Address</label>
                                         <div class='col-md-8 col-lg-9'>
                                             <input type='text' class='form-control' id='address' name='address' value=" . $managerPhysicalAdd . ">
                                         </div>
                                     </div>

                                     <div class='row mb-3'>
                                         <label for='dateOfBirth' class='col-md-4 col-lg-3 col-form-label'>Date Of Birth</label>
                                         <div class='col-md-8 col-lg-9'>
                                             <input name='dateOfBirth' type='date' class='form-control' id='dateOfBirth' value=" . $managerDoB . ">
                                         </div>
                                     </div>

                                     <div class='text-center'>
                                         <button type='submit' name='saveChanges' class='btn btn-primary'>Save Changes</button>
                                         <a href='userProfile.php'><button type='button' class='btn btn-danger'>Cancel</button></a>
                                     </div>
                                 </form><!-- End Profile Edit Form -->

                             </div>
                             
                             <div class='tab-pane fade pt-3' id='profile-change-password'>
                                 <!-- Change Password Form -->

                                 <form action='../backend/changePassManagerController.php' method='POST' enctype='multipart/form-data' novalidate>


                                     <div class='row mb-3'>
                                         <label for='new_Password' class='col-md-4 col-lg-3 col-form-label'>New Password</label>
                                         <div class='col-md-8 col-lg-9'>
                                             <input name='newpassword' type='password' class='form-control' value='' id='new_Password'>
                                             <span class='invalid-feedback'></span>
                                         </div>
                                     </div>

                                     <div class='row mb-3'>
                                         <label for='confirm_password' class='col-md-4 col-lg-3 col-form-label'>Re-enter New Password</label>
                                         <div class='col-md-8 col-lg-9'>
                                             <input name='renewpassword' type='password' class='form-control' id='comfirm_Password'>
                                             <span class='invalid-feedback'></span>
                                         </div>
                                     </div>

                                     <div class='text-center'>
                                         <button type='submit' name='saveChanges' class='btn btn-primary'>Change Password</button>
                                         <a href='userProfile.php'><button type='button' class='btn btn-danger'>Cancel</button></a>
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
                         <h2>" . $employeeFullName . "</h2>
                         <h3>Employee</h3>
                         <h2>" . $employeeTitle . "</h2>
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
                                     <div class='col-lg-3 col-md-4 label'>Date Of Birth</div>
                                     <div class='col-lg-9 col-md-8'>
                                     " . $employeeDoB . "
                                     </div>
                                 </div>

                                 <div class='row'>
                                     <div class='col-lg-3 col-md-4 label'>Address</div>
                                     <div class='col-lg-9 col-md-8'>
                                         " . $employeePhysicalAdd . "
                                     </div>
                                 </div>

                                 <div class='row'>
                                     <div class='col-lg-3 col-md-4 label'>Status</div>
                                     <div class='col-lg-9 col-md-8'>
                                         " . $employeeStatus . "
                                     </div>
                                 </div>

                                 <div class='row'>
                                     <div class='col-lg-3 col-md-4 label'>Created At</div>
                                     <div class='col-lg-9 col-md-8'>
                                     " . $createdAt . "
                                     </div>
                                 </div>

                             </div>


                             <div class='tab-pane fade profile-edit pt-3' id='profile-edit'>

                                 <!-- Profile Edit Form -->
                                 <form action='../backend/editEmployeeProfileController.php' id='editUserForm' method='POST' enctype='multipart/form-data' novalidate>

                                     <div class='row mb-3'>
                                         <label for='fullName' class='col-md-4 col-lg-3 col-form-label'>Full Name</label>
                                         <div class='col-md-8 col-lg-9'>
                                             <input type='text' class='form-control' id='fullName' name='fullname' value='$employeeFullName '>
                                         </div>
                                     </div>

                                     <div class='row mb-3'>
                                         <label for='Phone' class='col-md-4 col-lg-3 col-form-label'>Phone</label>
                                         <div class='col-md-8 col-lg-9'>
                                             <input type='text' class='form-control' id='mobile' name='mobile' value='$employeeMobile '>
                                         </div>
                                     </div>

                                     <div class='row mb-3'>
                                         <label for='Email' class='col-md-4 col-lg-3 col-form-label'>Email</label>
                                         <div class='col-md-8 col-lg-9'>
                                             <input type='email' class='form-control' id='Email' name='email' value=" . $employeeEmail . ">
                                         </div>
                                     </div>

                                     <div class='row mb-3'>
                                         <label for='Gender' class='col-md-4 col-lg-3 col-form-label'>Gender</label>
                                         <div class='col-md-8 col-lg-9'>
                                            <select class='form-select' name='gender'>
                                                <option selected>" . $employeeGender . "</option>
                                                <option value'Male'>Male</option>
                                                <option value'Female'>Female</option>
                                            </select>
                                        </div>
                                     </div>

                                     <div class='row mb-3'>
                                         <label for='address' class='col-md-4 col-lg-3 col-form-label'>Date Of Birth</label>
                                         <div class='col-md-8 col-lg-9'>
                                             <input type='text' class='form-control' id='address' name='dateOfBirth' value=" . $employeeDoB . ">
                                         </div>
                                     </div>

                                     <div class='row mb-3'>
                                         <label for='address' class='col-md-4 col-lg-3 col-form-label'>Address</label>
                                         <div class='col-md-8 col-lg-9'>
                                             <input type='text' class='form-control' id='address' name='address' value=" . $employeePhysicalAdd . ">
                                         </div>
                                     </div>

                                     <div class='text-center'>
                                         <button type='submit' name='saveChanges' class='btn btn-primary'>Save Changes</button>
                                         <a href='userProfile.php'><button type='button' class='btn btn-danger'>Cancel</button></a>
                                     </div>
                                 </form><!-- End Profile Edit Form -->

                             </div>
                                
                             
                             <div class='tab-pane fade pt-3' id='profile-change-password'>
                                 <!-- Change Password Form -->

                                 <form action='../backend/changePassEmployeeController.php' method='POST' enctype='multipart/form-data' novalidate>


                                     <div class='row mb-3'>
                                         <label for='new_Password' class='col-md-4 col-lg-3 col-form-label'>New Password</label>
                                         <div class='col-md-8 col-lg-9'>
                                             <input name='newpassword' type='password' class='form-control' value='' id='new_Password'>
                                             <span class='invalid-feedback'></span>
                                         </div>
                                     </div>

                                     <div class='row mb-3'>
                                         <label for='confirm_password' class='col-md-4 col-lg-3 col-form-label'>Re-enter New Password</label>
                                         <div class='col-md-8 col-lg-9'>
                                             <input name='renewpassword' type='password' class='form-control' id='comfirm_Password'>
                                             <span class='invalid-feedback'></span>
                                         </div>
                                     </div>

                                     <div class='text-center'>
                                         <button type='submit' name='saveChanges' class='btn btn-primary'>Change Password</button>
                                         <a href='userProfile.php'><button type='button' class='btn btn-danger'>Cancel</button></a>
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

            echo "
            <section class='section profile'>
         <div class='row'>
             <div class='col-xl-4'>
                 
                 <div class='card'>
                     <div class='card-body profile-card pt-4 d-flex flex-column align-items-center'>

                         <img src='../assets/img/undraw_profile_pic.png' alt='Profile' class='rounded-circle'>
                         <h2>" . $customerFullName . "</h2>
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

                                 <div class='row'>
                                     <div class='col-lg-3 col-md-4 label'>Status</div>
                                     <div class='col-lg-9 col-md-8'>
                                         " . $customerStatus . "
                                     </div>
                                 </div>

                                 <div class='row'>
                                     <div class='col-lg-3 col-md-4 label'>Created At</div>
                                     <div class='col-lg-9 col-md-8'>
                                         " . $createdAt . "
                                     </div>
                                 </div>

                             </div>
            
            
                             <div class='tab-pane fade profile-edit pt-3' id='profile-edit'>

                                 <!-- Profile Edit Form -->
                                 <form action='../backend/editCustomerProfileController.php' id='editUserForm' method='POST' enctype='multipart/form-data' novalidate>

                                     <div class='row mb-3'>
                                         <label for='fullName' class='col-md-4 col-lg-3 col-form-label'>Full Name</label>
                                         <div class='col-md-8 col-lg-9'>
                                             <input type='text' class='form-control' id='fullName' name='fullname' value='$customerFullName'>
                                         </div>
                                     </div>

                                     <div class='row mb-3'>
                                         <label for='Phone' class='col-md-4 col-lg-3 col-form-label'>Phone</label>
                                         <div class='col-md-8 col-lg-9'>
                                             <input type='text' class='form-control' id='mobile' name= 'mobile'  value=" . $customerMobile . ">
                                         </div>
                                     </div>

                                     <div class='row mb-3'>
                                         <label for='Email' class='col-md-4 col-lg-3 col-form-label'>Email</label>
                                         <div class='col-md-8 col-lg-9'>
                                             <input type='email' class='form-control' id='Email' name='email' value=" . $customerEmail . ">
                                         </div>
                                     </div>

                                     <div class='row mb-3'>
                                         <label for='Gender' class='col-md-4 col-lg-3 col-form-label'>Gender</label>
                                         <div class='col-md-8 col-lg-9'>
                                            <select class='form-select' name='gender'>
                                                <option selected>Select Gender</option>
                                                <option value'Male'>Male</option>
                                                <option value'Female'>Female</option>
                                            </select>
                                        </div>
                                     </div>

                                     <div class='row mb-3'>
                                         <label for='address' class='col-md-4 col-lg-3 col-form-label'>Address</label>
                                         <div class='col-md-8 col-lg-9'>
                                             <input type='text' class='form-control' id='address' name='address' value=" . $customerPhysicalAdd . ">
                                         </div>
                                     </div>

                                     <div class='text-center'>
                                         <button type='submit' name='saveChanges' class='btn btn-primary'>Save Changes</button>
                                         <a href='userProfile.php'><button type='button' class='btn btn-danger'>Cancel</button></a>
                                     </div>
                                 </form><!-- End Profile Edit Form -->

                             </div>
                               
                             
                             <div class='tab-pane fade pt-3' id='profile-change-password'>
                                 <!-- Change Password Form -->

                                 <form action='../backend/changePassCustomerController.php' method='POST' enctype='multipart/form-data' novalidate>

                                     <div class='row mb-3'>
                                         <label for='new_Password' class='col-md-4 col-lg-3 col-form-label'>New Password</label>
                                         <div class='col-md-8 col-lg-9'>
                                             <input name='newpassword' type='password' class='form-control' value='' id='new_Password'>
                                             <span class='invalid-feedback'></span>
                                         </div>
                                     </div>

                                     <div class='row mb-3'>
                                         <label for='confirm_password' class='col-md-4 col-lg-3 col-form-label'>Re-enter New Password</label>
                                         <div class='col-md-8 col-lg-9'>
                                             <input name='renewpassword' type='password' class='form-control' id='comfirm_Password'>
                                             <span class='invalid-feedback'></span>
                                         </div>
                                     </div>

                                     <div class='text-center'>
                                         <button type='submit' name='saveChanges' class='btn btn-primary'>Change Password</button>
                                         <a href='userProfile.php'><button type='button' class='btn btn-danger'>Cancel</button></a>
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

 <?php include_once("../backend/formValidationScript.php"); ?>

 <?php include_once("include/bodyClosing.php"); ?>