@extends('layouts.main')
@section('title', 'Home')
@section('back', '/')
@section('back-title', 'Go Back')
@section('content-title', 'Dashboard')
@section('content-side')
    <div class="nk-block-head-content">
        <button type="button" class="btn btn-success mt-4"
                data-toggle="modal" data-target="#modalZoom">
            <em class="icon ni ni-plus"></em>
            <span>Make A Deposit</span>
        </button>
    </div>
    @include('partials.modal-deposit')
@endsection
@section('content')
    <div class="nk-block mt-5">
        <div class="row gy-gs">
            <div class="col-lg-5 col-xl-4">
                <div class="nk-block">
                    <div class="nk-block-head-xs">
                        <div class="nk-block-head-content">
                            <h5 class="nk-block-title title">Overview</h5>
                        </div>
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="card text-white bg-secondary card-bordered h-100">
                            <div class="card-inner">
                                <div class="nk-wg7">
                                    <div class="nk-wg7-stats">
                                        <div class="font-weight-bold fs-13px text-light">
                                            Available balance in BITCOIN
                                        </div>
                                        <div class="number-lg amount">0.00</div><!--@convert($wallet_balance)-->
                                    </div>
                                </div><!-- .nk-wg7 -->
                            </div><!-- .card-inner -->
                        </div><!-- .card -->
                    </div><!-- .nk-block -->
                </div><!-- .nk-block -->
            </div><!-- .col -->

            <div class="col-lg-7 col-xl-8">
                <div class="nk-block">
                    <div class="row g-2">
                        <div class="col-sm-6">
                            <div class="card bg-light">
                                <div class="nk-wgw sm">
                                    <a class="nk-wgw-inner" href="#">
                                        <div class="nk-wgw-name">
                                            <div class="nk-wgw-icon">
                                                <em class="icon ni ni-sign-btc"></em>
                                            </div>
                                            <h5 class="nk-wgw-title title">Referral Earnings</h5>
                                        </div>
                                        <div class="nk-wgw-balance">
                                            <div class="amount">
                                                <span class="currency currency-nio">
                                                    0.00
                                                </span><!--@convert($wallet_balance)-->
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div><!-- .col -->

                        <div class="col-sm-6">
                            <div class="card bg-light">
                                <div class="nk-wgw sm">
                                    <a class="nk-wgw-inner" href="#">
                                        <div class="nk-wgw-name">
                                            <div class="nk-wgw-icon">
                                                <em class="icon ni ni-sign-btc"></em>
                                            </div>
                                            <h5 class="nk-wgw-title title">Active Investment</h5>
                                        </div>
                                        <div class="nk-wgw-balance">
                                            <div class="amount">
                                                <span class="currency currency-nio">
                                                    0.00
                                                </span><!--@convert($current_investment)-->
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div><!-- .col -->

                    </div><!-- .row -->
                </div><!-- .nk-block -->
                <div class="nk-block nk-block-md">
                    <div class="row g-2">
                        <div class="col-sm-6">
                            <div class="card bg-light">
                                <div class="nk-wgw sm">
                                    <a class="nk-wgw-inner" href="#">
                                        <div class="nk-wgw-name">
                                            <div class="nk-wgw-icon">
                                                <em class="icon ni ni-sign-btc"></em>
                                            </div>
                                            <h5 class="nk-wgw-title title">Investment Earnings</h5>
                                        </div>
                                        <div class="nk-wgw-balance">
                                            <div class="amount">
                                                <span class="currency currency-nio">
                                                    0.00
                                                </span><!--@convert($trading_bonus)-->
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div><!-- .col -->

                        <div class="col-sm-6">
                            <div class="card bg-light">
                                <div class="nk-wgw sm">
                                    <a class="nk-wgw-inner" href="#">
                                        <div class="nk-wgw-name">
                                            <div class="nk-wgw-icon">
                                                <em class="icon ni ni-sign-btc"></em>
                                            </div>
                                            <h5 class="nk-wgw-title title">Total Withdrawals</h5>
                                        </div>
                                        <div class="nk-wgw-balance">
                                            <div class="amount">
                                                <span class="currency currency-nio">
                                                    0.00
                                                </span><!--@convert($withdrawal_bonus)-->
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div> <!-- .nk-block -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .nk-block -->

    <div class="nk-block">
        <div class="card card-bordered">
            <div class="nk-refwg">
                <div class="nk-refwg-invite card-inner">
                    <div class="nk-refwg-head g-3">
                        <div class="nk-refwg-title">
                            <h5 class="title">Refer Others & Earn</h5>
                            <div class="title-sub">Use the below link to invite your friends.</div>
                        </div>
                    </div>
                    <div class="nk-refwg-url">
                        <div class="form-control-wrap">
                            <div class="form-clip clipboard-init" data-clipboard-target="#refUrl"
                                 data-success="Copied" data-text="Copy Link">
                                <em class="clipboard-icon icon ni ni-copy"></em>
                                <span class="clipboard-text">Copy Link</span>
                            </div>
                            <div class="form-icon">
                                <em class="icon ni ni-link-alt"></em>
                            </div>
                            <input type="text" class="form-control copy-text" id="refUrl"
                                   value="{{ route('register', ['ref' => auth()->user()->username]) }}">
                        </div>
                    </div>
                </div><!-- .nk-refwg-invite -->
            </div><!-- .nk-refwg -->
        </div><!-- .card -->
    </div><!-- .nk-block -->
@endsection
