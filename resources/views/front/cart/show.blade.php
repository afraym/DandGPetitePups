@extends('layouts.front')
@section('content')
{{-- @dd($cartItems); --}}
<div class="inner-page-banner" bis_skin_checked="1">
    <div class="breadcrumb-vec-btm" bis_skin_checked="1">
        <img class="img-fluid" src="assets/images/bg/inner-banner-btm-vec.png" alt="">
    </div>
    <div class="container" bis_skin_checked="1">
        <div class="row justify-content-center align-items-center text-center" bis_skin_checked="1">
            <div class="col-lg-6 align-items-center" bis_skin_checked="1">
                <div class="banner-content" bis_skin_checked="1">
                    <h1>Cart</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-lg-6" bis_skin_checked="1">
                <div class="banner-img d-lg-block d-none" bis_skin_checked="1">
                    <div class="banner-img-bg" bis_skin_checked="1">
                        <img class="img-fluid" src="assets/images/bg/inner-banner-vec.png" alt="">
                    </div>
                    <img class="img-fluid" src="assets/images/bg/inner-banner-img.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="cart-section pt-120 pb-120" bis_skin_checked="1">
    <div class="container" bis_skin_checked="1">
        <div class="row" bis_skin_checked="1">
            <div class="col-12" bis_skin_checked="1">
                <div class="table-wrapper" bis_skin_checked="1">
                    <table class="eg-table table cart-table">
                        <thead>
                            <tr>
                                <th>Delete</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartItems as $item)
                            <tr class="cart-item">
                                <td data-label="Delete">
                                    <div class="delete-icon" bis_skin_checked="1">
                                        <i class="bi bi-x delete-cart-item" data-item-id="{{ $item->id }}"></i>
                                    </div>
                                </td>
                                <td data-label="Image">
                                    @if ($item->image)
                                        <img src="/{{ $item->image->link .'/'. $item->image->nameWithoutExt }}-mini.webp" alt="">
                                    @endif
                                </td>
                                <td data-label="Name"><a href="/puppy/{{ $item->itemable_id }}/{{ $item->name }}">{{ $item->name }}</a></td>
                                <td data-label="Price"><del>$30.00</del> ${{ $item->price}}</td>
                                <td data-label="Subtotal">${{ $item->price }}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row g-4" bis_skin_checked="1">
            <div class="col-lg-4" bis_skin_checked="1">
                <div class="coupon-area" bis_skin_checked="1">
                    <div class="cart-coupon-input" bis_skin_checked="1">
                        <h5 class="coupon-title">Coupon Code</h5>
                        <form class="coupon-input d-flex align-items-center">
                            <input type="text" placeholder="Coupon Code">
                            <button type="submit">Apply Code</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8" bis_skin_checked="1">
                <table class="table total-table">
                    <thead>
                        <tr>
                            <th>Cart Totals</th>
                            <th></th>
                            <th>$128.70</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Shipping</td>
                            <td>
                                <ul class="cost-list text-start">
                                    <li>Shipping Fee</li>
                                    <li>Total ( tax excl.)</li>
                                    <li>Total ( tax incl.)</li>
                                    <li>Taxes</li>
                                    <li>Shipping Enter your address to view shipping options. <br> <a href="#">Calculate
                                            shipping</a>
                                    </li>
                                </ul>
                            </td>
                            <td>
                                <ul class="single-cost text-center">
                                    <li>Fee</li>
                                    <li>$15
                                    </li>
                                    <li>
                                    </li>
                                    <li>$15</li>
                                    <li>$15</li>
                                    <li>$5</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>Subtotal</td>
                            <td></td>
                            <td>$162.70</td>
                        </tr>
                    </tbody>
                </table>
                <ul class="cart-btn-group">
                    <li><a href="/shop" class="primary-btn2 btn-lg">Continue to shopping</a></li>
                    <li><a href="/checkout" class="primary-btn3 btn-lg">Proceed to Checkout</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection