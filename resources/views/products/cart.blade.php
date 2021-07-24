@extends('master')
@section('script')
    <script>
        function changeQuantity(event, id , cartName = null) {
            //
            $.ajaxSetup({
                headers : {
                    'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type' : 'application/json'
                }
            })

            //
            $.ajax({
                type : 'POST',
                url : '/cart/quantity/change',
                data : JSON.stringify({
                    id : id ,
                    quantity : event.target.value,
                    // cart : cartName,
                    _method : 'patch'
                }),
                success : function(res) {
                   location.reload();
                }
            });
        }
    </script>
@endsection
@section('main')
    @if(cookie('cart'))
    <div class="container-main">
        <div class="col-12">
            <div class="breadcrumb-container">
                <ul class="js-breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{url('/')}}" class="breadcrumb-link">خانه</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" class="breadcrumb-link active-breadcrumb">سبد خرید</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="page-content">
            <div class="cart-title-top">سبد خرید</div>
            <div class="cart-main">
                <div class="col-lg-9 col-md-9 col-xs-12 pull-right">
                    <div class="title-content">
                        <ul class="title-ul">
                            <li class="title-item product-name">
                                نام کالا
                            </li>
                            <li class="title-item required-number">
                                تعداد مورد نیاز
                            </li>
                            <li class="title-item unit-price">
                                قیمت واحد
                            </li>
                            <li class="title-item total">
                                مجموع
                            </li>
                        </ul>
                    </div>
                    @foreach(\App\Helpers\Cart\Cart::instance('cart')->all() as $cart)
                        @if(isset($cart['product']))
                            @php
                                $product = $cart['product']
                            @endphp
                    <div class="page-content-cart">
                        <div class="checkout-body">
                            <div class="product-name before">
                                <form action="{{route('cart.destroy',$cart['id'])}}" method="post" id="delete-cart-{{$product->id}}">
                                    @csrf
                                    @method('delete')
                                </form>
                                <a href="#" class="remove-from-cart" onclick="event.preventDefault();document.getElementById('delete-cart-{{$product->id}}').submit()">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <a href="#" class="col-thumb">
                                    <img src="{{$product->image}}">
                                </a>
                                <div class="checkout-col-desc">
                                    <a href="#">
                                        <h1>{{$product->title}}</h1>
                                    </a>
                                    <div class="checkout-variant-color">
                                        <span class="checkout-variant-title">
                                                <i class="fa fa-check"></i>
                                               سایز : {{$cart['size']}}
                                        </span>
                                        <span class="checkout-variant-title">
                                                <i class="fa fa-check"></i>
                                               رنگ : {{$cart['color']}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="required-number before">
                                <div class="quantity">
                                    <input onchange="changeQuantity(event,'{{$cart['id']}}','cart')" type="number" min="1" max="{{$product->inventory}}" step="1" value="{{$cart['quantity']}}">
                                </div>
                            </div>
                            <div class="unit-price before">
                                <div class="product-price">
                                    @if(! $cart['discount_percent'] )
                                        {{$product->price}}
                                    @else
                                        <del class="text-danger text-sm">{{$product->price}}</del>
                                        <span>
                                            {{ $product->price - ($product->price * $cart['discount_percent']) }}
                                        </span>
                                    @endif
                                    <span>
                                            تومان
                                        </span>
                                </div>
                            </div>
                            <div class="total before">
                                <div class="product-price">
                                    @if(! $cart['discount_percent'] )
                                        {{$product->price * $cart['quantity']}}
                                    @else
                                        <del class="text-danger text-sm">{{$product->price}}</del>
                                        <span>
                                            {{ ($product->price - ($product->price * $cart['discount_percent'])) * $cart['quantity']}}
                                        </span>
                                    @endif
                                    <span>
                                            تومان
                                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-lg-3 col-md-3 col-xs-12 pull-left">
                    <div class="page-aside">
                        <div class="checkout-summary">
                            <div class="comment-summary mb-3">
                                <p>اگر کد تخفیف دارید اینجا وارد کنید تا اعمال شود</p>
                            </div>
                            <div class="discount-code mb-4">
                                <form action="{{route('discount.check')}}" method="post" class="discount-form">
                                    @csrf
                                    <label for="discount">کد تخفیف</label>
                                    <input type="hidden" name="cart" value="cart">
                                    <input type="text" name="discount" class="input-discount" placeholder="کد تخفیف خود را وارد کنید">
                                        <button type="submit" class="btn-discount">اعمال</button>
                                    @if($errors->has('discount'))
                                        <div class="text-danger text-sm">{{$errors->first('discount')}}</div>
                                    @endif
                                </form>
                            </div>
                            <div class="amount-of-payable mt-4">
                                @php
                                $total = Cart::all()->sum(function ($cart){
                                    return $cart['discount_percent'] == 0
                                            ? $cart['product']->price * $cart['quantity']
                                            : ($cart['product']->price - ($cart['product']->price * $cart['discount_percent'])) * $cart['quantity'] ;
                                })
                                @endphp
                                <span class="payable">مبلغ قابل پرداخت</span>
                                <span class="amount-of">{{$total}}
                                        <span>تومان</span>
                                </span>
{{--                                <form action="{{route('cart.shipping')}}" method="get" id="cart-payment">--}}
{{--                                </form>--}}
                                <a href="{{route('cart.shipping')}}" >
                                    <button class="setlement-account">تسویه حساب</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="container-main">
        <div class="col-12">
            <div class="cart-page">
                <div class="container">
                    <div class="checkout-empty">
                        <div class="checkout-empty-empty-cart-icon"></div>
                        <div class="checkout-empty-title">سبد خرید شما خالی است!</div>
                        <div class="col-lg-6 col-md-6!important col-xs-12 mx-auto">
                            <div class="checkout-empty-links">

                                <p>
                                    می‌توانید برای مشاهده محصولات بیشتر به صفحات زیر بروید
                                </p>
                                <div class="checkout-empty-link-urls">
                                    <a href="#">
                                        تخفیف‌ها و پیشنهادها
                                    </a>
                                    <a href="#">
                                        محصولات پرفروش روز
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
