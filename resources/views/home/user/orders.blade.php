@extends('layouts.frontbase')

@section('content')
    <div class="main ">
        <div class="section">
            <div class="container ">
                <div id="contentAreas" class="cd-section">
                    <div id="tables">{{--
                        <div class="title">
                            <h3>Tables</h3>
                        </div>--}}

                        <div class="row">
                            <div class="col-md-2">
                                <h4>Quản lý đơn hàng</h4>
                            </div>
                            <div class="col-md-10 col-md-offset-2">
                                {{--<h4><small>Simple With Actions</small></h4>--}}
                                <div class="table-responsive">
                                    <table class="table" id="table-data">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Tên</th>
                                            <th>Số điện thoại</th>
                                            <th>Địa chỉ</th>
                                            <th class="text-right">Tổng tiền</th>
                                            <th class="text-right">Trạng thái</th>
                                            <th>Thời gian giao dự kiến</th>
                                            <th class="text-right">Xem/Huỷ</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <div>
                                        <ul class="pagination pagination-success" id="pagination">
                                        </ul>
                                    </div>
                                </div>
                            </div>
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
                url: '{{ route('api.user.orders') }}',
                dataType: 'json',
                data: {page: {{ request()->get('page') ?? 1 }}},
                success: function (response) {
                    let count=1;
                    response.data.data.forEach(function (each) {
                        let action = ' <a href="{{route('order.show',['each.id'])}}" rel="tooltip" class="btn btn-info" data-original-title="" title="">' +
                            ' <i class="material-icons">data_thresholding</i></a>' +
                            '<a href="{{route('order.update',['each.id'])}}" rel="tooltip" class="btn btn-danger" data-original-title="" title="">' +
                            '   <i class="material-icons">close</i></a>';
                            action = action.replaceAll('each.id',each.id);

                        $('#table-data').append($('<tr>')
                            .append($('<td class="text-center">').append(count))
                            .append($('<td>').append(each.name))
                            .append($('<td>').append(each.phone))
                            .append($('<td>').append(each.address))
                            .append($('<td class="text-right">').append(getPrice(each.total)))
                            .append($('<td class="text-right text-bold text-danger">').append(each.status))
                            .append($('<td class="text-center">').append(convertDateToDateTimeAdd(each.created_at)))
                            .append($('<td class="td-actions text-center">').append(action))
                        )
                        count++;
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
@endpush
