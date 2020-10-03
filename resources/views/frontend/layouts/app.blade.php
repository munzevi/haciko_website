<!DOCTYPE #>
<html lang="tr">
    <head>
        <meta http-equiv="Content-Type" content="text/#; charset=UTF-8" />
        <!-- Required meta tags -->
        <meta  name="viewport"  content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <!-- Revolution Slider CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/settings.css')}}" />
        {{-- <link rel="stylesheet" href="{{asset('assets/css/layers.css')}}" /> --}}
        {{-- <link rel="stylesheet" href="{{asset('assets/css/navigation.css')}}" /> --}}

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
        <!-- Owl Theme Default CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}" />
        <!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}" />
        <!-- Owl Magnific CSS -->
        {{-- <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}" /> --}}
        <!-- Animate CSS -->
        {{-- <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}" /> --}}
        <!-- Boxicons CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/boxicons.min.css')}}" />
        <!-- Flaticon CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}" />
        <!-- Image Light Box CSS -->
        {{-- <link rel="stylesheet" href="{{asset('assets/css/imagelightbox.min.css')}}" /> --}}
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/meanmenu.css')}}" />
        <!-- Nice Select CSS -->
        {{-- <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}" /> --}}
        <!-- Odometer CSS-->
        {{-- <link rel="stylesheet" href="{{asset('assets/css/odometer.css')}}" /> --}}
        <!-- Style CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}" />

        <title>HAÇİKO - Hayvanları Çaresizlik ve İlgisizlikten Koruma Derneği</title>

        <link rel="icon" type="image/png" href="#" />
    </head>
    <body>
    @include('frontend.partials.preloader')
    @include('frontend.partials.navbar')

    @if(count($contents->slider) > 0)
        @include('frontend.components.slider')
    @endif

    @if(!is_null($contents->content))
        {!!$contents->content!!}
    @endif

    @if(!is_null($contents->extra_fields))
        @foreach($contents->extra_fields as $field)
            @if($field['key'] === 'map')
                @include('frontend.components.map')
            @endif
        @endforeach
    @endif

    @include('frontend.partials.footer')

     <div class="go-top">
        <i class="bx bx-chevron-up">
        </i>
        <i class="bx bx-chevron-up">
        </i>
    </div>
    <!-- End Go Top Section -->
    <script src="{{asset('assets/js/svg-turkiye-haritasi.js')}}"></script>
    <script>
      svgturkiyeharitasi();
    </script>
    <!-- Jquery Slim JS -->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <!-- Popper JS -->
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <!-- Meanmenu JS -->
    <script src="{{asset('assets/js/jquery.meanmenu.js')}}"></script>
    <!-- Easing Min JS -->
    <script src="{{asset('assets/js/jquery.easing.min.js')}}"></script>
    <!-- Owl Carousel JS -->
    <script src="{{asset('assets/js/owl.carousel.js')}}"></script>
    <!-- Owl Magnific JS -->
    <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <!-- Nice Select JS -->
    {{-- <script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script> --}}
    <!-- Appear JS -->
    {{-- <script src="{{asset('assets/js/jquery.appear.js')}}"></script> --}}
    <script src="{{asset('assets/js/main.js')}}"></script>
  </body>
</html>
