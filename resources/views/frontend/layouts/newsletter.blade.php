
<!-- Start Shop Newsletter  -->
<section class="shop-newsletter section">
    <div class="container">
        <div class="inner-top">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-12">
                    <!-- Start Newsletter Inner -->
                    <div class="inner">
                        <h4>{{ __('messages.newsletter') }}</h4>
                        <p>{{ __('messages.subscribe_newsletter_discount') }} <span>10%</span> {{ __('messages.on_first_purchase') }}</p>
                        <form action="{{route('subscribe')}}" method="post" class="newsletter-inner">
                            @csrf
                            <input name="email" placeholder="{{ __('messages.your_email_address') }}" required="" type="email">
                            <button class="btn" type="submit">{{ __('messages.subscribe') }}</button>
                        </form>
                    </div>
                    <!-- End Newsletter Inner -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- End Shop Newsletter -->