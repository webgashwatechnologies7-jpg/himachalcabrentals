@push('styles')
    <style>
        @keyframes vibrate {
            0% {
                transform: translateX(0);
            }
            25% {
                transform: translateX(-5px) rotate(-1deg);
            }
            50% {
                transform: translateX(5px) rotate(1deg);
            }
            75% {
                transform: translateX(-5px) rotate(-1deg);
            }
            100% {
                transform: translateX(0);
            }
        }

        .vibrate-button {
            animation: vibrate 1s infinite;
        }

        .vibrate-button:hover {
            animation: none;
        }
    </style>
@endpush
<div class="hero-area hero-style-one overflow-hidden">
    <div class="container-fluid p-0">
        <div class="swiper hero-slider-one">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="hero-single-slide">
                        <div class="hero-highlighted-bg">
                            <img src="{{ \TCG\Voyager\Facades\Voyager::image($slider->thumbnail('cropped','image')) }}"
                                 alt>
                        </div>
                        <div class="hero-content-bg">
                            <div class="hero-content position-relative">
                                <h2 class="hero-title">{{$slider->headLine}}</h2>
                                <p>{{$slider->tagLine}}</p>
                                <div class="hero-btns">
                                    <a href="{{url('plan-your-trip')}}" class="button-fill-primary vibrate-button">Plan
                                        Your Trip</a>
                                    <a href="{{url('tour-packages')}}" class="button-outlined-primary">View Packages</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
