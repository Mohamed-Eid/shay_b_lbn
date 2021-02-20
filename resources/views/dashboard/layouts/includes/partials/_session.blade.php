@if (session('success'))
    <script>
    Swal.fire(
        "{{ session('success') }}",
        '',
        'success'
    )
    </script>
@endif