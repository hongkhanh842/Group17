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
                        <div class="form-group" id="price">
                            <label for="exampleInputEmail1">Giá</label>
                        </div>
                        <div class="form-group" id="quantity">
                            <label for="exampleInputEmail1">Số lượng</label>
                        </div>
                        <div class="form-group" >
                            <label>RAM</label>
                            <select class="form-control select2" name="ram" id="ram" style="width: 100%;">
                                <option value=0 >8GB</option>
                                <option value=1 >16GB</option>
                            </select>
                        </div>
                        <div class="form-group" >
                            <label>CPU</label>
                            <select class="form-control select2" name="cpu" id="cpu" style="width: 100%;">
                                <option value=0 >Intel Core i5</option>
                                <option value=1 >Intel Core i7</option>
                                <option value=2 >Ryzen 5</option>
                                <option value=3 >Ryzen 7</option>
                                <option value=4 >Ryzen 9</option>
                            </select>
                        </div>
                        <div class="form-group" >
                            <label>SSD</label>
                            <select class="form-control select2" name="ssd" id="ssd" style="width: 100%;">
                                <option value=0 >256 GB</option>
                                <option value=1 >512 GB</option>
                                <option value=2 >1 TB</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nhu cầu</label>
                            <select class="form-control select2" name="use" id="use" style="width: 100%;">
                                <option value=0 >Gaming</option>
                                <option value=1 >Văn phòng</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Chi tiết</label>
                            <textarea  id="detail" name="detail">
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

   {{-- <script>
        $(document).ready(function() {
            $('#detail').summernote();
        });
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

            let val=0;

            $.ajax({
                url: '{{ route('api.category.product') }}',
                dataType: 'json',
                success: async function (response) {

                    response.data.data.forEach(function (each) {

                        let html = "<option value='id'>"
                        html = html.replace('id', each.id);

                        let option = each.name;

                        $('#selected-data').append(html + option + '</option>')

                    });

                },
                error: function (response) {
                }

            })

            $.ajax({
                url: "{{ route('api.product.edit',[$id])}}",
                dataType: 'json',
                success: async function (response) {
                    let each = response.data;

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
                            $('#ram').val(each.ram);
                            $('#cpu').val(each.cpu);
                            $('#ssd').val(each.ssd);
                            $('#use').val(each.use);
                            $('#detail').append(each.detail).summernote();

                    $('#selected-data').val(val);
                },
                error: function (response) {
                }

            })


        })
    </script>
@endpush
