@extends('layouts.adminbase')

@section('title', 'ĐƠN HÀNG')

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
                            <li class="breadcrumb-item active">Đơn hàng</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách đơn hàng</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="table-data">
                        <thead>
                        <tr>
                            <th style="width: 10px">Id</th>
                            <th>Tên tài khoản</th>
                            <th>Tên khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Tổng tiền</th>
                            <th>Ghi chú</th>
                            <th>Trạng thái</th>
                            <th style="width: 40px">Xem</th>
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
        $(document).ready(function () {
            $.ajax({
                url: '{{ route('api.order.full') }}',
                dataType: 'json',
                data: {page: {{ request()->get('page') ?? 1 }}},

                success: function (response) {
                    response.data.data.forEach(function (each) {

                        let show = '<a href="{{route('admin.order.show', ['id'])}}" class="btn btn-block btn-info btn-sm">Xem</a>';
                        show = show.replace('id',each.id);

                        let user = '<a href="{{route('admin.user.show',['id'=>'each.user_id'])}}">each.user.name</a>'
                        user = user.replace('each.user.name',each.user.name);
                        user = user.replace('each.user_id',each.user_id);

                        $('#table-data').append($('<tr>')
                            .append($('<td>').append(each.id))
                            .append($('<td>').append(user))
                            .append($('<td>').append(each.name))
                            .append($('<td>').append(each.phone))
                            .append($('<td>').append(each.email))
                            .append($('<td>').append(each.address))
                            .append($('<td class="text-right">').append(getPrice(each.total)))
                            .append($('<td>').append(each.note))
                            .append($('<td>').append(each.status))
                            .append($('<td>').append(show))
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
