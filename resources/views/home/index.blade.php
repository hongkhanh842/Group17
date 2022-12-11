@extends('layouts.frontbase')
@section('content')
    <div class="main main-raised">
        <div class="section">
            <div class="container">
                <h2 class="section-title">Các dòng sản phẩm nổi bật</h2>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">

                        <!-- Carousel Card -->
                        <div class="card card-raised card-carousel">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <div class="carousel slide" data-ride="carousel">

                                    <!-- Indicators -->
                                    <ol class="carousel-indicators" id="indicator">
                                    </ol>

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner" id="slider">
                                    </div>

                                    <!-- Controls -->
                                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                        <i class="material-icons">keyboard_arrow_left</i>
                                    </a>
                                    <a class="right carousel-control" href="#carousel-example-generic"
                                       data-slide="next">
                                        <i class="material-icons">keyboard_arrow_right</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- End Carousel Card -->

                    </div>
                </div>
            </div>
            <div class="container">
                <h2 class="section-title">Sản phẩm mới</h2>
                <div class="row" id="product">

                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $.ajax({
                url: '{{ route('api.category.full') }}',
                dataType: 'json',
                success: function (response) {
                    let count=0;
                    response.data.data.forEach(function (each) {
                        let image = '<img src="' + '/storage/' + each.image + '" alt="Awesome Image" style="height: 475px">';
                        let html_ = '';
                        if (each.parent_id !== 0) {
                            if (count === 0 ) {
                                $('#indicator').append('<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>');
                                html_ = '<div class="item active">'
                                html_ +=  image
                                html_ += '<div class="carousel-caption">'
                                html_ += '<h4>'+each.name+'</h4>'
                                html_ += '</div></div>'
                                $('#slider').html(html_);
                            } else {
                                $('#indicator').append('<li data-target="#carousel-example-generic" data-slide-to="'+count+'" class=""></li>');
                                html_ = '<div class="item">'
                                html_ += image
                                html_ += '<div class="carousel-caption">'
                                html_ += '<h4>'+each.name+'</h4>'
                                html_ += '</div></div>'
                                $('#slider').append(html_);
                            }
                            count++;
                        }
                    });
                },
                error: function (response) {
                }
            })

            $.ajax({
                url: '{{ route('api.product.full') }}',
                dataType: 'json',
                success: function (response) {
                    let count=0;
                    response.data.data.forEach(function (each) {
                        let image = '<img src="' + '/storage/' + each.image + '" alt="">';
                        let html_ = '';

                        if (count < 3) {
                            html_ = '<div class="col-md-4">  ' +
                                '<div class="card card-product card-plain">' +
                                '<div class="card-image">' +
                                ' <a href="#pablo">' +
                                image +
                                '  </a>' +
                                '</div>' +
                                ' <div class="card-content">' +
                                '  <h4 class="card-title">' +
                                '  <a href="#pablo">'+each.name+'</a>' +
                                '   </h4>' +
                                '  <p class="card-description">' +
                                getDetailByKey(each.use,each.cpu,each.ram,each.ssd)+
                                '</p>' +
                                '  <div class="footer">' +
                                '    <div class="price-container">' +
                                ' <span class="price price-new">'+getPrice(each.price)+'</span>' +
                                '   </div></div></div></div></div>';
                            $('#product').append(html_);
                        }
                        count++;
                    });
                },
                error: function (response) {
                }
            })
        });
    </script>
@endpush
