<div class="modal fade zoom" tabindex="-1" id="{{ $modalId ?? 'modalAddPlan' }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add Investment Plan</h3>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.save-investment-plan') }}" method="post" class="form-validate">
                    @csrf
                    <input type="hidden" name="id" value="{{ $id ?? '' }}">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="default-01">Name</label>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-left">
                                        <em class="icon ni ni-notes"></em>
                                    </div>
                                    <input type="text" class="form-control" id="default-01" value="{{ $name ?? '' }}"
                                           name="name" placeholder="E.g Starter" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="default-02">Amount</label>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-left">
                                        <em class="icon ni ni-sign-dollar"></em>
                                    </div>
                                    <input type="number" class="form-control" id="default-02" value="{{ $amount ?? '' }}"
                                           name="amount" placeholder="E.g 1000.00" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="default-03">ROI</label>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-left">
                                        <em class="icon ni ni-percent"></em>
                                    </div>
                                    <input type="number" class="form-control" id="default-03" value="{{ $roi ?? '' }}"
                                           name="roi" placeholder="E.g 35" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success float-right mt-4">
                        <span>Submit</span>
                        <em class="icon ni ni-arrow-long-right"></em>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
