@extends('layouts.main')
@section('title', 'Investment')
@section('back', route('transaction'))
@section('back-title', 'Transactions')
@section('content-title', 'Investments History')
@section('content')
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <div class="nk-block-des">
                    <p>Overview of all investment made so far</p>
                </div>
            </div>
        </div>
        <div class="nk-block nk-block-lg">
            @if(sizeof($investments) > 0)
                <div class="card card-bordered card-preview">
                    <div class="card-inner">
                        <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                            <thead>
                            <tr class="nk-tb-item nk-tb-head">
                                <th class="nk-tb-col"><span class="sub-text">S/N</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Amount</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Created At</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Expected Return</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Maturity Date</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Maturity Status</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Days Left For Withdrawal</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Status</span></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($investments as $key => $investment)
                                <tr class="nk-tb-item">
                                    <td class="nk-tb-col">
                                        <span>{{ $key+1 }}</span>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span class="tb-amount">
                                            ${{ number_format($investment->amount) }}
                                        </span>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span>{{ $investment->formatDate() }}</span>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span class="tb-amount">
                                            ${{ number_format($investment->expected_return) }}
                                        </span>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span>{{ \App\Helper\Utils::formatDate($investment->maturity_date) }}</span>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span class="{{ $investment->maturity_status == 'pending' ? 'text-warning' : 'text-success' }}">
                                            {{ ucfirst($investment->maturity_status) }}
                                        </span>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span>
                                            {{ \App\Helper\Utils::getDaysLeft($investment->withdrawal_date, $investment->created_at) }}
                                        </span>
                                    </td>
                                    <td class="nk-tb-col">
                                        @if($investment->status == 'active')
                                            <span class="text-success">{{ ucfirst($investment->status) }}</span>
                                        @elseif($investment->status == 'closed')
                                            <span class="text-danger">{{ ucfirst($investment->status) }}</span>
                                        @endif
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
                        <em class="ni ni-invest"></em>
                    </span>
                    <p class="empty-state__description mt-2">No investment has been made yet.</p>
                </div>
            @endif
        </div>
    </div> <!-- nk-block -->
@endsection