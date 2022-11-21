@extends('layouts.adminbase')

@section('title', 'Show Category')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-3" id="edit">
                    </div>
                    <div class="col-sm-3" id="del">
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Show Category</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-bold">Detail</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped" id="table-data">
                        {{--<tr>
                            <th style="width: 150px">ID</th>
                        </tr>
                        <tr>
                            <th style="width: 150px">Title</th>
                        </tr>
                        <tr>
                            <th style="width: 150px">Keywords</th>
                        </tr>
                        <tr>
                            <th style="width: 150px">Image</th>
                        </tr>
                        <tr>
                            <th style="width: 150px">Status</th>
                        </tr>
                        <tr>
                            <th>Created Date</th>
                        </tr>
                        <tr>
                            <th>Update Date</th>
                        </tr>--}}
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@push('js')
    <script>
        $(document).ready(function () {
            // crawl data
            $.ajax({
                url: '{{ route('api.category') }}',
                dataType: 'json',
                success: function (response) {
                    response.data.data.forEach(function (each) {
                        if (each.id === {{$id}}) {

                            let image = '<img src="' + '/storage/' + each.image + '" style="height: 150px" ></img>';

                            let edit = '<a href="{{route('admin.category.edit',    ['id'])}}" class="btn btn-block bg-gradient-success">Edit</a>';
                            edit = edit.replace('id', each.id);
                            let del = '<a href="{{route('admin.category.destroy', ['id'])}}" class="btn btn-block bg-gradient-danger">Delete</a>';
                            del = del.replace('id', each.id);

                            $('#edit').append(edit);
                            $('#del').append(del);

                            $('#table-data')
                                .append($('<tr>').append($('<th style="width: 300px">').append('ID'))        .append($('<td>').append(each.id))                            )
                                .append($('<tr>').append($('<th>').append('Title'))     .append($('<td>').append(each.title))                            )
                                .append($('<tr>').append($('<th>').append('Keywords'))  .append($('<td>').append(each.keywords))                            )
                                .append($('<tr>').append($('<th>').append('Image'))     .append($('<td>').append(image))                            )
                                .append($('<tr>').append($('<th>').append('Status'))    .append($('<td>').append(each.status))                            )
                                .append($('<tr>').append($('<th>').append('Created At')).append($('<td>').append(convertDateToDateTime(each.created_at)))                            )
                                .append($('<tr>').append($('<th>').append('Updated At')).append($('<td>').append(convertDateToDateTime(each.updated_at))))
                        }
                    });
                },
                error: function (response) {
                }

            })
        });
    </script>
@endpush
