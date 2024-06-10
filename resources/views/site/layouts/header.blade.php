<header class="transparent-header">
    <div class="header-top-wrap">
        <div class="container custom-container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                    <div class="header-top-left">
                        <ul class="list-wrap">
                            <li class="header-location">
                                <i class="fas fa-map-marker-alt"></i>
                                {{__('language.riyadh_casablanca_masnaai_strict')}}
                            </li>
                            <li>
                                <i class="fas fa-envelope"></i>
                                <a href="mailto:naseemalmurooj@gmail.com">naseemalmurooj@gmail.com</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    <div class="header-top-right">
                        <div class="header-top-menu">
                            <ul class="list-wrap">
                                <li><a href="{{route('site.contact-us')}}">{{__('language.help')}}</a></li>
                                <li><a href="{{route('site.contact-us')}}">{{__('language.support')}}</a></li>
                                <li><a href="{{route('site.contact-us')}}">{{__('language.contact')}}</a></li>
                            </ul>
                        </div>
                        <div class="header-top-social">
                            <ul class="list-wrap">
                                <li class="dropdown language-switcher">
                                    <button class="dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        @if (App::getLocale() == 'ar')
                                        {{ LaravelLocalization::getCurrentLocaleName() }}
                                        <img class="mx-1" src="{{ URL::asset('assets/images/flags/SA.png') }}"
                                            alt="Arabic">
                                        @else
                                        {{ LaravelLocalization::getCurrentLocaleName() }}
                                        <img lass="mx-1" src="{{ URL::asset('assets/images/flags/US.png') }}"
                                            alt="English">
                                        @endif
                                    </button>
                                    <ul style="background-color: rgb(62 30 14);" class="dropdown-menu"
                                        aria-labelledby="dropdownMenuButton">
                                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode
                                        =>$properties)
                                        <li>
                                            <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                {{ $properties['native'] }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="sticky-header" class="menu-area">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="menu-wrap">
                        <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                        <nav class="menu-nav">
                            <div class="logo">
                                <a href="{{route('site.home')}}"><img src="{{asset('site/assets/img/logo/logo.png')}}"
                                        alt="Logo"></a>
                            </div>
                            <div class="navbar-wrap main-menu d-none d-lg-flex">
                                <ul class="navigation">
                                    <li><a href="{{route('site.home')}}">{{__('language.home')}}</a></li>
                                    <li><a href="{{route('site.about-us')}}">{{__('language.about_us')}}</a></li>
                                    <li><a href="{{route('site.products')}}">{{__('language.products')}}</a></li>
                                    <li><a href="{{route('site.about-company')}}">{{__('language.about_company')}}</a></li>
                                    <li><a href="{{route('site.inspire')}}">{{__('language.inspire')}}</a></li>
                                    <li><a href="{{route('site.contact-us')}}">{{__('language.contact_us')}}</a></li>
                                </ul>
                            </div>
                            <div class="header-action d-none d-md-block">
                                <ul class="list-wrap">
                                    <li class="header-search">
                                        <a href="#"><i class="flaticon-search"></i></a>
                                    </li>
                                    <li class="header-btn">
                                        <a href="https://wa.me/966511050136" target="_blank" class="btn">
                                            @if (App::getLocale() == 'ar')
                                            <span lang="en" dir="ltr">+966 51 105 0136</span>
                                            @else
                                            <span lang="en">+966 51 105 0136</span>
                                            @endif
                                            <i class="fa-brands fa-whatsapp fa-lg text-success mx-1"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>

                    <!-- Mobile Menu  -->
                    <div class="mobile-menu">
                        <nav class="menu-box">
                            <div class="close-btn"><i class="fas fa-times"></i></div>
                            <div class="nav-logo">
                                <a href="index.html"><img src="{{asset('site/assets/img/logo/logo.png')}}"
                                        alt="Logo"></a>
                            </div>
                            <div class="menu-outer">
                                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                            </div>
                            <div class="social-links">
                                <ul class="clearfix list-wrap">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="menu-backdrop"></div>
                    <!-- End Mobile Menu -->

                </div>
            </div>
        </div>
    </div>

    <!-- header-search -->
    <div class="search-popup-wrap" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="search-wrap text-center">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="search-form">
                            <form action="{{route('site.search')}}" method="post">
                                @csrf
                                <input type="text" name="name" placeholder="{{__('language.enter_your_keyword')}}">
                                <button type="submit" class="search-btn"><i class="flaticon-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="search-backdrop"></div>
    <!-- header-search-end -->

</header>