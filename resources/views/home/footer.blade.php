@php use Illuminate\Support\Facades\Session; @endphp
<footer class="footerLaptop footer bg-dark">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-3">
                <h5 class="font-weight-bolder">LAPTOP HOUSE</h5>
                <p>Chất lượng tạo uy tín</p>
            </div>
            <div class="col-xs-3 text-left">
                <a class="visible-lg-block mb-2">Quy định Bảo hành, Đổi, Trả</a>
                <a class="visible-lg-block">Hướng dẫn mua online</a>
                <a class="visible-lg-block">Giao hàng, thanh toán</a>
                <a class="visible-lg-block">Chính sách trả góp</a>
            </div>
            <div class="col-xs-3 text-left">
                <a class="visible-lg-block mb-2">Giới thiệu công ty</a>
                <a class="visible-lg-block">Liên hệ</a>
                <a class="visible-lg-block">Hợp tác kinh doanh</a>
                <a class="visible-lg-block">Tuyển dụng</a>
            </div>
            <div class="col-xs-3 text-left">
                <a class="visible-lg-block mb-2" href="tel:0395806037">Gọi mua hàng: <span>039.580.6037</span></a>
                <a class="visible-lg-block" href="tel:0378385092">Gọi bảo hành: <span>037.838.5092</span></a>
                <a class="visible-lg-block" href="tel:0395806037">Gọi khiếu nại góp ý: <span>039.580.6037</span></a>
                <a class="facebook" href="#"><i class="fab fa-facebook"></i></a>
                <a class="google" href="#"><i class="fab fa-google-plus-g"></i></a>
                <a class="twitter" href="#"><i class="fab fa-twitter"></i></a>
            </div>
            
        </div>


    </div>
</footer>


<script src="{{asset('assets')}}/home/js/jquery.min.js" type="text/javascript"></script>
<script src="{{asset('assets')}}/home/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{asset('assets')}}/home/js/material.min.js"></script>

<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{asset('assets')}}/home/js/moment.min.js"></script>

<!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{asset('assets')}}/home/js/nouislider.min.js" type="text/javascript"></script>

<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="{{asset('assets')}}/home/js/bootstrap-datetimepicker.js" type="text/javascript"></script>

<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{asset('assets')}}/home/js/bootstrap-selectpicker.js" type="text/javascript"></script>

<!--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/  -->
<script src="{{asset('assets')}}/home/js/bootstrap-tagsinput.js"></script>

<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{asset('assets')}}/home/js/jasny-bootstrap.min.js"></script>


<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
<script src="{{asset('assets')}}/home/js/material-kit.js?v=1.2.1" type="text/javascript"></script>

<script src="{{asset('assets/admin')}}/js/helper.js"></script>
<script>
    $(document).ready(function () {
        @auth
        $.ajax({
            url: '{{ route('api.cart.count')}}',
            dataType: 'json',
            success: function (response) {
                $('#cart').append(response.data);
            },
            error: function (response) {
            }
        })
        @endauth
        @if (Session::exists('cart'))
        @guest
        @php
            $i=1;
            foreach(Session::get('cart') as $each)
            {
                $i++;
            }
            $arr['count']=$i-1;
        @endphp
        $('#cart').append({{$arr['count']}});
        @endguest
        @endif
    });
</script>
