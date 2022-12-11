<nav class="navbar navbar-default navbar-transparent navbar-fixed-top navbar-color-on-scroll" color-on-scroll=" "
     id="sectionsNav">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('home')}}">LAPTOP HOUSE</a>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-left">
              {{--  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="material-icons">apps</i> Danh mục
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-with-icons">
                        <li>
                            <a href="">
                                <i class="material-icons">label</i> Tên danh mục
                            </a>
                        </li>
                    </ul>
                </li>--}}
                <li>
                    <a href="{{route('product.index')}}">
                        <i class="material-icons">laptop</i> Sản phẩm
                    </a>
                </li>
                <li>
                    <form class="navbar-form navbar-right" role="search">
                        <div class="form-group form-white is-empty">
                            <input type="text" class="form-control" placeholder="Tìm kiếm">
                            <span class="material-input"></span></div>
                        <button type="submit" class="btn btn-white btn-raised btn-fab btn-fab-mini"><i
                                class="material-icons">search</i></button>
                    </form>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @guest
                    <li>
                        <a href="" data-toggle="modal" data-target="#signupModal">
                            <i class="material-icons">person_add</i>Đăng ký
                        </a>
                    </li>
                    <li>
                        <a href="" data-toggle="modal" data-target="#loginModal">
                            <i class="material-icons">login</i> Đăng Nhập
                        </a>
                    </li>
                @endguest
                @auth
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="material-icons">account_circle</i>{{Auth::user()->name}}
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-with-icons">
                            <li>
                                <a href="{{route('user.index')}}">
                                    <i class="material-icons">manage_accounts</i> Tài khoản
                                </a>
                                <a href="{{route('user.orders')}}">
                                    <i class="material-icons">inventory_2</i> Đơn hàng
                                </a>
                                <a href="{{route('logout')}}">
                                    <i class="material-icons">logout</i> Đăng xuất
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="button-container ">
                        <a href="{{route('cart.index')}}" {{--target="_blank"--}} class="btn btn-success btn-round">
                            <i class="material-icons">shopping_cart</i> Giỏ hàng:
                            <span>
                               1
                           </span>
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

@guest
    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
                <div class="card card-signup card-plain">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                                class="material-icons">clear</i></button>

                        <div class="header header-primary text-center">
                            <h4 class="card-title">ĐĂNG NHẬP BẰNG:</h4>
                            <div class="social-line">
                                <a href="{{ route('auth.redirect', 'facebook') }}" class="btn btn-just-icon btn-simple">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                                <a href="{{ route('auth.redirect', 'github') }}" class="btn btn-just-icon btn-simple">
                                    <i class="fa fa-github"></i>
                                </a>
                                <a href="{{ route('auth.redirect', 'google') }}" class="btn btn-just-icon btn-simple">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <form class="form" method="post" action="{{route('logging')}}" id="login">
                            @csrf
                            <p class="description text-center">Hoặc</p>
                            <div class="card-content">

                                <div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">email</i>
								</span>
                                    <input type="text" class="form-control" placeholder="Email..." name="email">
                                </div>

                                <div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">lock_outline</i>
								</span>
                                    <input type="password" placeholder="Mật khẩu" class="form-control" name="password">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer text-center">
                        <button onclick="form_login_submit()" class="btn btn-primary btn-simple btn-wd btn-lg">Đăng nhập</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  End Modal -->
    <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
                <div class="card card-signup card-plain">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                                class="material-icons">clear</i></button>

                        <div class="header header-primary text-center">
                            <h4 class="card-title">ĐĂNG NHẬP BẰNG:</h4>
                            <div class="social-line">
                                <a href="{{ route('auth.redirect', 'facebook') }}" class="btn btn-just-icon btn-simple">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                                <a href="{{ route('auth.redirect', 'github') }}" class="btn btn-just-icon btn-simple">
                                    <i class="fa fa-github"></i>
                                </a>
                                <a href="{{ route('auth.redirect', 'google') }}" class="btn btn-just-icon btn-simple">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <form class="form" method="post" action="{{route('registering')}}" id="register">
                            @csrf
                            <p class="description text-center">Hoặc đăng ký</p>
                            <div class="card-content">
                                <div class="input-group">
                                    <span class="input-group-addon">
											<i class="material-icons">face</i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Tên tài khoản..." name="name">
                                </div>

                                <div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">email</i>
								</span>
                                    <input type="text" class="form-control" placeholder="Email..." name="email">
                                </div>

                                <div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">lock_outline</i>
								</span>
                                    <input type="password" placeholder="Mật khẩu" class="form-control" name="password">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer text-center">
                        <button onclick="form_register_submit()" class="btn btn-primary btn-simple btn-wd btn-lg">Đăng ký</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  End Modal -->
    @push('js')
        <script type="text/javascript">
            function form_register_submit() {
                document.getElementById("register").submit();
            }
            function form_login_submit() {
                document.getElementById("login").submit();
            }
        </script>
    @endpush
@endguest

