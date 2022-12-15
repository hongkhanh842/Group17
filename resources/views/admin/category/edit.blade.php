@extends('layouts.adminbase')

@section('title', 'DANH MỤC')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 id="name"></h1>
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
                <form role="form" action="{{route('admin.category.update',[$id])}}" method="post"
                      enctype="multipart/form-data" id="form-edit">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Thuộc danh mục</label>
                            <select class="form-control select2" name="parent_id" style="width: 100%;" id="select-data">
                            </select>
                        </div>
                        <div class="form-group" id="title1">
                            <label for="exampleInputEmail1">Tên</label>

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
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
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


        $(document).ready(async function () {
            $.ajax({
                url: '{{ route('api.category.edit') }}',
                dataType: 'json',
                success: function (response) {
                    $('#select-data').html('<option value="0" selected="selected">Danh mục chính</option>');
                    let val=0;
                    response.data.data.forEach(function (each) {
                        let html = "<option value='id'>"
                        html = html.replace('id', each.id);

                        let option = each.name;

                        let title1 = '<input type="text" class="form-control" name="name" value="each.name">'
                        title1 = title1.replace('each.name', each.name);
                        title1 += '@error('name')' +
                       ' <div class="error">{{ $message }}</div>'+
                     '   @enderror'

                        if(each.parent_id === 0)
                        {
                            $('#select-data').append(html + option + '</option>')
                        }

                        if (each.id === {{$id}}) {
                            $('#name').html('Sửa danh mục: ').append(each.name);
                            $('#title1').append(title1);
                            val = each.parent_id;
                        }
                    });
                    $('#select-data').val(val);

                },
                error: function (response) {
                }

            })
        })
    </script>
@endpush
