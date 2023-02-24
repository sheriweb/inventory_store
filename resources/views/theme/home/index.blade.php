@extends('layouts.theme')
@section('content')
<style>
    .price_section {
        display: flex;
    }
    h5.price_section p {
        color: black;
        margin-right: 7px;
    }
    span.sale_price {
        text-decoration: none !important;
        color: #0a58ca!important;
        margin-right: 5px;
    }
    .main_price_section{
        display: flex;
        flex-wrap: wrap;
        width: 77%;
        margin: auto;
        margin-left: 99px;
    }
</style>
    @include('theme.home.home-slider')
    @include('theme.home.services')
    @include('theme.home.new-product')
    @include('theme.home.categories')
    @include('theme.home.deal')
    @include('theme.home.clients')
    @include('theme.home.brands')


@endsection
@section('script')
    <script>
        $(document).ready(function () {
            loadCart()
            loadCategory()
        });
        $(document).on('click','.current-cat',function (){
            let cat_id = $(this).attr('cat-id');
            loadCategory(cat_id)
        });
        function loadCategory(cat_id = null)
        {
            $('.loader-wrapper').fadeOut('slow', function() {
                $(this).removeClass('d-none');
                $(this).addClass('show');
            });
            let url = (cat_id == null) ? '/get-current-category' :'/get-current-category/'+cat_id;
            $.ajax({
                url: url,
                type:'get',
                success: function (response){
                    $('#current-tab').html(response);
                    // setTimeout(function () {
                    if($('.product-slide-3').hasClass('slick-initialized'))
                    {
                        $('.product-slide-3').slick('unslick')
                    }
                    $(".product-slide-3").slick({
                        arrows: true,
                        dots: false,
                        infinite: false,
                        speed: 300,
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        responsive: [
                            {
                                breakpoint: 1420,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 2,
                                    infinite: true
                                }
                            },
                            {
                                breakpoint: 420,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1,
                                    infinite: true
                                }
                            },
                        ]
                    })
                    $('.loader-wrapper').fadeOut('slow', function() {
                        $(this).addClass('d-none');
                        $(this).removeClass('show');
                    });
                    // }, 500);
                }


            })
        }
    </script>
@endsection
