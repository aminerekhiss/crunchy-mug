@extends('frontend.layouts.master')
@section('title', __('messages.wishlist_page'))
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
							<li class="active"><a href="javascript:void(0);">{{ __('messages.wishlist') }}</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
			
	<!-- Shopping Cart -->
	<div class="shopping-cart section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Shopping Summary -->
					<table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th>{{ __('messages.product') }}</th>
								<th>{{ __('messages.name') }}</th>
								<th class="text-center">{{ __('messages.total') }}</th> 
								<th class="text-center">{{ __('messages.add_to_cart') }}</th> 
								<th class="text-center"><i class="ti-trash remove-icon"></i></th>
							</tr>
						</thead>
						<tbody>
							@if(Helper::getAllProductFromWishlist())
								@foreach(Helper::getAllProductFromWishlist() as $key=>$wishlist)
									<tr>
										@php 
											$photo=explode(',',$wishlist->product['photo']);
										@endphp
										<td class="image" data-title="No"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></td>
										<td class="product-des" data-title="Description">
											<p class="product-name"><a href="{{route('product-detail',$wishlist->product['slug'])}}">{{$wishlist->product['title']}}</a></p>
											<p class="product-des">{!!($wishlist['summary']) !!}</p>
										</td>
										<td class="total-amount" data-title="Total"><span>TND{{$wishlist['amount']}}</span></td>
										<td><a href="{{route('add-to-cart',$wishlist->product['slug'])}}" class='btn text-white'>{{ __('messages.add_to_cart') }}</a></td>
										<td class="action" data-title="Remove"><a href="{{route('wishlist-delete',$wishlist->id)}}"><i class="ti-trash remove-icon"></i></a></td>
									</tr>
								@endforeach
							@else 
								<tr>
									<td class="text-center" colspan="5">
										{{ __('messages.no_items_in_wishlist') }} <a href="{{route('product-grids')}}" style="color:blue;">{{ __('messages.continue_shopping') }}</a>
									</td>
								</tr>
							@endif
						</tbody>
					</table>
					<!--/ End Shopping Summary -->
				</div>
			</div>
		</div>
	</div>
	<!--/ End Shopping Cart -->
			
	<!-- Start Shop Services Area  -->
	<section class="shop-services section">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4>{{ __('messages.free_delivery') }}</h4>
						<p>{{ __('messages.orders_over_100_tnd') }}</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>{{ __('messages.free_return') }}</h4>
						<p>{{ __('messages.return_within_30_days') }}</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>{{ __('messages.secure_payment') }}</h4>
						<p>{{ __('messages.payment_100_secure') }}</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>{{ __('messages.best_price') }}</h4>
						<p>{{ __('messages.price_guaranteed') }}</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Newsletter -->
	
	@include('frontend.layouts.newsletter')
	
	<!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fermer"><span class="ti-close" aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row no-gutters">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <!-- Product Slider -->
									<div class="product-gallery">
										<div class="quickview-slider-active">
											<div class="single-slider">
												<img src="images/modal1.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal2.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal3.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal4.jpg" alt="#">
											</div>
										</div>
									</div>
								<!-- End Product slider -->
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="quickview-content">
                                    <h2>{{ __('messages.product_name_example') }}</h2>
                                    <div class="quickview-ratting-review">
                                        <div class="quickview-ratting-wrap">
                                            <div class="quickview-ratting">
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <a href="#"> (1 avis client)</a>
                                        </div>
                                        <div class="quickview-stock">
                                            <span><i class="fa fa-check-circle-o"></i> {{ __('messages.in_stock') }}</span>
                                        </div>
                                    </div>
                                    <h3>29,00 $</h3>
                                    <div class="quickview-peragraph">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.</p>
                                    </div>
									<div class="size">
										<div class="row">
											<div class="col-lg-6 col-12">
												<h5 class="title">{{ __('messages.size') }}</h5>
												<select>
													<option selected="selected">S</option>
													<option>M</option>
													<option>L</option>
													<option>XL</option>
												</select>
											</div>
											<div class="col-lg-6 col-12">
												<h5 class="title">{{ __('messages.color') }}</h5>
												<select>
													<option selected="selected">Orange</option>
													<option>Violet</option>
													<option>Noir</option>
													<option>Rose</option>
												</select>
											</div>
										</div>
									</div>
                                    <div class="quantity">
										<!-- Input Order -->
										<div class="input-group">
											<div class="button minus">
												<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
													<i class="ti-minus"></i>
												</button>
											</div>
											<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
											<div class="button plus">
												<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
													<i class="ti-plus"></i>
												</button>
											</div>
										</div>
										<!--/ End Input Order -->
									</div>
									<div class="add-to-cart">
										<a href="#" class="btn">{{ __('messages.add_to_cart') }}</a>
										<a href="#" class="btn min"><i class="ti-heart"></i></a>
										<a href="#" class="btn min"><i class="fa fa-compress"></i></a>
									</div>
                                    <div class="default-social">
										<h4 class="share-now">{{ __('messages.share_now') }}</h4>
                                        <ul>
                                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                            <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal end -->
	
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
@endpush
