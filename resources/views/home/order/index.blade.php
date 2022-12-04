@extends('layouts.frontbase')

@section('title', 'ĐẶT HÀNG')

@section('content')
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Trang chủ</a></li>
                <li class="active">Đặt hàng</li>
            </ul>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="row">
                {{--@include('home.messages')--}}
                <form id="checkout-form" action="{{route("order.store")}}" class="clearfix" method="post">
                    @csrf
                    <div class="col-md-6">
                        <div class="billing-details">
                            <div class="section-title">
                                <h4 class="title">Thông tin giao hàng</h4>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="name" value="{{Auth::user()->name}}" placeholder="Nhập tên người nhận" required>
                            </div>
                            <div class="form-group">
                                <input class="input" type="tel" name="phone" value="{{Auth::user()->phone}}" placeholder="Nhập số điện thoại người nhận" required>
                            </div>
                            <div class="form-group">
                                <input class="input" type="email" name="email" value="{{Auth::user()->email}}" placeholder="Nhập email người nhận">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="address" value="{{Auth::user()->address}}" placeholder="Nhập địa chỉ người nhận" required>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="primary-btn">Thanh toán khi nhận hàng</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="shiping-methods">
                            <div class="section-title">
                                <h4 class="title">Thông tin thanh toán [ {{$total}}000 VND ]</h4>
                            </div>
                            <div class="input-checkbox">
                                <div class="form-group">
                                    <input class="input"  type="hidden" name="total" value="{{$total}}">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="tel" name="holder" placeholder="Card Holder">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="number" name="number" placeholder="Card Number">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="date" placeholder="Exp. Date">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="code" placeholder="Security Code">
                                </div>
                                <div class="pull-right">
                                    <a href="#" class="primary-btn">Thanh toán PayPal</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
