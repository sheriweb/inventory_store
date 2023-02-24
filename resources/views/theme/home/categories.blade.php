

<!--title start-->
@if(count($data['homeCategories']) > 0)
<div class="title8 section-big-pt-space">
    <h4>our category</h4>
</div>
@endif
<!--title end-->

<!-- category start -->
<section class="category4 section-big-pb-space">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 pr-0">
                <div class="category-slide5two no-arrow">
                    @foreach($data['homeCategories'] as $category)
                    <div>
                        <div class="category-box">
                            <div class="img-wrraper">
                                <a href="/category/{{ $category['slug'] }}">
                                    <img src="{{ $category['category_home_image'] }}" alt="category" class="img-fluid">
                                </a>
                            </div>
                            <div class="category-detail">
                                <a href="category-page(left-sidebar).html">
                                    <h2>{{ $category['category_name'] }}</h2>
                                </a>
                                <a href="/category/{{ $category['slug'] }}" class="btn btn-rounded btn-md btn-block">shop now</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- category end -->

<!--sale banner start-->
{{--<section class="sale-banenr banner-style2  section-big-mb-space">--}}
{{--    <img src="../assets/images/mega-store/sale-banner/1.jpg" alt="sale-banenr" class="img-fluid bg-img">--}}
{{--    <div class="custom-container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-12 position-relative">--}}
{{--                <div class="sale-banenr-contain text-center  p-right">--}}
{{--                    <div>--}}
{{--                        <h4>summer sale 20% off</h4>--}}
{{--                        <h2>shoes collection</h2>--}}
{{--                        <h3>fashion trends</h3>--}}
{{--                        <a href="#" class="btn btn-rounded">Shop Now</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
<!--sale banner ned-->
