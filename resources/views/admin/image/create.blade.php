
<form role="form" action="{{route('admin.image.store',['pid'=>$product->id])}}" method="post" enctype="multipart/form-data" >
    @csrf
    <div class="input-group">
        <label for="exampleInputEmail1"> Tên: </label>
        <input type="text" class="form-control" name="name" placeholder="Nhập tên" >
        <label for="exampleInputEmail1"> Hình ảnh: </label>
        <div class="custom-file">
            <input type="file" class="custom-file-input"  name="image">
            <label class="custom-file-label" >Chọn ảnh</label>
        </div>
        <div class="input-group-append">
            <input class="input-group-text"  type="submit" value="Lưu">
        </div>
    </div>
</form>
