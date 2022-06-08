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
            <a class="nav-link collapsed" href="report.php">
                <i class="bi bi-journal-check"></i>
                <span>Report</span>
            </a>
        </li><!-- End Report Page Nav -->

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

        <li class="nav-item">
            <a class="nav-link collapsed" href="report.php">
                <i class="bi bi-journal-check"></i>
                <span>Report</span>
            </a>
        </li><!-- End Report Page Nav -->


    </ul>
            ';
        }
        ?>

        

</aside><!-- End Sidebar-->