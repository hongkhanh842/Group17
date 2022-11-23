@extends('layouts.adminbase')

@section('title', 'Edit Product: '.$data->title)

@section('head')
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 id="title"></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Edit Product</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Product Elements</h3>
                </div>
                <form role="form" action="{{route('admin.product.update',['id'=>$id])}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Parent Category</label>
                            <select class="form-control select2" name="category_id" style="width: 100%;"
                                    id="selected-data">
                            </select>

                        </div>

                        <div class="form-group" id="title1">
                            <label for="exampleInputEmail1">Title</label>
                        </div>
                        <div class="form-group" id="keywords">
                            <label for="exampleInputEmail1">Keywords</label>
                        </div>
                        <div class="form-group" id="description">
                            <label for="exampleInputEmail1">Description</label>
                        </div>
                        <div class="form-group" id="price">
                            <label for="exampleInputEmail1">Price</label>
                        </div>
                        <div class="form-group" id="quantity">
                            <label for="exampleInputEmail1">Quantity</label>
                        </div>
                        <div class="form-group" id="minquantity">
                            <label for="exampleInputEmail1">Minimum Quantity</label>
                        </div>
                        <div class="form-group" id="tax">
                            <label for="exampleInputEmail1">Tax %</label>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Detail</label>
                            <textarea class="textarea" id="detail" name="detail" id="detail">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image">
                                    <label class="custom-file-label" for="exampleInputFile">Choose image file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status" id="status">
                                <option>True</option>
                                <option>False</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update Data</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection

@section('foot')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script>
        $(function () {
            // Summernote
            $('.textarea').summernote()
        })
    </script>
@endsection

@push('js')
    <script>
        function submitForm() {
            $.ajax({
                url: $("#form-edit").attr('action'),
                type: 'POST',
                dataType: 'json',
                data: $("#form-edit").serialize(),
                processData: false,
                contentType: false,
                async: false,
                cache: false,
                enctype: 'multipart/form-data',
                success: function (response) {
                    if (response.success) {
                        notifySuccess();
                    } else {
                        notifyError(response.message);
                    }
                },
                error: function (response) {
                }
            });
        }


        $(document).ready(function () {

            let val
            $.ajax({
                url: '{{ route('api.product') }}',
                dataType: 'json',
                success: function (response) {

                    response.data.data.forEach(function (each) {
                        let status = '<option selected>' + 'each.status' + '</option>'
                        status = status.replace('each.status', each.status);


                        let title1 = '<input type="text" class="form-control" name="title" value="each.title">'
                        title1 = title1.replace('each.title', each.title);
                        let keywords = '<input type="text" class="form-control" name="keywords" value="each.keywords">'
                        keywords = keywords.replace('each.keywords', each.keywords);
                        let description = '<input type="text" class="form-control" name="description" value="each.description">'
                        description = description.replace('each.description', each.description);
                        let price = '<input type="text" class="form-control" name="price" value="each.price">'
                        price = price.replace('each.price', each.price);
                        let quantity = '<input type="text" class="form-control" name="quantity" value="each.quantity">'
                        quantity = quantity.replace('each.quantity', each.quantity);
                        let minquantity = '<input type="text" class="form-control" name="minquantity" value="each.minquantity">'
                        minquantity = minquantity.replace('each.minquantity', each.minquantity);
                        let tax = '<input type="text" class="form-control" name="tax" value="each.tax">'
                        tax = tax.replace('each.tax', each.tax);
                        if (each.id === {{$id}}) {

                            val = each.category_id;
                            $('#title').html('Edit Category: ').append(each.title);
                            $('#title1').append(title1);
                            $('#keywords').append(keywords);
                            $('#description').append(description);
                            $('#price').append(price);
                            $('#quantity').append(quantity);
                            $('#minquantity').append(minquantity);
                            $('#tax').append(tax);
                            $('#detail').append(each.detail);
                            $('#status').append(status);
                        }

                    });
                },
                error: function (response) {
                }

            })

            $.ajax({
                url: '{{ route('api.category') }}',
                dataType: 'json',
                success: function (response) {

                    response.data.data.forEach(function (each) {

                        let html = "<option value='id'>"
                        html = html.replace('id', each.id);
                        let option = getParentsTree(each, each.title, response.data.data);

                        $('#selected-data').append(html + option + '</option>')
                    });
                    val = val.toString()
                    $('#selected-data').val(val)
                },
                error: function (response) {
                }

            })
        })
    </script>
@endpush
