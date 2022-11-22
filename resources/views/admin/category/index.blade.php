@extends('layouts.adminbase')

@section('title', 'Category List')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <a href="{{route('admin.category.create')}}" class="btn btn-block bg-gradient-info"
                           style="width: 200px">Add Category</a>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Category List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Category List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="table-data">
                        <thead>
                        <tr>
                            <th style="width: 10px">ID</th>
                            <th>Parent</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th style="width: 40px">Edit</th>
                            <th style="width: 40px">Delete</th>
                            <th style="width: 40px">Show</th>
                        </tr>
                        </thead>
                    </table>
                </div>
                <nav class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right"
                        id="pagination">
                    </ul>
                </nav>
            </div>
        </section>
    </div>
@endsection

@push('js')
        <script>
        $(document).ready(function () {
            $.ajax({
                url: '{{ route('api.category') }}',
                dataType: 'json',
                data: {page: {{ request()->get('page') ?? 1 }}},

                success: function (response) {
                    response.data.data.forEach(function (each) {

                        let image = '<img src="'+'/storage/' + each.image +'" style="height: 40px" ></img>' ;

                        let edit = '<a href="{{route('admin.category.edit',    ['id'])}}" class="btn btn-block btn-success btn-sm">Edit</a>';
                        edit = edit.replace('id',each.id);
                        let del  = '<a href="{{route('admin.category.destroy', ['id'])}}" class="btn btn-block btn-danger btn-sm">Delete</a>';
                        del = del.replace('id',each.id);
                        let show = '<a href="{{route('admin.category.show',    ['id'])}}" class="btn btn-block btn-info btn-sm">Show</a>';
                        show = show.replace('id',each.id);

                        $('#table-data').append($('<tr>')
                            .append($('<td>').append(each.id))
                            .append($('<td>').append(getParentsTree(each, each.title, response.data.data)))
                            .append($('<td>').append(each.title))
                            .append($('<td>').append(image))
                            .append($('<td>').append(each.status))
                            .append($('<td>').append(edit))
                            .append($('<td>').append(del))
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
