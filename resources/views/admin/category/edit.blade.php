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
                <form role="form" action="{{route('admin.category.update',['id'=>$id])}}" method="post" enctype="multipart/form-data" id="form-edit">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label >Parent Category</label>
                            <select class="form-control select2" name="parent_id" style="width: 100%;" id="select-data">
                                {{--@foreach($datalist as $rs)
                                    <option value="{{$rs->id}}"  @if ($rs->id == $data->parent_id)  selected="selected"  @endif>
                                        {{ \App\Http\Controllers\AdminPanel\CategoryController::getParentsTree($rs, $rs->title) }}
                                    </option>
                                @endforeach--}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" class="form-control" name="title" value="{{$data->title}}">
                        </div>
                        @if ($errors->has('title'))
                            <span class="alert alert-danger">
                                {{ $errors->first('title') }}
                            </span>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputEmail1">Keywords</label>
                            <input type="text" class="form-control" name="keywords" value="{{$data->keywords}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <input type="text" class="form-control" name="description" value="{{$data->description}}">
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
                            <select class="form-control" name="status">
                                <option selected>{{$data->status}}</option>
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
                    $('#select-data').html('<option value="0" selected="selected">Main Category</option>');
                    response.data.data.forEach(function (each) {


                        let html = "<option value='id'>"
                        html =html.replace('id',each.id);
                        let option = getParentsTree(each, each.title, response.data.data);

                        $('#select-data').append(html + option + '</option>' )
                            if (each.id === {{$id}}) {
                                $('#title').html('Edit Category: ').append(each.title);
                            }

                    });
                },
                error: function (response) {
                }

            })

            $('#form-add').on('submit', function (event) {
                event.preventDefault();
                let form = $(this).serialize();
            })
        })
    </script>
@endpush
