@extends('layouts.adminbase')

@section('title', 'SẢN PHẢM: KHO ẢNH')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Sản phẩm</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Kho ảnh: {{$product->name}}</h3>
                </div>
                <div class="card-body">
                    @include('admin.image.create')
                    <br>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px">Id</th>
                            <th>Tên</th>
                            <th>Hình ảnh</th>
                            <th style="width: 40px">Xoá</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $images as $rs)
                            <tr>
                                <td>{{$rs->id}}</td>
                                <td>{{$rs->name}} </td>
                                <td>
                                    @if ($rs->image)
                                        <img src="{{Storage::url($rs->image)}}" style="height: 100px">
                                    @endif
                                </td>
                                <td><a href="{{route('admin.image.destroy',['pid'=>$product->id,'id'=>$rs->id])}}" class="btn btn-block btn-danger btn-sm"
                                       onclick="return confirm('Deleting !! Are you sure ?')">Xoá</a>  </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
