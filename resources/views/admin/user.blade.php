@extends('admin.layouts.main')
@section('title', 'User')
@section('back', route('admin.home'))
@section('back-title', 'Dashboard')
@section('content-title', 'Users')
@section('content')
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <div class="nk-block-des">
                    <p>Overview</p>
                </div>
            </div>
        </div>
        <div class="nk-block nk-block-lg">
            @if(sizeof($users) > 0)
                <div class="card card-bordered card-preview">
                    <div class="card-inner">
                        <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                            <thead>
                            <tr class="nk-tb-item nk-tb-head">
                                <th class="nk-tb-col"><span class="sub-text">User Info</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Email Address</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Address</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Phone Number</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Status</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Created At</span></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $key => $user)
                                <tr class="nk-tb-item">
                                    <td class="nk-tb-col">
                                        <div class="user-card">
                                            <div class="user-info">
                                                <span class="tb-lead">
                                                    {{ $user->full_name }}
                                                </span>
                                                <span>{{ $user->username }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span>{{ $user->email }}</span>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span>{{ $user->address ?? '' }}</span>
                                        <span>{{ $user->state  ?? '' }}</span>
                                        <span>{{ $user->country ? $user->country->name : '' }}</span>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span class="tb-lead">{{ $user->phone_number }}</span>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span class="{{ $user->email_verified_at == null ? 'text-danger' : 'text-success' }}">
                                            {{ $user->email_verified_at == null ? 'Unverified' : 'Verified' }}
                                        </span>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span>{{ $user->formatDate() }}</span>
                                    </td>
                                    {{--<td class="nk-tb-col nk-tb-col-tools">--}}
                                        {{--<ul class="nk-tb-actions gx-1">--}}
                                            {{--<li class="nk-tb-action-hidden">--}}
                                                {{--<a href="{{ route('admin.user-transactions', $user->id) }}"--}}
                                                   {{--class="btn btn-trigger btn-icon"--}}
                                                   {{--data-toggle="tooltip" data-placement="top" title="View">--}}
                                                    {{--<em class="icon ni ni-eye-fill"></em>--}}
                                                {{--</a>--}}
                                            {{--</li>--}}
                                            {{--<li>--}}
                                                {{--<div class="dropdown">--}}
                                                    {{--<a href="#" class="dropdown-toggle btn btn-icon btn-trigger"--}}
                                                       {{--data-toggle="dropdown"><em class="icon ni ni-more-h"></em>--}}
                                                    {{--</a>--}}
                                                    {{--<div class="dropdown-menu dropdown-menu-right">--}}
                                                        {{--<ul class="link-list-opt no-bdr">--}}
                                                            {{--<li>--}}
                                                                {{--<a href="{{ route('admin.user-transactions', $user->id) }}">--}}
                                                                    {{--<em class="icon ni ni-eye"></em>--}}
                                                                    {{--<span>View Transactions</span>--}}
                                                                {{--</a>--}}
                                                            {{--</li>--}}
                                                        {{--</ul>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</li>--}}
                                        {{--</ul>--}}
                                    {{--</td>--}}
                                </tr><!-- .nk-tb-item  -->
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- .card-preview -->
            @else
                <div class="empty-state">
                    <span class="empty-state__icon">
                        <em class="ni ni-users"></em>
                    </span>
                    <p class="empty-state__description mt-2">No user has registered yet.</p>
                </div>
            @endif
        </div>
    </div> <!-- nk-block -->
@endsection