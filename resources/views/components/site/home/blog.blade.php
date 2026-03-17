@if($show)
    @push('styles')
        <style>
            .blog-title {
                font-size: 20px !important;
            }
        </style>
    @endpush
    <section class="trending recent-articles pb-6 pt-5 bg-grey">
        <div class="container">
            <div class="section-title mb-6 w-75 mx-auto text-center">
                <h4 class="mb-1 theme1">{{$section->title}}</h4>
                <?php $headLineWords = str_word_count($section->headLine); ?>
                @if($headLineWords > 2 && $headLineWords%2 == 0)
                    <?php $parts = explode(" ", $section->headLine, 3);?>
                    <h2 class="mb-1" style="font-size: 2rem">{{$parts[0]}} {{$parts[1]}}<span
                            class="theme"> {{$parts[2]}}</span></h2>
                @else
                    <?php $parts = explode(" ", $section->headLine, 2);?>
                    <h2 class="mb-1" style="font-size: 2rem">{{$parts[0]}} <span class="theme">{{$parts[1]}}</span></h2>
                @endif
                <p>{{$section->tagLine}}</p>
            </div>
            <div class="recent-articles-inner">
                <div class="row">
                    @foreach($data as $key => $post)
                        <div class="col-lg-4 @if($key != 0) col-md-6 @endif">
                            <div class="trend-item box-shadow bg-white mb-4 rounded">
                                <div class="trend-image">
                                    <img
                                        src="{{ \TCG\Voyager\Facades\Voyager::image($post->thumbnail('cropped','image')) }}"
                                        alt="{{$post->alt_title}}"
                                        class="lozad">
                                </div>
                                <div class="trend-content-main p-4">
                                    <div class="trend-content">
                                        <h5 class="theme mb-1">{{$post->category ? $post->category->name : ""}}</h5>
                                        <h4 class="mb-0 blog-title"><a
                                                href="{{route('site.blogPost',['slug' => $post->slug])}}">{{$post->title}}</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif


