@extends('layouts.front')
@section('content')
<div class="contact-pages pt-120 mb-120">
        <div class="container">
            <div class="row align-items-center g-lg-4 gy-5">
                <div class="col-lg-5">
                    <div class="contact-left">
                        <div class="hotline mb-80">
                            <h3>Call Us Now</h3>
                            <div class="icon">
                                <img src="assets/images/icon/phone-icon4.svg" alt="">
                            </div>
                            <div class="info">
                                <h6><a href="tel:+1-973-652-7758">+1-973-652-7758</a></h6>
                            </div>
                        </div>
                        <div class="location">
                            <h3>Location</h3>
                            <div class="icon">
                                <img src="assets/images/icon/location4.svg" alt="">
                            </div>
                            <div class="info">
                                <h6><a href="#">276 22nd Ave Paterson,<br>
                                    NJ 07513, USA</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="contact-form">
                        <h2>Have Any Questions</h2>
                        <form>
                            <div class="row">
                                <div class="col-lg-12 mb-40">
                                    <div class="form-inner">
                                        <input type="text" placeholder="Enter your name">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-40">
                                    <div class="form-inner">
                                        <input type="text" placeholder="Enter your email">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-40">
                                    <div class="form-inner">
                                        <input type="text" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-40">
                                    <div class="form-inner">
                                        <textarea placeholder="Your message"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-inner">
                                        <button class="primary-btn1">Send Message <i class="bi bi-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="location-map">
        <div class="vector">
            <img src="assets/images/bg/map-vector.png" alt="">
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d753.8971132519206!2d-74.14603133033516!3d40.90284169821034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2fc191d0029d3%3A0x1ddd6ef890c595c3!2sD%20and%20G%20pups!5e0!3m2!1sen!2seg!4v1778165257714!5m2!1sen!2seg" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
@endsection