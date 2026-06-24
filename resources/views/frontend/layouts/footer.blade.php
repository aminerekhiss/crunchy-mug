
<footer class="bg-coffee-700 text-black py-10">
    <div class="container mx-auto px-4">
        <!-- Footer Top -->
        <div class="footer-top section pb-10 border-b border-gray-300">
            <div class="row justify-between">
                <!-- About -->
                <div class="col-lg-5 col-md-6 col-12 mb-6">
                    <div class="single-footer about text-center">
                        <h1 class="text-3xl font-extrabold mb-4" style="font-size: 2.2rem; letter-spacing: 0.04em;">CRUNCHY MUG</h1>
                        @php $settings = DB::table('settings')->get(); @endphp
                        <p class="text mb-2">@foreach($settings as $data) {{$data->short_des}} @endforeach</p>
                        <p class="call text-sm">
                            {{ __('messages.got_question_call_us') }}<br>
                            <span class="font-semibold">
                                <a href="tel:+21628212295" class="text-black hover:underline">
                                    @foreach($settings as $data) {{$data->phone}} @endforeach
                                </a>
                            </span>
                        </p>
                        <!-- Social Icons Centered Below Title -->
                    </div>
                </div>

                <!-- Spacer (pushes "Information" to the right) -->
                <div class="col-lg-1 d-none d-lg-block"></div>

                <!-- Links -->
                <div class="col-lg-2 col-md-6 col-12 mb-6">
                    <div class="single-footer links text-start">
                        <h4 class="text-lg font-semibold mb-4">{{ __('messages.information') }}</h4>
                        <ul class="space-y-2">
                            <li><a href="{{ route('about-us') }}" class="hover:underline">{{ __('messages.about_us') }}</a></li>
                            <li><a href="{{ route('contact') }}" class="hover:underline">{{ __('messages.contact_us') }}</a></li>
                        </ul>
                        <!-- Social Icons Centered Below Text -->
                    </div>
                </div>

                <!-- Contact + Social -->
                <div class="col-lg-4 col-md-6 col-12 mb-6">
                    <div class="single-footer contact text-center">
                        <h4 class="text-lg font-semibold mb-4">{{ __('messages.contact') }}</h4>
                        <ul class="space-y-2 mb-4">
                            <li><span class="block">@foreach($settings as $data) {{$data->address}} @endforeach</span></li>
                            <li><a href="mailto:@foreach($settings as $data) {{$data->email}} @endforeach" class="hover:underline">@foreach($settings as $data) {{$data->email}} @endforeach</a></li>
                            <li><a href="tel:+21628212295" class="hover:underline">@foreach($settings as $data) {{$data->phone}} @endforeach</a></li>
                        </ul>
                        <!-- Social Icons Centered Below Text -->
                        <div class="footer-social-icons d-flex justify-content-center align-items-center mt-4" style="gap: 18px;">
                            <a href="https://www.facebook.com/profile.php?id=61577771019753" target="_blank" rel="noopener" title="Facebook" class="footer-social-link">
                                <i class="fa fa-facebook text-xl"></i>
                            </a>
                            <a href="https://www.instagram.com/crunchymug/" target="_blank" rel="noopener" title="Instagram" class="footer-social-link">
                                <i class="fa fa-instagram text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copyright Bottom -->
        <div class="copyright py-6 mt-6">
            <div class="relative flex flex-col md:flex-row items-center gap-6 min-h-[160px]">
                <!-- Left (Text) -->
                <p class="text-sm text-gray-600 text-center md:text-left md:absolute left-0 top-1/2 md:-translate-y-1/2">
                    {{ __('messages.copyright') }} {{ date('Y') }}
                    <a href="https://github.com/rokhsario" target="_blank" class="text-blue-600 hover:underline">
                        CRUNCHY MUG
                    </a> - {{ __('messages.all_rights_reserved') }}
                </p>

                <!-- Center (QR Code) -->
                <div class="mx-auto text-center">
                    <div style="display:inline-block;">
                        <div style="font-family:'Poppins', 'Montserrat', Arial, sans-serif;font-size:1.18rem;font-weight:700;margin-bottom:0.5rem;letter-spacing:0.06em;text-align:center;position:relative;left:-2px;background: linear-gradient(90deg, #fd5949 0%, #d6249f 50%, #285AEB 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;text-shadow: 0 2px 8px rgba(220, 80, 172, 0.13);">Instagram scan me</div>
                        <img src="{{ asset('images/qr.png') }}" alt="QR Code" class="w-56 h-56"  />
                    </div>
                </div>

                <!-- Right (Payments) -->
                <div class="absolute right-0 top-1/2 -translate-y-1/2">
                    <img src="{{ asset('backend/img/payments.png') }}" alt="Payments" class="max-h-10 object-contain" />
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Font Awesome (make sure this is in your <head> if not already present) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Jquery -->
<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery-migrate-3.0.0.js')}}"></script>
<script src="{{asset('frontend/js/jquery-ui.min.js')}}"></script>
<!-- Popper JS -->
<script src="{{asset('frontend/js/popper.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<!-- Color JS -->
<script src="{{asset('frontend/js/colors.js')}}"></script>
<!-- Slicknav JS -->
<script src="{{asset('frontend/js/slicknav.min.js')}}"></script>
<!-- Owl Carousel JS -->
<script src="{{asset('frontend/js/owl-carousel.js')}}"></script>
<!-- Magnific Popup JS -->
<script src="{{asset('frontend/js/magnific-popup.js')}}"></script>
<!-- Waypoints JS -->
<script src="{{asset('frontend/js/waypoints.min.js')}}"></script>
<!-- Countdown JS -->
<script src="{{asset('frontend/js/finalcountdown.min.js')}}"></script>
<!-- Nice Select JS -->
<script src="{{asset('frontend/js/nicesellect.js')}}"></script>
<!-- Flex Slider JS -->
<script src="{{asset('frontend/js/flex-slider.js')}}"></script>
<!-- ScrollUp JS -->
<script src="{{asset('frontend/js/scrollup.js')}}"></script>
<!-- Onepage Nav JS -->
<script src="{{asset('frontend/js/onepage-nav.min.js')}}"></script>
{{-- Isotope --}}
<script src="{{asset('frontend/js/isotope/isotope.pkgd.min.js')}}"></script>
<!-- Easing JS -->
<script src="{{asset('frontend/js/easing.js')}}"></script>

