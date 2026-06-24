@extends('frontend.layouts.master')

@section('title', __('messages.crunchy_mug'))

@section('main-content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">{{ __('messages.home') }}<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">{{ __('messages.login') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Breadcrumbs -->
            
    <!-- Connexion Boutique -->
    <section class="shop login section">
        <div class="container">
            <div class="row"> 
                <div class="col-lg-6 offset-lg-3 col-12">
                    <div class="login-form">
                        <h2>{{ __('messages.login') }}</h2>
                        <p>{{ __('messages.please_register_to_order_faster') }}</p>
                        <!-- Formulaire -->
                        <form class="form" method="post" action="{{route('login.submit')}}">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>{{ __('messages.your_email') }} <span>*</span></label>
                                        <input type="email" name="email" placeholder="{{ __('messages.enter_email_address') }}" required="required" value="{{old('email')}}">
                                        @error('email')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>{{ __('messages.your_password') }} <span>*</span></label>
                                        <input type="password" name="password" placeholder="{{ __('messages.enter_password') }}" required="required" value="{{old('password')}}">
                                        @error('password')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group login-btn">
                                        <button class="btn" type="submit">{{ __('messages.login') }}</button>
                                        <a href="{{route('register.form')}}" class="btn">{{ __('messages.register') }}</a>
                                        {{ __('messages.or') }}
                                        <a href="{{route('login.redirect','facebook')}}" class="btn btn-facebook"><i class="ti-facebook"></i></a>
                                        <a href="{{route('login.redirect','github')}}" class="btn btn-github"><i class="ti-github"></i></a>
                                        <a href="{{route('login.redirect','google')}}" class="btn btn-google"><i class="ti-google"></i></a>
                                    </div>
                                    <div class="checkbox">
                                        <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">{{ __('messages.remember_me') }}</label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a class="lost-pass" href="{{ route('password.request') }}">
                                            {{ __('messages.forgot_password') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                        <!--/ Fin formulaire -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Fin Connexion -->
@endsection

@push('styles')
<style>
     .w-56 {
    width: 14rem;
}
.gap-4 {
    gap: 1rem;
}

.justify-between {
    justify-content: space-between;
}

.items-center {
    align-items: center;
}
.flex-wrap {
    flex-wrap: wrap;
}
.flex {
    display: flex
;
}
.h-56 {
    height: 14rem;
}

.mr-4 {
    margin-right: 1rem;
}
.mr-4, .mx-4 {
    margin-right: 1.5rem !important;
}
    .shop.login .form .btn{
        margin-right:0;
    }
    .btn-facebook{
        background:#39579A;
    }
    .btn-facebook:hover{
        background:#073088 !important;
    }
    .btn-github{
        background:#444444;
        color:white;
    }
    .btn-github:hover{
        background:black !important;
    }
    .btn-google{
        background:#ea4335;
        color:white;
    }
    .btn-google:hover{
        background:rgb(243, 26, 26) !important;
    }
    /* Footer styling */
    body.page-about-us footer p {
            color: #fff !important;
        }
        footer, .footer, .site-footer {
            background: linear-gradient(
                112deg,
                #fdf6c3 0%,
                #b3ecff 11%,
                #fde6c4 27%,
                #b9e3be 47%,
                #fab8e8 67%,
                #fffbea 81%,
                #ffe0f5 100%
            );
            color: #131313 !important;
            font-size: 1.13rem;
            font-weight: 500;
            padding: 2.3rem 0 1.7rem 0;
            text-align: center;
            border-top: 3px solid #f5ae41;
            box-shadow: 0 -2px 24px 0 rgba(60, 60, 60, 0.09);
            border-radius: 2.5rem 2.5rem 0 0;
            letter-spacing: 0.01em;
        }
        .footer li, .footer li a, .footer a, .site-footer li, .site-footer li a, .site-footer a {
            color: #000 !important;
        }
        .footer a:hover, .site-footer a:hover {
            color: #127fbf;
            background: linear-gradient(90deg,#fffbea 0%,#b3ecff 100%);
            text-decoration: underline wavy;
        }
        /* Ensure nav li and a are white */
        nav li, .navbar li, nav a, .navbar a, .sticky-bar li, .sticky-bar a {
            color: #fff !important;
            background: none !important;
            text-decoration: none;
        }
        .footer-social {
            margin-top: 1.1rem;
        }
        .footer-social a {
            display: inline-block;
            margin: 0 0.5rem;
            color: #27ae60;
            font-size: 1.45rem;
            border-radius: 100%;
            background: linear-gradient(135deg,#ffe0f5 0%,#b9e3be 100%);
            padding: 0.25rem;
            box-shadow: 0 2px 12px 0 rgba(186, 35, 123, 0.10);
            transition: color 0.15s, background 0.18s, box-shadow 0.18s;
        }
        .footer-social a:hover {
            color: #b9217b;
            background: linear-gradient(135deg,#b9e3be 0%,#fab8e8 100%);
            box-shadow: 0 4px 20px 0 rgba(111,72,170,0.15);
        }
        /* White box for description paragraph */
        .description-box {
            background-color: white;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 4px 14px rgba(0,0,0,0.1);
            color: #444;
        }
        /* Force footer links and list items to black, override utility classes */
        footer li, footer li a, footer a,
        .footer li, .footer li a, .footer a,
        .site-footer li, .site-footer li a, .site-footer a,
        footer [class*='text-'],
        footer a[class*='text-'],
        footer li[class*='text-'] {
            color: #000 !important;
        }
        /* Make sticky topnav buttons black */
        nav.sticky button, nav.sticky .btn, nav.sticky a.btn,
        .header.sticky button, .header.sticky .btn, .header.sticky a.btn,
        .header-inner.sticky button, .header-inner.sticky .btn, .header-inner.sticky a.btn {
            background: #000 !important;
            color: #fff !important;
            border-color: #000 !important;
        }
        /* Make sticky topnav links black, override global a, li */
        .header.sticky a,
        .header.sticky .nav a,
        .header.sticky .navbar-nav a {
            color: #000 !important;
        }
        /* Make all topnav links black on all pages using .topnav-link */
        .topnav-link {
            color: #000 !important;
        }
        /* Make all topnav links black on all pages */
        .header .nav a,
        .header .navbar-nav a,
        .header .list-main a,
        .header-inner .nav a,
        .header-inner .navbar-nav a {
            color: #000 !important;
        }
</style>
@endpush
