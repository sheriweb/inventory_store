@extends('layouts.theme')


@section('content')
    @php
        $page = 'product_page';
    @endphp

        <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>blog</h2>
                            <ul>
                                <li><a href="/">home</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="javascript:void(0)">blog</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->



    <!-- section start -->
    <section class="section-big-py-space blog-page ratio2_3">
        <div class="custom-container">
            <div class="row">
                <!--Blog sidebar start-->
                <div class="col-xl-3 col-lg-4 col-md-5">
                    <div class="blog-sidebar">
                        <div class="theme-card">
                            <h4>Recent Blog</h4>
                            <ul class="recent-blog">
                                @foreach( $data['latest_blogs'] as $blog)
                                <li>
                                    <div class="media"><img class="img-fluid " src="{{ asset('/blogImages').'/'.$blog->feature_image }}" alt="Generic placeholder image">
                                        <div class="media-body align-self-center">
                                            <h6>{{ \App\Services\HelperService::frontEndDateFormat($blog->publish_date) }}</h6>
{{--                                            <p>0 hits</p>--}}
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!--Blog sidebar start-->
                <!--Blog List start-->
                <div class="col-xl-9 col-lg-8 col-md-7 order-sec">
                    @foreach($data['blogs'] as $key => $blog)
                        @if( $key%2 == 0)
                    <div class="row blog-media">
                        <div class="col-xl-6">
                            <div class="blog-left">
                                <a href="javascript:void(0)"><img src="{{ asset('/blogImages').'/'.$blog->feature_image }}" class="img-fluid  " alt="blog-left"></a>
                                <div class="label-block">
                                    <div class="date-label">
                                      {{ \App\Services\HelperService::frontEndDateFormat($blog->publish_date) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 ">
                            <div class="blog-right">
                                <div>
                                    <a href="javascript:void(0)"><h4>{{ $blog->title }}</h4></a>
                                    <ul class="post-social">
                                        <li>Posted By : {{ $blog->postedBy->name }}</li>
{{--                                        <li><i class="fa fa-heart"></i> 5 Hits</li>--}}
{{--                                        <li><i class="fa fa-comments"></i> 10 Comment</li>--}}
                                    </ul>
                                    <p>
                                        {!! $blog->content !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                        @else
                    <div class="row blog-media media-change">
                        <div class="col-xl-6 ">
                            <div class="blog-left">
                                <a href="javascript:void(0)"><img src="{{ asset('/blogImages').'/'.$blog->feature_image }}" class="img-fluid  " alt=""></a>
                                <div class="date-label">
                                    {{ \App\Services\HelperService::frontEndDateFormat($blog->publish_date) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 ">
                            <div class="blog-right">
                                <div>
                                    <a href="javascript:void(0)"><h4>{{ $blog->title }}</h4></a>
                                    <ul class="post-social">
                                        <li>Posted By : {{ $blog->postedBy->name }}</li>
{{--                                        <li><i class="fa fa-heart"></i> 5 Hits</li>--}}
{{--                                        <li><i class="fa fa-comments"></i> 10 Comment</li>--}}
                                    </ul>
                                    <p>{!!   $blog->content !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                        @endif
                    @endforeach
                </div>
                <!--Blog List start-->
            </div>
        </div>
    </section>
    <!-- Section ends -->

@endsection
