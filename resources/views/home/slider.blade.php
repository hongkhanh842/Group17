<div id="home">
    <div class="container">
        <div class="home-wrap">
            <div id="home-slick">
                @foreach($sliderdata as $rs)
                    <div class="banner banner-1 container">
                        <div class="row">
                            <div class="col-6">
                                <img class="img-fluid" src="{{Storage::url($rs->image)}}" style="width: 450px; height: 400px">
                            </div>
                            <div class="col-6">
                                <div class="banner-caption text-center">
                                    <h1 class="text-dark sliderCaption">{{$rs->name}}</h1>
                                    <a href="{{route('product.show',['id'=>$rs->id])}}" class="btn primary-btn btnShop">Mua ngay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
