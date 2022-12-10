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
                                                  data-currency="€">€42</span>
                                            <span id="price-right" class="price-right pull-right"
                                                  data-currency="€">€880</span>
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
                                                    Trousers
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
                                                    Loro Piana
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="" data-toggle="checkbox"><span
                                                        class="checkbox-material"><span class="check"></span></span>
                                                    Massimo Alba
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
                                                    Purple
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
                                                    Purple
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
                                                    All
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card -->
                    </div>

                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card card-product card-plain no-shadow" data-colored-shadow="false">
                                    <div class="card-image">
                                        <a href="#">
                                            <img src="{{asset('assets')}}/home/img/examples/suit-1.jpg" alt="...">
                                        </a>
                                    </div>
                                    <div class="card-content">
                                        <a href="#">
                                            <h4 class="card-title">Polo Ralph Lauren</h4>
                                        </a>
                                        <p class="description">
                                            Impeccably tailored in Italy from lightweight navy wool.
                                        </p>
                                        <div class="footer">
                                            <div class="price-container">
                                                <span class="price"> € 800</span>
                                            </div>

                                            <button
                                                class="btn btn-rose btn-simple btn-fab btn-fab-mini btn-round pull-right"
                                                rel="tooltip" title="" data-placement="left"
                                                data-original-title="Remove from wishlist">
                                                <i class="material-icons">favorite</i>
                                            </button>
                                        </div>
                                    </div>
                                </div> <!-- end card -->
                            </div>
                            <div class="col-md-4">
                                <div class="card card-product card-plain no-shadow" data-colored-shadow="false">
                                    <div class="card-image">
                                        <a href="#">
                                            <img src="{{asset('assets')}}/home/img/examples/suit-1.jpg" alt="...">
                                        </a>
                                    </div>
                                    <div class="card-content">
                                        <a href="#">
                                            <h4 class="card-title">Polo Ralph Lauren</h4>
                                        </a>
                                        <p class="description">
                                            Impeccably tailored in Italy from lightweight navy wool.
                                        </p>
                                        <div class="footer">
                                            <div class="price-container">
                                                <span class="price"> € 800</span>
                                            </div>

                                            <button
                                                class="btn btn-rose btn-simple btn-fab btn-fab-mini btn-round pull-right"
                                                rel="tooltip" title="" data-placement="left"
                                                data-original-title="Remove from wishlist">
                                                <i class="material-icons">favorite_border</i>
                                            </button>
                                        </div>
                                    </div>
                                </div> <!-- end card -->
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--  <div class="section">
              <div class="container">
                  ABC
              </div>
          </div>--}}
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function () {

            var slider2 = document.getElementById('sliderRefine');

            noUiSlider.create(slider2, {
                start: [42, 880],
                connect: true,
                range: {
                    'min': [30],
                    'max': [900]
                }
            });

            var limitFieldMin = document.getElementById('price-left');
            var limitFieldMax = document.getElementById('price-right');

            slider2.noUiSlider.on('update', function (values, handle) {
                if (handle) {
                    limitFieldMax.innerHTML = $('#price-right').data('currency') + Math.round(values[handle]);
                } else {
                    limitFieldMin.innerHTML = $('#price-left').data('currency') + Math.round(values[handle]);
                }
            });
        });
    </script>
@endpush
