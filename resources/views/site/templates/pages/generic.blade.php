<x-site-layout>
    @push('styles')
        <style>
            h2, h3 {
                font-size: 24px !important;
            }

            .des {
                color: #000 !important;
                text-align: justify;
            }

            p {
                color: #000 !important;
                margin-bottom: 16px !important;
            }

            .des ol li {
                color: #000 !important;
            }

            .des {
                color: #000 !important;
                text-align: justify;
            }

            .des ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                margin-left: 20px;
                display: flex;
                flex-direction: column;
                flex-wrap: wrap;
            }

            .des ul li {
                margin-bottom: 10px;
                position: relative;
                padding-left: 20px;
                color: #000;
            }

            .des ul li::before {
                position: absolute;
                content: "\f138";
                left: 0;
                font-family: "bootstrap-icons";
                font-weight: 900;
                color: var(--primary);
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
                                {{$page->title}}
                            </h2>
                            <div class="tab-content about-tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active des">
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


