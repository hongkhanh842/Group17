@extends('layouts.adminbase')

@section('title', 'Order List')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Order List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Order List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="table-data">
                        <thead>
                        <tr>
                            <th style="width: 10px">Id</th>
                            <th>User</th>
                            <th>Name & Surname</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Amount</th>
                            <th>Admin Note</th>
                            <th>Status</th>
                            <th style="width: 40px">Show</th>
                            <th style="width: 40px">Delete</th>
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
                url: '{{ route('api.order') }}',
                dataType: 'json',
                data: {page: {{ request()->get('page') ?? 1 }}},

                success: function (response) {
                    response.data.data.forEach(function (each) {

                        let del  = '<a href="{{route('admin.order.destroy', ['id'])}}" class="btn btn-block btn-danger btn-sm">Delete</a>';
                        del = del.replace('id',each.id);
                        let show = '<a href="{{route('admin.order.show',    ['id'])}}" class="btn btn-block btn-info btn-sm">Show</a>';
                        show = show.replace('id',each.id);

                        let user = '<a href="{{route('admin.user.show',['id'=>'each.user_id'])}}">each.user.name</a>'
                        user = user.replace('each.user.name',each.user.name);
                        user = user.replace('each.user_id',each.user_id);
                        console.log(user);

                        $('#table-data').append($('<tr>')
                            .append($('<td>').append(each.id))
                            .append($('<td>').append(user))
                            .append($('<td>').append(each.name))
                            .append($('<td>').append(each.phone))
                            .append($('<td>').append(each.email))
                            .append($('<td>').append(each.address))
                            .append($('<td>').append(each.total))
                            .append($('<td>').append(each.note))
                            .append($('<td>').append(each.status))
                            .append($('<td>').append(show))
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
