<x-site-layout>
    @push('styles')
        <style>
            h4 {
                font-size: 20px;
            }

            .t-overview ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                margin-left: 20px;
                display: flex;
                flex-direction: column;
                flex-wrap: wrap;
            }

            .t-overview ul li {
                margin-bottom: 10px;
                position: relative;
                padding-left: 20px;
                color: #000;
            }

            .t-overview ul li::before {
                position: absolute;
                content: var(--list-icon); /* Font Awesome check icon Unicode value */
                left: 0;
                font-family: "FontAwesome"; /* Font Awesome font family */
                font-weight: 900; /* Font Awesome icon weight */
                color: var(--primary);
            }

            .t-itinerary ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                margin-left: 20px;
                display: flex;
                flex-direction: column;
                flex-wrap: wrap;
            }

            .t-itinerary ul li {
                margin-bottom: 10px;
                position: relative;
                padding-left: 20px;
                color: #000;
            }

            .t-itinerary ul li::before {
                position: absolute;
                content: var(--list-icon); /* Font Awesome check icon Unicode value */
                left: 0;
                font-family: "FontAwesome"; /* Font Awesome font family */
                font-weight: 900; /* Font Awesome icon weight */
                color: var(--primary);
            }

            .t-itinerary p strong.highlight-day {
                display: flex;
                align-items: flex-start;
            }

            .t-itinerary p strong.highlight-day::before {
                content: var(--list-strong-icon);
                font-family: "FontAwesome";
                font-size: 30px;
                color: var(--primary);
                margin-right: 10px;
                margin-top: -10px;
            }

            .t-places-covered {
                display: flex;
                flex-wrap: wrap;
                gap: 4px;
            }

            .t-places-covered b {
                border: 1px solid rgba(255, 85, 34, 0.52);
                padding: 3px;
                font-weight: 500;
                border-radius: 5px;
            }

            .t-places-covered i {
                font-size: 12px;
                color: #ff5522;
            }

            .t-places-covered b:not(:last-child)::after {
                content: "\f061";
                font-family: "FontAwesome";
                margin-left: 2px;
                font-size: 12px;
            }
        </style>
    @endpush
    <x-site.breadcrumb :title="$package->title" :middle="true" :subTitle="'Tour Packages'" :subUrl="'tour-packages'"/>
    <section class="trending pt-6 pb-0 bg-lgrey" style="color: black">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-content">
                        <div class="single-full-title border-b mb-2 pb-2">
                            <div class="single-title">
                                <h2 class="mb-1" style="font-size: 20px">{{$package->title}}</h2>
                                {{--                                <div class="rating-main d-lg-flex align-items-center text-start">--}}
                                {{--                                    <p class="mb-0 me-2"><i--}}
                                {{--                                            class="icon-location-pin"></i> {{$package->getDestinationNamesAttribute()}}--}}
                                {{--                                    </p>--}}
                                {{--                                </div>--}}
                                <div class="mt-1 d-flex flex-wrap">
                                    <p><i
                                            class="fa fa-moon-o fa-fw"></i> {{$package->nights}}
                                        Nights / <i
                                            class="fa fa-sun-o fa-fw"></i> {{$package->days}} Days</p>
                                </div>
                            </div>
                        </div>
                        @if(!empty($package->gallery) && !is_null($package->gallery))
                            @php $images = json_decode($package->gallery) @endphp
                            <div class="description-images mb-4 overflow-hidden">
                                <div class="thumbnail-images position-relative">
                                    <div class="slider-store rounded overflow-hidden">
                                        @foreach($images as $image)
                                            <div>
                                                <img src="{{ Voyager::image($image) }}">
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="slider-thumbs">
                                        @foreach($images as $image)
                                            <div>
                                                <img src="{{ Voyager::image($image) }}">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="description-images mb-4">
                                <img src="{{ get_package_image($package->image) }}" alt="" class="w-100 rounded">
                            </div>
                        @endif
                        {{--                        @if(!empty($package->places_covered))--}}
                        {{--                            <div class="description mb-2">--}}
                        {{--                                <h4>Places Covered</h4>--}}
                        {{--                                <div class="t-places-covered">--}}
                        {{--                                    {!! get_places_covered($package->places_covered) !!}--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        @endif--}}

                        <div class="description mb-2">
                            <h4>Overview</h4>
                            <div class="t-overview" style="text-align: justify;">
                                {!! $package->description !!}
                            </div>
                        </div>
                        <hr/>
                        <div class="description mb-2">
                            <h4>Itinerary</h4>
                            <div class="t-itinerary" style="text-align: justify;">
                                {!! $package->itinerary !!}
                            </div>
                        </div>
                        <hr class="my-3">
                        <div class="description mb-2">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 mb-1">
                                    <div class="desc-box bg-white">
                                        <h5 class="mb-2">Inclusion</h5>
                                        <ul>
                                            @foreach(parse_inclusion_exclusion_list($package->inclusions) as $element)
                                                <li class="d-flex align-items-baseline mb-1" style="color: #000"><i
                                                        class="fa fa-check-circle me-1"
                                                        style="color: rgba(33,186,113,0.99)"></i> {{$element}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <hr class="my-2">
                                <div class="col-lg-12 col-md-12 mb-2">
                                    <div class="desc-box bg-white">
                                        <h5 class="mb-2">Exclusion</h5>
                                        <ul>
                                            @foreach(parse_inclusion_exclusion_list($package->exclusions) as $element)
                                                <li class="d-flex align-items-baseline mb-1" style="color: #000"><i
                                                        class="fa fa-times-circle me-1"
                                                        style="color: rgba(206,19,19,0.85)"></i> {{$element}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 ps-lg-4">
                    <div class="sidebar-sticky">
                        <div class="list-sidebar">
                            <div class="sidebar-item">
                                <x-site.tour-booking-form :tour="$package->id"/>
                            </div>
                            @if($relatedTourPackages->isNotEmpty())
                                <div class="sidebar-item">
                                    <h3>Related Tours</h3>
                                    <div class="sidebar-destination">
                                        <div class="row">
                                            @foreach($relatedTourPackages as $relPack)
                                                <div class="col-12 mb-4">
                                                    <div class="trend-item1">
                                                        <div class="trend-image position-relative rounded">
                                                            <img
                                                                src="{{ get_package_image($relPack->thumbnail('cropped','image')) }}"
                                                                class="lozad">
                                                            <div
                                                                class="trend-content d-flex align-items-center justify-content-between position-absolute bottom-0 p-0 w-100 z-index">
                                                                <div class="trend-content-title p-3" style="background: rgba(0,0,0,0.6); font-size: 18px;">
                                                                    <h5 class="mb-1 text-white">{{$relPack->days}}
                                                                        Days / {{$relPack->nights}} Nights</h5>
                                                                    <h4 class="mb-0"><a
                                                                            href="{{route('site.tourPackage',['slug' => $relPack->slug])}}"
                                                                            class="text-white">{{$relPack->title}}</a>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                            <div class="color-overlay"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const divElement = document.querySelector(".t-itinerary");

                // Get all the <p> tags inside the <div>
                const pTags = divElement.getElementsByTagName("p");

                // Loop through each <p> tag
                for (let i = 0; i < pTags.length; i++) {
                    const strongTag = pTags[i].querySelector("strong");
                    if (strongTag && strongTag.textContent.includes("Day")) {
                        //strongTag.classList.add("highlight-day");
                    }
                }
            });
        </script>
    @endpush
</x-site-layout>


