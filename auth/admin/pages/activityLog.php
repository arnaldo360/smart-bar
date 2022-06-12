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
         <h1>Activity Log</h1>
         <nav>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                 <li class="breadcrumb-item active">View Activity Log</li>
             </ol>
         </nav>
     </div><!-- End Page Title -->

     <section class="pagetitle">
         <!-- Recent Sales -->
         <div class="col-12">
             <div class="card recent-sales overflow-auto">

                 <div class="card-body">
                     <h5 class="card-title">View Activity Log</h5>

                     <table class="table table-borderless datatable">
                         <thead>
                             <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">Log Type</th>
                                 <th scope="col">Log Table</th>
                                 <th scope="col">Log Date</th>
                                 <th scope="col">Status</th>
                                 <th scope="col">Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <th scope="row"><a href="#">1</a></th>
                                 <td>Insert</td>
                                 <td>Customers</td>
                                 <td>10/12/2021</td>
                                 <td><span class="badge bg-success">Approved</span></td>
                                 <td>
                                     <button type="button" class="btn btn-info"><i class="bi bi-eye"></i></button>
                                     <button type="button" class="btn btn-success"><i class="bi bi-pencil"></i></button>
                                     <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                 </td>
                             </tr>
                         </tbody>
                     </table>

                 </div>

             </div>
         </div><!-- End Recent Sales -->

     </section>

 </main><!-- End #main -->


 <?php include_once("include/footer.php"); ?>

 <?php include_once("include/bodyClosing.php"); ?>