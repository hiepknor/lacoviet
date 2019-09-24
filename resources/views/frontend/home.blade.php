@extends('layouts.frontend.app')

@section('pageTitle', 'Trang chủ')

@section('content')
    @foreach($all_categories as $caterory)
        <div class="original-label lastest-products-label">
            <span><h3>{{ $caterory->name }}</h3></span>
        </div>
        <div class="home-grid owl-carousel owl-theme">
            @foreach($products->where('category_id', $caterory->id) as $product)
                <div class="grid-item">
                    <a class="item-link" href="" title="{{ $product->name }}">
                        <div class="item-thumb">
                            <img src="" alt="{{ $product->name }}">
                            @if($product->promotion_price != 0)
                                <div class="sale-sticker"><img src="{{ asset('images/frontend/sale-sticker.png') }}" alt="Sale sticker">
                                    <span class="sale-percent">{{ round(($product->unit_price - $product->promotion_price) / $product->unit_price * 100, 0) }}&nbsp;%</span>
                                </div>
                            @endif
                        </div>
                        <div class="item-name center">{{ $product->name }}</div>
                        <div class="item-price">
                            @if($product->promotion_price == 0)
                                <span class="unit-price center"></span>
                                <span class="promotion-price center">{{ $product->unit_price }}&nbsp;₫</span>
                            @else
                                <span class="unit-price center">{{ $product->unit_price }}&nbsp;₫</span>
                                <span class="promotion-price center">{{ $product->promotion_price }}&nbsp;₫</span>
                            @endif
                        </div>
                    </a>
                    <a class="add-to-cart center" href="{{ URL::to('them-gio-hang/' . $product->id) }}"><i class="fas fa-cart-plus"></i>&nbsp;Đặt mua ngay</a>
                </div>
            @endforeach
        </div>
    @endforeach
@endsection
