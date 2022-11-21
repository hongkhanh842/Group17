@php use App\Http\Controllers\AdminPanel\CategoryController; @endphp
@extends('layouts.adminbase')

@section('title', 'Category List')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <a href="{{route('admin.category.create')}}" class="btn btn-block bg-gradient-info"
                           style="width: 200px">Add
                            Category</a>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Category List</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Category List</h3>
                </div>
                <!-- /.card-header -->
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
                        <tbody>
                        @foreach($data as $rs)
                            <tr>
                               {{-- <td>{{$rs->id}}</td>
                                <td>
                                    {{ CategoryController::getParentsTree($rs, $rs->title) }}
                                </td>
                                <td>{{$rs->title}}</td>
                                <td>
                                    @if ($rs->image)
                                        <img src="{{Storage::url($rs->image)}}" style="height: 40px">
                                    @endif
                                </td>
                                <td>{{$rs->status}}</td>--}}
                                {{--<td>
                                    <a href="{{route('admin.category.edit',['id'=>$rs->id])}}"
                                       class="btn btn-block btn-success btn-sm">Edit</a>
                                </td>
                                <td>
                                    <a href="{{route('admin.category.destroy',['id'=>$rs->id])}}"
                                       class="btn btn-block btn-danger btn-sm"
                                       onclick="return confirm('Deleting !! Are you sure ?')">Delete</a></td>
                                <td>
                                    <a href="{{route('admin.category.show',['id'=>$rs->id])}}"
                                       class="btn btn-block btn-info btn-sm">Show</a>
                                </td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <nav class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right"
                        id="pagination">
                    </ul>
                </nav>
            </div>


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@push('js')
        <script>
        $(document).ready(function () {
            /*$('select').select2();*/
            // crawl data
            $.ajax({
                url: '{{ route('api.category') }}',
                dataType: 'json',
                data: {page: {{ request()->get('page') ?? 1 }}},
                success: function (response) {
                    response.data.data.forEach(function (each) {

                        let image = '<img src="'+'/storage/' + each.image +'" style="height: 40px" ></img>' ;

                        let edit = '<a href="{{route('admin.category.edit',['id'=>$rs->id])}}"class="btn btn-block btn-success btn-sm">Edit</a>' ;
                        let del = '<a href="{{route('admin.category.destroy',['id'=>$rs->id])}}"class="btn btn-block btn-danger btn-sm">Delete</a>';
                        let show = '<a href="{{route('admin.category.edit',['id'=>$rs->id])}}"class="btn btn-block btn-info btn-sm">Edit</a>' ;
                        $('#table-data').append($('<tr>')
                            .append($('<td>').append(each.id))
                            .append($('<td>').append(each.parent))
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
