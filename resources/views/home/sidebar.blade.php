<div id="navigation">
    <div class="container">
        <div id="responsive-nav">
            @php
                $mainCategories = \App\Http\Controllers\home\HomeController::maincategorylist()
            @endphp
            <div class="category-nav @if (!@isset($page)) show-on-click @endif">
                <span class="category-header">Danh mục <i class="fa fa-list"></i></span>
                <ul class="category-list">
                    @foreach($mainCategories as $rs)
                        <li class="dropdown side-dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">{{ $rs->name }}<i
                                    class="fa fa-angle-right"></i></a>
                            <div class="custom-menu">
                                <div class="row">
                                    @if(count($rs->children))
                                        @include('home.categorytree',['children' => $rs->children])
                                    @endif
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="menu-nav">
                <span class="menu-header">Các trang<i class="fa fa-bars"></i></span>
                <ul class="menu-list">
                    <li><a href="{{route('home')}}">Trang chủ</a></li>
                    <li><a href="{{route('product.index')}}">Sản phẩm</a></li>
                    {{--<li><a --}}{{--href="{{route('faq')}}"--}}{{-->FAQ</a></li>
                    <li><a --}}{{--href="{{route('about')}}"--}}{{-->About </a></li>
                    <li><a --}}{{--href="{{route('contact')}}"--}}{{-->Contact</a></li>--}}

                </ul>
            </div>
        </div>
    </div>
</div>

