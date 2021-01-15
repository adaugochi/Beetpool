@extends('admin.layouts.main')
@section('title', 'Transaction')
@section('back', route('admin.home'))
@section('back-title', 'Dashboard')
@section('content-title', 'Transaction History')
@section('content')
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <div class="nk-block-des">
                    <p>Overview of all transaction made so far</p>
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
                                <th class="nk-tb-col"><span class="sub-text">User Info</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Amount</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Transaction Type</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Status</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Created At</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Action</span></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transactions as $key => $transaction)
                                <tr class="nk-tb-item">
                                    <td class="nk-tb-col">
                                        <div class="user-card">
                                            <div class="user-info">
                                                <span class="tb-lead">{{ $transaction->user->full_name }}</span>
                                                <span>{{ $transaction->user->email }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span class="tb-amount">
                                            {{ $transaction->amount }} <span class="currency">BTH</span>
                                        </span>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span>
                                            {{ ucfirst($transaction->transaction_type) }}
                                        </span>
                                    </td>
                                    <td class="nk-tb-col">
                                        @if($transaction->status == 'pending')
                                            <span class="text-warning">{{ ucfirst($transaction->status) }}</span>
                                        @elseif($transaction->status == 'close')
                                            <span class="text-danger">{{ ucfirst($transaction->status) }}</span>
                                        @else
                                            <span class="text-success">{{ ucfirst($transaction->status) }}</span>
                                        @endif

                                    </td>
                                    <td class="nk-tb-col">
                                        <span>{{ $transaction->formatDate() }}</span>
                                    </td>
                                    <td class="nk-tb-col nk-tb-col-tools">
                                        <ul class="nk-tb-actions gx-1">
                                            <li class="nk-tb-action-hidden">
                                                <a href="{{ route('admin.transaction', $transaction->id) }}"
                                                   class="btn btn-trigger btn-icon"
                                                   data-toggle="tooltip" data-placement="top" title="View">
                                                    <em class="icon ni ni-eye-fill"></em>
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
                                                                <a href="{{ route('admin.transaction', $transaction->id) }}">
                                                                    <em class="icon ni ni-eye"></em>
                                                                    <span>View Details</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
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
                    <p class="empty-state__description mt-2">No transaction has been made yet.</p>
                </div>
            @endif
        </div>
    </div> <!-- nk-block -->
@endsection