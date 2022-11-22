@extends('layouts.adminwindow')

@section('title', 'Show Message')

@section('content')

    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail Message Data</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped" id="table-data">

                    <tr>
                        <th>Admin Note :</th>
                        <td>
                            <form role="form" action="{{route('admin.comment.update',['id'=>$id])}}" method="post" id="form-edit">
                                @csrf
                                <select name="status" id="select-data">
                                    <option>True</option>
                                    <option>False</option>
                                </select>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update Comment</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </section>
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

        $(document).ready(function () {
            $.ajax({
                url: '{{ route('api.comment') }}',
                dataType: 'json',
                success: function (response) {
                    response.data.data.forEach(function (each) {
                        if (each.id === {{$id}}) {
                            let title = '<a href="{{route('admin.product.show',['id'])}}">' + 'prd' + '</a>'
                            title = title.replace('id', each.product.id);
                            title = title.replace('prd', each.product.title);
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
