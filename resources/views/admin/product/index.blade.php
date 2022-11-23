@extends('layouts.adminbase')

@section('title', 'Product List')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <a href="{{route('admin.product.create')}}" class="btn btn-block bg-gradient-info" style="width: 200px">Add Product</a>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Product List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Product List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="table-data">
                        <thead>
                        <tr>
                            <th style="width: 10px">Id</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Image</th>
                            <th>Image Gallery</th>
                            <th>Status</th>
                            <th style="width: 40px">Edit</th>
                            <th style="width: 40px">Delete</th>
                            <th style="width: 40px">Show</th>
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
            var res
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

            $.ajax({
                url: '{{ route('api.product') }}',
                dataType: 'json',
                data: {page: {{ request()->get('page') ?? 1 }}},

                success: function (response) {
                    response.data.data.forEach(function (each) {

                        let image = '<img src="'+'/storage/' + each.image +'" style="height: 40px" ></img>' ;

                        let gallery = '<a href="{{route('admin.image.index',['pid'])}}"><img src="{{asset('assets')}}/admin/img/gallery.png" style="height: 40px"></a>'
                        gallery = gallery.replace('pid',each.id)

                        let edit = '<a href="{{route('admin.product.edit',    ['id'])}}" class="btn btn-block btn-success btn-sm">Edit</a>';
                        edit = edit.replace('id',each.id);
                        let del  = '<a href="{{route('admin.product.destroy', ['id'])}}" class="btn btn-block btn-danger btn-sm">Delete</a>';
                        del = del.replace('id',each.id);
                        let show = '<a href="{{route('admin.product.show',    ['id'])}}" class="btn btn-block btn-info btn-sm">Show</a>';
                        show = show.replace('id',each.id);
                        $('#table-data').append($('<tr>')
                            .append($('<td>').append(each.id))
                            .append($('<td>').append(getParentsTree(each.category, each.category.title, res)))
                            .append($('<td>').append(each.title))
                            .append($('<td>').append(each.price))
                            .append($('<td>').append(each.quantity))
                            .append($('<td>').append(image))
                            .append($('<td>').append(gallery))
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
