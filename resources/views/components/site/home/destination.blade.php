@if($show)
    <section class="trending pb-3 pt-4 bg-grey">
        <div class="container">
            <div class="section-title mb-6 w-50 mx-auto text-center">
                <h4 class="mb-1 theme1">{{$section->title}}</h4>
                <?php $headLineWords = str_word_count($section->headLine); ?>
                @if($headLineWords > 2 && $headLineWords%2 == 0)
                    <?php $parts = explode(" ", $section->headLine, 3);?>
                    <h2 class="mb-1" style="font-size: 2rem">{{$parts[0]}} {{$parts[1]}}<span class="theme"> {{$parts[2]}}</span></h2>
                @else
                    <?php $parts = explode(" ", $section->headLine, 2);?>
                    <h2 class="mb-1" style="font-size: 2rem">{{$parts[0]}} <span class="theme">{{$parts[1]}}</span></h2>
                @endif
                <p>{{$section->tagLine}}</p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="row">
                        @foreach($data as $key => $post)
                            <div class="col-lg-4 col-md-4 col-sm-6 mb-4">
                                <a href="{{route('site.destination',['slug' => $post->slug])}}">
                                    <div class="trend-item1">
                                        <div class="trend-image position-relative rounded">
                                            <img data-src="{{ \TCG\Voyager\Facades\Voyager::image($post->thumbnail('cropped','image')) }}"
                                                 alt="{{$post->image_alt_title}}"
                                                 style="height: 400px; object-fit: cover" class="lozad">
                                            <div
                                                class="trend-content d-flex align-items-center justify-content-between position-absolute bottom-0 p-4 w-100">
                                                <div class="trend-content-title">
                                                    <h3 class="mb-0 white">{{$post->title}}</h3>
                                                </div>
                                                <span class="white bg-theme p-1 px-2 rounded">{{$post->tour_packages_count}} Tours</span>
                                            </div>
{{--                                            <div class="color-overlay"></div>--}}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif


