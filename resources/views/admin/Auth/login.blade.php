<form action="{{route('admin.logging')}}" method="post">
    @csrf
    <input type="email" class="form-control" placeholder="Email" name="email">
    <input type="password" class="form-control" placeholder="Password" name="password">
    <button type="submit">Đăng nhập</button>
</form>