<!-- Active JS -->
<script src="{{asset('frontend/js/active.js')}}"></script>

@stack('scripts')
<script>
    setTimeout(function(){
      $('.alert').slideUp();
    },5000);
    $(function() {
    // ------------------------------------------------------- //
    // Multi Level dropdowns
    // ------------------------------------------------------ //
        $("ul.dropdown-menu [data-toggle='dropdown']").on("click", function(event) {
            event.preventDefault();
            event.stopPropagation();

            $(this).siblings().toggleClass("show");

            if (!$(this).next().hasClass('show')) {
            $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
            }
            $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
            $('.dropdown-submenu .show').removeClass("show");
            });

        });
    });
</script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Poppins:wght@600;700&display=swap');
.footer-social-icons {
    margin-top: 1.5rem;
    justify-content: center !important;
    align-items: center !important;
    gap: 18px;
}
.footer-social-link {
    background: transparent !important;
    border-radius: 50%;
    padding: 0.5em;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    transition: background 0.2s, color 0.2s;
}
.footer-social-link .fa-facebook {
    color: #1877f3;
}
.footer-social-link .fa-instagram {
    background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
    color: #fff;
    border-radius: 30%;
    padding: 0.15em;
}
.footer-social-link:hover .fa-facebook {
    color: #0e5ab6;
}
.footer-social-link:hover .fa-instagram {
    filter: brightness(1.1);
}
</style>