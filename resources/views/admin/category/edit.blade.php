@extends('layouts.adminbase')

@section('title', 'Edit Category')

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
                            <li class="breadcrumb-item active">Edit Category</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Category Elements</h3>
                </div>
                <form role="form" action="{{route('admin.category.update',['id'=>$id])}}" method="post"
                      enctype="multipart/form-data" id="form-edit">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Parent Category</label>
                            <select class="form-control select2" name="parent_id" style="width: 100%;" id="select-data">
                                {{--@if ($rs->id == $data->parent_id)  selected="selected"  @endif--}}
                            </select>
                        </div>
                        <div class="form-group" id="title1">
                            <label for="exampleInputEmail1">Title</label>
                        </div>
                        @if ($errors->has('title'))
                            <span class="alert alert-danger">
                                {{ $errors->first('title') }}
                            </span>
                        @endif
                        <div class="form-group" id="keywords">
                            <label for="exampleInputEmail1">Keywords</label>
                        </div>
                        <div class="form-group" id="description">
                            <label for="exampleInputEmail1">Description</label>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image">
                                    <label class="custom-file-label" for="exampleInputFile">Choose image file</label>
                                </div>
                            </div>
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
                url: '{{ route('api.category') }}',
                dataType: 'json',
                success: function (response) {
                    let val;
                    $('#select-data').html('<option value="0" selected="selected">Main Category</option>');
                    response.data.data.forEach(function (each) {


                        let html = "<option value='id'>"
                        html = html.replace('id', each.id);
                        let option = getParentsTree(each, each.title, response.data.data);

                        let status = '<option selected>' + 'each.status' + '</option>'
                        status = status.replace('each.status', each.status);

                        let title1 = '<input type="text" class="form-control" name="title" value="each.title">'
                        title1 = title1.replace('each.title', each.title);
                        let keywords = '<input type="text" class="form-control" name="keywords" value="each.keywords">'
                        keywords = keywords.replace('each.keywords', each.keywords);
                        let description = '<input type="text" class="form-control" name="description" value="each.description">'
                        description = description.replace('each.description', each.description);

                        $('#select-data').append(html + option + '</option>')
                        if (each.id === {{$id}}) {
                            $('#title').html('Edit Category: ').append(each.title);
                            $('#title1').append(title1);
                            $('#keywords').append(keywords);
                            $('#description').append(description);
                            $('#status').append(status);
                            val=each.id.toString();
                        }

                         $('#select-data').val(val)
                    });

                },
                error: function (response) {
                }

            })
        })
    </script>
@endpush
