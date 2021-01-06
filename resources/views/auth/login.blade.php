@extends('layouts.app')
@section('title', 'Login')
@section('bg-img')
    <img src="{{ asset('img/authentication.svg') }}" alt="Login">
@endsection

@section('content')
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h5 class="nk-block-title">Sign-In</h5>
            <div class="nk-block-des">
                <p>Access the Beetpool portal using your email and password.</p>
            </div>
        </div>
    </div><!-- .nk-block-head -->
    <form action="#">
        <div class="form-group">
            <div class="form-label-group">
                <label class="form-label" for="default-01">Email</label>
            </div>
            <input type="text" class="form-control form-control-lg" id="default-01" placeholder="Enter your email address or username">
        </div>
        <div class="form-group">
            <div class="form-label-group">
                <label class="form-label" for="password">Password</label>
                <a class="link link-primary link-sm" tabindex="-1" href="#">Forgot Password?</a>
            </div>
            <div class="form-control-wrap">
                <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                </a>
                <input type="password" class="form-control form-control-lg" id="password" placeholder="Enter your passcode">
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-lg btn-primary btn-block">Sign in</button>
        </div>
    </form><!-- form -->
    <div class="form-note-s2 pt-4">
        New on our platform? <a href="{{ url('register') }}">Create an account</a>
    </div>
@endsection
