<x-site-layout>
    @push('styles')
        <style>
            .cus-btn {
                font-weight: 600;
                padding: 7px 12px;
                font-size: 15px
            }

            @media (max-width: 1199px) {
                .cus-btn {
                    padding: 6px 12px;
                    font-size: 14px
                }
            }

            @media only screen and (min-width: 993px) and (max-width: 1399px) {

                .cus-btn {
                    padding: 6px 8px;
                    font-size: 12px !important;
                }

                .book-btn {
                    padding: 6px 8px !important;

                }

                .book-btn a {
                    font-size: 12px !important;
                }
            }

            @media only screen and (min-width: 993px) and (max-width: 1199px) {
                .bxs-right-arrow-alt {
                    display: none;
                }
            }

            .package-card-alpha .package-thumb .card-lavel{
                clip-path: none !important;
                padding: 10px;
            }
        </style>
    @endpush
    <x-site.breadcrumb :title="$title"/>
    <div class="package-area package-style-one pt-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-head-alpha text-center mx-auto">
                        <h2>{{$page->headLine}}</h2>
                        <p>{{$page->tagLine}}</p>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                @foreach($data as $key => $post)
                    <div class="col-lg-4 col-md-6">
                        <div class="package-card-alpha">
                            <div class="package-thumb">
                                <a href="{{route('site.tourCategory',['slug' => $post->slug])}}"><img
                                        src="{{ get_package_image($post->thumbnail('cropped','image')) }}"
                                        alt="{{$post->alt_title}}"></a>
                                <p class="card-lavel">
                                    <i class="bi bi-pin-map-fill"></i>
                                    <span>{{$post->tour_packages_count}} Tours</span>
                                </p>
                            </div>
                            <div class="package-card-body">
                                <h3 class="p-card-title"><a
                                        href="{{route('site.tourCategory',['slug' => $post->slug])}}">{{$post->title}}</a>
                                </h3>
{{--                                <div class="d-flex justify-content-between px-2 pb-2 pt-4">--}}
{{--                                    <div class="d-flex flex-column align-items-center">--}}
{{--                                        <i class='bx bx-food-menu bg-danger text-white p-2 rounded-circle'></i>--}}
{{--                                        <small>Food</small>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex flex-column align-items-center">--}}
{{--                                        <i class='bx bx-car bg-danger text-white p-2 rounded-circle'></i>--}}
{{--                                        <small>Cabs</small>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex flex-column align-items-center">--}}
{{--                                        <i class='bx bx-hotel bg-danger text-white p-2 rounded-circle'></i>--}}
{{--                                        <small>Hotel</small>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex flex-column align-items-center">--}}
{{--                                        <i class='bx bx-images bg-danger text-white p-2 rounded-circle'></i>--}}
{{--                                        <small>More</small>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="p-card-bottom">--}}
{{--                                    <div class="book-btn">--}}
{{--                                        <a href="javascript:void(0);"--}}
{{--                                           onclick="packageEnquiry('{{$post->id}}','{{$post->title}} ({{$post->nights}}N/{{$post->days}}D)')">Enquire--}}
{{--                                            Now <i class="bx bxs-right-arrow-alt"></i></a>--}}
{{--                                    </div>--}}
{{--                                    <div class="border border-dark cus-btn rounded">--}}
{{--                                        <a href="{{route('site.tourPackage',['slug' => $post->slug])}}"--}}
{{--                                           class="text-dark text-uppercase">View--}}
{{--                                            Details <i--}}
{{--                                                class="bx bxs-right-arrow-alt"></i></a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-site-layout>


