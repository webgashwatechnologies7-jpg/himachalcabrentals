@extends('voyager::master')
@section('content')
    <div class="page-content">
        @if(UPGRADE_READY)
            <div class="alerts">
                <div class="alert alert-success">Your website is now ready to support <b>Laravel {{WEB_VERSION}}</b>.
                    Please contact your web admin.
                </div>
            </div>
        @endif
        @include('voyager::alerts')
        @include('voyager::dimmers')
    </div>
@stop
@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"
            integrity="sha512-CEiA+78TpP9KAIPzqBvxUv8hy41jyI3f2uHi7DGp/Y/Ka973qgSdybNegWFciqh6GrN2UePx2KkflnQUbUhNIA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"
            integrity="sha512-d8F1J2kyiRowBB/8/pAWsqUl0wSEOkG5KATkVV4slfblq9VRQ6MyDZVxWl2tWd+mPhuCbpTB4M7uU/x9FlgQ9Q=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.counter').counterUp();
    </script>
@stop


