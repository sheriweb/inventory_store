@php
 $productLimit = 9;
 $checkKey = 0;
@endphp
@if(count($products) > 0)
<div class="col-12 ">
    <div  class="product-slide-3 no-arrow active default">
        @foreach(@$products as $key => $product)
            <div>
            <div class="product-box3">
                <div class="media">
                    <div class="img-wrapper">
                        <a href="/product/{{ $product['slug'] }}">
                            <img class="img-fluid img-cat" src="{{ $product['feature_image'] }}" alt="product">
                        </a>
                    </div>
                    <div class="media-body">
                        <div class="product-detail">
                            <ul class="rating">
                                <li><a href="javascript:void(0)"><i class="fa fa-star"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-star"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-star"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-star"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-star-o"></i></a></li>
                            </ul>
                            <a href="/product/{{ $product['slug'] }}">
                                <h3>{{$product['product_name']}}</h3>
                            </a>
                            @if(@$product['price'] > 0)
                                <h4 class="price_section">
                                    <p class="price_label"> Price:</p>
                                    <span class="sale_price">{{$product['price']}}</span>
                                    <span class="price">{{$product['retail_price']}}</span>

                                </h4>
                            @endif

                            @if(@$product['refurbished_price'] > 0)
                                <h4 class="price_section">
                                    <p class="price_label">Refurbished Price:</p>
                                    <span class="sale_price"> {{ $product['refurbished_price'] }}</span>
                                    <span class="price"> {{ $product['sale_refurbished_price'] }}</span>

                                </h4>
                            @endif
                            <a class="btn btn-rounded  btn-sm" href="/product/{{ $product['slug'] }}" >shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @php
            if($key == $productLimit)
             {
                $checkKey =  $key;
                break;
             }
           @endphp
        @endforeach
    </div>
</div>

<div class="col-12 ">
    <div  class="product-slide-3 no-arrow active default">
        @if(count($products) > $productLimit)
            @for( $i = $checkKey;  $i<count($products); $i++ )
             <div>
            <div class="product-box3">
                <div class="media">
                    <div class="img-wrapper">
                        <a href="/product/{{ $products[$i]['slug'] }}">
                            <img class="img-fluid img-cat" src="{{ $products[$i]['feature_image'] }}" alt="product">
                        </a>
                    </div>
                    <div class="media-body">
                        <div class="product-detail">
                            <ul class="rating">
                                <li><a href="javascript:void(0)"><i class="fa fa-star"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-star"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-star"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-star"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-star-o"></i></a></li>
                            </ul>
                            <a href="/product/{{ $products[$i]['slug'] }}">
                                <h3>{{ $products[$i]['id'] }}{{ $products[$i]['product_name'] }}</h3>
                            </a>
                            @if(@$products[$i]['price'] > 0)
                                <h4 class="price_section">
                                    <p class="price_label"> Price:</p>
                                    <span class="sale_price">{{$products[$i]['price']}}</span>
                                    <span class="price">{{$products[$i]['retail_price']}}</span>

                                </h4>
                            @endif

                            @if(@$products[$i]['refurbished_price'] > 0)
                                <h4 class="price_section">
                                    <p class="price_label">Refurbished Price:</p>
                                    <span class="sale_price"> {{ $products[$i]['refurbished_price'] }}</span>
                                    <span class="price"> {{ $products[$i]['sale_refurbished_price'] }}</span>

                                </h4>
                            @endif
                            <a class="btn btn-rounded  btn-sm" href="/product/{{ $products[$i]['slug'] }}" >shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            @endfor
        @endif
    </div>
</div>

@else
    <div class="col-12 ">
        <div  class="product-slide-3 no-arrow active default">
            <div class="not-found">
                <h3>Not found</h3>
            </div>
        </div>
    </div>
@endif
