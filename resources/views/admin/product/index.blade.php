@extends('layouts.adminbase')

@section('title', 'SẢN PHẨM')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <a href="{{route('admin.product.create')}}" class="btn btn-block bg-gradient-info" style="width: 200px">Thêm sản phẩm</a>
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
                    <h3 class="card-title">DANH SÁCH SẢN PHẨM</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="table-data">
                        <thead>
                        <tr>
                            <th style="width: 10px">Id</th>
                            <th>Thuộc danh mục</th>
                            <th>Tên</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Hình ảnh</th>
                            <th>Các hình ảnh khác</th>
                            <th style="width: 40px">Xem</th>
                            <th style="width: 40px">Sửa</th>
                            <th style="width: 40px">Xoá</th>
                        </tr>
                        </thead>
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

@push('js')
    <script>
        $(document).ready( async function () {

            $.ajax({
                url: '{{ route('api.product.full') }}',
                dataType: 'json',
                data: {page: {{ request()->get('page') ?? 1 }}},

                success: function (response) {
                    response.data.data.forEach(function (each) {

                        let image = '<img src="'+'/storage/' + each.image +'" style="height: 40px" ></img>' ;
                        let gallery = '<a href="{{route('admin.image.index',['pid'])}}"><img src="{{asset('assets')}}/admin/img/gallery.png" style="height: 40px"></a>'
                        gallery = gallery.replace('pid', each.id)

                        let edit = '<a href="{{route('admin.product.edit',    ['id'])}}" class="btn btn-block btn-success btn-sm">Sửa</a>';
                        edit = edit.replace('id',each.id);
                        let del  = '<a href="{{route('admin.product.destroy', ['id'])}}" class="btn btn-block btn-danger btn-sm">Xoá</a>';
                        del = del.replace('id',each.id);
                        let show = '<a href="{{route('admin.product.show',    ['id'])}}" class="btn btn-block btn-info btn-sm">Xem</a>';
                        show = show.replace('id',each.id);

                        $('#table-data').append($('<tr>')
                            .append($('<td>').append(each.id))
                            .append($('<td>').append(each.category.name))
                            .append($('<td>').append(each.name))
                            .append($('<td>').append(getPrice(each.price)))
                            .append($('<td>').append(each.quantity))
                            .append($('<td>').append(image))
                            .append($('<td>').append(gallery))
                            .append($('<td>').append(show))
                            .append($('<td>').append(edit))
                            .append($('<td>').append(del))
                        );

                    });
                    renderPagination(response.data.pagination);
                },
                error: function (response) {
                }
            })
            $(document).on('click', '#pagination > li > a', function (event) {
                event.preventDefault();
                let page = $(this).text();
                let urlParams = new URLSearchParams(window.location.search);
                urlParams.set('page', page);
                window.location.search = urlParams;
            });
        });
    </script>
@endpush
