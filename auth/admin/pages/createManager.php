 <?php
    include('../backend/authentication.php');
    include_once("../backend/adminController.php");

    global $username;
    global $user_id;

    ?>
 <?php include("../backend/createManagerController.php"); ?>

 <?php include("include/title.php"); ?>

 <?php include("include/header.php"); ?>

 <?php include("include/sidebar.php"); ?>

 <main id="main" class="main">
     <div class="pagetitle">
         <h1>Users</h1>
         <nav>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                 <li class="breadcrumb-item">Users</li>
                 <li class="breadcrumb-item active">Create Manager</li>
             </ol>
         </nav>
     </div><!-- End Page Title -->
     <section class="section">
         <div class="row">
             <div class="col-lg-12">

                 <div class="card">
                     <div class="card-body">
                         <h5 class="card-title">Create Manager</h5>

                         <!-- Floating Labels Form -->
                         <form class="row g-3 needs-validation" id="createManagerForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" novalidate>
                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="text" class="form-control <?php echo (!empty($fullname_err)) ? 'is-invalid' : ''; ?>" id="fullname" placeholder="Manager Fullname" name="fullname" required>
                                     <label for="floatingName">Manager FullName</label>
                                     <span class="invalid-feedback"><?php echo $fullname_err; ?></span>
                                 </div>
                             </div>

                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="email" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" id="email" placeholder="Manager Email" name="username" required>
                                     <label for="floatingEmail">Manager Email</label>
                                     <span class="invalid-feedback"><?php echo $username_err; ?></span>
                                 </div>
                             </div>

                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="text" class="form-control <?php echo (!empty($contact_err)) ? 'is-invalid' : ''; ?>" id="contact" placeholder="Mobile Number" name="contact" required>
                                     <label for="floatingNum">Mobile Number</label>
                                     <span class="invalid-feedback"><?php echo $contact_err; ?></span>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" id="password" placeholder="Manager Password" name="password" required>
                                     <label for="floatingPass">Manager Password</label>
                                     <span class="invalid-feedback"><?php echo $password_err; ?></span>
                                 </div>
                             </div>

                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" id="confirmPassword" placeholder="Confirm Password" name="confirm_password" required>
                                     <label for="floatingConfPass">Confirm Password</label>
                                     <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                                 </div>
                             </div>

                             <div class="col-md-4">
                                 <div class="form-floating mb-3">
                                     <select class="form-select <?php echo (!empty($barId_err)) ? 'is-invalid' : ''; ?>" id="barId" aria-label="State" name="barId" required>
                                         <option selected>Select Bar</option>
                                         <?php
                                            require_once "../../../database/dbConnect.php";
                                            $result = mysqli_query($mysqli, "SELECT * FROM bar WHERE barStatus = 'PENDING'");
                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                             <option value="<?php echo $row['barId']; ?>"><?php echo $row["barName"]; ?></option>
                                         <?php
                                            }
                                            ?>
                                     </select>
                                     <span class="invalid-feedback"><?php echo $barId_err; ?></span>
                                     <label for="floatingSelect">Bar</label>
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

 <?php include_once("../backend/formValidationScript.php"); ?>
 
 <?php include_once("include/bodyClosing.php"); ?>