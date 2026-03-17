<x-site-layout>
    @push('styles')
        <style>
            .about-main-wrappper {
                text-align: justify;
            }

            .about-main-wrappper .about-tab-wrap .about-tab-content .tab-pane p {
                color: #000 !important;
            }
        </style>
    @endpush
    <x-site.breadcrumb :title="$title"/>
    <div class="about-main-wrappper pt-5">
        <div class="container">
            <div class="about-tab-wrapper">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-12 mt-5 mt-lg-0">
                        <div class="about-tab-wrap">
                            <h2 class="about-wrap-title">
                                {{$page->headLine}}
                            </h2>
                            <div class="tab-content about-tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active">
                                    {!! $page->body !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-site-layout>


