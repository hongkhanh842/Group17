@extends('layouts.frontbase')

@section('content')
    <div class="main ">
        <div class="section">
            <div class="container">
                <h2 class="section-title">Tìm sản phẩm bạn muốn</h2>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-refine card-plain">
                            <div class="card-content">
                                <form id="filter-master">
                                    <h4 class="card-title">
                                        Xoá bộ lọc
                                        <button class="btn btn-default btn-fab btn-fab-mini btn-simple pull-right"
                                                rel="tooltip" title="" data-original-title="Reset Filter">
                                            <i class="material-icons">cached</i>
                                        </button>
                                    </h4>
                                    <div class="panel panel-default panel-rose">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <a class="text-panel collapsed" role="button" data-toggle="collapse"
                                               data-parent="#accordion" href="#collapseOne" aria-expanded="false"
                                               aria-controls="collapseOne">
                                                <h4 class="panel-title">Khoảng giá (triệu VND)</h4>
                                                <i class="material-icons">keyboard_arrow_down</i>
                                            </a>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                             aria-labelledby="headingOne">
                                            <div class="panel-body panel-refine">
                                                <input type="hidden" value="0" name="min" id="min">
                                                <span id="price-left" class="price-left pull-left"></span>
                                                <input type="hidden" value="100" name="max" id="max">
                                                <span id="price-right" class="price-right pull-right"></span>
                                                <div class="clearfix"></div>
                                                <div id="sliderRefine"
                                                     class="slider slider-rose noUi-target noUi-ltr noUi-horizontal"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default panel-rose">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <a class="text-panel collapsed" role="button" data-toggle="collapse"
                                               data-parent="#accordion" href="#collapseTwo" aria-expanded="false"
                                               aria-controls="collapseTwo">
                                                <h4 class="panel-title">Hãng</h4>
                                                <i class="material-icons">keyboard_arrow_down</i>
                                            </a>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel"
                                             aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                <div class="checkbox" id="brand">
                                                    <label>
                                                        <input type="checkbox" value="4" data-toggle="checkbox"
                                                               id="brand1" name="brand[]">
                                                        ACER
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" value="5" data-toggle="checkbox"
                                                               id="brand2" name="brand[]">
                                                        ASUS
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" value="6" data-toggle="checkbox"
                                                               id="brand3" name="brand[]">
                                                        APPLE
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default panel-rose">
                                        <div class="panel-heading" role="tab" id="headingThree">
                                            <a class="text-panel collapsed" role="button" data-toggle="collapse"
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
                                                        <input type="checkbox" value="0" data-toggle="checkbox"
                                                               id="cpu1" name="cpu[]">
                                                        Intel Core I5
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="1" data-toggle="checkbox"
                                                               id="cpu2" name="cpu[]">
                                                        Intel Core I7
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="2" data-toggle="checkbox"
                                                               id="cpu3" name="cpu[]">
                                                        AMD Ryzen 5
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="3" data-toggle="checkbox"
                                                               id="cpu4" name="cpu[]">
                                                        AMD Ryzen 7
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="4" data-toggle="checkbox"
                                                               id="cpu5" name="cpu[]">
                                                        AMD Ryzen 9
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default panel-rose">
                                        <div class="panel-heading" role="tab" id="headingFour">
                                            <a class="text-panel collapsed" role="button" data-toggle="collapse"
                                               data-parent="#accordion" href="#collapseFour" aria-expanded="false"
                                               aria-controls="collapseFour">
                                                <h4 class="panel-title">RAM</h4>
                                                <i class="material-icons">keyboard_arrow_down</i>
                                            </a>
                                        </div>
                                        <div id="collapseFour" class="panel-collapse collapse in" role="tabpanel"
                                             aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="0" data-toggle="checkbox"
                                                               name="ram[]">
                                                        8GB
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="1" data-toggle="checkbox"
                                                               name="ram[]">
                                                        16GB
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default panel-rose">
                                        <div class="panel-heading" role="tab" id="headingFive">
                                            <a class="text-panel collapsed" role="button" data-toggle="collapse"
                                               data-parent="#accordion" href="#collapseFive" aria-expanded="false"
                                               aria-controls="collapseFive">
                                                <h4 class="panel-title">SSD</h4>
                                                <i class="material-icons">keyboard_arrow_down</i>
                                            </a>
                                        </div>
                                        <div id="collapseFive" class="panel-collapse collapse in" role="tabpanel"
                                             aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="0" data-toggle="checkbox"
                                                               name="ssd[]">
                                                        256GB
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="1" data-toggle="checkbox"
                                                               name="ssd[]">
                                                        512GB
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="2" data-toggle="checkbox"
                                                               name="ssd[]">
                                                        1TB
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default panel-rose">
                                        <div class="panel-heading" role="tab" id="headingSix">
                                            <a class="text-panel collapsed in" role="button" data-toggle="collapse"
                                               data-parent="#accordion" href="#collapseSix" aria-expanded="false"
                                               aria-controls="collapseSix">
                                                <h4 class="panel-title">Nhu cầu</h4>
                                                <i class="material-icons">keyboard_arrow_down</i>
                                            </a>
                                        </div>
                                        <div id="collapseSix" class="panel-collapse collapse in" role="tabpanel"
                                             aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="0" data-toggle="checkbox "
                                                               name="use[]"
                                                        >
                                                        Gaming
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="1" data-toggle="checkbox"
                                                               name="use[]"
                                                        >
                                                        Văn phòng - Học tập
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-info btn-round" id="filter">
                                        <i class="material-icons">search</i>
                                        Lọc sản phẩm
                                    </button>
                                </form>
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
            let _url = '?cate=' + window.location.toString();
            @if($cate_id===null)
                _url = window.location.toString();
            @endif
                _url = _url.replace('http://group17.love/product', '');
                _url = _url.replace('/', '');

            $.ajax({
                url: '{{ route('api.product.search2') }}' + _url,
                dataType: 'json',
                data: {
                    page: {{ request()->get('page') ?? 1 }},
                },
                success: function (response) {
                    let _html = '';
                    console.log('{{ route('api.product.search2') }}' + _url)
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
                            '<a class="gioHangIcon" href="{{route('cart.add',['each.id'])}}"><i class="fa fa-cart-plus"></i></a>' +
                            '</div></div></div></div>'

                        _html = _html.replaceAll('each.id', each.id);
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
                start: [0, 100],
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
                    limitFieldMax.innerHTML = Math.round(values[handle]);
                    $('#max').val(Math.round(values[handle]))
                } else {
                    limitFieldMin.innerHTML = Math.round(values[handle]);
                    $('#min').val(Math.round(values[handle]))
                }
            });
        });
    </script>
@endpush
