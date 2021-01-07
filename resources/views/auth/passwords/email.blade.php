@extends('layouts.app')
@section('title', 'Forgot Password')
@section('bg-img')
    <img src="{{ asset('img/forget-pwd.svg') }}" alt="">
@endsection

@section('content')
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h5 class="nk-block-title">Forgot Password</h5>
            <div class="nk-block-des">
                <p>
                    If you forgot your password, well, then we’ll email you instructions to reset your
                    password.
                </p>
            </div>
        </div>
    </div><!-- .nk-block-head -->
    <form action="#">
        <div class="form-group">
            <div class="form-label-group">
                <label class="form-label" for="default-01">Email</label>
            </div>
            <input type="text" class="form-control form-control-lg @error('email') is-invalid @enderror"
                   id="default-01" placeholder="Enter your email address" value="{{ old('email') }}">
            @include('elements.error', ['fieldName' => 'email'])
        </div>
        <div class="form-group">
            <button class="btn btn-lg btn-primary btn-block">Send Reset Link</button>
        </div>
    </form><!-- form -->
    <div class="form-note-s2 pt-5">
        <a href="{{ url('login') }}">Return to login</a>
    </div>
@endsection