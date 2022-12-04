@extends('layouts.frontbase')

{{--@section('title', $category->name . ' Products')--}}

@section('content')

    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Trang chủ</a></li>
                <li class="active">{{$category->name}}</li>
            </ul>

        </div>
    </div>



    <div class="section">
        <div class="container">
            <div class="row">
                <div id="main" class="col-md-12">

                    <div class="store-filter clearfix">
                        <div class="pull-left">
                            <div class="sort-filter">
                                <form>
                                    <input class="input search-input" type="text" placeholder="Nhập sản phẩm cần tìm">
                                    <div class="search-ajax-result">
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{-- <div class="pull-right">
                             <div class="sort-filter">
                                 <span class="text-uppercase">Sắp xếp theo:</span>
                                 <select class="input">
                                     <option value="0">Mới</option>
                                     <option value="1">Giá tăng dần</option>
                                     <option value="2">Giá giảm dần</option>
                                     <option value="2">Đánh giá</option>
                                 </select>
                             </div>
                         </div>--}}
                    </div>

                    <div id="store">
                        <div class="row">
                            @foreach($products as $rs)
                                <div class="col-md-4 col-sm-6 col-xs-6">
                                    <div class="product product-single">
                                        <div class="product-thumb">
                                            <a href="{{route('product.show',['id'=>$rs->id])}}"
                                               class="main-btn quick-view"><i class="fa fa-search-plus"></i>Xem</a>
                                            <img src="{{Storage::url($rs->image)}}">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-price">{{$rs->price}}.000 VND</h3>
                                            {{--    <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o empty"></i>
                                                </div>--}}
                                            <h2 class="product-name"><a href="{{route('product.show',['id'=>$rs->id])}}">{{$rs->name}}</a></h2>
                                            <div class="product-btn">
                                                <a class="primary-btn add-to-cart" href="{{route('shopcart.add',['id'=>$rs->id])}}">
                                                    <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="store-filter clearfix">
                        {{--<div class="pull-left">
                             <div class="row-filter">
                                 <a href="#"><i class="fa fa-th-large"></i></a>
                                 <a href="#" class="active"><i class="fa fa-bars"></i></a>
                             </div>
                              <div class="sort-filter">
                                  <span class="text-uppercase">Sort By:</span>
                                  <select class="input">
                                      <option value="0">Position</option>
                                      <option value="0">Price</option>
                                      <option value="0">Rating</option>
                                  </select>
                                  <a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
                              </div>
                        </div>--}}
                        <div class="pull-right" >
                            <ul class="store-pages" id="pagination">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $.ajax({
                url: "{{ route('api.category.show',[$id])}}",
                dataType: 'json',
                data: {page: {{ request()->get('page') ?? 1 }}},
                success: function (response) {
                    response.data.product.forEach(function (each) {
                       /* $('#table-data').append($('<tr>')
                            .append($('<td>').append(each.id))
                            .append($('<td>').append(getParentsTree(each, each.name, response.data.data)))
                            .append($('<td>').append(each.name))
                            .append($('<td>').append(image))
                            .append($('<td>').append(each.status))
                            .append($('<td>').append(show))
                            .append($('<td>').append(edit))
                            .append($('<td>').append(del))
                        );*/
                    });
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
@endpush
