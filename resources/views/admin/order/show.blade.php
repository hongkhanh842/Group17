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
                            <form class="mt-2" role="form" action="{{route('admin.order.update',['id'=>$id])}}" method="post" id="form-edit">
                                @csrf
                                <textarea name="note" cols="80" id="note"></textarea>
                                <br>
                                <select class="mt-2" name="status" id="status">
                                    <option class="d-none">Chờ xác nhận</option>
                                    <option class="d-none">Đã xác nhận</option>
                                    <option class="d-none">Đang lấy hàng</option>
                                    <option class="d-none">Đang giao hàng</option>
                                    <option class="d-none">Đã giao hàng</option>
                                    <option class="d-none">Huỷ</option>
                                </select>
                                <div class="mt-4 mb-3">
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
                        <th>Ảnh</th>
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>

                    </tr>
                    </thead>
                </table>
            </div>
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
                url: '{{ route('api.order.one',[$id]) }}',
                dataType: 'json',
                success: function (response) {

                    let each = response.data;
                    let theText = each.status;
                    var temp=0;

                    $("#status option").each(function () {
                        if ($(this).text() === theText) {
                            $(this).attr('selected', 'selected');
                            $(this).removeClass("d-none");
                            temp=$(this).val();
                        }
                        if (temp!== 0 ) {
                            $(this).removeClass("d-none");
                        }
                    });
                    /*$("#status").find(":selected").removeClass("d-none");*/

                    $('#note').append(each.note)

                    $('#table-order')
                        .append($('<tr>').append($('<th style="width: 200px">').append('Thời gian')).append($('<td>').append(convertDateToDateTime(each.created_at))))
                        .append($('<tr>').append($('<th style="width: 200px">').append('Tổng hoá đơn')).append($('<td>').append(getPrice(each.total))))
                },
                error: function (response) {
                }
            })
        });


        $(document).ready(async function () {
            $.ajax({
                url: '{{ route('api.orderdetail.min') }}',
                dataType: 'json',
                success: function (response) {
                    response.data.data.forEach(function (each) {
                        if (each.order_id === {{$id}}) {
                            let image = '<img src="' + '/storage/' + each.product.image + '" style="height: 40px" ></img>';

                            $('#table-product').append($('<tr>')
                                .append($('<td>').append(each.id))
                                .append($('<td>').append(image))
                                .append($('<td>').append(each.product.name))
                                .append($('<td>').append(getPrice(each.price)))
                                .append($('<td>').append(each.quantity))
                                .append($('<td>').append(getPrice(each.total)))

                            );
                        }
                    });
                },
                error: function (response) {
                }
            })
        });
    </script>
@endpush
