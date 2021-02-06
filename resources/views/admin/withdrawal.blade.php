@extends('admin.layouts.main')
@section('title', 'Withdrawal')
@section('back', route('admin.home'))
@section('back-title', 'Dashboard')
@section('content-title', 'Withdrawal History')
@section('content')
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <div class="nk-block-des">
                    <p>Overview of all withdrawal request</p>
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
                                    <th class="nk-tb-col"><span class="sub-text">User Info</span></th>
                                    <th class="nk-tb-col"><span class="sub-text">Amount</span></th>
                                    <th class="nk-tb-col"><span class="sub-text">Wallet Address</span></th>
                                    <th class="nk-tb-col"><span class="sub-text">Status</span></th>
                                    <th class="nk-tb-col"><span class="sub-text">Created At</span></th>
                                    <th class="nk-tb-col"><span class="sub-text">Action</span></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($withdrawals as $key => $withdrawal)
                                <tr class="nk-tb-item">
                                    <td class="nk-tb-col">
                                        <div class="user-card">
                                            <div class="user-info">
                                                <span class="tb-lead">
                                                    {{ $withdrawal->user->full_name }}
                                                    <span class="dot {{ $withdrawal->status == 'pending' ?
                                                      'dot-warning' : 'dot-success' }} d-md-none ml-1"></span>
                                                    </span>
                                                <span>{{ $withdrawal->user->email }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span class="tb-amount">${{ number_format($withdrawal->amount) }}</span>
                                    </td>
                                    <td class="nk-tb-col">
                                        <div class="user-card">
                                            <div class="user-info">
                                                <span>{{ $withdrawal->wallet_address }}</span>
                                            </div>
                                        </div>
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
                                            <li>
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                       data-toggle="dropdown"><em class="icon ni ni-more-h"></em>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-opt no-bdr">
                                                            @if($withdrawal->status === 'pending')
                                                                <li>
                                                                    <a href="#" class="eg-swal-approve-withdrawal"
                                                                       onclick="event.preventDefault();">
                                                                        <em class="icon ni ni-check"></em>
                                                                        <span>Approve</span>
                                                                        <form id="approveWithdrawal"  method="POST"
                                                                              action="{{ route('admin.approve-withdrawal') }}">
                                                                            @csrf
                                                                            <input type='hidden' name="id"
                                                                                   value="{{ $withdrawal->id }}">
                                                                        </form>
                                                                    </a>
                                                                </li>
                                                            @endif
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
                    <p class="empty-state__description mt-2">No Withdrawal Request has been made yet.</p>
                </div>
            @endif
        </div>
    </div> <!-- nk-block -->
@endsection
@section('script')
    @include('partials.alert.approve-withdrawal')
@endsection