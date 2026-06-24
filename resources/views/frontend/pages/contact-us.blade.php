@extends('frontend.layouts.master')

@section('title', __('messages.contact_us'))

@section('main-content')
<!-- Decorative Background Layer -->
<div class="relative min-h-screen w-full overflow-x-hidden pt-24">
    <!-- Background image and overlays -->
    <div class="absolute inset-0 -z-10">
        <img src="{{ asset('images/image4.png') }}" alt="Contact Background" class="w-full h-full object-cover opacity-60" />
        <div class="absolute inset-0 bg-gradient-to-br from-coffee-200/60 via-white/60 to-amber-100/80"></div>
    </div>

    <!-- Breadcrumbs -->
    <div class="container mx-auto px-4 py-6">
        <ul class="flex items-center space-x-2 text-sm text-coffee-700 bg-white/80 rounded px-4 py-2 shadow">
            <li>
                <a href="{{route('home')}}" class="hover:underline">{{ __('messages.home') }}</a>
                <i class="ti-arrow-right mx-2"></i>
            </li>
            <li class="active font-bold">{{ __('messages.contact') }}</li>
        </ul>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Contact -->
    <section id="contact-us" class="relative py-16">
        <div class="container mx-auto px-4">
            <div class="bg-white/90 rounded-2xl shadow-xl p-8 md:p-12 backdrop-blur-md">
                <div class="flex flex-col lg:flex-row gap-12">
                    <!-- Contact Form -->
                    <div class="w-full lg:w-2/3">
                        <div class="mb-8">
                            @php
                                $settings=DB::table('settings')->get();
                            @endphp
                            <h4 class="text-coffee-700 text-xl font-semibold mb-1 tracking-wide">{{ __('messages.get_in_touch') }}</h4>
                            <h3 class="text-3xl font-bold mb-2 text-coffee-900">{{ __('messages.write_us_a_message') }}
                                @auth
                                @else
                                    <span class="text-xs text-red-500 align-middle">[{{ __('messages.you_need_to_login_first') }}]</span>
                                @endauth
                            </h3>
                            <div class="h-1 w-20 bg-coffee-300 rounded mb-6"></div>
                        </div>
                        <form class="grid grid-cols-1 md:grid-cols-2 gap-6" method="post" action="{{route('contact.store')}}" id="contactForm" novalidate="novalidate">
                            @csrf
                            <div class="flex flex-col">
                                <label for="name" class="mb-1 font-medium text-gray-700">{{ __('messages.your_name') }}<span class="text-red-500">*</span></label>
                                <input name="name" id="name" type="text" placeholder="{{ __('messages.enter_your_name') }}"
                                       class="p-3 rounded-lg border border-coffee-200 focus:outline-none focus:ring-2 focus:ring-coffee-400 bg-white/60" />
                            </div>
                            <div class="flex flex-col">
                                <label for="subject" class="mb-1 font-medium text-gray-700">{{ __('messages.your_subject') }}<span class="text-red-500">*</span></label>
                                <input name="subject" type="text" id="subject" placeholder="{{ __('messages.enter_subject') }}"
                                       class="p-3 rounded-lg border border-coffee-200 focus:outline-none focus:ring-2 focus:ring-coffee-400 bg-white/60" />
                            </div>
                            <div class="flex flex-col">
                                <label for="email" class="mb-1 font-medium text-gray-700">{{ __('messages.your_email') }}<span class="text-red-500">*</span></label>
                                <input name="email" type="email" id="email" placeholder="{{ __('messages.enter_email_address') }}"
                                       class="p-3 rounded-lg border border-coffee-200 focus:outline-none focus:ring-2 focus:ring-coffee-400 bg-white/60" />
                            </div>
                            <div class="flex flex-col">
                                <label for="phone" class="mb-1 font-medium text-gray-700">{{ __('messages.your_phone') }}<span class="text-red-500">*</span></label>
                                <input id="phone" name="phone" type="number" placeholder="{{ __('messages.enter_your_phone') }}"
                                       class="p-3 rounded-lg border border-coffee-200 focus:outline-none focus:ring-2 focus:ring-coffee-400 bg-white/60" />
                            </div>
                            <div class="md:col-span-2 flex flex-col">
                                <label for="message" class="mb-1 font-medium text-gray-700">{{ __('messages.your_message') }}<span class="text-red-500">*</span></label>
                                <textarea name="message" id="message" cols="30" rows="7" placeholder="{{ __('messages.enter_message') }}"
                                          class="p-3 rounded-lg border border-coffee-200 focus:outline-none focus:ring-2 focus:ring-coffee-400 bg-white/60"></textarea>
                            </div>
                            <div class="md:col-span-2">
                                <button type="submit" class="w-full md:w-auto px-8 py-3 bg-coffee-600 hover:bg-coffee-700 text-white font-semibold rounded-lg shadow mt-2 transition">
                                    {{ __('messages.send_message') }}
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- Contact Info -->
                    <div class="w-full lg:w-1/3 flex flex-col gap-8">
                        <div class="bg-coffee-100/60 rounded-xl shadow p-6 flex flex-col items-center">
                            <i class="fa fa-phone text-coffee-600 text-2xl mb-2"></i>
                            <h4 class="font-semibold text-coffee-800 mb-1">{{ __('messages.call_us_now') }}:</h4>
                            <ul class="text-gray-800 text-sm">
                                <li>@foreach($settings as $data) {{$data->phone}} @endforeach</li>
                            </ul>
                        </div>
                        <div class="bg-coffee-100/60 rounded-xl shadow p-6 flex flex-col items-center">
                            <i class="fa fa-envelope-open text-coffee-600 text-2xl mb-2"></i>
                            <h4 class="font-semibold text-coffee-800 mb-1">{{ __('messages.email') }}:</h4>
                            <ul class="text-gray-800 text-sm">
                                <li>
                                    <a href="mailto:info@yourwebsite.com" class="hover:underline">
                                        @foreach($settings as $data) {{$data->email}} @endforeach
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="bg-coffee-100/60 rounded-xl shadow p-6 flex flex-col items-center">
                            <i class="fa fa-location-arrow text-coffee-600 text-2xl mb-2"></i>
                            <h4 class="font-semibold text-coffee-800 mb-1">{{ __('messages.our_address') }}:</h4>
                            <ul class="text-gray-800 text-sm">
                                <li>@foreach($settings as $data) {{$data->address}} @endforeach</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Contact -->

    <!-- Map Section -->
    <div class="container mx-auto px-4 py-6">
        <div class="rounded-2xl overflow-hidden shadow-2xl border-4 border-white">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14130.857353934944!2d85.36529494999999!3d27.6952226!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sne!2snp!4v1595323330171!5m2!1sne!2snp"
                    width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"
                    class="w-full"></iframe>
        </div>
    </div>

    <!-- Shop Newsletter -->
    @include('frontend.layouts.newsletter')

    <!-- Contact Success Modal -->
    <div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h2 class="text-success">{{ __('messages.thank_you') }}</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-success">{{ __('messages.your_message_is_successfully_sent') }}</p>
            </div>
          </div>
        </div>
    </div>
    <!-- Contact Error Modal -->
    <div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h2 class="text-warning">{{ __('messages.sorry') }}</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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

@push('styles')
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

@push('scripts')
<script src="{{ asset('frontend/js/jquery.form.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('frontend/js/contact.js') }}"></script>
@endpush