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
                                 <th scope='col'>Employee Name</th>
                                 <th scope='col'>Title</th>
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
                                 <td>" . $row["employeeFullName"] . "</td>
                                 <td>" . $row["employeeTitle"] . "</td>
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
                                     <a href='javascript:void(0)' id='display_user'  data-id='" . $row["employeeID"] . "'><button type='button' class='btn btn-info' id='$count'><i class='bi bi-eye'></i></button></a>
                                     <a href='editEmployee.php?id=" . $row["employeeID"] . "'><button type='button' class='btn btn-success' id='$count'><i class='bi bi-pencil'></i></button></a>
                                     <a href='deleteEmployee.php?id=" . $row["employeeID"] . "'><button type='button' class='btn btn-danger' id='$count'><i class='bi bi-trash'></i></button></a>
                                 </td>
                             </tr>";
                            $count = $count + 1;
                        }
                        echo " </tbody>
                     </table>";

                        ?>

                 </div>

                 <!-- Display Employee Modal -->
                 <div class="modal fade" id="displayEmployee" tabindex="-1">
                     <div class="modal-dialog modal-dialog-centered">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h5 class="modal-title">Employee Details</h5>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                             </div>
                             <div class="modal-body">
                                 <div class="row">

                                     <div class='tab-content pt-2'>

                                         <div class='tab-pane fade show active profile-overview' id='profile-overview'>

                                             <div class='row'>
                                                 <div class='col-lg-3 col-md-4 label'>Full Name</div>
                                                 <div class='col-lg-9 col-md-8'><span id="fullname"></span></div>
                                             </div>

                                             <div class='row'>
                                                 <div class='col-lg-3 col-md-4 label'>Title</div>
                                                 <div class='col-lg-9 col-md-8'><span id="title"></span></div>
                                             </div>

                                             <div class='row'>
                                                 <div class='col-lg-3 col-md-4 label'>Email</div>
                                                 <div class='col-lg-9 col-md-8'><span id="email"></span></div>
                                             </div>

                                             <div class='row'>
                                                 <div class='col-lg-3 col-md-4 label'>Phone</div>
                                                 <div class='col-lg-9 col-md-8'><span id="contact"></span></div>
                                             </div>

                                             <div class='row'>
                                                 <div class='col-lg-3 col-md-4 label'>Address</div>
                                                 <div class='col-lg-9 col-md-8'><span id="address"></span></div>
                                             </div>

                                             <div class='row'>
                                                 <div class='col-lg-3 col-md-4 label'>Date Of Birth</div>
                                                 <div class='col-lg-9 col-md-8'><span id="dob"></span></div>
                                             </div>

                                             <div class='row'>
                                                 <div class='col-lg-3 col-md-4 label'>Gender</div>
                                                 <div class='col-lg-9 col-md-8'><span id="gender"></span></div>
                                             </div>

                                             <div class='row'>
                                                 <div class='col-lg-3 col-md-4 label'>Status</div>
                                                 <div class='col-lg-9 col-md-8'><span id="status"></span></div>
                                             </div>

                                             <div class='row'>
                                                 <div class='col-lg-3 col-md-4 label'>Created At</div>
                                                 <div class='col-lg-9 col-md-8'><span id="createdAt"></span></div>
                                             </div>

                                         </div>
                                     </div>

                                 </div>
                                 <div class="modal-footer">
                                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                 </div>
                             </div>
                         </div>
                     </div><!-- End Display Employee Modal-->


                     <!-- Delete Employee Modal -->
                     <!-- <div class="modal fade" id="deleteEmployee" tabindex="-1">
                         <div class="modal-dialog modal-dialog-centered">
                             <div class="modal-content">
                                 <div class="modal-header">
                                     <h5 class="modal-title">Employee Delete</h5>
                                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                 </div> -->
                                 <!-- modal Body -->
                                 <!-- <div class="modal-body">

                                     <div class="alert alert-danger alert-dismissible fade show">
                                         <h4 class="alert-heading">Delete Employee</h4>
                                         <p>Are you sure deleting this record? </p>
                                         <hr>
                                         <div class="text-center">
                                             <button type="button" class="btn btn-danger">Delete</button>
                                         </div>
                                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                     </div>

                                 </div> -->
                                 <!-- Closing modal -->
                                 <!-- <div class="modal-footer">
                                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                 </div>
                             </div>
                         </div> -->
                     <!-- </div>End Delete Employee Modal -->


                 </div>
             </div><!-- End Recent Sales -->

     </section>

 </main><!-- End #main -->


 <?php include_once("include/footer.php"); ?>

 <script type="text/javascript">
     $(document).ready(function($) {
         $('body').on('click', '#display_user', function() {
             var id = $(this).data('id');

             //  alert(id);
             // ajax
             $.ajax({
                 type: "POST",
                 url: "../backend/displayEmployeeController.php",
                 data: {
                     id: id
                 },
                 dataType: 'json',
                 success: function(res) {

                     $('#displayEmployee').modal('show');
                     $('#fullname').html(res.employeeFullName);
                     $('#email').html(res.employeeEmail);
                     $('#contact').html(res.employeeContact);
                     $('#title').html(res.employeeTitle);
                     $('#address').html(res.employeePhysicalAdd);
                     $('#dob').html(res.employeeDoB);
                     $('#status').html(res.employeeStatus);
                     $('#gender').html(res.employeeGender);
                     $('#createdAt').html(res.createdAt);
                 }
             });
         });
     });
 </script>

 <!-- <script type="text/javascript">
     $(document).ready(function($) {
         $('body').on('click', '#delete_user', function() {
             //var id = $(this).data('id');
             var id = $(this).attr('data-id');

             if (confirm("Are you sure you want to delete this record?")) {
                 var id = $(this).attr('data-id'); //get the employee ID
                 alert(id);
                 // Ajax config
                 $.ajax({
                     type: "POST", //we are using GET method to get data from server side
                     url: '../backend/deleteEmployeeController.php', // get the route value
                     data: {
                         id: id
                     }, //set data
                     beforeSend: function() { //We add this before send to disable the button once we submit it so that we prevent the multiple click

                     },
                     success: function(response) { //once the request successfully process to the server side it will return result here
                         // Reload lists of employees
                         all();

                         alert(response)
                     }
                 });
             }
         });
     });
 </script> -->
<!-- 
 <script type="text/javascript">
     $(document).ready(function() {
         $('#delete_user').click(function() {
             var el = this;
             var deleteid = $(this).attr('data-id');
             var confirmalert = confirm("Are you sure?");
             if (confirmalert == true) {
                 $.ajax({
                     url: '../backend/deleteEmployeeController.php',
                     type: 'POST',
                     data: {
                         id: deleteid
                     },
                     success: function(response) {
                         if (response == 1) {
                             $(el).closest('tr').css('background', 'tomato');
                             $(el).closest('tr').fadeOut(800, function() {
                                 $(this).remove();
                             });
                         } else {
                             alert('Invalid ID.');
                         }
                     }
                 });
             }
         });
     });
 </script> -->

 <?php include_once("include/bodyClosing.php"); ?>