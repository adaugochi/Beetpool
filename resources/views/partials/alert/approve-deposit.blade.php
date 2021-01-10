<script>
    let depositVal;

    $('.eg-swal-approve').each(function () {
        $(this).on("click", function(e){
            Swal.fire({
                title: 'Approve Deposit Transaction',
                html: "<p>Are you sure you want to approve this deposit transaction?</p>",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: `<a href="/admin/approve-deposit" class="text-white"
                    onclick="event.preventDefault(); ">Yes</a>
                    `
            });

            $(this).find('.approveDeposit').submit()
        });
    })

</script>
