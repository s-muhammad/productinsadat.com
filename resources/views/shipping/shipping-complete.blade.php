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
                        <li class="is-completed is-completed-active">
                            <a href="#" class="checkout-steps-item-link active-link-shopping">
                                <span>اطلاعات ارسال</span>
                            </a>
                        </li>
                        <li class="is-completed is-completed-active">
                            <a href="#" class="checkout-steps-item-link active-link-shopping">
                                <span>پرداخت</span>
                            </a>
                        </li>
                        <li class="is-active">
                            <a href="#" class="checkout-steps-item-link active-link-shopping">
                                <span>اتمام خرید و ارسال</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <section class="page-shipping">
        <div class="page-row">
            @if($orders['status'] == 'paid')
                    <div class="col-12 text-center">
                <div class="complate-page-container">
                    <div class="success-checkout">
                        <div class="container">
                            <div class="icon-success">
                                <span class="fa fa-check"></span>
                            </div>
                            <div class="order-success">
                                سفارش
                                <a href="#" class="order-code">PSOC-{{$orders->id}}</a>
                                با موفقیت پرداخت و در سیستم ثبت شد.
                                <span class="order-ready-post">پرداخت با موفقیت انجام شد. سفارش شما با موفقیت ثبت شد و در زمان تعیین شده برای شما ارسال خواهد شد.
                                    <br>
                                    از اینکه فروشگاه سادات را برای خرید انتخاب کردید از شما سپاسگزاریم.
                                    </span>
                            </div>
                        </div>
                    </div>
                    <div class="checkout-order-info">
                        <div class="order-info">
                            <div class="order-code">
                                کد سفارش :
                                <span>PSOC-{{$orders->id}}</span>
                            </div>
                            <div class="checkout-process-order-info">
                                سفارش شما با موفقیت در سیستم ثبت شد و هم اکنون
                                <a href="#" class="processing">در حال پردازش</a>
                                است.جزئیات این سفارش را می توانید
                                با کلیک بر روی دکمه
                                <a href="{{url('orders')}}" class="link-border">پیگیری سفارش</a>
                                مشاهده نمایید.
                            </div>
                            <div class="parent-btn btn-following-order">
                                <a href="{{url('orders')}}">
                                <button class="dk-btn dk-btn-info">
                                    پیگیری سفارش
                                    <i class="fa fa-shopping-bag sign-in"></i>
                                </button>
                                </a>
                            </div>
                            @foreach(auth()->user()->address as $address)
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">نام تحویل گیرنده: {{auth()->user()->name}}</th>
                                    <th scope="col">شماره تماس : {{auth()->user()->phone_number}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>تعداد مرسوله : 1</td>
                                    <td>مبلغ کل :{{$orders->price}}</td>
                                </tr>
                                <tr>
                                    <td>وضعیت پرداخت : پرداخت آنلاین(موفق)</td>
                                    <td>وضعیت سفارش : در حال انجام</td>
                                </tr>
                                <tr>
                                    <td>آدرس :{{$address->address}}</td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @else
                <div class="col-12 text-center">
                    <div class="complate-page-container">
                        <div class="success-checkout">
                            <div class="container">
                                <div class="icon-success warning">
                                    <span class="fa fa-close"></span>
                                </div>
                                <div class="order-success">
                                    سفارش
                                    <a href="#" class="order-code">PSOC-{{$orders->id}}</a>
                                    در سیستم ثبت شد اما پرداخت ناموفق بود

                                    <span class="text-warning">برای جلوگیری از لغو سیستمی سفارش،تا 24 ساعت آینده از صفحه سفارش ها در پروفایل پرداخت را انجام دهید.</span>

                                    <span class="order-ready-post">چنانچه طی این فرایند مبلغی از حساب شما کسر شده است،طی 72 ساعت آینده به حساب شما باز خواهد گشت.</span>
                                </div>
                            </div>
                        </div>

                        <div class="checkout-order-info">
                            <div class="order-info">
                                <div class="order-code">
                                    کد سفارش :
                                    <span>PSOC-{{$orders->id}}</span>
                                </div>
                                <div class="checkout-process-order-info">
                                    سفارش شما با موفقیت در سیستم ثبت شد و هم اکنون
                                    <a href="#" class="processing">در انتظار پرداخت</a>
                                    است.جزئیات این سفارش را می توانید
                                    با کلیک بر روی دکمه
                                    <a href="{{url('orders')}}" class="link-border">پیگیری سفارش</a>
                                    مشاهده نمایید.
                                </div>
                                <div class="parent-btn btn-following-order">
                                    <a href="{{url('orders')}}">
                                        <button class="dk-btn dk-btn-info">
                                            پیگیری سفارش
                                            <i class="fa fa-shopping-bag sign-in"></i>
                                        </button>
                                    </a>
                                </div>
                                @foreach(auth()->user()->address as $address)
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th scope="col">نام تحویل گیرنده: {{auth()->user()->name}}</th>
                                            <th scope="col">شماره تماس : {{auth()->user()->phone_number}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>تعداد مرسوله : 1</td>
                                            <td>مبلغ کل :{{$orders->price}}</td>
                                        </tr>
                                        <tr>
                                            <td>وضعیت پرداخت : پرداخت آنلاین(ناموفق)</td>
                                            <td>وضعیت سفارش : در حال انجام</td>
                                        </tr>
                                        <tr>
                                            <td>آدرس :{{$address->address}}</td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
