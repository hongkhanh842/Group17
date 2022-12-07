
        <form action="{{route('admin.logging')}}" method="post">
            @csrf
            <label>Email: </label>
            <input type="email" class="form-control" placeholder="Email" name="email">
            <label >Password: </label>
            <input type="password" class="form-control" placeholder="Password" name="password">
            <button  type="submit">Đăng nhập</button>
        </form>

