@extends('layouts.frontbase')

@section('title', 'TÀI KHOẢN')


@section('content')
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Trang chủ</a></li>
                <li class="active">Tài khoản</li>
            </ul>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 accountInfoManage">
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">Quản lý</h3>
                        </div>
                        @include('home.user.menu')
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="order-summary clearfix">
                        <div class="section-title">
                            <h3 class="title">Thông tin tài khoản</h3>
                        </div>
                        <div class="accountInfo">
                           <form action="{{route('user.update')}}" method="post">
                               @csrf
                               <img src="{{Auth::user()->avatar}}" width="32px">
                               <br>
                               <label for="name">Tên khách hàng:</label>
                               <input class="form-control" name="name" value="{{Auth::user()->name}}">
                               <br>
                               <label for="password">Nhập mật khẩu mới:</label>
                               <input class="form-control" name="password" placeholder="Nhập mật khẩu mới">
                               <br>
                               <label for="phone">Số điện thoại:</label>
                               <input class="form-control" name="phone" value="{{Auth::user()->phone}}" placeholder="Nhập số điện thoại">
                               <br>
                               <label for="email">Email:</label>
                               <input class="form-control" name="email" value="{{Auth::user()->email}}" placeholder="Nhập email">
                               <br>
                               
                               <label for="address">Địa chỉ:</label>
                               <input class="form-control" name="address" value="{{Auth::user()->address}}" placeholder="Nhập địa chỉ">
                               <br>
                               <button class="btn btn-primary" type="submit">Cập nhật</button>
                           </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
