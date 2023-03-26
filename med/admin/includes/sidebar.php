<div class="ec-left-sidebar ec-bg-sidebar">
    <div id="sidebar" class="sidebar ec-sidebar-footer">

        <div class="ec-brand">
            <a href="dashboard.php" title="med">
                <img src="../assets/img/logo/favicon.png" alt="" />
                <span class="ec-brand-name text-truncate">MED ACCES</span>
            </a>
        </div>

        <!-- begin sidebar scrollbar -->
        <div class="ec-navigation" data-simplebar>
            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">
                <!-- Dashboard -->
                <li class="active">
                    <a class="sidenav-item-link" href="dashboard.php">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                    <hr>
                </li>
                <!-- company -->
                <li>
                    <a class="sidenav-item-link" href="company-details.php">
                        <i class="mdi mdi-home-account"></i>
                        <span class="nav-text">Company profile</span>
                    </a>
                    <hr>
                </li>

                <!-- Users -->
                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)">
                        <i class="mdi mdi-account-group"></i>
                        <span class="nav-text">Users</span> <b class="caret"></b>
                    </a>
                    <div class="collapse">
                        <ul class="sub-menu" id="users" data-parent="#sidebar-menu">

                            <li class="">
                                <a class="sidenav-item-link" href="user-list.php">
                                    <span class="nav-text">User List</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="sidenav-item-link" href="user-profile.php">
                                    <span class="nav-text">Users Profile</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                </li>
                <!-- manufacturer start -->
                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)">
                        <i class=" mdi mdi-group"></i>
                        <span class="nav-text">Supplier</span> <b class="caret"></b>
                    </a>
                    <div class="collapse">
                        <ul class="sub-menu" id="orders" data-parent="#sidebar-menu">
                            <li class="">
                                <a class="sidenav-item-link" href="manage_supplier.php">
                                    <span class="nav-text">Manage Supplier</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="sidenav-item-link" href="supplier_add.php">
                                    <span class="nav-text">Add Supplier</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <hr>
                </li>
                <!-- manufacturer end -->



                <!-- Products -->
                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)">
                        <i class="mdi mdi-palette-advanced"></i>
                        <span class="nav-text">Products</span> <b class="caret"></b>
                    </a>
                    <div class="collapse">
                        <ul class="sub-menu" id="products" data-parent="#sidebar-menu">
                            <li class="">
                                <a class="sidenav-item-link" href="product-add.php">
                                    <span class="nav-text">Add Product</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="sidenav-item-link" href="product-list.php">
                                    <span class="nav-text">List Product</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Category -->
                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)">
                        <i class="mdi mdi-dns-outline"></i>
                        <span class="nav-text">Categories</span> <b class="caret"></b>
                    </a>
                    <div class="collapse">
                        <ul class="sub-menu" id="categorys" data-parent="#sidebar-menu">
                            <li class="">
                                <a class="sidenav-item-link" href="main-category.php">
                                    <span class="nav-text">Main Category</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="sidenav-item-link" href="sub-category.php">
                                    <span class="nav-text">Sub Category</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Orders -->
                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)">
                        <i class="mdi mdi-cart"></i>
                        <span class="nav-text">Orders</span> <b class="caret"></b>
                    </a>
                    <div class="collapse">
                        <ul class="sub-menu" id="orders" data-parent="#sidebar-menu">
                            <li class="">
                                <a class="sidenav-item-link" href="new-order.php">
                                    <span class="nav-text">New Order</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="sidenav-item-link" href="order-history.php">
                                    <span class="nav-text">Order History</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <!-- Invoice -->
                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)">
                        <i class=" mdi mdi-scale-balance"></i>
                        <span class="nav-text">Invoice</span> <b class="caret"></b>
                    </a>
                    <div class="collapse">
                        <ul class="sub-menu" id="orders" data-parent="#sidebar-menu">
                            <li class="">
                                <a class="sidenav-item-link" href="new_invoice.php">
                                    <span class="nav-text">New Invoice</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="sidenav-item-link" href="manage_invoice.php">
                                    <span class="nav-text">Manage invoice</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <hr>
                </li>

                <!-- invoice end -->

                <!-- Report -->
                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)">
                        <i class=" mdi mdi-book"></i>
                        <span class="nav-text">Report</span> <b class="caret"></b>
                    </a>
                    <div class="collapse">
                        <ul class="sub-menu" id="orders" data-parent="#sidebar-menu">
                            <li class="">
                                <a class="sidenav-item-link" href="sales_report.php">
                                    <span class="nav-text">Sales report</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="sidenav-item-link" href="purchase_report.php">
                                    <span class="nav-text">Purchase report</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <hr>
                </li>

                <!-- report end -->

                <!-- Reviews -->
                <li>
                    <a class="sidenav-item-link" href="review-list.php">
                        <i class="mdi mdi-star-half"></i>
                        <span class="nav-text">Reviews</span>
                    </a>
                </li>

                <!-- Brands -->
                <li>
                    <a class="sidenav-item-link" href="brand-list.php">
                        <i class="mdi mdi-tag-faces"></i>
                        <span class="nav-text">Brands</span>
                    </a>
                    <hr>
                </li>

            </ul>
        </div>
    </div>
</div>