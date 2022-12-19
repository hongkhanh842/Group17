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
                                <h4>Giỏ hàng</h4>
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
                                            <th></th>
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
            @auth
            $.ajax({
                url: '{{ route('api.cart.full') }}',
                dataType: 'json',
                success: function (response) {
                    let total = 0;
                    response.data.forEach(function (each) {
                        let image = '<div class="img-container">' +
                            '<img src="' + '/storage/' + each.product.image + '" alt=""></div>'
                        let name = '<a href="{{route('product.show',['id'])}}">' + each.product.name + '</a>'
                        name = name.replace('id', each.product.id)
                        let number = '<div class="btn-group">' +
                            '  <a href="{{route('cart.sub',['pid'])}}" class="btn btn-round btn-info btn-xs"><i' +
                            '  class="material-icons">remove</i></a>' +
                            '<div class="text-center btn btn-info btn-xs" style="font-weight: bold" >' + each.quantity + '</div>' +
                            ' <a href="{{route('cart.plus',['pid'])}}" class="btn btn-round btn-info btn-xs"><i' +
                            '  class="material-icons">add</i></a>' +
                            '  </div>';
                        number = number.replaceAll('pid', each.product.id);
                        let action = '<a href="{{route('cart.destroy',['pid'])}}"  type="button" rel="tooltip" data-placement="left"' +
                            ' title="Xoá sản phẩm" class="btn btn-simple">' +
                            ' <i class="material-icons">close</i></a>'
                        action = action.replace('pid', each.id);
                        total += each.product.price * each.quantity;

                        $('#table-data').append($('<tr>')
                            .append($('<td>').append(image))
                            .append($('<td class="td-name">').append(name))
                            .append($('<td class="price price-new">').append(getPrice(each.product.price)))
                            .append($('<td class="td-number">').append(number))
                            .append($('<td class="price price-new">').append(getPrice(each.product.price * each.quantity)))
                            .append($('<td class="td-actions">').append(action))
                        )
                    });
                    let order = '<a href="{{route('order.index',['total'])}}" type="button" class="btn btn-success btn-round">Đặt hàng' +
                        '<i class="material-icons">keyboard_arrow_right</i></a>';
                    order = order.replace('total', getPrice(total));
                    $('#table-data').append($('<tr>')
                        .append($('<td colspan="2">').append())
                        .append($('<td class="td-total">').append("Tổng tiền"))
                        .append($('<td class="td-price">').append(getPrice(total)))
                        .append($('<td colspan="3" class="text-right">').append(order))
                    )
                },
                error: function (response) {
                }
            })
            @endauth
            @guest
            let session;
            let count;
            $.ajax({
                url: '{{route('api.session.all')}}',
                dataType: 'json',
                success: function (response) {
                    session = response.data;
                    count = response.data.count;
                },
                error: function (response) {
                }
            })

            $.ajax({
                url: '{{ route('api.product.full1') }}',
                dataType: 'json',
                success: function (response) {
                    total=0;
                    response.data.data.forEach(function (each) {
                        for (let i = 1; i <= count; i++) {
                            if (parseInt(session[i]) === each.id) {
                                let image = '<div class="img-container">' +
                                    '<img src="' + '/storage/' + each.image + '" alt=""></div>'
                                let name = '<a href="{{route('product.show',['id'])}}">' + each.name + '</a>'
                                name = name.replace('id', each.id)
                                let number = '<div class="btn-group">' +
                                    '  <a href="" class="btn btn-round btn-info btn-xs"><i' +
                                    '  class="material-icons">remove</i></a>' +
                                    '<div class="text-center btn btn-info btn-xs" style="font-weight: bold" >' + 1 + '</div>' +
                                    ' <a href="" class="btn btn-round btn-info btn-xs"><i' +
                                    '  class="material-icons">add</i></a>' +
                                    '  </div>';
                                let action = '<a href="{{route('cart.destroy',['pid'])}}"  type="button" rel="tooltip" data-placement="left"' +
                                    ' title="Xoá sản phẩm" class="btn btn-simple">' +
                                    ' <i class="material-icons">close</i></a>'
                                action = action.replace('pid', each.id);

                                total += each.price;
                                $('#table-data').append($('<tr>')
                                    .append($('<td>').append(image))
                                    .append($('<td class="td-name">').append(name))
                                    .append($('<td class="price price-new">').append(getPrice(each.price)))
                                    .append($('<td class="td-number">').append(number))
                                    .append($('<td class="price price-new">').append(getPrice(each.price)))
                                    .append($('<td class="td-actions">').append(action))
                                )
                            }
                        }
                    });
                    let order = '<a href="{{route('order.index',['total'])}}" type="button" class="btn btn-success btn-round">Đặt hàng' +
                        '<i class="material-icons">keyboard_arrow_right</i></a>';
                    order = order.replace('total', getPrice(total));
                    $('#table-data').append($('<tr>')
                        .append($('<td colspan="2">').append())
                        .append($('<td class="td-total">').append("Tổng tiền"))
                        .append($('<td class="td-price">').append(getPrice(total)))
                        .append($('<td colspan="3" class="text-right">').append(order))
                    )
                },
                error: function (response) {
                }
            })
            @endguest
        });
    </script>
@endpush
