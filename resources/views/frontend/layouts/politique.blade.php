@extends('user.layouts.master')
@section('title', __('messages.privacy_policy'))
@section('main-content')

<div class="container mx-auto max-w-3xl px-6 py-12 bg-white rounded-lg shadow-md border border-gray-200">
    <h1 class="text-4xl font-extrabold text-blue-900 mb-8">{{ __('messages.privacy_policy') }}</h1>
    
    <p class="text-gray-700 text-lg leading-relaxed mb-8">
        {{ __('messages.cookie_usage_intro') }}
    </p>

    <h2 class="text-3xl font-semibold text-blue-800 mt-10 mb-4 border-l-4 border-blue-600 pl-4">{{ __('messages.what_is_a_cookie') }}</h2>
    <p class="text-gray-700 leading-relaxed mb-8">
        {{ __('messages.what_is_a_cookie_text') }}
    </p>

    <h2 class="text-3xl font-semibold text-blue-800 mt-10 mb-4 border-l-4 border-blue-600 pl-4">{{ __('messages.how_we_use_cookies') }}</h2>
    <ul class="list-disc pl-8 text-gray-700 mb-8 space-y-3 leading-relaxed">
        <li>{{ __('messages.save_preferences') }}</li>
        <li>{{ __('messages.anonymous_analytics') }}</li>
        <li>{{ __('messages.performance_and_security') }}</li>
    </ul>

    <h2 class="text-3xl font-semibold text-blue-800 mt-10 mb-4 border-l-4 border-blue-600 pl-4">{{ __('messages.manage_cookies') }}</h2>
    <p class="text-gray-700 leading-relaxed">
        {{ __('messages.manage_cookies_text') }}
    </p>
</div>

@endsection
