@extends('layouts.adminbase')

@section('title', 'BÌNH LUẬN')

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
                            <li class="breadcrumb-item active">Bình luận</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <div class="content">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Chi tiết bình luận</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped" id="table-data">

                        <tr>
                            <th>Ghi chú :</th>
                            <td>
                                <form role="form" action="{{route('admin.comment.update',['id'=>$id])}}" method="post"
                                      id="form-edit">
                                    @csrf
                                    <select name="status" id="select-data">
                                        <option>Hiển thị</option>
                                        <option>Không hiển thị</option>
                                    </select>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
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
                        url: '{{ route('api.comment.min') }}',
                        dataType: 'json',
                        success: function (response) {
                            response.data.data.forEach(function (each) {
                                if (each.id === {{$id}}) {
                                    let title = '<a href="{{route('admin.product.show',['id'])}}">' + 'prd' + '</a>'
                                    title = title.replace('id', each.product.id);
                                    title = title.replace('prd', each.product.name);
                                    let seel = "<option selected>" + 'seel' + "</option>"
                                    seel = seel.replace('seel', each.status)
                                    $('#select-data').append(seel)

                                    $('#table-data')
                                        .append($('<tr>').append($('<th style="width: 200px">').append('ID')).append($('<td>').append(each.id)))
                                        .append($('<tr>').append($('<th>').append('Product')).append($('<td>').append(title)))
                                        .append($('<tr>').append($('<th>').append('Name & Surname')).append($('<td>').append(each.user.name)))
                                        .append($('<tr>').append($('<th>').append('Subject')).append($('<td>').append(each.subject)))
                                        .append($('<tr>').append($('<th>').append('Message')).append($('<td>').append(each.review)))
                                        .append($('<tr>').append($('<th>').append('Rate')).append($('<td>').append(each.rate)))
                                        .append($('<tr>').append($('<th>').append('IP Number')).append($('<td>').append(each.ip)))
                                        .append($('<tr>').append($('<th>').append('Status')).append($('<td>').append(each.status)))
                                        .append($('<tr>').append($('<th>').append('Created At')).append($('<td>').append(convertDateToDateTime(each.created_at))))
                                        .append($('<tr>').append($('<th>').append('Updated At')).append($('<td>').append(convertDateToDateTime(each.updated_at))))
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
