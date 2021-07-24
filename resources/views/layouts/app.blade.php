<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <title>login</title>
    <!--    font------------------------------------>
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/materialdesignicons.css">
    <link rel="stylesheet" href="/assets/css/materialdesignicons.css.map">
    <!--    bootstrap------------------------------->
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <!--    owl.carousel---------------------------->
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <!--    responsive------------------------------>
    <link rel="stylesheet" href="/assets/css/responsive.css">
    <!--    main style------------------------------>
    <link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>
<!--page-login-------------------------->
<div class="container-main">
    <div class="col-12">
        <div class="semi-modal-layout">
            <section class="page-account-box">
                <div class="col-lg-7 col-md-7 col-xs-12 mx-auto">
                    <div class="account-box">
                        @foreach(\App\Models\Setting::all() as $setting)
                        <a href="{{url('/')}}" class="account-box-logo" style="background: url({{$setting->logo}}) no-repeat;">پوشاک سادات</a>
                        @endforeach
                        @include('layouts.errors')
                        @yield('content')
                    </div>
                </div>
            </section>
            <footer class="footer-light">
                <div class="container">
                    <p class="copy-right-footer-light">Copyright © 2021 ProductionSadat.com</p>
                </div>
            </footer>
        </div>
    </div>
</div>

<!--page-login-------------------------->
</body>
<!--jquery--------------------------------------->
<script src="/assets/js/jquery-3.2.1.min.js"></script>
<!--    bootstrap-------------------------------->
<script src="/assets/js/bootstrap.js"></script>
<!--    owl.carousel----------------------------->
<script src="/assets/js/owl.carousel.min.js"></script>
<!--main----------------------------------------->
<script src="/assets/js/main.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
@include('sweet::alert')
</html>
