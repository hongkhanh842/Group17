<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ĐĂNG NHẬP</title>
    {{-- BS4 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        {{-- MAIN CSS --}}
        <link rel="stylesheet" href="{{asset('assets')}}/admin/css/adminStyle.css">


</head>
<body>

    <div class="loginAdmin">
        <div class="loginContainer">
            <h3 class="text-success font-weight-bold text-center mt-3 mb-1" >ĐĂNG NHẬP</h3>
            <p class="text-danger font-weight-bold text-right mb-3">Admin</p>
            <form action="{{route('admin.logging')}}" method="post">
                @csrf
                @include('notify')
                <label class="text-dark font-weight-bold" for="email">Email: </label>
                <input  class="form-control" placeholder="Nhập email..." name="email">
                @error('email')
                <div class="error" style="color:red">{{ $message }}</div>
                @enderror
                <label class="text-dark font-weight-bold mt-3" for="password">Password: </label>
                <input type="password" class="form-control" placeholder="Nhập Password..." name="password">
                @error('password')
                <div class="error" style="color:red">{{ $message }}</div>
                @enderror
                <button class="btn btn-success mt-4 d-block ml-auto mb-3" type="submit">Đăng nhập</button>
            </form>

        </div>
        <div class="logo">
            <h1 class="text-danger font-weight-bolder">LAPTOP HOUSE</h1>
        </div>
    </div>






    {{-- BS4 --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>


