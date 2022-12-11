@extends('layouts.frontbase')

@section('content')
    <div class="main main-raised">
        <div class="section">
            <div class="container">
                <h2 class="section-title">Tìm sản phẩm bạn muốn</h2>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-refine card-plain">
                            <div class="card-content">
                                <h4 class="card-title">
                                    Xoá bộ lọc
                                    <button class="btn btn-default btn-fab btn-fab-mini btn-simple pull-right"
                                            rel="tooltip" title="" data-original-title="Reset Filter">
                                        <i class="material-icons">cached</i>
                                    </button>
                                </h4>
                                <div class="panel panel-default panel-rose">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <a class="collapsed" role="button" data-toggle="collapse"
                                           data-parent="#accordion" href="#collapseOne" aria-expanded="false"
                                           aria-controls="collapseOne">
                                            <h4 class="panel-title">Khoảng giá (triệu VND)</h4>
                                            <i class="material-icons">keyboard_arrow_down</i>
                                        </a>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                         aria-labelledby="headingOne">
                                        <div class="panel-body panel-refine">
                                            <span id="price-left" class="price-left pull-left"
                                                  data-currency="€"></span>
                                            <span id="price-right" class="price-right pull-right"
                                                  data-currency="€"></span>
                                            <div class="clearfix"></div>
                                            <div id="sliderRefine"
                                                 class="slider slider-rose noUi-target noUi-ltr noUi-horizontal"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default panel-rose">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <a class="collapsed" role="button" data-toggle="collapse"
                                           data-parent="#accordion" href="#collapseTwo" aria-expanded="false"
                                           aria-controls="collapseTwo">
                                            <h4 class="panel-title">Hãng</h4>
                                            <i class="material-icons">keyboard_arrow_down</i>
                                        </a>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                                         aria-labelledby="headingTwo">
                                        <div class="panel-body">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="" data-toggle="checkbox"><span
                                                        class="checkbox-material"><span class="check"></span></span>
                                                    ACER
                                                </label>
                                                <label>
                                                    <input type="checkbox" value="" data-toggle="checkbox"><span
                                                        class="checkbox-material"><span class="check"></span></span>
                                                    ASUS
                                                </label>
                                                <label>
                                                    <input type="checkbox" value="" data-toggle="checkbox"><span
                                                        class="checkbox-material"><span class="check"></span></span>
                                                    APPLE
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default panel-rose">
                                    <div class="panel-heading" role="tab" id="headingThree">
                                        <a class="collapsed" role="button" data-toggle="collapse"
                                           data-parent="#accordion" href="#collapseThree" aria-expanded="false"
                                           aria-controls="collapseThree">
                                            <h4 class="panel-title">CPU</h4>
                                            <i class="material-icons">keyboard_arrow_down</i>
                                        </a>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel"
                                         aria-labelledby="headingThree">
                                        <div class="panel-body">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="" data-toggle="checkbox"><span
                                                        class="checkbox-material"><span class="check"></span></span>
                                                    Intel Core I5
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="" data-toggle="checkbox"><span
                                                        class="checkbox-material"><span class="check"></span></span>
                                                    Intel Core I7
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="" data-toggle="checkbox"><span
                                                        class="checkbox-material"><span class="check"></span></span>
                                                    AMD Ryzen 5
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="" data-toggle="checkbox"><span
                                                        class="checkbox-material"><span class="check"></span></span>
                                                    AMD Ryzen 7
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="" data-toggle="checkbox"><span
                                                        class="checkbox-material"><span class="check"></span></span>
                                                    AMD Ryzen 9
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default panel-rose">
                                    <div class="panel-heading" role="tab" id="headingFour">
                                        <a class="collapsed" role="button" data-toggle="collapse"
                                           data-parent="#accordion" href="#collapseFour" aria-expanded="false"
                                           aria-controls="collapseFour">
                                            <h4 class="panel-title">RAM</h4>
                                            <i class="material-icons">keyboard_arrow_down</i>
                                        </a>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel"
                                         aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="" data-toggle="checkbox"><span
                                                        class="checkbox-material"><span class="check"></span></span>
                                                    8GB
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="" data-toggle="checkbox"><span
                                                        class="checkbox-material"><span class="check"></span></span>
                                                    16GB
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default panel-rose">
                                    <div class="panel-heading" role="tab" id="headingFive">
                                        <a class="collapsed" role="button" data-toggle="collapse"
                                           data-parent="#accordion" href="#collapseFive" aria-expanded="false"
                                           aria-controls="collapseFive">
                                            <h4 class="panel-title">SSD</h4>
                                            <i class="material-icons">keyboard_arrow_down</i>
                                        </a>
                                    </div>
                                    <div id="collapseFive" class="panel-collapse collapse" role="tabpanel"
                                         aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="" data-toggle="checkbox"><span
                                                        class="checkbox-material"><span class="check"></span></span>
                                                    256GB
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="" data-toggle="checkbox"><span
                                                        class="checkbox-material"><span class="check"></span></span>
                                                    512GB
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="" data-toggle="checkbox"><span
                                                        class="checkbox-material"><span class="check"></span></span>
                                                    1TB
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default panel-rose">
                                    <div class="panel-heading" role="tab" id="headingSix">
                                        <a class="collapsed" role="button" data-toggle="collapse"
                                           data-parent="#accordion" href="#collapseSix" aria-expanded="false"
                                           aria-controls="collapseSix">
                                            <h4 class="panel-title">Nhu cầu</h4>
                                            <i class="material-icons">keyboard_arrow_down</i>
                                        </a>
                                    </div>
                                    <div id="collapseSix" class="panel-collapse collapse" role="tabpanel"
                                         aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="" data-toggle="checkbox"
                                                           checked=""><span class="checkbox-material"><span
                                                            class="check"></span></span>
                                                    Gaming
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="" data-toggle="checkbox"
                                                           checked=""><span class="checkbox-material"><span
                                                            class="check"></span></span>
                                                    Văn phòng - Học tập
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card -->
                    </div>

                    <div class="col-md-9">
                        <div class="row" id="product_show">
                        </div>
                    </div>
                </div>
                <div>
                    <ul class="pagination pagination-success" id="pagination">
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $.ajax({
                url: '{{ route('api.product.search2') }}',
                dataType: 'json',
                data: {page: {{ request()->get('page') ?? 1 }}},
                success: function (response) {
                    let _html = '';
                    response.data.data.forEach(function (each) {
                        _html = '<div class="col-md-4">' +
                            '<div class="card card-product card-plain no-shadow" data-colored-shadow="false">' +
                            '<div class="card-image">' +
                            '  <a href="{{route('product.show',['each.id'])}}">' +
                            '<img src="' + '/storage/' + each.image + '" alt="">' +
                            ' </a></div>' +
                            ' <div class="card-content">' +
                            '   <a href="{{route('product.show',['each.id'])}}">' +
                            '  <h4 class="card-title">' + each.name + '</h4></a>' +
                            ' <p class="description">' + getDetailByKey(each.use, each.cpu, each.ram, each.ssd) + '</p>' +
                            ' <div class="footer">' +
                            '  <div class="price-container">' +
                            '  <span class="price price-new">' + getPrice(each.price) + '</span>' +
                            '</div></div></div></div>'
                        _html = _html.replaceAll('each.id',each.id);
                        $('#product_show').append(_html);
                    })
                    renderPagination(response.data.pagination);
                },
                error: function (response) {
                }
            })
            $(document).on('click', '#pagination > li > a', function (event) {
                event.preventDefault();
                let page = $(this).text();
                let urlParams = new URLSearchParams(window.location.search);
                urlParams.set('page', page);
                window.location.search = urlParams;
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            var slider2 = document.getElementById('sliderRefine');
            noUiSlider.create(slider2, {
                start: [10, 30],
                connect: true,
                range: {
                    'min': [0],
                    'max': [100]
                }
            });
            var limitFieldMin = document.getElementById('price-left');
            var limitFieldMax = document.getElementById('price-right');

            slider2.noUiSlider.on('update', function (values, handle) {
                if (handle) {
                    limitFieldMax.innerHTML =  Math.round(values[handle]);
                } else {
                    limitFieldMin.innerHTML = Math.round(values[handle]);
                }
            });
        });
    </script>
@endpush
