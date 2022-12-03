@extends('layouts.frontbase')

{{--@section('title', $setting->title)
@section('description', $setting->description)
@section('icon', \Illuminate\Support\Facades\Storage::url($setting->icon))--}}

@section('slider')
    @include('home.slider')
@endsection

@section('content')
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Sản phẩm mới</h2>
                        <div class="pull-right">
                            <div class="product-slick-dots-1 custom-dots"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="banner banner-2">
                        <img src="{{asset('assets')}}/img/banner14.jpg" alt="">
                    </div>
                </div>

                <div class="col-md-9 col-sm-6 col-xs-6">
                    <div class="row">
                        <div id="product-slick-1" class="product-slick">

                            @foreach($productlist1 as $rs)
                            <div class="product product-single">
                                <div class="product-thumb">
                                    <div class="product-label">
                                    </div>
                                    <ul class="product-countdown">
                                    </ul>
                                    <a href="{{route('product.show',['id'=>$rs->id])}}" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Xem</a>
                                    <img src="{{Storage::url($rs->image)}}" style="width:270px; height:360px">
                                </div>
                                <div class="product-body">
                                    <h3 class="product-price">{{$rs->price}}.000 VND</h3>

                                    <div class="product-rating">
                                        <i class="fa fa-star @if ($rs->rate<1) -o empty @endif"></i>
                                        <i class="fa fa-star @if ($rs->rate<2) -o empty @endif"></i>
                                        <i class="fa fa-star @if ($rs->rate<3) -o empty @endif"></i>
                                        <i class="fa fa-star @if ($rs->rate<4) -o empty @endif"></i>
                                        <i class="fa fa-star @if ($rs->rate<5) -o empty @endif"></i>
                                    </div>
                                    <h2 class="product-name"><a href="{{route('product.show',['id'=>$rs->id])}}">{{$rs->name}}</a></h2>
                                    <div class="product-btn">
                                        <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
