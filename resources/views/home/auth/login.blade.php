<form action="{{route('logging')}}" method="post">
    @csrf
    <input type="email" class="form-control" placeholder="Email" name="email">
    <input type="password" class="form-control" placeholder="Password" name="password">
    <button type="submit">Đăng nhập</button>
</form>
<p>Đăng nhập bằng:</p>
<a href="{{ route('auth.redirect', 'github') }}">GITHUB</a>
<br>
<a href="{{ route('auth.redirect', 'facebook') }}">FACEBOOK</a>


