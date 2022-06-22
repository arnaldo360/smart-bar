 <?php
    include('../auth/authentication.php');
    include_once("../backend/employeeController.php");
    include_once("../backend/customerController.php");
    include_once("../backend/managerController.php");

    global $role;
    global $username;
    global $userId;
    global $barId;

    ?>
 <?php include_once('../backend/orderDetails.php'); ?>

 <?php include("include/title.php"); ?>

 <?php include("include/header.php"); ?>

 <?php include("include/sidebar.php"); ?>

 <main id="main" class="main">

     <div class="pagetitle">
         <h1>Orders</h1>
         <nav>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                 <li class="breadcrumb-item">Orders</li>
                 <li class="breadcrumb-item active">Display Order</li>
             </ol>
         </nav>
     </div><!-- End Page Title -->

     <section class="section profile">
         <div class="row">
             <div class="col-xl-4">

                 <div class="card">
                     <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                         <img src="../assets/image/upload/<?php echo $productImage; ?>" width="200" class="ml-lg-5 order-1 order-lg-2" alt="product image">
                         <h3><?php echo $productBar; ?></h3>
                         <h2><?php echo $productName; ?></h2>

                     </div>
                 </div>

             </div>

             <div class="col-xl-8">

                 <div class="card">
                     <div class="card-body pt-3">

                         <!-- Bordered Tabs -->
                         <ul class="nav nav-tabs nav-tabs-bordered">

                             <li class="nav-item">
                                 <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                             </li>

                         </ul>
                         <div class="tab-content pt-2">

                             <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                 <h5 class="card-title">Order Details</h5>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label ">Product Name</div>
                                     <div class="col-lg-9 col-md-8"><?php echo $productName; ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Table Number</div>
                                     <div class="col-lg-9 col-md-8"><?php echo $tableNumber; ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Quantity</div>
                                     <div class="col-lg-9 col-md-8"><?php echo $quantity; ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Total Price</div>
                                     <div class="col-lg-9 col-md-8"><?php echo $totalPrice; ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Order Status</div>
                                     <div class="col-lg-9 col-md-8"><?php echo $orderStatus; ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Created At</div>
                                     <div class="col-lg-9 col-md-8"><?php echo $createdAt; ?></div>
                                 </div>

                                 <a href='viewOrders.php' style='align-items: right;'>
                                     <div class='alert alert-danger alert-dismissible fade show' role='alert'>Close
                                         <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                     </div>
                                 </a>

                             </div>

                         </div>

                     </div><!-- End Bordered Tabs -->

                 </div>
             </div>

         </div>
         </div>
     </section>

 </main><!-- End #main -->


 <?php include_once("include/footer.php"); ?>

 <?php include_once("include/bodyClosing.php"); ?>