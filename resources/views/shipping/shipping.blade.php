@extends('shipping.layout')
@section('main')
    <header class="js-header">
        <div class="container">
            <div class="header-row">
                <div class="header-logo">
                    <a href="" class="header-logo-img"></a>
                </div>
                <div class="shipment-page">
                    <ul class="checkout-steps">
                        <li class="is-completed">
                            <a href="#" class="checkout-steps-item-link active-link-shopping">
                                <span>اطلاعات ارسال</span>
                            </a>
                        </li>
                        <li class="is-completed">
                            <a href="#" class="checkout-steps-item active-link">
                                <span>پرداخت</span>
                            </a>
                        </li>
                        <li class="is-active">
                            <a href="#" class="checkout-steps-item active-link">
                                <span>اتمام خرید و ارسال</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!--header------------------------------------->
    <!--shipping----------------------------------->
    <section class="page-shipping">
        <div class="page-row">
            <div class="col-lg-8 col-md-8 col-xs-12 pull-right">
                <div class="shipment-page-container">
                    <div class="headline-checkout">
                        <span>انتخاب آدرس تحویل سفارش</span>
                    </div>
                    <div class="address-section">
                        <div class="checkout-contact">
                            <div class="checkout-contact-content">
                                <ul class="checkout-contact-items" style="display:inline-block;">
                                    <li class="checkout-contact-item checkout-contact-item-username"> گیرنده :
                                        <span class="js-recipient-full-name">{{auth()->user()->name}}</span>
                                        <a href="#" class="checkout-contact-edit" data-toggle="modal" data-target="#exampleModalCenter">اصلاح این آدرس</a>
                                    </li>
                                    <li class="checkout-contact-item checkout-contact-item-location">
                                        <div class="checkout-contact-item checkout-contact-item-mobile">
                                            شماره تماس :
                                            <span class="js-recipient-mobile-phone" data-value="{{auth()->user()->phone_number}}">{{auth()->user()->phone_number}}</span>
                                        </div>
                                        @foreach(auth()->user()->address as $address)
                                            <div class="checkout-contact-item-message">
                                                کد پستی :
                                                <span class="js-recipient-post_code" data-value="{{$address->postal_code}}">{{$address->postal_code}}</span>
                                            </div>
                                            <br>
                                            <span class="js-recipient-address-part">{{$address->address}}</span>
                                        @endforeach
                                    </li>
                                </ul>
                                <button class="checkout-contact-location" data-toggle="modal" data-target="#exampleModalCenter">تغییر آدرس ارسال</button>
                            </div>
                        </div>
                    </div>
                    <form action="#" id="shipping-data-form">
                        <div class="js-normal-delivery">
                            <div class="headline-checkout">
                                <span>انتخاب نحوه ارسال سفارش</span>
                            </div>
                            <div class="checkout-pack">
                                <div class="checkout-pack-header">
                                    <div class="checkout-pack-header-title">
                                        <span>مرسوله ۱ از ۱</span>
                                        <div class="checkout-time-table-shipping-type">ارسال عادی</div>
                                    </div>
                                </div>
                                @foreach(\App\Helpers\Cart\Cart::instance('cart')->all() as $cart)
                                    @php
                                        $product = $cart['product']
                                    @endphp
                                    <div class="checkout-pack-row">
                                        <section class="swiper-products-compact">
                                            <div class="swiper-slide">
                                                <div class="product-box">
                                                    <a class="product-box-img">
                                                        <img src="{{$product->image}}">
                                                    </a>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                @endforeach
                                <div class="checkout-pack-row js-shipment-submit-type">
                                    <div class="checkout-time-table">
                                        <div class="checkout-additional-options-action-bar">
                                            <div class="checkout-additional-options-checkbox-container">
                                                <label for="#" class="checkout-additional-options-checkbox-image"></label>
                                            </div>
                                            <div class="checkout-additional-options-action-container">
                                                <div class="checkout-additional-options-action-title">پست پیشتاز</div>
                                                <div class="checkout-additional-options-action-lead-time">
                                                    زمان تقریبی تحویل 3 تا 5 روز
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="checkout-actions">
                        <a href="{{url('/cart')}}" class="checkout-actions-back"><i class="fa fa-angle-right" aria-hidden="true"></i>بازگشت به سبد خرید</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-12 pull-left">
                <div class="page-aside">
                    <div class="checkout-aside">
                        <div class="checkout-bill">
                            <ul class="checkout-bill-summary">
                                <form action="{{route('cart.payment')}}" method="post">
                                    @csrf
                                    <li>
                                        <label>
                                            <input type="radio" name="pay_method" value="web" checked>
                                            <span class="payment-paymethod-title">پرداخت اینترنتی</span>
                                        </label><br><hr>
                                        <label>
                                            <input type="radio" name="pay_method" value="home">
                                            <span class="payment-paymethod-title">پرداخت درب منزل</span>
                                        </label><hr>
                                    </li>
                                    <li class="checkout-bill-total-price">
                                        @php
                                            $total = Cart::all()->sum(function ($cart){
                                                return $cart['discount_percent'] == 0
                                                        ? $cart['product']->price * $cart['quantity']
                                                        : ($cart['product']->price - ($cart['product']->price * $cart['discount_percent'])) * $cart['quantity'] ;
                                            })
                                        @endphp
                                        <span class="checkout-bill-total-price-title">مبلغ قابل پرداخت</span>
                                        <span class="checkout-bill-total-price-amount">
                                            <span class="js-price">{{$total}}</span>
                                            <span class="checkout-bill-total-price-currency">تومان</span>
                                        </span>
                                        <div class="parent-btn">
                                            <button type="submit" class="dk-btn dk-btn-info payment-link">
                                                ادامه فرآیند خرید
                                                <i class="mdi mdi-arrow-left"></i>
                                            </button>
                                        </div>
                                    </li>
                                </form>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--shipping----------------------------------->

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        افزودن آدرس جدید
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="middle-container">
                        <form action="{{route('edit.address',auth()->user()->id)}}"  method="post" class="form-checkout" id="editAdd">
                            @csrf
                            <div class="form-checkout-row">
                                @foreach(auth()->user()->address as $address)
                                    <label for="address">آدرس
                                        <span class="required-star" style="color:red;">*</span></label>
                                    <input type="text" value="{{$address->address}}" name="address" id="address" class="input-name-checkout form-control" placeholder="آدرس خود را وارد نمایید" style="height:80px;">

                                    <label for="post-code">کد پستی<span class="required-star" style="color:red;">*</span></label>
                                    <input type="text" value="{{$address->postal_code}}" name="postal_code" id="post-code" class="input-name-checkout form-control" placeholder="کد پستی را بدون خط تیره بنویسید">

                                    <div class="AR-CR">
                                        <button type="submit" class="btn-registrar"> ثبت آدرس</button>
                                    </div>
                                @endforeach
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
