<style>
    .not-found {
        text-align: center;
    }
    .img-cat{
        width: 280px;
        height: 250px;
        object-fit: cover;
    }
</style>
<!--title-start-->
<div class="title8 section-mb-space ">
  @if(count($data['dealOfTheDay']) > 0 )  <h4>deal of the day</h4>@endif
</div>
<!--title-end-->

<!-- hot deal start -->
{{--@dd($data['dealOfTheDay'])--}}
<section class="hotdeal-second section-big-mb-space">
    <div class="container-fluid">
        <div class="row hotdeal-block2">
            <div class="col-12">
                <div class="hotdeal-slide3 no-arrow">
                    @foreach($data['dealOfTheDay'] as $dealOfTheDay)
                    <div>
                        <div class="hotdeal-box">
                            <div class="img-wrapper">
                                <a href="/product/{{ $dealOfTheDay['slug'] }}">
                                    <img src="{{ @$dealOfTheDay['feature_image'] }}" alt="hot-deal" class="img-fluid bg-img">
                                </a>
                            </div>
                            <div class="hotdeal-contain">
                                <div>
                                    <a href="/product/{{ $dealOfTheDay['slug'] }}">
                                        <h3>{{ @$dealOfTheDay['product_name'] }}</h3>
                                    </a>
                                    @if(@$dealOfTheDay['price'] > 0)
                                    <h5 class="price_section">
                                         <p class="price_label"> Price:</p>
                                        <span class="sale_price">{{$dealOfTheDay['price']}}</span>
                                        <span class="price">{{$dealOfTheDay['retail_price']}}</span>

                                    </h5>
                                    @endif

                                    @if(@$dealOfTheDay['refurbished_price'] > 0)
                                    <h5 class="price_section">
                                          <p class="price_label">Refurbished Price:</p>
                                        <span class="sale_price"> {{ $dealOfTheDay['refurbished_price'] }}</span>
                                        <span class="price"> {{ $dealOfTheDay['sale_refurbished_price'] }}</span>

                                    </h5>
                                    @endif
                                    <p>{{ $dealOfTheDay['description'] }}</p>
                                    <ul>
                                        <li>
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                    </ul>
{{--                                    <div class="timer2">--}}
{{--                                        <p id="demo">--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
                                    <a href="javascript:void(0)" onclick="addToCart({{ $dealOfTheDay['id'] }})" class="btn btn-solid btn-sm add-cartnoty">add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
{{--                    <div>--}}
{{--                        <div class="hotdeal-box">--}}
{{--                            <div class="img-wrapper">--}}
{{--                                <a href="product-page(left-sidebar).html">--}}
{{--                                    <img src="../assets/images/mega-store/hot-deal/2.jpg" alt="hot-deal" class="img-fluid bg-img">--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div class="hotdeal-contain">--}}
{{--                                <div>--}}
{{--                                    <a href="product-page(left-sidebar).html">--}}
{{--                                        <h3>perfums</h3>--}}
{{--                                    </a>--}}
{{--                                    <h5>--}}
{{--                                        $70--}}
{{--                                        <span class="price">$100</span>--}}
{{--                                    </h5>--}}
{{--                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>--}}
{{--                                    <ul>--}}
{{--                                        <li>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i class="fa fa-star-o"></i>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                    <div class="timer2">--}}
{{--                                        <p id="demo1">--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                    <a href="javascript:void(0)" class="btn btn-solid btn-sm add-cartnoty">add to cart</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <div class="hotdeal-box">--}}
{{--                            <div class="img-wrapper">--}}
{{--                                <a href="product-page(left-sidebar).html">--}}
{{--                                    <img src="../assets/images/mega-store/hot-deal/3.jpg" alt="hot-deal" class="img-fluid bg-img">--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div class="hotdeal-contain">--}}
{{--                                <div>--}}
{{--                                    <a href="product-page(left-sidebar).html">--}}
{{--                                        <h3>smart watch</h3>--}}
{{--                                    </a>--}}
{{--                                    <h5>--}}
{{--                                        $90--}}
{{--                                        <span class="price">$110</span>--}}
{{--                                    </h5>--}}
{{--                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>--}}
{{--                                    <ul>--}}
{{--                                        <li>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i class="fa fa-star-o"></i>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                    <div class="timer2">--}}
{{--                                        <p id="demo2">--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                    <a href="javascript:void(0)" class="btn btn-solid btn-sm add-cartnoty">add to cart</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <div class="hotdeal-box">--}}
{{--                            <div class="img-wrapper">--}}
{{--                                <a href="product-page(left-sidebar).html">--}}
{{--                                    <img src="../assets/images/mega-store/hot-deal/2.jpg" alt="hot-deal" class="img-fluid bg-img">--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div class="hotdeal-contain">--}}
{{--                                <div>--}}
{{--                                    <a href="product-page(left-sidebar).html">--}}
{{--                                        <h3>perfum</h3>--}}
{{--                                    </a>--}}
{{--                                    <h5>--}}
{{--                                        $70--}}
{{--                                        <span class="price">$100</span>--}}
{{--                                    </h5>--}}
{{--                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>--}}
{{--                                    <ul>--}}
{{--                                        <li>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i class="fa fa-star-o"></i>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                    <div class="timer2">--}}
{{--                                        <p id="demo3">--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                    <a href="javascript:void(0)" class="btn btn-solid btn-sm add-cartnoty">add to cart</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- hot deal start -->


<!--tab product-->
<section  class="tab-product-main  tab-second">
    <div class="tab-prodcut-contain">
        <ul class="tabs tab-title">
            <li class="current current-cat"><a href="tab-1">all</a></li>
            @foreach( $data['categories'] as $key => $cat)
            <li class="current-cat_li"><a class="current-cat" cat-id="{{ $cat['id'] }}" href="tab-{{ $key+1 }}">{{ $cat['category_name'] }}</a></li>
            @php
                if ($key == 6) {
                break;
                }
                @endphp
            @endforeach
{{--            <li class=""><a href="tab-3">electronic</a></li>--}}
{{--            <li class=""><a href="tab-4">sports</a></li>--}}
{{--            <li class=""><a href="tab-5">medicine</a></li>--}}
        </ul>
    </div>
</section>
<!--tab product-->

<!-- product start -->
<section class="section-big-py-space">
    <div class="custom-container">
        <div class="row ">
            <div class="col-12 p-0">
                <div class="theme-tab product">
                    <div class="tab-content-cls ">
                        <div id="current-tab"  class="tab-content-1 active default product-block3">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product end -->


<!--deal banner start-->
<section class="deal-banner ">
    <div class="custom-container">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="deal-banner-containe">
                    <h2>
                        save up to  30% to 40% off
                    </h2>
                    <h1>
                        omg! just look at the great deals!
                    </h1>
                </div>
            </div>
            <div class="col-md-12 col-lg-4 ">
                <div class="deal-banner-containe">
                    <diV class="deal-btn">
                        <a href="category-page(left-sidebar).html" class="btn-white">
                            View more
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--deal banner end-->


<!--discount banner start-->
<section class="discount-banner">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="discount-banner-contain">
                    <h2>Discount on every single item on our site.</h2>
                    <h1><span>OMG! Just Look at the</span> <span>great Deals!</span></h1>
                    <div class="rounded-contain ">
                        <div class="rounded-subcontain">
                            How does it feel, when you see great discount deals for each product?
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--discount banner end-->
