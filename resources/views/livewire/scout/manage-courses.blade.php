<div>
    <div class="px-2 d-flex justify-content-between">
        <h2 class="mb-0">الدورات المتبعة</h2>
        @if ($edit_scout_permission)
            <button type="button" class="btn text-danger" data-toggle="modal" data-target="#addScoutCoursesModal"
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
                            <th class="border-top-0 border-bottom-0">الدورة</th>
                            <th class="text-center border-top-0 border-bottom-0">المكان</th>
                            <th class="text-center border-top-0 border-bottom-0">المدة</th>
                            <th class="text-center border-top-0 border-bottom-0">السنة</th>
                            <th class="text-center border-top-0 border-bottom-0">تعديل</th>
                            <th class="text-center border-top-0 border-bottom-0">حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($scoutCourses as $course)
                            <tr>
                                <td>{{ $course->scout_course }}</td>
                                <td class="text-center">{{ $course->scout_course_place }}</td>
                                <td class="text-center">{{ $course->scout_course_duration }}</td>
                                <td class="text-center">{{ $course->scout_course_year }}</td>
                                <td class="text-center">
                                    @if ($edit_scout_permission)
                                        <button wire:click="updateDelete({{ $course->id }}, 'update')"
                                            class="btn text-primary" data-placement="top" title="Update"><i
                                                class="fas fa-edit" aria-hidden="true"></i></button>
                                    @else
                                        <p>لا تملك صلاحية</p>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($edit_scout_permission)
                                        <button wire:click="updateDelete({{ $course->id }}, 'delete')"
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

    <form class="mb-0" wire:submit.prevent="addScoutCourse">
        <div wire:ignore.self class="modal fade" id="addScoutCoursesModal" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="static modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">إضافة دورة للكشاف
                        </h5>
                        <button type="button" class="ml-0 close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <x-manage-scout.single-course />
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form class="mb-0" wire:submit.prevent="deleteScoutCourse">
        <x-manage-scout.deleteModal title="حذف دورة من دورات الكشاف" confirmation="هل تريد بالتأكيد حذف هذه الدورة؟" />
    </form>

    <form class="mb-0" wire:submit.prevent="updateScoutCourse">
        <div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true" data-backdrop="static">
            <div class="static modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">تعديل
                            دورة من دورات الكشاف
                        </h5>
                        <button type="button" class="ml-0 close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <x-manage-scout.single-course />
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
