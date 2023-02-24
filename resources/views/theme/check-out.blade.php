@extends('layouts.theme')


@section('content')
    @php
        $page = 'product_page';
    @endphp
<style>
    .error{
        color: red !important;
        font-size: 14px !important;
        font-weight: 100 !important;
    }
    .iti__country-list li{
        display: block !important;
    }
    .intl-tel-input .country-list, span.iti__country-name {
        color: #000!important;
    }
    div.iti.iti--allow-dropdown.iti--separate-dial-code{
        width: 100%!important;
    }

    .intl-tel-input .selected-flag .iti-arrow {

        border-top: 4px solid #ffffff !important;
    }
    .iti--allow-dropdown .iti__flag-container, .iti--separate-dial-code .iti__flag-container {
        height: 45px !important;
    }
    .loader {
        color: #FFF;
        display: inline-block;
        position: relative;
        /*font-size: 48px;*/
        /*font-family: Arial, Helvetica, sans-serif;*/
        box-sizing: border-box;
    }
    .loader::after {
        content: '';
        width: 5px;
        height: 5px;
        background: currentColor;
        position: absolute;
        bottom: 4px;
        right: -11px;
        box-sizing: border-box;
        animation: animloader 1s linear infinite;
    }

    @keyframes animloader {
        0% {
            box-shadow: 10px 0 rgba(255, 255, 255, 0), 20px 0 rgba(255, 255, 255, 0);
        }
        50% {
            box-shadow: 10px 0 white, 20px 0 rgba(255, 255, 255, 0);
        }
        100% {
            box-shadow: 10px 0 white, 20px 0 white;
        }
    }
