@extends('frontend.layouts.master')
@section('title', __('messages.contact_us'))
@section('body-class', 'page-contact-us')

@push('styles')
    <!-- Tailwind and About Us design config -->
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
        .bg-wave-pattern {
            background-color: #fffaf5;
            background-image: linear-gradient(120deg, #f5ae41 0%, #c06a1a 100%);
        }
        .newsletter-transparent,
        .newsletter-transparent * {
            background: transparent !important;
            box-shadow: none !important;
        }
        body.page-contact-us footer p {
            color: #fff !important;
        }
        .map-section {
            border-radius: 1.5rem;
            overflow: hidden;
            box-shadow: 0 10px 32px 0 rgba(0,0,0,0.08);
            margin-bottom: 2rem;
        }
    </style>
    <style>
        .modal-dialog .modal-content .modal-header{
            position:initial;
            padding: 10px 20px;
            border-bottom: 1px solid #e9ecef;
        }
        .modal-dialog .modal-content .modal-body{
            height:100px;
            padding:10px 20px;
        }
        .modal-dialog .modal-content {
            width: 50%;
            border-radius: 0;
            margin: auto;
        }
    </style>
@endpush

@section('main-content')
<div class="relative bg-wave-pattern min-h-screen overflow-x-hidden pt-32">
    <!-- Decorative Background Layers (z-0) -->
    <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
        <div class="absolute inset-0 bg-gradient-to-br from-amber-50 via-orange-50 to-amber-100 opacity-80"></div>
        <img src="{{ asset('images/image7.jpg') }}"
             class="absolute inset-0 w-full h-full object-cover opacity-60"
             alt="Calque de fond" />
        <div class="absolute bottom-0 left-0 right-0 h-[80vh] overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-t from-coffee-100 to-transparent rounded-tl-[100%] rounded-tr-[100%] translate-y-1/4 scale-125 animate-wave-slow"></div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-[60vh] overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-t from-coffee-200/40 to-transparent rounded-tl-[100%] rounded-tr-[100%] translate-y-1/3 scale-110 animate-wave-medium"></div>
        </div>
        <div class="absolute top-[20%] left-[15%] w-64 h-64 rounded-full bg-gradient-to-br from-coffee-200/30 to-coffee-300/10 blur-lg animate-float-slow"></div>
        <div class="absolute bottom-[25%] left-[25%] w-48 h-48 rounded-full bg-gradient-to-br from-coffee-400/20 to-orange-200/10 blur-lg animate-float-medium"></div>
        <div class="absolute top-[40%] right-[15%] w-56 h-56 rounded-full bg-gradient-to-bl from-nature-100/30 to-nature-200/10 blur-lg animate-float-fast"></div>
    </div>

    <!-- Breadcrumbs -->
    <div class="container mx-auto px-4 mb-12">
        <ul class="flex items-center space-x-2 text-sm text-coffee-700 pt-2">
            <li><a href="{{ route('home') }}" class="hover:underline">{{ __('messages.home') }}</a> <span class="mx-1">/</span></li>
            <li class="active font-bold">{{ __('messages.contact') }}</li>
        </ul>
    </div>

    <!-- Contact Section (About Us style) -->
    <section class="container mx-auto px-4 flex flex-col md:flex-row items-center gap-12 py-16 relative z-20">
        <div class="w-full md:w-1/2 space-y-8 relative">
            <div class="inline-flex items-center px-4 py-2 bg-nature-100 text-nature-800 rounded-full text-sm font-medium animate-pulse">
                <span class="w-2 h-2 bg-nature-500 rounded-full mr-2"></span>
                {{ __('messages.contact_us') }}
            </div>
            <h1 class="text-4xl font-bold text-coffee-700 mb-4">
                {{ __('messages.contact') }} <span class="text-coffee-600">CRUNCHY MUG</span>
            </h1>
            <p class="text-lg text-gray-700 font-medium">
                {{ __('messages.we_would_love_to_hear_from_you') }}
            </p>
            @php $settings=DB::table('settings')->get(); @endphp
            <div class="space-y-2">
                <div class="flex items-center gap-2 text-coffee-700">
                    <i class="fa fa-location-arrow"></i>
                    <span>@foreach($settings as $data) {{$data->address}} @endforeach</span>
                </div>
                <div class="flex items-center gap-2 text-coffee-700">
                    <i class="fa fa-phone"></i>
                    <span>@foreach($settings as $data) {{$data->phone}} @endforeach</span>
                </div>
                <div class="flex items-center gap-2 text-coffee-700">
                    <i class="fa fa-envelope-open"></i>
                    <span><a href="mailto:@foreach($settings as $data){{$data->email}}@endforeach">@foreach($settings as $data) {{$data->email}} @endforeach</a></span>
                </div>
            </div>
        </div>
        <div class="relative w-full md:w-1/2 flex-shrink-0 flex justify-center">
            <div class="relative drop-shadow-2xl rounded-3xl overflow-hidden w-full max-w-md bg-white/90 p-10 border border-coffee-100">
                <div class="title mb-8 text-center">
                    <h4 class="text-coffee-700 font-bold text-lg uppercase tracking-wider">{{ __('messages.contact_us') }}</h4>
                    <h3 class="text-2xl font-extrabold mb-2">{{ __('messages.write_us_a_message') }}</h3>
                    @guest
                        <span class="text-xs text-danger">[{{ __('messages.you_need_to_login_first') }}]</span>
                    @endguest
                </div>
                <form class="form-contact form contact_form space-y-6" method="post" action="{{route('contact.store')}}" id="contactForm" novalidate="novalidate">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="relative group">
                            <input name="name" id="name" type="text" required
                                class="peer w-full px-4 py-3 rounded-xl border-2 border-coffee-200 focus:border-coffee-500 focus:ring-2 focus:ring-coffee-200 bg-white transition placeholder-transparent"
                                placeholder="{{ __('messages.your_name') }}" />
                            <label for="name"
                                class="absolute left-4 top-3 text-gray-500 text-base transition-all duration-200 pointer-events-none
                                peer-placeholder-shown:top-3 peer-placeholder-shown:text-base peer-focus:-top-5 peer-focus:text-xs peer-focus:text-coffee-700 bg-white px-1">
                                {{ __('messages.your_name') }}<span class="text-red-500">*</span>
                            </label>
                        </div>
                        <div class="relative group">
                            <input name="subject" id="subject" type="text" required
                                class="peer w-full px-4 py-3 rounded-xl border-2 border-coffee-200 focus:border-coffee-500 focus:ring-2 focus:ring-coffee-200 bg-white transition placeholder-transparent"
                                placeholder="{{ __('messages.subject') }}" />
                            <label for="subject"
                                class="absolute left-4 top-3 text-gray-500 text-base transition-all duration-200 pointer-events-none
                                peer-placeholder-shown:top-3 peer-placeholder-shown:text-base peer-focus:-top-5 peer-focus:text-xs peer-focus:text-coffee-700 bg-white px-1">
                                {{ __('messages.subject') }}<span class="text-red-500">*</span>
                            </label>
                        </div>
                        <div class="relative group">
                            <input name="email" id="email" type="email" required
                                class="peer w-full px-4 py-3 rounded-xl border-2 border-coffee-200 focus:border-coffee-500 focus:ring-2 focus:ring-coffee-200 bg-white transition placeholder-transparent"
                                placeholder="{{ __('messages.email') }}" />
                            <label for="email"
                                class="absolute left-4 top-3 text-gray-500 text-base transition-all duration-200 pointer-events-none
                                peer-placeholder-shown:top-3 peer-placeholder-shown:text-base peer-focus:-top-5 peer-focus:text-xs peer-focus:text-coffee-700 bg-white px-1">
                                {{ __('messages.email') }}<span class="text-red-500">*</span>
                            </label>
                        </div>
                        <div class="relative group">
                            <input name="phone" id="phone" type="tel" required
                                class="peer w-full px-4 py-3 rounded-xl border-2 border-coffee-200 focus:border-coffee-500 focus:ring-2 focus:ring-coffee-200 bg-white transition placeholder-transparent"
                                placeholder="Téléphone" />
                            <label for="phone"
                                class="absolute left-4 top-3 text-gray-500 text-base transition-all duration-200 pointer-events-none
                                peer-placeholder-shown:top-3 peer-placeholder-shown:text-base peer-focus:-top-5 peer-focus:text-xs peer-focus:text-coffee-700 bg-white px-1">
                                Téléphone<span class="text-red-500">*</span>
                            </label>
                        </div>
                    </div>
                    <div class="relative group">
                        <textarea name="message" id="message" rows="5" required
                            class="peer w-full px-4 py-3 rounded-xl border-2 border-coffee-200 focus:border-coffee-500 focus:ring-2 focus:ring-coffee-200 bg-white transition placeholder-transparent resize-none"
                            placeholder="{{ __('messages.enter_message') }}"></textarea>
                        <label for="message"
                            class="absolute left-4 top-3 text-gray-500 text-base transition-all duration-200 pointer-events-none
                            peer-placeholder-shown:top-3 peer-placeholder-shown:text-base peer-focus:-top-5 peer-focus:text-xs peer-focus:text-coffee-700 bg-white px-1">
                            {{ __('messages.your_message') }}<span class="text-red-500">*</span>
                        </label>
                    </div>
                    <button type="submit"
                        class="w-full py-3 bg-coffee-600 hover:bg-coffee-700 text-white font-extrabold rounded-xl shadow-lg transition text-lg tracking-wide flex items-center justify-center gap-2">
                        <i class="fa fa-paper-plane"></i> {{ __('messages.send_message') }}
                    </button>
                </form>
            </div>
            <div class="absolute bottom-6 right-8 w-16 h-16 rounded-full bg-gradient-to-br from-nature-100 to-nature-300 opacity-50 blur-md animate-float-medium"></div>
        </div>
    </section>
    <!-- Shop Services Area (Layered Card) -->
    <section class="container mx-auto px-4 py-12 relative z-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-white/80 rounded-2xl shadow-lg flex flex-col items-center py-8 hover:shadow-2xl transition">
                <i class="ti-rocket text-coffee-600 text-4xl mb-4"></i>
                <h4 class="font-bold text-lg mb-1 text-coffee-700">{{ __('messages.free_delivery') }}</h4>
                <p class="text-gray-600">{{ __('messages.orders_over_100_tnd') }}</p>
            </div>
            <div class="bg-white/80 rounded-2xl shadow-lg flex flex-col items-center py-8 hover:shadow-2xl transition">
                <i class="ti-reload text-coffee-600 text-4xl mb-4"></i>
                <h4 class="font-bold text-lg mb-1 text-coffee-700">{{ __('messages.free_return') }}</h4>
                <p class="text-gray-600">{{ __('messages.return_within_30_days') }}</p>
            </div>
            <div class="bg-white/80 rounded-2xl shadow-lg flex flex-col items-center py-8 hover:shadow-2xl transition">
                <i class="ti-lock text-coffee-600 text-4xl mb-4"></i>
                <h4 class="font-bold text-lg mb-1 text-coffee-700">{{ __('messages.secure_payment') }}</h4>
                <p class="text-gray-600">{{ __('messages.payment_100_secure') }}</p>
            </div>
            <div class="bg-white/80 rounded-2xl shadow-lg flex flex-col items-center py-8 hover:shadow-2xl transition">
                <i class="ti-tag text-coffee-600 text-4xl mb-4"></i>
                <h4 class="font-bold text-lg mb-1 text-coffee-700">{{ __('messages.best_price') }}</h4>
                <p class="text-gray-600">{{ __('messages.price_guaranteed') }}</p>
            </div>
        </div>
    </section>
    <div class="container mx-auto px-4 py-8 relative z-30">
        <div class="rounded-3xl overflow-hidden shadow-xl" style="height:350px;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10310492.290467402!2d7.524248087697826!3d33.886917199999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x125465ae7e5a7fdd%3A0x5c7d7080ca3b7b7a!2sTunisia!5e0!3m2!1sen!2stn!4v1719598900000!5m2!1sen!2stn"
                width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>
    <!-- Section Newsletter -->
    <div class="container mx-auto px-4 py-8">
        <div class="newsletter-transparent rounded-2xl p-8">
            @include('frontend.layouts.newsletter')
        </div>
    </div>

    <!-- Modal succès contact -->
    <div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h2 class="text-success">Merci !</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-success">{{ __('messages.your_message_is_successfully_sent') }}</p>
            </div>
          </div>
        </div>
    </div>
    <!-- Modal erreur contact -->
    <div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h2 class="text-warning">{{ __('messages.sorry') }}</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-warning">{{ __('messages.something_went_wrong') }}</p>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('frontend/js/jquery.form.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('frontend/js/contact.js') }}"></script>
@endpush
