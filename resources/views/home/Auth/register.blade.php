

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
    <link rel="stylesheet" href="{{asset('assets')}}/css/loginStyle.css">
</head>
<body>
<div class="containerSignup">
    <div class="signupAuth">
        <div class="signupTitle">
            <h2 class="text-success text-center font-weight-bold">Đăng Ký</h2>
            <p class="text-danger text-center font-weight-bold">LAPTOP HOUSE</p>
        </div>
        <form action="{{route('registering')}}" method="post">
            @csrf
            @auth
                <label>Tên khách hàng</label>
                <input required disabled  type="text" value="{{ auth()->user()->name }}">
                <br>
        
                <label>Email</label>
                <input required disabled type="email" value="{{ auth()->user()->email }}">
                <br>
        
                <label>Ảnh đại diện</label>
                <img src="{{auth()->user()->avatar}}" width="32px">
                <br>
        
                <label>Password</label>
                <input required type="password" name="password">
                <br>
        
            @endauth
        
            @guest
                <label for="name" >Tên khách hàng:</label>
                <input class="d-block form-control" required type="text" placeholder="Nhập tên" name="name">
        
                <label for="email">Email:</label>
                <input class="d-block form-control" required type="email" placeholder="Nhập email" name="email">

                <label for="phone">Số điện thoại:</label>
                <input class="d-block form-control" required type="tel" placeholder="Nhập số điện thoại" name="phone">

                <label for="password">Password:</label>
                <input class="d-block form-control" required type="password" name="password" placeholder="Nhập password">
            @endguest
        
            <button class="btn-submitSignup btn btn-success" type="submit">Đăng ký</button>
        </form>
</div>


{{-- BS4.6 JS  --}}
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
