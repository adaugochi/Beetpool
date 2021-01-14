@extends('layouts.main')
@section('title', 'Profile')
@section('back', route('home'))
@section('back-title', 'Go Back')
@section('content-title', 'User Profile')
@section('content')
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <div class="nk-block-des">
                    <p>Complete your profile to gain full access to the features on the protal</p>
                </div>
            </div>
        </div>
        <div class="card card-bordered">
            <div class="card-inner">
                <form action="{{ route('save-profile') }}" class="form-validate" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="row g-gs">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="fv-full-name">Full Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="fv-full-name"
                                           name="full_name" value="{{ $user->full_name }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="fv-email">Email address</label>
                                <div class="form-control-wrap">
                                    <input type="email" class="form-control" id="fv-email"
                                           name="email" value="{{ $user->email }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="fv-subject">Username</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="fv-subject"
                                           name="username" value="{{ $user->username }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="fv-phonenumber">Phone Number</label>
                                <div class="form-control-wrap">
                                    <input class="form-control @error('phone_number') is-invalid @enderror"
                                           id="fv-phonenumber" type="text" required name="phone_number"
                                           value="{{ $user->phone_number ?? old('phone_number') }}">
                                    @include('elements.error', ['fieldName' => 'phone_number'])
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="fv-topics">Country</label>
                                <div class="form-control-wrap ">
                                    <select class="form-control form-select @error('country') is-invalid @enderror"
                                            id="fv-topics" name="country_id"
                                            data-placeholder="Select a country" required>
                                        <option label="empty" value=""></option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                    @include('elements.error', ['fieldName' => 'country'])
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="fv-state">State</label>
                                <div class="form-control-wrap">
                                    <input class="form-control @error('state') is-invalid @enderror"
                                           id="fv-state" type="text" required name="state"
                                           value="{{ $user->state ?? old('state')}}">
                                    @include('elements.error', ['fieldName' => 'state'])
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="fv-address">Address</label>
                                <div class="form-control-wrap">
                                    <input class="form-control @error('address') is-invalid @enderror"
                                           id="fv-address" type="text" required name="address"
                                           value="{{ $user->address ?? old('address')}}">
                                    @include('elements.error', ['fieldName' => 'address'])
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-primary">Save Informations</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- .nk-block -->
@endsection