@extends('layouts.main')
@section('title', 'Withdrawal')
@section('back', route('transaction'))
@section('back-title', 'Transactions')
@section('content-title', 'Withdrawal History')
@section('content')
    <div class="nk-block nk-block-lg">
        <div class="row">
            <form method="post" action="{{ route('save-withdrawal') }}" class="form-validate">
                <input type="hidden" value="{{ $withdrawal_balance }}" id="withdrawalBalance"
                       name="withdrawal_balance">
                @csrf
                <div class="col-md-8 col-lg-9">
                    <div class="form-group">
                        <div>
                            <em class="icon ni ni-wallet-out fs-22px"></em>
                            <span style="color:green; font-size: 30px">
                                ${{ number_format($withdrawal_balance) }}
                            </span>
                        </div>

                        <div class="form-control-wrap ">
                            <label for="formSelectInvest">
                                The fund in your withdrawal balance is what is available for withdrawal:
                                <small style="color:green">
                                    Please check your withdrawal balance as a guide to know the amount
                                    you can withdrawal.
                                </small>
                            </label>
                            <input type="number" class="form-control @error('amount') is-invalid @enderror"
                                   name="amount" placeholder="enter an amount" required>

                            @include('elements.error', ['fieldName' => 'amount'])
                            <span class="fs-11px text-danger font-italic error"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Send Withdrawal Request</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection