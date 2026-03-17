<x-site-layout>
    <x-site.breadcrumb :title="$title"/>
    <section class="about-us pt-6"
             style="background-image:url({{asset('images/background_pattern.png')}}); background-position:bottom right;">
        <div class="container">
            <div class="about-image-box">
                <div class="row d-flex align-items-center justify-content-between">
                    <div class="col-lg-6 ps-4">
                        <div class="about-content text-center text-lg-start">
                            <h4 class="theme d-inline-block mb-0">{{$page->headLine}}</h4>
                            <h2 class="border-b mb-2 pb-1">{{$page->tagLine}}</h2>
                            <div class="border-b mb-2 pb-2"
                                 style="color: #000; text-align: justify">{!! $page->body !!}</div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4 pe-4">
                        <div class="about-image" style="animation:none; background:transparent;">
                            <img src="{{ \TCG\Voyager\Facades\Voyager::image($page->image) }}" alt>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="white-overlay"></div>
    </section>
{{--    <x-site.home.feature/>--}}
</x-site-layout>


