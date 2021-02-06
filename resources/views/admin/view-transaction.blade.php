@extends('admin.layouts.main')
@section('title', 'Transaction')
@section('back', route('admin.transactions'))
@section('back-title', 'Transactions')
@section('content-title', 'KYC / ' . $transaction->user->full_name)
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
                                <div class="data-value">{{ ucfirst($transaction->trxType->name) }}</div>
                            </div>
                        </li>
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Wallet Address</div>
                                <div class="data-value word-break">
                                    {{ $transaction->wallet_address ?? 'Nil' }}
                                </div>
                            </div>
                        </li>
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Transaction ID</div>
                                <div class="data-value word-break">
                                    {{ $transaction->transaction_id ?? 'Nil' }}
                                </div>
                            </div>
                        </li>
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Amount</div>
                                <div class="data-value">${{ number_format($transaction->amount) }}</div>
                            </div>
                        </li>
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Created At</div>
                                <div class="data-value">{{ $transaction->formatDate() }}</div>
                            </div>
                        </li>
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Status</div>
                                <div class="data-value">
                                    @if($transaction->status == 'pending')
                                        <span class="badge badge-dim badge-sm badge-outline-warning">
                                            {{ ucfirst($transaction->status) }}
                                        </span>
                                    @elseif($transaction->status == 'closed')
                                        <span class="badge badge-dim badge-sm badge-outline-danger">
                                            {{ ucfirst($transaction->status) }}
                                        </span>
                                    @else
                                        <span class="badge badge-dim badge-sm badge-outline-success">
                                            {{ ucfirst($transaction->status) }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </li>
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Expected Return</div>
                                <div class="data-value">
                                    ${{ $transaction->expected_return ?? 0 }}</div>
                            </div>
                        </li>
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Maturity Status</div>
                                <div class="data-value">
                                    @if($transaction->status == 'pending')
                                        <span class="badge badge-dim badge-sm badge-outline-warning">
                                            {{ ucfirst($transaction->status) }}
                                        </span>
                                    @elseif($transaction->status == 'matured')
                                        <span class="badge badge-dim badge-sm badge-outline-success">
                                            {{ ucfirst($transaction->status) }}
                                        </span>
                                    @else
                                        <span class="">Nil</span>
                                    @endif
                                </div>
                            </div>
                        </li>
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Maturity Date</div>
                                <div class="data-value">
                                    {{ $transaction->maturity_date ? \App\Helper\Utils::formatDate($transaction->maturity_date) : 'Nil' }}
                                </div>
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
                                <div class="data-value">{{ $transaction->user->full_name }}</div>
                            </div>
                        </li>
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Username</div>
                                <div class="data-value">{{ $transaction->user->username }}</div>
                            </div>
                        </li>
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Email Address</div>
                                <div class="data-value">{{ $transaction->user->email }}</div>
                            </div>
                        </li>
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Phone Number</div>
                                <div class="data-value text-soft">
                                    {{ $transaction->user->phone_number ?? 'Nil' }}
                                </div>
                            </div>
                        </li>
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Country</div>
                                <div class="data-value">
                                    {{ $transaction->user->country->name ?? 'Nil' }}
                                </div>
                            </div>
                        </li>
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">State</div>
                                <div class="data-value">
                                    {{ $transaction->user->state ?? 'Nil' }}
                                </div>
                            </div>
                        </li>

                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Address</div>
                                <div class="data-value">
                                    {{ $transaction->user->address ?? 'Nil' }}
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .nk-block -->
@endsection