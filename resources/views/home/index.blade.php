@extends('layouts.frontbase')

@section('title', $setting->title)
@section('description', $setting->description)
@section('icon', \Illuminate\Support\Facades\Storage::url($setting->icon))

@section('slider')
    @include('home.slider')
@endsection

@section('content')
    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            {{--<div class="row">
                <!-- banner -->
                <div class="col-md-4 col-sm-6">
                    <a class="banner banner-1" href="#">
                        <img src="{{asset('assets')}}/img/banner10.jpg" alt="">
                        <div class="banner-caption text-center">
                            <h2 class="white-color">NEW COLLECTION</h2>
                        </div>
                    </a>
                </div>
                <!-- /banner -->

                <!-- banner -->
                <div class="col-md-4 col-sm-6">
                    <a class="banner banner-1" href="#">
                        <img src="{{asset('assets')}}/img/banner11.jpg" alt="">
                        <div class="banner-caption text-center">
                            <h2 class="white-color">NEW COLLECTION</h2>
                        </div>
                    </a>
                </div>
                <!-- /banner -->

                <!-- banner -->
                <div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-3">
                    <a class="banner banner-1" href="#">
                        <img src="{{asset('assets')}}/img/banner12.jpg" alt="">
                        <div class="banner-caption text-center">
                            <h2 class="white-color">NEW COLLECTION</h2>
                        </div>
                    </a>
                </div>
                <!-- /banner -->

            </div>--}}
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section-title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">New Product</h2>
                        <div class="pull-right">
                            <div class="product-slick-dots-1 custom-dots"></div>
                        </div>
                    </div>
                </div>
                <!-- /section-title -->

                <!-- banner -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="banner banner-2">
                        <img src="{{asset('assets')}}/img/banner14.jpg" alt="">
                        <div class="banner-caption">
                            {{--<h2 class="white-color">NEW<br></h2>--}}
                        </div>
                    </div>
                </div>
                <!-- /banner -->

                <!-- Product Slick -->
                <div class="col-md-9 col-sm-6 col-xs-6">
                    <div class="row">
                        <div id="product-slick-1" class="product-slick">

                            @foreach($productlist1 as $rs)
                            <!-- Product Single -->
                            <div class="product product-single">
                                <div class="product-thumb">
                                    <div class="product-label">
                                    {{--    <span>New</span>
                                        <span class="sale">-20%</span>--}}
                                    </div>
                                {{--    <ul class="product-countdown">
                                        <li><span>00 H</span></li>
                                        <li><span>00 M</span></li>
                                        <li><span>00 S</span></li>
                                    </ul>--}}
                                    <a href="{{route('product',['id'=>$rs->id])}}" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</a>
                                    <img src="{{Storage::url($rs->image)}}" style="width:270px; height:360px">
                                </div>
                                <div class="product-body">
                                    <h3 class="product-price">{{$rs->price}}000 VND</h3>

                                   {{-- <div class="product-rating">
                                        <i class="fa fa-star @if ($rs->rate<1) -o empty @endif"></i>
                                        <i class="fa fa-star @if ($rs->rate<2) -o empty @endif"></i>
                                        <i class="fa fa-star @if ($rs->rate<3) -o empty @endif"></i>
                                        <i class="fa fa-star @if ($rs->rate<4) -o empty @endif"></i>
                                        <i class="fa fa-star @if ($rs->rate<5) -o empty @endif"></i>
                                    </div>--}}
                                    <h2 class="product-name"><a href="#">{{$rs->title}}</a></h2>
                                    <div class="product-btn">
                                     {{--   <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                        <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>--}}
                                      {{--  <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>--}}
                                    </div>
                                </div>
                            </div>
                            <!-- /Product Single -->
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- /Product Slick -->
            </div>
            <!-- /row -->

        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection
