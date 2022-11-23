@extends('layouts.adminbase')

@section('title', 'Add FAQ ')
@section('head')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add FAQ </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Add FAQ </li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">FAQ  Elements</h3>
                </div>
                <form role="form" action="{{route('admin.faq.store')}}" method="post" enctype="multipart/form-data" id="form-create">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Question</label>
                            <input type="text" class="form-control" name="question" placeholder="Question">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Answer </label>
                            <textarea class="form-control" id="answer" name="answer">
                            </textarea>
                            <script>
                                ClassicEditor
                                    .create( document.querySelector( '#answer' ) )
                                    .then( editor => {
                                        console.log( editor );
                                    } )
                                    .catch( error => {
                                        console.error( error );
                                    } );
                            </script>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option>True</option>
                                <option>False</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection

@push('js')
    <script>
        function submitForm() {
            $.ajax({
                url: $("#form-create").attr('action'),
                type: 'POST',
                dataType: 'json',
                data: $("#form-create").serialize(),
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
                url: '{{ route('api.category') }}',
                dataType: 'json',
                success: function (response) {
                    $('#select-data').html('<option value="0" selected="selected">Main Category</option>');
                    response.data.data.forEach(function (each) {

                        let html = "<option value='id'>"
                        html =html.replace('id',each.id);
                        let option = getParentsTree(each, each.title, response.data.data);

                        $('#select-data').append(html + option + '</option>' )
                    });
                },
                error: function (response) {
                }

            })
        })
    </script>
@endpush
