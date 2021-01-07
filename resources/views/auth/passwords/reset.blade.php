@extends('layouts.app')
@section('title', 'Reset Password')
@section('bg-img')
    <img src="{{ asset('img/reset.svg') }}" alt="">
@endsection

@section('content')
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h5 class="nk-block-title">Reset Password</h5>
            <div class="nk-block-des">
                <p>
                    Set a new password for your account
                </p>
            </div>
        </div>
    </div><!-- .nk-block-head -->
    <form method="POST" action="{{ $pwdUpdate }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group">
            <div class="form-label-group">
                <label class="form-label" for="default-01">Email</label>
            </div>
            <input type="text" class="form-control form-control-lg @error('email') is-invalid @enderror"
                   id="default-01" value="{{ $email ?? old('email') }}" readonly name="email">
            @include('elements.error', ['fieldName' => 'email'])
        </div>
        <div class="form-group">
            <div class="form-label-group">
                <label class="form-label" for="password">New Password</label>
            </div>
            <div class="form-control-wrap">
                <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch"
                   data-target="password">
                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                </a>
                <input type="password" class="form-control form-control-lg" name="password" id="password">
                @include('elements.error', ['fieldName' => 'password'])
            </div>
        </div>
        <div class="form-group">
            <div class="form-label-group">
                <label class="form-label" for="password">Confirm Password</label>
            </div>
            <div class="form-control-wrap">
                <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch"
                   data-target="password-confirm">
                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                </a>
                <input type="password" class="form-control form-control-lg" name="password_confirmation"
                       id="password-confirm">
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-primary btn-block">Reset Password</button>
        </div>
    </form>
@endsection
