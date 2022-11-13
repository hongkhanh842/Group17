<!-- HEADER -->
<header>

    <!-- header -->
    <div id="header">
        <div class="container">
            <div class="pull-left">
                <!-- Logo -->
                <div class="header-logo">
                    <a class="logo" href="{{route('home')}}">
                        <img src="{{asset('assets')}}/img/logo.png" alt="">
                    </a>
                </div>
                <!-- /Logo -->


            </div>
            <div class="pull-right">
                <ul class="header-btns">
                    <!-- Account -->
                    <li class="header-account dropdown default-dropdown">
                        @auth
                            <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                                <div class="header-btns-icon">
                                    <i class="fa fa-user-o"></i>
                                </div>
                                <strong class="text-uppercase">{{Auth::user()->name}} <i class="fa fa-caret-down"></i></strong>
                            </div>
                            <a href="/logoutuser" class="text-uppercase">Logout</a>
                        @endauth
                        @guest
                            <a href="/loginuser" class="text-uppercase">Login</a> / <a href="/registeruser" class="text-uppercase">Join</a>
                        @endguest
                        <ul class="custom-menu">
                            <li><a href="{{route('userpanel.index')}}"><i class="fa fa-user-o"></i> My Profile</a></li>
                            <li><a href="{{route('userpanel.orders')}}"><i class="fa fa-heart-o"></i> My Orders</a></li>
                            <li><a href="{{route('userpanel.reviews')}}"><i class="fa fa-exchange"></i> My Reviews</a></li>
                            <li><a href="/logout"><i class="fa fa-user-plus"></i> Logout</a></li>
                        </ul>
                    </li>
                    <!-- /Account -->

                    <!-- Cart -->
                    <li class="header-cart">
                        <a href="{{route('shopcart.index')}}" >
                            <div class="header-btns-icon">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="qty">{{\App\Http\Controllers\ShopCartController::countshopcart()}}</span>
                            </div>
                            <strong class="text-uppercase">My Cart:</strong>
                            <br>
                        </a>

                    </li>
                    <!-- /Cart -->

                    <!-- Mobile nav toggle-->
                    <li class="nav-toggle">
                        <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
                    </li>
                    <!-- / Mobile nav toggle -->
                </ul>
            </div>
        </div>
        <!-- header -->
    </div>
    <!-- container -->
</header>
<!-- /HEADER -->
