<div class="topbar-area topbar-style-one">
    <div class="container">
        <div class="row p-2">
            <div class="col-sm-12 col-md-8 align-items-center d-sm-flex d-none justify-content-start">
                <div class="topbar-contact-left">
                    <ul class="contact-list">
                        <li><i class="bi bi-telephone-fill"></i> <a
                                href="tel:{{setting('contact.contact_phone')}}">+91-{{setting('contact.contact_phone')}}</a>
                        </li>
                        <li><i class="bi bi-envelope-fill"></i> <a
                                href="#"><span>{{setting('contact.contact_email')}}</span></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-4 d-flex align-items-center d-md-flex d-none justify-content-end">
                <ul class="topbar-social-links">
                    @if(setting('social-media.facebook') && setting('social-media.facebook') != '')
                        <li><a href="#"><i class="bx bxl-facebook"></i></a></li>
                    @endif
                    @if(setting('social-media.instagram') && setting('social-media.instagram') != '')
                        <li><a href="#"><i class="bx bxl-instagram-alt"></i></a></li>
                    @endif
                    @if(setting('social-media.whatsapp') && setting('social-media.whatsapp') != '')
                        <li><a href="#"><i class="bx bxl-whatsapp-square"></i></a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>

<header>
    <div class="header-area header-style-one">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-12 col-md-12 col-sm-12 col-xs-12 align-items-center d-xl-flex d-lg-block">
                    <div class="nav-logo d-flex justify-content-between align-items-center">
                        <a href="{{route('site.home')}}">
                            @if(setting('site.logo') == '')
                                <b>Logo</b>
                            @else
                                <img src="{{ \TCG\Voyager\Facades\Voyager::image(setting('site.logo')) }}" alt="logo">
                            @endif
                        </a>
                        <div class="d-flex align-items-center gap-4">
                            <div class="mobile-menu d-flex ">
                                <a href="javascript:void(0)" class="hamburger d-block d-xl-none">
                                    <span class="h-top"></span>
                                    <span class="h-middle"></span>
                                    <span class="h-bottom"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-6 col-xs-6">
                    <nav class="main-nav float-end">
                        <div class="inner-logo d-xl-none text-center">
                            <a href="{{route('site.home')}}"><img
                                    src="{{ \TCG\Voyager\Facades\Voyager::image(setting('site.logo')) }}" alt></a>
                        </div>
                        <ul>
                            <li><a href="{{route('site.home')}}">Home</a></li>
                            <li><a href="{{url('/about-us')}}">About Us</a></li>
                            <li class="has-child-menu">
                                <a href="{{url('/destinations')}}">Destinations</a>
                                <i class="fl flaticon-plus">+</i>
                                <ul class="sub-menu">
                                    {!! get_destination_nav_items() !!}
                                </ul>
                            </li>
                            <li class="has-child-menu">
                                <a href="{{url('/tour-packages')}}">Tour Packages</a>
                                <i class="fl flaticon-plus">+</i>
                                <ul class="sub-menu">
                                    {!! get_tour_category_list() !!}
                                </ul>
                            </li>
                            <li><a href="{{url('/our-cabs')}}">Our Cabs</a></li>
                            <li><a href="{{url('/blog')}}">Blog</a></li>
                        </ul>
                        <div class="inner-contact-options d-xl-none">
                            <div class="contact-box-inner"><i class="bi bi-telephone-fill"></i> <a
                                    href="tel:{{setting('contact.contact_phone')}}">+91-{{setting('contact.contact_phone')}}</a>
                            </div>
                            <div class="contact-box-inner"><i class="bi bi-envelope-fill"></i> <a
                                    href="mailto:{{setting('contact.contact_email')}}"><span>{{setting('contact.contact_email')}}</span></a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>


