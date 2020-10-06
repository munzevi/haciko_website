<!DOCTYPE #>
<html lang="tr">
    <head>
        <meta http-equiv="Content-Type" content="text/#; charset=UTF-8" />
        <meta  name="viewport"  content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <link rel="stylesheet" href="{{asset('assets/css/settings.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/boxicons.min.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/meanmenu.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}" />
        <title>HAÇİKO - Hayvanları Çaresizlik ve İlgisizlikten Koruma Derneği</title>
        <link rel="icon" type="image/png" href="#" />
    </head>
    <body>
    @include('frontend.partials.preloader')

    @include('frontend.partials.navbar')

    @if(count($contents->slider) > 0)
        @include('frontend.components.slider')
    @else
        @include('frontend.partials.banner')
    @endif

    @if(!is_null($contents->content))
        {!!$contents->content!!}
    @else
    <div class="container my-4">
        <div class="alert alert-warning text-center">
            Sayfa içeriği bulunmuyor.
        </div>
    </div>
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
    <script>
        window.onload = function(){
            if(window.location.href.endsWith('farkindalik')){
                let width = document.getElementById('iframe').clientWidth -30;
                let height = document.getElementById('iframe').clientHeight
                document.querySelector("#iframe > iframe").setAttribute('width',width)
                document.querySelector("#iframe > iframe").setAttribute('height',height)
            }
        }

    </script>
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
