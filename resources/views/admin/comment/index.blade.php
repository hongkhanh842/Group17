@extends('layouts.adminbase')

@section('title', 'Comment & Reviews List')

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
                            <li class="breadcrumb-item active">Comment List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Comment List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="table-data">
                        <thead>
                        <tr>
                            <th style="width: 10px">Id</th>
                            <th>Name</th>
                            <th>Product</th>
                            <th>Subject</th>
                            <th>Review</th>
                            <th>Rate</th>
                            <th>Status</th>
                            <th style="width: 40px">Show</th>
                            <th style="width: 40px">Delete</th>
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
                url: '{{ route('api.comment') }}',
                dataType: 'json',
                data: {page: {{ request()->get('page') ?? 1 }}},

                success: function (response) {
                    response.data.data.forEach(function (each) {

                        let title = '<a href="{{route('admin.product.show',['id'])}}">'+'prd'+'</a>'
                        title = title.replace('id',each.product.id);
                        title = title.replace('prd',each.product.title);

                        let del  = '<a href="{{route('admin.comment.destroy', ['id'])}}" class="btn btn-block btn-danger btn-sm" >Delete</a>';
                        del = del.replace('id',each.id);
                        let show = '<a href="{{route('admin.comment.show',    ['id'])}}" class="btn btn-block btn-info btn-sm">Show</a>';
                        show = show.replace('id',each.id);

                        $('#table-data').append($('<tr>')
                            .append($('<td>').append(each.id))
                            .append($('<td>').append(each.user.name))
                            .append($('<td>').append(title))
                            .append($('<td>').append(each.subject))
                            .append($('<td>').append(each.review))
                            .append($('<td>').append(each.rate))
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
