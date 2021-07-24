@extends('master')
@section('main')
    <div class="container-main">
        <div class="col-12">
            <div class="breadcrumb-container">
                <ul class="js-breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{url('/')}}" class="breadcrumb-link">خانه</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{url('profile')}}" class="breadcrumb-link">حساب کاربری من</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{url('orders')}}" class="breadcrumb-link active-breadcrumb">همه سفارش ها</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-xs-12 pull-right">
            <section class="page-aside">
                <div class="sidebar-wrapper">
                    <div class="box-sidebar">
                        <span class="box-header-sidebar">حساب کاربری شما</span>
                        <ul class="profile-menu-items">
                            <li>
                                <a href="{{url('profile')}}" class="profile-menu-url">
                                    <span class="mdi mdi-account-outline"></span>
                                    پروفایل</a>
                            </li>
                            <li>
                                <a href="{{url('orders')}}" class="profile-menu-url active-profile">
                                    <span class="fa fa-shopping-basket"></span>
                                    همه سفارش ها</a>
                            </li>
                            <li>
                                <a href="{{route('user.address')}}" class="profile-menu-url">
                                    <span class="mdi mdi-map"></span>
                                    آدرس ها</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-9 col-md-9 col-xs-12 pull-left">
            <section class="page-contents">
                @foreach($orders as $order)
                <div class="profile-content">
                    <div class="headline-profile">
                        <span>جزئیات سفارش‌ها</span>
                    </div>
                    <div class="profile-stats">
                        <div class="profile-stats-row">
                            <div class="profile-stats page-profile-order">
                                <div class="table-orders">
                                    <table class="table">
                                        <thead class="thead-light">
                                        <tr>
                                            <th scope="col">شماره سفارش</th>
                                            <th scope="col">تاریخ ثبت سفارش</th>
                                            <th scope="col">وضعیت پرداخت</th>
                                            <th scope="col">جزئیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="order-code">{{$order->id}}</td>
                                            <td>{{jdate($order->created_at)->format('%d %B %Y')}}</td>
                                            <td>
                                            @switch($order->status)
                                                @case('paid')
                                                پرداخت شده
                                                @break
                                                @case('unpaid')
                                                پرداخت نشده
                                                @break
                                                @case('posted')
                                                ارسال شده
                                                @break
                                                @case('received')
                                                تحویل داده شده
                                                @break
                                                @case('preparation')
                                                در حال پردازش
                                                @break
                                                @case('canceled')
                                                لغو شده
                                                @break
                                            @endswitch
                                            </td>
                                            <td class="detail">
                                                <a class="text-center" href="{{route('order.detail',$order->id)}}" style="display:block;">
                                                    <i class="fa fa-angle-left"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--        responsive-profile-order------------------------->
                    <div class="profile-orders">
                        <div class="collapse-orders">
                            <div class="profile-orders-item">
                                <div class="profile-orders-header">
                                    <a href="profile-order-2.html" class="profile-orders-header-details">
                                        <div class="profile-orders-header-summary">
                                            <div class="profile-orders-header-row">
                                                <span class="profile-orders-header-id">{{$order->id}}</span>
                                                <span class="profile-orders-header-state">{{$order->status}}</span>
                                            </div>
                                        </div>
                                    </a>
                                    <hr class="ui-separator">
                                    <div class="profile-orders-header-data">
                                        <div class="profile-info-row">
                                            <div class="profile-info-label">تاریخ ثبت سفارش</div>
                                            <div class="profile-info-value">{{jdate($order->created_at)->format('%d %B %Y')}}</div>
                                        </div>
                                        <div class="profile-info-row">
                                            <div class="profile-info-label">مبلغ قابل پرداخت</div>
                                            <div class="profile-info-value">0</div>
                                        </div>
                                        <div class="profile-info-row">
                                            <div class="profile-info-label">مبلغ کل</div>
                                            <div class="profile-info-value">۳,۲۹۷,۰۰۰</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--        responsive-profile-order------------------------->
                </div>
                @endforeach
            </section>
        </div>
    </div>
@endsection
