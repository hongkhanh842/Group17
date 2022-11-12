@extends('layouts.adminwindow')

@section('title', 'Show Message: '.$data->title)

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail Message Data</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-striped">
                    <tr>
                        <th style="width: 200px">ID</th>
                        <td>{{$data->id}}</td>
                    </tr>
                    <tr>
                    </tr>
                    <tr>
                        <th style="width: 150px">Name</th>
                        <td>{{$data->name}}</td>
                    </tr>
                    <tr>
                        <th style="width: 150px">Phone Number</th>
                        <td>{{$data->phone}}</td>
                    </tr>
                    <tr>
                        <th style="width: 150px">Email</th>
                        <td>{{$data->email}}</td>
                    </tr>
                    <tr>
                        <th style="width: 150px">Subject</th>
                        <td>{{$data->subject}}</td>
                    </tr>
                    <tr>
                        <th style="width: 150px">Message</th>
                        <td>{{$data->message}}</td>
                    </tr>
                    <tr>
                        <th style="width: 150px">IP</th>
                        <td>{{$data->ip}}</td>
                    </tr>
                    <tr>
                        <th style="width: 150px">Status</th>
                        <td>{{$data->status}}</td>
                    </tr>
                    <tr>
                        <th>Created Date</th>
                        <td>{{$data->created_at}}</td>
                    </tr>
                    <tr>
                        <th>Update Date</th>
                        <td>{{$data->updated_at}}</td>
                    </tr>
                    <tr>
                        <th>Admin Note</th>
                        <td>
                            <form role="form" action="{{ route('admin.message.update',['id'=>$data->id]) }}" method="post">
                           @csrf
                            <textarea cols="100" id="note" name="note">
                                {{$data->note}}
                            </textarea>
                                <div class="card-footer">
                                    <button tupe="submit" class="btn btn-primary">Update Note</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </section>
    <!-- /.content -->
@endsection
