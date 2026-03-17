@push('styles')
    <style>
        .breadcrumb-item+.breadcrumb-item::before{
            font-family: bootstrap-icons !important;
            color: #ff4838;
            float: none;
            font-size: 12px;
        }
        @media screen and (max-width: 520px) {
            .breadcrumb-title{
                font-size: 24px !important;
                margin-bottom: 10px;
            }
            .breadcrumb-style-one{
                padding: 50px 0;
            }
        }
    </style>
@endpush
<div class="breadcrumb breadcrumb-style-one">
    <div class="container">
        <div class="col-lg-12 text-center">
            <h2 class="breadcrumb-title">{{$title}}</h2>
            <ul class="d-flex justify-content-center breadcrumb-items flex-wrap">
                <li class="breadcrumb-item"><a href="{{route('site.home')}}">Home</a></li>
                @if($middle)
                    <li class="breadcrumb-item"><a href="{{url($subUrl)}}">{{$subTitle}}</a></li>
                @endif
                <li class="breadcrumb-item active">{{$title}}</li>
            </ul>
        </div>
    </div>
</div>


