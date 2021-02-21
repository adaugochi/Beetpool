<div class="modal fade zoom" tabindex="-1" id="{{ $modalId ?? 'modalWithdrawal' }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Withdrawal Request</h3>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <form action="{{ $new ? route('save-withdrawal') : route('update-withdrawal') }}"
                      method="post" class="form-validate">
                    @csrf
                    <input type="hidden" name="id" value="{{ $id ?? '' }}">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="default-01">Amount to Withdraw</label>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-left">
                                        <em class="icon ni ni-sign-dollar"></em>
                                    </div>
                                    <input class="form-control @error('amount') is-invalid @enderror"
                                           name="amount" placeholder="Enter an amount" required
                                           value="{{ $amount ?? '' }}" type="number" >

                                    @include('elements.error', ['fieldName' => 'amount'])
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="default-02">Wallet Address</label>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-left">
                                        <em class="icon ni ni-wallet-in"></em>
                                    </div>
                                    <input class="form-control @error('wallet_address') is-invalid @enderror"
                                           name="wallet_address" placeholder="Your Wallet Address" required
                                           value="{{ $wallet_address ?? '' }}" type="text">
                                    @include('elements.error', ['fieldName' => 'wallet_address'])
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-blue float-right mt-4">
                        <span>Submit</span>
                        <em class="icon ni ni-arrow-long-right"></em>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
