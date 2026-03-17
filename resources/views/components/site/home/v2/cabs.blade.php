@push('styles')
    <style>
        .cab-title {
            font-size: 20px !important;
        }
    </style>
@endpush

<div class="package-area package-style-one pt-76">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-head-alpha text-center mx-auto">
                    <h2>{{$section->headLine}}</h2>
                    <p>{{$section->tagLine}}</p>
                </div>
            </div>
        </div>
        <div class="row g-4">
            @foreach($data as $key => $post)
                <div class="col-lg-4 col-md-6">
                    <div class="package-card-alpha">
                        <div class="package-thumb">
                            <a href="javascript:void(0);"><img
                                    src="{{ get_package_image($post->thumbnail('cropped','image')) }}"
                                    alt="{{$post->alt_title}}" height="281"
                                    style="object-fit: cover; object-position: center center"></a>
                            <p class="card-lavel">
                                <i class="bi bi-cash-coin"></i>
                                <span>₹{{$post->rent_per_day}}</span> /Day<sup>*</sup></span>
                            </p>
                        </div>
                        <div class="package-card-body">
                            <h3 class="p-card-title"><a
                                    href="javascript:void(0);">{{$post->title}}</a>
                            </h3>
                            <div class="d-flex justify-content-between px-2 pb-2 pt-4">
                                <div class="d-flex flex-column align-items-center">
                                    <i class='bx bx-food-menu bg-danger text-white p-2 rounded-circle'></i>
                                    <small>{{$post->seats}} + 1 Seats</small>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <i class='bx bx-car bg-danger text-white p-2 rounded-circle'></i>
                                    <small>{{$post->ac_type}}</small>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <i class='bx bx-hotel bg-danger text-white p-2 rounded-circle'></i>
                                    <small>{{$post->fuel_type}}</small>
                                </div>
                            </div>
                            <div class="p-card-bottom">
                                <div class="book-btn" style="width: 100%;">
                                    <a href="javascript:void(0);" style="width: 100%; text-align: center;"
                                       onclick="bookCab({{json_encode(['id' => $post->id, 'title' => $post->title, 'seats' => $post->seats])}})">Book
                                        Now
                                        <i
                                            class="bx bxs-right-arrow-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row text-center">
            <div class="package-bottom-btn">
                <a href="{{url('our-cabs')}}" class="button-fill-primary">View All Cabs</a>
            </div>
        </div>
    </div>
</div>

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
