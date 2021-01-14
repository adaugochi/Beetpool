<div class="modal fade zoom" tabindex="-1" id="{{ $modalId }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Initiate An Investment</h3>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <p>You want to initiate an investment for <strong>{{ $name }}</strong></p>
                <form action="{{ route('admin.invest') }}" method="post" class="form-validate">
                    @csrf
                    <input type="hidden" name="id" value="{{ $id }}">
                    <div class="form-group">
                        <label class="form-label" for="default-03">Amount</label>
                        <div class="form-control-wrap">
                            <div class="form-icon form-icon-left">
                                <em class="icon ni ni-sign-btc"></em>
                            </div>
                            <input type="text" class="form-control" id="default-03"
                                   name="amount" value="{{ $amount }}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="fv-topics">ROI</label>
                        <div class="form-control-wrap ">
                            <select class="form-control form-select @error('roi') is-invalid @enderror"
                                    id="fv-topics" name="roi" required>
                                <option label="Pick one" value=""></option>
                                @foreach(\App\Transaction::$ROI as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                            @include('elements.error', ['fieldName' => 'roi'])
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
