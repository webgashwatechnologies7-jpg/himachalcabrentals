@if($show)
    <div class="destination-area destination-style-two pt-110">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-10 ">
                    <div class="section-head-alpha text-center mx-auto">
                        <h2>{{$section->headLine}}</h2>
                        <p>{{$section->tagLine}}</p>
                    </div>
                </div>
            </div>
            @if($data && count($data) > 0)
                <div class="row d-flex justify-content-start g-4">
                    @foreach($data as $post)
                        <div class="col-lg-4 col-md-6 col-sm-10 fadeffect"
                        >
                            <a href="{{route('site.destination',['slug' => $post->slug])}}">
                                <div class="destination-item">
                                    <div class="destination-img">
                                        <img
                                            data-src="{{ \TCG\Voyager\Facades\Voyager::image($post->thumbnail('cropped','image')) }}"
                                            alt="{{$post->title}}" class="lozad">
                                    </div>
                                    <div class="destination-overlay">
                                        <div class="content">
                                            <a href="{{route('site.destination',['slug' => $post->slug])}}">
                                                <h5>{{$post->title}}</h5></a>
                                            <a href="{{route('site.destination',['slug' => $post->slug])}}">
                                                <h6>{{$post->tour_packages_count}} Tours</h6></a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endif
