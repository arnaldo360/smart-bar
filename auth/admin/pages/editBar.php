 <?php
    include('../backend/authentication.php');
    include_once("../backend/adminController.php");

    global $username;
    global $user_id;

    ?>

 <?php include_once("../backend/barDetails.php"); ?>

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
                         <form class="row g-3 needs-validation" id="editBarForm" action="../backend/editBarController.php?id= <?php echo $_GET['id']; ?>" method="POST" enctype="multipart/form-data" novalidate>
                             <div class="col-md-6">
                                 <div class="form-floating">
                                     <input type="text" class="form-control <?php echo (!empty($barName_err)) ? 'is-invalid' : ''; ?>" placeholder="Bar Name" id="barName" name="barName" value="<?php echo $barName; ?>" required>
                                     <label for="floatingName">Bar Name</label>
                                     <span class="invalid-feedback"><?php echo $barName_err; ?></span>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-floating">
                                     <input type="text" class="form-control <?php echo (!empty($brellaNum_err)) ? 'is-invalid' : ''; ?>" placeholder="Brella Number" id="brellaNum" name="brellaNum" value="<?php echo $brellaNumber; ?>" required>
                                     <label for="floatingNum">Brella Number</label>
                                     <span class="invalid-feedback"><?php echo $brellaNum_err; ?></span>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="text" class="form-control <?php echo (!empty($barOwner_err)) ? 'is-invalid' : ''; ?>" placeholder="Bar Owner Fullname" id="barOwner" name="barOwner" value="<?php echo $barOwner; ?>" required>
                                     <label for="floatingName">Bar Owner</label>
                                     <span class="invalid-feedback"><?php echo $barOwner_err; ?></span>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="email" class="form-control <?php echo (!empty($barEmail_err)) ? 'is-invalid' : ''; ?>" placeholder="Bar Email" id="barEmail" name="barEmail" value="<?php echo $barEmail; ?>" required>
                                     <label for="floatingEmail">Bar Email</label>
                                     <span class="invalid-feedback"><?php echo $barEmail_err; ?></span>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="text" class="form-control <?php echo (!empty($barContact_err)) ? 'is-invalid' : ''; ?>" placeholder="Bar Contact" id="barContact" name="barContact" value="<?php echo $barContact; ?>" required>
                                     <label for="floatingMobile">Bar Mobile</label>
                                     <span class="invalid-feedback"><?php echo $barContact_err; ?></span>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-floating">
                                     <input type="number" class="form-control <?php echo (!empty($num_employees_err)) ? 'is-invalid' : ''; ?>" placeholder="Number of Employees" id="num_employees" name="num_employees" value="<?php echo $numberOfEmployees; ?>" required>
                                     <label for="floatingNum">Number of Employees</label>
                                     <span class="invalid-feedback"><?php echo $num_employees_err; ?></span>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-floating">
                                     <input type="text" class="form-control <?php echo (!empty($barAddress_err)) ? 'is-invalid' : ''; ?>" placeholder="Physical Address" id="address" name="address" value="<?php echo $barPhysicalAdd; ?>" required>
                                     <label for="floatingAdd">Physical Address</label>
                                     <span class="invalid-feedback"><?php echo $barAddress_err; ?></span>
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