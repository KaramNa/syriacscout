<div>
    @section('title', __('navbar.add user'))

    @include('layouts.navbar')

    <div class="container pt-5 mt-5">
        <div class="pt-5 row justify-content-center">
            <div class="px-0 border rounded shadow-lg card col-md-6 col-lg-4">
                <div class="mb-2 text-white card-header bg-dark">
                    <h3 class="mb-0 text-center">{{ __('register.add new user') }}</h3>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="store">
                        @if (session('success'))
                            <div class="text-center alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="form-group">
                            <input wire:model="user_name" type="text" class="rounded form-control"
                                placeholder="{{ __('common.username') }}">
                            <div class="text-danger ">
                                @error('user_name')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <input wire:model="password" type="password" class="rounded form-control"
                                placeholder="{{ __('common.password') }}">
                            <div class="text-danger ">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <input wire:model="password_confirmation" type="password" class="rounded form-control"
                                placeholder="{{ __('common.confirm user password') }}">
                            <div class="text-danger ">
                                @error('password_confirmation')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <select wire:model="user_type" class="rounded form-control">
                                <option value="" selected>{{ __('common.choose user type') }}</option>
                                <option value="superUser">Super User</option>
                                <option value="admin">Admin</option>
                                <option value="viewer">Viewer
                                </option>
                            </select>
                            <div class="text-danger ">
                                @error('user_type')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <select class="rounded form-control" wire:model="user_regiment"
                                {{ $choose_regiment == false ? 'hidden' : '' }}>
                                <option value="" selected>{{ __('common.choose the regiment') }}</option>
                                @if ($regiments)
                                    @foreach ($regiments as $regiment)
                                        <option value="{{ $regiment->id }}">{{ $regiment->regiment_name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                            <div class="text-danger ">
                                @error('user_regiment')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit"
                                class="px-3 rounded form-control btn btn-dark submit">{{ __('common.add') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
