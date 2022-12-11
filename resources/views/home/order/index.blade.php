@extends('layouts.frontbase')

@section('content')
    <div class="main main-raised">
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <ul class="nav nav-pills nav-pills-icons nav-stacked nav-pills-success" role="tablist">
                            <!--
                                color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
                            -->
                            <li class="">
                                <a href="#dashboard-2" role="tab" data-toggle="tab" aria-expanded="false">
                                    <i class="material-icons">paid</i>
                                    Thanh toán khi nhận hàng
                                </a>
                            </li>
                            <li class="active">
                                <a href="#schedule-2" role="tab" data-toggle="tab" aria-expanded="true">
                                    <i class="material-icons">credit_card</i>
                                    Thanh toán Online
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content">
                            <div class="tab-pane" id="dashboard-2">
                                <form role="form" id="contact-form" method="post">
                                    <div class="header header-raised header-primary text-center">
                                        <h4 class="card-title">Contact Us</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label">First name</label>
                                                    <input type="text" name="name" class="form-control">
                                                    <span class="material-input"></span></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label">Last name</label>
                                                    <input type="text" name="name" class="form-control">
                                                    <span class="material-input"></span></div>
                                            </div>
                                        </div>
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">Email address</label>
                                            <input type="email" name="email" class="form-control">
                                            <span class="material-input"></span></div>
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">Your message</label>
                                            <textarea name="message" class="form-control" id="message"
                                                      rows="6"></textarea>
                                            <span class="material-input"></span></div>

                                        <div class="row">
                                            <div class="col-md-6">
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-success pull-right">Xác nhận đặt hàng
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane active" id="schedule-2">
                                Trống
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