</style>
    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>checkout</h2>
                            <ul>
                                <li><a href="/">home</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="javascript:void(0)">checkout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!-- section start -->
    <section class="section-big-py-space b-g-light">
        <div class="custom-container">
            <div class="checkout-page contact-page">
                <div class="checkout-form">

                        <div class="row">

                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <form id="shipping-calculate-form" action="{{ route('calculate.shipping') }}">
                                <div class="checkout-title">
                                    <h3>Billing Details</h3></div>
                                <div class="theme-form">
                                    <div class="row check-out ">
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <label class="field-label">Email Address</label>
                                            <input type="text" name="email" id="email" value="" placeholder="">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <label>First Name</label>
                                            <input type="text" name="first_name" id="first_name"  value="" placeholder="">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <label>Last Name</label>
                                            <input type="text" name="last_name" id="last_name" value="" placeholder="">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <label class="field-label">Phone</label>
                                            <input type="text" name="contact_no" id="contact_no" value="" placeholder="">
                                        </div>

                                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                            <label class="field-label">Country</label>
                                            <select name="country" id="country">
                                                <option>Pakistan</option>
                                                <option>India</option>
                                                <option>South Africa</option>
                                                <option>United State</option>
                                                <option>Australia</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                            <label class="field-label">Address</label>
                                            <input type="text" name="address" id="address" value="" placeholder="Street address">
                                        </div>
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                            <label class="field-label">Town/City</label>
                                            <input type="text" name="city" id="city" value="" placeholder="">
                                        </div>
                                        <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                            <label class="field-label">State / County</label>
                                            <input type="text" name="state" id="state" value="" placeholder="">
                                        </div>
                                        <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                            <label class="field-label">Postal Code</label>
                                            <input type="text" name="postal_code" id="postal_code" value="" placeholder="">
                                        </div>
                                        @if(@!$cart->shipping_calculated && count(json_decode($cart->cart_items)) > 0)
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 text-end">
                                           <button type="submit" class="btn btn-normal calculate-shipping">
                                             <span id="calculateShipping"> Calculate Shipping </span>
                                               <span>
                                                 <span class="loader loaderCalculate d-none">Calculating</span>
                                               </span>
                                           </button>
                                        </div>
                                         @endif
                                    </div>
                                </div>
                                </form>
                            </div>

                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <form id="form_order_place" action="{{route('payment.checkout')}}">
                                <div class="checkout-details theme-form  section-big-mt-space">
                                    <div class="order-box">
                                        <div class="title-box">
                                            <div>Product <span>Total</span></div>
                                        </div>
                                        <ul class="qty cart-list">

                                            @foreach(json_decode($cart->cart_items) as $item)
                                            <li>{{ $item->item_name }} × {{ $item->item_quantity }} <span>{{ \App\Services\theme\HomeService::$currencyFormat }}{{ \App\Services\ConstantService::moneyFormat( $item->total_price) }}</span></li>
                                            @endforeach
                                        </ul>
                                        <ul class="sub-total">
                                            <li>Subtotal <span class="count">{{ \App\Services\theme\HomeService::$currencyFormat }}{{ \App\Services\ConstantService::moneyFormat($cart->sub_total) }}</span></li>
                                            <li>Shipping
                                                <div class="shipping">
                                                    <div class="shopping-option">

                                                        <label for="free-shipping">{{ \App\Services\theme\HomeService::$currencyFormat }}{{ \App\Services\ConstantService::moneyFormat( $cart->shipping) }} </label>
                                                    </div>
                                                    {{-- <div class="shopping-option">
                                                        <input type="checkbox" name="local-pickup" id="local-pickup">
                                                        <label for="local-pickup">Local Pickup</label>
                                                    </div> --}}
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="total">
                                            <li>Total <span class="count">{{ \App\Services\theme\HomeService::$currencyFormat }}{{ \App\Services\ConstantService::moneyFormat( $cart->sub_total) }}</span></li>
                                        </ul>
                                    </div>
                                    <div class="payment-box">
                                        <div class="upper-box">
                                            <div class="payment-options">
                                                <ul>
                                                    {{-- <li>
                                                        <div class="radio-option">
                                                            <input type="radio" name="payment_type" value="check" id="payment-1" checked="checked">
                                                            <label for="payment-1">Check Payments<span class="small-text">Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</span></label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="radio-option">
                                                            <input type="radio" name="payment_type" value="cod" id="payment-2">
                                                            <label for="payment-2">Cash On Delivery<span class="small-text">Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</span></label>
                                                        </div>
                                                    </li> --}}
                                                    <li>
                                                        <div class="radio-option paypal">
                                                            <input type="radio" name="payment_type" value="stripe" id="stripe_payment" checked="checked">
                                                            <label for="payment-3">Stripe</label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        @if(@$cart->shipping_calculated)
                                        <div class="text-right"><button type="button" class="btn-normal btn placeOrder">Place Order</button></div>
                                        @endif
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </section>
    <!-- section end -->


