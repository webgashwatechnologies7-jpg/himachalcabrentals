@push('styles')
    <style>
        .cab-title {
            font-size: 20px !important;
        }
    </style>
@endpush
<section class="trending pt-6 bg-lgrey">
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
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    @foreach($data as $post)
                        <div class="col-lg-4 col-md-4 mb-4">
                            <div class="trend-item rounded box-shadow">
                                <div class="trend-image position-relative">
                                    <img src="{{ get_cab_image($post->thumbnail('cropped','image')) }}"
                                         alt="{{$post->image_alt_title}}"
                                         style="height: 306px; object-fit: cover" class="lozad">
                                    {{--                                    <div class="color-overlay"></div>--}}
                                </div>
                                <div class="trend-content1 position-relative p-4 bg-white">
                                    <h3 class="mb-2 border-b pb-2 cab-title"><a href="{{url('/taxi-booking')}}"
                                                                      class>{{$post->title}}</a></h3>
                                    <ul class="featured-meta border-b pb-2 mb-2 d-flex align-items-center justify-content-between">
                                        <li><i class="fa fa-user"></i> {{$post->seats}} + 1 Seats</li>
                                        <li><i class="fa fa-check-circle"></i> {{$post->ac_type}}</li>
                                        <li><i class="fa fa-dashboard"></i> {{$post->fuel_type}}</li>
                                    </ul>
                                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                                        <p class="mb-0">@<span
                                                class="theme fw-bold fs-5"> ₹{{$post->rent_per_day}}</span>
                                            /Day<sup>*</sup>
                                        </p>
                                        <button class="nir-btn"
                                                onclick="bookCab({{json_encode(['id' => $post->id, 'title' => $post->title, 'seats' => $post->seats])}})">
                                            Book
                                            Now
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="d-flex justify-content-center mt-4">
                        <a class="nir-btn-black" href="{{url('/our-cabs')}}"><i class="fa fa-taxi fa-fw"></i> View All
                            Cabs <i
                                class="fa fa-long-arrow-right fa-fw"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@push('scripts')
    <script>
        function bookCab(cab) {
            if (localStorage.getItem("BOOK_CAB") != null) {
                localStorage.removeItem("BOOK_CAB");
            }
            localStorage.setItem("BOOK_CAB", JSON.stringify(cab));
            window.location.href = '{{url('/taxi-booking')}}'
        }
    </script>
@endpush
