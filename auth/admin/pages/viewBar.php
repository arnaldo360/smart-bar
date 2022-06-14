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
                        require_once("../../../database/dbConnect.php");

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
                                 <td>";
                            if ($row["barStatus"] == 'ACTIVE') {
                                echo "<span class='badge rounded-pill bg-success'>Active</span>";
                            } elseif ($row["barStatus"] == 'DEACTIVATED') {
                                echo "<span class='badge rounded-pill bg-danger'>Deactivated</span>";
                            } else {
                                echo "<span class='badge rounded-pill bg-primary'>Pending</span>";
                            }

                            echo "</td>
                                 <td>
                                     <a href='displayBar.php?id=" . $row["barId"] . "'><button type='button' class='btn btn-info' id='$count'><i class='bi bi-eye'></i></button></a>
                                     <a href='editBar.php?id=" . $row["barId"] . "'><button type='button' class='btn btn-success' id='$count'><i class='bi bi-pencil'></i></button></a>
                                     <a href='deleteBar.php?id=" . $row["barId"] . "'><button type='button' class='btn btn-danger' id='modalDelete.$count.'><i class='bi bi-trash'></i></button></a>
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


 <?php include_once("include/footer.php"); ?>

 <?php include_once("include/bodyClosing.php"); ?>