@component('layouts.content')
    <article class="container-main">
        <div class="page-row-main-top">
            <div class="col-lg-8 col-md-8 col-xs-12 pull-right">
                <div class="main-slider-container">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach(\App\Models\Slider::all() as $slider)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{$slider->id}}" class="{{$loop->first ? 'active' : ''}}"></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach(\App\Models\Slider::all() as $slider)
                            <div class="carousel-item {{$loop->first ? 'active' : ''}}">
                                <a href="{{$slider->id}}">
                                    <img class="d-block w-100" src="{{$slider->image}}" alt="First slide">
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <!--    slider--------------------------------->
            <!--adplacement-------------------------------->
            <div class="col-lg-4 col-md-4 col-xs-12 pull-left">
                <aside class="adplacement-container-column">
                    @foreach(\App\Models\Banner::all()->take(2) as $banner)
                    <a href="{{$banner->link}}" class="adplacement-item adplacement-item-column">
                        <div class="adplacement-sponsored-box">
                            <img src="{{$banner->image}}">
                        </div>
                    </a>
                    @endforeach
                </aside>
            </div>
        </div>
        <!--adplacement-------------------------------->

        <!--    product-slider------------------------->
        <div class="col-lg-9 col-md-9 col-xs-12 pull-right">
            <div class="section-slider-product mb-4 mt-3">
                <div class="widget widget-product card">
                    <header class="card-header">
                        <span class="title-one">محبوب ترین ها</span>
                        <a href="{{url('products')}}"><h3 class="card-title">مشاهده همه</h3></a>
                    </header>
                    <div class="product-carousel owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2234px;">
                                @foreach($products->take(8) as $product)
                                <div class="owl-item active" style="width: 309.083px; margin-left: 10px;">
                                    <div class="item">
                                        <a href="{{route('product.detail',$product->id)}}">
                                            <div class="stars-plp">
                                                <span class="mdi mdi-star active"></span>
                                                <span class="mdi mdi-star active"></span>
                                                <span class="mdi mdi-star active"></span>
                                                <span class="mdi mdi-star active"></span>
                                                <span class="mdi mdi-star active"></span>
                                            </div>
                                            <img src="{{$product->image}}" class="img-fluid" alt="">
                                        </a>
                                        <h2 class="post-title">
                                            <a href="{{route('product.detail',$product->id)}}">
                                                {{$product->title}}
                                            </a>
                                        </h2>
                                        <div class="price">
                                            <ins>
                                                <span>{{$product->price}}<span>تومان</span></span>
                                            </ins>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--    product-slider------------------------->
        <!--slider-sidebar----------------------------->
        <div class="col-lg-3 col-md-3 col-xs-12 pull-left">
            <div class="promo-single mb-4 mt-3">
                <div class="widget-suggestion widget card">
                    <header class="card-header cart-sidebar">
                        <h3 class="card-title ts-3">پیشنهادهای لحظه‌ای</h3>
                    </header>
                    <div id="progressBar">
                        <div class="slide-progress" style="width: 100%; transition: width 5000ms ease 0s;"></div>
                    </div>
                    <div id="suggestion-slider" class="owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                        <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(1369px, 0px, 0px); transition: all 0.25s ease 0s; width: 2190px;">
                                @foreach($products->chunk(2) as $row)
                                @foreach($row as $product)
                                <div class="owl-item cloned" style="width: 273.75px;">
                                    <div class="item">
                                        <a href="{{route('product.detail',$product->id)}}">
                                            <img src="{{$product->image}}" class="w-100" alt="">
                                        </a>
                                        <h3 class="product-title">
                                            <a href="{{route('product.detail',$product->id)}}">  {{$product->title}} </a>
                                        </h3>
                                        <div class="price">
                                            <span class="new-price-discount">%10</span>
                                            <span class="amount">{{$product->price}}<span>تومان</span></span>
                                            <div class="stars-plp">
                                                <span class="mdi mdi-star active"></span>
                                                <span class="mdi mdi-star active"></span>
                                                <span class="mdi mdi-star active"></span>
                                                <span class="mdi mdi-star active"></span>
                                                <span class="mdi mdi-star active"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endforeach
                            </div>
                        </div>
                        <div class="owl-nav disabled">
                            <button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span>
                            </button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button>
                        </div>
                        <div class="owl-dots disabled"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--slider-sidebar----------------------------->

        <!--        category--------------------------->
        <div class="col-12">
            <div class="promotion-categories-container mb-4">
                <span class="promotion-categories-title"> کالا در دسته‌بندی‌های مختلف</span>
                <div class="category-container">
                    <div class="promotion-categories">
                        @foreach(\App\Models\Category::get()->take(9) as $category)
                        <a href="{{route('product.category',$category->id)}}" class="promotion-category">
                            <img src="{{$category->image}}">
                            <div class="promotion-category-name">{{$category->name}}</div>
                            <div class="promotion-category-quantity">{{count($category->products)}} کالا</div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!--        category--------------------------->

        <!--    adplacemen-container----------------------------->
        <div class="col-12">
            <div class="adplacement-container-row mb-4">
                @foreach(\App\Models\Banner::latest()->get()->take(2) as $banner)
                <div class="col-6 col-lg-6 pull-right" style="padding-left:0;">
                    <a href="{{$banner->link}}" class="adplacement-item">
                        <div class="adplacement-sponsored-box">
                            <img src="{{$banner->image}}">
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        <!--    adplacemen-container----------------------------->

        <!--    product-slider----------------------------------->
        <div class="col-lg-12 col-md-12 col-xs-12 pull-right">
            <div class="section-slider-product mb-4">
                <div class="widget widget-product card">
                    <header class="card-header">
                        <span class="title-one">محبوب ترین ها</span>
                        <a href="{{url('products')}}"><h3 class="card-title">مشاهده همه</h3></a>
                    </header>
                    <div class="product-carousel owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2234px;">
                                @foreach($products->take(9) as $product)
                                <div class="owl-item active" style="width: 309.083px; margin-left: 10px;">
                                    <div class="item">
                                        <a href="{{route('product.detail',$product->id)}}">
                                            <img src="{{$product->image}}" class="img-fluid" alt="">
                                        </a>
                                        <h2 class="post-title">
                                            <a href="{{route('product.detail',$product->id)}}">
                                                {{$product->title}}
                                            </a>
                                        </h2>
                                        <div class="price">
                                            <ins>
                                                <span>{{$product->price}}<span>تومان</span></span>
                                                <div class="stars-plp">
                                                    <span class="mdi mdi-star active"></span>
                                                    <span class="mdi mdi-star active"></span>
                                                    <span class="mdi mdi-star active"></span>
                                                    <span class="mdi mdi-star active"></span>
                                                    <span class="mdi mdi-star active"></span>
                                                </div>
                                            </ins>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--    product-slider------------------------->

        <!--   arrivals-product------------------------>
        <div class="col-12">
            <div class="arrivals-product">
                <div class="main-product-tab-area">
                    <div class="tab-content">
                        <section class="main-content">
                            <ul class="content-area">
                                <li class="item-content" style="display:block;">
                                    <a href="#" class="link-content">
                                        @foreach($products->take(9) as $product)
                                        <div class="col-lg-3 col-md-4 col-xs-12 pull-right mb-3">
                                            <div class="product-vertical">
                                                <div class="vertical-product-thumb">
                                                    <a href="{{route('product.detail',$product->id)}}">
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
                                                        <div class="stars-plp">
                                                            <span class="mdi mdi-star active"></span>
                                                            <span class="mdi mdi-star active"></span>
                                                            <span class="mdi mdi-star active"></span>
                                                            <span class="mdi mdi-star active"></span>
                                                            <span class="mdi mdi-star"></span>
                                                        </div>
                                                    </div>
                                                    <div class="product-actions-secondary">
                                                        <div class="heart" title="افزودن به لیست علاقه مندی">
                                                            <span class="mdi mdi-heart"></span>
                                                        </div>
{{--                                                        <div class="product-introduction-cart" title="افزودن به سبد خرید">--}}
{{--                                                            <span class="c-introduction">--}}
{{--                                                                افزودن به سبد خرید--}}
{{--                                                            </span>--}}
{{--                                                        </div>--}}
{{--                                                        @if(Cart::count($product) < $product->inventory)--}}
                                                            <div class="product-introduction-cart" title="افزودن به سبد خرید">
                                                                <a href="{{route('product.detail',$product->id)}}">
                                                                <span class="c-introduction text-light">مشاهده محصول</span>
                                                                </a>
                                                            </div>
{{--                                                        @endif--}}
                                                        <div class="comparison" title="افزودن برای مقایسه">
                                                            <i class="fa fa-random" aria-hidden="true"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </a>
                                </li>
                            </ul>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <!--   arrivals-product------------------------>

        <!--    adplacemen-container----------------------------->
        <div class="col-12">
            <div class="adplacement-container-row mb-4">
                @foreach(\App\Models\Banner::latest()->get()->take(2) as $banner)
                    <div class="col-6 col-lg-6 pull-right" style="padding-left:0;">
                        <a href="{{$banner->link}}" class="adplacement-item">
                            <div class="adplacement-sponsored-box">
                                <img src="{{$banner->image}}">
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <!--    adplacemen-container----------------------------->

        <!--    product-slider------------------------->
        <div class="col-lg-12 col-md-12 col-xs-12 pull-right">
            <div class="section-slider-product mb-4">
                <div class="widget widget-product card">
                    <header class="card-header">
                        <span class="title-one">محبوب ترین ها</span>
                        <a href="{{url('products')}}"><h3 class="card-title">مشاهده همه</h3></a>
                    </header>
                    <div class="product-carousel owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2234px;">
                                @foreach($products as $product)
                                <div class="owl-item active" style="width: 309.083px; margin-left: 10px;">
                                    <div class="item">
                                        <a href="{{route('product.detail',$product->id)}}">
                                            <img src="{{$product->image}}" class="img-fluid" alt="">
                                        </a>
                                        <h2 class="post-title">
                                            <a href="{{route('product.detail',$product->id)}}">
                                                {{$product->title}}
                                            </a>
                                        </h2>
                                        <div class="price">
                                            <ins>
                                                <span>{{$product->price}}<span>تومان</span></span>
                                                <div class="stars-plp">
                                                    <span class="mdi mdi-star active"></span>
                                                    <span class="mdi mdi-star active"></span>
                                                    <span class="mdi mdi-star active"></span>
                                                    <span class="mdi mdi-star active"></span>
                                                    <span class="mdi mdi-star active"></span>
                                                </div>
                                            </ins>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--    product-slider------------------------->
    </article>
@endcomponent
