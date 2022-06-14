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
                 <li class="breadcrumb-item active">Display Customer</li>
             </ol>
         </nav>


     </div><!-- End Page Title -->

     <section class="section profile">
         <div class="row">
             <?php

                // require once database connection file
                require_once("../../../database/dbConnect.php");

                if (isset($_GET["id"]) && !empty($_GET["id"])) {

                    // store customer id in variable
                    $customerId = $_GET["id"];

                    $sql = "SELECT * FROM customer WHERE customerID = ?";

                    if ($statement = $mysqli->prepare($sql)) {
                        // bind variable
                        $statement->bind_param("i", $param_customerId);

                        // set parameter
                        $param_customerId = $customerId;

                        if ($statement->execute()) {

                            $result = $statement->get_result();

                            if ($result->num_rows == 1) {
                                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                                $customer_row = $result->fetch_array(MYSQLI_ASSOC);

                                // Retrieve customer field values
                                $customerId                 = $customer_row['customerID'];
                                $customerFullName           = $customer_row['customerFullName'];
                                $customerEmail              = $customer_row['customerEmail'];
                                $customerContact            = $customer_row['customerContact'];
                                $customerGender             = $customer_row['customerGender'];
                                $customerStatus             = $customer_row['customerStatus'];
                                $customerPhysicalAdd        = $customer_row['customerPhysicalAdd'];
                                $createdAt                  = $customer_row['createdAt'];

                                echo "
                                <div class='col-xl-4'>

                                    <div class='card'>
                                        <div class='card-body profile-card pt-4 d-flex flex-column align-items-center'>

                                            <img src='../../../assets/img/undraw_profile_pic.png' alt='Profile' class='rounded-circle'>
                                            <h2>$customerFullName</h2>
                                            <h3>customer</h3>
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

                                            </ul>
                                            <div class='tab-content pt-2'>

                                                <div class='tab-pane fade show active profile-overview' id='profile-overview'>

                                                    <h5 class='card-title'>Profile Details</h5>

                                                    <div class='row'>
                                                        <div class='col-lg-3 col-md-4 label '>Full Name</div>
                                                        <div class='col-lg-9 col-md-8'>$customerFullName </div>
                                                    </div>

                                                    <div class='row'>
                                                        <div class='col-lg-3 col-md-4 label'>Email</div>
                                                        <div class='col-lg-9 col-md-8'>$customerEmail </div>
                                                    </div>

                                                    <div class='row'>
                                                        <div class='col-lg-3 col-md-4 label'>Phone</div>
                                                        <div class='col-lg-9 col-md-8'>$customerContact </div>
                                                    </div>

                                                    <div class='row'>
                                                        <div class='col-lg-3 col-md-4 label'>Address</div>
                                                        <div class='col-lg-9 col-md-8'>$customerPhysicalAdd</div>
                                                    </div>

                                                    <div class='row'>
                                                        <div class='col-lg-3 col-md-4 label'>Gender</div>
                                                        <div class='col-lg-9 col-md-8'>$customerGender</div>
                                                    </div>

                                                    <div class='row'>
                                                        <div class='col-lg-3 col-md-4 label'>Created At</div>
                                                        <div class='col-lg-9 col-md-8'>$createdAt</div>
                                                    </div>

                                                </div>
                                                    <a href='viewCustomer.php' style='align-items: right;'>
                                                        <div class='alert alert-danger alert-dismissible fade show' role='alert'>Close
                                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                                        </div>
                                                    </a>
                                                

                                            </div><!-- End Bordered Tabs -->

                                        </div>
                                    </div>

                                </div>
                                ";
                            } else {

                                // URL doesn't contain valid customerId parameter. Redirect to error page
                                echo "customer dont exist";
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

     </section>

 </main><!-- End #main -->


 <?php include_once("include/footer.php"); ?>

 <?php include_once("include/bodyClosing.php"); ?>