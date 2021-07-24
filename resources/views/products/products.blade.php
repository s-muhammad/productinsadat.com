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
                        <a href="{{route('products.list')}}" class="breadcrumb-link active-breadcrumb">محصولات</a>
                    </li>
{{--                    <li class="breadcrumb-item">--}}
{{--                        <a href="#" class="breadcrumb-link active-breadcrumb">لباس مردانه</a>--}}
{{--                    </li>--}}
                </ul>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-12 pull-right">
            <section class="page-aside">
                <div class="sidebar-wrapper">
                    <div class="listing-sidebar mb-4">
                        <div class="box-header-product-feature mb-3">
                            <span class="title-product">فیلتر محصولات</span>
                        </div>
                        <div class="box">
                            <div class="box-header">
                                <h2 class="mb-0">
                                    <button class="btn btn-block text-right" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true" aria-controls="collapseExample">
                                        دسته بندی
                                        <i class="mdi mdi-chevron-down"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseExample" class="collapse show" style="">
                                <div class="card-main mb-3">
                                    @foreach(\App\Models\Category::where('parent',0)->get() as $cat)
                                        <ul>
                                            <li><a href="{{route('product.category',$cat->id)}}">{{$cat->name}}</a></li>
                                        </ul>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-9 col-md-8 col-xs-12 pull-left">
            <div class="page-contents">
                <article class="listing-wrapper-tab">
                    <ul class="listing-items">
                        <li style="display:block">
                            @foreach($products as $product)
                                <div class="col-lg-4 col-md-4 col-xs-12 pull-right mb-3">
                                    <div class="product-vertical">
                                        <div class="vertical-product-thumb">
                                            <a href="{{route('product.detail',$product->id)}}">
                                                <div class="stars-plp">
                                                    <span class="mdi mdi-star active"></span>
                                                    <span class="mdi mdi-star active"></span>
                                                    <span class="mdi mdi-star active"></span>
                                                    <span class="mdi mdi-star active"></span>
                                                    <span class="mdi mdi-star"></span>
                                                </div>
                                                <img src="{{$product->image}}">
                                            </a>
                                        </div>
                                        <div class="card-vertical-product-content">
                                            <div class="card-vertical-product-title">
                                                <a href="{{route('product.detail',$product->id)}}">
                                                    {{$product->title}}
                                                </a>
                                            </div>
                                            <div class="card-vertical-product-price">
                                                {{$product->price}}
                                                <span class="price-currency">تومان</span>
                                            </div>
                                            <div class="product-actions-secondary">
                                                <div class="heart" title="افزودن به لیست علاقه مندی">
                                                    <span class="mdi mdi-heart"></span>
                                                </div>
                                                @if(Cart::count($product) < $product->inventory)
                                                    <div class="product-introduction-cart" title="افزودن به سبد خرید">
                                                        <a href="{{route('product.detail',$product->id)}}">
                                                            <span class="c-introduction text-light">مشاهده محصول</span>
                                                        </a>
                                                    </div>
                                                @else
                                                    <div class="product-introduction-cart" style="background: gray !important;">
                                                        <span class="c-introduction">
                                                            ناموجود
                                                        </span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </li>
                    </ul>
                </article>
            </div>
        </div>
    </div>
@endsection
