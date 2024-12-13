@extends('layouts.front')

@section('content')
<div class="signup-section pt-120 pb-120">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="form-wrapper wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".2s">
                    <div class="form-title">
                        <h3>Sign Up</h3>
                        <p>Do you already have an account? <a href="login.html">Log in here</a></p>
                    </div>
                    <form class="w-100" method="POST" action="{{ route('register') }}">
                        @csrf
                        {!! RecaptchaV3::field('register') !!}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-inner">
                                    <label>Name *</label>
                                    <input type="text" placeholder="Frist Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                </div>
                                @error('name')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-inner">
                                    <label>Enter Your Email *</label>
                                    <input type="email" placeholder="Enter Your Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                </div>
                                @error('email')
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-inner">
                                    <label>Password *</label>
                                    <input type="password" id="password" placeholder="Create A Password"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"/>
                                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                                </div>
                                @error('password')
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-inner">
                                    <label>Confirm Password *</label>
                                    <input type="password" id="password2" placeholder="Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password"/>
                                    <i class="bi bi-eye-slash" id="togglePassword2"></i>
                                </div>
                            </div>
                            {{-- <div class="col-md-12">
                                <div class="form-agreement form-inner d-flex justify-content-between flex-wrap">
                                    <div class="form-group">
                                        <input type="checkbox" id="html">
                                        <label for="html">I agree to the Terms & Policy</label>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <button class="account-btn" type="submit">Create Account</button>
                    </form>
                    <div class="alternate-signup-box">
                        <h6>or signup WITH</h6>
                        <div class="btn-group gap-4">
                            <a href="" class="eg-btn google-btn d-flex align-items-center"><i class='bx bxl-google'></i><span>signup whit google</span></a>
                            <a href="" class="eg-btn facebook-btn d-flex align-items-center"><i class='bx bxl-facebook' ></i>signup whit facebook</a>
                        </div>
                    </div>
                    <div class="form-poicy-area">
                        <p>By clicking the "signup" button, you create a Cobiro account, and you agree to Cobiro's <a href="#">Terms & Conditions</a> & <a href="#">Privacy Policy.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
