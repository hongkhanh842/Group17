@extends('layouts.frontbase')

@section('title', 'Frequently Asked Questions | '. $setting->title)
@section('description', $setting->description)
@section('keywords', $setting->keywords)
@section('icon', Storage::url($setting->icon))
@endsection
@section('content')
    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active">Frequently Asked Questions </li>
            </ul>
        </div>
    </div>
    <!-- /BREADCRUMB -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h3>Frequently Asked Questions </h3>
                    </div>
                    <div id="accordion">
                        @foreach($datalist as $rs)
                            <div class="card">
                                <div class="card-header">
                                    <a class="card-link" data-toggle="collapse" href="#collapse{{$loop->iteration}}">

                                        {{$rs->question}}
                                    </a>
                                </div>
                                <div id="collapse{{$loop->iteration}}" class="collapse @once show @endonce" data-parent="#accordion">
                                    <div class="card-body">
                                        {!! $rs->answer !!}
                                    </div>
                                </div>
                                @endforeach
                            </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /section -->
@endsection
