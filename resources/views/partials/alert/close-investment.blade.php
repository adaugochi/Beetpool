<script>

    $('.eg-swal-close').each(function () {
        $(this).on("click", function(e){
            Swal.fire({
                title: 'Close Investment',
                html: "<p>Are you sure you want to close this investment?</p>",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: `<a href="/admin/close-investment" class="text-white"
                    onclick="event.preventDefault(); document.getElementById('closeInvestment').submit();">Yes</a>
                    `
            });
        });
    })

</script>
