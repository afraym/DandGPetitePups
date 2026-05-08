@extends('layouts.front')
@section('content')

<div class="inner-page-banner">
    <div class="breadcrumb-vec-btm">
        <img class="img-fluid" src="{{ asset('/assets/images/bg/inner-banner-btm-vec.png') }}" alt>
    </div>
    <div class="container">
        <div class="row justify-content-center align-items-center text-center">
            <div class="col-lg-6 align-items-center">
                <div class="banner-content">
                    <h1>My Favorites</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Favorites</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="banner-img d-lg-block d-none">
                    <div class="banner-img-bg">
                        <img class="img-fluid" src="{{ asset('/assets/images/bg/inner-banner-vec.png') }}" alt>
                    </div>
                    <img class="img-fluid" src="{{ asset('/assets/images/bg/inner-banner-img.png') }}" alt>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="home3-collection-area mb-120 pt-120">
    <div class="container">
        <div class="row mb-60">
            <div class="col-lg-12 d-flex align-items-center justify-content-between flex-wrap gap-3">
                <div class="section-title3">
                    <h2><img src="https://demo.egenslab.com/html/scooby/preview/assets/images/icon/h3-sec-tt-vect-left.svg" alt><span>Saved Puppies</span><img src="https://demo.egenslab.com/html/scooby/preview/assets/images/icon/h3-sec-tt-vect-right.svg" alt></h2>
                </div>
            </div>
        </div>

        @if($puppies->isEmpty())
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="alert alert-info mb-0">
                        No favorites yet. Tap the heart icon on a puppy to save it here.
                    </div>
                </div>
            </div>
        @else
            <div class="row g-4 justify-content-center">
                @foreach($puppies as $puppy)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="collection-card">
                            <div class="offer-card">
                                <span>Favorite</span>
                            </div>
                            <div class="collection-img">
                                <a href="/puppy/{{ $puppy->id }}/{{ $puppy->name }}">
                                    @if(empty($puppy->puppy_images->first()))
                                        <img loading="lazy" class="img-fluid" src="404" alt="{{ $puppy->name }} image not found">
                                    @else
                                        <img loading="lazy" class="img-fluid" src="{{ $puppy->puppy_images->first()->link . $puppy->puppy_images->first()->nameWithoutExt }}-thumb.webp" alt="{{ $puppy->name }} image">
                                    @endif
                                </a>
                                <div class="view-dt-btn">
                                    <div class="plus-icon">
                                        <i class="bi bi-plus"></i>
                                    </div>
                                    <a href="/puppy/{{ $puppy->id }}/{{ $puppy->name }}">View Details</a>
                                </div>
                                <ul class="cart-icon-list">
                                    <li><a href="{{ route('favorites.toggle', $puppy->id) }}"><img src="https://demo.egenslab.com/html/scooby/preview/assets/images/icon/Icon-favorites3.svg" alt="remove favorite"></a></li>
                                </ul>
                            </div>
                            <div class="collection-content text-center">
                                <h4><a href="/puppy/{{ $puppy->id }}/{{ $puppy->name }}">{{ $puppy->name }}</a></h4>
                                <div class="price">
                                    <h6>${{ $puppy->price }}</h6>
                                    <del>${{ $puppy->price * 1.5 }}</del>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

@endsection
