@extends('layouts.frontbase')

@section('content')
    <div class="main ">
        <div class="section">
            <div class="container">
                <form action="{{route('user.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-3 col-sm-4">
                            <h4><small>Ảnh đại diện</small></h4>
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new thumbnail img-circle img-raised" id="avatar">

                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div>
                                <div>
									<span class="btn btn-raised btn-round btn-default btn-file">
										<span class="fileinput-new">Thêm ảnh</span>
										<span class="fileinput-exists">Thay đổi</span>
										<input type="file" name="avatar"></span>
                                    <br>
                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                       data-dismiss="fileinput"><i class="fa fa-times"></i> Xoá</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-8">
                            <div class="card-content">
                                <div class="input-group">
											<span class="input-group-addon">
												<i class="material-icons">face</i>
											</span>
                                    <div class="form-group is-empty"><input type="text" class="form-control" name="name" id="name"
                                                                            placeholder="First Name..."><span
                                            class="material-input"></span></div>
                                </div>

                                <div class="input-group">
											<span class="input-group-addon">
												<i class="material-icons">email</i>
											</span>
                                    <div class="form-group is-empty"><input type="text" class="form-control" name="email" id="email"
                                                                            placeholder="Email..." ><span
                                            class="material-input"></span></div>
                                </div>

                                <div class="input-group">
											<span class="input-group-addon">
												<i class="material-icons">lock_outline</i>
											</span>
                                    <div class="form-group is-empty"><input type="password" placeholder="Mật khẩu mới..." name="password"
                                                                            class="form-control"><span
                                            class="material-input"></span></div>
                                </div>

                                <div class="input-group">
											<span class="input-group-addon">
												<i class="material-icons">phone</i>
											</span>
                                    <div class="form-group is-empty"><input type="text" class="form-control" name="phone" id="phone"
                                                                            placeholder="Số điện thoại..." ><span
                                            class="material-input"></span></div>
                                </div>

                                <div class="input-group">
											<span class="input-group-addon">
												<i class="material-icons">travel_explore</i>
											</span>
                                    <div class="form-group is-empty"><input type="text" class="form-control" name="address" id="address"
                                                                            placeholder="Địa chỉ..." ><span
                                            class="material-input"></span></div>
                                </div>

                                <button type="submit" class="btn btn-success pull-right">Cập nhật
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function () {
            $.ajax({
                url: '{{route('api.user.info')}}',
                dataType: 'json',
                success: function (response) {
                    document.getElementById("name").setAttribute('value', response.data.name);
                    document.getElementById("email").setAttribute('value', response.data.email);
                    if(response.data.phone !== null) {
                        document.getElementById("phone").setAttribute('value', response.data.phone);
                    }
                    if(response.data.address !== null) {
                        document.getElementById("address").setAttribute('value', response.data.address);
                    }
                    if(response.data.avatar != null) {
                        $('#avatar').append( '<img src="' + '/storage/' + response.data.avatar + '" alt=""></div>')
                    }
                    else {
                        $('#avatar').append('<img src="{{asset('assets')}}/home/img/placeholder.jpg" alt="...">')
                    }
                },
                error: function (response) {
                }
            })
        });
    </script>
@endpush
