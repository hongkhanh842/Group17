<footer class="footer">
    <div class="container">
        <nav class="pull-left">
            <ul>
                <li>
                    <a href="#">
                        Nhóm 17
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright pull-right">
            &copy; <script>document.write(new Date().getFullYear())</script>
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
        $.ajax({
            url: '{{ route('api.cart.count')}}',
            dataType: 'json',
            success: function (response) {
                $('#cart').append(response.data);
            },
            error: function (response) {
            }
        })
    });
</script>
