<footer class="footer-section pt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h3>{{__('frontend.contactInfo')}}</h3>

                    <div class="footer-info-contact">
                        <i class="flaticon-pin"></i>
                        <h3>{{__('frontend.address')}}</h3>
                        <span>
                            {!!
                            collect($settings['genel'])
                                ->where('key','adres')
                                ->first()['value']
                            !!}
                        </span>
                    </div>

                    <div class="footer-info-contact">
                        <i class="flaticon-call"></i>
                        <h3>{{__('frontend.phone')}}</h3>
                        <span><a href="tel:{{
                            $settings['genel']
                                ->where('key','Telefon')
                                ->first()['value']
                            }}">{{
                            $settings['genel']
                                ->where('key','Telefon')
                                ->first()['value']
                            }}</a></span>
                    </div>

                    <div class="footer-info-contact">
                        <i class="flaticon-email"></i>
                        <h3>{{__('frontend.email')}}</h3>
                        <span>
                            <a href="{{
                            $settings['genel']
                                ->where('key','ePosta')
                                ->first()['value']
                            }}">
                                {{
                            $settings['genel']
                                ->where('key','ePosta')
                                ->first()['value']
                            }}
                            </a>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h3>{{__('frontend.support')}}</h3>
                    <ul class="footer-quick-links">
                        <li>
                            <a href="#">
                               Haçiko Ailesine Katılın
                            </a>
                        </li>
                         <li>
                            <a href="#">
                                Online Bağış
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Havale/Eft Bağış
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Mama Bağışları
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Kurumsal Bağışlar
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Özel Gün Kartları
                            </a>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h3>{{__('frontend.activities')}}</h3>

                    <ul class="footer-quick-links">
                        <li>
                            <a href="#">
                                Haçiko Çocukları
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Farkındalık
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Etkinliklerimiz
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Besleme
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Tedavi
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Kulübe
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Eğitim
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h3>{{__('frontend.news')}}</h3>

                    <div class="footer-news">
                       <a href="single-blog.html">
                            <img src="{{asset('assets/images/IMG_1433.jpg')}}" alt="image">
                            <h4>Lorem ipsum dolor sit amet.</h4>
                            <span>{{\Carbon\Carbon::parse('2020/09/10')->format('d/m/Y')}}</span>
                       </a>
                    </div>

                    <div class="footer-news">
                       <a href="single-blog.html">
                        <img src="{{asset('assets/images/IMG_1433.jpg')}}" alt="image">
                        <h4>Lorem ipsum dolor sit amet consectetur.</h4>
                            <span>{{\Carbon\Carbon::parse('2020/08/10')->format('d/m/Y')}}</span>
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
                    <img src="assets/images/202x69_Logo_Yatay-beyaz.png" alt="image">
                </div>
            </div>
            <div class="col-md-8">
                <ul class="terms">
                    <li>
                        <a href="terms-condition.html">{{__('frontend.privacy')}}</a>
                    </li>
                    <li>
                        <a href="privacy-policy.html">{{__('frontend.personalData')}}</a>
                    </li>
                    <li>
                        <a href="privacy-policy.html">{{__('frontend.contact')}}</a>
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
                                {{__('frontend.copyright')}}
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
                                </script> coded with
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart-fill heart" fill="red"
                                    xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
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
