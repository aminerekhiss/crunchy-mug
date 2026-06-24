<header class="header shop">
    <style>
        .nav.main-menu.menu.navbar-nav {
            display: flex !important;
            justify-content: center !important;
            width: 100%;
        }
        /* Gradient backgrounds for topnav sections */
        .header .middle-inner {
            background: linear-gradient(to bottom, #f5ecd7 0%, #fff 100%);
        }
        .header .header-inner {
            background: linear-gradient(to bottom, #fff 0%, #f7f7f7 100%);
        }
        .logo img {
            max-width: 120px;
            width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
        }
    </style>

    <!-- Partie du haut -->
    <div class="middle-inner">
        <div class="container-fluid px-4">
            <div class="row align-items-center">

                <!-- Logo -->
                <div class="col-lg-1 col-md-1 col-12 ps-0">
                    <div class="logo">
                        @php
                            $settings = DB::table('settings')->get();
                        @endphp
                        <a href="{{route('home')}}">
                            <img src="@foreach($settings as $data) {{$data->logo}} @endforeach" alt="logo" style="max-width: 120px; width: 100%; height: auto;">
                        </a>
                    </div>
                    <div class="mobile-nav"></div>
                </div>

                <!-- Barre de recherche -->
                <div class="col-lg-6 col-md-7 col-12 d-flex justify-content-start">
                    <form method="POST" action="{{route('product.search')}}" class="d-flex" style="gap: 10px; width: 90%; margin-left: 0;">
                        @csrf
                        <select name="category" class="form-select" style="max-width: 180px; flex-shrink: 0; padding-left: 30px; background-position: 8px center; background-repeat: no-repeat; background-image: url('data:image/svg+xml...'); border-radius: 4px;">
                            <option value="">{{ __('messages.categories') }}</option>
                            @foreach(Helper::getAllCategory() as $cat)
                                <option value="{{$cat->id}}">{{$cat->title}}</option>
                            @endforeach
                        </select>
                        <input name="search" placeholder="{{ __('messages.search_product_placeholder') }}" type="search" class="form-control" style="border-radius: 4px 0 0 4px; flex-grow: 1; height: 38px;">
                        <button class="btn btn-primary" type="submit" style="border-radius: 0 4px 4px 0; height: 38px;">
                            <i class="ti-search"></i>
                        </button>
                    </form>
                </div>

                <!-- Langues, tracking, compte, wishlist, panier -->
                <div class="col-lg-4 col-md-3 col-12">
                    <div class="d-flex align-items-center justify-content-end" style="gap: 40px; white-space: nowrap; font-size: 14px; width: 100%;">

                        <!-- Compte et tracking -->
                        <ul class="list-main d-flex align-items-center mb-0" style="gap: 30px; padding-left: 0; margin-bottom: 0;">
                            <li style="display: flex; align-items: center; gap: 5px;">
                                <i class="ti-location-pin"></i>
                                <a class="topnav-link" href="{{route('order.track')}}">{{ __('messages.track_order') }}</a>
                            </li>
                            @auth
                                @if(Auth::user()->role == 'admin')
                                    <li style="display: flex; align-items: center; gap: 5px;">
                                        <i class="ti-user"></i>
                                        <a class="topnav-link" href="{{route('admin')}}" target="_blank">{{ __('messages.dashboard') }}</a>
                                    </li>
                                @else
                                    <li style="display: flex; align-items: center; gap: 5px;">
                                        <i class="ti-user"></i>
                                        <a class="topnav-link" href="{{route('user')}}" target="_blank">{{ __('messages.my_account') }}</a>
                                    </li>
                                @endif
                                <li style="display: flex; align-items: center; gap: 5px;">
                                    <i class="ti-power-off"></i>
                                    <a class="topnav-link" href="{{route('user.logout')}}">{{ __('messages.logout') }}</a>
                                </li>
                            @else
                                <li style="display: flex; align-items: center; gap: 5px;">
                                    <i class="ti-power-off"></i>
                                    <a class="topnav-link" href="{{route('login.form')}}">{{ __('messages.login') }}</a> /
                                    <a class="topnav-link" href="{{route('register.form')}}">{{ __('messages.register') }}</a>
                                </li>
                            @endauth
                        </ul>

                        <!-- Langues (moved here, before wishlist) -->
                        <ul class="list-main d-flex align-items-center mb-0" style="gap: 25px; padding-left: 0; margin-bottom: 0; font-size: 16px;">
                            @php
                                $langIcons = ['en' => '🇬🇧', 'fr' => '🇫🇷'];
                            @endphp
                            @foreach(['en', 'fr'] as $localeCode)
                                @if(App::getLocale() !== $localeCode)
                                    <li>
                                        <a class="topnav-link" href="{{ url('lang/'.$localeCode) }}" title="{{ $localeCode == 'en' ? 'Anglais' : 'Français' }}" style="font-size: 20px; line-height: 1;">
                                            {!! $langIcons[$localeCode] !!}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>

                        <!-- Wishlist (agrandie) -->
                        <div class="sinlge-bar shopping position-relative" style="font-size: 28px;">
                            <a href="{{route('wishlist')}}" class="single-icon position-relative d-inline-block" style="font-size: 28px;">
                                <i class="fa fa-heart-o"></i>
                                <span class="total-count position-absolute" style="top: -10px; right: -14px; background: #ff6f61; color: white; border-radius: 50%; padding: 4px 9px; font-size: 13px;">
                                    {{Helper::wishlistCount()}}
                                </span>
                            </a>
                        </div>

                        <!-- Panier (agrandi) -->
                        <div class="sinlge-bar shopping position-relative" style="font-size: 30px;">
                            <a href="{{route('cart')}}" class="single-icon position-relative d-inline-block" style="font-size: 30px;">
                                <i class="ti-bag"></i>
                                <span class="total-count position-absolute" style="top: -10px; right: -14px; background: #ff6f61; color: white; border-radius: 50%; padding: 4px 9px; font-size: 13px;">
                                    {{Helper::cartCount()}}
                                </span>
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Navigation principale -->
    <div class="header-inner">
        <div class="container-fluid px-4">
            <div class="cat-nav-head">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="menu-area">
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">
                                    <div class="nav-inner">
                                        <ul class="nav main-menu menu navbar-nav" style="display: flex !important; justify-content: center !important; max-width: 500px; margin: 0 auto;">
                                            <li class="{{Request::path()=='home' ? 'active' : ''}}"><a class="topnav-link" href="{{route('home')}}">{{ __('messages.home') }}</a></li>
                                            <li class="{{Request::path()=='about-us' ? 'active' : ''}}"><a class="topnav-link" href="{{route('about-us')}}">{{ __('messages.about_us') }}</a></li>
                                            <li class="@if(Request::path()=='product-grids'||Request::path()=='product-lists')  active  @endif">
                                                <a class="topnav-link" href="{{route('product-grids')}}">{{ __('messages.products') }}</a>
                                                <span class="new">{{ __('messages.new') }}</span>
                                            </li>
                                            
                                            <li class="{{Request::path()=='blog' ? 'active' : ''}}"><a class="topnav-link" href="{{route('blog')}}">{{ __('messages.blog') }}</a></li>
                                            <li class="{{Request::path()=='contact' ? 'active' : ''}}"><a class="topnav-link" href="{{route('contact')}}">{{ __('messages.contact') }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
