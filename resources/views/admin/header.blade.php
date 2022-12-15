<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('admin.index')}}" class="nav-link">Trang chủ</a>
            </li>
            <li>
                @include('notify')
            </li>
        </ul>
    </nav>
</div>
@push('css')
    <style>
        .error {
            color: red;
        }
    </style>
@endpush
