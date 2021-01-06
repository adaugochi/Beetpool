@extends('layouts.app')

@section('title', 'Register')
@section('bg-img')
    <img src="{{ asset('img/register.svg') }}" alt="Register">
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
    <form action="{{ route('register') }}" method="post">
        @csrf
        <div class="form-group">
            <label class="form-label" for="name">Full Name</label>
            <input type="text" class="form-control form-control-lg @error('fullname') is-invalid @enderror"
                   id="name" name="fullname" placeholder="Enter your full name" value="{{ old('fullname') }}">
            @include('elements.error', ['fieldName' => 'fullname'])
        </div>
        <div class="form-group">
            <label class="form-label" for="email">Email Address</label>
            <input type="text" class="form-control form-control-lg @error('email') is-invalid @enderror"
                   id="email" placeholder="Enter your email address" name="email" value="{{ old('email') }}">
            @include('elements.error', ['fieldName' => 'email'])
        </div>
        <div class="form-group">
            <label class="form-label" for="username">Username</label>
            <input type="text" class="form-control form-control-lg @error('username') is-invalid @enderror"
                   id="username" placeholder="Enter your username" name="username" value="{{ old('username') }}">
            @include('elements.error', ['fieldName' => 'username'])
        </div>
        <div class="form-group">
            <label class="form-label" for="password">Password</label>
            <div class="form-control-wrap">
                <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch"
                   data-target="password">
                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                </a>
                <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
                       id="password" placeholder="Enter your password" name="password" value="{{ old('password') }}">
                @include('elements.error', ['fieldName' => 'password'])
            </div>
        </div>
        <div class="form-group">
            <label>
                By clicking the “Sign Up” button, you agree to Beetpool's
                <a tabindex="-1" href="#">Privacy Policy</a> &amp;
                <a tabindex="-1" href="#"> Terms.</a>
            </label>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-primary btn-block">Sign up</button>
        </div>
    </form><!-- form -->
    <div class="form-note-s2 pt-4">
        Already have an account? <a href="{{ url('login') }}"><strong>Sign in instead</strong></a>
    </div>
@endsection