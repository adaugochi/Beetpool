(function ($) {
    let submitInvestForm = $('#submitInvest'),
        investSelect = $('#formSelectInvest'),
        walletBalanceVal = $('#walletBalance').val(),
        message = 'The balance on your wallet is not enough for this investment plan. ' +
        'Kindly proceed to make a deposit in your wallet';

    function validation(e, plan, $this) {
        if (walletBalanceVal < plan) {
            e.preventDefault();
            $this.find('.error').text(message)
        } else {
            $this.find('.error').text('')
        }
    }

    submitInvestForm.on('submit', function (e) {
        let plan = investSelect.val(),
            $this = $(this);
        switch (plan) {
            case "starter":
                validation(e, 500, $this);
                break;
            case "golden":
                validation(e, 1000, $this);
                break;
            case "premium":
                validation(e, 2000, $this);
                break;
            case "deluxe":
                validation(e, 5000, $this);
                break;
            case "exclusive":
                validation(e, 10000, $this);
                break;
            default:
                validation(e, 20000, $this);
        }
    })
})(jQuery);