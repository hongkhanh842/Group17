@extends('layouts.adminbase')

@section('title', 'TÀI KHOẢN')

@section('content')
    <div class="content-wrapper">

    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail User Data</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-striped">
                    <tr>
                        <th style="width: 200px">Id</th>
                        <td>{{$data->id}}</td>
                    </tr>

                    <tr>
                        <th>Tên</th>
                        <td>{{$data->name}}</td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td>{{$data->email}}</td>
                    </tr>
                    <tr>
                        <th>Ảnh đại diện</th>
                        <td> <img src="{{$data->avatar}}" style="height: 150px" ></img></td>
                    </tr>
                    <tr>
                        <th>Địa chỉ</th>
                        <td>{{$data->address}}</td>
                    </tr>
                    <tr>
                        <th>Quyền</th>
                        <td>

                           {{getRoleByKey($data->role)}}
                           {{-- <form action="{{route('admin.user.update',[$id])}}" method="post">
                                <select class="form-control select2" name="role" style="width: 100%;">
                                    <option value="2" selected="selected">Quản lí</option>
                                    <option value="3">Shipper</option>
                                </select>
                                <button type="submit" class="btn btn-block bg-gradient-success">Cập nhật quyền</button>
                            </form>--}}
                        </td>
                    </tr>
                    <tr>
                        <th >Được tạo lúc</th>
                        <td>{{$data->created_at}}</td>
                    </tr>
                    <tr>
                        <th >Cập nhật lúc</th>
                        <td>{{$data->updated_at}}</td>
                    </tr>


                </table>
            </div>
        </div>


    </section>
    </div>
@endsection
