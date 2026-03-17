<section class="about-us pb-6 pt-17">
    <div class="container">
        <div class="section-title mb-6 w-50 mx-auto text-center">
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

        <div class="why-us">
            <div class="why-us-box">
                <div class="row">
                    @foreach($data as $key => $post)
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                            <div class="why-us-item p-3 pt-6 pb-6 border rounded bg-white" style="height: 400px">
                                <div class="why-us-content">
                                    <div class="why-us-icon mb-1 text-center">
                                        <i class="{{$post->icon}} theme"></i>
                                    </div>
                                    <h4 class="text-center">
                                        <a @if(!empty($post->link)) href="{{url($post->link)}}"
                                           @else href="javascript:void(0);" @endif
                                           rel="nofollow">{{$post->title}}</a>
                                    </h4>
                                    <p class="mb-2" style="text-align: center">{{$post->tagLine}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
    <div class="white-overlay"></div>
</section>
