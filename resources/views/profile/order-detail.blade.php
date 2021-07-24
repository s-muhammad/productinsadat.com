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
                <div class="col-xs-12">
                    <div class="profile-stats profile-order">
                        <div class="table-draught">
                            <div class="table-draught-row">
                                <div class="table-draught-col">
                                    کد سفارش: PSOC-{{$order->id}}
                                </div>
                                <div class="table-draught-col">زمان
                                    تحویل: 3 تا 5 روز
                                </div>
                            </div>
                            <div class="table-draught-row">
                                <div class="table-draught-col">نحوه ارسال سفارش: پست پیشتاز
                                </div>
                                <div class="table-draught-col">هزینه ارسال
                                    : ۸,۰۰۰ تومان
                                </div>
                            </div>
                        </div>
                        <div class="table-orders">
                            <table class="table">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">تعداد</th>
                                    <th scope="col">قیمت واحد</th>
                                    <th scope="col">قیمت کل</th>
                                    <th scope="col">تخفیف</th>
                                    <th scope="col">قیمت نهایی</th>
                                    <th scope="col">عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order->products as $pro)
                                    <tr>
                                        <td>
                                            <img src="{{$pro->image}}" style="width:100px; float:right;">
                                            <h3>{{$pro->title}}</h3>
                                        </td>
                                        <td class="order-code">{{$pro->pivot->quantity}}</td>
                                        <td>{{$pro->price}}</td>
                                        <td>{{$pro->pivot->quantity * $pro->price}}  تومان</td>
                                        <td>0</td>
                                        <td>{{$pro->pivot->quantity * $pro->price}}  تومان</td>
                                        @if($order->status == 'unpaid')
                                        <td class="detail">
                                            <a href="{{route('order.payment',$order->id)}}" class="btn btn-sm btn-info">پرداخت</a>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
