<div class="navbar-area navbar-haciko" style="top:0;">
    <div class="haciko-responsive-nav">
        <div class="container">
            <div class="haciko-responsive-menu">
                <div class="logo">
                    <a href="#">
                        <img src="{{asset('assets/images/202x69_Logo_Yatay.png')}}"
                        class="white-logo" alt="haciko-logo" />
                        <img
                        src="{{asset('assets/images/202x69_Logo_Yatay.png')}}"
                        class="black-logo" alt="image" />
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="haciko-nav">
        <div class="container">
            <nav class="topbar w-100 bg-white navbar-fixed">
                <div class="row">
                    <div class="col-md-6">
                        <div class="others-options">
                            <div class="dropdown language-switcher d-inline-block">
                                <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                style="">
                                    <span>TR <i class="bx bx-chevron-down"></i></span>
                                    <img src="{{asset('assets/images/turkey.png')}}" class="shadow" alt="image">
                                </button>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item d-flex align-items-center">
                                        <img src="{{asset('assets/images/us-flag.jpg')}}" class="shadow-sm" alt="flag">
                                        <span>US</span>
                                    </a>
                                </div>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item d-flex align-items-center">
                                        <img src="{{asset('assets/images/turkey.png')}}" class="shadow-sm" alt="flag">
                                        <span>TR</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="top-header-social" >
                            <span>Bizi Takip Edin:</span>
                            <a href="#" target="_blank">
                                <i class="flaticon-facebook"></i>
                            </a>

                            <a href="#" target="_blank">
                                <i class="flaticon-twitter"></i>
                            </a>

                            <a href="#" target="_blank">
                                <i class="flaticon-instagram"></i>
                            </a>

                            <a href="#" target="_blank">
                                <i class="flaticon-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
        <nav class="navbar navbar-expand-md navbar-light">
            <a class="navbar-brand" href="#">
            <img
                src="{{asset('assets/images/202x69_Logo_Yatay.png')}}"
                class="white-logo"
                alt="logo"
            />
            <img
                src="{{asset('assets/images/202x69_Logo_Yatay.png')}}"
                class="black-logo"
                alt="image"
            />
            </a>

            <div
            class="collapse navbar-collapse mean-menu"
            id="navbarSupportedContent"
            style="display: block;"
            >
            @foreach($contents->where('show_on_menu',true)->where('parent_id',null)->where('status',true)->get() as $index => $parent)
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a href="#" class="nav-link ">
                        <span>0{{$index+1}}</span>
                        {{$parent->name}}
                        @if($parent->child->count() >1 )
                        <i class="bx bx-chevron-down"></i>
                        @endif
                    </a>
                    @if($parent->child->count() >1 )
                    <ul class="dropdown-menu">
                        @foreach($parent->child as $key => $children)
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                            {{$children->name}}
                            @if($children->child->count() >1 )
                                <i class="bx bx-chevron-down"></i>
                            </a>
                                <ul class="dropdown-menu">
                                    @foreach($children->child as $grandChild)
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                {{$grandChild->name}}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                            </a>
                        </li>
                            @endif
                        @endforeach
                    </ul>
                    @endif
                </li>
            </ul>
            @endforeach
            </div>
        </nav>
        </div>
    </div>
</div>