<div class="footer-area mt-110">
    <div class="footer-main-wrapper">
        <div class="footer-vactor">
            <img src="{{asset('images/banner/footer-bg.png')}}" alt>
        </div>
        <div class="container">
            <div class="row justify-content-center g-4 pb-5">
                <div class="col-lg-3 col-md-4">
                    <div class="footer-widget">
                        <h4 class="footer-widget-title">About Us</h4>
                        <div class="footer-widget">
                            <p class="text-start">{{setting('site.description')}}</p>
                            <a class="btn btn-danger mt-3 w-75">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="footer-widget">
                        <h4 class="footer-widget-title">Quick Link</h4>
                        <ul class="footer-links">
                            <li><a href="{{url('/about-us')}}">About Us</a></li>
                            <li><a href="{{url('/contact-us')}}">Contact Us</a></li>
                            <li><a href="{{url('/privacy-policy')}}">Privacy Policy</a></li>
                            <li><a href="{{url('/cancellation-policy')}}">Cancellation Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="footer-widget">
                        <h4 class="footer-widget-title">Featured Tours</h4>
                        <ul class="footer-links">
                            {!! get_tour_category_list(true) !!}
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="footer-widget">
                        <h4 class="footer-widget-title">Contact Us</h4>
                        <ul class="footer-links">
                            <li><i class="bi bi-telephone-x"></i> <a href="tel:{{setting('contact.contact_phone')}}">+91-{{setting('contact.contact_phone')}}</a>
                            </li>
                            <li><i class="bi bi-envelope-open"></i> <a
                                    href="#"><span>{{setting('contact.contact_email')}}</span></a>
                            </li>
                            <li class="d-flex"><i class="bi bi-geo-alt"></i> <a
                                    href="#">{{setting('contact.contact_address')}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-4 col-md-6 order-lg-1 order-3 ">
                    <div class="copyright-link text-lg-start text-center">
                        <p>Copyright 2023 {{setting('site.title')}}</p>
                    </div>
                </div>
                <div class="col-lg-4  order-lg-2 order-1">
                    <div class="footer-logo text-center">
                        <a href="{{route('site.home')}}"><img
                                src="{{ \TCG\Voyager\Facades\Voyager::image(setting('site.logo_alt')) }}" alt="logo"></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 order-lg-3 order-2">
                    <div class="policy-links">
                        <ul class="policy-list justify-content-lg-end justify-content-center">
                            <li><a href="{{url('/cancellation-policy')}}">Terms & Condition</a></li>
                            <li><a href="{{url('/privacy-policy')}}">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


