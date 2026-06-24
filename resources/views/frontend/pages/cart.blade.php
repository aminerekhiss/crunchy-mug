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
    <!-- Fil d'Ariane -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ route('home') }}">{{ __('messages.home') }}<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="#">{{ __('messages.cart') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Fil d'Ariane -->

    <!-- Panier -->
    <div class="shopping-cart section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Résumé du panier -->
                    <form action="{{ route('cart.update') }}" method="POST" id="cart_form">
                        @csrf
                        <table class="table shopping-summery">
                            <thead>
                                <tr class="main-hading">
                                    <th>{{ __('messages.product') }}</th>
                                    <th>{{ __('messages.name') }}</th>
                                    <th class="text-center">{{ __('messages.unit_price') }}</th>
                                    <th class="text-center">{{ __('messages.quantity') }}</th>
                                    <th class="text-center">{{ __('messages.total') }}</th>
                                    <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                                </tr>
                            </thead>
                            <tbody id="cart_item_list">
                                @if(Helper::getAllProductFromCart())
                                    @foreach(Helper::getAllProductFromCart() as $key => $cart)
                                        @php
                                            $photo = explode(',', $cart->product['photo']);
                                        @endphp
                                        <tr>
                                            <td class="image" data-title="No">
                                                <img src="{{ $photo[0] }}" alt="{{ $cart->product['title'] }}">
                                            </td>
                                            <td class="product-des" data-title="Description">
                                                <p class="product-name">
                                                    <a href="{{ route('product-detail', $cart->product['slug']) }}" target="_blank">
                                                        {{ $cart->product['title'] }}
                                                    </a>
                                                </p>
                                                <p class="product-des">{!! $cart['summary'] !!}</p>
                                            </td>
                                            <td class="price text-center" data-title="Price">
                                                <span>TND {{ number_format($cart['price'], 2) }}</span>
                                            </td>
                                            <td class="qty text-center" data-title="Qty">
                                                <div class="input-group">
                                                    <div class="button minus">
                                                        <button type="button" class="btn btn-primary btn-number" data-type="minus" data-field="quant[{{ $key }}]">
                                                            <i class="ti-minus"></i>
                                                        </button>
                                                    </div>
                                                    <input type="text" name="quant[{{ $key }}]" class="input-number" data-min="1" data-max="100" value="{{ $cart->quantity }}">
                                                    <input type="hidden" name="qty_id[]" value="{{ $cart->id }}">
                                                    <div class="button plus">
                                                        <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[{{ $key }}]">
                                                            <i class="ti-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="total-amount cart_single_price text-center" data-title="Total">
                                                <span class="money">TND {{ number_format($cart['amount'], 2) }}</span>
                                            </td>
                                            <td class="action text-center" data-title="Remove">
                                                <a href="{{ route('cart-delete', $cart->id) }}">
                                                    <i class="ti-trash remove-icon"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="5"></td>
                                        <td class="float-right">
                                            <button class="btn float-right" type="submit">{{ __('messages.update_cart') }}</button>
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td class="text-center" colspan="6">
                                            {{ __('messages.no_products_in_cart') }} <a href="{{ route('product-grids') }}" style="color:blue;">{{ __('messages.continue_shopping') }}</a>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </form>
                    <!--/ Fin Résumé du panier -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Montant total -->
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-5 col-12">
                                <div class="left">
                                    <div class="coupon">
                                        <form action="{{ route('coupon-store') }}" method="POST">
                                            @csrf
                                            <input name="code" placeholder="{{ __('messages.enter_coupon_code') }}">
                                            <button class="btn">{{ __('messages.apply') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-7 col-12">
                                <div class="right">
                                    <ul>
                                        <li class="order_subtotal" data-price="{{ Helper::totalCartPrice() }}">
                                            {{ __('messages.cart_subtotal') }}
                                            <span>TND {{ number_format(Helper::totalCartPrice(), 2) }}</span>
                                        </li>

                                        @if(session()->has('coupon'))
                                            <li class="coupon_price" data-price="{{ Session::get('coupon')['value'] }}">
                                                {{ __('messages.you_save') }}
                                                <span>TND {{ number_format(Session::get('coupon')['value'], 2) }}</span>
                                            </li>
                                        @endif

                                        @php
                                            $total_amount = Helper::totalCartPrice();
                                            if(session()->has('coupon')){
                                                $total_amount -= Session::get('coupon')['value'];
                                            }
                                        @endphp
                                        <li class="last" id="order_total_price">
                                            {{ __('messages.to_pay') }}
                                            <span>TND {{ number_format($total_amount, 2) }}</span>
                                        </li>
                                    </ul>
                                    <div class="button5">
                                        <a href="{{ route('checkout') }}" class="btn">{{ __('messages.proceed_to_checkout') }}</a>
                                        <a href="{{ route('product-grids') }}" class="btn">{{ __('messages.continue_shopping') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Fin Montant total -->
                </div>
            </div>
        </div>
    </div>
    <!--/ Fin Panier -->

    <!-- Début Zone Services Boutique -->
    <section class="shop-services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Service unique -->
                    <div class="single-service">
                        <i class="ti-rocket"></i>
                        <h4>{{ __('messages.free_delivery') }}</h4>
                        <p>{{ __('messages.orders_over_100_tnd') }}</p>
                    </div>
                    <!-- Fin Service unique -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Service unique -->
                    <div class="single-service">
                        <i class="ti-reload"></i>
                        <h4>{{ __('messages.free_return') }}</h4>
                        <p>{{ __('messages.return_within_30_days') }}</p>
                    </div>
                    <!-- Fin Service unique -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Service unique -->
                    <div class="single-service">
                        <i class="ti-lock"></i>
                        <h4>{{ __('messages.secure_payment') }}</h4>
                        <p>{{ __('messages.payment_100_secure') }}</p>
                    </div>
                    <!-- Fin Service unique -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Service unique -->
                    <div class="single-service">
                        <i class="ti-tag"></i>
                        <h4>{{ __('messages.best_price') }}</h4>
                        <p>{{ __('messages.price_guaranteed') }}</p>
                    </div>
                    <!-- Fin Service unique -->
                </div>
            </div>
        </div>
    </section>
    <!-- Fin Zone Services Boutique -->

    <!-- Début Newsletter Boutique -->
    @include('frontend.layouts.newsletter')
    <!-- Fin Newsletter Boutique -->

@endsection

@push('styles')
    <style>
        li.shipping {
            display: inline-flex;
            width: 100%;
            font-size: 14px;
        }
        li.shipping .input-group-icon {
            width: 100%;
            margin-left: 10px;
        }
        .input-group-icon .icon {
            position: absolute;
            left: 20px;
            top: 0;
            line-height: 40px;
            z-index: 3;
        }
        .form-select {
            height: 30px;
            width: 100%;
        }
        .form-select .nice-select {
            border: none;
            border-radius: 0px;
            height: 40px;
            background: #f6f6f6 !important;
            padding-left: 45px;
            padding-right: 40px;
            width: 100%;
        }
        .list li {
            margin-bottom: 0 !important;
        }
        .list li:hover {
            background: #F7941D !important;
            color: white !important;
        }
        .form-select .nice-select::after {
            top: 14px;
        }
    </style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {

    // Met à jour le total d'une ligne produit
    function updateProductTotal(row) {
        const priceText = row.find('.price span').text(); // ex: "TND12.00"
        const price = parseFloat(priceText.replace('TND', '').trim()) || 0;

        const qtyInput = row.find('.input-number');
        let qty = parseInt(qtyInput.val()) || 1;

        const totalPrice = (price * qty).toFixed(2);

        row.find('.total-amount span').text('TND ' + totalPrice);

        return parseFloat(totalPrice);
    }

    // Met à jour le total général du panier
    function updateCartTotal() {
        let grandTotal = 0;

        // Pour chaque ligne produit
        $('.shopping-summery tbody tr').each(function() {
            // Ignore les lignes sans prix (ex: bouton mettre à jour ou message vide)
            if ($(this).find('.price').length > 0) {
                grandTotal += updateProductTotal($(this));
            }
        });

        // Met à jour le sous-total affiché
        $('.order_subtotal').attr('data-price', grandTotal);
        $('.order_subtotal span').text('TND ' + grandTotal.toFixed(2));

        // Récupère la valeur du coupon si présent
        const couponValue = parseFloat($('.coupon_price').attr('data-price')) || 0;

        // Calcule le total après réduction
        const totalAfterCoupon = grandTotal - couponValue;

        $('#order_total_price span').text('TND ' + totalAfterCoupon.toFixed(2));
    }

    // Fonction pour activer/désactiver les boutons + et -
    function toggleButtons(fieldName, val, min, max) {
        if (val <= min) {
            $(".btn-number[data-type='minus'][data-field='" + fieldName + "']").attr('disabled', true);
        } else {
            $(".btn-number[data-type='minus'][data-field='" + fieldName + "']").removeAttr('disabled');
        }
        if (val >= max) {
            $(".btn-number[data-type='plus'][data-field='" + fieldName + "']").attr('disabled', true);
        } else {
            $(".btn-number[data-type='plus'][data-field='" + fieldName + "']").removeAttr('disabled');
        }
    }

    // Gestion du clic sur les boutons + et -
    $('.btn-number').off('click').on('click', function(e) {
        e.preventDefault();

        let type = $(this).attr('data-type');
        let fieldName = $(this).attr('data-field');

        // Sélectionne **uniquement** l'input lié
        let input = $("input[name='" + fieldName + "']");

        if (input.length === 0) return; // Pas d'input correspondant

        let currentVal = parseInt(input.val());
        let min = parseInt(input.attr('data-min'));
        let max = parseInt(input.attr('data-max'));

        if (!isNaN(currentVal)) {
            if (type === 'minus' && currentVal > min) {
                input.val(currentVal - 1).trigger('change');
            }
            if (type === 'plus' && currentVal < max) {
                input.val(currentVal + 1).trigger('change');
            }
        } else {
            input.val(min).trigger('change');
        }

        toggleButtons(fieldName, parseInt(input.val()), min, max);
    });

    // Gestion de la saisie manuelle dans l'input quantité
    $('.input-number').off('change').on('change', function() {
        let min = parseInt($(this).attr('data-min'));
        let max = parseInt($(this).attr('data-max'));
        let valueCurrent = parseInt($(this).val());
        let name = $(this).attr('name');

        if (isNaN(valueCurrent) || valueCurrent < min) {
            alert('La quantité minimale est ' + min);
            $(this).val(min);
            valueCurrent = min;
        } else if (valueCurrent > max) {
            alert('La quantité maximale est ' + max);
            $(this).val(max);
            valueCurrent = max;
        }

        toggleButtons(name, valueCurrent, min, max);

        // Recalculer les totaux quand quantité change
        updateCartTotal();
    });

    // Initialisation des boutons désactivés si besoin au chargement
    $('.input-number').each(function() {
        let min = parseInt($(this).attr('data-min'));
        let max = parseInt($(this).attr('data-max'));
        let val = parseInt($(this).val());
        let name = $(this).attr('name');
        toggleButtons(name, val, min, max);
    });

    // Calcul initial des totaux au chargement
    updateCartTotal();

});
</script>
@endpush
