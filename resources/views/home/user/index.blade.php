@extends('layouts.frontbase')

@section('content')
    <div class="main main-raised">
        <div class="section">
            <div class="container">
                <form action="{{route('user.update')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-3 col-sm-4">
                            <h4><small>Ảnh đại diện</small></h4>
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new thumbnail img-circle img-raised">
                                    <img src="{{asset('assets')}}/home/img/placeholder.jpg" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div>
                                <div>
									<span class="btn btn-raised btn-round btn-default btn-file">
										<span class="fileinput-new">Thêm ảnh</span>
										<span class="fileinput-exists">Thay đổi</span>
										<input type="file" name="..."></span>
                                    <br>
                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                       data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-8">
                            <div class="card-content">
                                <div class="input-group">
											<span class="input-group-addon">
												<i class="material-icons">face</i>
											</span>
                                    <div class="form-group is-empty"><input type="text" class="form-control"
                                                                            placeholder="First Name..."><span
                                            class="material-input"></span></div>
                                </div>

                                <div class="input-group">
											<span class="input-group-addon">
												<i class="material-icons">email</i>
											</span>
                                    <div class="form-group is-empty"><input type="text" class="form-control"
                                                                            placeholder="Email..."><span
                                            class="material-input"></span></div>
                                </div>

                                <div class="input-group">
											<span class="input-group-addon">
												<i class="material-icons">lock_outline</i>
											</span>
                                    <div class="form-group is-empty"><input type="password" placeholder="Password..."
                                                                            class="form-control"><span
                                            class="material-input"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
