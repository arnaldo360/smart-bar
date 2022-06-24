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
         <h1>Users</h1>
         <nav>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                 <li class="breadcrumb-item">Users</li>
                 <li class="breadcrumb-item active">View Manager</li>
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
                         Bar Manager Added succesfully!
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                 <?php endif; ?>
             <?php endif; ?>
             <div class="card recent-sales overflow-auto">

                 <div class="card-body table-responsive">

                     <h5 class="card-title">View Bar Managers</h5>

                     <?php
                        require_once("../../../database/dbConnect.php");

                        $sql = "SELECT * FROM manager JOIN bar ON bar.barId = manager.managerBar";

                        $results = mysqli_query($mysqli, $sql);

                        echo "<table class='table table-borderless datatable'>
                         <thead>
                             <tr>
                                 <th scope='col'>#</th>
                                 <th scope='col'>Bar Name</th>
                                 <th scope='col'>Manager Name</th>
                                 <th scope='col'>Email</th>
                                 <th scope='col'>Status</th>
                                 <th scope='col'>Action</th>
                             </tr>
                         </thead>
                         <tbody>";

                        // output data of each row
                        $count = 1;
                        while ($row = mysqli_fetch_array($results)) {
                            $managerId = 'managerId' . $count;
                            echo "<tr>
                                <td scope='row'>" . $count . "</td>
                                 <th>" . $row["barName"] . "</th>
                                 <td>" . $row["managerFullName"] . "</td>
                                 <td>" . $row["managerEmail"] . "</td>
                                 <td>";
                            if ($row["managerStatus"] == 'ACTIVE') {
                                echo "<span class='badge rounded-pill bg-success'>Active</span>";
                            } elseif ($row["managerStatus"] == 'DEACTIVATED') {
                                echo "<span class='badge rounded-pill bg-danger'>Deactivated</span>";
                            } else {
                                echo "<span class='badge rounded-pill bg-primary'>Pending</span>";
                            }

                            echo "</td>
                                 <td>
                                     <a href='displayManager.php?id=" . $row["managerId"] . "'><button type='button' class='btn btn-info' id='$count'><i class='bi bi-eye'></i></button></a>
                                     <a href='editManager.php?id=" . $row["managerId"] . "'><button type='button' class='btn btn-success' id='$count'><i class='bi bi-pencil'></i></button></a>
                                     <a href='deleteManager.php?id=" . $row["managerId"] . "'><button type='button' class='btn btn-danger' id='modalDelete.$count.'><i class='bi bi-trash'></i></button></a>
                                     <a href='activateManager.php?id=" . $row["managerId"] . "'><button type='button' class='btn btn-primary' id='modalActivate.$count.'><i class='bi bi-unlock'></i></button></a>
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