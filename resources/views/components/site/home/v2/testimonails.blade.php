<div class="testimonial-area testimonial-style-one mt-120">
    <div class="testimonial-shape-group"></div>
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="section-head-alpha">
                    <h2>{{$section->headLine}}</h2>
                    <p>{{$section->tagLine}}</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="slider-arrows text-center d-lg-flex d-none justify-content-end mb-3">
                    <div class="testi-prev custom-swiper-prev" tabindex="0" role="button" aria-label="Previous slide"><i
                            class="bi bi-chevron-left"></i></div>
                    <div class="testi-next custom-swiper-next" tabindex="0" role="button" aria-label="Next slide"><i
                            class="bi bi-chevron-right"></i></div>
                </div>
            </div>
        </div>
        <div class="swiper testimonial-slider-one position-relative">
            <div class="swiper-wrapper">
                @foreach($data as $key => $post)
                    <div class="swiper-slide">
                        <div class="testimonial-card testimonial-card-alpha">
                            <div class="testimonial-overlay-img">
                                <img
                                    src="{{ \TCG\Voyager\Facades\Voyager::image($post->thumbnail('cropped','image')) }}"
                                    alt>
                            </div>
                            <div class="testimonial-card-top">
                                <div class="qoute-icon"><i class="bx bxs-quote-left"></i></div>
                                <div class="testimonial-thumb"><img
                                        src="{{ \TCG\Voyager\Facades\Voyager::image($post->thumbnail('cropped','image')) }}"
                                        alt="{{$post->name}}"></div>
                                <h3 class="testimonial-count">{{'0'.$key + 1}}</h3>
                            </div>
                            <div class="testimonial-body">
                                <p>{{\Illuminate\Support\Str::limit(strip_tags($post->review),200,'...')}}</p>
                                <div class="testimonial-bottom">
                                    <div class="reviewer-info">
                                        <h4 class="reviewer-name">{{$post->name}}</h4>
                                        <h6>{{$post->location}}</h6>
                                    </div>
                                    <ul class="testimonial-rating">
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


