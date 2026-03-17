@extends('voyager::auth.master')
@section('content')
    <div class="col-form">

        <div class="panel-body panel-form box-shadow bg-white rounded-lg">
            <?php $admin_logo_img = Voyager::setting('admin.icon_image', ''); ?>
            @if($admin_logo_img == '')
                <div class="text-center mb-2">
                    <img src="{{asset('images/admin/logo-sm.png')}}" height="80"/>
                </div>
            @else
                <div class="text-center mb-2">
                    <img src="{{ Voyager::image($admin_logo_img) }}" height="80"/>
                </div>
            @endif
            <h1 class="form-title"> {{EMAIL_COMPANY_HEADER}} </h1>

            @if (session('error'))
                <div class="alert alert-danger text-center">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('voyager.login') }}">
                @csrf
                <div class="form-group form-group-material">
                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                           id="email" name="email" value="{{ old('email') }}"
                           required autocomplete="email" autofocus/>
                    <label for="email">Email Address:</label>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class=" form-group form-group-material">
                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                           id="password"
                           name="password"
                           required autocomplete="current-password"/>
                    <label for="password">Password:</label>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group form-group-btns text-center">
                    <div class="row no-gutters">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-block btn-lg btn-rounded shadow-0 btn-dark-3d">Sign
                                In
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