@endsection
@section('script')
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>
    <script>


        $('.placeOrder').click(function (){

            if ($("#stripe_payment").prop("checked")) {

                window.location.href = '/stripe'
                // $.get('/stripe' , { payment_type: 'stripe', });
            }


            });
        // $('.placeOrder').click(function (){
        //     let url = $('#form_order_place').attr('action');
        //     let paymentType =
        //     $.ajax({
        //         type: "POST",
        //         url:url,
        //         data: $('#form_order_place').serialize() ,
        //         success: function( msg ) {
        //             alert( msg );
        //         }
        //     });
        // });


        jQuery(document).ready(function ($) {
            telInput = intlTelInput($("#contact_no")[0],{
                // utilsScript: 'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.8/js/utils.js',
                formatOnDisplay: false,
                nationalMode: false,
                separateDialCode: true,
                // customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
                //     console.log(selectedCountryPlaceholder);
                //     return "e.g. " + selectedCountryPlaceholder + '1234567';
                // }
            });
            // $('#email').focusout(function () {
            //     let email = $(this).val();
            //     $.ajax({
            //         url: '/user-info/' + email,
            //         type: 'get',
            //         success: function (response) {
            //             jQuery.each(response, function (index, item) {
            //                 $('#' + index).val(item)
            //             });
            //         }
            //     })
            // });


            jQuery.validator.addMethod("validatePhone",
                function(value, element) {
                console.log(value)
                    var testVal = value.indexOf('+') >= 0 ? value : '+' + telInput.getSelectedCountryData().dialCode + value;
                    $('[name="contact_no"]').val(testVal);
                    var valid;
                    if ($.trim(testVal).length > 0) {
                        var regx = /[+][0-9]{10,15}/;
                        valid = regx.test(testVal);
                    } else {
                        valid = true;
                    }
                    return this.optional(element) || valid;
                }, "Please enter valid phone number"
            );
            $("#shipping-calculate-form").validate({
                rules: {
                    first_name: {
                        required: true,
                        maxlength: 250
                    },
                    last_name: {
                        required: true,
                        maxlength: 250
                    },
                    contact_no: {
                        required: true,
                        validatePhone: true,
                        maxlength:13
                    },
                    email: {
                        required: true,
                        email: true,
                        maxlength: 250
                    },
                    country: {
                        required: true,
                    },
                    address: {
                        required: true,
                        maxlength: 500
                    },
                    city: {
                        required: true,
                        maxlength: 100
                    },
                    state: {
                        required: true,
                        maxlength: 100
                    },
                    postal_code: {
                        required: true,
                        maxlength: 250
                    },
                    payment_type: {
                        required: true,
                    }
                },
                messages: {
                    first_name: {
                        required: "Please enter first name",
                    },
                    last_name: {
                        required: "Please enter last name",
                    },
                    contact_no: {
                        required: "Please enter phone number",
                    },
                    email: {
                        required: "Please enter valid email",
                    },
                    country: {
                        required: "Please select country",
                    },
                    address: {
                        required: "Please enter address",
                    },
                    city: {
                        required: "Please enter city",
                    },
                    state: {
                        required: "Please enter state",
                    },
                    postal_code: {
                        required: "Please enter postal code",
                    }
                },
                highlight: function (element, errorClass) {
                    $(element).removeClass(errorClass); //prevent class to be added to selects
                },
                errorPlacement: function (error, element) {
                    error.insertAfter(element);
                },
                submitHandler: function (form, event) {
                    // form.submit();
                    let button = $('#submit_client_form')
                    event.preventDefault();
                    $('#calculateShipping').addClass('d-none');
                    $('.loaderCalculate').removeClass('d-none');
                    $('.calculate-shipping').prop('disabled', true);
                    let url = $('#shipping-calculate-form').attr('action');
                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: new FormData(form),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (response) {
                           let res = JSON.parse(response)

                            if(res.success == 1){
                                window.location.reload()
                            }else{
                                alert(res.message)
                            }


                            // if(response.status == 200){
                            //     Swal.fire({
                            //         title: 'Order place',
                            //         text: response.message,
                            //         html: `<p>${response.message}</p><p>Your order id is: <b>${response.orderId}</b></p>`,
                            //         icon: 'success',
                            //         showCancelButton: false,
                            //         confirmButtonColor: '#3085d6',
                            //         cancelButtonColor: '#d33',
                            //         confirmButtonText: 'ok'
                            //     }).then((result) => {
                            //         window.location.href = '/';
                            //     })
                            // }else if(response.status == 300){
                            //     Swal.fire({
                            //         title: 'Cart error',
                            //         text: response.message,
                            //         icon: 'warning',
                            //         showCancelButton: false,
                            //         confirmButtonColor: '#3085d6',
                            //         cancelButtonColor: '#d33',
                            //         confirmButtonText: 'ok'
                            //     }).then((result) => {
                            //         window.location.href = '/';
                            //     })
                            // }
                        },
                        error: function (response) {
                            //show error message
                            $.each(response.responseJSON.errors, function (index, value) {
                                $('.error_' + index).html(value);
                            });
                        }
                    });
                }
            })

        });
    </script>
@endsection
