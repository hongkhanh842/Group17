@extends('layouts.adminbase')

@section('title', 'Edit FAQ')
@section('head')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 id="title"></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Edit FAQ</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">FAQ Elements</h3>
                </div>
                <form role="form" action="{{route('admin.faq.update',['id'=>$id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group" id="question">
                            <label for="exampleInputEmail1">Question</label>
                        </div>
                        <div class="form-group" id="answer">
                            <label for="exampleInputEmail1">Answer</label>
                            <textarea class="textarea" id='answer' name="answer">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status" id="status">
                                <option>True</option>
                                <option>False</option>
                            </select>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update Data</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
@section('foot')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(function () {
            $('.textarea').summernote()
        })
    </script>
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


        $(document).ready(async function() {
            $.ajax({
                url: '{{ route('api.faq') }}',
                dataType: 'json',
                success: function (response) {
                    response.data.data.forEach(function (each) {

                        let status = '<option selected>'+'each.status'+'</option>'
                        status = status.replace('each.status',each.status);

                        let question ='<input type="text" class="form-control" name="question" value="each.question" >'
                        question = question.replace('each.question',each.question);

                        if (each.id === {{$id}}) {
                            $('#title').html('Edit Faq: ').append(each.title);
                            $('#question').append(question);
                            $('#answer').append(each.answer);
                            $('#status').append(status);
                        }
                    });
                },
                error: function (response) {
                }

            })
        });
    </script>
@endpush
