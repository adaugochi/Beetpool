@extends('layouts.main')
@section('title', 'Withdrawal')
@section('back', route('transaction'))
@section('back-title', 'Transactions')
@section('content-title', 'Withdrawal History')
@section('content-side')
    <div class="nk-block-head-content">
        <button type="button" class="btn btn-blue mt-4"
                data-toggle="modal" data-target="#modalWithdrawal">
            <em class="icon ni ni-plus"></em>
            <span>Withdrawal Request</span>
        </button>
    </div>
    @include('partials.modal.modal-withdrawal', ['new' => true])
@endsection
@section('content')
    <div class="nk-block nk-block-lg">
        <div>
            <em class="icon ni ni-wallet-out fs-22px"></em>
            <span style="color:green; font-size: 30px">
                ${{ number_format($withdrawal_balance) }}
            </span>
        </div>
    </div>
    <input type="hidden" value="{{ $withdrawal_balance }}" id="withdrawalBalance">

    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <div class="nk-block-des">
                    <p>Overview of all withdrawals made so far</p>
                </div>
            </div>
        </div>
        <div class="nk-block nk-block-lg">
            @if(sizeof($withdrawals) > 0)
                <div class="card card-bordered card-preview">
                    <div class="card-inner">
                        <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                            <thead>
                            <tr class="nk-tb-item nk-tb-head">
                                <th class="nk-tb-col"><span class="sub-text">S/N</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Amount</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Status</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Created</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Action</span></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($withdrawals as $key => $withdrawal)
                                <tr class="nk-tb-item">
                                    <td class="nk-tb-col"><span class="tb-amount">{{ $key+1 }}</span></td>
                                    <td class="nk-tb-col">
                                        <span class="tb-amount">${{ $withdrawal->amount }}</span>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span class="{{ $withdrawal->status == 'pending' ? 'text-warning' : 'text-success' }}">
                                            {{ ucfirst($withdrawal->status) }}
                                        </span>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span>{{ $withdrawal->formatDate() }}</span>
                                    </td>
                                    <td class="nk-tb-col nk-tb-col-tools">
                                        <ul class="nk-tb-actions gx-1">
                                            @if($withdrawal->status == 'pending')
                                            <li>
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                       data-toggle="dropdown"><em class="icon ni ni-more-h"></em>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li>
                                                                <a data-toggle="modal"
                                                                   data-target="#modalWithdrawal{{ $withdrawal->id }}">
                                                                    <em class="icon ni ni-wallet"></em>
                                                                    <span>Edit</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                @include('partials.modal.modal-withdrawal', [
                                                    'wallet_address' => $withdrawal->wallet_address,
                                                    'modalId' => 'modalWithdrawal'. $withdrawal->id,
                                                    'amount' => $withdrawal->amount,
                                                    'id' => $withdrawal->id,
                                                    'new' => false
                                                ])
                                            </li>
                                            @endif
                                        </ul>
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
                        <em class="ni ni-coins"></em>
                    </span>
                    <p class="empty-state__description mt-2">No withdrawal has been made yet.</p>
                </div>
            @endif
        </div>
    </div> <!-- nk-block -->
@endsection
