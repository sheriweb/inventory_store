
<div class="custom-container">
    <div class="row">
        <div class="col-sm-12">
            @if(count((array)json_decode($cart->cart_items)) > 0)
            <table class="table cart-table table-responsive-xs">
                <thead>
                <tr class="table-head">
                    <th scope="col">image</th>
                    <th scope="col">product name</th>
                    <th scope="col">price</th>
                    <th scope="col">quantity</th>
                    <th scope="col">action</th>
                    <th scope="col">total</th>
                </tr>
                </thead>
                <tbody>
                @foreach(json_decode($cart->cart_items) as $item )
                    <tr>
                        <td>
                            <a href="javascript:void(0)"><img src="../assets/images/layout-3/product/1.jpg" alt="cart"  class=" "></a>
                        </td>
                        <td><a href="javascript:void(0)">{{ $item->item_name }}</a>
                            <div class="mobile-cart-content">
                                <div class="col-xs-3">
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <button class="qty-minus" data-id="{{$item->item_id}}"></button>
                                            <input class="qty-adj form-control" data-id="{{$item->item_id}}" type="number" value="{{$item->item_quantity}}"/>
                                            <button class="qty-plus" data-id="{{$item->item_id}}"></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <h2 class="td-color">{{ \App\Services\theme\HomeService::$currencyFormat }} {{$item->item_price}}</h2></div>
                                <div class="col-xs-3">
                                    <h2 class="td-color"><a href="javascript:void(0)"  class="icon deleteCartItem" data-id="{{ $item->item_id }}"><i class="ti-close"></i></a></h2></div>
                            </div>
                        </td>
                        <td>
                            <h2>{{ \App\Services\theme\HomeService::$currencyFormat }} {{$item->item_price}}</h2></td>
                        <td>
                            <div class="qty-box">
                                <div class="input-group">
                                    <button class="qty-minus" data-id="{{$item->item_id}}"></button>
                                    <input class="qty-adj form-control" data-id="{{$item->item_id}}" type="number" value="{{$item->item_quantity}}"/>
                                    <button class="qty-plus" data-id="{{$item->item_id}}"></button>
                                </div>
                            </div>
                        </td>
                        <td><a href="javascript:void(0)" class="icon deleteCartItem" data-id="{{ $item->item_id }}"><i class="ti-close"></i></a></td>
                        <td>
                            <h2 class="td-color">{{ \App\Services\theme\HomeService::$currencyFormat }} {{$item->total_price}}</h2></td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            <table class="table cart-table table-responsive-md">
                <tfoot>
                <tr>
                    <td>total price :</td>
                    <td>
                        <h2>{{ \App\Services\theme\HomeService::$currencyFormat }}{{ $cart->sub_total }}</h2></td>
                </tr>
                </tfoot>
            </table>
             @else
           <div class="empty-cart">
               <h3>Cart empty</h3>
           </div>

            @endif
        </div>
    </div>

    <div class="row cart-buttons">
        <div class="col-12">
            <a href="/" class="btn btn-normal">continue shopping</a>
            @if(count((array)json_decode($cart->cart_items)) > 0)
            <a href="{{ route('checkOut') }}" class="btn btn-normal ms-3">check out</a>
            @endif
        </div>
    </div>
</div>
