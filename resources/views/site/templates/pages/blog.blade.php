<x-site-layout>
    @push('styles')
        <style>
        </style>
    @endpush
    <x-site.breadcrumb :title="$title"/>
        <div class="blog-wrapper pt-80">
            <div class="container">
                <div class="row">
                    @foreach($data as $post)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-card-gamma">
                            <div class="blog-thumb">
                                <a href="{{route('site.blogPost',['slug' => $post->slug])}}">
                                    <img src="{{ \TCG\Voyager\Facades\Voyager::image($post->image) }}" alt="{{$title}}">
                                </a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-body-top">
                                    <a href="{{route('site.blogPost',['slug' => $post->slug])}}" class="blog-comments"><i class="bi bi-calendar3"></i> {{$post->created_at->format('d M Y')}}</a>
                                </div>
                                <h4 class="blog-title"><a href="{{route('site.blogPost',['slug' => $post->slug])}}">{{$post->title}}</a></h4>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
</x-site-layout>
