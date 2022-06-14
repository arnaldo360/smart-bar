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
                                     <select class="form-select <?php echo (!empty($type_err)) ? 'is-invalid' : ''; ?> " name="type" id="product_type" required>
                                         <option>Select one</option>
                                         <option value="Beer">Beer</option>
                                         <option value="Spirits">Spirits</option>
                                         <option value="Wine">Wine</option>
                                         <option value="Soft drinks">Soft drinks</option>
                                         <option value="Extras">Extras</option>
                                     </select>
                                     <label for="floatingSelect">Product Type</label>
                                     <span class="invalid-feedback"><?php echo $type_err; ?></span>
                                 </div>
                             </div>

                             <div class="col-md-4">
                                 <div class="form-floating" id="category" style="display: none;">
                                     <select class="form-select <?php echo (!empty($category_err)) ? 'is-invalid' : ''; ?> " name="product_category" id="category_type" required>

                                     </select>
                                     <label for="floatingSelect">Product Category</label>
                                     <span class="invalid-feedback"><?php echo $category_err; ?></span>
                                 </div>
                             </div>

                             <div class="col-md-4">
                                 <div class="form-floating mb-3">
                                     <select class="form-select <?php echo (!empty($class_err)) ? 'is-invalid' : ''; ?> " name="class" id="floatingSelect" required>
                                         <option selected>Select Class</option>
                                         <option value="Buga">Buga</option>
                                         <option value="Kwalaah">Kwalaah</option>
                                     </select>
                                     <label for="floatingSelect">Product Class</label>
                                     <span class="invalid-feedback"><?php echo $class_err; ?></span>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="number" class="form-control <?php echo (!empty($quantity_err)) ? 'is-invalid' : ''; ?> custom-select" name="quantity" id="floatingName" placeholder="Quanity" required>
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
                                     <input type="file" class="form-control <?php echo (!empty($image_err)) ? 'is-invalid' : ''; ?>" id="floatingImage" placeholder="photo">
                                     <label for="floatingImage" style="padding-top: 5px;">Upload Image</label>
                                     <span class="invalid-feedback"><?php echo $image_err; ?></span>
                                 </div>
                             </div>

                             <div class="col-md-4">
                                 <div class="form-floating mb-3">
                                     <select class="form-select <?php echo (!empty($barId_err)) ? 'is-invalid' : ''; ?>" id="floatingSelect" aria-label="State" name="barId" required>
                                         <option selected>Select Bar</option>
                                         <?php
                                            require_once "../../../database/dbConnect.php";
                                            $result = mysqli_query($mysqli, "Select * from bar; ");
                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                             <option value="<?php echo $row['barId']; ?>"><?php echo $row["barName"]; ?></option>
                                         <?php
                                            }
                                            ?>
                                     </select>
                                     <span class="invalid-feedback"><?php echo $barId_err; ?></span>
                                     <label for="floatingSelect">Bar</label>
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


 <script type="text/javascript">
     $(document).ready(function() {
         $("#product_type").on('change', function() {
             //  alert("wazungu");
             // store option value in variable
             var product_type = $(this).children("option:selected").val();
             var category_wrap = document.getElementById("category");
             var alcohol_wrap = document.getElementById("alcohol");
             var volume_wrap = document.getElementById("volume");
             var counter = 0;

             // check value to append select element
             switch (product_type) {

                 case 'Beer':
                     category_wrap.style.display = "block";
                     alcohol_wrap.style.display = "block";
                     volume_wrap.style.display = "block";
                     $('#category_type').empty();
                     $("#category_type").append('<option value="Local beer">Local beer</option>');
                     $("#category_type").append('<option value="Imported beer">Imported beer</option>');
                     $("#category_type").append('<option value="Malts">Malts</option>');
                     $("#category_type").append('<option value="Ciders">Cider</option>');
                     break;

                 case 'Spirits':
                     category_wrap.style.display = "block";
                     alcohol_wrap.style.display = "block";
                     volume_wrap.style.display = "block";
                     $('#category_type').empty();
                     $("#category_type").append('<option value="Gin">Gin</option>');
                     $("#category_type").append('<option value="Vodka">Vodka</option>');
                     $("#category_type").append('<option value="Rum">Rum</option>');
                     $("#category_type").append('<option value="Tequila">Tequila</option>');
                     $("#category_type").append('<option value="Whiskey">Whiskey</option>');
                     $("#category_type").append('<option value="Brandy">Brandy</option>');
                     $("#category_type").append('<option value="Liqueurs">Liqueurs</option>');
                     break;

                 case 'Wine':
                     category_wrap.style.display = "block";
                     alcohol_wrap.style.display = "block";
                     volume_wrap.style.display = "block";
                     $('#category_type').empty();
                     $("#category_type").append('<option value="Red wine">Red wine</option>');
                     $("#category_type").append('<option value="White wine">White wine</option>');
                     $("#category_type").append('<option value="Bubbly & Champange">Bubbly & Champange</option>');
                     break;

                 case 'Soft drinks':
                     category_wrap.style.display = "block";
                     alcohol_wrap.style.display = "none";
                     volume_wrap.style.display = "block";
                     $('#category_type').empty();
                     $("#category_type").append('<option value="Water">Water</option>');
                     $("#category_type").append('<option value="Soda">Soda</option>');
                     $("#category_type").append('<option value="Juice">Juice</option>');
                     $("#category_type").append('<option value="Energy drinks">Energy drinks</option>');
                     break;

                 case 'Extras':
                     category_wrap.style.display = "block";
                     alcohol_wrap.style.display = "none";
                     volume_wrap.style.display = "none";
                     $('#category_type').empty();
                     $("#category_type").append('<option value="Party Items">Party Items</option>');
                     $("#category_type").append('<option value="Smokes">Smokes</option>');
                     $("#category_type").append('<option value="Ice cubes">Ice cubes</option>');
                     break;

                 default:
             }
         });
     });
 </script>

 <?php include_once("include/bodyClosing.php"); ?>