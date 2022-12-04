@extends('layouts.frontbase')

@section('title', 'ĐƠN HÀNG')


@section('content')
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Trang chủ</a></li>
                <li class="active">Đơn hàng</li>
            </ul>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">QUẢN LÝ</h3>
                        </div>
                        @include('home.user.menu')
                    </div>
                </div>

                <div class="col-md-10">
                    <div class="order-summary clearfix">
                        <div class="section-title">
                            <h3 class="title">Thông tin đơn hàng</h3>
                        </div>

                        <table class="shopping-cart-table table">
                            <tr>
                                <th>Tên người nhận :</th> <td>{{$order->name}}</td>
                            </tr>
                            <tr>
                                <th>Số điện thoại người nhận :</th> <td>{{$order->phone}}</td>
                            </tr>
                            <tr>
                                <th>Email người nhận :</th> <td>{{$order->email}}</td>
                            </tr>
                            <tr>
                                <th>Địa chỉ người nhận :</th> <td>{{$order->address}}</td>
                            </tr>
                            <tr>
                                <th>Ghi chú của cửa hàng :</th> <td>{{$order->note}}</td>
                            </tr>
                            <tr>
                                <th>Trạng thái :</th> <td>{{$order->status}}</td>
                            </tr>
                        </table>

                        <table class="shopping-cart-table table">
                            <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Tên</th>
                                <th class="text-center">Giá</th>
                                <th class="text-center">Số lượng</th>
                                <th class="text-center">Tổng tiền</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orderproducts as $rs)
                                {{--@php dd($rs->product) @endphp--}}
                                <tr>
                                    <td class="thumb"><img src="{{Storage::url($rs->product->image)}}" alt=""></td>
                                    <td class="details">
                                        <a href="#">{{$rs->product->name}}</a>
                                    </td>
                                    <td class="price text-center"><strong>${{$rs->product->price}}</strong><br><del class="font-weak"></del></td>
                                    <td class="qty text-center">{{$rs->quantity}} </td>
                                    <td class="total text-center"><strong class="primary-color">${{$rs->total}}</strong></td>
                                    <td class="text-right">
                                      {{--  @if ($rs->status == "Mới")
                                            <a href="{{route('userpanel.cancelproduct',['id'=>$rs->id ] )}}" class="main-btn icon-btn"
                                               onclick="return confirm('Cancel !! Are you sure ?')"><i class="fa fa-close"></i></a>
                                        @endif--}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th class="empty" colspan="3"></th>
                                <th>Tổng tiền</th>
                                <th colspan="2" class="total">${{$order->total}}</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection
