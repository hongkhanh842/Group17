@extends('layouts.adminbase')

@section('title', 'TÀI KHOẢN')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <a href="{{route('admin.user.create')}}" class="btn btn-block bg-gradient-info"
                           style="width: 200px">Thêm tài khoản</a>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Tài khoản</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách tài khoản</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px">Id</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Ảnh đại diện</th>
                            <th>Quyền</th>
                            <th style="width: 40px">Xem</th>
                            <th style="width: 40px">Sửa</th>
                            <th style="width: 40px">Xoá</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $data as $rs)
                            <tr>
                                <td>{{$rs->id}}</td>
                                <td>{{$rs->name}} </td>
                                <td>{{$rs->email}} </td>
                                <td><img src="{{$rs->avatar}}" style="height: 40px" ></img></td>
                                <td>{{getRoleByKey($rs->role)}}</td>

                                <td>
                                    <a href="{{route('admin.user.show',['id'=>$rs->id])}}" class="btn btn-block btn-info btn-sm">
                                        Xem
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('admin.user.edit',['id'=>$rs->id])}}" class="btn btn-block btn-success btn-sm">
                                        Sửa
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('admin.user.destroy',['id'=>$rs->id])}}" class="btn btn-block btn-danger btn-sm">
                                        Xoá
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right" id="pagination">
                    </ul>
                </div>
            </div>

        </section>
    </div>
@endsection
