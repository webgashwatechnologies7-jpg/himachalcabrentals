<div class="blog-sidebar ">
    <aside class="blog-widget widget-recent-entries-custom mt-30">
        <div class="widget-title">
            <h4>Recent Posts</h4>
        </div>
        <ul class="widget-body">
            @foreach($posts as $post)
                <li class="clearfix">
                    <div class="wi"><a href="{{route('site.blogPost',['slug' => $post->slug])}}"><img
                                src="{{ \TCG\Voyager\Facades\Voyager::image($post->image) }}"
                                alt="{{$post->title}}"></a>
                    </div>
                    <div class="wb"><h6><a
                                href="{{route('site.blogPost',['slug' => $post->slug])}}">{{$post->title}}</a>
                        </h6>
                        <div class="wb-info">
                            <span class="post-date"> <i class="bi bi-calendar3"></i> {{$post->created_at->format('d M Y')}}</span>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </aside>
</div>


