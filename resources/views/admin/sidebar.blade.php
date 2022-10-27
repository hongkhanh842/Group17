<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <img src="{{asset('assets')}}/admin/img/AdminLTELogo.png"
             alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('assets')}}/admin/img/user2-160x160.jpg" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/admin" class="nav-link"><i class="nav-icon fas fa-home text-yellow"></i>
                        <p>Dashboard</p></a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-box-open text-blue"></i>
                        <p>
                            Order
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../../index.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../index2.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Accepted</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Shipping</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Completed</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/admin/category" class="nav-link"><i class="nav-icon fas fa-th text-yellow"></i>
                        <p>Categories</p></a>
                </li>
                <li class="nav-item">
                    <a href="/admin/product" class="nav-link"><i class="nav-icon fas fa-th"></i>
                        <p>Products</p></a>
                </li>
                <li class="nav-item">
                    <a href="/admin/comment" class="nav-link"><i class="nav-icon fas fa-comment"></i>
                        <p>Comment</p></a>
                </li>
                <li class="nav-item">
                    <a href="/admin/faq" class="nav-link"><i class="nav-icon fas fa-question"></i>
                        <p>FAQ</p></a>
                </li>
                <li class="nav-item">
                    <a href="/admin/messages" class="nav-link"><i class="nav-icon fas fa-mail-bulk"></i>
                        <p>Messages</p></a>
                </li>
                <li class="nav-item">
                    <a href="/admin/user" class="nav-link"><i class="nav-icon fas fa-user text-green"></i>
                        <p>Users</p></a>
                </li>
                <li class="nav-item">
                    <a href="/admin/social" class="nav-link"><i class="nav-icon fas fa-th"></i>
                        <p>Social</p></a>
                </li>
                {{--<li class="nav-header">LABELS</li>--}}
                <li class="nav-item">
                    <a href="/admin/setting" class="nav-link">
                        <i class="nav-icon fas fa-tools "></i>
                        <p class="text">Settings</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>