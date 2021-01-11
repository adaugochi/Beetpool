@extends('admin.layouts.main')
@section('title', 'Deposit')
@section('back', route('admin.deposits'))
@section('back-title', 'Deposits')
@section('content-title', 'KYC / ' . $deposit->user->fullname)
@section('content')
    <div class="nk-block">
        <div class="row gy-5">
            <div class="col-lg-6">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h5 class="nk-block-title title">Transaction Info</h5>
                        <p>Maturity date, transaction type, status etc.</p>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="card card-bordered">
                    <ul class="data-list is-compact">
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Transaction Type</div>
                                <div class="data-value">{{ ucfirst($deposit->transaction_type) }}</div>
                            </div>
                        </li>
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Wallet Address</div>
                                <div class="data-value word-break">
                                    {{ $deposit->wallet_address ?? 'Nil' }}
                                </div>
                            </div>
                        </li>
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Transaction ID</div>
                                <div class="data-value word-break">
                                    {{ $deposit->transaction_id ?? 'Nil' }}
                                </div>
                            </div>
                        </li>
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Amount</div>
                                <div class="data-value">{{ $deposit->amount }} BTH</div>
                            </div>
                        </li>
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Created At</div>
                                <div class="data-value">{{ $deposit->formatDate() }}</div>
                            </div>
                        </li>
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Status</div>
                                <div class="data-value">
                                    <span class="badge badge-dim badge-sm badge-outline-{{ $deposit->status == 'approved' ? 'success' : 'warning' }}">
                                        {{ ucfirst($deposit->status) }}
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Maturity Status</div>
                                <div class="data-value">{{ $deposit->maturity_status ?? 'Nil' }}</div>
                            </div>
                        </li>
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Maturity Date</div>
                                <div class="data-value">{{ $deposit->maturity_date ?? 'Nil' }}</div>
                            </div>
                        </li>
                    </ul>
                </div><!-- .card -->
            </div><!-- .col -->
            <div class="col-lg-6">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h5 class="nk-block-title title">User Information</h5>
                        <p>Basic info, like name, phone, address, country etc.</p>
                    </div>
                </div>
                <div class="card card-bordered">
                    <ul class="data-list is-compact">
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Full Name</div>
                                <div class="data-value">{{ $deposit->user->fullname }}</div>
                            </div>
                        </li>
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Username</div>
                                <div class="data-value">{{ $deposit->user->username }}</div>
                            </div>
                        </li>
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Email Address</div>
                                <div class="data-value">{{ $deposit->user->email }}</div>
                            </div>
                        </li>
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Phone Number</div>
                                <div class="data-value text-soft">
                                    {{ $deposit->user->phone_number ?? 'Nil' }}
                                </div>
                            </div>
                        </li>
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Country</div>
                                <div class="data-value">
                                    {{ $deposit->user->country ?? 'Nil' }}
                                </div>
                            </div>
                        </li>
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">State</div>
                                <div class="data-value">
                                    {{ $deposit->user->state ?? 'Nil' }}
                                </div>
                            </div>
                        </li>

                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Address</div>
                                <div class="data-value">
                                    {{ $deposit->user->address ?? 'Nil' }}
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .nk-block -->
@endsection