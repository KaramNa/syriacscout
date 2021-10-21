<div>
    <div class="px-2 d-flex justify-content-between">
        <h2 class="mb-0">العمل الحالي</h2>
        @if ($edit_scout_permission)
            <button type="button" class="btn text-danger" data-toggle="modal" data-target="#addScoutCurrentWorkModal"
                wire:click.prevent="reset_fields">
                <i class="fas fa-plus" aria-hidden="true"></i>
            </button>
        @endif
    </div>
    <hr class="w-96">
    <div class="row justify-content-center">
        @if (session()->has('succeed'))
            <div class="mx-4 text-center alert alert-success alert-dismissible fade show w-100" role="alert">
                {{ session('succeed') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif (session()->has('failed'))
            <div class="mx-4 text-center alert alert-danger alert-dismissible fade show w-100" role="alert">
                {{ session('failed') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
    <div class="px-2 mx-0 mb-3 row">
        <div class="p-2 mb-3 bg-white border col-12 rounded-xl">
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th class="border-top-0 border-bottom-0">المهنة</th>
                            <th class="text-center border-top-0 border-bottom-0">الوصف</th>
                            <th class="text-center border-top-0 border-bottom-0">تاريخ البداية</th>
                            <th class="text-center border-top-0 border-bottom-0">مكان العمل</th>
                            <th class="text-center border-top-0 border-bottom-0">تعديل</th>
                            <th class="text-center border-top-0 border-bottom-0">حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($scoutCurrentWork as $currentWork)
                            <tr>
                                <td>{{ $currentWork->scout_current_work }}</td>
                                <td class="text-center">{{ $currentWork->scout_current_work_details }}
                                </td>
                                <td class="text-center">{{ $currentWork->scout_current_work_start_date }}
                                </td>
                                <td class="text-center">{{ $currentWork->scout_cururent_work_place }}
                                </td>
                                <td class="text-center">
                                    @if ($edit_scout_permission)
                                        <button wire:click="updateDelete({{ $currentWork->id }}, 'update')"
                                            class="btn text-primary" data-placement="top" title="Update"><i
                                                class="fas fa-edit" aria-hidden="true"></i></button>
                                    @else
                                        <p>لا تملك صلاحية</p>

                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($edit_scout_permission)
                                        <button wire:click="updateDelete({{ $currentWork->id }}, 'delete')"
                                            class="btn text-danger" data-placement="top" title="Delete"><i
                                                class="fas fa-trash" aria-hidden="true"></i></button>
                                    @else
                                        <p>لا تملك صلاحية</p>

                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <form class="mb-0" wire:submit.prevent="addScoutCurrentWork">
        <div wire:ignore.self class="modal fade" id="addScoutCurrentWorkModal" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="static modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">إضافة مهارة للكشاف
                        </h5>
                        <button type="button" class="ml-0 close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <x-manage-scout.single-current-work />
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

    <form class="mb-0" wire:submit.prevent="deleteScoutCurrentWork">
        <x-manage-scout.deleteModal title="حذف العمل الحالي للكشاف" confirmation="هل تريد بالتأكيد حذف هذا العمل؟" />
    </form>

    <form class="mb-0" wire:submit.prevent="updateScoutCurrentWork">
        <div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true" data-backdrop="static">
            <div class="static modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">تعديل
                            مهارة من
                            مهارات الكشاف
                        </h5>
                        <button type="button" class="ml-0 close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <x-manage-scout.single-current-work />
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
</div>
