<div>
    @section('title', 'Login')

    <div class="container mt-5 pt-5">
        <div class="row justify-content-center pt-5">
            <div class="card shadow-lg border rounded col-md-6 col-lg-4 px-0">
                <div class="card-header bg-dark text-white mb-2">
                    <h3 class="text-center mb-0">{{ __('login.login') }}</h3>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="login">
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
                            <input type="text" wire:model="userName" class="form-control rounded"
                                placeholder="{{ __('common.username') }}">
                            <div class="text-danger">
                                @error('userName')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="password" wire:model="password" class="form-control rounded"
                                placeholder="{{ __('common.password') }}">
                            <div class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <label class="checkbox-wrap checkbox-primary">{{ __('login.remember me') }}
                                <input type="checkbox" id="remember" wire:model="remember" checked>
                            </label>
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
