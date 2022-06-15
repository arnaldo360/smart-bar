 <?php
    include('../auth/authentication.php');
    include_once("../backend/employeeController.php");
    include_once("../backend/customerController.php");
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
         <h1>Users</h1>
         <nav>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                 <li class="breadcrumb-item">Users</li>
                 <li class="breadcrumb-item active">View Employee</li>
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
                         Bar Employee Added succesfully!
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                 <?php endif; ?>
             <?php endif; ?>
             <div class="card recent-sales overflow-auto">

                 <div class="card-body">

                     <h5 class="card-title">View Bar Employes</h5>

                     <?php
                        require_once("../database/dbConnect.php");

                        $sql = "SELECT * FROM employee JOIN bar ON bar.barId = employee.employeeBar WHERE employee.employeeBar = $barId";

                        $results = mysqli_query($mysqli, $sql);

                        echo "<table class='table table-borderless datatable'>
                         <thead>
                             <tr>
                                 <th scope='col'>#</th>
                                 <th scope='col'>Bar Name</th>
                                 <th scope='col'>Employee Name</th>
                                 <th scope='col'>Email</th>
                                 <th scope='col'>Status</th>
                                 <th scope='col'>Action</th>
                             </tr>
                         </thead>
                         <tbody>";

                        // output data of each row
                        $count = 1;
                        while ($row = mysqli_fetch_array($results)) {
                            $employeeID = 'employeeID' . $count;
                            echo "<tr>
                                <td scope='row'>" . $count . "</td>
                                 <th>" . $row["barName"] . "</th>
                                 <td>" . $row["employeeFullName"] . "</td>
                                 <td>" . $row["employeeEmail"] . "</td>
                                 <td>";
                            if ($row["employeeStatus"] == 'ACTIVE') {
                                echo "<span class='badge rounded-pill bg-success'>Active</span>";
                            } elseif ($row["employeeStatus"] == 'DEACTIVATED') {
                                echo "<span class='badge rounded-pill bg-danger'>Deactivated</span>";
                            } else {
                                echo "<span class='badge rounded-pill bg-primary'>Pending</span>";
                            }

                            echo "</td>
                                 <td>
                                     <a href='displayBar.php?id=" . $row["employeeID"] . "'><button type='button' class='btn btn-info' id='$count'><i class='bi bi-eye'></i></button></a>
                                     <a href='editBar.php?id=" . $row["employeeID"] . "'><button type='button' class='btn btn-success' id='$count'><i class='bi bi-pencil'></i></button></a>
                                     <a href='deleteBar.php?id=" . $row["employeeID"] . "'><button type='button' class='btn btn-danger' id='modalDelete.$count.'><i class='bi bi-trash'></i></button></a>
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