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
                    <div class="shiping-methods">
                        <div class="section-title">
                            <h4 class="title">Danh sách đơn hàng</h4>
                        </div>
                        <div class="input-checkbox">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">Id</th>
                                    <th>Tên</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                    <th>Địa chỉ</th>
                                    <th>Trang thái</th>
                                    <th>Xem</th>
                                    <th>Huỷ</th>
                                    <th style="width: 40px">Xóa</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $data as $rs)
                                    <tr>
                                        <td>{{$rs->id}}</td>
                                        <td> {{$rs->name}}  </td>
                                        <td>{{$rs->phone}} </td>
                                        <td>{{$rs->email}} </td>
                                        <td>{{$rs->address}} </td>
                                        <td>{{$rs->status}} </td>
                                        <td>
                                            <a href="{{route('order.show',['id'=>$rs->id])}}" class="btn btn-block btn-info btn-sm">Xem
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{route('order.cancel',['id'=>$rs->id])}}" class="btn btn-block btn-success btn-sm">Huỷ
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{--{{route('userpanel.orderdetail',['id'=>$rs->id])}}--}}" class="btn btn-block btn-danger btn-sm">Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection
