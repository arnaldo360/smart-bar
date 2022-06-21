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

 <?php include("../backend/viewProductController.php"); ?>

 <?php include("include/title.php"); ?>
 <?php include("include/header.php"); ?>

 <?php include("include/sidebar.php"); ?>

 <main id="main" class="main">
     <div class="pagetitle">
         <h1>Order</h1>
         <nav>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                 <li class="breadcrumb-item">Order</li>
                 <li class="breadcrumb-item active">Create Order</li>
             </ol>
         </nav>
     </div><!-- End Page Title -->


     <!-- creating order -->

     <div class="container py-5">
         <div class="row text-center text-white mb-5">
             <div class="col-lg-7 mx-auto">
                 <h4 class="d-none d-lg-block text-primary">Enjoyment , Is Drinking with Friends !</h4>
             </div>
         </div>
         <div class="row">
             <div class="col-lg-9 mx-auto">
                 <!-- List group-->
                 <ul class="list-group shadow">

                     <?php while ($product_rows = $products->fetch_array(MYSQLI_ASSOC)) : ?>
                         <!-- list group item-->
                         <li class="list-group-item">
                             <!-- Custom content-->
                             <div class="media align-items-lg-center flex-column flex-lg-row p-3 ">
                                 <div class="media-body order-2 order-lg-1">
                                     <h3 class="mt-0 font-weight-bold mb-2"><?= $product_rows["productName"] ?></h3>

                                     <div class="row">
                                         <div class="col-sm-3 border-right">
                                             <p class="mb-0 small font-weight-bold">Type & Category</p>
                                             <p class="mb-0 small">
                                                 <?= $product_rows["productType"] ?> | <?= $product_rows["productCategory"]; ?>
                                             </p>
                                             <div class="">
                                                 <p class="mb-0 small font-weight-bold">Description</p>
                                                 <p class="mb-0 small"><?= $product_rows["productDescription"]; ?></p>
                                             </div>
                                         </div>
                                         <div class="col-sm-3">
                                             <p class="mb-0 small font-weight-bold">Alcohol & Volume</p>
                                             <p class="mb-0 small">
                                                 <?php
                                                    if ($product_rows["alcoholPercentage"] == null || $product_rows["alcoholPercentage"] == 0) {
                                                        echo "Non alcoholic | " . $product_rows["productVolume"] . " " . $product_rows["productUnit"];
                                                    } else {
                                                        echo $product_rows["alcoholPercentage"] . "% | " . $product_rows["productVolume"] . " " . $product_rows["productUnit"];
                                                    }
                                                    ?>
                                             </p>
                                         </div>

                                         <div class="col-sm-3 border-left">
                                             <?php $imageURL = '../assets/image/upload/' . $product_rows["productImage"]; ?>
                                             <img src="<?php echo $imageURL; ?>" width="120" class="ml-lg-5 order-1 order-lg-2" alt="product image" />
                                         </div>

                                         <div class="d-flex align-items-center justify-content-between mt-1">
                                             <h4 class="font-weight-bold my-2"><?= $product_rows["productPrice"] . " TZS"; ?></h4>
                                         </div>
                                         <div class="mt-6">
                                             <form id="orderForm" action="../backend/orderProductsController.php" method="POST">

                                                 <!-- hidden form values -->
                                                 <input type="hidden" name="productId" value="<?= $product_rows["productId"]; ?>">
                                                 <input type="hidden" name="productPrice" value="<?= $product_rows["productPrice"]; ?>">
                                                 <input type="hidden" name="productImage" value="<?= $product_rows["productImage"]; ?>">
                                                 <!-- hidden form values -->

                                                 <div class="row">
                                                     <div class="col-md-3">
                                                         <input type="number" placeholder="Quantity" class="form-control quantity" name="quantity">
                                                     </div>
                                                     <div class="col-md-3">
                                                         <button type="submit" class="btn btn-md btn-success">Order</button>
                                                     </div>
                                                 </div>
                                             </form>
                                         </div>
                                     </div>


                                 </div>

                             </div> <!-- End -->
                         </li> <!-- End -->
                     <?php endwhile; ?>
                     <!-- list group item-->
                 </ul> <!-- End -->
             </div>
         </div>
     </div>

     </div>



     </div>
     </div>
     </div>


     <!-- end creating order -->

 </main><!-- End #main -->


 <?php include_once("include/footer.php"); ?>

 <?php include_once("include/bodyClosing.php"); ?>