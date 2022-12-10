@extends('layouts.frontbase')
@section('content')
    <div class="main main-raised">
        <div class="section">
            <div class="container">
                <h2 class="section-title">Danh mục bán chạy</h2>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">

                        <!-- Carousel Card -->
                        <div class="card card-raised card-carousel">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <div class="carousel slide" data-ride="carousel">

                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="2"
                                            class="active"></li>
                                    </ol>

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                        <div class="item">
                                            <img src="{{asset('assets')}}/home/img/bg2.jpg" alt="Awesome Image">
                                            <div class="carousel-caption">
                                                <h4><i class="material-icons">location_on</i> Yellowstone National Park,
                                                    United States</h4>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <img src="{{asset('assets')}}/home/img/bg3.jpg" alt="Awesome Image">
                                            <div class="carousel-caption">
                                                <h4><i class="material-icons">location_on</i> Somewhere Beyond, United
                                                    States</h4>
                                            </div>
                                        </div>
                                        <div class="item active">
                                            <img src="{{asset('assets')}}/home/img/bg.jpg" alt="Awesome Image">
                                            <div class="carousel-caption">
                                                <h4><i class="material-icons">location_on</i> Yellowstone National Park,
                                                    United States</h4>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Controls -->
                                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                        <i class="material-icons">keyboard_arrow_left</i>
                                    </a>
                                    <a class="right carousel-control" href="#carousel-example-generic"
                                       data-slide="next">
                                        <i class="material-icons">keyboard_arrow_right</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- End Carousel Card -->

                    </div>
                </div>
            </div>
             <div class="container tim-container">
                 <div id="contentAreas" class="cd-section">
                     Trang chủ
                 </div>
             </div>
            <div class="container">
                <h2 class="section-title">Sản phẩm mới</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-product card-plain">
                            <div class="card-image">
                                <a href="#pablo">
                                    <img src="../assets/img/examples/gucci.jpg" alt="">
                                </a>
                                <div class="colored-shadow"
                                     style="background-image: url(&quot;../assets/img/examples/gucci.jpg&quot;); opacity: 1;"></div>
                            </div>
                            <div class="card-content">
                                <h4 class="card-title">
                                    <a href="#pablo">Gucci</a>
                                </h4>
                                <p class="card-description">The structured shoulders and sleek detailing ensure a sharp
                                    silhouette. Team it with a silk pocket square and leather loafers.</p>
                                <div class="footer">
                                    <div class="price-container">
                                        <span class="price price-old"> €1,430</span>
                                        <span class="price price-new"> €743</span>
                                    </div>
                                    <div class="stats">
                                        <button type="button" rel="tooltip" title=""
                                                class="btn btn-just-icon btn-simple btn-rose"
                                                data-original-title="Saved to Wishlist">
                                            <i class="material-icons">favorite</i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-product card-plain">
                            <div class="card-image">
                                <a href="#pablo">
                                    <img src="../assets/img/examples/dolce.jpg" alt="">
                                </a>
                                <div class="colored-shadow"
                                     style="background-image: url(&quot;../assets/img/examples/dolce.jpg&quot;); opacity: 1;"></div>
                            </div>

                            <div class="card-content">
                                <h4 class="card-title">
                                </h4><h4 class="card-title">Dolce &amp; Gabbana</h4>

                                <p class="card-description">The structured shoulders and sleek detailing ensure a sharp
                                    silhouette. Team it with a silk pocket square and leather loafers.</p>
                                <div class="footer">
                                    <div class="price-container">
                                        <span class="price price-old"> €1,430</span>
                                        <span class="price price-new">€743</span>
                                    </div>
                                    <div class="stats">
                                        <button type="button" rel="tooltip" title=""
                                                class="btn btn-just-icon btn-simple btn-rose"
                                                data-original-title="Saved to Wishlist">
                                            <i class="material-icons">favorite</i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="card card-product card-plain">
                            <div class="card-image">
                                <a href="#pablo">
                                    <img src="../assets/img/examples/tom-ford.jpg" alt="">
                                </a>
                                <div class="colored-shadow"
                                     style="background-image: url(&quot;../assets/img/examples/tom-ford.jpg&quot;); opacity: 1;"></div>
                            </div>

                            <div class="card-content">
                                <h4 class="card-title">
                                </h4><h4 class="card-title">Dolce &amp; Gabbana</h4>

                                <p class="card-description">The structured shoulders and sleek detailing ensure a sharp
                                    silhouette. Team it with a silk pocket square and leather loafers.</p>
                                <div class="footer">
                                    <div class="price-container">
                                        <span class="price price-old"> €1,430</span>
                                        <span class="price price-new">€743</span>
                                    </div>
                                    <div class="stats">
                                        <button type="button" rel="tooltip" title=""
                                                class="btn btn-just-icon btn-simple btn-rose"
                                                data-original-title="Saved to Wishlist">
                                            <i class="material-icons">favorite</i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
