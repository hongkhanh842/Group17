<form action="{{route('registering')}}" method="post">
    @csrf
    @auth
        <label>Name</label>
        <input required disabled  type="text" value="{{ auth()->user()->name }}">
        <br>

        <label>Email</label>
        <input required disabled type="email" value="{{ auth()->user()->email }}">
        <br>

        <label>Avatar</label>
        <img src="{{auth()->user()->avatar}}" width="32px">
        <br>
    @endauth

    @guest
        <label>Name</label>
        <input required type="text" placeholder="Nhập tên">
        <br>

        <label>Email</label>
        <input required type="email" placeholder="Nhập email">
        <br>
    @endguest
    <button type="submit">Submit</button>
</form>
