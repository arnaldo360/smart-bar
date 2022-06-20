 <?php
    include('../backend/authentication.php');
    include_once("../backend/adminController.php");

    global $username;
    global $user_id;

    ?>
 <?php include_once('../backend/productDetails.php'); ?>

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
                 <li class="breadcrumb-item active">Profile</li>
             </ol>
         </nav>
     </div><!-- End Page Title -->

     <section class="section profile">
         <div class="row">
             <div class="col-xl-4">

                 <div class="card">
                     <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                         <img src="../../../assets/image/upload/<?php echo $productImage; ?>" class="ml-lg-5 order-1 order-lg-2" alt="product image">
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

                                 <h5 class="card-title">Product Details</h5>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label ">Product Name</div>
                                     <div class="col-lg-9 col-md-8"><?php echo $productName; ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Product Type</div>
                                     <div class="col-lg-9 col-md-8"><?php echo $productType; ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Product Category</div>
                                     <div class="col-lg-9 col-md-8"><?php echo $productCategory; ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Product Description</div>
                                     <div class="col-lg-9 col-md-8"><?php echo $productDescription; ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Product Price</div>
                                     <div class="col-lg-9 col-md-8"><?php echo $productPrice . "Tzs"; ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Product Quantity</div>
                                     <div class="col-lg-9 col-md-8"><?php echo $productQuantity; ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Product Volume</div>
                                     <div class="col-lg-9 col-md-8"><?php echo $productVolume . " " . $productUnit; ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Product Alcohol Percentage</div>
                                     <div class="col-lg-9 col-md-8"><?php echo $alcoholPercentage . "%"; ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Product Status</div>
                                     <div class="col-lg-9 col-md-8"><?php echo $productStatus; ?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Created At</div>
                                     <div class="col-lg-9 col-md-8"><?php echo $createdAt; ?></div>
                                 </div>

                                 <a href='viewProduct.php' style='align-items: right;'>
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