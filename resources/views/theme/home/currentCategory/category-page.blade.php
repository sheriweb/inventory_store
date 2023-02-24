@extends('layouts.theme')
@section('content')

    @php
        $page = 'product_page';
    @endphp
<style>
    .check-price {
        margin-left: 10px;
    }
    /*.filters_main {*/
    /*    height: 1362px;*/
    /*    overflow-y: auto;*/
    /*}*/
</style>

        <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>category</h2>
                            <ul>
                                <li><a href="/">home</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="javascript:void(0)">{{ $data['products']->category }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!-- section start -->
    <section class="section-big-pt-space ratio_asos b-g-light">
        <div class="collection-wrapper">
            <div class="custom-container">
                <div class="row">
                    <div class="col-sm-3 collection-filter category-page-side">
                        <!-- side-bar colleps block stat -->
                        <div class="collection-filter-block creative-card creative-inner category-side">
                            <!-- brand filter start -->
                            <form method="get" action="{{ route('getCategoryProducts', $data['products']->slug ) }}">
                            <div class="collection-mobile-back">
                                <span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> back</span>
                            </div>
                                <div class="apply_filter d-flex justify-content-between">
                                    <a class="btn btn-secondary" href="{{route('getCategoryProducts', $data['products']->slug )}}">Clear Filter</a>
                                    <button class="btn btn-primary">Apply Filter</button>
                                </div>
                                <div class="filters_main">
                                <div class="collection-collapse-block open">
                                    <h3 class="collapse-block-title ">Price</h3>
                                    <div class="collection-collapse-block-content">
                                        <div class="collection-brand-filter">
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input name="price_range" type="radio" class="custom-control-input form-check-input" value="1-500" id="zara" @if(count($data['products']->filters)>0 && @$data['products']->filters['price_range'] == '1-500') checked @endif >
                                                <label class="custom-control-label form-check-label" for="zara">{{ \App\Services\theme\HomeService::$currencyFormat  }} 1-500</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input name="price_range"  type="radio" class="custom-control-input form-check-input" value="501-1000" id="vera-moda" @if(count($data['products']->filters)>0 && @$data['products']->filters['price_range'] == '501-1000') checked @endif>
                                                <label class="custom-control-label form-check-label" for="vera-moda">{{ \App\Services\theme\HomeService::$currencyFormat  }} 501-1000</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="price_range" class="custom-control-input form-check-input" value="1001-2000" id="forever-21" @if(count($data['products']->filters)>0 && @$data['products']->filters['price_range'] == '1001-2000') checked @endif>
                                                <label class="custom-control-label form-check-label" for="forever-21">{{ \App\Services\theme\HomeService::$currencyFormat  }} 1001-2000</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="price_range" class="custom-control-input form-check-input" value="2001-3000" id="roadster" @if(count($data['products']->filters)>0 && @$data['products']->filters['price_range'] == '2001-3000') checked @endif>
                                                <label class="custom-control-label form-check-label" for="roadster">{{ \App\Services\theme\HomeService::$currencyFormat  }} 2001-3000</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="price_range" class="custom-control-input form-check-input" value="3001-4000" id="only" @if(count($data['products']->filters)>0 && @$data['products']->filters['price_range'] == '3001-4000') checked @endif>
                                                <label class="custom-control-label form-check-label" for="only">{{ \App\Services\theme\HomeService::$currencyFormat  }} 3001-4000</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="price_range" class="custom-control-input form-check-input" value="4001-5000" id="only" @if(count($data['products']->filters)>0 && @$data['products']->filters['price_range'] == '4001-5000') checked @endif>
                                                <label class="custom-control-label form-check-label" for="only">{{ \App\Services\theme\HomeService::$currencyFormat  }} 4001-5000</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="price_range" class="custom-control-input form-check-input" value="5001-7000" id="only" @if(count($data['products']->filters)>0 && @$data['products']->filters['price_range'] == '5001-7000') checked @endif>
                                                <label class="custom-control-label form-check-label" for="only">{{ \App\Services\theme\HomeService::$currencyFormat  }} 5001-7000</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="price_range" class="custom-control-input form-check-input" value="7001-9000" id="only" @if(count($data['products']->filters)>0 && @$data['products']->filters['price_range'] == '7001-9000') checked @endif>
                                                <label class="custom-control-label form-check-label" for="only">{{ \App\Services\theme\HomeService::$currencyFormat  }} 7001-9000</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="price_range" class="custom-control-input form-check-input" value="9001-Above" id="only" @if(count($data['products']->filters)>0 && @$data['products']->filters['price_range'] == '9001-Above') checked @endif>
                                                <label class="custom-control-label form-check-label" for="only">{{ \App\Services\theme\HomeService::$currencyFormat  }} 9001-Above</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="collection-collapse-block open">
                                    <h3 class="collapse-block-title">Capacity</h3>
                                    <div class="collection-collapse-block-content">
                                        <div class="collection-brand-filter">
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input name="capacity" type="radio" class="custom-control-input form-check-input" value="0MB-500MB" id="zara">
                                                <label class="custom-control-label form-check-label" for="zara"> 0MB - 500MB</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input name="capacity"  type="radio" class="custom-control-input form-check-input" value="501MB-1GB" id="vera-moda">
                                                <label class="custom-control-label form-check-label" for="vera-moda"> 501 MB -1GB</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="capacity" class="custom-control-input form-check-input" value="1.1GB-50GB" id="forever-21">
                                                <label class="custom-control-label form-check-label" for="forever-21"> 1.1GB - 50GB</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="capacity" class="custom-control-input form-check-input" value="51GB-100GB" id="roadster">
                                                <label class="custom-control-label form-check-label" for="roadster"> 51GB - 100GB</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="capacity" class="custom-control-input form-check-input" value="101GB-500GB" id="only">
                                                <label class="custom-control-label form-check-label" for="only"> 101GB - 500GB</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="capacity" class="custom-control-input form-check-input" value="501GB-1TB" id="only">
                                                <label class="custom-control-label form-check-label" for="only"> 501GB - 1TB</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="capacity" class="custom-control-input form-check-input" value="1.1TB-5TB" id="only">
                                                <label class="custom-control-label form-check-label" for="only">1.1TB - 5TB</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="capacity" class="custom-control-input form-check-input" value="5.01TB-20TB" id="only">
                                                <label class="custom-control-label form-check-label" for="only"> 5.01TB - 20TB</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="capacity" class="custom-control-input form-check-input" value="20.1TB-Above" id="only">
                                                <label class="custom-control-label form-check-label" for="only"> 20.1TB - Above</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="collection-collapse-block open">
                                    <h3 class="collapse-block-title">Capacity (Watts)</h3>
                                    <div class="collection-collapse-block-content">
                                        <div class="collection-brand-filter">
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input name="capacity_watts" type="radio" class="custom-control-input form-check-input" value="1-100Watts" id="zara">
                                                <label class="custom-control-label form-check-label" for="zara"> 1 - 100 Watts</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input name="capacity_watts"  type="radio" class="custom-control-input form-check-input" value="101-300Watts" id="vera-moda">
                                                <label class="custom-control-label form-check-label" for="vera-moda"> 101 - 300 Watts</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="capacity_watts" class="custom-control-input form-check-input" value="301-600Watts" id="forever-21">
                                                <label class="custom-control-label form-check-label" for="forever-21"> 301 - 600 Watts</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="capacity_watts" class="custom-control-input form-check-input" value="601-900Watts" id="roadster">
                                                <label class="custom-control-label form-check-label" for="roadster"> 601 - 900 Watts</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="capacity_watts" class="custom-control-input form-check-input" value="901-1200Watts" id="only">
                                                <label class="custom-control-label form-check-label" for="only"> 901 - 1200 Watts</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="capacity_watts" class="custom-control-input form-check-input" value="1201-2000Watts" id="only">
                                                <label class="custom-control-label form-check-label" for="only"> 1201 - 2000 Watts</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="capacity_watts" class="custom-control-input form-check-input" value="2001-4000Watts" id="only">
                                                <label class="custom-control-label form-check-label" for="only">2001 - 4000 Watts</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="capacity_watts" class="custom-control-input form-check-input" value="4001-8000Watts" id="only">
                                                <label class="custom-control-label form-check-label" for="only"> 4001 - 8000 Watts</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="capacity_watts" class="custom-control-input form-check-input" value="8001-Above" id="only">
                                                <label class="custom-control-label form-check-label" for="only"> 8001 - Above</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="collection-collapse-block open">
                                    <h3 class="collapse-block-title">Processing Speed</h3>
                                    <div class="collection-collapse-block-content">
                                        <div class="collection-brand-filter">
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input name="processing_speed" type="radio" class="custom-control-input form-check-input" value="10-100MHz" id="zara">
                                                <label class="custom-control-label form-check-label" for="zara"> 10 - 100 MHz</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input name="processing_speed"  type="radio" class="custom-control-input form-check-input" value="101-500MHz" id="vera-moda">
                                                <label class="custom-control-label form-check-label" for="vera-moda"> 101 - 500 MHz</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="processing_speed" class="custom-control-input form-check-input" value="501-700MHz" id="forever-21">
                                                <label class="custom-control-label form-check-label" for="forever-21"> 501 - 700 MHz</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="processing_speed" class="custom-control-input form-check-input" value="701-900MHz" id="roadster">
                                                <label class="custom-control-label form-check-label" for="roadster"> 701 - 900 MHz</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="processing_speed" class="custom-control-input form-check-input" value="901-1200MHz" id="only">
                                                <label class="custom-control-label form-check-label" for="only"> 901 - 1200 MHz</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="processing_speed" class="custom-control-input form-check-input" value="1.0-1.99GHz" id="only">
                                                <label class="custom-control-label form-check-label" for="only"> 1.0 - 1.99 GHz</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="processing_speed" class="custom-control-input form-check-input" value="2.0-2.99GHz" id="only">
                                                <label class="custom-control-label form-check-label" for="only">2.0 - 2.99 GHz</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="processing_speed" class="custom-control-input form-check-input" value="3.0-3.99GHz" id="only">
                                                <label class="custom-control-label form-check-label" for="only"> 3.0 - 3.99 GHz</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="processing_speed" class="custom-control-input form-check-input" value="4.0-4.99GHz" id="only">
                                                <label class="custom-control-label form-check-label" for="only"> 4.0 - 4.99 GHz</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="collection-collapse-block open">
                                    <h3 class="collapse-block-title">Screen Size</h3>
                                    <div class="collection-collapse-block-content">
                                        <div class="collection-brand-filter">
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input name="screen_size" type="radio" class="custom-control-input form-check-input" value="5.0-10.0Inch" id="zara">
                                                <label class="custom-control-label form-check-label" for="zara"> 5.0 - 10.0 Inch</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input name="screen_size"  type="radio" class="custom-control-input form-check-input" value="10.1-15.0Inch" id="vera-moda">
                                                <label class="custom-control-label form-check-label" for="vera-moda"> 10.1 - 15.0 Inch</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="screen_size" class="custom-control-input form-check-input" value="15.1-17.0Inch" id="forever-21">
                                                <label class="custom-control-label form-check-label" for="forever-21"> 15.1 - 17.0 Inch</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="screen_size" class="custom-control-input form-check-input" value="17.1-19.0Inch" id="roadster">
                                                <label class="custom-control-label form-check-label" for="roadster"> 17.1 - 19.0 Inch</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="screen_size" class="custom-control-input form-check-input" value="19.1-21Inch" id="only">
                                                <label class="custom-control-label form-check-label" for="only"> 19.1 - 21 Inch</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="screen_size" class="custom-control-input form-check-input" value="21.1-30.0Inch" id="only">
                                                <label class="custom-control-label form-check-label" for="only"> 21.1 - 30.0 Inch</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="screen_size" class="custom-control-input form-check-input" value="30.1-50.0Inch" id="only">
                                                <label class="custom-control-label form-check-label" for="only">30.1 - 50.0 Inch</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="screen_size" class="custom-control-input form-check-input" value="50.1-80.0Inch" id="only">
                                                <label class="custom-control-label form-check-label" for="only"> 50.1 - 80.0 Inch</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="screen_size" class="custom-control-input form-check-input" value="80.1Inch-Above" id="only">
                                                <label class="custom-control-label form-check-label" for="only"> 80.1 Inch - Above</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="collection-collapse-block open">
                                    <h3 class="collapse-block-title">Storage</h3>
                                    <div class="collection-collapse-block-content">
                                        <div class="collection-brand-filter">
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input name="storage" type="radio" class="custom-control-input form-check-input" value="1GB-20GB" id="zara">
                                                <label class="custom-control-label form-check-label" for="zara"> 1GB - 20GB</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input name="storage"  type="radio" class="custom-control-input form-check-input" value="20.1-50GB" id="vera-moda">
                                                <label class="custom-control-label form-check-label" for="vera-moda"> 20.1 - 50GB</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="storage" class="custom-control-input form-check-input" value="50.1-100GB" id="forever-21">
                                                <label class="custom-control-label form-check-label" for="forever-21"> 50.1 - 100GB</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="storage" class="custom-control-input form-check-input" value="101GB-250GB" id="roadster">
                                                <label class="custom-control-label form-check-label" for="roadster"> 101GB - 250GB</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="storage" class="custom-control-input form-check-input" value="251GB-500GB" id="only">
                                                <label class="custom-control-label form-check-label" for="only"> 251GB - 500GB</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="storage" class="custom-control-input form-check-input" value="501GB-1TB" id="only">
                                                <label class="custom-control-label form-check-label" for="only"> 501GB - 1TB</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="storage" class="custom-control-input form-check-input" value="1.1TB-5TB" id="only">
                                                <label class="custom-control-label form-check-label" for="only">1.1TB - 5TB</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="storage" class="custom-control-input form-check-input" value="5.01TB-20TB" id="only">
                                                <label class="custom-control-label form-check-label" for="only"> 5.01TB - 20TB</label>
                                            </div>
                                            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                <input type="radio" name="storage" class="custom-control-input form-check-input" value="20.1TB-Above" id="only">
                                                <label class="custom-control-label form-check-label" for="only"> 20.1TB - Above</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </form>
                        </div>
                        <!-- silde-bar colleps block end here -->
                        <!-- side-bar single product slider start -->
{{--                        <div class="theme-card creative-card creative-inner">--}}
{{--                            <h5 class="title-border">new product</h5>--}}
{{--                            <div class="slide-1">--}}
{{--                                <div>--}}
{{--                                    <div class="media-banner plrb-0 b-g-white1 border-0">--}}
{{--                                        <div class="media-banner-box">--}}
{{--                                            <div class="media">--}}
{{--                                                <a href="product-page(left-sidebar).html" tabindex="0">--}}
{{--                                                    <img src="../assets/images/layout-2/media-banner/3.jpg" class="img-fluid " alt="banner">--}}
{{--                                                </a>--}}
{{--                                                <div class="media-body">--}}
{{--                                                    <div class="media-contant">--}}
{{--                                                        <div>--}}
{{--                                                            <div class="product-detail">--}}
{{--                                                                <ul class="rating">--}}
{{--                                                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                                                    <li><i class="fa fa-star-o"></i></li>--}}
{{--                                                                </ul>--}}
{{--                                                                <a href="product-page(left-sidebar).html" tabindex="0"><p>sumsung galaxy</p></a>--}}
{{--                                                                <h6>$47.05 <span>$55.21</span></h6>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="cart-info">--}}
{{--                                                                <button class="tooltip-top add-cartnoty" data-tippy-content="Add to cart"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg> </button>--}}
{{--                                                                <a href="javascript:void(0)"  class="add-to-wish tooltip-top"  data-tippy-content="Add to Wishlist" ><i  data-feather="heart" class="add-to-wish"></i></a>--}}
{{--                                                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view" class="tooltip-top"  data-tippy-content="Quick View"><i  data-feather="eye"></i></a>--}}
{{--                                                                <a href="compare.html"  class="tooltip-top" data-tippy-content="Compare"><i  data-feather="refresh-cw"></i></a>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="media-banner-box">--}}
{{--                                            <div class="media">--}}
{{--                                                <a href="product-page(left-sidebar).html" tabindex="0">--}}
{{--                                                    <img src="../assets/images/layout-2/media-banner/1.jpg" class="img-fluid " alt="banner">--}}
{{--                                                </a>--}}
{{--                                                <div class="media-body">--}}
{{--                                                    <div class="media-contant">--}}
{{--                                                        <div>--}}
{{--                                                            <div class="product-detail">--}}
{{--                                                                <ul class="rating">--}}
{{--                                                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                                                    <li><i class="fa fa-star-o"></i></li>--}}
{{--                                                                </ul>--}}
{{--                                                                <a href="product-page(left-sidebar).html" tabindex="0"><p>bajaj rex mixer</p></a>--}}
{{--                                                                <h6>$40.05 <span>$60.21</span></h6>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="cart-info">--}}
{{--                                                                <button class="tooltip-top add-cartnoty" data-tippy-content="Add to cart"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg> </button>--}}
{{--                                                                <a href="javascript:void(0)"  class="add-to-wish tooltip-top"  data-tippy-content="Add to Wishlist" ><i  data-feather="heart" class="add-to-wish"></i></a>--}}
{{--                                                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view" class="tooltip-top"  data-tippy-content="Quick View"><i  data-feather="eye"></i></a>--}}
{{--                                                                <a href="compare.html"  class="tooltip-top" data-tippy-content="Compare"><i  data-feather="refresh-cw"></i></a>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="media-banner-box">--}}
{{--                                            <div class="media">--}}
{{--                                                <a href="product-page(left-sidebar).html" tabindex="0">--}}
{{--                                                    <img src="../assets/images/layout-2/media-banner/2.jpg" class="img-fluid " alt="banner">--}}
{{--                                                </a>--}}
{{--                                                <div class="media-body">--}}
{{--                                                    <div class="media-contant">--}}
{{--                                                        <div>--}}
{{--                                                            <div class="product-detail">--}}
{{--                                                                <ul class="rating">--}}
{{--                                                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                                                    <li><i class="fa fa-star-o"></i></li>--}}
{{--                                                                </ul>--}}
{{--                                                                <a href="product-page(left-sidebar).html" tabindex="0"><p>usha table fan</p></a>--}}
{{--                                                                <h6>$52.05 <span>$60.21</span></h6>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="cart-info">--}}
{{--                                                                <button class="tooltip-top add-cartnoty" data-tippy-content="Add to cart"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg> </button>--}}
{{--                                                                <a href="javascript:void(0)"  class="add-to-wish tooltip-top"  data-tippy-content="Add to Wishlist" ><i  data-feather="heart" class="add-to-wish"></i></a>--}}
{{--                                                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view" class="tooltip-top"  data-tippy-content="Quick View"><i  data-feather="eye"></i></a>--}}
{{--                                                                <a href="compare.html"  class="tooltip-top" data-tippy-content="Compare"><i  data-feather="refresh-cw"></i></a>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <div class="media-banner plrb-0 b-g-white1 border-0">--}}
{{--                                        <div class="media-banner-box">--}}
{{--                                            <div class="media">--}}
{{--                                                <a href="product-page(left-sidebar).html" tabindex="0">--}}
{{--                                                    <img src="../assets/images/layout-2/media-banner/2.jpg" class="img-fluid " alt="banner">--}}
{{--                                                </a>--}}
{{--                                                <div class="media-body">--}}
{{--                                                    <div class="media-contant">--}}
{{--                                                        <div>--}}
{{--                                                            <div class="product-detail">--}}
{{--                                                                <ul class="rating">--}}
{{--                                                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                                                    <li><i class="fa fa-star-o"></i></li>--}}
{{--                                                                </ul>--}}
{{--                                                                <a href="product-page(left-sidebar).html" tabindex="0"><p>usha table fan</p></a>--}}
{{--                                                                <h6>$52.05 <span>$60.21</span></h6>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="cart-info">--}}
{{--                                                                <button class="tooltip-top add-cartnoty" data-tippy-content="Add to cart"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg> </button>--}}
{{--                                                                <a href="javascript:void(0)"  class="add-to-wish tooltip-top"  data-tippy-content="Add to Wishlist" ><i  data-feather="heart" class="add-to-wish"></i></a>--}}
{{--                                                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view" class="tooltip-top"  data-tippy-content="Quick View"><i  data-feather="eye"></i></a>--}}
{{--                                                                <a href="compare.html"  class="tooltip-top" data-tippy-content="Compare"><i  data-feather="refresh-cw"></i></a>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="media-banner-box">--}}
{{--                                            <div class="media">--}}
{{--                                                <a href="product-page(left-sidebar).html" tabindex="0">--}}
{{--                                                    <img src="../assets/images/layout-2/media-banner/3.jpg" class="img-fluid " alt="banner">--}}
{{--                                                </a>--}}
{{--                                                <div class="media-body">--}}
{{--                                                    <div class="media-contant">--}}
{{--                                                        <div>--}}
{{--                                                            <div class="product-detail">--}}
{{--                                                                <ul class="rating">--}}
{{--                                                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                                                    <li><i class="fa fa-star-o"></i></li>--}}
{{--                                                                </ul>--}}
{{--                                                                <a href="product-page(left-sidebar).html" tabindex="0"><p>sumsung galaxy</p></a>--}}
{{--                                                                <h6>$47.05 <span>$55.21</span></h6>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="cart-info">--}}
{{--                                                                <button class="tooltip-top add-cartnoty" data-tippy-content="Add to cart"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg> </button>--}}
{{--                                                                <a href="javascript:void(0)"  class="add-to-wish tooltip-top"  data-tippy-content="Add to Wishlist" ><i  data-feather="heart" class="add-to-wish"></i></a>--}}
{{--                                                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view" class="tooltip-top"  data-tippy-content="Quick View"><i  data-feather="eye"></i></a>--}}
{{--                                                                <a href="compare.html"  class="tooltip-top" data-tippy-content="Compare"><i  data-feather="refresh-cw"></i></a>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="media-banner-box">--}}
{{--                                            <div class="media">--}}
{{--                                                <a href="product-page(left-sidebar).html" tabindex="0">--}}
{{--                                                    <img src="../assets/images/layout-2/media-banner/1.jpg" class="img-fluid " alt="banner">--}}
{{--                                                </a>--}}
{{--                                                <div class="media-body">--}}
{{--                                                    <div class="media-contant">--}}
{{--                                                        <div>--}}
{{--                                                            <div class="product-detail">--}}
{{--                                                                <ul class="rating">--}}
{{--                                                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                                                    <li><i class="fa fa-star-o"></i></li>--}}
{{--                                                                </ul>--}}
{{--                                                                <a href="product-page(left-sidebar).html" tabindex="0"><p>bajaj rex mixer</p></a>--}}
{{--                                                                <h6>$40.05 <span>$60.21</span></h6>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="cart-info">--}}
{{--                                                                <button class="tooltip-top add-cartnoty" data-tippy-content="Add to cart"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg> </button>--}}
{{--                                                                <a href="javascript:void(0)"  class="add-to-wish tooltip-top"  data-tippy-content="Add to Wishlist" ><i  data-feather="heart" class="add-to-wish"></i></a>--}}
{{--                                                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view" class="tooltip-top"  data-tippy-content="Quick View"><i  data-feather="eye"></i></a>--}}
{{--                                                                <a href="compare.html"  class="tooltip-top" data-tippy-content="Compare"><i  data-feather="refresh-cw"></i></a>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <div class="media-banner plrb-0 b-g-white1 border-0">--}}
{{--                                        <div class="media-banner-box">--}}
{{--                                            <div class="media">--}}
{{--                                                <a href="product-page(left-sidebar).html" tabindex="0">--}}
{{--                                                    <img src="../assets/images/layout-2/media-banner/1.jpg" class="img-fluid " alt="banner">--}}
{{--                                                </a>--}}
{{--                                                <div class="media-body">--}}
{{--                                                    <div class="media-contant">--}}
{{--                                                        <div>--}}
{{--                                                            <div class="product-detail">--}}
{{--                                                                <ul class="rating">--}}
{{--                                                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                                                    <li><i class="fa fa-star-o"></i></li>--}}
{{--                                                                </ul>--}}
{{--                                                                <a href="product-page(left-sidebar).html" tabindex="0"><p>bajaj rex mixer</p></a>--}}
{{--                                                                <h6>$40.05 <span>$60.21</span></h6>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="cart-info">--}}
{{--                                                                <button class="tooltip-top add-cartnoty" data-tippy-content="Add to cart"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg> </button>--}}
{{--                                                                <a href="javascript:void(0)"  class="add-to-wish tooltip-top"  data-tippy-content="Add to Wishlist" ><i  data-feather="heart" class="add-to-wish"></i></a>--}}
{{--                                                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view" class="tooltip-top"  data-tippy-content="Quick View"><i  data-feather="eye"></i></a>--}}
{{--                                                                <a href="compare.html"  class="tooltip-top" data-tippy-content="Compare"><i  data-feather="refresh-cw"></i></a>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="media-banner-box">--}}
{{--                                            <div class="media">--}}
{{--                                                <a href="product-page(left-sidebar).html" tabindex="0">--}}
{{--                                                    <img src="../assets/images/layout-2/media-banner/2.jpg" class="img-fluid " alt="banner">--}}
{{--                                                </a>--}}
{{--                                                <div class="media-body">--}}
{{--                                                    <div class="media-contant">--}}
{{--                                                        <div>--}}
{{--                                                            <div class="product-detail">--}}
{{--                                                                <ul class="rating">--}}
{{--                                                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                                                    <li><i class="fa fa-star-o"></i></li>--}}
{{--                                                                </ul>--}}
{{--                                                                <a href="product-page(left-sidebar).html" tabindex="0"><p>usha table fan</p></a>--}}
{{--                                                                <h6>$52.05 <span>$60.21</span></h6>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="cart-info">--}}
{{--                                                                <button class="tooltip-top add-cartnoty" data-tippy-content="Add to cart"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg> </button>--}}
{{--                                                                <a href="javascript:void(0)"  class="add-to-wish tooltip-top"  data-tippy-content="Add to Wishlist" ><i  data-feather="heart" class="add-to-wish"></i></a>--}}
{{--                                                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view" class="tooltip-top"  data-tippy-content="Quick View"><i  data-feather="eye"></i></a>--}}
{{--                                                                <a href="compare.html"  class="tooltip-top" data-tippy-content="Compare"><i  data-feather="refresh-cw"></i></a>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="media-banner-box">--}}
{{--                                            <div class="media">--}}
{{--                                                <a href="product-page(left-sidebar).html" tabindex="0">--}}
{{--                                                    <img src="../assets/images/layout-2/media-banner/3.jpg" class="img-fluid " alt="banner">--}}
{{--                                                </a>--}}
{{--                                                <div class="media-body">--}}
{{--                                                    <div class="media-contant">--}}
{{--                                                        <div>--}}
{{--                                                            <div class="product-detail">--}}
{{--                                                                <ul class="rating">--}}
{{--                                                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                                                    <li><i class="fa fa-star"></i></li>--}}
{{--                                                                    <li><i class="fa fa-star-o"></i></li>--}}
{{--                                                                </ul>--}}
{{--                                                                <a href="product-page(left-sidebar).html" tabindex="0"><p>sumsung galaxy</p></a>--}}
{{--                                                                <h6>$47.05 <span>$55.21</span></h6>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="cart-info">--}}
{{--                                                                <button class="tooltip-top add-cartnoty" data-tippy-content="Add to cart"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg> </button>--}}
{{--                                                                <a href="javascript:void(0)"  class="add-to-wish tooltip-top"  data-tippy-content="Add to Wishlist" ><i  data-feather="heart" class="add-to-wish"></i></a>--}}
{{--                                                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view" class="tooltip-top"  data-tippy-content="Quick View"><i  data-feather="eye"></i></a>--}}
{{--                                                                <a href="compare.html"  class="tooltip-top" data-tippy-content="Compare"><i  data-feather="refresh-cw"></i></a>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <!-- side-bar single product slider end -->
                        <!-- side-bar banner start here -->
{{--                        <div class="collection-sidebar-banner">--}}
{{--                            <a href="javascript:void(0)"><img src="../assets/images/category/side-banner.png" class="img-fluid " alt=""></a>--}}
{{--                        </div>--}}
                        <!-- side-bar banner end here -->

                    </div>
                    <div class="collection-content col">
                        <div class="page-main-content">
                            <div class="row">
                                <div class="col-sm-12">
{{--                                    <div class="top-banner-wrapper">--}}
{{--                                        <a href="product-page(left-sidebar).html"><img src="../assets/images/category/1.jpg" class="img-fluid " alt=""></a>--}}
{{--                                        <div class="top-banner-content small-section">--}}
{{--                                            <h4>fashion</h4>--}}
{{--                                            <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h5>--}}
{{--                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="collection-product-wrapper">
                                        <div class="product-top-filter">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="filter-main-btn"><span class="filter-btn  "><i class="fa fa-filter" aria-hidden="true"></i> Filter</span></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="product-filter-content">
                                                        <div class="search-count">
                                                            <h5>Showing Products page {{ $data['products']->currentPage() }}-{{ $data['products']->lastPage() }} of {{ $data['products']->total() }} Result</h5></div>
                                                        <div class="collection-view">
                                                            <ul>
                                                                <li><i class="fa fa-th grid-layout-view"></i></li>
                                                                <li><i class="fa fa-list-ul list-layout-view"></i></li>
                                                            </ul>
                                                        </div>
                                                        <div class="collection-grid-view">
                                                            <ul>
                                                                <li><img src="../assets/images/category/icon/2.png" alt="" class="product-2-layout-view"></li>
                                                                <li><img src="../assets/images/category/icon/3.png" alt="" class="product-3-layout-view"></li>
                                                                <li><img src="../assets/images/category/icon/4.png" alt="" class="product-4-layout-view"></li>
                                                                <li><img src="../assets/images/category/icon/6.png" alt="" class="product-6-layout-view"></li>
                                                            </ul>
                                                        </div>
{{--                                                        <div class="product-page-per-view">--}}
{{--                                                            <select>--}}
{{--                                                                <option value="High to low">24 Products Par Page</option>--}}
{{--                                                                <option value="Low to High">50 Products Par Page</option>--}}
{{--                                                                <option value="Low to High">100 Products Par Page</option>--}}
{{--                                                            </select>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="product-page-filter">--}}
{{--                                                            <select>--}}
{{--                                                                <option value="High to low">Sorting items</option>--}}
{{--                                                                <option value="Low to High">50 Products</option>--}}
{{--                                                                <option value="Low to High">100 Products</option>--}}
{{--                                                            </select>--}}
{{--                                                        </div>--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="product-wrapper-grid product">
                                            <div class="row">
                                                @foreach($data['products'] as $product)
                                                <div class="col-xl-3 col-md-4 col-6  col-grid-box">
                                                    <div class="product-box">
                                                        <div class="product-imgbox">
                                                            <div class="product-front">
                                                                <a href="/product/{{ $product['slug'] }}"> <img src="{{ $product['thumbnail_image'] }}" class="img-fluid  " alt="product"> </a>
                                                            </div>
                                                            <div class="product-back">
                                                                <a href="/product/{{ $product['slug'] }}"> <img src="{{ $product['thumbnail_image'] }}" class="img-fluid  " alt="product"> </a>
                                                            </div>
                                                        </div>
                                                        <div class="product-detail detail-center detail-inverse">
                                                            <div class="detail-title">
                                                                <div class="detail-left">
                                                                    <div class="rating-star"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                                                                    <p>{{ $product['description'] }}</p>
                                                                    <a href="/product/{{ $product['slug'] }}">
                                                                        <h6 class="price-title">
                                                                            {{ $product['product_name'] }}
                                                                        </h6> </a>
                                                                </div>
                                                                @if($product['price'] > 0)
                                                                <div class="detail-right">
                                                                    <div>@if(!$product['refurbished_price'] > 0)Price @else New @endif</div>
                                                                    <div class="price">
                                                                        <div class="price">{{ \App\Services\theme\HomeService::$currencyFormat }} {{ $product['price'] }} </div>
                                                                    </div>
                                                                    <div class="check-price"> {{ \App\Services\theme\HomeService::$currencyFormat }} {{ $product['retail_price'] }} </div>
                                                                </div>
                                                                @endif
                                                                @if($product['refurbished_price'] > 0)
                                                                    <div class="detail-right col-md-12 ">
                                                                        <div>Refurbished </div>
                                                                        <div class="price">
                                                                            <div class="price">{{ \App\Services\theme\HomeService::$currencyFormat }} {{ $product['refurbished_price'] }} </div>
                                                                        </div>
                                                                        <div class="check-price"> {{ \App\Services\theme\HomeService::$currencyFormat }} {{ $product['sale_refurbished_price'] }} </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div class="icon-detail">
                                                                <button class="tooltip-top add-cartnoty" data-tippy-content="Add to cart" onclick="addToCart('{{$product['id']}}','{{$product['productType']}}','','{{$product['price']}}','{{$product['refurbished_price']}}')"> <i  data-feather="shopping-cart"></i> </button>
{{--                                                                <a href="javascript:void(0)"  class="add-to-wish tooltip-top"  data-tippy-content="Add to Wishlist" > <i  data-feather="heart"></i> </a>--}}
                                                                <a href="/product/{{ $product['slug'] }}"  class="tooltip-top"  data-tippy-content="Quick View"> <i  data-feather="eye"></i> </a>
{{--                                                                <a href="compare.html" class="tooltip-top" data-tippy-content="Compare"> <i  data-feather="refresh-cw"></i> </a>--}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                              @endforeach
                                            </div>
                                        </div>
                                        <div class="product-pagination">
                                            <div class="theme-paggination-block">
                                                <div class="row">
                                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                                        <nav aria-label="Page navigation" class="pagination-n">
                                                            {!! $data['products']->onEachSide(5)->links()  !!}
{{--                                                            <ul class="pagination">--}}
{{--                                                                <li class="page-item"><a class="page-link" href="javascript:void(0)" aria-label="Previous"><span aria-hidden="true"><i class="fa fa-chevron-left" aria-hidden="true"></i></span> <span class="sr-only">Previous</span></a></li>--}}
{{--                                                                <li class="page-item "><a class="page-link" href="javascript:void(0)">1</a></li>--}}
{{--                                                                <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>--}}
{{--                                                                <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>--}}
{{--                                                                <li class="page-item"><a class="page-link" href="javascript:void(0)" aria-label="Next"><span aria-hidden="true"><i class="fa fa-chevron-right" aria-hidden="true"></i></span> <span class="sr-only">Next</span></a></li>--}}
{{--                                                            </ul>--}}
                                                        </nav>
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                                        <div class="product-search-count-bottom">
                                                            <h5>Showing Products page {{ $data['products']->currentPage() }}-{{ $data['products']->lastPage() }} of {{ $data['products']->total() }} Result</h5></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section End -->


@endsection
