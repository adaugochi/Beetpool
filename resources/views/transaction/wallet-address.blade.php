@extends('layouts.main')
@section('title', 'Wallet Address')
@section('back', route('deposit'))
@section('back-title', 'Deposit History')
@section('content-title', 'Wallet Address')
@section('content')
    <div class="nk-block mt-3">
        <p>
            Please try to fill the form below to enable us track your transaction.
            Ensure to fill in the right details as this will be use to track the deposit made
            into your wallet.
        </p>
    </div>
    <div class="nk-block">
        <div class="row">
            <div class="col-md-10 col-lg-6">
                <div class="nk-wg-card card card-bordered h-100">
                    <div class="card-inner h-100">
                        <div class="nk-iv-wg2">
                            <form action="{{ route('update-deposit') }}" method="post" class="form-validate">
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                <div class="row g-gs">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="tx_id">
                                                Transaction ID
                                                <span style="color:green">
                                                    (Trx ID generated for the transaction.)
                                                </span>
                                            </label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="tx_id"
                                                       name="transaction_id" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="wallet-address">
                                                Wallet Address
                                                <span style="color:green">
                                                    (Sender address)
                                                </span>
                                            </label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control"
                                                       id="wallet-address" name="wallet_address" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success float-right mt-4">
                                    <span>Submit</span>
                                    <em class="icon ni ni-arrow-long-right"></em>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10 col-lg-6 mt-5 mt-lg-0">
                <div class="nk-wg-card card card-bordered h-100">
                    <div class="nk-refwg-invite card-inner">
                        <div class="nk-refwg-head g-3">
                            <div class="nk-refwg-title">
                                <h5 class="title">Beetpool Wallet Address</h5>
                                <div class="title-sub">
                                    Proceed to make a deposit using this wallet address
                                </div>
                            </div>
                        </div>

                        <div class="nk-refwg-url">
                            <div class="form-control-wrap">
                                <div class="form-clip clipboard-init"
                                     data-clipboard-target="#btc1Address"
                                     data-success="Copied" data-text="Copy Address">
                                    <em class="clipboard-icon icon ni ni-copy"></em>
                                    <span class="clipboard-text">Copy Address</span>
                                </div>
                                <div class="form-icon">
                                    <em class="icon ni ni-wallet"></em>
                                </div>
                                <input type="text" class="form-control copy-text" id="btc1Address"
                                       value="1PzYA7WrXekN6bKHyroqcxdWggp1grwoBP">
                            </div>
                        </div>
                    </div>
                </div><!-- .nk-refwg-invite -->
            </div>
        </div>
    </div>
@endsection