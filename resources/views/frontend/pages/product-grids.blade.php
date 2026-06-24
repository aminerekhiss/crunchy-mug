@extends('frontend.layouts.master')

@section('title', __('messages.crunchy_mug'))

@section('main-content')
	<!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">{{ __('messages.home') }}<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">{{ __('messages.product_grid') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Breadcrumbs -->

    <!-- Style Produit -->
   <form action="{{ route('shop.filter') }}" method="POST">
    @csrf
    <section class="product-area shop-sidebar shop section">
        <div class="container">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-lg-3 col-md-4 col-12">
                    <aside class="shop-sidebar">
                        <!-- Catégories -->
                        <div class="single-widget category">
                            <h3 class="title">{{ __('messages.categories') }}</h3>
                            <ul class="categor-list">
                                @php $menu = App\Models\Category::getAllParentWithChild(); @endphp
                                @if($menu)
                                    @foreach($menu as $cat_info)
                                        @if($cat_info->child_cat->count() > 0)
                                            <li>
                                                <a href="{{ route('product-cat', $cat_info->slug) }}">{{ $cat_info->title }}</a>
                                                <ul>
                                                    @foreach($cat_info->child_cat as $sub_menu)
                                                        <li><a href="{{ route('product-sub-cat', [$cat_info->slug, $sub_menu->slug]) }}">{{ $sub_menu->title }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @else
                                            <li><a href="{{ route('product-cat', $cat_info->slug) }}">{{ $cat_info->title }}</a></li>
                                        @endif
                                    @endforeach
                                @endif
                            </ul>
                        </div>

                        <!-- Filtrer par prix -->
                        <div class="single-widget range">
                            <h3 class="title">{{ __('messages.filter_by_price') }}</h3>
                            @php $max = DB::table('products')->max('price'); @endphp
                            <div class="price-filter-inner">
                                <div id="slider-range" data-min="0" data-max="{{ $max }}"></div>
                                <div class="product_filter">
                                    <button type="submit" class="filter_button">{{ __('messages.filter') }}</button>
                                    <div class="label-input">
                                        <span>{{ __('messages.range') }} :</span>
                                        <input type="text" id="amount" readonly />
                                        <input type="hidden" name="price_range" id="price_range" value="@if(!empty($_GET['price'])){{ $_GET['price'] }}@endif"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Articles récents -->
                        <div class="single-widget recent-post">
                            <h3 class="title">{{ __('messages.recent_articles') }}</h3>
                            @foreach($recent_products as $product)
                                @php $photo = explode(',', $product->photo); @endphp
                                <div class="single-post first">
                                    <div class="image">
                                        <img src="{{ $photo[0] }}" alt="{{ $photo[0] }}">
                                    </div>
                                    <div class="content">
                                        <h5><a href="{{ route('product-detail', $product->slug) }}">{{ $product->title }}</a></h5>
                                        @php $org = ($product->price - ($product->price * $product->discount) / 100); @endphp
                                        <p class="price">
                                            <del class="text-muted">TND{{ number_format($product->price, 2) }}</del>
                                            TND{{ number_format($org, 2) }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Marques -->
                        <div class="single-widget category">
                            <h3 class="title">{{ __('messages.brands') }}</h3>
                            <ul class="categor-list">
                                @php $brands = DB::table('brands')->orderBy('title','ASC')->where('status','active')->get(); @endphp
                                @foreach($brands as $brand)
                                    <li><a href="{{ route('product-brand', $brand->slug) }}">{{ $brand->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>

                <!-- Produits -->
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="shop-top d-flex justify-content-between align-items-center mb-4">
                                <div class="shop-shorter d-flex gap-3">
                                    <div class="single-shorter">
                                        <label>{{ __('messages.show') }} :</label>
                                        <select name="show" onchange="this.form.submit();">
                                            <option value="">{{ __('messages.default') }}</option>
                                            @foreach([8,10] as $num)
                                                <option value="{{ $num }}" @if(!empty($_GET['show']) && $_GET['show']==$num) selected @endif>{{ $num }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="single-shorter">
                                        <label>{{ __('messages.sort_by') }} :</label>
                                        <select name="sortBy" onchange="this.form.submit();">
                                            <option value="">{{ __('messages.default') }}</option>
                                            <option value="title" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='title') selected @endif>{{ __('messages.name') }}</option>
                                            <option value="price" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='price') selected @endif>{{ __('messages.price') }}</option>
                                            <option value="category" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='category') selected @endif>{{ __('messages.category') }}</option>
                                            <option value="brand" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='brand') selected @endif>{{ __('messages.brand') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <ul class="view-mode">
                                    <li class="active"><a href="javascript:void(0)"><i class="fa fa-th-large"></i></a></li>
                                    <li><a href="{{ route('product-lists') }}"><i class="fa fa-th-list"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @forelse($products as $product)
                            <div class="col-lg-4 col-md-6 col-12 mb-4">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="{{ route('product-detail', $product->slug) }}">
                                            @php $photo = explode(',', $product->photo); @endphp
                                            <img class="default-img" src="{{ $photo[0] }}" alt="{{ $photo[0] }}">
                                            <img class="hover-img" src="{{ $photo[0] }}" alt="{{ $photo[0] }}">
                                            @if($product->discount)
                                                <span class="price-dec">{{ $product->discount }}% {{ __('messages.discount') }}</span>
                                            @endif
                                        </a>
                                        <div class="button-head">
                                            <div class="product-action">
                                                <a data-toggle="modal" data-target="#{{ $product->id }}" title="{{ __('messages.quick_view') }}" href="#"><i class="ti-eye"></i><span>{{ __('messages.quick_view') }}</span></a>
                                                <a title="{{ __('messages.wishlist') }}" href="{{ route('add-to-wishlist', $product->slug) }}" class="wishlist" data-id="{{ $product->id }}"><i class="ti-heart"></i><span>{{ __('messages.add_to_wishlist') }}</span></a>
                                            </div>
                                            <div class="product-action-2">
                                                <a title="{{ __('messages.add_to_cart') }}" href="{{ route('add-to-cart', $product->slug) }}">{{ __('messages.add_to_cart') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="{{ route('product-detail', $product->slug) }}">{{ $product->title }}</a></h3>
                                        @php $after_discount = ($product->price - ($product->price * $product->discount) / 100); @endphp
                                        <span>TND{{ number_format($after_discount, 2) }}</span>
                                        <del style="padding-left:4%;">TND{{ number_format($product->price, 2) }}</del>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h4 class="text-warning mx-auto my-5">{{ __('messages.no_products_available') }}</h4>
                        @endforelse
                    </div>

                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center">
                            {{ $products->appends($_GET)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>

    <!--/ Fin Style Produit 1  -->

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
                                        <!-- Galerie produit -->
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
                                        <!-- Fin Galerie produit -->
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
                                                    <a href="#"> ({{$rate_count}} {{ __('messages.customer_reviews') }})</a>
                                                </div>
                                                <div class="quickview-stock">
                                                    @if($product->stock >0)
                                                    <span><i class="fa fa-check-circle-o"></i> {{$product->stock}} {{ __('messages.in_stock') }}</span>
                                                    @else
                                                    <span><i class="fa fa-times-circle-o text-danger"></i> {{ __('messages.out_of_stock') }}</span>
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
                                                    <h4>Taille</h4>
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
                                            <div class="size">
                                                <div class="row">
                                                    <div class="col-lg-6 col-12">
                                                        <h5 class="title">Taille</h5>
                                                        <select>
                                                            @php
                                                            $sizes=explode(',',$product->size);
                                                            @endphp
                                                            @foreach($sizes as $size)
                                                                <option>{{$size}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <form action="{{route('single-add-to-cart')}}" method="POST">
                                                @csrf
                                                <div class="quantity">
                                                    <!-- Saisie Quantité -->
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
                                                    <!--/ Fin Saisie Quantité -->
                                                </div>
                                                <div class="add-to-cart">
                                                    <button type="submit" class="btn">Ajouter au panier</button>
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
@push('styles')
<style>
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
    /* Fond avec voile sombre */
    .background-image {
        position: relative;
        z-index: 1;
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('{{ asset('images/image7.jpg') }}') center center / cover no-repeat;
        padding: 60px 0;
        color: #fff;
    }

    /* Cartes du sidebar */
    .shop-sidebar .single-widget {
        background-color: rgba(255, 255, 255, 0.95);
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        margin-bottom: 25px;
        color: #333;
    }

    .shop-sidebar .single-widget h3.title {
        font-size: 20px;
        margin-bottom: 15px;
        color: #222;
        font-weight: bold;
        border-bottom: 2px solid #ff7f50;
        padding-bottom: 5px;
    }

    .shop-sidebar ul.categor-list li a {
        color: #555;
        text-decoration: none;
        transition: all 0.3s ease-in-out;
    }

    .shop-sidebar ul.categor-list li a:hover {
        color: #ff7f50;
        padding-left: 5px;
    }

    /* Range Slider */
    #slider-range {
        margin: 10px 0;
        background: #ddd;
        height: 4px;
        border-radius: 4px;
    }

    .filter_button {
        background-color: #ff7f50;
        border: none;
        color: #fff;
        padding: 8px 20px;
        border-radius: 8px;
        margin-top: 10px;
        cursor: pointer;
        transition: background 0.3s;
    }

    .filter_button:hover {
        background-color: #e8673f;
    }

    .label-input input {
        background: #f5f5f5;
        border: 1px solid #ccc;
        border-radius: 6px;
        padding: 5px 10px;
        margin-top: 5px;
    }

    /* Articles récents */
    .single-post.first {
        display: flex;
        gap: 12px;
        margin-bottom: 15px;
    }

    .single-post.first .image img {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border-radius: 8px;
    }

    .single-post.first .content h5 {
        font-size: 16px;
        margin-bottom: 5px;
    }

    .single-post.first .content .price {
        font-size: 14px;
        color: #e8673f;
    }

    /* Marques */
    .shop-sidebar ul.categor-list {
        padding-left: 15px;
    }

    /* Adaptations générales */
    .shop .col-lg-3 {
        padding-right: 20px;
    }

    .shop .col-lg-9 {
        padding-left: 20px;
    }

    .shop .product-img img {
        border-radius: 10px;
    }

    /* Fond avec voile sombre */
    .background-image {
        position: relative;
        z-index: 1;
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('{{ asset('images/image7.jpg') }}') center center / cover no-repeat;
        padding: 60px 0;
        color: #fff;
    }

    /* Cartes du sidebar */
    .shop-sidebar .single-widget {
        background-color: rgba(255, 255, 255, 0.95);
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        margin-bottom: 25px;
        color: #333;
    }

    .shop-sidebar .single-widget h3.title {
        font-size: 20px;
        margin-bottom: 15px;
        color: #222;
        font-weight: bold;
        border-bottom: 2px solid #ff7f50;
        padding-bottom: 5px;
    }

    .shop-sidebar ul.categor-list li a {
        color: #555;
        text-decoration: none;
        transition: all 0.3s ease-in-out;
    }

    .shop-sidebar ul.categor-list li a:hover {
        color: #ff7f50;
        padding-left: 5px;
    }

    /* Range Slider */
    #slider-range {
        margin: 10px 0;
        background: #ddd;
        height: 4px;
        border-radius: 4px;
    }

    .filter_button {
        background-color: #ff7f50;
        border: none;
        color: #fff;
        padding: 8px 20px;
        border-radius: 8px;
        margin-top: 10px;
        cursor: pointer;
        transition: background 0.3s;
    }

    .filter_button:hover {
        background-color: #e8673f;
    }

    .label-input input {
        background: #f5f5f5;
        border: 1px solid #ccc;
        border-radius: 6px;
        padding: 5px 10px;
        margin-top: 5px;
    }

    /* Articles récents */
    .single-post.first {
        display: flex;
        gap: 12px;
        margin-bottom: 15px;
    }

    .single-post.first .image img {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border-radius: 8px;
    }

    .single-post.first .content h5 {
        font-size: 16px;
        margin-bottom: 5px;
    }

    .single-post.first .content .price {
        font-size: 14px;
        color: #e8673f;
    }

    /* Marques */
    .shop-sidebar ul.categor-list {
        padding-left: 15px;
    }

    /* Adaptations générales */
    .shop .col-lg-3 {
        padding-right: 20px;
    }

    .shop .col-lg-9 {
        padding-left: 20px;
    }

    .shop .product-img img {
        border-radius: 10px;
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
