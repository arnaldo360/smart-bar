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
         <h1>Dashboard</h1>
     </div><!-- End Page Title -->

     <section class="section dashboard">
         <div class="row">

             <!-- Left side columns -->
             <div class="col-lg-12">
                 <div class="row">

                     <!-- Bar Card -->
                     <div class="col-xxl-4 col-md-6">
                         <div class="card info-card sales-card">

                             <div class="filter">
                                 <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                 <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                     <li class="dropdown-header text-start">
                                         <h6>Filter</h6>
                                     </li>

                                     <li><a class="dropdown-item" href="#">Today</a></li>
                                     <li><a class="dropdown-item" href="#">This Month</a></li>
                                     <li><a class="dropdown-item" href="#">This Year</a></li>
                                 </ul>
                             </div>

                             <div class="card-body">
                                 <a href="viewBar.php">
                                     <h5 class="card-title">Registered Bar</h5>
                                 </a>

                                 <div class="d-flex align-items-center">
                                     <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                         <i class="bi bi-bricks"></i>
                                     </div>
                                     <div class="ps-3">
                                         <a href="viewBar.php"></a>
                                         <?php
                                            require_once "../../../database/dbConnect.php";
                                            $result = mysqli_query($mysqli, "Select count(barID) AS countBar from bar; ");
                                            $countBar = mysqli_fetch_assoc($result);

                                            echo "<h6>" . $countBar['countBar'] . "</h6>";
                                            ?>

                                     </div>
                                 </div>
                             </div>

                         </div>
                     </div><!-- End Bar Card -->

                     <!-- managers Card -->
                     <div class="col-xxl-4 col-md-6">
                         <div class="card info-card revenue-card">

                             <div class="filter">
                                 <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                 <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                     <li class="dropdown-header text-start">
                                         <h6>Filter</h6>
                                     </li>

                                     <li><a class="dropdown-item" href="#">Today</a></li>
                                     <li><a class="dropdown-item" href="#">This Month</a></li>
                                     <li><a class="dropdown-item" href="#">This Year</a></li>
                                 </ul>
                             </div>

                             <div class="card-body">
                                 <a href="viewManager.php">
                                     <h5 class="card-title">Managers</h5>
                                 </a>

                                 <div class="d-flex align-items-center">
                                     <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                         <i class="bi bi-people"></i>
                                     </div>
                                     <div class="ps-3">
                                         <a href="viewManager.php">
                                             <?php
                                                require_once "../../../database/dbConnect.php";
                                                $result = mysqli_query($mysqli, "Select count(managerId) AS countManager from manager; ");
                                                $countManager = mysqli_fetch_assoc($result);

                                                echo "<h6>" . $countManager['countManager'] . "</h6>";
                                                ?>
                                         </a>

                                     </div>
                                 </div>
                             </div>

                         </div>
                     </div><!-- End Managers Card -->

                     <!-- Customers Card -->
                     <div class="col-xxl-4 col-xl-12">

                         <div class="card info-card customers-card">

                             <div class="filter">
                                 <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                 <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                     <li class="dropdown-header text-start">
                                         <h6>Filter</h6>
                                     </li>

                                     <li><a class="dropdown-item" href="#">Today</a></li>
                                     <li><a class="dropdown-item" href="#">This Month</a></li>
                                     <li><a class="dropdown-item" href="#">This Year</a></li>
                                 </ul>
                             </div>

                             <div class="card-body">
                                 <a href="viewCustomer.php">
                                     <h5 class="card-title">Customers</h5>
                                 </a>

                                 <div class="d-flex align-items-center">
                                     <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                         <i class="bi bi-people"></i>
                                     </div>
                                     <div class="ps-3">
                                         <a href="viewCustomer.php">
                                             <?php
                                                require_once "../../../database/dbConnect.php";
                                                $result = mysqli_query($mysqli, "Select count(customerID) AS countCustomer from customer; ");
                                                $countCustomer = mysqli_fetch_assoc($result);

                                                echo "<h6>" . $countCustomer['countCustomer'] . "</h6>";
                                                ?>
                                         </a>

                                     </div>
                                 </div>

                             </div>
                         </div>

                     </div><!-- End Customers Card -->

                     <!-- Employee Card -->
                     <div class="col-xxl-4 col-md-6">
                         <div class="card info-card sales-card">

                             <div class="filter">
                                 <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                 <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                     <li class="dropdown-header text-start">
                                         <h6>Filter</h6>
                                     </li>

                                     <li><a class="dropdown-item" href="#">Today</a></li>
                                     <li><a class="dropdown-item" href="#">This Month</a></li>
                                     <li><a class="dropdown-item" href="#">This Year</a></li>
                                 </ul>
                             </div>

                             <div class="card-body">
                                 <a href="viewEmployee.php">
                                     <h5 class="card-title">Employees</h5>
                                 </a>

                                 <div class="d-flex align-items-center">
                                     <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                         <i class="bi bi-people"></i>
                                     </div>
                                     <div class="ps-3">
                                         <a href="viewEmployee.php">
                                             <?php
                                                require_once "../../../database/dbConnect.php";
                                                $result = mysqli_query($mysqli, "Select count(employeeID) AS countEmployee from employee; ");
                                                $countEmployee = mysqli_fetch_assoc($result);

                                                echo "<h6>" . $countEmployee['countEmployee'] . "</h6>";
                                                ?>
                                         </a>

                                     </div>
                                 </div>
                             </div>

                         </div>
                     </div><!-- End Employee Card -->

                     <!-- Order Card -->
                     <div class="col-xxl-4 col-md-6">
                         <div class="card info-card revenue-card">

                             <div class="filter">
                                 <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                 <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                     <li class="dropdown-header text-start">
                                         <h6>Filter</h6>
                                     </li>

                                     <li><a class="dropdown-item" href="#">Today</a></li>
                                     <li><a class="dropdown-item" href="#">This Month</a></li>
                                     <li><a class="dropdown-item" href="#">This Year</a></li>
                                 </ul>
                             </div>

                             <div class="card-body">
                                 <a href="viewOrder.php">
                                     <h5 class="card-title">Orders</h5>
                                 </a>

                                 <div class="d-flex align-items-center">
                                     <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                         <i class="bi bi-minecart-loaded"></i>
                                     </div>
                                     <div class="ps-3">
                                         <a href="viewOrder.php">
                                             <?php
                                                require_once "../../../database/dbConnect.php";
                                                $result = mysqli_query($mysqli, "Select count(ordersId) AS countOrder from orders; ");
                                                $countOrder = mysqli_fetch_assoc($result);

                                                echo "<h6>" . $countOrder['countOrder'] . "</h6>";
                                                ?>
                                         </a>

                                     </div>
                                 </div>
                             </div>

                         </div>
                     </div><!-- End Order Card -->

                     <!-- Product Card -->
                     <div class="col-xxl-4 col-xl-12">

                         <div class="card info-card customers-card">

                             <div class="filter">
                                 <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                 <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                     <li class="dropdown-header text-start">
                                         <h6>Filter</h6>
                                     </li>

                                     <li><a class="dropdown-item" href="#">Today</a></li>
                                     <li><a class="dropdown-item" href="#">This Month</a></li>
                                     <li><a class="dropdown-item" href="#">This Year</a></li>
                                 </ul>
                             </div>

                             <div class="card-body">
                                 <a href="viewProduct.php">
                                     <h5 class="card-title">Product</h5>
                                 </a>

                                 <div class="d-flex align-items-center">
                                     <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                         <i class="bi bi-hdd-stack"></i>
                                     </div>
                                     <div class="ps-3">
                                         <a href="viewProduct.php">
                                             <?php
                                                require_once "../../../database/dbConnect.php";
                                                $result = mysqli_query($mysqli, "Select count(productId) AS countProduct from product; ");
                                                $countProduct = mysqli_fetch_assoc($result);

                                                echo "<h6>" . $countProduct['countProduct'] . "</h6>";
                                                ?>
                                         </a>

                                     </div>
                                 </div>

                             </div>
                         </div>

                     </div><!-- End Product Card -->

                     <!-- Feedback Card -->
                     <div class="col-xxl-4 col-md-6">
                         <div class="card info-card sales-card">

                             <div class="filter">
                                 <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                 <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                     <li class="dropdown-header text-start">
                                         <h6>Filter</h6>
                                     </li>

                                     <li><a class="dropdown-item" href="#">Today</a></li>
                                     <li><a class="dropdown-item" href="#">This Month</a></li>
                                     <li><a class="dropdown-item" href="#">This Year</a></li>
                                 </ul>
                             </div>

                             <div class="card-body">
                                 <a href="feedback.php">
                                     <h5 class="card-title">Feedback</h5>
                                 </a>

                                 <div class="d-flex align-items-center">
                                     <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                         <i class="bi bi-stickies"></i>
                                     </div>
                                     <div class="ps-3">
                                         <a href="feedback.php">
                                             <?php
                                                require_once "../../../database/dbConnect.php";
                                                $result = mysqli_query($mysqli, "Select count(feedbackId) AS countFeedback from feedback; ");
                                                $countFeedback = mysqli_fetch_assoc($result);

                                                echo "<h6>" . $countFeedback['countFeedback'] . "</h6>";
                                                ?>
                                         </a>

                                     </div>
                                 </div>
                             </div>

                         </div>
                     </div><!-- End Feedback Card -->


                     <!-- Recent Orders -->
                     <div class="col-12">
                         <div class="card recent-sales overflow-auto">

                             <div class="filter">
                                 <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                 <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                     <li class="dropdown-header text-start">
                                         <h6>Filter</h6>
                                     </li>

                                     <li><a class="dropdown-item" href="#">Today</a></li>
                                     <li><a class="dropdown-item" href="#">This Month</a></li>
                                     <li><a class="dropdown-item" href="#">This Year</a></li>
                                 </ul>
                             </div>

                             <div class="card-body">
                                 <h5 class="card-title">Recent Orders <span>| Today</span></h5>

                                 <?php
                                    require_once("../../../database/dbConnect.php");

                                    $sql = "SELECT b.barName, c.customerFullName, o.ordersId, ol.quantity, p.productName, e.employeeFullName, o.orderStatus, o.tableNumber, ol.totalPrice FROM orders o 
                                            LEFT JOIN employee e ON e.employeeID = o.employeeId
                                            JOIN order_list ol ON o.orderListId = ol.orderListId
                                            JOIN customer c ON ol.customerId = c.customerID 
                                            JOIN product p ON ol.productId = p.productId
                                            JOIN bar b ON p.barID = b.barId
                                            ORDER BY o.ordersId DESC;";

                                    $results = mysqli_query($mysqli, $sql);

                                    echo "<table class='table table-borderless datatable'>
                                            <thead>
                                                <tr>
                                                    <th scope='col'>#</th>
                                                    <th scope='col'>Bar Name</th>
                                                    <th scope='col'>Customer</th>
                                                    <th scope='col'>Product</th>
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
                                                <td>" . $row["barName"] . "</td>
                                                <td>" . $row["customerFullName"] . "</td>
                                                <td>" . $row["productName"] . "</td>
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

                     </div>
                 </div><!-- End Recent Orders -->



             </div>
         </div><!-- End Left side columns -->


         </div>
     </section>

 </main><!-- End #main -->


 <?php include_once("include/footer.php"); ?>

 <?php include_once("include/bodyClosing.php"); ?>