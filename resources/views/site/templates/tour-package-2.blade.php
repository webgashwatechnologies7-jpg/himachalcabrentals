<x-site-layout>
    @push('styles')
        <style>
            .t-overview p {
                color: #000 !important;
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
                content: "\f138";
                left: 0;
                font-family: "bootstrap-icons";
                font-weight: 900;
                color: #ff4838 !important;
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
                color: #000 !important;
                text-align: justify;
            }

            .t-itinerary ul li::before {
                position: absolute;
                content: "\f138";
                left: 0;
                font-family: "bootstrap-icons";
                font-weight: 900;
                color: #ff4838 !important;
            }

            .tour-package-details .package-plan-tab .plans-accordion .plans-accordion-single .accordion-button .plan-title h5 {
                font-size: 16px;
            }

            .tour-package-details .package-plan-tab .plans-accordion .plans-accordion-single .accordion-button {
                position: relative;
            }

            .tour-package-details .package-plan-tab .plans-accordion .plans-accordion-single .accordion-button .paln-index-circle {
                position: absolute;
                width: 60px;
                height: 60px;
            }

            .tour-package-details .package-plan-tab .plans-accordion .plans-accordion-single .accordion-button .plan-title {
                margin-left: 90px;
            }

            .tour-package-details .package-plan-tab .plans-accordion .plans-accordion-single .accordion-button {
                border-radius: 0;
                padding: 10px;
            }

            @media screen and (max-width: 520px) {
                .t-overview {
                    font-size: 14px !important;
                }

                .plan-title h5 {
                    font-weight: 600 !important;
                }
            }

            .tour-package-details .package-plan-tab .plans-accordion .plans-accordion-single .accordion-button::after {
                display: none !important;
            }
        </style>
    @endpush
    <x-site.breadcrumb :title="$package->title" :middle="true" :subTitle="'Tour Packages'" :subUrl="'tour-packages'"/>
    <div class="package-details-wrapper pt-76">
        <div class="container">
            <div class="row ">
                <div class="col-lg-8">
                    <div class="tour-package-details">
                        <div class="pd-header">
                            <div class=" pd-top row row-cols-lg-4 row-cols-md-2 row-cols-2 gy-4">
                                <div class="col">
                                    <div class="pd-single-info">
                                        <div class="info-icon">
                                            <img src="{{asset('public/images/icons/pd1.svg')}}" alt="time">
                                        </div>
                                        <div class="info">
                                            <h6>Duration</h6>
                                            <span>{{$package->nights}} Nights / {{$package->days}} Days</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pd-thumb">
                                <img src="{{ get_package_image($package->image) }}" alt="image">
                            </div>
                            <div class="header-bottom">
                                <div class="pd-lavel d-flex justify-content-between align-items-center flex-wrap gap-2">
                                    <h5 class="location"><i
                                            class="bi bi-geo-alt"></i> {{$package->getDestinationNamesAttribute()}}</h5>
                                </div>
                                <h2 class="pd-title">{{$package->title}}</h2>
                            </div>
                        </div>
                        <div class="package-details-tabs">

                            <div class="tab-content" id="pills-tabContent">

                                <div class="tab-pane fade show active package-plan-tab tab-body mt-3" id="pill-body2"
                                     role="tabpanel" aria-labelledby="pills-package2">
                                    <h3 class="d-subtitle">Overview</h3>
                                    <div class="t-overview" style="text-align: justify;">
                                        {!! $package->description !!}
                                    </div>
                                    <h3 class="d-subtitle mt-5">Itinerary</h3>
                                    <div class="accordion plans-accordion" id="planAccordion">
                                        {!! format_itinerary($package->itinerary) !!}
                                    </div>
                                    <h3 class="d-subtitle mt-5">Inclusion</h3>
                                    <ul class="mt-3">
                                        @foreach(parse_inclusion_exclusion_list($package->inclusions) as $element)
                                            <li class="d-flex align-items-baseline mb-1 py-1" style="color: #000"><i
                                                    class="bi bi-check-circle me-1"
                                                    style="color: rgba(33,186,113,0.99)"></i> {{$element}}
                                            </li>
                                        @endforeach
                                    </ul>
                                    <h3 class="d-subtitle mt-5">Exclusion</h3>
                                    <ul class="mt-3">
                                        @foreach(parse_inclusion_exclusion_list($package->exclusions) as $element)
                                            <li class="d-flex align-items-baseline mb-1 py-1" style="color: #000"><i
                                                    class="bi bi-x-circle me-1"
                                                    style="color: rgba(206,19,19,0.85)"></i> {{$element}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="package-sidebar">
                        <x-site.tour-booking-form :tour="$package->id"/>
                        @if($relatedTourPackages->isNotEmpty())
                            <aside class="package-widget-style-2 widget-recent-package-entries mt-30">
                                <div class="widget-title text-center">
                                    <h4>Related Package</h4>
                                </div>
                                <div class="widget-body">
                                    <ul>
                                        @foreach($relatedTourPackages as $relPack)
                                            <li class="package-sm">
                                                <div class="thumb">
                                                    <a href="{{route('site.tourPackage',['slug' => $relPack->slug])}}">
                                                        <img
                                                            src="{{ get_package_image($relPack->thumbnail('cropped','image')) }}"
                                                            alt>
                                                    </a>
                                                </div>
                                                <div class="info">
                                                    <h6>
                                                        <a href="{{route('site.tourPackage',['slug' => $relPack->slug])}}">{{$relPack->title}}</a>
                                                    </h6>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </aside>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-site-layout>
