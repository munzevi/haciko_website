<div class="main-banner-area">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="main-banner-content">
                            <!-- <span>Haciko</span> -->
                            <h1 style="color:#302c51;">Hayvanları Çaresizlik ve İlgisizlikten Koruma Derneği</h1>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                incididunt ut laboredolore magna aliqua elsed tempomet
                                scing.
                            </p>
                            <div class="banner-btn">
                                <a href="##" class="default-btn">
                                Action Button
                                <i class="flaticon-right"></i>
                                <span></span>
                                </a>
                                <a class="optional-btn" href="##">
                                Another Action
                                <i class="flaticon-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12" style="padding-right: 0;">
                <div class="banner-slider-wrap">
                    <div class="banner-image-slider owl-carousel owl-theme owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(-4615px, 0px, 0px); transition: all 1s ease 0s; width: 7384px;">
                                @foreach($contents->slider->first()->path as $key => $value)
                                <div class="owl-item @if($loop->first) active @endif" style="width: 923px;">
                                    <div class="image-item">
                                        <img id="banner-{{$key}}" src="{{$value}}" alt="image">
                                    </div>
                                </div>
                                @endforeach
                                @foreach($contents->slider->first()->path as $key => $value)
                                <div class="owl-item cloned @if($loop->first) active @endif" style="width: 923px;">
                                    <div class="image-item">
                                        <img id="banner-{{$key}}" src="{{$value}}" alt="image">
                                    </div>
                                </div>
                                @endforeach
                                <div class="owl-nav">
                                    <button type="button" role="presentation" class="owl-prev">
                                        <i class="flaticon-left"></i>
                                    </button>
                                    <button type="button" role="presentation" class="owl-next">
                                        <i class="flaticon-right"></i>
                                    </button>
                                </div>
                            <div class="owl-dots disabled"></div>
                            </div>
                            {{-- <div class="banner-video">
                                <a href="https://www.youtube.com/watch?v=uemObN8_dcw"
                                class="video-btn popup-youtube" >
                                <i class="bx bx-play">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-play-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.596 8.697l-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/>
                                    </svg>
                                </i>
                                </a>
                                <span>Sen de gel! izle.</span>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-text">
            </div>
            <div class="banner-shape">
                <img src="{{asset('assets/images/shape.png')}}" alt="image" />
            </div>
        </div>
    </div>
</div>
