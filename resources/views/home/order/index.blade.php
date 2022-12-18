@extends('layouts.frontbase')

@section('content')
    <div class="main ">
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <ul class="nav nav-pills nav-pills-icons nav-stacked nav-pills-success" role="tablist">
                            <!--
                                color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
                            -->
                            <li class="active">
                                <a href="#dashboard-2" role="tab" data-toggle="tab" aria-expanded="false">
                                    <i class="material-icons">paid</i>
                                    Thanh toán khi nhận hàng
                                </a>
                            </li>
                            <li class="">
                                <a href="#schedule-2" role="tab" data-toggle="tab" aria-expanded="true">
                                    <i class="material-icons">credit_card</i>
                                    Thanh toán Online
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content">
                            <div class="tab-pane active" id="dashboard-2">
                                <form role="form" id="contact-form" method="post" action="{{route('order.store')}}">
                                    @csrf
                                    <div class="header header-raised header-primary text-center">
                                        <h4 class="card-title">Thông tin giao hàng</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group  is-empty">
                                                    <label class="control-label">Tên người nhận</label>
                                                    <input type="text" name="name" class="form-control" id="name">
                                                    @error('name')
                                                    <div class="error" style="color:red">{{ $message }}</div>
                                                    @enderror
                                                    <span class="material-input"></span></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group  is-empty">
                                                    <label class="control-label">Số đện thoại</label>
                                                    <input type="text" name="phone" class="form-control" id="phone">
                                                    @error('phone')
                                                    <div class="error" style="color:red">{{ $message }}</div>
                                                    @enderror
                                                    <span class="material-input"></span></div>
                                            </div>
                                        </div>
                                        <div class="form-group  is-empty">
                                            <label class="control-label">Email</label>
                                            <input type="email" name="email" class="form-control" id="email">
                                            @error('email')
                                            <div class="error" style="color:red">{{ $message }}</div>
                                            @enderror
                                            <span class="material-input"></span></div>
                                        <div class="form-group  is-empty">
                                            <label class="control-label">Địa chỉ nhận hàng</label>
                                            <input type="text" name="address" class="form-control" id="address">
                                            @error('address')
                                            <div class="error" style="color:red">{{ $message }}</div>
                                            @enderror
                                            <span class="material-input"></span></div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="{{route('cart.index')}}" class="btn btn-info pull-right">Tổng
                                                    hoá đơn: {{$total}}
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-success pull-right">Xác nhận đặt
                                                    hàng
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="schedule-2">
                                Chưa hỗ trợ
                            </div>
                        </div>
                    </div>
                </div>

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
                    if(response.data.phone) {
                        document.getElementById("phone").setAttribute('value', response.data.phone);
                    }
                    if(response.data.address) {
                        document.getElementById("phone").setAttribute('value', response.data.address);
                    }
                },
                error: function (response) {
                }
            })
        });
    </script>
@endpush
