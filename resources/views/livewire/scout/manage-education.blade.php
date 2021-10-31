<div>
    <div class="px-2 d-flex justify-content-between">
        <h2 class="mb-0">التحصيل العلمي</h2>
        @if ($edit_scout_permission)
            <button type="button" class="btn text-danger" data-toggle="modal" data-target="#addScoutEducationModal"
                wire:click.prevent='reset_fields'>
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
                            <th class="border-top-0 border-bottom-0">الدرجة العلمية</th>
                            <th class="text-center border-top-0 border-bottom-0">الاختصاص</th>
                            <th class="text-center border-top-0 border-bottom-0">تاريخ البدء</th>
                            <th class="text-center border-top-0 border-bottom-0">السنة</th>
                            <th class="text-center border-top-0 border-bottom-0">المكان</th>
                            <th class="text-center border-top-0 border-bottom-0">تعديل</th>
                            <th class="text-center border-top-0 border-bottom-0">حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($scoutEducation as $key => $education)
                            <tr>
                                <td>{{ $education->scout_education_pace }}</td>
                                <td class="text-center">{{ $education->scout_education_name }}</td>
                                <td class="text-center">{{ $education->scout_education_start_date }}</td>
                                <td class="text-center">{{ $educationYear[$key] }}</td>
                                <td class="text-center">{{ $education->scout_education_place }}</td>
                                <td class="text-center">
                                    @if ($edit_scout_permission)
                                        <button wire:click="updateDelete({{ $education->id }}, 'update')"
                                            class="btn text-primary" data-placement="top" title="Update"><i
                                                class="fas fa-edit" aria-hidden="true"></i></button>
                                    @else
                                        <p>لا تملك صلاحية</p>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($edit_scout_permission)
                                        <button wire:click="updateDelete({{ $education->id }}, 'delete')"
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

    <form class="mb-0" wire:submit.prevent="addScoutEducation">
        <div wire:ignore.self class="modal fade" id="addScoutEducationModal" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="static modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">إضافة درجة علمية للكشاف
                        </h5>
                        <button type="button" class="ml-0 close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <x-manage-scout.single-education :finishDate="$finishDate" :studyYear="$studyYear" :eduSrch="$eduSrch" :inputFlag="$inputFlag" />
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

    <form class="mb-0" wire:submit.prevent="deleteScoutEducation">
        <x-manage-scout.deleteModal title="حذف درجة علمية من درجات الكشاف"
            confirmation="هل تريد بالتأكيد حذف هذه الدرجة؟" />

    </form>

    <form class="mb-0" wire:submit.prevent="updateScoutEducation">
        <div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true" data-backdrop="static">
            <div class="static modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">تعديل
                            درجة علمية من درجات الكشاف
                        </h5>
                        <button type="button" class="ml-0 close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <x-manage-scout.single-education :finishDate="$finishDate" :studyYear="$studyYear" :eduSrch="$eduSrch" :inputFlag="$inputFlag" />
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
