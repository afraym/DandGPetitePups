<div class="row g-4 justify-content-center">
    @foreach ($puppies as $puppy)
        
   
    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="collection-card">
            <div class="offer-card">
                <span>Offer</span>
            </div>
            <div class="collection-img">
                @if(empty($puppy->puppy_images->first()))
                <img class="img-fluid"
                    src="404"
                    alt="{{ $puppy->name }} image not found">
                @else
                <img class="img-fluid"
                    src="{{ $puppy->puppy_images->first()->link . $puppy->puppy_images->first()->nameWithoutExt}}-thumb.webp"
                    alt="{{ $puppy->name }} image">
                @endif
                <div class="view-dt-btn">
                    <div class="plus-icon">
                        <i class="bi bi-plus"></i>
                    </div>
                    <a href="/puppy/{{ $puppy->id }}/{{ $puppy->name }}">View Details</a>
                </div>
                <ul class="cart-icon-list">
                    <li><a href="/cart"><img
                                src="https://demo.egenslab.com/html/scooby/preview/assets/images/icon/Icon-cart3.svg"
                                alt></a></li>
                    <li><a href="#"><img
                                src="https://demo.egenslab.com/html/scooby/preview/assets/images/icon/Icon-favorites3.svg"
                                alt></a></li>
                </ul>
            </div>
            <div class="collection-content text-center">
                <h4><a href="/puppy/{{ $puppy->id }}/{{ $puppy->name }}">{{ $puppy->name }}</a></h4>
                <div class="price">
                    <h6>${{ $puppy->price }}</h6>
                    <del>${{ $puppy->price * 1.5 }}</del>
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
    @endforeach
</div>