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
                        <th>Admin Note</th>
                        <td>
                            <form role="form" action="{{ route('admin.message.update',['id'=>$id]) }}" method="post" id="form-edit">
                           @csrf
                            <textarea cols="100" id="note" name="note" id="note">
                            </textarea>
                                <div class="card-footer">
                                    <button tupe="submit" class="btn btn-primary">Update Note</button>
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

        $(document).ready(async function () {
            $.ajax({
                url: '{{ route('api.message') }}',
                dataType: 'json',
                success: function (response) {

                    response.data.data.forEach(function (each) {
                        if (each.id === {{$id}}) {
                            $('#table-data')
                                .append($('<tr>').append($('<th style="width: 200px">').append('ID')).append($('<td>').append(each.id)))
                                .append($('<tr>').append($('<th>').append('Name'))     .append($('<td>').append(each.name)))
                                .append($('<tr>').append($('<th>').append('Phone Number'))  .append($('<td>').append(each.phone)))
                                .append($('<tr>').append($('<th>').append('Email'))     .append($('<td>').append(each.email)))
                                .append($('<tr>').append($('<th>').append('Subject'))    .append($('<td>').append(each.subject)))
                                .append($('<tr>').append($('<th>').append('Message'))    .append($('<td>').append(each.message)))
                                .append($('<tr>').append($('<th>').append('IP'))    .append($('<td>').append(each.ip)))
                                .append($('<tr>').append($('<th>').append('Status'))    .append($('<td>').append(each.status)))
                                .append($('<tr>').append($('<th>').append('Created At')).append($('<td>').append(convertDateToDateTime(each.created_at))))
                                .append($('<tr>').append($('<th>').append('Updated At')).append($('<td>').append(convertDateToDateTime(each.updated_at))))
                        }
                        $('#note').append(each.note)
                    });
                },
                error: function (response) {
                }
            })
        });
    </script>
@endpush
