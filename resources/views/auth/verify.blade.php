@extends('layouts.app')

@section('title', 'Verify')
@section('bg-img')
    <img src="{{ asset('img/verify.svg') }}" alt="Register">
@endsection

@section('content')
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h5 class="nk-block-title">Verify Your Email Address</h5>
            <div class="nk-block-des">
                <div>
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    <p>
                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email,') }}
                    </p>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $userId }}">
                        <button type="submit" class="btn btn-lg btn-primary btn-block">
                            {{ __('click here to request another') }}
                        </button>
                    </form>
                    <div class="form-note-s2 pt-4">
                        <a href="{{ url('login') }}">Back To Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .nk-block-head -->
@endsection
