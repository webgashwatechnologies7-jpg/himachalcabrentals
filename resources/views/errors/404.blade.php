<x-site-layout>
    <x-site.breadcrumb :title="'Error'"/>
    <div class="error-wrapper pt-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="error-content text-center">
                        <div class="error-vactor text-center">
                            <img src="{{asset('public/images/shapes/error-vactor.png')}}" alt="404" class="img-fluid">
                        </div>
                        <div class="error-text">
                            <h2>Oops! Page not found</h2>
                            <p>We are sorry, but the page you requested was not found..!</p>
                            <div class="error-btn">
                                <a href="{{route('site.home')}}"><i class="bi bi-house-door"></i> GO TO HOME</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-site-layout>
