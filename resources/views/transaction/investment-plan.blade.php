@extends('layouts.main')
@section('title', 'Investment Packages')
@section('back', route('home'))
@section('back-title', 'Dashboard')
@section('content-title', 'Investment Packages')
@section('content')
    <div class="nk-block nk-block-lg">
        <div class="row">
            <form method="post" action="#" class="form-validate">
                @csrf
                <div class="col-12">
                    <div class="form-group">
                        <h3>
                            Wallet Balance:
                            <span style="color:green">{{ number_format($wallet_balance) }}</span>
                        </h3>
                        <label>
                            Pick a package that best fit what's on your wallet:
                            <small style="color:green">Please use the packages below as a guide.</small>
                        </label>
                        <div class="form-control-wrap ">
                            <select class="form-control form-select @error('key') is-invalid @enderror"
                                    data-placeholder="Select a package" name="key" required>
                                <option label="empty" value=""></option>
                                @foreach($plans as $plan)
                                    <option value="{{ $plan->key }}">{{ $plan->name }} - {{ $plan->roi }}%</option>
                                @endforeach
                            </select>
                            @include('elements.error', ['fieldName' => 'key'])
                        </div>
                        {{--<input type="text" name="amount" class="form-control" placeholder="500.00" required>--}}
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