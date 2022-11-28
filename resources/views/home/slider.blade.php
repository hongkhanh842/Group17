<!-- HOME -->
<div id="home">
    <!-- container -->
    <div class="container">
        <!-- home wrap -->
        <div class="home-wrap">
            <!-- home slick -->
            <div id="home-slick">
                <!-- banner -->
                @foreach($sliderdata as $rs)
                    <div class="banner banner-1 container">
                        <div class="row">
                            <div class="col-6">
                                <img class="img-fluid" src="{{Storage::url($rs->image)}}" style="width: 450px; height: 400px">
                            </div>
                            <div class="col-6">
                                <div class="banner-caption text-center">
                                    <h1 class="text-dark sliderCaption">{{$rs->title}}</h1>
                                    <button href="{{route('product',['id'=>$rs->id])}}" class="btn primary-btn btnShop">SHOP NOW</button>
                                </div> 
                            </div>
                        </div>
                        
                        
                    </div>
                @endforeach
                <!-- /banner -->
            </div>
            <!-- /home slick -->
        </div>
        <!-- /home wrap -->
    </div>
    <!-- /container -->
</div>
<!-- /HOME -->
