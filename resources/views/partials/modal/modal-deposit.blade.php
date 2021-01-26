<div class="modal fade zoom" tabindex="-1" id="modalZoom">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Make A Deposit</h3>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <form action="{{ route('create-deposit') }}" method="post" class="form-validate">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="default-03">Amount</label>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-left">
                                        <em class="icon ni ni-sign-dollar"></em>
                                    </div>
                                    <input type="number" class="form-control" id="depositAmountUSD"
                                           name="amount" placeholder="Enter an amount" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-left">
                                        <em class="icon ni ni-sign-btc"></em>
                                    </div>
                                    <input type="text" class="form-control" readonly id="depositAmountBTC">
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
