<div>
    @section('title', __('navbar.regiments'))

    @include('layouts.navbar')

    <div class="pt-5 mx-auto mt-5 col-md-6">
        @if (session()->has('status'))
            <div class="text-center alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <form wire:submit.prevent="store_regiment">
            <div class="form-group d-flex flex-column align-items-start">
                <label for="" class="h5">{{ __('regiments.add new regiments') }}</label>
                <input type="text" wire:model="regiment_name"
                    class="form-control @error('regiment_name') border-danger @enderror">
                @error('regiment_name')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div><button type="submit" class="mt-2 btn btn-dark">{{ __('common.add') }}</button></div>
            </div>
        </form>
        <table class="table mt-5">
            <thead class="text-white bg-dark">
                <tr>
                    <th class="mb-0 h5 d-flex justify-content-start">{{ __('regiments.regiment name') }}</th>
                    <th class="text-center h5">{{ __('common.edit') }}</th>
                    <th class="text-center h5">{{ __('common.delete') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($regiments as $key => $regiment)
                    <tr>
                        <td class="d-flex justify-content-start">{{ $regiment->regiment_name }}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-primary btn-sm"
                                wire:click="editDelete({{ $regiment->id }}, 'edit')">
                                <i class="fas fa-edit" aria-hidden="true"></i>
                            </button>
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn btn-danger btn-sm"
                                wire:click="editDelete({{ $regiment->id }}, 'delete')">
                                <i class="fas fa-trash" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <form wire:submit.prevent="edit_regiment" class="mb-0">
        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('regiments.edit regiment') }}</h5>
                        <button type="button" class="ml-0 close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control" placeholder="{{ __('regiments.regiment name') }}"
                            wire:model="regiment_new_name">
                        @error('regiment_new_name')
                            <div class="text-danger">
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

    <form wire:submit.prevent="deleteRegiment" class="mb-0">
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('regiments.delete regiment') }}</h5>
                        <button type="button" class="ml-0 close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body d-flex justify-content-start">
                        <h5 class="text-break">
                            {{ __('regiments.confirm regiment delete') }}{{-- , ["regiment" => "<strong class='text-danger'>" . $regiment_to_edit->regiment_name . "</strong>"]) !!} --}}
                        </h5>
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
