
@if(session()->has('success'))

    <script>
        Swal.fire({
            icon: 'success',
            title: '{{__("datatables.alerts.success") }}',
            text: '{{__("datatables.alerts.completed") }}',
            timer: 2000
        });
    </script>

@endif
