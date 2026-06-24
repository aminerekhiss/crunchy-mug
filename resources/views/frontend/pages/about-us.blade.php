@extends('frontend.layouts.master')
@section('title', __('messages.crunchy_mug'))
@section('main-content')
@section('body-class', 'page-about-us')
@push('styles')
    <!-- Tailwind CDN and custom config -->
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        coffee: {
                            50: '#fff8f0',
                            100: '#fff1e0',
                            200: '#fde6c4',
                            300: '#fad59c',
                            400: '#f7c16d',
                            500: '#f5ae41',
                            600: '#e08d24',
                            700: '#c06a1a',
                            800: '#a05418',
                            900: '#84471b'
                        },
                        nature: {
                            50: '#f0f9f1',
                            100: '#dcf1de',
                            200: '#b9e3be',
                            300: '#8fcf98',
                            400: '#5db36a',
                            500: '#3f9a4d',
                            600: '#2c7a3b',
                            700: '#256332',
                            800: '#224f2d',
                            900: '#1c4126'
                        }
                    },
                    animation: {
                        'float-slow': 'float 8s ease-in-out infinite',
                        'float-medium': 'float 6s ease-in-out infinite',
                        'float-fast': 'float 4s ease-in-out infinite',
                        'wave-slow': 'wave 15s ease-in-out infinite',
                        'wave-medium': 'wave 12s ease-in-out infinite',
                        'wave-fast': 'wave 8s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        wave: {
                            '0%': { transform: 'translateX(0) translateY(0)' },
                            '25%': { transform: 'translateX(-15px) translateY(10px)' },
                            '50%': { transform: 'translateX(0) translateY(20px)' },
                            '75%': { transform: 'translateX(15px) translateY(10px)' },
                            '100%': { transform: 'translateX(0) translateY(0)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        /* Transparent newsletter override */
        .newsletter-transparent,
        .newsletter-transparent * {
            background: transparent !important;
            box-shadow: none !important;
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
        .footer a, .site-footer a {
            color: #b9217b;
            text-decoration: underline dotted;
            background: linear-gradient(90deg,#ffe0f5 0%,#fab8e8 100%);
            border-radius: .8rem;
            padding: 0.22em 0.7em;
            transition: color 0.18s, background 0.22s;
            font-weight: 600;
            margin: 0 0.17em;
        }
        .footer a:hover, .site-footer a:hover {
            color: #127fbf;
            background: linear-gradient(90deg,#fffbea 0%,#b3ecff 100%);
            text-decoration: underline wavy;
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
    </style>
@endpush

<!-- MAIN CONTENT WRAPPER -->
<div class="relative min-h-screen overflow-x-hidden pt-32">

    <!-- Background Image -->
    <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
        <img src="{{ asset('images/image8.jpg') }}" alt="Background" class="absolute inset-0 w-full h-full object-cover" />
    </div>

    <!-- CONTENT LAYER (z-20) -->
    <div class="relative z-20 container mx-auto px-4">

        <!-- Breadcrumbs -->
        <div class="mb-12">
            <ul class="flex items-center space-x-2 text-sm text-coffee-700 pt-2">
                <li><a href="{{ url('/') }}" class="hover:underline">{{ __('messages.home') }}</a> <span class="mx-1">/</span></li>
                <li class="active font-bold">{{ __('messages.about') }}</li>
            </ul>
        </div>

        <!-- Main About Content Layered Card -->
        <section class="flex flex-col md:flex-row items-center gap-12 py-16">
            <div class="relative w-full md:w-1/2 flex-shrink-0 flex justify-center">
                @php $settings = DB::table('settings')->get(); @endphp
                <div class="relative rounded-3xl overflow-hidden drop-shadow-2xl">
                    <img src="@foreach($settings as $data){{$data->photo}}@endforeach"
                         alt="{{ __('messages.about_crunchy_mug') }}"
                         class="w-full max-w-md object-cover" />
                </div>
            </div>
            <div class="w-full md:w-1/2 space-y-8 relative">
                <div class="inline-flex items-center px-4 py-2 bg-nature-100 text-nature-800 rounded-full text-sm font-medium animate-pulse">
                    <span class="w-2 h-2 bg-nature-500 rounded-full mr-2"></span>
                    {{ __('messages.about_crunchy_mug') }}
                </div>
                <h1 class="text-4xl font-bold text-coffee-700 mb-4">
                    {{ __('messages.welcome_to') }} <span class="text-coffee-600">{{ __('messages.crunchy_mug') }}</span>
                </h1>
                <div class="description-box text-lg font-medium leading-relaxed">
                    @foreach($settings as $data) {!! $data->description !!} @endforeach
                </div>
                <div class="flex flex-col sm:flex-row gap-4 mt-6">
                    <a href="{{ route('blog') }}" class="px-8 py-3 bg-coffee-600 hover:bg-coffee-700 text-white font-semibold rounded-lg transition shadow-lg text-center">{{ __('messages.our_blog') }}</a>
                    <a href="{{ route('contact') }}" class="px-8 py-3 border-2 border-coffee-600 text-coffee-600 hover:bg-coffee-600 hover:text-white font-semibold rounded-lg transition text-center">{{ __('messages.contact_us') }}</a>
                </div>
            </div>
        </section>

        <!-- Shop Services Area -->
        <section class="py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white rounded-2xl shadow-lg flex flex-col items-center py-8 hover:shadow-2xl transition">
                    <i class="ti-rocket text-coffee-600 text-4xl mb-4"></i>
                    <h4 class="font-bold text-lg mb-1 text-coffee-700">{{ __('messages.free_delivery') }}</h4>
                    <p class="text-gray-600">{{ __('messages.orders_over_100_tnd') }}</p>
                </div>
                <div class="bg-white rounded-2xl shadow-lg flex flex-col items-center py-8 hover:shadow-2xl transition">
                    <i class="ti-reload text-coffee-600 text-4xl mb-4"></i>
                    <h4 class="font-bold text-lg mb-1 text-coffee-700">{{ __('messages.free_return') }}</h4>
                    <p class="text-gray-600">{{ __('messages.return_within_30_days') }}</p>
                </div>
                <div class="bg-white rounded-2xl shadow-lg flex flex-col items-center py-8 hover:shadow-2xl transition">
                    <i class="ti-lock text-coffee-600 text-4xl mb-4"></i>
                    <h4 class="font-bold text-lg mb-1 text-coffee-700">{{ __('messages.secure_payment') }}</h4>
                    <p class="text-gray-600">{{ __('messages.payment_100_secure') }}</p>
                </div>
                <div class="bg-white rounded-2xl shadow-lg flex flex-col items-center py-8 hover:shadow-2xl transition">
                    <i class="ti-tag text-coffee-600 text-4xl mb-4"></i>
                    <h4 class="font-bold text-lg mb-1 text-coffee-700">{{ __('messages.best_price') }}</h4>
                    <p class="text-gray-600">{{ __('messages.price_guaranteed') }}</p>
                </div>
            </div>
        </section>

        <!-- Newsletter Layer -->
        <div class="py-8">
            <div class="newsletter-transparent rounded-2xl p-8">
                @include('frontend.layouts.newsletter')
            </div>
        </div>
    </div>

</div>
@endsection
