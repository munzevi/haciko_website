<footer class="footer-section pt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h3>{{__('frontend.contactInfo')}}</h3>

                    <div class="footer-info-contact">
                        <i class="flaticon-pin"></i>
                        <h3>{{__('frontend.address')}}</h3>
                        <span>{!!$genelAyarlar->where('key','adres')->first()->value!!}</span>
                    </div>

                    <div class="footer-info-contact">
                        <i class="flaticon-call"></i>
                        <h3>{{__('frontend.phone')}}</h3>
                        <span><a callto="{{str_replace(' ','',$genelAyarlar->where('key','Telefon')->first()->value)}}">{{$genelAyarlar->where('key','Telefon')->first()->value}}</a></span>
                    </div>

                    <div class="footer-info-contact">
                        <i class="flaticon-email"></i>
                        <h3>{{__('frontend.phone')}}</h3>
                        <span>
                        <a mailto="{{$genelAyarlar->where('key','ePosta')->first()->value}}">
                            {{$genelAyarlar->where('key','ePosta')->first()->value}}
                            </a>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h3>{{__('frontend.support')}}</h3>
                    <ul class="footer-quick-links">
                       @foreach($nasilDesteklerim->get() as $key => $value)
                        <li>
                            <a href="{{$value->url}}">
                                {{$value->name}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h3>{{__('frontend.activities')}}</h3>

                    <ul class="footer-quick-links">
                        @foreach($nelerYapiyoruz->get() as $key => $value)
                        <li>
                            <a href="{{$value->url}}">
                                {{$value->name}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h3>Güncel</h3>

                    <div class="footer-news">
                       <a href="single-blog.html">
                            <img src="http://localhost:8000/assets/images/IMG_1433.jpg" alt="image">
                            <h4>Lorem ipsum dolor sit amet.</h4>
                            <span>10/09/2020</span>
                       </a>
                    </div>

                    <div class="footer-news">
                       <a href="single-blog.html">
                        <img src="http://localhost:8000/assets/images/IMG_1433.jpg" alt="image">
                        <h4>Lorem ipsum dolor sit amet consectetur.</h4>
                            <span>10/08/2020</span>
                       </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="copyright-logo">
                    <img src="/assets/images/202x69_Logo_Yatay-beyaz.png" alt="image">
                </div>
            </div>
            <div class="col-md-8">
                <ul class="terms">
                    <li>
                        <a href="terms-condition.html">Gizlilik İlkeleri ve Güvenlik Politikası</a>
                    </li>
                    <li>
                        <a href="privacy-policy.html">Kişisel Verilerin Korunması</a>
                    </li>
                    <li>
                        <a href="privacy-policy.html">İletişim</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="copyright-area-content">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p>
                            <span class="copyright">
                                Her haklı kamu yararınadır
                                <script>
                                  document.write(new Date().getFullYear())
                                </script>
                              </span>
                        </p>
                    </div>

                    <div class="col-md-6">
                        <p>
                            <span class="copyright-right">
                                <script>
                                </script> coded with <i class="fa fa-heart heart" aria-hidden="true"></i>
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart-fill heart" fill="red" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"></path>
                                    </svg>
                                    by
                                <a href="https://munzevi.net">munzevi</a>
                              </span>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</footer>
