<script>
    @if (auth()->user()->is_profile_complete == 0 && Route::current()->getName() != 'profile')
        Swal.fire({
            title: 'Complete your profile',
            html: "<p>In order to gain complete access to the features on this portal,</p>" +
                "<p>kindly click on the button below</p>",
            icon: 'info',
            confirmButtonText: '<a href="/profile" class="text-white">Continue</a>'
        });
    @endif
</script>