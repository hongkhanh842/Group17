@extends('layouts.adminbase')

@section('title', 'TÀI KHOẢN')

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
                            <li class="breadcrumb-item active">Tài khoản</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thông tin tài khoản</h3>
                </div>
                <form role="form" action="{{route('admin.user.update',[$id])}}" method="post"
                      enctype="multipart/form-data" id="form-edit">
                    @csrf
                    <div class="card-body">
                       {{-- <div class="form-group">
                            <label>Thuộc danh mục</label>
                            <select class="form-control select2" name="parent_id" style="width: 100%;" id="select-data">
                            </select>
                        </div>--}}
                        <div class="form-group" id="title1">
                            <label for="exampleInputEmail1">Tên</label>
                        </div>
                        <div class="form-group" id="email">
                            <label for="exampleInputEmail1">Email</label>
                        </div>
              {{--          @if ($errors->has('title'))
                            <span class="alert alert-danger">
                                {{ $errors->first('title') }}
                            </span>
                        @endif--}}
                        <div class="form-group">
                            <label for="exampleInputFile">Ảnh đại diện</label>
                            <div class="input-group" id="show_avt">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="avatar">
                                    <label class="custom-file-label" for="exampleInputFile">Chọn hình ảnh</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="address">
                            <label for="exampleInputEmail1">Địa chỉ</label>
                        </div>
                        <div class="form-group">
                            <label>Quyền</label>
                            <select class="form-control" name="role" id="role">
                                <option value="2" selected="selected">Quản lí</option>
                                <option value="3">Shipper</option>
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
                url: "{{ route('api.user.one',[$id])}}",
                dataType: 'json',
                success: function (response) {
                    let each= response.data;

                    /*let show_avt = '<img src="each.avatar " style="height: 150px" >';*/

                        let html = "<option value='id'>"
                        html = html.replace('id', each.id);
                        let option = 1;

                        let status = '<option selected>' + 'each.status' + '</option>'
                        status = status.replace('each.status', each.status);

                        let title1 = '<input type="text" class="form-control" name="name" value="each.name">'
                        title1 = title1.replace('each.name', each.name);

                        let email = '<input type="email" class="form-control" name="email" value="each.email">'
                        email = email.replace('each.email', each.email);

                        let address = '<input type="text" class="form-control" name="address" value="each.address">'
                        address = address.replace('each.address', each.address);

                        $('#select-data').append(html + option + '</option>')

                        if (each.id === {{$id}}) {
                            $('#name').html('SỬA DANH MỤC: ').append(each.name);
                            $('#title1').append(title1);
                            $('#email').append(email);
                            $('#address').append(address);
                            /*$('#show_avt').append(show_avt);*/
                        }


                },
                error: function (response) {
                }

            })
        })
    </script>
@endpush
