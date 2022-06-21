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

 <?php

    include("../backend/viewOrderListController.php");
    include("../backend/submitOrderListController.php");

    ?>

 <?php include("include/title.php"); ?>

 <style media="screen">
     body {
         margin-top: 20px;
     }

     select.form-control:not([size]):not([multiple]) {
         height: 44px;
     }

     select.form-control {
         padding-right: 38px;
         background-position: center right 17px;
         background-image: url(data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNv…9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K);
         background-repeat: no-repeat;
         background-size: 9px 9px;
     }

     .form-control:not(textarea) {
         height: 44px;
     }

     .form-control {
         padding: 0 18px 3px;
         border: 1px solid #dbe2e8;
         border-radius: 22px;
         background-color: #fff;
         color: #606975;
         font-family: "Maven Pro", Helvetica, Arial, sans-serif;
         font-size: 14px;
         -webkit-appearance: none;
         -moz-appearance: none;
         appearance: none;
     }

     .shopping-cart,
     .wishlist-table,
     .order-table {
         margin-bottom: 20px
     }

     .shopping-cart .table,
     .wishlist-table .table,
     .order-table .table {
         margin-bottom: 0
     }

     .shopping-cart .btn,
     .wishlist-table .btn,
     .order-table .btn {
         margin: 0
     }

     .shopping-cart>table>thead>tr>th,
     .shopping-cart>table>thead>tr>td,
     .shopping-cart>table>tbody>tr>th,
     .shopping-cart>table>tbody>tr>td,
     .wishlist-table>table>thead>tr>th,
     .wishlist-table>table>thead>tr>td,
     .wishlist-table>table>tbody>tr>th,
     .wishlist-table>table>tbody>tr>td,
     .order-table>table>thead>tr>th,
     .order-table>table>thead>tr>td,
     .order-table>table>tbody>tr>th,
     .order-table>table>tbody>tr>td {
         vertical-align: middle !important
     }

     .shopping-cart>table thead th,
     .wishlist-table>table thead th,
     .order-table>table thead th {
         padding-top: 17px;
         padding-bottom: 17px;
         border-width: 1px
     }

     .shopping-cart .remove-from-cart,
     .wishlist-table .remove-from-cart,
     .order-table .remove-from-cart {
         display: inline-block;
         color: #ff5252;
         font-size: 18px;
         line-height: 1;
         text-decoration: none
     }

     .shopping-cart .count-input,
     .wishlist-table .count-input,
     .order-table .count-input {
         display: inline-block;
         width: 100%;
         width: 86px
     }

     .shopping-cart .product-item,
     .wishlist-table .product-item,
     .order-table .product-item {
         display: table;
         width: 100%;
         min-width: 150px;
         margin-top: 5px;
         margin-bottom: 3px
     }

     .shopping-cart .product-item .product-thumb,
     .shopping-cart .product-item .product-info,
     .wishlist-table .product-item .product-thumb,
     .wishlist-table .product-item .product-info,
     .order-table .product-item .product-thumb,
     .order-table .product-item .product-info {
         display: table-cell;
         vertical-align: top
     }

     .shopping-cart .product-item .product-thumb,
     .wishlist-table .product-item .product-thumb,
     .order-table .product-item .product-thumb {
         width: 130px;
         padding-right: 20px
     }

     .shopping-cart .product-item .product-thumb>img,
     .wishlist-table .product-item .product-thumb>img,
     .order-table .product-item .product-thumb>img {
         display: block;
         width: 100%
     }

     @media screen and (max-width: 860px) {

         .shopping-cart .product-item .product-thumb,
         .wishlist-table .product-item .product-thumb,
         .order-table .product-item .product-thumb {
             display: none
         }
     }

     .shopping-cart .product-item .product-info span,
     .wishlist-table .product-item .product-info span,
     .order-table .product-item .product-info span {
         display: block;
         font-size: 13px
     }

     .shopping-cart .product-item .product-info span>em,
     .wishlist-table .product-item .product-info span>em,
     .order-table .product-item .product-info span>em {
         font-weight: 500;
         font-style: normal
     }

     .shopping-cart .product-item .product-title,
     .wishlist-table .product-item .product-title,
     .order-table .product-item .product-title {
         margin-bottom: 6px;
         padding-top: 5px;
         font-size: 16px;
         font-weight: 500
     }

     .shopping-cart .product-item .product-title>a,
     .wishlist-table .product-item .product-title>a,
     .order-table .product-item .product-title>a {
         transition: color .3s;
         color: #374250;
         line-height: 1.5;
         text-decoration: none
     }

     .shopping-cart .product-item .product-title>a:hover,
     .wishlist-table .product-item .product-title>a:hover,
     .order-table .product-item .product-title>a:hover {
         color: #0da9ef
     }

     .shopping-cart .product-item .product-title small,
     .wishlist-table .product-item .product-title small,
     .order-table .product-item .product-title small {
         display: inline;
         margin-left: 6px;
         font-weight: 500
     }

     .wishlist-table .product-item .product-thumb {
         display: table-cell !important
     }

     @media screen and (max-width: 576px) {
         .wishlist-table .product-item .product-thumb {
             display: none !important
         }
     }

     .shopping-cart-footer {
         display: table;
         width: 100%;
         padding: 10px 0;
         border-top: 1px solid #e1e7ec
     }

     .shopping-cart-footer>.column {
         display: table-cell;
         padding: 5px 0;
         vertical-align: middle
     }

     .shopping-cart-footer>.column:last-child {
         text-align: right
     }

     .shopping-cart-footer>.column:last-child .btn {
         margin-right: 0;
         margin-left: 15px
     }

     @media (max-width: 768px) {
         .shopping-cart-footer>.column {
             display: block;
             width: 100%
         }

         .shopping-cart-footer>.column:last-child {
             text-align: center
         }

         .shopping-cart-footer>.column .btn {
             width: 100%;
             margin: 12px 0 !important
         }
     }

     .coupon-form .form-control {
         display: inline-block;
         width: 100%;
         max-width: 235px;
         margin-right: 12px;
     }

     .form-control-sm:not(textarea) {
         height: 36px;
     }
 </style>

 <?php include("include/header.php"); ?>

 <?php include("include/sidebar.php"); ?>

 <main id="main" class="main">
     <div class="pagetitle">
         <h1>Order</h1>
         <nav>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                 <li class="breadcrumb-item">Order</li>
                 <li class="breadcrumb-item active">Order List</li>
             </ol>
         </nav>
     </div><!-- End Page Title -->


     <!-- MAIN CONTENT-->
     <div class="main-content">
         <div class="section__content section__content--p30">
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-md-12">
                         <div class="overview-wrap">
                             <h2 class="title-1">Order List</h2>
                         </div>
                     </div>
                 </div>


                 <div class="container padding-bottom-3x mb-1">

                     <?php if ($count_orderList > 0) : ?>

                         <!-- Shopping orderList-->
                         <div class="table-responsive shopping-cart">
                             <table class="table">
                                 <thead>
                                     <tr>
                                         <th>Product Name</th>
                                         <th class="text-center">Quantity</th>
                                         <th class="text-center">Subtotal</th>
                                         <th class="text-center"><a class="btn btn-sm btn-outline-danger" href="../backend/clearorderListController.php?customer_id=<?= $_SESSION["id"]; ?>">Clear orderList</a></th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php while ($orderList_rows = $orderList->fetch_array(MYSQLI_ASSOC)) : ?>
                                         <form class="" action="../backend/submitOrderListController.php?orderList_id=<?= $orderList_rows["orderListId"]; ?>" method="post">
                                             <input type="hidden" name="orderListId[]" value="<?= $orderList_rows["orderListId"]; ?>">
                                             <tr>
                                                 <td>
                                                     <div class="product-item">
                                                         <a class="product-thumb" href="#">
                                                             <?php $imageURL = '../assets/image/upload/' . $orderList_rows["productImage"]; ?>
                                                             <img src="<?php echo $imageURL; ?>" alt="product image" />
                                                         </a>
                                                         <div class="product-info">
                                                             <h4 class="product-title">
                                                                 <a href="#"><?= $orderList_rows["productName"]; ?></a>
                                                             </h4>
                                                             <span><em>Type &amp; Category :</em> <?= $orderList_rows["productType"] . " | " . $orderList_rows["productCategory"]; ?></span>
                                                             <span><em>Price :</em> <?= $orderList_rows["productPrice"] . " TZS"; ?></span>
                                                         </div>
                                                     </div>
                                                 </td>
                                                 <td class="text-center">
                                                     <div class="count-input">
                                                         <input type="number" class="form-control" name="orderList_quantity[]" value="<?= $orderList_rows["quantity"]; ?>">
                                                     </div>
                                                 </td>
                                                 <td class="text-center text-lg text-medium"><?= $orderList_rows["totalPrice"] . " TZS"; ?></td>
                                                 <td class="text-center"><a class="remove-from-cart" href="../backend/deleteProductOrderList.php?orderList_id=<?= $orderList_rows["orderListId"]; ?>"><i class="bi bi-trash-fill"></i></a></td>
                                             </tr>
                                         <?php endwhile; ?>
                                 </tbody>
                             </table>
                         </div>
                         <div class="shopping-cart-footer">
                             <div class="column text-lg">Subtotal: <span class="text-medium font-weight-bold"><?= $subtotal . " TZS"; ?></span></div>
                         </div>
                         <div class="shopping-cart-footer">
                             <div class="column"><a class="btn btn-outline-secondary" href="createOrder.php"><i class="fas fa-arrow-left"></i>&nbsp;Back to Shopping</a></div>
                             <div class="column">
                                 <select name="tableNumber" required>
                                     <option value="" selected>Select table</option>
                                     <option value="1">Table 1</option>
                                     <option value="2">Table 2</option>
                                     <option value="3">Table 3</option>
                                     <option value="4">Table 4</option>
                                     <option value="5">Table 5</option>
                                     <option value="6">Table 6</option>
                                     <option value="7">Table 7</option>
                                     <option value="8">Table 8</option>
                                     <option value="9">Table 9</option>
                                     <option value="10">Table 10</option>
                                 </select>
                                 <button type="submit" class="btn btn-success">Submit</button>
                                 </form>
                             </div>
                         </div>

                     <?php else : ?>
                         <div class="card mt-2">
                             <div class="card-body">
                                 <div class="alert alert-warning" role="alert">
                                     <i class="fas fa-exclamation"></i><span class="ml-2">No items have been added to orderList</span>
                                 </div>
                                 <a class="btn btn-outline-primary" href="createOrder.php"><i class="fas fa-arrow-left"></i>&nbsp;Order now</a>
                             </div>
                         </div>
                     <?php endif; ?>


                 </div>


             </div>
         </div>
     </div>
     </div>
     <!-- END MAIN CONTENT-->

 </main><!-- End #main -->


 <?php include_once("include/footer.php"); ?>

 <?php include_once("include/bodyClosing.php"); ?>