<x-site-layout>
    @push('styles')
        <style>
            .inner p {
                color: #000;
            }

            .inner ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                margin-left: 20px;
                display: flex;
                flex-direction: column;
                flex-wrap: wrap;
            }

            .inner ul li {
                margin-bottom: 10px;
                position: relative;
                padding-left: 20px;
                color: #000;
            }

            .inner ul li::before {
                position: absolute;
                content: "\f061"; /* Font Awesome check icon Unicode value */
                left: 0;
                font-family: "FontAwesome"; /* Font Awesome font family */
                font-weight: 900; /* Font Awesome icon weight */
                color: #ff5522;
            }
        </style>
    @endpush
    <x-site.breadcrumb :title="$title"/>
    <section class="faq-main pb-6 pt-6">
        <div class="container">
            <div class="section-title mb-6 text-center w-75 mx-auto">
                <h2 class="mb-1" style="font-size: 20px;">Frequent Asked <span class="theme">Questions</span></h2>
            </div>
            <div class="faq-accordian">
                <div class="row">
                    <div class="col-lg-8 col-md-12 mb-4">
                        @if($data->isNotEmpty())
                            <div class="accrodion-grp faq-accrodion faq-accrodion1" data-grp-name="faq-accrodion1">
                                @foreach($data as $key => $post)
                                    <div class="accrodion @if($key == 0) active @endif">
                                        <div class="accrodion-title">
                                            <h5 style="font-size: 16px;">{{$post->question}}</h5>
                                        </div>
                                        <div class="accrodion-content" style="display: block;">
                                            <div class="inner" style="color: #000;">
                                                {!! $post->answer !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center">Coming soon...!!!</div>
                        @endif
                    </div>
                    <div class="col-lg-4 col-md-12 mb-4">
                        <x-site.page-sidebar/>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
        <script defer src="{{asset('public/js/custom-accordian.js')}}"></script>
    @endpush
</x-site-layout>
