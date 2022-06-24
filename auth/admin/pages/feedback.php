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
         <h1>Feedback</h1>
         <nav>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                 <li class="breadcrumb-item active">View Feedback</li>
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
                         Feedback Changes succesfully!
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                 <?php endif; ?>
             <?php endif; ?>
             <div class="card recent-sales overflow-auto">

                 <div class="card-body table-responsive">

                     <h5 class="card-title">View Feedback</h5>

                     <?php
                        require_once("../../../database/dbConnect.php");

                        $sql = "SELECT * FROM feedback";

                        $results = mysqli_query($mysqli, $sql);

                        echo "<table class='table table-borderless datatable'>
                         <thead>
                             <tr>
                                 <th scope='col'>#</th>
                                 <th scope='col'>FullName</th>
                                 <th scope='col'>Email</th>
                                 <th scope='col'>Subject</th>
                                 <th scope='col'>Message</th>
                                 <th scope='col'>Status</th>
                                 <th scope='col'>Action</th>
                             </tr>
                         </thead>
                         <tbody>";

                        // output data of each row
                        $count = 1;
                        while ($row = mysqli_fetch_array($results)) {
                            $feedbackId = 'feedbackId' . $count;
                            echo "<tr>
                                <td scope='row'>" . $count . "</td>
                                 <th>" . $row["fullname"] . "</th>
                                 <td>" . $row["email"] . "</td>
                                 <td>" . $row["feedbackSubject"] . "</td>
                                 <td>" . $row["feedbackMessage"] . "</td>
                                 <td>";
                            if ($row["feedbackStatus"] == 'ATTENDED') {
                                echo "<span class='badge rounded-pill bg-success'>Attended</span>";
                            } elseif ($row["feedbackStatus"] == 'DECLINED') {
                                echo "<span class='badge rounded-pill bg-danger'>Declined</span>";
                            } else {
                                echo "<span class='badge rounded-pill bg-primary'>Pending</span>";
                            }

                            echo "</td>
                                 <td>
                                     <a href='attendedFeedback.php?id=" . $row["feedbackId"] . "'><button type='button' class='btn btn-info' id='$count'><i class='bi bi-check2'></i></button></a>
                                     <a href='declinedFeedback.php?id=" . $row["feedbackId"] . "'><button type='button' class='btn btn-danger' id='$count'><i class='bi bi-trash'></i></button></a>
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