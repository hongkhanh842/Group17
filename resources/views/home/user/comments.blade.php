@extends('layouts.frontbase')

@section('title', 'ĐÁNH GIÁ')


@section('content')
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Trang chủ</a></li>
                <li class="active">User Comment</li>
            </ul>
        </div>
    </div>

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
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
                            <h4 class="title">Đánh giá</h4>
                        </div>
                        <div class="input-checkbox">

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">Id</th>

                                    <th>Sản phẩm</th>
                                    <th>Chủ đề</th>
                                    <th>Nội dung</th>
                                    <th>Đánh giá</th>
                                    <th>Trạng thái</th>

                                    <th style="width: 40px">Xoá</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $comments as $rs)
                                    <tr>
                                        <td>{{$rs->id}}</td>
                                        <td><a href="{{route('product.show',['id'=>$rs->product_id])}}">
                                                {{$rs->product->name}}</a>
                                        </td>

                                        <td>{{$rs->subject}} </td>
                                        <td>{{$rs->review}} </td>
                                        <td>{{$rs->rate}} </td>
                                        <td>{{$rs->status}} </td>


                                        <td><a href="{{route('user.destroy',['id'=>$rs->id])}}" class="btn btn-block btn-danger btn-sm"
                                               onclick="return confirm('Bạn có chắc muốn xoá đánh giá này')">Xoá</a>  </td>

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
