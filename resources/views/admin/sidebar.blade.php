<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{route('admin.index')}}" class="brand-link">
        <img src="{{asset('assets')}}/admin/img/AdminLTELogo.png"
             alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">TRANG QUẢN TRỊ</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
               {{-- <img src="{{asset('assets')}}/admin/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">--}}
            </div>
            <div class="info">
                <a class="d-block text-bold">{{ Auth::user()->name }} </a>
                <a href="{{route('admin.logout')}}" class="text-uppercase text-danger">Đăng xuất</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="/admin" class="nav-link"><i class="nav-icon fas fa-home text-yellow"></i>Thống kê</a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-box-open text-blue"></i>
                        <p>
                            Đơn hàng
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.order.index',['new'])}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Mới</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.order.index',['accepted'])}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Đã xác nhận</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.order.index',['shipping'])}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Đang giao</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.order.index',['shipped'])}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Đã giao</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.order.index',['cancel'])}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Đã huỷ</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.category.index')}}" class="nav-link"><i class="nav-icon fas fa-th text-yellow"></i>Danh mục</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.product.index')}}" class="nav-link"><i class="nav-icon fas fa-th"></i>Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.user.index')}}" class="nav-link"><i class="nav-icon fas fa-user text-green"></i>Tài khoản</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
