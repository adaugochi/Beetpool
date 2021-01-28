<script>

    $('.eg-swal-approve-withdrawal').each(function () {
        $(this).on("click", function(e){
            Swal.fire({
                title: 'Approve Withdrawal Request',
                html: "<p>Are you sure you want to approve this withdrawal request?</p>",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: `<a href="/admin/approve-withdrawal" class="text-white"
                    onclick="event.preventDefault(); ">Yes</a>
                    `
            });

            $(this).find('.approveWithdrawal').submit()
        });
    })

</script>
