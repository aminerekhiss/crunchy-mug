@extends('frontend.layouts.master')

@section('title', __('messages.crunchy_mug'))

@section('main-content')
	
	<!-- Fil d'Ariane -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="{{route('home')}}">{{ __('messages.home') }}<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="javascript:void(0);">{{ __('messages.product_list') }}</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Fin Fil d'Ariane -->

	<form action="{{route('shop.filter')}}" method="POST">
	@csrf
		<!-- Style produit 1 -->
		<section class="product-area shop-sidebar shop-list shop section">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-4 col-12">
						<div class="shop-sidebar">
                            <!-- Widget Unique -->
                            <div class="single-widget category">
                                <h3 class="title">{{ __('messages.categories') }}</h3>
                                <ul class="categor-list">
									@php
										$menu=App\Models\Category::getAllParentWithChild();
									@endphp
									@if($menu)
									<li>
										@foreach($menu as $cat_info)
												@if($cat_info->child_cat->count()>0)
													<li><a href="{{route('product-cat',$cat_info->slug)}}">{{$cat_info->title}}</a>
														<ul>
															@foreach($cat_info->child_cat as $sub_menu)
																<li><a href="{{route('product-sub-cat',[$cat_info->slug,$sub_menu->slug])}}">{{$sub_menu->title}}</a></li>
															@endforeach
														</ul>
													</li>
												@else
													<li><a href="{{route('product-cat',$cat_info->slug)}}">{{$cat_info->title}}</a></li>
												@endif
										@endforeach
									</li>
									@endif
                                </ul>
                            </div>
                            <!--/ Fin Widget Unique -->

                            <!-- Filtrer par prix -->
							<div class="single-widget range">
								<h3 class="title">{{ __('messages.filter_by_price') }}</h3>
								<div class="price-filter">
									<div class="price-filter-inner">
										@php
											$max=DB::table('products')->max('price');
										@endphp
										<div id="slider-range" data-min="0" data-max="{{$max}}"></div>
										<div class="product_filter">
											<button type="submit" class="filter_button">{{ __('messages.filter') }}</button>
											<div class="label-input">
												<span>{{ __('messages.range') }} :</span>
												<input style="" type="text" id="amount" readonly/>
												<input type="hidden" name="price_range" id="price_range" value="@if(!empty($_GET['price'])){{$_GET['price']}}@endif"/>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--/ Fin Filtrer par prix -->

                            <!-- Widget Posts récents -->
                            <div class="single-widget recent-post">
                                <h3 class="title">{{ __('messages.recent_articles') }}</h3>
                                @foreach($recent_products as $product)
                                    @php 
                                        $photo=explode(',',$product->photo);
                                    @endphp
                                    <div class="single-post first">
                                        <div class="image">
                                            <img src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                        </div>
                                        <div class="content">
                                            <h5><a href="{{route('product-detail',$product->slug)}}">{{$product->title}}</a></h5>
                                            @php
                                                $org=($product->price-($product->price*$product->discount)/100);
                                            @endphp
                                            <p class="price"><del class="text-muted">TND{{number_format($product->price,2)}}</del>   TND{{number_format($org,2)}}  </p>                                                
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!--/ Fin Widget Posts récents -->

                            <!-- Widget Marques -->
                            <div class="single-widget category">
                                <h3 class="title">{{ __('messages.brands') }}</h3>
                                <ul class="categor-list">
                                    @php
                                        $brands=DB::table('brands')->orderBy('title','ASC')->where('status','active')->get();
                                    @endphp
                                    @foreach($brands as $brand)
                                        <li><a href="{{route('product-brand',$brand->slug)}}">{{$brand->title}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <!--/ Fin Widget Marques -->
                    	</div>
					</div>
					<div class="col-lg-9 col-md-8 col-12">
						<div class="row">
							<div class="col-12">
								<!-- En-tête boutique -->
								<div class="shop-top">
									<div class="shop-shorter">
										<div class="single-shorter">
											<label>{{ __('messages.show') }} :</label>
											<select class="show" name="show" onchange="this.form.submit();">
												<option value="">{{ __('messages.default') }}</option>
												<option value="8" @if(!empty($_GET['show']) && $_GET['show']=='9') selected @endif>08</option>
												<option value="10" @if(!empty($_GET['show']) && $_GET['show']=='15') selected @endif>10</option>

											</select>
										</div>
										<div class="single-shorter">
											<label>{{ __('messages.sort_by') }} :</label>
											<select class='sortBy' name='sortBy' onchange="this.form.submit();">
												<option value="">{{ __('messages.default') }}</option>
												<option value="title" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='title') selected @endif>{{ __('messages.name') }}</option>
												<option value="price" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='price') selected @endif>{{ __('messages.price') }}</option>
												<option value="category" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='category') selected @endif>{{ __('messages.category') }}</option>
												<option value="brand" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='brand') selected @endif>{{ __('messages.brand') }}</option>
											</select>
										</div>
									</div>
									<ul class="view-mode">
										<li><a href="{{route('product-grids')}}"><i class="fa fa-th-large"></i></a></li>
										<li class="active"><a href="javascript:void(0)"><i class="fa fa-th-list"></i></a></li>
									</ul>
								</div>
								<!--/ Fin En-tête boutique -->
							</div>
						</div>
						<div class="row">
							@if(count($products))
								@foreach($products as $product)
								 	<!-- Liste produit unique -->
									<div class="col-12">
										<div class="row">
											<div class="col-lg-4 col-md-6 col-sm-6">
												<div class="single-product">
													<div class="product-img">
														<a href="{{route('product-detail',$product->slug)}}">
														@php 
															$photo=explode(',',$product->photo);
														@endphp
														<img class="default-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
														<img class="hover-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#{{$product->id}}" title="{{ __('messages.quick_view') }}" href="#"><i class=" ti-eye"></i><span>{{ __('messages.quick_view') }}</span></a>
																<a title="{{ __('messages.add_to_wishlist') }}" href="{{route('add-to-wishlist',$product->slug)}}" class="wishlist" data-id="{{$product->id}}"><i class=" ti-heart "></i><span>{{ __('messages.add_to_wishlist') }}</span></a>
															</div>
															<div class="product-action-2">
																<a title="{{ __('messages.add_to_cart') }}" href="{{route('add-to-cart',$product->slug)}}">{{ __('messages.add_to_cart') }}</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-8 col-md-6 col-12">
												<div class="list-content">
													<div class="product-content">
														<div class="product-price">
															@php
																$after_discount=($product->price-($product->price*$product->discount)/100);
															@endphp
															<span>TND{{number_format($after_discount,2)}}</span>
															<del>TND{{number_format($product->price,2)}}</del>
														</div>
														<h3 class="title"><a href="{{route('product-detail',$product->slug)}}">{{$product->title}}</a></h3>
													</div>
													<p class="des pt-2">{!! html_entity_decode($product->summary) !!}</p>
													<a href="javascript:void(0)" class="btn cart" data-id="{{$product->id}}">{{ __('messages.buy_now') }}</a>
												</div>
											</div>
										</div>
									</div>
									<!-- Fin Liste produit unique -->
								@endforeach
							@else
								<h4 class="text-warning" style="margin:100px auto;">{{ __('messages.no_products_available') }}</h4>
							@endif
						</div>
						 <div class="row">
						<div class="col-md-12 justify-content-center d-flex">
							{{-- {{$products->appends($_GET)->links()}} --}}
						</div>
					  </div>
					</div>
				</div>
			</div>
		</section>
		<!--/ Fin Style produit 1 -->	
	</form>

	<!-- Modal -->
	@if($products)
		@foreach($products as $key=>$product)
			<div class="modal fade" id="{{$product->id}}" tabindex="-1" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="{{ __('messages.close') }}"><span class="ti-close" aria-hidden="true"></span></button>
							</div>
							<div class="modal-body">
								<div class="row no-gutters">
									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<!-- Slider produit -->
											<div class="product-gallery">
												<div class="quickview-slider-active">
													@php 
														$photo=explode(',',$product->photo);
													@endphp
													@foreach($photo as $data)
														<div class="single-slider">
															<img src="{{$data}}" alt="{{$data}}">
														</div>
													@endforeach
												</div>
											</div>
										<!-- Fin Slider produit -->
									</div>
									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<div class="quickview-content">
											<h2>{{$product->title}}</h2>
											<div class="quickview-ratting-review">
												<div class="quickview-ratting-wrap">
													<div class="quickview-ratting">
														@php
															$rate=DB::table('product_reviews')->where('product_id',$product->id)->avg('rate');
															$rate_count=DB::table('product_reviews')->where('product_id',$product->id)->count();
														@endphp
														@for($i=1; $i<=5; $i++)
															@if($rate>=$i)
																<i class="yellow fa fa-star"></i>
															@else 
															<i class="fa fa-star"></i>
															@endif
														@endfor
													</div>
													<a href="#"> ({{$rate_count}} avis clients)</a>
												</div>
												<div class="quickview-stock">
													@if($product->stock >0)
													<span><i class="fa fa-check-circle-o"></i> {{$product->stock}} en stock</span>
													@else 
													<span><i class="fa fa-times-circle-o text-danger"></i> {{$product->stock}} en rupture de stock</span>
													@endif
												</div>
											</div>
											@php
												$after_discount=($product->price-($product->price*$product->discount)/100);
											@endphp
											<h3><small><del class="text-muted">TND{{number_format($product->price,2)}}</del></small>    TND{{number_format($after_discount,2)}}  </h3>
											<div class="quickview-peragraph">
												<p>{!! html_entity_decode($product->summary) !!}</p>
											</div>
											@if($product->size)
												<div class="size">
													<h4>{{ __('messages.size') }}</h4>
													<ul>
														@php 
															$sizes=explode(',',$product->size);
														@endphp
														@foreach($sizes as $size)
														<li><a href="#" class="one">{{$size}}</a></li>
														@endforeach
													</ul>
												</div>
											@endif
											<form action="{{route('single-add-to-cart')}}" method="POST">
												@csrf 
												<div class="quantity">
													<!-- Saisie quantité -->
													<div class="input-group">
														<div class="button minus">
															<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
																<i class="ti-minus"></i>
															</button>
														</div>
														<input type="hidden" name="slug" value="{{$product->slug}}">
														<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
														<div class="button plus">
															<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
																<i class="ti-plus"></i>
															</button>
														</div>
													</div>
													<!--/ Fin saisie quantité -->
												</div>
												<div class="add-to-cart">
													<button type="submit" class="btn">{{ __('messages.add_to_cart') }}</button>
													<a href="{{route('add-to-wishlist',$product->slug)}}" class="btn min"><i class="ti-heart"></i></a>
												</div>
											</form>
											<div class="default-social">
											<!-- ShareThis BEGIN --><div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
			</div>
		@endforeach
	@endif
	<!-- Fin Modal -->
