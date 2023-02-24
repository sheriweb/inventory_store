<style>
    .add_to_cart .cart-inner .cart_media ul.cart_product li .media .media-body .qty-box {
        flex-wrap: wrap !important;
    }
    span.qty_error {
        font-size: 11px !important;
    }
</style>


<!-- Add to cart bar -->
<div id="cart_side" class="add_to_cart right ">
    <a href="javascript:void(0)" class="overlay" onclick="closeCart()"></a>
    <div class="cart-inner">
        <div class="cart_top">
            <h3>my cart</h3>
            <div class="close-cart">
                <a href="javascript:void(0)" onclick="closeCart()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="cart_media">
            <ul class="cart_product" id="cart_product">
            </ul>
            <ul class="cart_total">
                <li>
                    subtotal : <span id="subTotal"></span> <span>  {{ \App\Services\theme\HomeService::$currencyFormat }} &nbsp;</span>
                </li>
                <li>
                    shpping <span>free</span>
                </li>
                <li>
                    taxes <span>0.00</span>
                </li>
                <li>
                    <div class="total">
                        total <span id="grandTotal">0.00</span><span>  {{ \App\Services\theme\HomeService::$currencyFormat }} &nbsp;</span>
                    </div>
                </li>
                <li>
                    <div class="buttons">
                        <a href="{{ route('viewCart') }}" class="btn btn-solid btn-sm">view cart</a>
                        <a href="{{ route('checkOut') }}" class="check-out-btn btn btn-solid btn-sm ">checkout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Add to cart bar end-->


<!-- Add to wishlist bar -->
<div id="wishlist_side" class="add_to_cart right ">
    <a href="javascript:void(0)" class="overlay" onclick="closeWishlist()"></a>
    <div class="cart-inner">
        <div class="cart_top">
            <h3>my wishlist</h3>
            <div class="close-cart">
                <a href="javascript:void(0)" onclick="closeWishlist()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="cart_media">
            <ul class="cart_product" >
                <li>
                    <div class="media">
                        <a href="product-page(left-sidebar).html">
                            <img alt="megastore1" class="me-3" src="../assets/images/mega-store/product/1.jpg">
                        </a>
                        <div class="media-body">
                            <a href="product-page(left-sidebar).html">
                                <h4>women fashion shoes</h4>
                            </a>
                            <h6>
                                $80.00 <span>$120.00</span>
                            </h6>
                            <div class="addit-box">
                                <div class="qty-box">
                                    <div class="input-group">
                                        <button class="qty-minus"></button>
                                        <input class="qty-adj form-control" type="number" value="1"/>
                                        <button class="qty-plus"></button>
                                    </div>
                                </div>
                                <div class="pro-add">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#edit-product" >
                                        <i data-feather="edit"></i>
                                    </a>
                                    <a href="javascript:void(0)">
                                        <i  data-feather="trash-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="media">
                        <a href="product-page(left-sidebar).html">
                            <img alt="megastore1" class="me-3" src="../assets/images/mega-store/product/2.jpg">
                        </a>
                        <div class="media-body">
                            <a href="product-page(left-sidebar).html">
                                <h4>men analogue watch</h4>
                            </a>
                            <h6>
                                $80.00 <span>$120.00</span>
                            </h6>
                            <div class="addit-box">
                                <div class="qty-box">
                                    <div class="input-group">
                                        <button class="qty-minus"></button>
                                        <input class="qty-adj form-control" type="number" value="1"/>
                                        <button class="qty-plus"></button>
                                    </div>
                                </div>
                                <div class="pro-add">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#edit-product" >
                                        <i data-feather="edit"></i>
                                    </a>
                                    <a href="javascript:void(0)">
                                        <i  data-feather="trash-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="media">
                        <a href="product-page(left-sidebar).html">
                            <img alt="megastore1" class="me-3" src="../assets/images/mega-store/product/3.jpg">
                        </a>
                        <div class="media-body">
                            <a href="product-page(left-sidebar).html">
                                <h4>wireless  headphones</h4>
                            </a>
                            <h6>
                                $80.00 <span>$120.00</span>
                            </h6>
                            <div class="addit-box">
                                <div class="qty-box">
                                    <div class="input-group">
                                        <button class="qty-minus"></button>
                                        <input class="qty-adj form-control" type="number" value="1"/>
                                        <button class="qty-plus"></button>
                                    </div>
                                </div>
                                <div class="pro-add">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#edit-product" >
                                        <i data-feather="edit"></i>
                                    </a>
                                    <a href="javascript:void(0)">
                                        <i  data-feather="trash-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="cart_total">
                <li>
                    subtotal : <span></span>
                </li>
                <li>
                    shpping <span>free</span>
                </li>
                <li>
                    taxes <span>$0.00</span>
                </li>
                <li>
                    <div class="total">
                        total<span></span>
                    </div>
                </li>
                <li>
                    <div class="buttons">
                        <a href="wishlist.html" class="btn btn-solid btn-block btn-md">view wislist</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Add to wishlist bar end-->

<!-- My account bar start-->
<div id="myAccount" class="add_to_cart right account-bar">
    <a href="javascript:void(0)" class="overlay" onclick="closeAccount()"></a>
    <div class="cart-inner">
        <div class="cart_top">
            <h3>my account</h3>
            <div class="close-cart">
                <a href="javascript:void(0)" onclick="closeAccount()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <form class="theme-form">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" placeholder="Email" required="">
            </div>
            <div class="form-group">
                <label for="review">Password</label>
                <input type="password" class="form-control" id="review" placeholder="Enter your password" required="">
            </div>
            <div class="form-group">
                <a href="javascript:void(0)" class="btn btn-solid btn-md btn-block ">Login</a>
            </div>
            <div class="accout-fwd">
                <a href="forget-pwd.html" class="d-block"><h5>forget password?</h5></a>
                <a href="register.html" class="d-block"><h6 >you have no account ?<span>signup now</span></h6></a>
            </div>
        </form>
    </div>
</div>
<!-- Add to account bar end-->

<!-- add to  setting bar  start-->
<div id="mySetting" class="add_to_cart right">
    <a href="javascript:void(0)" class="overlay" onclick="closeSetting()"></a>
    <div class="cart-inner">
        <div class="cart_top">
            <h3>my setting</h3>
            <div class="close-cart">
                <a href="javascript:void(0)" onclick="closeSetting()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="setting-block">
            <div class="form-group">
                <select>
                    <option value="">language</option>
                    <option value="">english</option>
                    <option value="">french</option>
                    <option value="">hindi</option>
                </select>
            </div>
            <div class="form-group">
                <select>
                    <option value="">currency</option>
                    <option value="">uro</option>
                    <option value="">ruppees</option>
                    <option value="">piund</option>
                    <option value="">doller</option>
                </select>
            </div>
        </div>
    </div>
</div>
<!-- add to  setting bar  end-->

<!-- notification product -->
{{--<div class="product-notification" id="dismiss">--}}
{{--    <span  onclick="dismiss();" class="btn-close" aria-hidden="true"></span>--}}
{{--    <div class="media">--}}
{{--        <img class="me-2" src="../assets/images/mega-store/hot-deal/3.jpg" alt="Generic placeholder image">--}}
{{--        <div class="media-body">--}}
{{--            <h5 class="mt-0 mb-1">Latest trending</h5>--}}
{{--            Cras sit amet nibh libero, in gravida nulla.--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- notification product -->
