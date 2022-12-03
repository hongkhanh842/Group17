@extends('layouts.adminbase')

@section('title', 'Show Message')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-3" id="edit">

                    </div>
                    <div class="col-sm-3" id="del">

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Đơn hàng</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Order Detail</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped" id="table-order">
                    <tr>
                        <th >Ghi chú :
                            <br><br><br>
                            Trạng thái :
                        </th>
                        <td>
                            <form role="form" action="{{route('admin.order.update',['id'=>$id])}}" method="post" id="form-edit">
                                @csrf
                                <textarea name="note" cols="80" id="note"></textarea>
                                <br>
                                <select name="status">
                                    <option selected id="status"></option>
                                    <option>Đã xác nhận</option>
                                    <option>Đang giao</option>
                                    <option>Đã giao</option>
                                    <option>Huỷ</option>
                                </select>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                </table>
                <table class="table table-bordered" id="table-product">
                    <thead>
                    <tr>
                        <th style="width: 10px">Id</th>
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                        <th>Ảnh</th>
                        {{--<th>Trạng thái</th>
                        <th style="width: 40px">Hành động</th>--}}
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
    </div>
@endsection
{{--$(document).ready(async function () {
$.ajax({
url: '{{ route('api.orderproduct') }}',
dataType: 'json',
success: function (response) {
response.data.data.forEach(function (each) {
if (each.order_id === {{$id}}) {
let image = '<img src="'+'/storage/' + each.product.image +'" style="height: 40px" ></img>' ;


let accept ='<a href="{{route('admin.order.acceptproduct',['id'] )}}" class="btn btn-block btn-success btn-sm">Accept</a>'
accept = accept.replace('id',each.id);
let cancel = '<a href="{{route('admin.order.cancelproduct',['id'] )}}" class="btn btn-block btn-danger btn-sm">Cancel</a>'
cancel = cancel.replace('id',each.id);

$('#table-product').append($('<tr>')
    .append($('<td>').append(each.id))
        .append($('<td>').append(each.product.title))
        .append($('<td>').append(each.price))
        .append($('<td>').append(each.quantity))
        .append($('<td>').append(each.amount))
        .append($('<td>').append(image))
        .append($('<td>').append(each.status))
        .append($('<td>').append(accept).append(cancel))
        );
        }
        });
        },
        error: function (response) {
        }
        })
        });--}}
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
                url: '{{ route('api.order.slug',[$slug]) }}',
                dataType: 'json',
                success: function (response) {
                    response.data.data.forEach(function (each) {
                        if (each.id === {{$id}}) {
                            $('#status').append(each.status)
                            $('#note').append(each.note)

                            $('#table-order')
                                .append($('<tr>').append($('<th style="width: 200px">').append('ID')).append($('<td>').append(each.id)))
                                .append($('<tr>').append($('<th>').append('Tên tài khoản')).append($('<td>').append(each.user.name)))
                                .append($('<tr>').append($('<th>').append('Tên người nhận')).append($('<td>').append(each.name)))
                                .append($('<tr>').append($('<th>').append('Số điện thoại')).append($('<td>').append(each.phone)))
                                .append($('<tr>').append($('<th>').append('Email')).append($('<td>').append(each.email)))
                                .append($('<tr>').append($('<th>').append('Địa chỉ')).append($('<td>').append(each.address)))
                                .append($('<tr>').append($('<th>').append('IP')).append($('<td>').append(each.ip)))
                                .append($('<tr>').append($('<th>').append('Trang thái')).append($('<td>').append(each.status)))
                                .append($('<tr>').append($('<th>').append('Tạo lúc')).append($('<td>').append(convertDateToDateTime(each.created_at))))
                                .append($('<tr>').append($('<th>').append('Cập nhật lúc')).append($('<td>').append(convertDateToDateTime(each.updated_at))))
                        }
                    });
                },
                error: function (response) {
                }
            })
        });


    </script>
    <script src="{{asset('assets/admin')}}/js/helper.js"></script>
@endpush
