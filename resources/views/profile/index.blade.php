@component('layouts.content')
    <div class="container-main">
        <div class="col-12">
            <div class="breadcrumb-container">
                <ul class="js-breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{url('/')}}" class="breadcrumb-link">خانه</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{url('profile')}}" class="breadcrumb-link active-breadcrumb">پروفایل</a>
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
                                <a href="{{url('profile')}}" class="profile-menu-url active-profile">
                                    <span class="mdi mdi-account-outline"></span>
                                    پروفایل</a>
                            </li>
                            <li>
                                <a href="{{url('orders')}}" class="profile-menu-url">
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
                <div class="profile-content">
                    <div class="headline-profile">
                        <span>اطلاعات شخصی</span>
                    </div>
                    <div class="profile-stats">
                        <div class="profile-stats-row">
                            <div class="col-lg-6 col-md-6 col-xs-12 pull-right">
                                <div class="profile-stats-col">
                                    <div class="profile-stats-content">
                                        <span class="profile-first-title"> نام و نام خانوادگی :</span>
                                        <span class="profile-second-title">{{auth()->user()->name}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12 pull-right">
                                <div class="profile-stats-col">
                                    <div class="profile-stats-content">
                                        <span class="profile-first-title"> پست الکترونیک :</span>
                                        <span class="profile-second-title">{{auth()->user()->email}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12 pull-right">
                                <div class="profile-stats-col">
                                    <div class="profile-stats-content">
                                        <span class="profile-first-title"> شماره تلفن همراه :</span>
                                        <span class="profile-second-title">{{auth()->user()->phone_number}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-stats-action">
                                <a href="#" class="link-spoiler-edit"><i class="fa fa-pencil"></i>ویرایش اطلاعات شخصی</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endcomponent
