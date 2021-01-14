@extends('layouts.main')
@section('title', 'Transactions')
@section('back', route('home'))
@section('back-title', 'Dashboard')
@section('content-title', 'Transactions')
@section('content')
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <div class="nk-block-des">
                    <p>Overview of all transactions made so far</p>
                </div>
            </div>
        </div>
        <div class="nk-block nk-block-lg">
            @if(sizeof($transactions) > 0)
                <div class="card card-bordered card-preview">
                    <div class="card-inner">
                        <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                            <thead>
                            <tr class="nk-tb-item nk-tb-head">
                                <th class="nk-tb-col"><span class="sub-text">S/N</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Amount</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Transaction Type</span></th>
                                <th class="nk-tb-col">
                                    <span class="sub-text">Transaction ID & Wallet Address</span>
                                </th>
                                <th class="nk-tb-col"><span class="sub-text">Status</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Created At</span></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transactions as $key => $transaction)
                                <tr class="nk-tb-item">
                                    <td class="nk-tb-col">
                                        <span class="tb-amount">
                                            {{ $key+1 }}
                                        </span>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span class="tb-amount">
                                            {{ $transaction->amount }} <span class="currency">BTH</span>
                                        </span>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span class="tb-amount">
                                            {{ ucfirst($transaction->transaction_type) }}
                                        </span>
                                    </td>
                                    <td class="nk-tb-col">
                                        <div class="user-card">
                                            <div class="user-info">
                                                    <span class="tb-lead">
                                                        {{ $transaction->transaction_id }}
                                                    </span>
                                                <span>{{ $transaction->wallet_address }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span class="{{ $transaction->status == 'pending' ? 'text-warning' : 'text-success' }}">
                                            {{ ucfirst($transaction->status) }}
                                        </span>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span>{{ $transaction->formatDate() }}</span>
                                    </td>
                                </tr><!-- .nk-tb-item  -->
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- .card-preview -->
            @else
                <div class="empty-state">
                    <span class="empty-state__icon">
                        <em class="ni ni-tranx"></em>
                    </span>
                    <p class="empty-state__description mt-2">No transaction has been made yet.</p>
                </div>
            @endif
        </div>
    </div> <!-- nk-block -->
@endsection