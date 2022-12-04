@extends('layouts.adminbase')

@section('title', 'SẢN PHẨM')
@section('head')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>THÊM SẢN PHẨM</h1>
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
                <form role="form" action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label>Thuộc danh mục</label>

                            <select class="form-control select2" name="category_id" style="width: 100%;" id="select-data">
                               {{-- @foreach($data as $rs)
                                    <option value="{{ $rs->id }}">
                                        --}}{{--{{ \App\Http\Controllers\AdminPanel\CategoryController::getParentsTree($rs, $rs->title) }}--}}{{--
                                    </option>
                                @endforeach--}}
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên</label>
                            <input type="text" class="form-control" name="name" placeholder="Tên">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả</label>
                            <input type="text" class="form-control" name="description" placeholder="Mô tả">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá</label>
                            <input type="number" class="form-control" name="price" value="0">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng</label>
                            <input type="number" class="form-control" name="quantity" value="0">
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
                            <select class="form-control" name="status">
                                <option>Hiển thị</option>
                                <option>Không hiển thị</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Lưu</button>
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
            $('.textarea').summernote()
        })
    </script>
@endsection

@push('js')
    <script>
        function submitForm() {
            $.ajax({
                url: $("#form-create").attr('action'),
                type: 'POST',
                dataType: 'json',
                data: $("#form-create").serialize(),
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


        $(document).ready(async function () {
            $.ajax({
                url: '{{ route('api.category.min') }}',
                dataType: 'json',
                success: function (response) {
                  /*  $('#select-data').html('<option value="0" selected="selected">Main Product</option>');*/
                    response.data.data.forEach(function (each) {

                        let html = "<option value='id'>"
                        html =html.replace('id',each.id);
                        let option = getParentsTree(each, each.name, response.data.data);

                        $('#select-data').append(html + option + '</option>' )
                    });
                },
                error: function (response) {
                }

            })
        })
    </script>
@endpush
