<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content="{{csrf_token()}}" name="csrf-token">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'/>
{!! SEO::generate() !!}
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
    <!--    bootstrap-slider------------------------>
    <link rel="stylesheet" href="assets/css/bootstrap-slider.min.css">
@yield('style')

</head>
<body>
<!--header------------------------------------->
@include('layouts.navbar')
<!--header------------------------------------->
<!--    slider--------------------------------->
@yield('main')
<!--footer------------------------------------->
@include('layouts.footer')
<!--footer------------------------------------->

</body>
<!--jquery--------------------------------------->
<script src="/assets/js/jquery-3.2.1.min.js"></script>
<!--    bootstrap-------------------------------->
<script src="/assets/js/bootstrap.js"></script>
<!--    owl.carousel----------------------------->
<script src="/assets/js/owl.carousel.min.js"></script>
<!--main----------------------------------------->
<script src="/assets/js/main.js"></script>
<!--bootstrap-slider----------------------------->
<script src="/assets/js/bootstrap-slider.min.js"></script>
{{--<script src="{{ asset('js/app.js') }}"></script>--}}
@yield('script')
{{--@include('sweet::alert')--}}
</html>
