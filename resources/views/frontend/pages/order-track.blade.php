@extends('frontend.layouts.master')

@section('title', __('messages.crunchy_mug'))

@section('main-content')
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
</style>
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">{{ __('messages.home') }}<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">{{ __('messages.order_track') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
<section class="tracking_box_area section_gap py-5">
    <div class="container">
        <div class="tracking_box_inner">
            <p>{{ __('messages.track_order_instructions') }}</p>
            <form class="row tracking_form my-4" action="{{route('product.track.order')}}" method="post" novalidate="novalidate">
              @csrf
                <div class="col-md-8 form-group">
                    <input type="text" class="form-control p-2"  name="order_number" placeholder="{{ __('messages.enter_order_number') }}">
                </div>
                <div class="col-md-8 form-group">
                    <button type="submit" value="submit" class="btn submit_btn">{{ __('messages.track_order') }}</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection