@extends('layouts.adminbase')

@section('title', 'SẢN PHẨM')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-3">
                        <a href="{{route('admin.product.edit',[$id])}}" class="btn btn-block bg-gradient-info"
                           style="width: 200px">Sửa</a>
                    </div>
                    <div class="col-sm-3">
                        <a href="{{route('admin.product.destroy',[$id])}}"
                           onclick="return confirm('Deleting !! Are you sure ?')"
                           class="btn btn-block bg-gradient-danger" style="width: 200px">Xoá</a>
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
                    <h3 class="card-title">Thông tin chi tiết</h3>
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
                url: '{{ route('api.product.one',[$id]) }}',
                dataType: 'json',
                success: function (response) {
                        let each= response.data;
                            let image = '<img src="' + '/storage/' + each.image + '" style="height: 150px" ></img>';

                            $('#table-data')
                                .append($('<tr>').append($('<th style="width: 200px">').append('ID')).append($('<td>').append(each.id)))
                                .append($('<tr>').append($('<th>').append('Danh mục'))     .append($('<td>').append(each.category.name)))
                                .append($('<tr>').append($('<th>').append('Tên'))     .append($('<td>').append(each.name)))
                                .append($('<tr>').append($('<th>').append('Giá'))  .append($('<td>').append(getPrice(each.price))))
                                .append($('<tr>').append($('<th>').append('Số lượng'))  .append($('<td>').append(each.quantity)))
                                .append($('<tr>').append($('<th>').append('RAM'))  .append($('<td>').append(each.ram)))
                                .append($('<tr>').append($('<th>').append('CPU'))  .append($('<td>').append(each.cpu)))
                                .append($('<tr>').append($('<th>').append('SSD'))  .append($('<td>').append(each.ssd)))
                                .append($('<tr>').append($('<th>').append('Nhu cầu'))  .append($('<td>').append(each.use)))
                                .append($('<tr>').append($('<th>').append('Chi tiết'))  .append($('<td>').append(each.detail)))
                                .append($('<tr>').append($('<th>').append('Hình ảnh'))     .append($('<td>').append(image)))
                                .append($('<tr>').append($('<th>').append('Được tạo lúc')).append($('<td>').append(convertDateToDateTime(each.created_at))))
                                .append($('<tr>').append($('<th>').append('Cập nhật lúc')).append($('<td>').append(convertDateToDateTime(each.updated_at))))
                },
                error: function (response) {
                }
            })
        });
    </script>
@endpush
