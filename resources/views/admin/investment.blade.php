@extends('admin.layouts.main')
@section('title', 'Investment')
@section('back', route('admin.home'))
@section('back-title', 'Dashboard')
@section('content-title', 'Investment History')
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
                                <th class="nk-tb-col"><span class="sub-text">User Info</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Amount</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Created At</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Expected Return</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Maturity Date</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Maturity Status</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Days Left</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Status</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Action</span></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($investments as $key => $investment)
                                <tr class="nk-tb-item">
                                    <td class="nk-tb-col">
                                        <div class="user-card">
                                            <div class="user-info">
                                                <span class="tb-lead">{{ $investment->user->full_name }}</span>
                                                <span>{{ $investment->user->email }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span class="tb-amount">
                                            {{ $investment->amount }} <span class="currency">BTH</span>
                                        </span>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span>{{ \App\Helper\Utils::formatDate($investment->updated_at) }}</span>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span class="tb-amount">
                                            {{ $investment->expected_return }} <span class="currency">BTH</span>
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
                                        <span>7</span>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span class="{{ $investment->status == 'pending' ? 'text-warning' : 'text-success' }}">
                                            {{ ucfirst($investment->status) }}
                                        </span>
                                    </td>
                                    <td class="nk-tb-col nk-tb-col-tools">
                                        <ul class="nk-tb-actions gx-1">
                                            <li class="nk-tb-action-hidden">
                                                <span class="eg-swal-close btn btn-trigger btn-icon"
                                                      data-toggle="tooltip" data-placement="top" title="close">
                                                    <em class="icon ni ni-lock-fill"></em>
                                                    <form class="closeInvestment" action="/admin/close-investment"
                                                          method="POST">
                                                        @csrf
                                                        <input type='hidden' name="id" value="{{ $investment->id }}">
                                                    </form>
                                                </span>
                                            </li>
                                            <li>
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                       data-toggle="dropdown"><em class="icon ni ni-more-h"></em>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li>
                                                                <a href="#" class="eg-swal-close">
                                                                    <em class="icon ni ni-lock"></em>
                                                                    <span>Close Investment</span>
                                                                    <form class="approveInvestment" method="POST"
                                                                          action="/admin/close-investment">
                                                                        @csrf
                                                                        <input type='hidden' name="id"
                                                                               value="{{ $investment->id }}">
                                                                    </form>
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
                        <em class="ni ni-invest"></em>
                    </span>
                    <p class="empty-state__description mt-2">No investment has been made yet.</p>
                </div>
            @endif
        </div>
    </div> <!-- nk-block -->
@endsection
@section('script')
    @include('partials.alert.close-investment')
@endsection