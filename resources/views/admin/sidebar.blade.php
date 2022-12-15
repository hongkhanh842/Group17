<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{route('admin.index')}}" class="brand-link">
        @if(Auth::user()->role == "0")
            <img src="{{asset('assets')}}/admin/img/AdminLTELogo.png"
                 alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">TRANG QUẢN TRỊ</span>
        @endif
        @if(Auth::user()->role == "3")
            <img src="{{asset('assets')}}/admin/img/ship.jpg"
                 alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">TRANG SHIPPER</span>
        @endif
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/storage/{{Auth::user()->avatar}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a class="d-block text-bold">{{ Auth::user()->name }} </a>
                <a href="{{route('admin.logout')}}" class="d-block text-uppercase text-danger">Đăng xuất</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('admin.index')}}" class="nav-link"><i class="nav-icon fas fa-home text-orange"></i>
                        <p>Thống kê</p></a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.order.index')}}" class="nav-link"><i
                            class="nav-icon fas fa-box-open text-cyan"></i>
                        <p>Đơn hàng</p></a>
                </li>
                @if(isAdmin() || isManager())
                    <li class="nav-item">
                        <a href="{{route('admin.category.index')}}" class="nav-link"><i
                                class="nav-icon fas fa-th text-green"></i>
                            <p>Danh mục</p></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.product.index')}}" class="nav-link"><i
                                class="nav-icon fas fa-th text-yellow"></i>
                            <p>Sản phẩm</p></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.user.index')}}" class="nav-link"><i
                                class="nav-icon fas fa-user text-red"></i>
                            <p>Tài khoản</p></a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>
