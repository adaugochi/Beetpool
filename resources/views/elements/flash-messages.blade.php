<script>
    toastr.clear();
    @if (session()->has('success'))
    NioApp.Toast("{{ session()->get('success')  }}", 'success', {position: 'top-right', timeOut: 5000});

    @elseif (session()->has('status'))
    NioApp.Toast("{{ session()->get('status')  }}", 'success', {position: 'top-right', timeOut: 5000});

    @elseif (session()->has('info'))
    NioApp.Toast("{{ session()->get('info')  }}", 'info', {position: 'top-right', timeOut: 5000});

    @elseif (session()->has('error'))
    NioApp.Toast("{{ session()->get('error')  }}", 'error', {position: 'top-right', timeOut: 5000});
    @endif
</script>