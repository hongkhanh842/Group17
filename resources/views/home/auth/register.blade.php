<form action="{{route('registering')}}" method="post">
    @csrf
        <label>Name</label>
        <input required type="text" placeholder="Nhập tên" name="name">
        <br>

        <label>Email</label>
        <input required type="email" placeholder="Nhập email" name="email">
        <br>

        <label>Password</label>
        <input required type="password" placeholder="Nhập password" name="password">
        <br>
    <button type="submit">Submit</button>
</form>
