@extends('layouts.front')
@section('content')

<div class="inner-page-banner">
<div class="breadcrumb-vec-btm">
<img class="img-fluid" src="{{asset('/assets/images/bg/inner-banner-btm-vec.png')}}" alt>
</div>
<div class="container">
<div class="row justify-content-center align-items-center text-center">
<div class="col-lg-6 align-items-center">
<div class="banner-content">
<h1>Shop Details</h1>
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Shop Details</li>
</ol>
</nav>
</div>
</div>
<div class="col-lg-6">
<div class="banner-img d-lg-block d-none">
<div class="banner-img-bg">
<img class="img-fluid" src="{{ asset('/assets/images/bg/inner-banner-vec.png')}}" alt>
</div>
<img class="img-fluid" src="{{ asset('/assets/images/bg/inner-banner-img.png')}}" alt>
</div>
</div>
</div>
</div>
</div>


<div class="shop-details-page pt-120 mb-120">
<div class="container">
<div class="row g-lg-4 gy-5 mb-120">
<div class="col-lg-7">
<div class="tab-content tab-content1" id="v-pills-tabContent">
<div class="tab-pane fade active show" id="v-pills-img1" role="tabpanel" aria-labelledby="v-pills-img1-tab">
<img class="img-fluid" src="{{asset('/assets/images/bg/shop-big-01.png')}}" alt>
</div>
<div class="tab-pane fade" id="v-pills-img2" role="tabpanel" aria-labelledby="v-pills-img2-tab">
<img class="img-fluid" src="{{asset('/assets/images/bg/shop-big-02.png')}}" alt>
</div>
<div class="tab-pane fade" id="v-pills-img3" role="tabpanel" aria-labelledby="v-pills-img3-tab">
<img class="img-fluid" src="{{asset('/assets/images/bg/shop-big-03.png')}}" alt>
</div>
<div class="tab-pane fade" id="v-pills-img4" role="tabpanel" aria-labelledby="v-pills-img4-tab">
<img class="img-fluid" src="{{asset('/assets/images/bg/shop-big-04.png')}}" alt>
</div>
<div class="tab-pane fade" id="v-pills-img5" role="tabpanel" aria-labelledby="v-pills-img5-tab">
<img class="img-fluid" src="{{asset('/assets/images/bg/shop-big-05.png')}}" alt>
</div>
</div>
<div class="nav nav1 nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
<button class="nav-link active" id="v-pills-img1-tab" data-bs-toggle="pill" data-bs-target="#v-pills-img1" type="button" role="tab" aria-controls="v-pills-img1" aria-selected="true">
<img src="{{asset('/assets/images/bg/shop-sm-01.png')}}" alt>
</button>
<button class="nav-link" id="v-pills-img2-tab" data-bs-toggle="pill" data-bs-target="#v-pills-img2" type="button" role="tab" aria-controls="v-pills-img2" aria-selected="false">
<img src="{{asset('/assets/images/bg/shop-sm-02.png')}}" alt>
</button>
<button class="nav-link" id="v-pills-img3-tab" data-bs-toggle="pill" data-bs-target="#v-pills-img3" type="button" role="tab" aria-controls="v-pills-img3" aria-selected="false">
<img src="{{asset('/assets/images/bg/shop-sm-03.png')}}" alt>
</button>
<button class="nav-link" id="v-pills-img4-tab" data-bs-toggle="pill" data-bs-target="#v-pills-img4" type="button" role="tab" aria-controls="v-pills-img4" aria-selected="false">
<img src="{{asset('/assets/images/bg/shop-sm-04.png')}}" alt>
</button>
<button class="nav-link" id="v-pills-img5-tab" data-bs-toggle="pill" data-bs-target="#v-pills-img5" type="button" role="tab" aria-controls="v-pills-img5" aria-selected="false">
<img src="{{asset('/assets/images/bg/shop-sm-05.png')}}" alt>
</button>
</div>
</div>
<div class="col-lg-5">
<div class="shop-details-content">
<h3>To Make Delicious Food Item.</h3>
<ul class="shopuct-review2 d-flex flex-row align-items-center mb-25">
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><a href="#" class="review-no">(1 customer review)</a></li>
</ul>
<div class="model-number">
<span>SKU:9852410</span>
</div>
<div class="price-tag">
<h4>$50.00 <del>$80.00</del></h4>
</div>
<p>Donec bibendum enim ut elit porta ullamcorper. Vestibulum Nai wekemdini iaculis vitae nulla. Morbi mattis nec mi ac mollis. </p>
<div class="shop-quantity d-flex align-items-center justify-content-start mb-20">
<div class="quantity d-flex align-items-center">
<div class="quantity-nav nice-number d-flex align-items-center">
<input type="number" value="1" min="1">
</div>
</div>
<a href="cart.html" class="primary-btn3">Add to cart</a>
</div>
<div class="buy-now-btn">
<a href="cart.html">Buy Now</a>
</div>
<div class="compare-wishlist-area">
<ul>
<li><a href="#"><span><img src="{{asset('/assets/images/icon/compare.svg')}}" alt></span> Compare</a></li>
<li><a href="#"><span><img src="{{asset('/assets/images/icon/Icon-favorites2.svg')}}" alt></span> Add to wishlist</a></li>
</ul>
</div>
<div class="pyment-method">
<h6>Guaranted Safe Checkout</h6>
<ul>
<li><img src="{{asset('/assets/images/icon/visa2.svg')}}" alt></li>
<li><img src="{{asset('/assets/images/icon/amex.svg')}}" alt></li>
<li><img src="{{asset('/assets/images/icon/discover.svg')}}" alt></li>
<li><img src="{{asset('/assets/images/icon/mastercard.svg')}}" alt></li>
<li><img src="{{asset('/assets/images/icon/stripe.svg')}}" alt></li>
<li><img src="{{asset('/assets/images/icon/paypal.svg')}}" alt></li>
<li><img src="{{asset('/assets/images/icon/pay.svg')}}" alt></li>
</ul>
</div>
</div>
</div>
</div>
<div class="row mb-120">
<div class="col-lg-12">
<div class="nav nav2 nav  nav-pills" id="v-pills-tab2" role="tablist" aria-orientation="vertical">
<button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="false">Description</button>
<button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="true">Excessive Info</button>
<button class="nav-link" id="v-pills-common-tab" data-bs-toggle="pill" data-bs-target="#v-pills-common" type="button" role="tab" aria-controls="v-pills-common" aria-selected="true">Review</button>
</div>
<div class="tab-content tab-content2" id="v-pills-tabContent2">
<div class="tab-pane fade active show" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
<div class="description">
<p class="para-2 mb-3">This is a type of food that is specifically formulated and intended for consumption by pets. It is usually sold in the form of dry kibble or wet cans, and is designed to meet the nutritional needs of a variety of different types of pets, including dogs, cats, and small animals like guinea pigs and rabbits.</p>
<p class="para-2 mb-3">This food may help from a variety of different ingredients, including meat, grains, vegetables, and fortified vitamins and minerals. Some pet food is formulated for specific life stages, such as puppy or senior, and may contain higher levels of certain nutrients to support the needs of pets at those stages of life.</p>
<p class="para-2 mb-0">At the end, also formulated for pets with special dietary needs, such as those with food allergies or sensitivities.</p>
</div>
</div>
<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
<div class="addithonal-information">
<table class="table total-table2">
<tbody>
<tr>
<td>Protein</td>
<td>25%, to build and repair tissues, produce enzymes, and maintain healthy organs.</td>
</tr>
<tr>
<td>Fats</td>
<td>0.5%, They also help keep the skin and coat healthy.</td>
</tr>
<tr>
<td>Carbohydrates</td>
<td>10%, provide energy and help pets maintain healthy weight and keep good the digestive system.</td>
</tr>
<tr>
<td>Minerals</td>
<td>20%,Help building strong bones, maintaining healthy muscles, and regulating the body's fluid balance.</td>
</tr>
<tr>
<td>Vitamins</td>
<td>15.5%, Essential for a variety of functions in the body, including the immune system, metabolism, and growth.</td>
</tr>
<tr>
<td>Animale</td>
<td> For Dog, Cat.</td>
</tr>
</tbody>
</table>
</div>
</div>
<div class="tab-pane fade" id="v-pills-common" role="tabpanel" aria-labelledby="v-pills-common-tab">
<div class="reviews-area">
<div class="row g-lg-4 gy-5">
<div class="col-lg-8">
<div class="number-of-review">
<h3>Review (02) :</h3>
</div>
<div class="review-list-area">
<ul class="review-list">
<li>
<div class="single-review d-flex justify-content-between flex-md-nowrap flex-wrap">
<div class="review-image">
<img src="{{ asset('assets/images/bg/review-img-1.png')}}" alt="image">
</div>
<div class="review-content">
<div class="c-header d-flex align-items-center">
<div class="review-meta">
<h5 class="mb-0"><a href="#">Rocky Mike ,</a></h5>
<div class="c-date">06 july,2022</div>
</div>
<div class="replay-btn">
<a href="#"><i class="bi bi-reply"></i>Reply</a>
</div>
</div>
<ul class="product-review">
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<div class="c-body">
<p>I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account. </p>
</div>
</div>
</div>
</li>
<li>
<div class="single-review d-flex justify-content-between flex-md-nowrap flex-wrap">
<div class="review-image">
<img src="{{ asset('assets/images/bg/review-img-3.png')}}" alt="image">
</div>
<div class="review-content">
<div class="c-header d-flex align-items-center">
<div class="review-meta">
<h5 class="mb-0"><a href="#">Rony Jhon ,</a></h5>
<div class="c-date">07 july,2022</div>
</div>
<div class="replay-btn">
<a href="#"><i class="bi bi-reply"></i>Reply</a>
</div>
</div>
<ul class="product-review">
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<div class="c-body">
<p>I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account. </p>
</div>
</div>
</div>
</li>
</ul>
</div>
</div>
<div class="col-lg-4">
<div class="review-form">
<div class="number-of-review">
<h3>Leave A Reply</h3>
</div>
<form>
<div class="row">
<div class="col-lg-12">
<div class="form-inner mb-20">
<input type="text" placeholder="Name*" required>
</div>
</div>
<div class="col-lg-12">
<div class="form-inner mb-20">
<input type="email" placeholder="Email*" required>
</div>
</div>
<div class="col-lg-12">
<div class="form-inner mb-10">
<textarea placeholder="Message..."></textarea>
</div>
</div>
<div class="col-lg-12">
<div class="form-inner2 mb-30">
<div class="review-rate-area">
<p>Your Rating</p>
<div class="rate">
<input type="radio" id="star5" name="rate" value="5">
<label for="star5" title="text">5 stars</label>
<input type="radio" id="star4" name="rate" value="4">
<label for="star4" title="text">4 stars</label>
<input type="radio" id="star3" name="rate" value="3">
<label for="star3" title="text">3 stars</label>
<input type="radio" id="star2" name="rate" value="2">
<label for="star2" title="text">2 stars</label>
<input type="radio" id="star1" name="rate" value="1">
<label for="star1" title="text">1 star</label>
</div>
</div>
</div>
</div>
<div class="col-lg-12">
<div class="form-inner two">
<button class="primary-btn3 btn-lg" type="submit">Post Comment</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12 d-flex flex-wrap align-items-center justify-content-md-between justify-content-start gap-2 mb-60">
<div class="inner-section-title">
<h2>Other Products</h2>
</div>
<div class="swiper-btn-wrap d-flex align-items-center">
<div class="slider-btn prev-btn-12">
<i class="bi bi-arrow-left"></i>
</div>
<div class="slider-btn next-btn-12">
<i class="bi bi-arrow-right"></i>
</div>
</div>
</div>
</div>
<div class="row">
<div class="swiper essential-items-slider">
<div class="swiper-wrapper">
<div class="swiper-slide">
<div class="collection-card">
<div class="offer-card">
<span>Offer</span>
</div>
<div class="collection-img">
<img class="img-gluid" src="{{ asset('assets/images/bg/category/h3-collection-01.png')}}" alt>
<div class="view-dt-btn">
<div class="plus-icon">
<i class="bi bi-plus"></i>
</div>
<a href="shop-details.html">View Details</a>
</div>
<ul class="cart-icon-list">
<li><a href="cart.html"><img src="{{ asset('assets/images/icon/Icon-cart3.svg')}}" alt></a></li>
<li><a href="#"><img src="{{ asset('assets/images/icon/Icon-favorites3.svg')}}" alt></a></li>
</ul>
</div>
<div class="collection-content text-center">
<h4><a href="shop-details.html">Whiskas Cat Food Core Tuna</a></h4>
<div class="price">
<h6>$25.00</h6>
<del>$30.00</del>
</div>
<div class="review">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
</div>
</div>
<div class="swiper-slide">
<div class="collection-card">
<div class="collection-img">
<img class="img-gluid" src="{{ asset('assets/images/bg/category/h3-collection-02.png')}}" alt>
<div class="view-dt-btn">
<div class="plus-icon">
<i class="bi bi-plus"></i>
</div>
<a href="shop-details.html">View Details</a>
</div>
<ul class="cart-icon-list">
<li><a href="cart.html"><img src="{{ asset('assets/images/icon/Icon-cart3.svg')}}" alt></a></li>
<li><a href="#"><img src="{{ asset('assets/images/icon/Icon-favorites3.svg')}}" alt></a></li>
</ul>
</div>
<div class="collection-content text-center">
<h4><a href="shop-details.html">Friskies Kitten Discoveries.</a></h4>
<div class="price">
<h6>$39.00</h6>
<del>$39.00</del>
</div>
<div class="review">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
</div>
</div>
<div class="swiper-slide">
<div class="collection-card">
<div class="offer-card sale">
<span>Hot Sale</span>
</div>
<div class="collection-img">
<img class="img-gluid" src="{{ asset('assets/images/bg/category/h3-collection-03.png')}}" alt>
<div class="view-dt-btn">
<div class="plus-icon">
<i class="bi bi-plus"></i>
</div>
<a href="shop-details.html">View Details</a>
</div>
<ul class="cart-icon-list">
<li><a href="cart.html"><img src="{{ asset('assets/images/icon/Icon-cart3.svg')}}" alt></a></li>
<li><a href="#"><img src="{{ asset('assets/images/icon/Icon-favorites3.svg')}}" alt></a></li>
</ul>
</div>
<div class="collection-content text-center">
<h4><a href="shop-details.html">Joules Cat Cotton House.</a></h4>
<div class="price">
<h6>$150.00</h6>
<del>$200.00</del>
</div>
<div class="review">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
</div>
</div>
<div class="swiper-slide">
<div class="collection-card">
<div class="collection-img">
<img class="img-gluid" src="{{asset('/assets/images/bg/category/h3-collection-04.png')}}" alt>
<div class="view-dt-btn">
<div class="plus-icon">
<i class="bi bi-plus"></i>
</div>
<a href="shop-details.html">View Details</a>
</div>
<ul class="cart-icon-list">
<li><a href="cart.html"><img src="{{asset('/assets/images/icon/Icon-cart3.svg')}}" alt></a></li>
<li><a href="#"><img src="{{asset('/assets/images/icon/Icon-favorites3.svg')}}" alt></a></li>
</ul>
</div>
<div class="collection-content text-center">
<h4><a href="shop-details.html">Natural Dog Fresh Food.</a></h4>
<div class="price">
<h6>$18.00</h6>
<del>$30.00</del>
</div>
<div class="review">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
</div>
</div>
<div class="swiper-slide">
<div class="collection-card">
<div class="offer-card sold-out">
<span>Sold Out</span>
</div>
<div class="collection-img">
<img class="img-gluid" src="{{asset('/assets/images/bg/category/h3-collection-07.png')}}" alt>
<div class="view-dt-btn">
<div class="plus-icon">
<i class="bi bi-plus"></i>
</div>
<a href="shop-details.html">View Details</a>
</div>
<ul class="cart-icon-list">
<li><a href="cart.html"><img src="{{asset('/assets/images/icon/Icon-cart3.svg')}}" alt></a></li>
<li><a href="#"><img src="{{asset('/assets/images/icon/Icon-favorites3.svg')}}" alt></a></li>
</ul>
</div>
<div class="collection-content text-center">
<h4><a href="shop-details.html">Rooibos Pet Food Supple</a></h4>
<div class="price">
<h6>$75.00</h6>
<del>$80.00</del>
</div>
<div class="review">
<ul>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
<li><i class="bi bi-star-fill"></i></li>
</ul>
<span>(50)</span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection