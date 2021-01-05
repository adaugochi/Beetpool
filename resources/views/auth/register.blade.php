@extends('layouts.app')
@section('title', 'Register')
@section('bg-img')
    <img src="{{ asset('img/register.svg') }}">
@endsection

@section('content')
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h5 class="nk-block-title">Sign-up</h5>
            <div class="nk-block-des">
                <p>Create New Beetpool Account</p>
            </div>
        </div>
    </div><!-- .nk-block-head -->
    <form action="#">
        <div class="form-group">
            <label class="form-label" for="name">Full Name</label>
            <input type="text" class="form-control form-control-lg" id="name" placeholder="Enter your name">
        </div>
        <div class="form-group">
            <label class="form-label" for="email">Email Address</label>
            <input type="text" class="form-control form-control-lg" id="email"
                   placeholder="Enter your email address">
        </div>
        <div class="form-group">
            <label class="form-label" for="password">Password</label>
            <div class="form-control-wrap">
                <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch"
                   data-target="password">
                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                </a>
                <input type="password" class="form-control form-control-lg"
                       id="password" placeholder="Enter your password">
            </div>
        </div>
        <div class="form-group">
            <div class="custom-control custom-control-xs custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="checkbox">
                <label class="custom-control-label" for="checkbox">
                    I agree to Beetpool
                    <a tabindex="-1" href="#">Privacy Policy</a> &amp;
                    <a tabindex="-1" href="#"> Terms.</a>
                </label>
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-lg btn-primary btn-block">Sign up</button>
        </div>
    </form><!-- form -->
    <div class="form-note-s2 pt-4">
        Already have an account? <a href="{{ url('login') }}"><strong>Sign in instead</strong></a>
    </div>
@endsection