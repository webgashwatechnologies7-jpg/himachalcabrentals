<div class="achievement-counter-side">
    <div class="row">
        @foreach($data as $key => $post)
            <div class="col-12 mb-2">
                <div class="achievement-box-style-one">
                    <div class="achievement-box-content text-start text-white">
                        <h4 style="font-weight: 700">{{$post->title}}</h4>
                        <p>{{$post->tagLine}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


