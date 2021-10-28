<div>
    @section('title', __('navbar.add user'))

    @include('layouts.navbar')

    <div class="container pt-5 mt-5">
        <div class="pt-5 row justify-content-center">
            <div class="px-0 border rounded shadow-lg card col-md-6 col-lg-4">
                <div class="mb-2 text-white card-header bg-dark">
                    <h3 class="mb-0 text-center">{{ __('user.change password') }}</h3>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="changePassword">
                        @if (session('success'))
                            <div class="text-center alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="form-group">
                            <input wire:model="password" type="password" class="rounded form-control"
                                placeholder="{{ __('user.new password') }}" autofocus>
                            <div class="text-danger ">
                                @error('password')
                                    @if (str_contains($message, 'contain'))
                                        كلمة المرور غير صالحة
                                    @else
                                        {{ $message }}
                                    @endif
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <input wire:model="password_confirmation" type="password" class="rounded form-control"
                                placeholder="{{ __('common.confirm user password') }}">
                            <div class="text-danger ">
                                @error('password_confirmation')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="text-danger small mb-3">
                            **يحب أن تتكون كلمة المرور من 8 محارف على الأقل, وتكون مزيج من أرقام وأحرف صغيرة وكبيرة
                        </div>
                        <div class="form-group">
                            <button type="submit"
                                class="px-3 rounded form-control btn btn-dark submit">{{ __('common.edit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
