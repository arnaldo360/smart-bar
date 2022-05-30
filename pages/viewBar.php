 <?php
    include('../auth/authentication.php');
    include("../backend/adminController.php");
    include("../backend/customerController.php");

    global $role;
    global $username;
    global $user_id;

    ?>

 <?php include("include/title.php"); ?>

 <?php include("include/header.php"); ?>

 <?php include("include/sidebar.php"); ?>

 <main id="main" class="main">

     <div class="pagetitle">
         <h1>Bar</h1>
         <nav>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                 <li class="breadcrumb-item">Bar</li>
                 <li class="breadcrumb-item active">View Bar</li>
             </ol>
         </nav>
     </div><!-- End Page Title -->

     <section class="pagetitle">
         <!-- Recent Sales -->
         <div class="col-12">
             <?php if (isset($_GET["redirect"]) && !empty($_GET["redirect"])) : ?>
                 <?php if ($_GET["redirect"] == "success") : ?>
                     <div class="alert alert-info alert-dismissible fade show" role="alert">
                         <i class="bi bi-check-circle me-1"></i>
                         Bar Added succesfully!
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                 <?php endif; ?>
             <?php endif; ?>
             <div class="card recent-sales overflow-auto">

                 <div class="card-body">

                     <h5 class="card-title">View Bar</h5>

                     <?php
                        require_once("../database/dbConnect.php");

                        $sql = "SELECT * FROM bar";

                        $results = mysqli_query($mysqli, $sql);

                        echo "<table class='table table-borderless datatable'>
                         <thead>
                             <tr>
                                 <th scope='col'>#</th>
                                 <th scope='col'>Bar Name</th>
                                 <th scope='col'>BrellaNum</th>
                                 <th scope='col'>Bar Owner</th>
                                 <th scope='col'>Status</th>
                                 <th scope='col'>Action</th>
                             </tr>
                         </thead>
                         <tbody>";

                        // output data of each row
                        $count = 1;
                        while ($row = mysqli_fetch_array($results)) {
                            $barID = 'barID' . $count;
                            echo "<tr>
                                <td scope='row'>" . $count . "</td>
                                 <th>" . $row["barName"] . "</th>
                                 <td>" . $row["brellaNumber"] . "</td>
                                 <td>" . $row["barOwner"] . "</td>
                                 <td>" . $row["barStatus"] . "</td>
                                 <td>
                                     <a href='../backend/diplayBarController.php?id=". $row["barId"] ."'><button type='button' class='btn btn-info' id='$count'><i class='bi bi-eye'></i></button></a>
                                     <a href=''><button type='button' class='btn btn-success' id='$count'><i class='bi bi-pencil'></i></button></a>
                                     <a href=''><button type='button' class='btn btn-danger' id='$count'><i class='bi bi-trash'></i></button></a>
                                 </td>
                             </tr>";
                            $count = $count + 1;
                        }
                        echo " </tbody>
                     </table>";

                        ?>

                 </div>

             </div>
         </div><!-- End Recent Sales -->

     </section>

 </main><!-- End #main -->


 <!-- View Bar Details Modal -->
 <div class="modal fade" id="viewBarDetails" tabindex="-1">
     <div class="modal-dialog modal-dialog-centered modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">View Bar Details</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <!-- Floating Labels Form -->
                 <form class="row g-3 needs-validation" enctype="multipart/form-data">
                     <div class="col-md-6">
                         <div class="form-floating">
                             <input type="text" class="form-control" id="floatingName" placeholder="Bar Name" name="barName" disabled>
                             <label for="floatingName">Bar Name</label>
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="form-floating">
                             <input type="text" class="form-control" id="floatingNum" placeholder="Brella Number" name="brellaNum" disabled>
                             <label for="floatingNum">Brella Number</label>
                         </div>
                     </div>
                     <div class="col-md-4">
                         <div class="form-floating">
                             <input type="text" class="form-control" id="floatingName" placeholder="Bar Owner Fullname" name="barOwner" disabled>
                             <label for="floatingName">Bar Owner</label>
                         </div>
                     </div>
                     <div class="col-md-4">
                         <div class="form-floating">
                             <input type="email" class="form-control" id="floatingEmail" placeholder="Bar Email" name="barEmail" disabled>
                             <label for="floatingEmail">Bar Email</label>
                         </div>
                     </div>
                     <div class="col-md-4">
                         <div class="form-floating">
                             <input type="text" class="form-control" id="floatingMobile" placeholder="Bar Contact" name="barContact" disabled>
                             <label for="floatingMobile">Bar Mobile</label>
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="form-floating">
                             <input type="number" class="form-control" id="floatingNum" placeholder="Number of Employees" name="num_employees" disabled>
                             <label for="floatingNum">Number of Employees</label>
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="form-floating">
                             <input type="number" class="form-control" id="floatingBranch" placeholder="Number Of Branches" name="num_of_branches" disabled>
                             <label for="floatingBranch">Branch Number</label>
                         </div>
                     </div>
                     <div class="col-md-4">
                         <div class="form-floating mb-3">
                             <input type="number" class="form-control" id="floatingName" placeholder="Bar Region" name="region" disabled>
                             <label for="floatingRegion">Region</label>
                         </div>
                     </div>
                     <div class="col-md-4">
                         <div class="form-floating mb-3">
                             <input type="number" class="form-control" id="floatingName" value="<?php echo $barDistrict;  ?>" name="district" disabled>
                             <label for="floatingDistrict">District</label>
                         </div>
                     </div>
                     <div class="col-md-4">
                         <div class="form-floating mb-3">
                             <input type="number" class="form-control" id="floatingName" placeholder="Bar Ward" name="ward" disabled>
                             <label for="floatingWard">Ward</label>
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="form-floating">
                             <input type="text" class="form-control" id="floatingStatus" placeholder="Bar Status" name="barStatus" disabled>
                             <label for="floatingStatus">Bar Status</label>
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="form-floating">
                             <input type="text" class="form-control" id="floatingDate" placeholder="Bar Created At " name="barDate" disabled>
                             <label for="floatingDate">Bar Created At</label>
                         </div>
                     </div>
                 </form><!-- End floating Labels Form -->
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
             </div>
         </div>
     </div>
 </div><!-- End View Bar Details Modal-->

 <?php include_once("include/footer.php"); ?>

 <script>
     $(document).ready(function() {
         $('.barInfo').click(function() {
             var barID = this.value;
             alert(barID);

             $.ajax({
                 url: "../backend/createProductController.php",
                 type: "POST",
                 data: {
                     barID: barID
                 },
                 cache: false,
                 success: function(result) {
                     $("#viewBarDetails").html(result);

                     // display modal
                     $("#viewBarDetails").modal('show');
                 }
             });
         });
     });
 </script>

 <?php include_once("include/bodyClosing.php"); ?>