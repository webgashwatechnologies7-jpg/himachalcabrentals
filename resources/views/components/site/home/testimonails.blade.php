<section class="testimonial pt-10 pb-20"
         style="background: linear-gradient(90deg, rgba(255,85,34,0.6167717086834734) 0%, rgba(23,35,62,1) 100%);">
    <div class="container">
        <div class="testimonial-in">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="section-title">
                        <h4 class="mb-1 theme1">{{$section->title}}</h4>
                        <?php $headLineWords = str_word_count($section->headLine); ?>
                        @if($headLineWords > 2 && $headLineWords%2 == 0)
                            <?php $parts = explode(" ", $section->headLine, 3);?>
                            <h2 class="mb-1 white" style="font-size: 2rem">{{$parts[0]}} {{$parts[1]}}<span
                                    class="theme"> {{$parts[2]}}</span>
                            </h2>
                        @else
                            <?php $parts = explode(" ", $section->headLine, 2);?>
                            <h2 class="mb-1 white" style="font-size: 2rem">{{$parts[0]}} <span
                                    class="theme">{{$parts[1]}}</span></h2>
                        @endif
                        <p class="mb-0 white">{{$section->tagLine}}</p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row about-slider">
                        @foreach($data as $key => $post)
                            <div class="col-sm-4 item">
                                <div class="testimonial-item1">
                                    <div class="details d-flex">
                                        <i class="fa fa-quote-left fs-1 mb-0"></i>
                                        <div class="author-content ms-4">
                                            <p class="mb-4 white fs-5 fw-normal">{{$post->review}}</p>
                                            <div class="author-info d-flex align-items-center">
                                                <img
                                                    src="{{ \TCG\Voyager\Facades\Voyager::image($post->thumbnail('cropped','image')) }}"
                                                    alt="{{$post->name}}" class="lozad">
                                                <div class="author-title ms-3">
                                                    <h5 class="m-0 theme">{{$post->name}}</h5>
                                                    <span class="white">{{$post->location}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dot-overlay"></div>
</section>


