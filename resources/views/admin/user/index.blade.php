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
                    <table class="table table-bordered" id="table-data">
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

@push('js')
    <script>
        $(document).ready(function () {
            $.ajax({
                url: '{{ route('api.user.full') }}',
                dataType: 'json',
                data: {page: {{ request()->get('page') ?? 1 }}},
                success: async function (response) {
                    response.data.data.forEach(function (each) {

                        let image = '<img src="' + '/storage/' + each.avatar + '" style="height: 40px" ></img>';

                        let edit = '<a href="{{route('admin.user.edit',    ['id'])}}" class="btn btn-block btn-success btn-sm">Sửa</a>';
                        edit = edit.replace('id', each.id);
                        let del = '<a href="{{route('admin.user.destroy', ['id'])}}" class="btn btn-block btn-danger btn-sm">Xoá</a>';
                        del = del.replace('id', each.id);
                        let show = '<a href="{{route('admin.user.show',    ['id'])}}" class="btn btn-block btn-info btn-sm">Xem</a>';
                        show = show.replace('id', each.id);

                        $('#table-data').append($('<tr>')
                            .append($('<td>').append(each.id))
                            .append($('<td>').append(each.name))
                            .append($('<td>').append(each.email))
                            .append($('<td>').append(image))
                            .append($('<td>').append(getRoleByKey(each.role)))
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
