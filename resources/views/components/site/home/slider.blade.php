<section class="banner overflow-hidden">
    <div class="slider top50">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                {{--                @foreach($sliders as $slider)--}}
                <div class="swiper-slide">
                    <div class="slide-inner">
                        <div class="slide-image lozad"
                             style="background-image:url({{ \TCG\Voyager\Facades\Voyager::image($slider->thumbnail('cropped','image')) }})"></div>
                        <div class="swiper-content">
                            <div class="entry-meta mb-2">
                                <h5 class="entry-category mb-0 white">{{$slider->title}}</h5>
                            </div>
                            <h1 class="mb-2"><a href="{{url('/'.$slider->buttonLink)}}"
                                                class="white">{{$slider->headLine}}</a>
                            </h1>
                            <p class="white mb-4">{{$slider->tagLine}}</p>
                            @if(!empty($slider->buttonText))
                                <a href="{{url('/'.$slider->buttonLink)}}"
                                   class="nir-btn">{{$slider->buttonText}}</a>
                            @endif
                        </div>
                        {{--                            <div class="dot-overlay"></div>--}}
                    </div>
                </div>
                {{--                @endforeach--}}
            </div>
        </div>
    </div>

    {{--    <div class="swiper-button-next"></div>--}}
    {{--    <div class="swiper-button-prev"></div>--}}
</section>
