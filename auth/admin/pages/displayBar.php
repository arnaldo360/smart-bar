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
         <h1>Bar</h1>
         <nav>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                 <li class="breadcrumb-item">Bar</li>
                 <li class="breadcrumb-item active">Display Bar</li>
             </ol>
         </nav>
     </div><!-- End Page Title -->
     <section class="section">
         <div class="row">
             <div class="col-lg-12">

                 <div class="card">
                     <div class="card-body">
                         <h5 class="card-title">Display Bar</h5>

                         <?php
                            // require once database connection file
                            require_once("../../../database/dbConnect.php");

                            if (isset($_GET["id"]) && !empty($_GET["id"])) {

                                // store bar id in variable
                                $barId = $_GET["id"];

                                $sql = "SELECT * FROM bar WHERE barId = ?";

                                if ($statement = $mysqli->prepare($sql)) {
                                    // bind variable
                                    $statement->bind_param("i", $param_barId);

                                    // set parameter
                                    $param_barId = $barId;

                                    if ($statement->execute()) {

                                        $result = $statement->get_result();

                                        if ($result->num_rows == 1) {
                                            /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                                            $bar_row = $result->fetch_array(MYSQLI_ASSOC);

                                            // Retrieve bar field values
                                            $barID                = $bar_row['barId'];
                                            $brellaNumber         = $bar_row['brellaNumber'];
                                            $barName              = $bar_row['barName'];
                                            $barOwner             = $bar_row['barOwner'];
                                            $barContact           = $bar_row['barContact'];
                                            $barEmail             = $bar_row['barEmail'];
                                            $numberOfEmployees    = $bar_row['numberOfEmployees'];
                                            $barPhysicalAdd       = $bar_row['barPhysicalAddress'];
                                            $barStatus            = $bar_row['barStatus'];
                                            $createdAt            = $bar_row['createAt'];

                                            echo "
                                            
                        <!-- Floating Labels Form -->
                         <form class='row g-3 needs-validation' enctype='multipart/form-data'>
                             <div class='col-md-6'>
                                 <div class='form-floating'>
                                     <input type='text' class='form-control' id='floatingName' placeholder='Bar Name' value= '$barName' disabled>
                                     <label for='floatingName'>Bar Name</label>
                                 </div>
                             </div>
                             <div class='col-md-6'>
                                 <div class='form-floating'>
                                     <input type='text' class='form-control' id='floatingNum' placeholder='Brella Number' value='$brellaNumber' disabled>
                                     <label for='floatingNum'>Brella Number</label>
                                 </div>
                             </div>
                             <div class='col-md-4'>
                                 <div class='form-floating'>
                                     <input type='text' class='form-control' id='floatingName' placeholder='Bar Owner Fullname' value=' $barOwner ' disabled>
                                     <label for='floatingName'>Bar Owner Fullname</label>
                                 </div>
                             </div>
                             <div class='col-md-4'>
                                 <div class='form-floating'>
                                     <input type='email' class='form-control' id='floatingEmail' placeholder='Bar Email' value= '$barEmail' disabled>
                                     <label for='floatingEmail'>Bar Email</label>
                                 </div>
                             </div>
                             <div class='col-md-4'>
                                 <div class='form-floating'>
                                     <input type='text' class='form-control' id='floatingMobile' placeholder='Bar Contact' value=' $barContact' disabled>
                                     <label for='floatingMobile'>Bar Contact</label>
                                 </div>
                             </div>
                             <div class='col-md-6'>
                                 <div class='form-floating'>
                                     <input type='text' class='form-control' id='floatingNum' placeholder='Number of Employees' value=' $numberOfEmployees' disabled>
                                     <label for='floatingNum'>Number of Employees</label>
                                 </div>
                             </div>
                             <div class='col-md-6'>
                                 <div class='form-floating'>
                                     <input type='text' class='form-control' id='floatingName' placeholder='Bar Physical Address' value='$barPhysicalAdd' disabled>
                                     <label for='floatingName'>Bar Physical Address</label>
                                 </div>
                             </div>
                             <div class='col-md-6'>
                                 <div class='form-floating mb-3'>
                                     <input type='text' class='form-control' id='floatingReg' value=' $barStatus' disabled>
                                     <label for='floatingReg'>Bar Status</label>
                                 </div>
                             </div>
                             <div class='col-md-6'>
                                 <div class='form-floating mb-3'>
                                     <input type='text' class='form-control' id='floatingReg' value=' $createdAt' disabled>
                                     <label for='floatingReg'>Bar Created Date</label>
                                 </div>
                             </div>
                         </form><!-- End floating Labels Form -->
                                            ";


                                        } else {
                                            // URL doesn't contain valid barId parameter. Redirect to error page
                                            echo "bar dont exist";
                                            exit();
                                        }
                                    } else {
                                        echo "Failed to execute";
                                    }

                                    // close statement
                                    $statement->close();
                                } else {
                                    echo "Failed to prepare";
                                }
                            }

                            ?>

                         

                     </div>
                 </div>

             </div>
         </div>
     </section>

 </main><!-- End #main -->


 <?php include_once("include/footer.php"); ?>

 <?php include_once("include/bodyClosing.php"); ?>