@extends('layouts.front')
@section('content')
<div class="inner-page-banner" bis_skin_checked="1">
    <div class="breadcrumb-vec-btm" bis_skin_checked="1">
        <img class="img-fluid" src="assets/images/bg/inner-banner-btm-vec.png" alt="">
    </div>
    <div class="container" bis_skin_checked="1">
        <div class="row justify-content-center align-items-center text-center" bis_skin_checked="1">
            <div class="col-lg-6 align-items-center" bis_skin_checked="1">
                <div class="banner-content" bis_skin_checked="1">
                    <h1>Shop</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Shop</li>
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
    <!-- ========== Faq Area Start============= -->
    <div class="shop-page pt-120 mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop-sidebar">
                        <div class="shop-widget">
                            <h5 class="shop-widget-title">Price Range</h5>
                            <div class="range-widget">
                                <div id="slider-range" class="price-filter-range"></div>
                                <div class="mt-25 d-flex justify-content-between gap-4">
                                    <input type="number" min=100 max="499" oninput="validity.valid||(value='100');" id="min_price" class="price-range-field" />
                                    <input type="number" min=100 max="500" oninput="validity.valid||(value='500');" id="max_price" class="price-range-field" />
                                </div>
                            </div>
                        </div>
                        <div class="shop-widget">
                            <div class="check-box-item">
                                <h5 class="shop-widget-title">Category</h5>
                                <div class="checkbox-container">
                                    <label class="containerss">Food Toppers
                                        <input type="checkbox" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="containerss">Milk Replacers
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="containerss">Canned Food
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="containerss">Veterinary Authorized Diets
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="containerss">Bones & Rawhide
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="shop-widget">
                            <div class="check-box-item">
                                <h5 class="shop-widget-title">Brand</h5>
                                <div class="checkbox-container">
                                    <label class="containerss">Fancy Feast
                                        <input type="checkbox" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="containerss">Gentle Giants
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="containerss">Purina Pro Plan
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="containerss">Stella & Chewy's
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="containerss">Pet Dreams
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="shop-widget">
                            <div class="check-box-item">
                                <h5 class="shop-widget-title">Health Consideration</h5>
                                <div class="checkbox-container">
                                    <label class="containerss">Brain Development
                                        <input type="checkbox" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="containerss">Bladder
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="containerss">Allergies
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="containerss">Bone Development
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="containerss">Dehydration
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="shop-widget">
                            <div class="check-box-item">
                                <h5 class="shop-widget-title">Flavor</h5>
                                <div class="checkbox-container">
                                    <label class="containerss">Beef 
                                        <input type="checkbox" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="containerss">Chicken
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="containerss">Fish
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="containerss">Duck
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="containerss">Other
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                       
                
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row mb-50">
                        <div class="col-lg-12">
                            <div class="multiselect-bar">
                                <h6>shop</h6>
                                <div class="multiselect-area">
                                    <div class="single-select">
                                        <span>Show</span>
                                        <select class="defult-select-drowpown" id="color-dropdown">
                                            <option selected value="0">12</option>
                                            <option value="1">15</option>
                                            <option value="2">18</option>
                                            <option value="3">21</option>
                                            <option value="4">25</option>
                                        </select>
                                    </div>
                                    <div class="single-select two">
                                        <select class="defult-select-drowpown" id="eyes-dropdown">
                                            <option selected value="0">Default</option>
                                            <option value="1">Grid</option>
                                            <option value="2">Closed</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('front.puppy.list')

                    {{ $puppies->links('front.paginate', ['items' => $puppies]) }}

                </div>
            </div>
        </div>
    </div>
    <!-- ========== Faq Area End============= -->
 @endsection