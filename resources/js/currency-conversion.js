(function ($) {

    let depositAmtFieldInUSD = $('#depositAmountUSD'),
        depositAmtFieldInBTC = $('#depositAmountBTC');

    depositAmtFieldInUSD.keyup(function () {
        let val = $(this).val();
        axios.get('https://free.currconv.com/api/v7/convert?q=USD_BTC&compact=ultra&apiKey=abdfcd22601b24d84f14')
        .then(function (response) {
            let rate = response.data.USD_BTC,
                result = val * rate;
            depositAmtFieldInBTC.val(result);
            console.log(rate);
        })
        .catch(function (error) {
            NioApp.Toast(error, 'error', {position: 'top-right', timeOut: 5000});
        });
    });

    $(document).ready(function() {
        let walletBalUSD = $('#walletBalUSD').val();
        axios.get('https://free.currconv.com/api/v7/convert?q=USD_BTC&compact=ultra&apiKey=abdfcd22601b24d84f14')
        .then(function (response) {
            let rate = response.data.USD_BTC,
                result = walletBalUSD * rate;
            $('#walletBalBTC').text(result);
            console.log(rate);
        })
        .catch(function (error) {
            NioApp.Toast(error, 'error', {position: 'top-right', timeOut: 5000});
        });
    });

})(jQuery);