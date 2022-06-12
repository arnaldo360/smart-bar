 <?php
    include('../backend/authentication.php');
    include_once("../backend/adminController.php");

    global $username;
    global $user_id;

    ?>
 <?php include("../backend/createProductController.php"); ?>

 <?php include("include/title.php"); ?>

 <?php include("include/header.php"); ?>

 <?php include("include/sidebar.php"); ?>

 <main id="main" class="main">
     <div class="pagetitle">
         <h1>Products</h1>
         <nav>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                 <li class="breadcrumb-item">Products</li>
                 <li class="breadcrumb-item active">Create Product</li>
             </ol>
         </nav>
     </div><!-- End Page Title -->
     <section class="section">
         <div class="row">
             <div class="col-lg-12">

                 <div class="card">
                     <div class="card-body">
                         <h5 class="card-title">Create Product</h5>

                         <!-- Floating Labels Form -->
                         <form class="row g-3 needs-validation" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" novalidate>
                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="text" class="form-control <?php echo (!empty($productname_err)) ? 'is-invalid' : ''; ?>" name="productname" id="floatingName" placeholder="Product Name" required>
                                     <label for="floatingName">Product Name</label>
                                     <span class="invalid-feedback"><?php echo $productname_err; ?></span>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <select class="form-select <?php echo (!empty($type_err)) ? 'is-invalid' : ''; ?>" name="type" id="floatingSelect" aria-label="State">
                                         <option selected>Select Type</option>
                                         <option value="1">Beer</option>
                                         <option value="2">Wine</option>
                                         <option value="2">Whisky</option>
                                         <option value="2">Soft Drinks</option>
                                     </select>
                                     <label for="floatingSelect">Product Type</label>
                                     <span class="invalid-feedback"><?php echo $type_err; ?></span>
                                 </div>
                             </div>

                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <select class="form-select <?php echo (!empty($category_err)) ? 'is-invalid' : ''; ?>" name="category" id="floatingSelect" aria-label="State">
                                         <option selected>Select Category</option>
                                         <option value="1">Local Beer</option>
                                         <option value="2">Imported Beer</option>
                                         <option value="2">White Wine</option>
                                         <option value="2">Red Wine</option>
                                     </select>
                                     <label for="floatingSelect">Product Category</label>
                                     <span class="invalid-feedback"><?php echo $category_err; ?></span>
                                 </div>
                             </div>

                             <div class="col-md-4">
                                 <div class="form-floating mb-3">
                                     <select class="form-select <?php echo (!empty($class_err)) ? 'is-invalid' : ''; ?>" name="class" id="floatingSelect" aria-label="State" required>
                                         <option selected>Select Class</option>
                                         <option value="1">Buga</option>
                                         <option value="2">Kwalaah</option>
                                     </select>
                                     <label for="floatingSelect">Product Class</label>
                                     <span class="invalid-feedback"><?php echo $class_err; ?></span>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="number" class="form-control <?php echo (!empty($quantity_err)) ? 'is-invalid' : ''; ?>" name="quantity" id="floatingName" placeholder="Quanity" required>
                                     <label for="floatingName">Quanity</label>
                                     <span class="invalid-feedback"><?php echo $quantity_err; ?></span>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="text" class="form-control <?php echo (!empty($price_err)) ? 'is-invalid' : ''; ?>" name="price" id="floatingName" placeholder="Price" required>
                                     <label for="floatingName">Price</label>
                                     <span class="invalid-feedback"><?php echo $price_err; ?></span>
                                 </div>
                             </div>


                             <div class="col-6">
                                 <div class="form-floating">
                                     <textarea class="form-control <?php echo (!empty($description_err)) ? 'is-invalid' : ''; ?>" name="description" placeholder="Product Description" id="floatingTextarea" style="height: 100px;"></textarea>
                                     <label for="floatingTextarea">Description</label>
                                     <span class="invalid-feedback"><?php echo $description_err; ?></span>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-floating">
                                     <input type="file" class="form-control <?php echo (!empty($image_err)) ? 'is-invalid' : ''; ?>" id="floatingImage" name="image" placeholder="Image" required>
                                     <label for="floatingImage" style="padding-top: 5px;">Upload Image</label>
                                     <span class="invalid-feedback"><?php echo $image_err; ?></span>
                                 </div>
                             </div>

                             <div class="col-md-4">
                                 <div class="form-floating mb-3">
                                     <select class="form-select <?php echo (!empty($barId_err)) ? 'is-invalid' : ''; ?>" name="barId" id="floatingSelect" aria-label="State" required>
                                         <option selected>Select Bar</option>
                                         <option value="1">Buga</option>
                                         <option value="2">Kwalaah</option>
                                     </select>
                                     <label for="floatingSelect">Bar</label>
                                     <span class="invalid-feedback"><?php echo $barId_err; ?></span>
                                 </div>
                             </div>

                             <div class="text-center">
                                 <button type="submit" class="btn btn-primary">Submit</button>
                                 <button type="reset" class="btn btn-secondary">Reset</button>
                             </div>
                         </form><!-- End floating Labels Form -->

                     </div>
                 </div>

             </div>
         </div>
     </section>

 </main><!-- End #main -->


 <?php include_once("include/footer.php"); ?>

 <?php include_once("include/bodyClosing.php"); ?>