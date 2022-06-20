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
                 <li class="breadcrumb-item active">Edit Product Profile</li>
             </ol>
         </nav>
     </div><!-- End Page Title -->

     <?php require_once("../backend/productDetails.php"); ?>

     <section class="section profile">
         <div class="row">
             <div class="col-xl-4">

                 <div class="card">
                     <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                         <img src="../../../assets/image/upload/<?php echo $productImage;  ?>" width="200" class="ml-lg-5 order-1 order-lg-2" alt="product image">
                         <h2><?php echo $productName; ?></h2>
                         <h3>PRODUCT</h3>
                         <h2><?php echo $productBar; ?></h2>
                     </div>
                 </div>

             </div>

             <div class="col-xl-8">

                 <div class="card">
                     <div class="card-body pt-3">

                         <?php if (isset($_GET["redirect"]) && !empty($_GET["redirect"])) : ?>
                             <?php if ($_GET["redirect"] == "success") : ?>
                                 <div class="alert alert-info alert-dismissible fade show" role="alert">
                                     <i class="bi bi-check-circle me-1"></i>
                                     Product Update succesfully!
                                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                 </div>
                             <?php endif; ?>
                         <?php endif; ?>

                         <!-- Bordered Tabs -->
                         <ul class="nav nav-tabs nav-tabs-bordered">

                             <li class="nav-item">
                                 <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Product</button>
                             </li>

                         </ul>
                         <div class="tab-content pt-2">

                             <div class="tab-pane fade fade show active profile-edit pt-3" id="profile-edit">

                                 <!-- Profile Edit Form -->
                                 <form class="row g-3 needs-validation" action="../backend/editProductController.php?id= <?php echo $_GET['id']; ?>" method="POST" novalidate>

                                     <div class="row mb-3">
                                         <label for="productname" class="col-md-4 col-lg-3 col-form-label">Product Name</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="productname" type="text" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" id="productname" value="<?php echo $productName; ?>">
                                             <span class="invalid-feedback"><?php echo $name_err; ?></span>
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="description" class="col-md-4 col-lg-3 col-form-label">Product Description</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="description" type="text" class="form-control <?php echo (!empty($description_err)) ? 'is-invalid' : ''; ?>" id="description" value="<?php echo $productDescription; ?>">
                                             <span class="invalid-feedback"><?php echo $description_err; ?></span>
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="price" class="col-md-4 col-lg-3 col-form-label">Product Price</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="price" type="text" class="form-control <?php echo (!empty($price_err)) ? 'is-invalid' : ''; ?>" id="Email" value="<?php echo $productPrice; ?>">
                                             <span class="invalid-feedback"><?php echo $price_err; ?></span>
                                         </div>
                                     </div>

                                     <div class="row mb-3">
                                         <label for="quantity" class="col-md-4 col-lg-3 col-form-label">Prodcuct Quantity</label>
                                         <div class="col-md-8 col-lg-9">
                                             <input name="quantity" type="text" class="form-control <?php echo (!empty($quantity_err)) ? 'is-invalid' : ''; ?>" id="Email" value="<?php echo $productQuantity; ?>">
                                             <span class="invalid-feedback"><?php echo $quantity_err; ?></span>
                                         </div>
                                     </div>



                                     <div class="text-center">
                                         <button type="submit" name="saveChanges" class="btn btn-primary">Save Changes</button>
                                         <a href="viewproduct.php"><button type="button" class="btn btn-danger">Cancle</button></a>
                                     </div>
                                 </form><!-- End Profile Edit Form -->

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