<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets')}}/home/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{asset('assets')}}/home/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>Product Page - Material Kit PRO by Creative Tim</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>
 {{-- FONT AWESOME --}}
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/all.min.css" integrity="sha512-c93ifPoTvMdEJH/rKIcBx//AL1znq9+4/RmMGafI/vnTFe/dKwnn1uoeszE2zJBQTS1Ck5CqSBE+34ng2PthJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <!-- CSS Files -->
 <link href="{{asset('assets')}}/home/css/bootstrap.min.css" rel="stylesheet"/>
 <link href="{{asset('assets')}}/home/css/material-kit.css?v=1.2.1" rel="stylesheet"/>
 <link href="{{asset('assets')}}/home/css/style.css" rel="stylesheet"/>


</head>

<body class="product-page">
    @include('home.navbar')

    @include('home.header')

<div class="section">
    <div class="container">
        <div class="main-product">
            <div class="row">
                <div class="col-md-6 col-sm-6">

                    <div class="tab-content" id="product_image">
                    </div>
                    <ul class="nav flexi-nav" role="tablist" id="flexiselDemo1">
                    </ul>
                </div>
                <div class="col-md-6 col-sm-6">
                    <h2 class="title" id="product_name"></h2>
                    <h3 class="main-price" id="product_price"></h3>
                    <h3 class="main-price" id="product_quantity"></h3>
                    <div id="acordeon">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-border panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                       aria-expanded="true" aria-controls="collapseOne">
                                        <h4 class="panel-title">
                                            Mô tả
                                            <i class="material-icons">keyboard_arrow_down</i>
                                        </h4>
                                    </a>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <p id="product_des"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-border panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"
                                       aria-controls="collapseOne">
                                        <h4 class="panel-title">
                                            Thông số chi tiết
                                            <i class="material-icons">keyboard_arrow_down</i>
                                        </h4>
                                    </a>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body" id="detail">
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div><!--  end acordeon -->
                    <form action="{{route('cart.store',[$id])}}" method="post" >
                        @csrf
                    <div class="row pick-size">
                        <div class="col-md-6 col-sm-6" id="input_quantity">
                        </div>
                        @error('quantity')
                        <div class="error" style="color:red">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row text-right">
                        <button class="btn btn-success btn-round">Đặt hàng &nbsp;<i class="material-icons">payments</i>
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="features text-center">
            <div class="row">
                <div class="col-md-6">
                    <div class="info">
                        <div class="icon icon-info">
                            <i class="material-icons">local_shipping</i>
                        </div>
                        <h4 class="info-title">Giao hàng trong 3 ngày khu vực nội thành</h4>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="info">
                        <div class="icon icon-success">
                            <i class="material-icons">verified_user</i>
                        </div>
                        <h4 class="info-title">Hỗ trợ đổi sản phẩm khác trong vòng 7 ngày nếu có lỗi từ nhà sản
                            xuất</h4>

                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <h2 class="section-title">Sản phẩm tương tự</h2>
            <div class="row" id="product">
            </div>
        </div>
    </div>
</div>

@include('home.footer')
<script>
    var parent;
    $(document).ready(function () {
        $.ajax({
            url: '{{ route('api.product.one',[$id]) }}',
            dataType: 'json',
            success: function (response) {
                let _des= response.data.use +': '+response.data.cpu+'/'+response.data.ram+'/'+response.data.ssd;
                $('#detail').append(response.data.detail);
                $('#product_name').append(response.data.name);
                $('#product_des').html(_des);
                $('#product_price').append(getPrice(response.data.price));
                $('#product_quantity').append('Còn lại: '+response.data.quantity + ' sản phẩm');
                let _html = 'Số lượng:' + '<input type="number" name="quantity" value="1" min="1" max="each.quantity">'
                _html = _html.replace('each.quantity',response.data.quantity);
                $('#input_quantity').append(_html);
                parent = response.data.category.id;
            },
            error: function (response) {
            }
        })

        $.ajax({
            url: '{{ route('api.image.full',[$id]) }}',
            dataType: 'json',
            success: function (response) {
                let count = 1;
                let _html = '';
                let _html2 = '';
                response.data.forEach(function (each) {
                    let image = '<img src="' + '/storage/' + each.image + '">'
                    if (count == 1) {
                        _html = '<div class="tab-pane active" id="product-page' + count + '">' +
                            image +
                            '</div>';
                        _html2 = '<li class="active">' +
                            '<a href="#product-page' + count + '" role="tab" data-toggle="tab" aria-expanded="false">' +
                            image +
                            '</a></li>'
                    } else {
                        _html = '<div class="tab-pane" id="product-page' + count + '">' +
                            image +
                            '</div>';
                        _html2 = '<li>' +
                            '<a href="#product-page' + count + '" role="tab" data-toggle="tab" aria-expanded="false">' +
                            image +
                            '</a></li>'
                    }
                    $('#product_image').append(_html);
                    $('#flexiselDemo1').append(_html2);
                    count++;
                });

                $("#flexiselDemo1").flexisel({
                    visibleItems: 3,
                    itemsToScroll: 1,
                    animationSpeed: 400,
                    enableResponsiveBreakpoints: true,
                    responsiveBreakpoints: {
                        portrait: {
                            changePoint: 480,
                            visibleItems: 3
                        },
                        landscape: {
                            changePoint: 640,
                            visibleItems: 3
                        },
                        tablet: {
                            changePoint: 768,
                            visibleItems: 3
                        }
                    }
                });
            },
            error: function (response) {
            }
        })

        $.ajax({
            url: '{{ route('api.product.full1') }}',
            dataType: 'json',
            success: function (response) {
                let count=0;
                response.data.data.forEach(function (each) {
                    let image = '<img src="' + '/storage/' + each.image + '" alt="">';
                    let html_ = '';
                    if (count < 3 && each.category_id === parent) {
                        html_ = '<div class="col-md-4">  ' +
                            '<div class="card card-product card-plain">' +
                            '<div class="card-image">' +
                            ' <a href="{{route('product.show',['each.id'])}}">' +
                            image +
                            '  </a>' +
                            '</div>' +
                            ' <div class="card-content">' +
                            '  <h4 class="card-title">' +
                            '  <a href="{{route('product.show',['each.id'])}}">'+each.name+'</a>' +
                            '   </h4>' +
                            '  <p class="card-description">' +
                            getDetailByKey(each.use,each.cpu,each.ram,each.ssd)+
                            '</p>' +
                            '  <div class="footer">' +
                            '    <div class="price-container">' +
                            ' <span class="price price-new">'+getPrice(each.price)+'</span>' +
                            '<a class="gioHangIcon" href="{{route('cart.add',['each.id'])}}"><i class="fa fa-cart-plus"></i></a>' +
                            '   </div></div></div></div></div>';
                        html_ = html_.replaceAll('each.id',each.id);
                        $('#product').append(html_);
                        count++;
                    }

                });
            },
            error: function (response) {
            }
        })
    });
</script>



<script src="{{asset('assets')}}/home/js/jquery.flexisel.js"></script>
</body>
</html>
