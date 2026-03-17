@push('styles')
    <style>
        .pack-title {
            font-size: 20px !important;
        }
        .slick-dots{
            bottom: -15px;
        }
        .slick-dots li.slick-active button:before{
            border: #ff5522;
            background: #ff5522;
        }
    </style>
@endpush
<section class="trending bg-white pt-10 pb-6">
    <div class="container">
        <div class="row align-items-center justify-content-between mb-6 ">
            <div class="col-lg-7">
                <div class="section-title text-center text-lg-start">
                    <h4 class="mb-1 theme1">{{$section->title}}</h4>
                    <?php $headLineWords = str_word_count($section->headLine); ?>
                    @if($headLineWords > 2 && $headLineWords%2 == 0)
                        <?php $parts = explode(" ", $section->headLine, 3);?>
                        <h1 class="mb-1" style="font-size: 2rem">{{$parts[0]}} {{$parts[1]}}<span
                                class="theme"> {{$parts[2]}}</span></h1>
                    @else
                        <?php $parts = explode(" ", $section->headLine, 2);?>
                        <h1 class="mb-1" style="font-size: 2rem">{{$parts[0]}} <span class="theme">{{$parts[1]}}</span>
                        </h1>
                    @endif
                    <p>{{$section->tagLine}}</p>
                </div>
            </div>
            <div class="col-lg-5">
            </div>
        </div>
        <div class="trend-box">
            <div class="row item-slider">
                @foreach($data as $key => $post)
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                        <div class="trend-item rounded box-shadow bg-white">
                            <div class="trend-image position-relative">
                                <a href="{{route('site.tourPackage',['slug' => $post->slug])}}"><img
                                        src="{{ get_package_image($post->thumbnail('cropped','image')) }}" class="lozad"
                                        alt="{{$post->alt_title}}"></a>
                                {{--                                <div class="color-overlay"></div>--}}
                            </div>
                            <div class="trend-content p-4 pt-5 position-relative">
                                <div class="trend-meta bg-theme white px-3 py-2 rounded">
                                    <div class="entry-author">
                                        <i class="icon-calendar"></i>
                                        <span class="fw-bold"> {{$post->nights}} Nights / {{$post->days}} Days</span>
                                    </div>
                                </div>
                                <h3 class="mb-1 pack-title"><a
                                        href="{{route('site.tourPackage',['slug' => $post->slug])}}">{{$post->title}}</a>
                                </h3>
                                <hr/>
                                <p class=" border-b pb-2 mb-2">{{\Illuminate\Support\Str::limit(strip_tags($post->description),60,'...')}}</p>

                                <div class="entry-meta">
                                    <div class="entry-author d-flex align-items-center justify-content-between">
                                        @if($post->base_price > 0)
                                            <p class="mb-0">
                                                <span class="theme fw-bold fs-5">₹
                                                    @if($post->discount > 0)
                                                        <s class="me-1"> {{$post->base_price}} </s>
                                                        {{$post->base_price - ($post->base_price * ($post->discount/100))}}
                                                    @else
                                                        {{$post->base_price}}
                                                    @endif
                                                </span>
                                                | {{$post->price_type}}
                                            </p>
                                        @endif
                                        <a class="nir-btn" href="{{route('site.tourPackage',['slug' => $post->slug])}}">View
                                            Details</a>
                                        <button type="button" class="nir-btn-black"
                                                onclick="packageEnquiry('{{$post->id}}','{{$post->title}} ({{$post->nights}}N/{{$post->days}}D)')">Enquire Now
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
