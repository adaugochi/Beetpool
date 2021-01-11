@extends('layouts.main')
@section('title', 'Deposit')
@section('back', route('transaction'))
@section('back-title', 'Transactions')
@section('content-title', 'Deposit History')
@section('content')
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <div class="nk-block-des">
                    <p>Overview of all deposit made so far</p>
                </div>
            </div>
        </div>
        <div class="nk-block nk-block-lg">
            @if(sizeof($deposits) < 0)
                <div class="card card-bordered card-preview">
                    <div class="card-inner">
                        <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                            <thead>
                            <tr class="nk-tb-item nk-tb-head">
                                <th class="nk-tb-col"><span class="sub-text">S/N</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Amount</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Status</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Created</span></th>
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
                                        <span class="tb-amount">
                                            {{ $deposit->amount }} <span class="currency">BTH</span>
                                        </span>
                                    </td>
                                    <td class="nk-tb-col">
                                            <span class="{{ $deposit->status == 'pending' ? 'text-warning' : 'text-success' }}">
                                                {{ ucfirst($deposit->status) }}
                                            </span>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span>{{ $deposit->formatDate() }}</span>
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