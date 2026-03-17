<x-site-layout>
    @push('styles')
        <style>
            .post-body {
                text-align: justify;
            }

            .post-body ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                margin-left: 20px;
                display: flex;
                flex-direction: column;
                flex-wrap: wrap;
            }

            .post-body ul li {
                margin-bottom: 10px;
                position: relative;
                padding-left: 20px;
                color: #000;
            }

            .post-body ul li::before {
                position: absolute;
                content: "\f138";
                left: 0;
                font-family: "bootstrap-icons";
                font-weight: 900;
                color: #ff5522;
            }
        </style>
    @endpush
    <x-site.breadcrumb :title="$post->title" :middle="true" subTitle="Blog" :subUrl="'blog'"/>
    <div class="blog-details-wrapper pt-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details">
                        <div class="post-header">
                            <h2 class="post-title">
                                {{$post->title}}
                            </h2>
                            <div class="post-meta">
                                <a href="javascript:void(0);" class="blog-comments"><i
                                        class="bi bi-calendar3"></i> {{$post->created_at->format('d M Y')}}</a>
                            </div>
                        </div>
                        <div class="post-thumb">
                            <img src="{{ \TCG\Voyager\Facades\Voyager::image($post->image) }}" alt="image">
                        </div>
                        <div class="post-body">
                            {!! $post->body !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <x-site.sidebar :exclude="$post->id"/>
                </div>
            </div>
        </div>
    </div>
</x-site-layout>
