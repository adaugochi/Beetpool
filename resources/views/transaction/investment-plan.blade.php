@extends('layouts.main')
@section('title', 'Investment Packages')
@section('back', route('home'))
@section('back-title', 'Dashboard')
@section('content-title', 'Investment Packages')
@section('content')
    <div class="nk-block nk-block-lg">
        <div class="row">
            <input type="hidden" value="{{ $wallet_balance }}" id="walletBalance">
            <form method="post" action="{{ route('invest') }}" class="form-validate" id="submitInvest">
                @csrf
                <div class="col-md-8">
                    <div class="form-group">
                        <div>
                            <em class="icon ni ni-wallet-saving fs-22px"></em>
                            <span style="color:green; font-size: 30px">
                                ${{ number_format($wallet_balance) }}
                            </span>
                        </div>

                        <div class="form-control-wrap ">
                            <label for="formSelectInvest">
                                Pick a package that best fit what's on your wallet:
                                <small style="color:green">Please use the packages below as a guide.</small>
                            </label>
                            <select class="form-control form-select @error('key') is-invalid @enderror"
                                    data-placeholder="Select a package" name="key" required id="formSelectInvest">
                                <option label="empty" value=""></option>
                                @foreach($plans as $plan)
                                    <option value="{{ $plan->key }}">{{ $plan->name }} - {{ $plan->roi }}%</option>
                                @endforeach
                            </select>
                            @include('elements.error', ['fieldName' => 'key'])
                            <span class="fs-11px text-danger font-italic error"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Invest Now</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="nk-block nk-block-lg">
        <div class="row gy-gs">
            @foreach($plans as $plan)
                @include('partials.sub-page.investment-plan')
            @endforeach
        </div><!-- .row -->
    </div><!-- .nk-block -->
@endsection