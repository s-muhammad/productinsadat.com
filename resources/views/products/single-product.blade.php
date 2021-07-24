@extends('master')
@section('script')
<script>
    $('#size').change(function () {
        var x = $('#size').find(":selected").text();
        $('#input_size').val(x);
    });
    $('#color').change(function () {
        var y = $('#color').find(":selected").text();
        $('#input_color').val(y);
    });
</script>
@endsection
@section('main')
    <div class="container-main">
        <div class="col-12">
            <div class="breadcrumb-container">
                <ul class="js-breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{url('/')}}" class="breadcrumb-link">خانه</a>
                    </li>
                    <li class="breadcrumb-item">
                            @foreach($product->categories as $cat)
                            <a href="{{route('product.category',$cat->id)}}" class="breadcrumb-link">
                            {{$cat->name}}
                            </a>
                        @endforeach
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" class="breadcrumb-link active-breadcrumb">{{$product->title}}</a>
                    </li>
                </ul>
            </div>
            <article class="product">
                <div class="col-lg-4 col-xs-12 pb-5 pull-right">
                    <div class="product-gallery">
                        <span class="badge">پر فروش</span>
                        <div class="product-gallery-carousel owl-carousel">
                            @foreach($images as $image)
                            <div class="item">
                                <a class="gallery-item" href="{{$image->image}}"
                                   data-fancybox="gallery1" data-hash="{{$image->id}}">
                                    <img src="{{$image->image}}" alt="{{$image->alt}}">
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <ul class="product-thumbnails">
                            @foreach($images as $image)
                            <li class="{{ $loop->first ? 'active' : '' }}">
                                <a href="#{{$image->id}}">
                                    <img src="{{$image->image}}" alt="{{$image->alt}}">
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 col-xs-12 pull-right">
                    <section class="product-info">
                        <div class="product-headline">
                            <h1 class="product-title">
                                {{$product->title}}
                            </h1>
                        </div>
                        <div class="product-attributes">
                            <div class="col-lg-6 col-xs-12 pull-right">
                                <div class="product-config">
                                    <div class="product-config-wrapper">
                                        <div class="product-directory">
                                            <ul>
                                                <li>
                                                    <span>دسته بندی ها</span>
                                                    :<br>
                                                    @foreach($product->categories as $cat)
                                                    <a href="{{route('product.category',$cat->id)}}" class="product-brand-title">{{$cat->name}}</a><br>
                                                    @endforeach
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product-variants">
                                            <span>انتخاب رنگ: </span>
                                            <div class="form-legal-item">
                                                <select name="color" id="color" class="ui-select-field form-control">
                                                    <option>انتخاب کنید</option>
                                                @foreach($product->colors as $color)
                                                    <option value="{{$color->id}}">{{$color->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="product-variants">
                                            <span>انتخاب سایز: </span>
                                            <div class="form-legal-item">
                                                <select name="size" id="size" class="ui-select-field form-control">
                                                    <option>انتخاب کنید</option>
                                                    @foreach($product->sizes as $size)
                                                    <option value="{{$size->id}}" >{{$size->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="product-params">
                                            <ul>ویژگی‌های محصول
                                                @if($product->attributes)
                                                    @foreach($product->attributes->all() as $attr)
                                                        <li class="{{ $loop->odd ? 'product-params-more' : '' }}">
                                                            <span> {{$attr->name}}: </span>
                                                            <span>{{$attr->pivot->value->value}}</span>
                                                        </li>
                                                    @endforeach
                                                @endif
                                                <li class="product-params-more-handler">
                                                    <a href="#" class="more-attr-button">
                                                        <span class="show-more">+ موارد بیشتر</span>
                                                        <span class="show-less">- بستن</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-xs-12 pull-left">
                                <div class="product-summary">
                                    <div class="product-seller-info">
                                        <div class="seller-info-changable">
                                            <div class="product-seller-row guarantee">
                                                <span class="title"> موجودی:</span>
                                                <a href="#" class="product-name">{{$product->inventory}}</a>
                                            </div>
                                            <div class="product-seller-row price">
                                                <div class="product-seller-price-info price-value mb-3">
                                                    <span class="title"> قیمت:</span>
                                                    <span class="amount text-danger">
                                                        {{$product->price}}
                                                        <span>تومان</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="parent-btn">
                                                @if(Cart::count($product) < $product->inventory)
                                                    <form action="{{route('cart.add',$product->id)}}" method="post" id="cart-add-{{$product->id}}">
                                                        @csrf
                                                        <input value="" id="input_size" name="input_size" type="hidden">
                                                        <input value="" id="input_color" name="input_color" type="hidden">
                                                    </form>
                                                    <button class="dk-btn dk-btn-info at-c as-c" onclick="document.getElementById('cart-add-{{$product->id}}').submit()">
                                                        افزودن به سبد خرید
                                                        <i class="mdi mdi-cart"></i>
                                                    </button>
                                                @else
                                                    <button class="dk-btn dk-btn-info product-stock-action">
                                                        موجود شد به من اطلاع بده
                                                        <i class="fa fa-bell"></i>
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </article>
        </div>
        <!--    comment------------------------->
        <div class="col-12">
            <div class="tabs mt-4 pt-3 mb-5">
                <div class="tabs-product">
                    <div class="tab-wrapper">
                        <ul class="box-tabs">
                            <li class="box-tabs-tab tabs-active">
                                <a href="#" class="box-tab-item">
                                    <i class="mdi mdi-glasses"></i>
                                    توضیحات</a>
                            </li>
                            <li class="box-tabs-tab">
                                <a href="#" class="box-tab-item">
                                    <i class="mdi mdi-comment-text-multiple-outline"></i>
                                    نظرات کاربران</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tabs-content">
                        <div class="content-expert">
                            <section class="tab-content-wrapper" style="display:block;">
                                <article>
                                    <h2 class="params-headline">توضیحات
                                        <span>{{$product->title}}</span>
                                    </h2>
                                    <section class="content-expert-summary">
                                        <div class="mask pm-3">
                                            <div class="mask-text">
                                                {!! $product->description !!}
                                            </div>
                                            <a href="#" class="mask-handler">
                                                <span class="show-more">+ ادامه مطلب</span>
                                                <span class="show-less">- بستن</span>
                                            </a>
                                            <div class="shadow-box"></div>
                                        </div>
                                    </section>
                                </article>
                            </section>
                            <section class="tab-content-wrapper">
                                <div class="comments">
                                    <h2 class="comments-headline">امتیاز کاربران به:
                                        <span>
                                           {{$product->title}}
                                        </span>
                                    </h2>
                                    <div class="comments-summary">
                                        <div class="comments-summary-box">
                                            <ul class="comments-item-rating">
                                                <li>
                                                    <div class="cell">کیفیت ساخت:</div>
                                                    <div class="cell">
                                                        <div class="rating-general" data-rate-digit="خوب">
                                                            <div class="rating-rate" style="width:75%;"></div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="cell">ارزش خرید به نسبت قیمت:</div>
                                                    <div class="cell">
                                                        <div class="rating-general" data-rate-digit="خوب">
                                                            <div class="rating-rate" style="width:70%;"></div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="cell">طراحی و ظاهر:</div>
                                                    <div class="cell">
                                                        <div class="rating-general" data-rate-digit="خوب">
                                                            <div class="rating-rate" style="width:85%;"></div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="comments-summary-note">
                                            <p>
                                                برای ثبت نظر، لازم است ابتدا وارد حساب کاربری خود شوید.
                                            </p>
                                            <div class="parent-btn lr-ds">
                                            @auth
                                                <button class="dk-btn dk-btn-info" data-toggle="modal" data-target="#exampleModal">
                                                    افزودن نظر جدید
                                                    <i class="mdi mdi-comment-text-multiple-outline"></i>
                                                </button>
                                            @endauth
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @foreach($product->comments()->where('approved',1)->get() as $comment)
                                <section class="comment-body">
                                    <div class="col-lg-12 pull-right">
                                        <div class="aside">
                                            <ul class="comments-user-shopping pt-1">
                                                <li class="mb-3">
                                                    <div class="cell cell-name">{{$comment->user->name}}</div>
                                                </li>
                                                <li>
                                                    <div class="cell">
                                                        {{Jdate($comment->created_at)->ago()}}
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 pull-left">
                                        <div class="article">
                                            <p>{{$comment->comment}}</p>
                                        </div>
                                    </div>
                                </section>
                                @endforeach
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--    related----------------------------------->
        <div class="col-lg-12 col-md-12 col-xs-12 pull-right">
            <div class="section-slider-product mb-4">
                <div class="widget widget-product card">
                    <header class="card-header">
                        <span class="title-one">محصولات مرتبط</span>
                        <a href="{{route('products.list')}}">
                            <h3 class="card-title">مشاهده همه</h3>
                        </a>
                    </header>
                    <div class="product-carousel owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2234px;">
                                @foreach(\App\Models\Product::latest()->get()->take(8) as $product)
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
                        <div class="owl-nav"><button type="button" role="presentation" class="owl-prev disabled"><i class="fa fa-angle-right"></i></button><button type="button" role="presentation" class="owl-next"><i class="fa fa-angle-left"></i></button></div><div class="owl-dots disabled">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ثبت دیدگاه جدید</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('send.comment')}}" method="post" id="sendComment">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="commentable_id" value="{{$product->id}}">
                        <input type="hidden" name="commentable_type" value="{{get_class($product)}}">
                        <input type="hidden" name="parent_id" value="0">
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">متن نظر</label>
                            <textarea name="comment" class="form-control" id="message-text"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">ارسال</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('style')
    <!--    fancybox-------------------------------->
    <link rel="stylesheet" href="/assets/css/fancybox.min.css">
@endsection
@section('script')
    <!--fancybox------------------------------------->
    <script src="/assets/js/jquery.fancybox.min.js"></script>
    <!--countdown------------------------------------>
    <script src="/assets/js/jquery.countdown.min.js"></script>
@endsection
