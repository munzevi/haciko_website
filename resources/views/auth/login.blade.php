@extends('backend.layouts.app')
@push('styles')
<style>
    .form-group .input-group-append .input-group-text, .form-group .input-group-prepend .input-group-text, .input-group .input-group-append .input-group-text, .input-group .input-group-prepend .input-group-text {
        padding:0;

    }
    .input-group-append .input-group-text i, .input-group-prepend .input-group-text i{
        width:60px;
    }

</style>
@endpush
@section('content')
    <body class="login-page">
    <div class="wrapper wrapper-full-page ">
        <div class="full-page section-image" filter-color="purple" data-image="{{asset('backend/assets/passion.jpeg')}}">
             <div class="content">
                <div class="container">
                    <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="card card-login" style="opacity: 0.6;">
                                <div class="card-header ">
                                    <div class="card-header ">
                                        <h3 class="header text-center">{{ __('Login') }}</h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="nc-icon nc-single-02"></i>
                                        </span>
                                        </div>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror                                      </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="nc-icon nc-key-25"></i>
                                            </span>
                                        </div>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <br />
                                    <div class="form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="" checked="">
                                                <span class="form-check-sign"></span>
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ">
                                    <button  type="submit" class="btn btn-warning btn-round btn-block mb-3">{{ __('Login') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
@endsection
@push('scripts')
<script src="{{asset('backend/assets/js/core/jquery.min.js')}}"></script>

<script>
$(function () {
    page = {
            checkFullPageBackgroundImage:function () {
            $page = $('.full-page');
            image_src = $page.data('image');

            if (image_src !== undefined) {
                image_container = '<div class="full-page-background" style="background-image: url(' + image_src + ') "/>';
                $page.append(image_container);
            }
        }
    }
    page.checkFullPageBackgroundImage();
})
</script>
<script>
    $(function () {
        $('body').on('click','#password',function(){
            $('.card-login').css('opacity',1);
        });

        $('body').on('click','#email',function(){
            $('.card-login').css('opacity',1);
        });

    })
</script>
@endpush
