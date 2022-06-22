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
 <?php include("include/title.php"); ?>

 <?php include("include/header.php"); ?>

 <?php include("include/sidebar.php"); ?>

 <main id="main" class="main">

     <div class="pagetitle">
         <h1>Orders</h1>
         <nav>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                 <li class="breadcrumb-item">Orders</li>
                 <li class="breadcrumb-item active">View Order</li>
             </ol>
         </nav>
     </div><!-- End Page Title -->

     <section class="pagetitle">
         <!-- Recent Sales -->
         <div class="col-12">

             <?php if (isset($_GET["redirect"]) && !empty($_GET["redirect"])) : ?>
                 <?php if ($_GET["redirect"] == "order_success") : ?>
                     <div class="alert alert-success alert-dismissible fade show" role="alert">
                         <i class="fas fa-check"></i><span class="ml-2">Dear <?= $customerFullName; ?>, your order is currently being reviewed. Relax and await your drinks!</span>
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                 <?php endif; ?>
             <?php endif; ?>

             <div class="card recent-sales overflow-auto">

                 <div class="card-body">
                     <h5 class="card-title">View Order</h5>

                     <?php
                        require_once("../database/dbConnect.php");

                        $sql = "SELECT o.ordersId, ol.quantity, p.productName, e.employeeFullName, o.orderStatus, o.tableNumber, ol.totalPrice FROM orders o 
                                            LEFT JOIN employee e ON e.employeeID = o.employeeId
                                            JOIN order_list ol ON o.orderListId = ol.orderListId
                                            JOIN customer c ON ol.customerId = c.customerID 
                                            JOIN product p ON ol.productId = p.productId
                                            JOIN bar b ON p.barID = b.barId
                                            WHERE p.barID = $barId
                                            ORDER BY o.ordersId DESC;";

                        $results = mysqli_query($mysqli, $sql);

                        echo "<table class='table table-borderless datatable'>
                                            <thead>
                                                <tr>
                                                    <th scope='col'>#</th>
                                                    <th scope='col'>Employee Name</th>
                                                    <th scope='col'>Product</th>
                                                    <th scope='col'>Quantity</th>
                                                    <th scope='col'>Price</th>
                                                    <th scope='col'>Table#</th>
                                                    <th scope='col'>Status</th>

                                                </tr>
                                            </thead>
                                            <tbody>";

                        // output data of each row
                        $count = 1;
                        while ($row = mysqli_fetch_array($results)) {
                            $orderID = 'orderID' . $count;
                            echo "<tr>
                                                <td scope='row'>" . $count . "</td>
                                                <td>" . $row["employeeFullName"] . "</td>
                                                <td>" . $row["productName"] . "</td>                                                
                                                <td>" . $row["quantity"] . "</td>
                                                <td>" . $row["totalPrice"] . "</td>
                                                <td>" . $row["tableNumber"] . "</td>
                                                <td>";
                            if ($row["orderStatus"] == 'ATTENDED') {
                                echo "<span class='badge rounded-pill bg-success'>Attended</span>";
                            } elseif ($row["orderStatus"] == 'PENDING') {
                                echo "<span class='badge rounded-pill bg-warning'>Pending</span>";
                            } else {
                                echo "<span class='badge rounded-pill bg-primary'>Paid</span>";
                            }

                            echo "</td>
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