<x-site-layout>
    <x-site.breadcrumb :title="$title"/>
    <div class="destination-area destination-style-two pt-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-10 ">
                    <div class="section-head-alpha text-center mx-auto">
                        <h2>{{$page->headLine}}</h2>
                        <p>{{$page->tagLine}}</p>
                    </div>
                </div>
            </div>
            @if($data && count($data) > 0)
                <div class="row d-flex justify-content-start g-4">
                    @foreach($data as $post)
                        <div class="col-lg-4 col-md-6 col-sm-10 fadeffect"
                        >
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
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-site-layout>
