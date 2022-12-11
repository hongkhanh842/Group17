@extends('layouts.adminbase')

@section('title', 'TÀI KHOẢN')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-3" id="edit">
                    </div>
                    <div class="col-sm-3" id="del">
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
                <h3 class="card-title">Chi tiết tài khoản</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped" id="table-data">
                </table>
            </div>
        </div>
    </section>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function () {
            $.ajax({
                url: "{{ route('api.user.one',[$id])}}",
                dataType: 'json',
                success: function (response) {
                    let each=response.data;

                    let image = '<img src="' + '/storage/' + each.avatar + '" style="height: 150px" ></img>';

                    let edit = '<a href="{{route('admin.user.edit',    ['id'])}}" class="btn btn-block bg-gradient-success">Sửa</a>';
                    edit = edit.replace('id', each.id);
                    let del = '<a href="{{route('admin.user.destroy', ['id'])}}" class="btn btn-block bg-gradient-danger">Xoá</a>';
                    del = del.replace('id', each.id);

                    $('#edit').append(edit);
                    $('#del').append(del);
                    $('#table-data')
                        .append($('<tr>').append($('<th style="width: 300px">').append('ID')).append($('<td>').append(each.id)))
                        .append($('<tr>').append($('<th>').append('Tên'))     .append($('<td>').append(each.name)))
                        .append($('<tr>').append($('<th>').append('Email'))  .append($('<td>').append(each.email)))
                        .append($('<tr>').append($('<th>').append('Avatar'))     .append($('<td>').append(image)))
                        .append($('<tr>').append($('<th>').append('Số điện thoại')).append($('<td>').append(each.phone)))
                        .append($('<tr>').append($('<th>').append('Địa chỉ')).append($('<td>').append(each.address)))
                        .append($('<tr>').append($('<th>').append('Ngày tạo')).append($('<td>').append(convertDateToDateTime(each.created_at))))
                        .append($('<tr>').append($('<th>').append('Ngày cập nhật')).append($('<td>').append(convertDateToDateTime(each.updated_at))))
                },
                error: function (response) {
                }
            })
        });
    </script>
@endpush
