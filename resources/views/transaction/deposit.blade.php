@extends('layouts.main')
@section('title', 'Deposit')
@section('back', route('transaction'))
@section('back-title', 'Transactions')
@section('content-title', 'Deposit History')
@section('content-side')
    <div class="nk-block-head-content">
        <button type="button" class="btn btn-blue mt-4"
                data-toggle="modal" data-target="#modalZoom">
            <em class="icon ni ni-plus"></em>
            <span>Make A Deposit</span>
        </button>
    </div>
    @include('partials.modal.modal-deposit')
@endsection
@section('content')
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <div class="nk-block-des">
                    <p>Overview of all deposits made so far</p>
                </div>
            </div>
        </div>
        <div class="nk-block nk-block-lg">
            @if(sizeof($deposits) > 0)
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
                            @foreach($deposits as $key => $deposit)
                                <tr class="nk-tb-item">
                                    <td class="nk-tb-col">
                                        <span class="tb-amount">
                                            {{ $key+1 }}
                                        </span>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span class="tb-amount">${{ $deposit->amount }}</span>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span class="{{ $deposit->status == 'pending' ? 'text-warning' : 'text-success' }}">
                                            {{ ucfirst($deposit->status) }}
                                        </span>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span>{{ $deposit->formatDate() }}</span>
                                    </td>
                                    <td class="nk-tb-col nk-tb-col-tools">
                                        <ul class="nk-tb-actions gx-1">
                                            @if($deposit->transaction_id === null)
                                                <li class="nk-tb-action-hidden">
                                                    <a href="{{ route('wallet-address', $deposit->id) }}"
                                                       class="btn btn-trigger btn-icon" data-toggle="tooltip"
                                                       data-placement="top" title="Complete Transaction">
                                                        <em class="icon ni ni-wallet-fill"></em>
                                                    </a>
                                                </li>
                                                <li>
                                                    <div class="dropdown">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                           data-toggle="dropdown"><em class="icon ni ni-more-h"></em>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li>
                                                                    <a href="{{ route('wallet-address', $deposit->id) }}">
                                                                        <em class="icon ni ni-wallet"></em>
                                                                        <span>Complete Your Transaction</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
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
                    <p class="empty-state__description mt-2">No deposit has been made yet.</p>
                </div>
            @endif
        </div>
    </div> <!-- nk-block -->
@endsection
