@extends('layouts.frontbase')

@section('title', 'GIỎ HÀNG')


@section('content')
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Trang chủ</a></li>
                <li class="active">Giỏ hàng</li>
            </ul>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="row">

                <div class="col-md-2">
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">Quản lý</h3>
                        </div>
                     {{--   @include('home.user.usermenu')--}}
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="order-summary clearfix">
                        <div class="section-title">
                            <h3 class="title">Danh sách giỏ hàng</h3>
                        </div>
                        <table class="shopping-cart-table table">
                            <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Tên</th>
                                <th class="text-center">Giá</th>
                                <th class="text-center">Số lượng</th>
                                <th class="text-center">Tổng tiền</th>
                                <th class="text-right"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $total=0;
                            @endphp
                            {{--@if ($errors->has('quantity'))
                                <span class="alert alert-danger">
                                {{ $errors->first('quantity') }}
                            </span>
                            @endif--}}
                            @foreach($data as $rs)
                                <tr>
                                    <td class="thumb"><img src="{{Storage::url($rs->product->image)}}" alt=""></td>
                                    <td class="details">
                                        <a href="#">{{$rs->product->name}}</a>
                                    </td>
                                    <td class="price text-center"><strong>{{$rs->product->price}}.000 VND</strong><br><del class="font-weak"></del></td>
                                    <td class="qty text-center">
                                        <form action="{{route('shopcart.update',['id' => $rs->id])}}" method="post">
                                            @csrf
                                            <input  name="quantity" type="number" value="{{$rs->quantity}}" min='1' max="{{$rs->product->quantity}}" onchange="this.form.submit()">
                                        </form>
                                    </td>
                                    <td class="total text-center"><strong class="primary-color">{{$rs->product->price * $rs->quantity }}.000 VND</strong></td>
                                    <td class="text-right">
                                        <a href="{{route('shopcart.destroy',['id'=>$rs->id])}}" class="main-btn icon-btn"
                                           onclick="return confirm('Bạn có chắn chắn muốn xoá không?')"><i class="fa fa-close"></i></a>
                                    </td>
                                </tr>
                                @php
                                    $total += $rs->product->price * $rs->quantity;
                                @endphp
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th class="empty" colspan="3"></th>
                                <th>Tổng tiền</th>
                                <th colspan="2" class="total">{{$total}}.000 VND</th>
                            </tr>
                            </tfoot>
                        </table>
                        <div class="pull-right">
                            <form action="{{route("order.index")}}" method="post">
                                @csrf
                                <input name="total" value="{{$total}}" type="hidden">
                                <button type="submit" class="primary-btn">Đặt hàng</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
