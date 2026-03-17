<div class="widget-v2 widget-flex"
     style="background-image: url({{asset('public/images/admin/wave-bg.png')}});">
    <div class="widget-header">
        <h6 class="widget-label">{!! $title !!}</h6>
        <div class="widget-large-icon">
            <div class="icon-wrapper bg-admin-theme">
                @if (isset($icon))<i class='{{ $icon }}' style="display: inline-block;"></i>
                @else <i class="voyager-people" style="display: inline-block;"></i>
                @endif
            </div>
        </div>
    </div>
    <div class="widget-counter"><span class="counter">{!! $text !!}</span></div>
    <div class="widget-footer">
        <span><a href="{{ $button['link'] }}">View All</a> <b>&#10132;</b> </span>
    </div>
</div>
