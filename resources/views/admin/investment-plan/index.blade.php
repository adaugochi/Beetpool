@extends('admin.layouts.main')
@section('title', 'Home')
@section('back', '/')
@section('back-title', 'Go Back')
@section('content-title', 'Investment Plans')
@section('content-side')
    <div class="nk-block-head-content">
        <button type="button" class="btn btn-success mt-4"
                data-toggle="modal" data-target="#modalAddPlan">
            <em class="icon ni ni-plus"></em>
            <span>Add Plan</span>
        </button>
    </div>
    @include('partials.modal.modal-plan')
@endsection
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
            @if(sizeof($plans) > 0)
                <div class="card card-bordered card-preview">
                    <div class="card-inner">
                        <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                            <thead>
                            <tr class="nk-tb-item nk-tb-head">
                                <th class="nk-tb-col"><span class="sub-text">S/N</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Name</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Amount</span></th>
                                <th class="nk-tb-col"><span class="sub-text">ROI</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Created</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Action</span></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($plans as $key => $plan)
                                <tr class="nk-tb-item">
                                    <td class="nk-tb-col">
                                        <span>{{ $key+1 }}</span>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span>{{ $plan->name }}</span>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span class="tb-amount">
                                            <span class="currency">$</span>{{ $plan->amount }}
                                        </span>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span>{{ $plan->roi }} %</span>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span>{{ \App\Helper\Utils::formatDate( $plan->created_at)}}</span>
                                    </td>
                                    <td class="nk-tb-col nk-tb-col-tools">
                                        <ul class="nk-tb-actions gx-1">
                                            <li class="nk-tb-action-hidden">
                                                <a href="#"
                                                   class="btn btn-trigger btn-icon" data-toggle="tooltip"
                                                   data-placement="top" title="Deactivate">
                                                    <em class="icon ni ni-activity-round-fill"></em>
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
                                                                <a href="#" data-toggle="modal"
                                                                   data-target="#modalAddPlan{{ $plan->id }}">
                                                                    <em class="icon ni ni-edit"></em>
                                                                    <span>Edit</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <em class="icon ni ni-activity"></em>
                                                                    <span>Deactivate</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                @include('partials.modal.modal-plan', [
                                                    'name' => $plan->name,
                                                    'modalId' => 'modalAddPlan'. $plan->id,
                                                    'amount' => $plan->amount,
                                                    'id' => $plan->id,
                                                    'roi' => $plan->roi
                                                ])
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
                        <em class="ni ni-package"></em>
                    </span>
                    <p class="empty-state__description mt-2">No plan has been made yet.</p>
                </div>
            @endif
        </div>
    </div> <!-- nk-block -->
@endsection