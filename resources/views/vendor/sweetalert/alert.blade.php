@if (Session::has('alert.config'))
    @if(config('sweetalert.animation.enable'))
        <link rel="stylesheet" href="{{ config('sweetalert.animatecss') }}">
    @endif
    <!--script src="{{ asset('vendor/sweetalert/sweetalert.all.js')  }}"></script-->
    <script>
        Swal.fire({!! Session::pull('alert.config') !!});
    </script>
@endif
