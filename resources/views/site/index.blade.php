<x-site-layout>
    <x-site.home.slider/>
    <x-site.home.query-form/>
    @foreach($sections as $section)
        @if($section->model == MODEL_TOUR_PACKAGE)
            <x-site.home.packages :section="$section"/>
        @elseif($section->model == MODEL_DESTINATION)
            <x-site.home.destination :section="$section"/>
{{--        @elseif($section->model == MODEL_FEATURE)--}}
{{--            <x-site.home.feature :section="$section"/>--}}
        @elseif($section->model == MODEL_TESTIMONAIL)
            <x-site.home.testimonails :section="$section"/>
        @elseif($section->model == MODEL_CAB)
            <x-site.home.cabs :section="$section"/>
        @elseif($section->model == MODEL_POST)
            <x-site.home.blog :section="$section"/>
        @else
            <div>Invalid Data..!!</div>
        @endif
    @endforeach
</x-site-layout>