@endsection

@push ('styles')
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
	.pagination{
        display:inline-flex;
    }
	.filter_button{
        text-align: center;
        background:#F7941D;
        padding:8px 16px;
        margin-top:10px;
        color: white;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script>
    $(document).ready(function(){
        if ($("#slider-range").length > 0) {
            const max_value = parseInt( $("#slider-range").data('max') ) || 500;
            const min_value = parseInt($("#slider-range").data('min')) || 0;
            const currency = $("#slider-range").data('currency') || '';
            let price_range = min_value+'-'+max_value;
            if($("#price_range").length > 0 && $("#price_range").val()){
                price_range = $("#price_range").val().trim();
            }
            
            let price = price_range.split('-');
            $("#slider-range").slider({
                range: true,
                min: min_value,
                max: max_value,
                values: price,
                slide: function (event, ui) {
                    $("#amount").val(currency + ui.values[0] + " -  "+currency+ ui.values[1]);
                    $("#price_range").val(ui.values[0] + "-" + ui.values[1]);
                }
            });
        }
        if ($("#amount").length > 0) {
            const m_currency = $("#slider-range").data('currency') || '';
            $("#amount").val(m_currency + $("#slider-range").slider("values", 0) +
                "  -  "+m_currency + $("#slider-range").slider("values", 1));
        }
    })
</script>
@endpush
