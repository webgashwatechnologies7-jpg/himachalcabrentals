<div class="blog-area blog-style-one pt-110  ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-head-alpha text-center mx-auto">
                    <h2>{{$section->headLine}}</h2>
                    <p>{{$section->tagLine}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($data as $key => $post)
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card-alpha">
                        <div class="blog-thumb">
                            <a href="{{route('site.blogPost',['slug' => $post->slug])}}">
                                <img
                                    src="{{ \TCG\Voyager\Facades\Voyager::image($post->thumbnail('cropped','image')) }}"
                                    alt="{{$post->alt_title}}">
                            </a>
                            <div class="blog-lavel">
                                <a href="javascript:void(0);" rel="nofollow"><i class="bi bi-calendar3"></i> Novembar
                                    16, 2021</a>
                            </div>
                        </div>
                        <div class="blog-content">
                            <h4 class="blog-title"><a
                                    href="{{route('site.blogPost',['slug' => $post->slug])}}">{{$post->title}}</a></h4>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


