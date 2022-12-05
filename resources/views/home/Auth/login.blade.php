<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>

    {{-- BS4.6 CSS  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    {{-- FONT AWESOME --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha512-9BwLAVqqt6oFdXohPLuNHxhx36BVj5uGSGmizkmGkgl3uMSgNalKc/smum+GJU/TTP0jy0+ruwC3xNAk3F759A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- admin MAIN CSS --}}
    <link rel="stylesheet" href="{{asset('assets')}}/admin/css/adminStyle.css">
</head>
<body>
    @include('notify')
<div class="containerLogin">
    <div class="loginAuth">
        <div class="loginAdminTitle">
            <h2 class="text-success text-center font-weight-bold">Đăng Nhập</h2>
            <p class="text-danger text-center font-weight-bold">LAPTOP HOUSE</p>
        </div>
        <form action="{{route('logging')}}" method="post">
            @csrf
            <label for="email">Email: </label>
            <input class="form-control"  type="email" class="form-control" placeholder="Email" name="email">
            <label for="password">Password: </label>
            <input class="form-control"  type="password" class="form-control" placeholder="Password" name="password">
            <button class="btn-submitLogin btn btn-success" type="submit">Đăng nhập</button>
        </form>
        <div class="loginAdminFooter">
            <p class="font-weight-bold text-info">Đăng nhập bằng:</p>
        <a class="github" href="{{ route('auth.redirect', 'github') }}"><i class="fab fa-github"></i></a>
        <a class="facebook" href="{{ route('auth.redirect', 'facebook') }}"><i class="fab fa-facebook"></i></a>
        <a class="google" href="{{ route('auth.redirect', 'google') }}"><i class="fab fa-google"></i></a>
        </div>
    </div>
</div>


{{-- BS4.6 JS  --}}
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
