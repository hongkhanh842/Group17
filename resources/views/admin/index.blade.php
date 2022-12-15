@php use Illuminate\Support\Facades\Auth; @endphp
@extends('layouts.adminbase')

@section('title', 'TRANG CHỦ')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thống kê</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Trang chủ</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            @if(isAdmin() || isManager())
                                <div class="inner">
                                    <h3 id="new"></h3>
                                    <p>Đơn hàng chờ xác nhận</p>
                                </div>
                            @endif
                            @if(isShipper())
                                <div class="inner">
                                    <h3 id="accepted"></h3>
                                    <p>Đơn hàng đã xác nhận</p>
                                </div>
                            @endif
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                        </div>
                    </div>
                    @if(isAdmin() || isManager())
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3 id="categories"></h3>
                                    <p>Danh mục</p>
                                </div>
                                <div class="icon">
                                    <i class="ion "></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3 id="products"></h3>
                                    <p>Sản phẩm</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-item-add"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3 id="users"></h3>
                                    <p>Tài khoản khách</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="row">
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card card-blue">
                <div class="card-header">
                    <h3 class="card-title" id="month">Thống kê đơn hàng trong tháng </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body" style="display: block;">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="pieChart"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 531px;"
                            width="663" height="312" class="chartjs-render-monitor"></canvas>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('js')
    <script>
        let all;
        $.ajax({
            url: '{{ route('api.dashboard.all') }}',
            dataType: 'json',
            success: async function (response) {
                all = response.data;

                var donutData = {
                    labels: [
                        'Chờ xác nhận',
                        'Đã xác nhận',
                        'Đang lấy hàng',
                        'Đang giao hàng',
                        'Đã giao hàng',
                        'Huỷ',
                    ],
                    datasets: [
                        {
                            data: [all.new, all.accepted, all.taking, all.shipping, all.shipped, all.cancel],
                            backgroundColor: ['#00c0ef','#00a65a' ,'#3', '#f39c12', '#3c8dbc', '#f56954'],
                        }
                    ]
                }
                var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
                var pieData = donutData;
                var pieOptions = {
                    maintainAspectRatio: false,
                    responsive: true,
                }
                var pieChart = new Chart(pieChartCanvas, {
                    type: 'pie',
                    data: pieData,
                    options: pieOptions
                })

                $('#new').append(all.new)
                $('#accepted').append(all.accepted)
                $('#categories').append(all.categories)
                $('#products').append(all.products)
                $('#users').append(all.users)
                $('#month').append(all.month).append(":   ").append(all.total).append(" đơn hàng")
            },
            error: function (response) {
            }
        })

    </script>
@endpush
