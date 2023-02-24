<style>
    .product-detail.product-detail2 {
        position: relative;
    }
    span.out-of-stock {
        position: absolute;
        top: 42%;
        left: -16px;
        transform: rotate(90deg);
    }
    .price_section_center {
        justify-content: center !important;
    }
</style>

<!--title start-->
@if(count($data['newProduct']) > 0)
<div class="title8 section-big-pt-space">
    <h4>new product</h4>
</div>
@endif
<!--title end-->
<!-- product tab start -->
<section class="section-big-mb-space ratio_square product">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 pr-0">
                <div class="product-slide-5 product-m no-arrow">
                    @foreach( $data['newProduct'] as $product)
                    <div>
                        <div class="product-box product-box2">
                            <div class="product-imgbox">
                                <div class="product-front">
                                    <a href="/product/{{ $product['slug'] }}">
                                        <img src="{{ $product['feature_image'] }}" class="img-fluid  "
                                             alt="product">
                                    </a>
                                </div>
                                <div class="product-back">
                                    <a href="/product/{{ @$product['slug'] }}">
                                        <img src="{{ @$product['feature_image'] }}" class="img-fluid  "
                                             alt="product">
                                    </a>
                                </div>
                                <div class="product-icon icon-inline">
                                    <button class="tooltip-top  add-cartnoty @if($product['quantity'] <= 0 && $product['refurbished_quantity'] <=0) not-click @endif" data-tippy-content="Add to cart" onclick="addToCart('{{$product['id']}}','{{$product['productType']}}','','{{$product['price']}}','{{$product['refurbished_price']}}')">
                                        <i data-feather="shopping-cart"></i>
                                    </button>
{{--                                    <a href="javascript:void(0)" class="add-to-wish tooltip-top"--}}
{{--                                       data-tippy-content="Add to Wishlist">--}}
{{--                                        <i data-feather="heart"></i>--}}
{{--                                    </a>--}}
                                    <a href="/product/{{ $product['slug'] }}" class="tooltip-top" data-tippy-content="Quick View">
                                        <i data-feather="eye"></i>
                                    </a>
{{--                                    <a href="compare.html" class="tooltip-top" data-tippy-content="Compare">--}}
{{--                                        <i data-feather="refresh-cw"></i>--}}
{{--                                    </a>--}}
                                </div>
                                <div class="new-label1">
                                    <div>new</div>
                                </div>
                                <div class="on-sale1">
                                    on sale
                                </div>
                            </div>
                            <div class="product-detail product-detail2 ">
                                <ul>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                </ul>
                                <a href="/product/{{ $product['slug'] }}">
                                    <h3>{{ $product['product_name'] }}</h3>
                                </a>
                                @if(@$product['price'] > 0 && @$product['quantity'] > 0)
                                    <h5 class="price_section price_section_center">
                                        <p class="price_label"> Price:</p>
                                        <span class="sale_price">{{$product['price']}}</span>
                                        <span class="price">{{$product['retail_price']}}</span>

                                    </h5>
                                @endif

                                @if(@$product['refurbished_price'] > 0 && @$product['refurbished_quantity'] >0)
                                    <h5 class="price_section price_section_center">
                                        <p class="price_label">Refurbished Price:</p>
                                        <span class="sale_price"> {{ $product['refurbished_price'] }}</span>
                                        <span class="price"> {{ $product['sale_refurbished_price'] }}</span>

                                    </h5>
                                @endif
                                @if($product['quantity'] <= 0 && $product['refurbished_quantity'] <=0)
                                <span class="out-of-stock text-danger">out of stock</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
{{--                    <div>--}}
{{--                        <div class="product-box product-box2">--}}
{{--                            <div class="product-imgbox">--}}
{{--                                <div class="product-front">--}}
{{--                                    <a href="product-page(left-sidebar).html">--}}
{{--                                        <img src="../assets/images/mega-store/product/2.jpg" class="img-fluid  "--}}
{{--                                             alt="product">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="product-back">--}}
{{--                                    <a href="product-page(left-sidebar).html">--}}
{{--                                        <img src="../assets/images/mega-store/product/7.jpg" class="img-fluid  "--}}
{{--                                             alt="product">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="product-icon icon-inline">--}}
{{--                                    <button class="tooltip-top  add-cartnoty" data-tippy-content="Add to cart">--}}
{{--                                        <i data-feather="shopping-cart"></i>--}}
{{--                                    </button>--}}
{{--                                    <a href="javascript:void(0)" class="add-to-wish tooltip-top"--}}
{{--                                       data-tippy-content="Add to Wishlist">--}}
{{--                                        <i data-feather="heart"></i>--}}
{{--                                    </a>--}}
{{--                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"--}}
{{--                                       class="tooltip-top" data-tippy-content="Quick View">--}}
{{--                                        <i data-feather="eye"></i>--}}
{{--                                    </a>--}}
{{--                                    <a href="compare.html" class="tooltip-top" data-tippy-content="Compare">--}}
{{--                                        <i data-feather="refresh-cw"></i>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="new-label1">--}}
{{--                                    <div>new</div>--}}
{{--                                </div>--}}
{{--                                <div class="on-sale1">--}}
{{--                                    on sale--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="product-detail product-detail2 ">--}}
{{--                                <ul>--}}
{{--                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                    <li><i class="fa fa-star-o"></i></li>--}}
{{--                                </ul>--}}
{{--                                <a href="product-page(no-sidebar).html">--}}
{{--                                    <h3>men analogue watch</h3>--}}
{{--                                </a>--}}
{{--                                <h5>--}}
{{--                                    $10--}}
{{--                                    <span>--}}
{{--                      $30--}}
{{--                    </span>--}}
{{--                                </h5>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <div class="product-box product-box2">--}}
{{--                            <div class="product-imgbox">--}}
{{--                                <div class="product-front">--}}
{{--                                    <a href="product-page(left-sidebar).html">--}}
{{--                                        <img src="../assets/images/mega-store/product/3.jpg" class="img-fluid  "--}}
{{--                                             alt="product">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="product-back">--}}
{{--                                    <a href="product-page(left-sidebar).html">--}}
{{--                                        <img src="../assets/images/mega-store/product/8.jpg" class="img-fluid  "--}}
{{--                                             alt="product">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="product-icon icon-inline">--}}
{{--                                    <button class="tooltip-top  add-cartnoty" data-tippy-content="Add to cart">--}}
{{--                                        <i data-feather="shopping-cart"></i>--}}
{{--                                    </button>--}}
{{--                                    <a href="javascript:void(0)" class="add-to-wish tooltip-top"--}}
{{--                                       data-tippy-content="Add to Wishlist">--}}
{{--                                        <i data-feather="heart"></i>--}}
{{--                                    </a>--}}
{{--                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"--}}
{{--                                       class="tooltip-top" data-tippy-content="Quick View">--}}
{{--                                        <i data-feather="eye"></i>--}}
{{--                                    </a>--}}
{{--                                    <a href="compare.html" class="tooltip-top" data-tippy-content="Compare">--}}
{{--                                        <i data-feather="refresh-cw"></i>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="new-label1">--}}
{{--                                    <div>new</div>--}}
{{--                                </div>--}}
{{--                                <div class="on-sale1">--}}
{{--                                    on sale--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="product-detail product-detail2 ">--}}
{{--                                <ul>--}}
{{--                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                    <li><i class="fa fa-star-o"></i></li>--}}
{{--                                </ul>--}}
{{--                                <a href="product-page(no-sidebar).html">--}}
{{--                                    <h3>wireless headphones</h3>--}}
{{--                                </a>--}}
{{--                                <h5>--}}
{{--                                    $34--}}
{{--                                    <span>--}}
{{--                      $40--}}
{{--                    </span>--}}
{{--                                </h5>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <div class="product-box product-box2">--}}
{{--                            <div class="product-imgbox">--}}
{{--                                <div class="product-front">--}}
{{--                                    <a href="product-page(left-sidebar).html">--}}
{{--                                        <img src="../assets/images/mega-store/product/4.jpg" class="img-fluid  "--}}
{{--                                             alt="product">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="product-back">--}}
{{--                                    <a href="product-page(left-sidebar).html">--}}
{{--                                        <img src="../assets/images/mega-store/product/9.jpg" class="img-fluid  "--}}
{{--                                             alt="product">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="product-icon icon-inline">--}}
{{--                                    <button class="tooltip-top  add-cartnoty" data-tippy-content="Add to cart">--}}
{{--                                        <i data-feather="shopping-cart"></i>--}}
{{--                                    </button>--}}
{{--                                    <a href="javascript:void(0)" class="add-to-wish tooltip-top"--}}
{{--                                       data-tippy-content="Add to Wishlist">--}}
{{--                                        <i data-feather="heart"></i>--}}
{{--                                    </a>--}}
{{--                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"--}}
{{--                                       class="tooltip-top" data-tippy-content="Quick View">--}}
{{--                                        <i data-feather="eye"></i>--}}
{{--                                    </a>--}}
{{--                                    <a href="compare.html" class="tooltip-top" data-tippy-content="Compare">--}}
{{--                                        <i data-feather="refresh-cw"></i>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="new-label1">--}}
{{--                                    <div>new</div>--}}
{{--                                </div>--}}
{{--                                <div class="on-sale1">--}}
{{--                                    on sale--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="product-detail product-detail2 ">--}}
{{--                                <ul>--}}
{{--                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                    <li><i class="fa fa-star-o"></i></li>--}}
{{--                                </ul>--}}
{{--                                <a href="product-page(no-sidebar).html">--}}
{{--                                    <h3>redmi not 9 pro</h3>--}}
{{--                                </a>--}}
{{--                                <h5>--}}
{{--                                    $250--}}
{{--                                    <span>--}}
{{--                      $390--}}
{{--                    </span>--}}
{{--                                </h5>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <div class="product-box product-box2">--}}
{{--                            <div class="product-imgbox">--}}
{{--                                <div class="product-front">--}}
{{--                                    <a href="product-page(left-sidebar).html">--}}
{{--                                        <img src="../assets/images/mega-store/product/5.jpg" class="img-fluid  "--}}
{{--                                             alt="product">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="product-back">--}}
{{--                                    <a href="product-page(left-sidebar).html">--}}
{{--                                        <img src="../assets/images/mega-store/product/10.jpg" class="img-fluid  "--}}
{{--                                             alt="product">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="product-icon icon-inline">--}}
{{--                                    <button class="tooltip-top  add-cartnoty" data-tippy-content="Add to cart">--}}
{{--                                        <i data-feather="shopping-cart"></i>--}}
{{--                                    </button>--}}
{{--                                    <a href="javascript:void(0)" class="add-to-wish tooltip-top"--}}
{{--                                       data-tippy-content="Add to Wishlist">--}}
{{--                                        <i data-feather="heart"></i>--}}
{{--                                    </a>--}}
{{--                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"--}}
{{--                                       class="tooltip-top" data-tippy-content="Quick View">--}}
{{--                                        <i data-feather="eye"></i>--}}
{{--                                    </a>--}}
{{--                                    <a href="compare.html" class="tooltip-top" data-tippy-content="Compare">--}}
{{--                                        <i data-feather="refresh-cw"></i>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="new-label1">--}}
{{--                                    <div>new</div>--}}
{{--                                </div>--}}
{{--                                <div class="on-sale1">--}}
{{--                                    on sale--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="product-detail product-detail2 ">--}}
{{--                                <ul>--}}
{{--                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                    <li><i class="fa fa-star-o"></i></li>--}}
{{--                                </ul>--}}
{{--                                <a href="product-page(no-sidebar).html">--}}
{{--                                    <h3>Red Casual Backpack</h3>--}}
{{--                                </a>--}}
{{--                                <h5>--}}
{{--                                    $80--}}
{{--                                    <span>--}}
{{--                      $130--}}
{{--                    </span>--}}
{{--                                </h5>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <div class="product-box product-box2">--}}
{{--                            <div class="product-imgbox">--}}
{{--                                <div class="product-front">--}}
{{--                                    <a href="product-page(left-sidebar).html">--}}
{{--                                        <img src="../assets/images/mega-store/product/3.jpg" class="img-fluid  "--}}
{{--                                             alt="product">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="product-back">--}}
{{--                                    <a href="product-page(left-sidebar).html">--}}
{{--                                        <img src="../assets/images/mega-store/product/8.jpg" class="img-fluid  "--}}
{{--                                             alt="product">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="product-icon icon-inline">--}}
{{--                                    <button class="tooltip-top  add-cartnoty" data-tippy-content="Add to cart">--}}
{{--                                        <i data-feather="shopping-cart"></i>--}}
{{--                                    </button>--}}
{{--                                    <a href="javascript:void(0)" class="add-to-wish tooltip-top"--}}
{{--                                       data-tippy-content="Add to Wishlist">--}}
{{--                                        <i data-feather="heart"></i>--}}
{{--                                    </a>--}}
{{--                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"--}}
{{--                                       class="tooltip-top" data-tippy-content="Quick View">--}}
{{--                                        <i data-feather="eye"></i>--}}
{{--                                    </a>--}}
{{--                                    <a href="compare.html" class="tooltip-top" data-tippy-content="Compare">--}}
{{--                                        <i data-feather="refresh-cw"></i>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="new-label1">--}}
{{--                                    <div>new</div>--}}
{{--                                </div>--}}
{{--                                <div class="on-sale1">--}}
{{--                                    on sale--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="product-detail product-detail2 ">--}}
{{--                                <ul>--}}
{{--                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                    <li><i class="fa fa-star-o"></i></li>--}}
{{--                                </ul>--}}
{{--                                <a href="product-page(no-sidebar).html">--}}
{{--                                    <h3>wireless headphones</h3>--}}
{{--                                </a>--}}
{{--                                <h5>--}}
{{--                                    $42--}}
{{--                                    <span>--}}
{{--                      $65--}}
{{--                    </span>--}}
{{--                                </h5>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product tab end -->

<!--collection banner start-->
{{--<section class="collection-banner section-py-space b-g-white">--}}
{{--    <div class="container-fluid">--}}
{{--        <div class="row collection-p4">--}}
{{--            <div class="col-md-4">--}}
{{--                <div class="collection-banner-main p-center text-center p-top banner-16 banner-style7">--}}
{{--                    <div class="collection-img">--}}
{{--                        <img src="../assets/images/mega-store/collection-banner/1.jpg" class="img-fluid bg-img  "--}}
{{--                             alt="banner">--}}
{{--                    </div>--}}
{{--                    <div class="collection-banner-contain ">--}}
{{--                        <div>--}}
{{--                            <h3>couple watches</h3>--}}
{{--                            <h4>50% discount</h4>--}}
{{--                            <a href="product-page(left-sidebar).html" class="btn btn-rounded btn-xs"> Shop Now </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-4">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-12">--}}
{{--                        <div class="collection-banner-main p-left text-center banner-13 banner-style7">--}}
{{--                            <div class="collection-img">--}}
{{--                                <img src="../assets/images/mega-store/collection-banner/2.jpg"--}}
{{--                                     class="img-fluid bg-img  " alt="banner">--}}
{{--                            </div>--}}
{{--                            <div class="collection-banner-contain ">--}}
{{--                                <div>--}}
{{--                                    <h3>jacket collection</h3>--}}
{{--                                    <h4>best choise</h4>--}}
{{--                                    <a href="product-page(left-sidebar).html" class="btn btn-rounded btn-xs"> Shop--}}
{{--                                        Now </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-12">--}}
{{--                        <div class="collection-banner-main p-left text-center banner-13 banner-style7">--}}
{{--                            <div class="collection-img">--}}
{{--                                <img src="../assets/images/mega-store/collection-banner/3.jpg"--}}
{{--                                     class="img-fluid bg-img  " alt="banner">--}}
{{--                            </div>--}}
{{--                            <div class="collection-banner-contain ">--}}
{{--                                <div>--}}
{{--                                    <h3>relex camera</h3>--}}
{{--                                    <h4>best offer</h4>--}}
{{--                                    <a href="product-page(left-sidebar).html" class="btn btn-rounded btn-xs"> Shop--}}
{{--                                        Now </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-4">--}}
{{--                <div class="collection-banner-main p-center p-top text-center banner-16 banner-style7">--}}
{{--                    <div class="collection-img">--}}
{{--                        <img src="../assets/images/mega-store/collection-banner/4.jpg" class="img-fluid bg-img  "--}}
{{--                             alt="banner">--}}
{{--                    </div>--}}
{{--                    <div class="collection-banner-contain ">--}}
{{--                        <div>--}}
{{--                            <h3>latest collection</h3>--}}
{{--                            <h4>wow super sale</h4>--}}
{{--                            <a href="product-page(left-sidebar).html" class="btn btn-rounded btn-xs"> Shop Now </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
<!--collection banner end-->
