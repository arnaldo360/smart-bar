 <?php
    include('../auth/authentication.php');
    include_once("../backend/employeeController.php");
    include_once("../backend/customerController.php");

    global $role;
    global $username;
    global $user_id;
    global $barId;

    ?>
 <?php require_once("../backend/createBarController.php"); ?>

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
                 <li class="breadcrumb-item active">Create Bar</li>
             </ol>
         </nav>
     </div><!-- End Page Title -->
     <section class="section">
         <div class="row">
             <div class="col-lg-12">

                 <div class="card">
                     <div class="card-body">
                         <h5 class="card-title">Create Bar</h5>

                         <!-- Floating Labels Form -->
                         <form class="row g-3 needs-validation" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data" novalidate>
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
                                     <input type="number" class="form-control" id="floatingName" placeholder="Branch Number" name="num_of_branches" required>
                                     <label for="floatingName">Branch Number</label>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-floating mb-3">
                                     <select class="form-select" id="region-dropdown" name="barRegion" required>
                                         <option selected>Select Region</option>
                                         <?php
                                            require_once "../database/dbConnect.php";
                                            $result = mysqli_query($mysqli, "call displayRegion()");
                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                             <option value="<?php echo $row['regionId']; ?>"><?php echo $row["regionName"]; ?></option>
                                         <?php
                                            }
                                            ?>
                                     </select>
                                     <label for="floatingSelect">Region</label>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-floating mb-3">
                                     <select class="form-select" id="district-dropdown" name="barDistrict" required>
                                         <option selected>Select District</option>
                                     </select>
                                     <label for="floatingSelect">District</label>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-floating mb-3">
                                     <select class="form-select" id="ward-dropdown" name="barWard" required>
                                         <option selected>Select Ward</option>
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

 <script type="text/javascript">
     $(document).ready(function() {

         $('#region-dropdown').on('change', function() {
             var region_id = this.value;

             $.ajax({
                 url: "../backend/retriveTanzania.php",
                 type: "POST",
                 data: {
                     region_id: region_id
                 },
                 cache: false,
                 success: function(result) {
                     $("#district-dropdown").html(result);
                 }
             });
         });
     });

     $(document).ready(function() {
         $('#district-dropdown').on('change', function() {
             var district_id = this.value;

             $.ajax({
                 url: "../backend/retriveTanzania.php",
                 type: "POST",
                 data: {
                     district_id: district_id
                 },
                 cache: false,
                 success: function(result) {
                     $("#ward-dropdown").html(result);
                 }
             });
         });
     });
 </script>

 <?php include_once("include/bodyClosing.php"); ?>