<div>
    @section('title', __('navbar.manage users'))
    @include('layouts.navbar')

    <div class="container pt-5 mt-5">
        @if (session()->has('status'))
            <div class="text-center alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="table-responsive">
            <table class="table mt-5 text-center">
                <thead class="text-white bg-dark h6">
                    <tr>
                        <th>{{ __('common.username') }}</th>
                        <th>{{ __('user.regiment') }}</th>
                        <th>{{ __('user.user type') }}</th>
                        <th class="text-center">{{ __('common.password') }}</th>
                        <th class="text-center">{{ __('common.delete') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)
                        <tr>
                            <td>{{ $user->user_name }}</td>
                            <td>{{ $user->regiment == null ? '' : $user->regiment->regiment_name }}</td>
                            <td>{{ $user->user_type }} </td>
                            <td class="text-center">
                                @can('superUser')
                                    <button type="button" class="btn btn-primary btn-sm"
                                        wire:click="editDelete({{ $user->id }}, 'edit')">
                                        <i class="fas fa-edit" aria-hidden="true"></i>
                                    </button>
                                @endcan
                            </td>
                            <td name="delete_user" class="text-center">
                                @if ($user->user_type !== 'superUser')
                                    @can('superUser')
                                        <button type="button" class="btn btn-danger btn-sm"
                                            wire:click="editDelete({{ $user->id }}, 'delete', {{ $key }})">
                                            <i class="fas fa-trash" aria-hidden="true"></i>
                                        </button>
                                    @endcan
                                @endif
                            </td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <form class="mb-0" wire:submit.prevent="editPassword">
        <div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            {{ __('user.change password') }}
                        </h5>
                        <button type="button" class="ml-0 close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="password" class="form-control" placeholder="{{ __('user.new password') }}"
                            wire:model="newPassword">
                        @error('newPassword')
                            <div class="text-left text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <input type="password" class="mt-2 form-control"
                            placeholder="{{ __('common.confirm user password') }}"
                            wire:model="newPassword_confirmation">
                        @error('newPassword_confirmation')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                class="fas fa-times"></i></button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form class="mb-0" wire:submit.prevent="deleteUser">
        <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('user.delete user') }}</h5>
                        <button type="button" class="ml-0 close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body d-flex justify-content-start">
                        <h5>{{ __('user.delete user confirmation') }}</h5>
                        @error('unauthorized')
                            <div class="text-left text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i
                                class="fas fa-times"></i></button>
                        <button type="submit" class="btn btn-danger"><i class="fas fa-check"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
