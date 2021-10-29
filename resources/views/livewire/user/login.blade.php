<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    {!! NoCaptcha::renderJs() !!}
</head>

<body>
    <div>
        <div class="container mt-5 pt-5">
            <div class="row justify-content-center pt-5">
                <div class="card shadow-lg border rounded col-md-6 col-lg-4 px-0">
                    <div class="card-header bg-dark text-white mb-2">
                        <h3 class="text-center mb-0">{{ __('login.login') }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.login') }}" method="POST">
                            @csrf
                            @if (session('faild'))
                                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                    {{ session('faild') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="form-group">
                                <input type="text" name="userName" class="form-control rounded"
                                    placeholder="{{ __('common.username') }}">
                                <div class="text-danger">
                                    @error('userName')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control rounded"
                                    placeholder="{{ __('common.password') }}">
                                <div class="text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="checkbox-wrap checkbox-primary">{{ __('login.remember me') }}
                                    <input type="checkbox" id="remember" name="remember" checked>
                                </label>
                            </div>
                            <div class="form-group">
                                <div class="{{ $errors->has('g-recaptcha-response') ? 'has-error' : '' }}">
                                    {!! NoCaptcha::display(['data-theme' => 'white']) !!}
                                </div>
                                @if ($errors->has('g-recaptcha-response'))
                                    <div class="text-danger">
                                        <span class="help-block">
                                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                        </span>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit"
                                    class="form-control btn btn-dark rounded submit px-3">{{ __('login.login') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
