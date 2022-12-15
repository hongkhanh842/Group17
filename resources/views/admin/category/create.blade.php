@extends('layouts.adminbase')

@section('title', 'DANH MỤC')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>THÊM DANH MỤC</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Danh mục</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thông tin danh mục</h3>
                </div>
                <form role="form" action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data"
                      id="form-create">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Thuộc danh mục</label>
                            <select class="form-control select2" name="parent_id" style="width: 100%;" id=select-data>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên</label>
                            <input type="text" class="form-control" name="name" placeholder="Nhập tên"
                                   value="{{old('name')}}">
                            @error('name')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Hình ảnh</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image">
                                    <label class="custom-file-label" for="exampleInputFile">Chọn hình ảnh</label>
                                </div>
                            </div>
                            @error('image')
                            <div class="error">{{ $message }}</div>
                            @enderror
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

        $.ajax({
            url: '{{ route('api.category.min') }}',
            dataType: 'json',
            success: function (response) {
                $('#select-data').html('<option value="0" selected="selected">Danh mục chính</option>');
                response.data.data.forEach(function (each) {
                    if (each.parent_id == 0) {
                        let html = "<option value='id'>"
                        html = html.replace('id', each.id);
                        let option = each.name;
                        $('#select-data').append(html + option + '</option>')
                    }
                });
            },
            error: function (response) {
            }
        });
        $("#form-create").validate({
          /*  rules: {
                name: {
                    required: true,
                },
            },
            messages: {
                name: {
                    required: "Tên bắt buộc phải điền"
                }
            },*/
        });
    </script>
@endpush
