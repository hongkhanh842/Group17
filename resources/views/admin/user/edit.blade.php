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
                        <div class="form-group" id="title1">
                            <label for="exampleInputEmail1">Tên</label>
                        </div>
                        <div class="form-group" id="email">
                            <label for="exampleInputEmail1">Email</label>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Ảnh đại diện</label>
                            <div class="input-group" id="show_avt">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="avatar">
                                    <label class="custom-file-label" for="exampleInputFile">Chọn hình ảnh</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="phone">
                            <label for="exampleInputEmail1">Số điện thoại</label>
                        </div>
                        <div class="form-group" id="address">
                            <label for="exampleInputEmail1">Địa chỉ</label>
                        </div>
                        <div class="form-group">
                            <label>Quyền</label>
                            <select class="form-control" name="role" id="role">
                                <option value="1">Khách hàng</option>
                                <option value="2">Quản lí</option>
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

                        let title1 = '<input type="text" class="form-control" name="name" value="each.name">'
                        title1 = title1.replace('each.name', each.name) +
                            '@error('name')<div class="error">{{ $message }}</div>@enderror';

                        let email = '<input type="email" class="form-control" name="email" value="each.email">'
                        email = email.replace('each.email', each.email) +
                            '@error('email')<div class="error">{{ $message }}</div>@enderror';

                        let phone = '<input type="text" class="form-control" name="phone" value="each.phone">'
                        phone = phone.replace('each.phone', each.phone)+
                            '@error('phone')<div class="error">{{ $message }}</div>@enderror';

                        let address = '<input type="text" class="form-control" name="address" value="each.address">'
                        address = address.replace('each.address', each.address)+
                            '@error('address')<div class="error">{{ $message }}</div>@enderror';

                            $('#name').html('SỬA TÀI KHOẢN: ').append(each.name);
                            $('#title1').append(title1);
                            $('#email').append(email);
                            $('#phone').append(phone);
                            $('#address').append(address);
                            $('#role').val(each.role);


                },
                error: function (response) {
                }

            })
        })
    </script>
@endpush
