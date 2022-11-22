@extends('layouts.adminbase')

@section('title', 'Show Product:')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-3">
                        <a href="{{route('admin.product.edit',['id'=>$id])}}" class="btn btn-block bg-gradient-info"
                           style="width: 200px">Edit</a>
                    </div>
                    <div class="col-sm-3">
                        <a href="{{route('admin.product.destroy',['id'=>$id])}}"
                           onclick="return confirm('Deleting !! Are you sure ?')"
                           class="btn btn-block bg-gradient-danger" style="width: 200px">Delete</a>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Show Product</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail</h3>
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
        let res
        $(document).ready(function () {
            $.ajax({
                url: '{{ route('api.category') }}',
                dataType: 'json',
                success: function (response) {
                    response.data.data.forEach(function (each) {
                    });
                    res = response.data.data;
                },
                error: function (response) {
                }

            })
        });

        $(document).ready(function () {
            $.ajax({
                url: '{{ route('api.product') }}',
                dataType: 'json',
                success: function (response) {
                    response.data.data.forEach(function (each) {
                        if (each.id === {{$id}}) {

                            let image = '<img src="' + '/storage/' + each.image + '" style="height: 150px" ></img>';

                            $('#table-data')
                                .append($('<tr>').append($('<th style="width: 200px">').append('ID')).append($('<td>').append(each.id)))
                                .append($('<tr>').append($('<th>').append('Category'))     .append($('<td>').append(getParentsTree(each.category, each.category.title, res))))
                                .append($('<tr>').append($('<th>').append('Title'))     .append($('<td>').append(each.title)))
                                .append($('<tr>').append($('<th>').append('Keywords'))  .append($('<td>').append(each.keywords)))
                                .append($('<tr>').append($('<th>').append('Description'))  .append($('<td>').append(each.description)))
                                .append($('<tr>').append($('<th>').append('Price'))  .append($('<td>').append(each.price)))
                                .append($('<tr>').append($('<th>').append('Quantity'))  .append($('<td>').append(each.quantity)))
                                .append($('<tr>').append($('<th>').append('Minimum Quantity'))  .append($('<td>').append(each.minquantity)))
                                .append($('<tr>').append($('<th>').append('Tax'))  .append($('<td>').append(each.tax)))
                                .append($('<tr>').append($('<th>').append('Detail'))  .append($('<td>').append(each.detail)))
                                .append($('<tr>').append($('<th>').append('Image'))     .append($('<td>').append(image)))
                                .append($('<tr>').append($('<th>').append('Status'))    .append($('<td>').append(each.status)))
                                .append($('<tr>').append($('<th>').append('Created At')).append($('<td>').append(convertDateToDateTime(each.created_at))))
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
