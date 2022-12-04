@extends('layouts.adminbase')

@section('title', 'SẢN PHẨM')

@section('head')
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
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Sản phẩm</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thông tin sản phẩm</h3>
                </div>
                <form role="form" action="{{route('admin.product.update',[$id])}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Danh mục</label>
                            <select class="form-control select2" name="category_id" style="width: 100%;"
                                    id="selected-data">
                            </select>
                        </div>

                        <div class="form-group" id="title1">
                            <label for="exampleInputEmail1">Tên</label>
                        </div>
                        <div class="form-group" id="description">
                            <label for="exampleInputEmail1">Mô tả</label>
                        </div>
                        <div class="form-group" id="price">
                            <label for="exampleInputEmail1">Giá</label>
                        </div>
                        <div class="form-group" id="quantity">
                            <label for="exampleInputEmail1">Số lượng</label>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Chi tiết</label>
                            <textarea class="textarea" id="detail" name="detail">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Hình ảnh</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image">
                                    <label class="custom-file-label" for="exampleInputFile">Chọn ảnh</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select class="form-control" name="status" id="status">
                                <option>Hiển thị</option>
                                <option>Không hiển thị</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection

@section('foot')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    {{--<script>
        $(function () {
            $('.textarea').summernote()
        })
    </script>--}}

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
                url: "{{ route('api.product.one',[$id])}}",
                dataType: 'json',
                success: function (response) {
                    let each = response.data;

                        let status = '<option selected>' + 'each.status' + '</option>'
                        status = status.replace('each.status', each.status);

                        let title1 = '<input type="text" class="form-control" name="name" value="each.name">'
                        title1 = title1.replace('each.name', each.name);
                        let description = '<input type="text" class="form-control" name="description" value="each.description">'
                        description = description.replace('each.description', each.description);
                        let price = '<input type="text" class="form-control" name="price" value="each.price">'
                        price = price.replace('each.price', each.price);
                        let quantity = '<input type="text" class="form-control" name="quantity" value="each.quantity">'
                        quantity = quantity.replace('each.quantity', each.quantity);


                            val = each.category_id;
                            $('#title').html('Edit Category: ').append(each.name);
                            $('#title1').append(title1);
                            $('#description').append(description);
                            $('#price').append(price);
                            $('#quantity').append(quantity);
                            $('#detail').append(each.detail).summernote();
                            $('#status').append(status);
                },
                error: function (response) {
                }

            })

            $.ajax({
                url: '{{ route('api.category.min') }}',
                dataType: 'json',
                success: function (response) {

                    response.data.data.forEach(function (each) {

                        let html = "<option value='id'>"
                        html = html.replace('id', each.id);
                        let option = getParentsTree(each, each.name, response.data.data);

                        $('#selected-data').append(html + option + '</option>')
                    });
                    /*val = val.toString()
                    $('#selected-data').val(val)*/
                },
                error: function (response) {
                }

            })
        })
    </script>
@endpush
