@extends('layouts.frontbase')

@section('content')
    <div class="main ">
        <div class="section">
            <div class="container tim-container">
                <div id="contentAreas" class="cd-section">
                    <div id="tables">{{--
                        <div class="title">
                            <h3>Tables</h3>
                        </div>--}}

                        <div class="row">
                            <div class="col-md-12">
                                <h4>Chi tiết đơn hàng</h4>
                            </div>
                            <div class="col-md-10 col-md-offset-1">
                                <div class="table-responsive">
                                    <table class="table table-shopping" id="table-data">
                                        <thead>
                                        <tr>
                                            <th class="text-center"></th>
                                            <th>Sản phẩm</th>
                                            <th class="text-right">Giá</th>
                                            <th class="text-right">Số lượng</th>
                                            <th class="text-right">Tổng</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
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
                url: '{{ route('api.order.show',[$id]) }}',
                dataType: 'json',
                success: function (response) {
                    response.data.product.forEach(function (each) {
                        let image = '<div class="img-container">' +
                            '<img src="' + '/storage/' + each.product.image + '" alt=""></div>'
                        let name = '<a href="{{route('product.show',['id'])}}">' + each.product.name + '</a>'
                        name = name.replace('id', each.product.id)

                        let number = '<div class="text-center" style="font-weight: bold" >' + each.quantity + '</div>'

                        $('#table-data').append($('<tr>')
                            .append($('<td>').append(image))
                            .append($('<td class="td-name">').append(name))
                            .append($('<td class="price price-new">').append(getPrice(each.price)))
                            .append($('<td class="td-number text-right">').append(number))
                            .append($('<td class="price price-new text-right">').append(getPrice(each.total)))
                        )
                    });
                    let order = '<a type="button" class="btn btn-info btn-round">Trạng thái: '+response.data.data.status+'</a>';
                    $('#table-data').append($('<tr>')
                        .append($('<td colspan="2">').append())
                        .append($('<td class="td-total">').append("Tổng tiền"))
                        .append($('<td class="td-price">').append(getPrice(response.data.data.total)))
                        .append($('<td colspan="3" class="text-right">').append(order))
                    )
                },
                error: function (response) {
                }
            })
        });
    </script>
@endpush
