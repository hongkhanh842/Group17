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
                <div class="col-md-2">
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">Quản lý</h3>
                        </div>
                        @include('home.user.menu')
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="order-summary clearfix">
                        <div class="section-title">
                            <h3 class="title">Thông tin tài khoản</h3>
                        </div>
                        <div class="input-checkbox">
                           <form action="{{route('user.update')}}" method="post">
                               @csrf
                               <input name="name" value="{{Auth::user()->name}}">
                               <button type="submit">Cập nhật</button>
                           </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
