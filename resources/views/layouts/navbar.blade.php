<header>
    <aside class="adplacement-top-header">
        <a href="#" class="adplacement-item"></a>
    </aside>
    <div class="container-main">
        <div class="col-lg-8 col-md-8 col-xs-12 pull-right">
            <div class="header-right">
                <div class="logo">
                    @foreach(\App\Models\Setting::get() as $logo)
                    <a href="{{url('/')}}"><img src="{{$logo->logo}}"></a>
                    @endforeach
                </div>
                <div class="col-lg-9 col-md-9 col-xs-12 pull-right">
                    <div class="search-header">
                        <form action="{{url('search')}}">
                            <input type="text" name="search" class="search-input" placeholder="نام کالا مورد نظر خود را جستجو کنید…">
                            <button type="submit" class="button-search">
                                <img src="/assets/images/search.png">
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-12 pull-left">
            <div class="header-left">
                <ul class="nav-lr">
                    <li class="nav-item-account">
                        <a href="#">
                            <img src="/assets/images/user.png" alt="user">
                            @auth
                            {{auth()->user()->name}}
                            @endauth
                            @guest
                            حساب کاربری
                            @endguest
                            <div class="dropdown-menu">
                                <ul>
                                    @if (Route::has('login'))
                                        @auth
                                    <li class="dropdown-menu-item">
                                        <a href="{{ url('/profile') }}" class="dropdown-item">
                                            <i class="mdi mdi-account-card-details-outline"></i>
                                            حساب کاربری من
                                        </a>
                                    </li>
                                    <li class="dropdown-menu-item">
                                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                            <i class="mdi mdi-logout-variant"></i>
                                            خروج از حساب
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                        @endauth
                                    @endif
                                        @guest
                                        <li class="dropdown-menu-item">
                                            <a href="{{ route('register') }}" class="dropdown-item">
                                                <i class="mdi mdi-login-variant"></i>
                                                ثبت نام
                                            </a>
                                        </li>
                                            <li class="dropdown-menu-item">
                                            <a href="{{ route('login') }}" class="dropdown-item">
                                                <i class="mdi mdi-login-variant"></i>
                                                ورود
                                            </a>
                                        </li>
                                        @endguest
                                </ul>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="overlay-search-box"></div>
    </div>
    <!--        menu------------------------------->
    <nav class="main-menu">
        <div class="container-main">
            <div>
                <ul class="list-menu">
                    @foreach(\Modules\Menu\Entities\Menu::get() as $menu)
                    <li class="item-list-menu megamenu">
                        <a href="{{$menu->link}}" class="list-category">{{$menu->title}}</a>
                        @if($menu->parent == 1)
                            <i class="fa fa-angle-down"></i>
                            <ul class="sub-menu">
                                @include('layouts.list-categories', ['categories'=>\App\Models\Category::where('parent', 0)->get()])
                            </ul>
                        @endif
                    </li>
                    @endforeach
                    <li class="nav-item-account nav-item-cart">
                        <a href="#">
                            <span class="mdi mdi-shopping"></span>
                            سبد خرید
{{--                            <span class="count"> @if($a = \Cookie::get('cart'))) {{ $a->items->count() }} @else 0 @endif </span>--}}
                        </a>
                        <div class="dropdown-menu-cart">
                            <div class="dropdown-header">
                                <a href="#" class="view-cart">مشاهده سبد خرید</a>
                            </div>
                            <div class="wrapper">
                                <div class="scrollbar" id="style-1">
                                    <div class="force-overflow">
                                        <ul class="dropdown-list">
                                            <a href="#">
                                                @foreach(\Cart::all() as $cart)
                                                    @if(isset($cart['product']))
                                                        @php
                                                        $product = $cart['product']
                                                        @endphp
                                                <li class="dropdown-item">
                                                    <div class="title-cart">
                                                        <img src="{{$product->image}}">
                                                        <h3>{{$product->title}}</h3>
                                                        <div class="price">{{$product->price}}
                                                            <span>تومان</span>
                                                        </div>
                                                        <button class="btn-delete" onclick="event.preventDefault();document.getElementById('delete-cart-{{$product->id}}').submit()">
                                                            <span class="mdi mdi-close"></span>
                                                        </button>
                                                        <form action="{{route('cart.destroy',$cart['id'])}}" method="post" id="delete-cart-{{$product->id}}">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                    </div>
                                                </li>
                                                    @endif
                                                @endforeach
                                            </a>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-dropdown">
                                <div class="amount-total-buy">
                                    <div class="price">
                                        @php
                                            $total = Cart::all()->sum(function ($cart){
                                                return $cart['product']->price * $cart['quantity'];
                                            })
                                        @endphp
                                        <span class="total">مبلغ کل خرید :</span>
                                        <span class="toman">{{$total}}
                                            <span>تومان</span>
                                        </span>
                                    </div>
                                </div>
                                <a href="{{url('cart')}}" class="checkout">تسویه حساب</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="nav-btn nav-slider">
            <span class="linee1"></span>
            <span class="linee2"></span>
            <span class="linee3"></span>
        </div>
    </nav>
    <!--        menu------------------------------->

    <!--    menu-responsiver----------------------->
    <nav class="sidebar">
        <div class="nav-header">
            <!--              <img class="pic-header" src="images/header-pic.jpg" alt="">-->
            <div class="header-cover"></div>
            <div class="logo-wrap">
                @foreach(\App\Models\Setting::get() as $logo)
                    <a class="logo-icon" href="{{url('/')}}"><img src="{{$logo->logo}}" width="40"></a>
                @endforeach
            </div>
        </div>
        <ul class="nav-categories ul-base">
            @foreach(\Modules\Menu\Entities\Menu::get() as $menu)
                <li>
                    <a href="{{$menu->link}}" >{{$menu->title}}</a>
                </li>
            @endforeach
        </ul>
    </nav>
    <div class="overlay"></div>
    <!--    menu-responsiver----------------------->

</header>
<div class="nav-categories-overlay"></div>
