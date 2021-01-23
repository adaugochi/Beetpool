<div class="col-md-4">
    <div class="nk-wg-card card h-100">
        <div class="card-inner h-100">
            <div class="nk-iv-wg2">
                <div class="nk-iv-wg2-text">
                    <h4 class="plan-item-title card-title title text-center mb-3 pb-3 border-bottom">
                        {{ $plan['name'] }}
                    </h4>
                    <div class="plan-item-summary card-text text-center mb-3">
                        <div class="row mb-3">
                            <div class="col-12">
                                <span class="lead-text">
                                    {{ $plan['roi'] }}%
                                </span>
                                <span class="sub-text">Daily Interest for 7days</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <span class="desc-data font-weight-bold text-primary fs-18px">
                                    ${{ number_format($plan['amount']) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .card -->
</div><!-- .col -->
