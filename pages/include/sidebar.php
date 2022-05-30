<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="dashboard.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <!-- admin privallages -->
        <?php
        if ($role == 1) {
            echo '<li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#bar-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-building"></i><span>Bar</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="bar-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="createBar.php">
                        <i class="bi bi-bricks"></i><span>Create Bar</span>
                    </a>
                </li>
                <li>
                    <a href="viewBar.php">
                        <i class="bi bi-view-list"></i><span>View Bars</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Bar Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#department-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-grid"></i><span>Department</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="department-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="createDepartment.php">
                        <i class="bi bi-folder-plus"></i><span>Create Department</span>
                    </a>
                </li>
                <li>
                    <a href="viewDepartment.php">
                        <i class="bi bi-view-list"></i><span>View Department</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Company Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-people"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="users-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="createEmployee.php">
                        <i class="bi bi-person-plus"></i><span>Create Employee</span>
                    </a>
                </li>
                <li>
                    <a href="viewEmployee.php">
                        <i class="bi bi-person"></i><span>View Employee</span>
                    </a>
                </li>
                <li>
                    <a href="viewCustomer.php">
                        <i class="bi bi-person"></i><span>View Customers</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Users Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#orders-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-minecart-loaded"></i><span>Orders</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="orders-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="createOrder.php">
                        <i class="bi bi-clipboard-plus"></i><span>Create Order</span>
                    </a>
                </li>
                <li>
                    <a href="viewOrder.php">
                        <i class="bi bi-view-list"></i><span>View Order</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Orders Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#products-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-hdd-stack"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="products-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="createProduct.php">
                        <i class="bi bi-file-text"></i><span>Create Product</span>
                    </a>
                </li>
                <li>
                    <a href="viewProduct.php">
                        <i class="bi bi-view-list"></i><span>View Product</span>
                    </a>
                </li>
            </ul>
        </li><!-- End products Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="reservation.php">
                <i class="bi bi-stickies"></i>
                <span>Reservations</span>
            </a>
        </li><!-- End Reservations Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="sales.php">
                <i class="bi bi-save"></i>
                <span>Sales</span>
            </a>
        </li><!-- End Sales Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="payment.php">
                <i class="bi bi-wallet"></i>
                <span>Payment</span>
            </a>
        </li><!-- End Payment Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="report.php">
                <i class="bi bi-journal-check"></i>
                <span>Report</span>
            </a>
        </li><!-- End Report Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="activityLog.php">
                <i class="bi bi-list-check"></i>
                <span>Activity Log</span>
            </a>
        </li><!-- End Activity Log Page Nav -->

    </ul>';
        }
        ?>

        <!-- employee privallages -->
        <?php
        if ($role == 2) {
            echo '

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#department-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-grid"></i><span>Department</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="department-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="createDepartment.php">
                        <i class="bi bi-folder-plus"></i><span>Create Department</span>
                    </a>
                </li>
                <li>
                    <a href="viewDepartment.php">
                        <i class="bi bi-view-list"></i><span>View Department</span>
                    </a>
                </li>
            </ul>
        </li><!-- End department Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-people"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="users-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="createEmployee.php">
                        <i class="bi bi-person-plus"></i><span>Create Employee</span>
                    </a>
                </li>
                <li>
                    <a href="viewEmployee.php">
                        <i class="bi bi-person"></i><span>View Employee</span>
                    </a>
                </li>
                <li>
                    <a href="viewCustomer.php">
                        <i class="bi bi-person"></i><span>View Customers</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Users Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#orders-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-minecart-loaded"></i><span>Orders</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="orders-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="createOrder.php">
                        <i class="bi bi-clipboard-plus"></i><span>Create Order</span>
                    </a>
                </li>
                <li>
                    <a href="viewOrder.php">
                        <i class="bi bi-view-list"></i><span>View Order</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Orders Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#products-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-hdd-stack"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="products-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="createProduct.php">
                        <i class="bi bi-file-text"></i><span>Create Product</span>
                    </a>
                </li>
                <li>
                    <a href="viewProduct.php">
                        <i class="bi bi-view-list"></i><span>View Product</span>
                    </a>
                </li>
            </ul>
        </li><!-- End products Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="reservation.php">
                <i class="bi bi-stickies"></i>
                <span>Reservations</span>
            </a>
        </li><!-- End Reservations Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="sales.php">
                <i class="bi bi-save"></i>
                <span>Sales</span>
            </a>
        </li><!-- End Sales Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="payment.php">
                <i class="bi bi-wallet"></i>
                <span>Payment</span>
            </a>
        </li><!-- End Payment Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="report.php">
                <i class="bi bi-journal-check"></i>
                <span>Report</span>
            </a>
        </li><!-- End Report Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="activityLog.php">
                <i class="bi bi-list-check"></i>
                <span>Activity Log</span>
            </a>
        </li><!-- End Activity Log Page Nav -->

    </ul>';
        }
        ?>

        <!-- customer privallages -->
        <?php
        if ($role == 3) {
            echo '
            

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#orders-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-minecart-loaded"></i><span>Orders</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="orders-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="createOrder.php">
                        <i class="bi bi-clipboard-plus"></i><span>Create Order</span>
                    </a>
                </li>
                <li>
                    <a href="viewOrder.php">
                        <i class="bi bi-view-list"></i><span>View Order</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Orders Nav -->


    </ul>
            ';
        }
        ?>

        

</aside><!-- End Sidebar-->