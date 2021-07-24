@component('layouts.content')
    <div class="container-main">
        <div class="col-12">
            <div class="breadcrumb-container">
                <ul class="js-breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{url('/')}}" class="breadcrumb-link">خانه</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{url('profile')}}" class="breadcrumb-link">پروفایل</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{url('user.address')}}" class="breadcrumb-link active-breadcrumb">آدرس کاربر</a>
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
                                <a href="{{url('orders')}}" class="profile-menu-url">
                                    <span class="fa fa-shopping-basket"></span>
                                    همه سفارش ها</a>
                            </li>
                            <li>
                                <a href="{{route('user.address')}}" class="profile-menu-url active-profile">
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
                <div class="profile-content">
                    <div class="headline-profile">
                        <span>آدرس ها</span>
                    </div>
                    <div class="profile-stats">
                        <div class="grid">
                            <div id="address-section">
{{--                                <div class="profile-address-container mt-3">--}}
{{--                                    <button class="profile-address-add" data-toggle="modal" data-target="#exampleModalCenter">--}}
{{--                                        <i class="fa fa-map-marker" aria-hidden="true"></i>--}}
{{--                                        افزودن آدرس جدید--}}
{{--                                    </button>--}}
{{--                                </div>--}}
                                <div class="profile-address-container user-address-container">
                                    <div class="profile-address-card">
                                        <div class="profile-address-card-desc">
                                            <h4 class="js-address-full-name">{{auth()->user()->name}}</h4>
                                            <p class="checkout-address-text">
                                                @foreach(auth()->user()->address as $address)
                                                    <span class="js-address-address-part">
                                                        {{$address->address}}
                                                    </span>
                                                @endforeach
                                            </p>
                                        </div>
                                        <div class="profile-address-card-data">
                                            <ul class="profile-address-card-methods">
                                                <li class="profile-address-card-method">
                                                    <i class="fa fa-envelope-o"></i>
                                                    کدپستی :
                                                    @foreach(auth()->user()->address as $address)
                                                    <span class="js-address-post-code">
                                                            {{$address->postal_code}}
                                                        </span>
                                                    @endforeach
                                                </li>
                                                <li class="profile-address-card-method">
                                                    <i class="fa fa-mobile"></i>
                                                    تلفن همراه :
                                                    <span class="js-address-post-code">
                                                            {{auth()->user()->phone_number}}
                                                        </span>
                                                </li>
                                            </ul>
{{--                                            <div class="profile-address-card-actions">--}}
{{--                                                <button class="btn-note js-remove-address-btn">حذف</button>--}}
{{--                                                <button class="btn-note js-edit-address-btn" data-toggle="modal" data-target="#exampleModalCenter">ویرایش</button>--}}
{{--                                            </div>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endcomponent
