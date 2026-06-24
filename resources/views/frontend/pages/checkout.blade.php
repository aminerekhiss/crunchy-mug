@extends('frontend.layouts.master')

@section('title', __('messages.checkout'))

@section('main-content')
    <section class="coming-soon-section" style="min-height: 70vh; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #fdf6c3 0%, #b3ecff 30%, #fde6c4 60%, #fab8e8 100%);">
        <div class="text-center">
            <div style="font-size: 6rem; font-weight: 900; color: #ff6f61; text-shadow: 2px 4px 18px rgba(0,0,0,0.13); margin-bottom: 1.5rem;">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <h1 style="font-size: 4rem; font-weight: 800; color: #127fbf; margin-bottom: 1.2rem; letter-spacing: 0.04em;">
                {{ __('messages.coming_soon_checkout') }}
            </h1>
            <p style="font-size: 2.1rem; color: #444; font-weight: 600; margin-bottom: 2.5rem;">
                {{ __('messages.checkout_service_coming_soon') }}
            </p>
            <p style="font-size: 1.7rem; color: #ff6f61; font-weight: 700; margin-bottom: 1.2rem;">
                {{ __('messages.order_now_with_contact') }}
            </p>
            <div style="font-size: 1.7rem; color: #127fbf; font-weight: 700; margin-bottom: 1.2rem;">
                <i class="fas fa-phone-alt" style="color:#ff6f61;"></i>
                <a href="tel:+21628212295" style="color:#127fbf; text-decoration:underline;">+216 28 212 295</a>
            </div>
            <div style="font-size: 1.7rem; color: #127fbf; font-weight: 700; margin-bottom: 2.5rem;">
                <i class="fas fa-envelope" style="color:#ff6f61;"></i>
                <a href="mailto:crunchymug@gmail.com" style="color:#127fbf; text-decoration:underline;">crunchymug@gmail.com</a>
            </div>
            <a href="{{ route('home') }}" class="btn btn-lg" style="font-size: 1.5rem; padding: 1rem 2.5rem; background: linear-gradient(90deg, #ff6f61 0%, #127fbf 100%); color: #fff; border: none; border-radius: 2.5rem; font-weight: 700; box-shadow: 0 4px 18px rgba(60,60,60,0.13);">
                <i class="fas fa-arrow-left"></i> {{ __('messages.back_to_home') }}
            </a>
        </div>
    </section>
    @push('styles')
    <style>
        @media (max-width: 600px) {
            .coming-soon-section h1 { font-size: 2.2rem !important; }
            .coming-soon-section p { font-size: 1.1rem !important; }
            .coming-soon-section div[style*='font-size: 6rem'] { font-size: 3.2rem !important; }
        }
        .w-56 { width: 14rem; }
        .gap-4 { gap: 1rem; }
        .justify-between { justify-content: space-between; }
        .items-center { align-items: center; }
        .flex-wrap { flex-wrap: wrap; }
        .flex { display: flex; }
        .h-56 { height: 14rem; }
        .mr-4 { margin-right: 1rem; }
        .mr-4, .mx-4 { margin-right: 1.5rem !important; }
    </style>
    @endpush
@endsection