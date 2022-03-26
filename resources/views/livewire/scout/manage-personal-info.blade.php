<div>
    <div class="px-3 d-flex justify-content-between">
        <h2 class="mb-0">المعلومات الشخصية</h2>
        @if ($edit_scout_permission)
            <div>
                <button type="button" class="btn text-danger" data-toggle="modal"
                    data-target="#suspend_scout">
                    <i class="far fa-pause-circle" aria-hidden="true"></i>
                </button>
                <button type="button" class="btn text-primary" data-toggle="modal" data-target="#updateScoutPersonalInfo"
                    wire:click.prevent="editScoutPersonalInfo">
                    <i class="fas fa-edit" aria-hidden="true"></i>
                </button>
                <button type="button" class="btn text-danger" data-toggle="modal"
                     data-target="#deleteScout">
                    <i class="fas fa-trash" aria-hidden="true"></i>
                </button>
            </div>
        @endif
    </div>
    <hr class="w-96">
    <div class="row justify-content-center">
        @if (session()->has('update_succeed'))
            <div class="mx-4 text-center alert alert-success alert-dismissible fade show w-100" role="alert">
                {{ session('update_succeed') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif (session()->has('update_failed'))
            <div class="mx-4 text-center alert alert-danger alert-dismissible fade show w-100" role="alert">
                {{ session('update_failed') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
    <div class="mx-0 mb-3 row">
        <div class="col-md-6">
            <div class="p-2 mb-3 bg-white border rounded-xl">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <tbody>
                            <tr>
                                <th class="w-130 border-top-0">الاسم</th>
                                <td class="border-top-0">{{ $scout->scout_first_name }}</td>
                            </tr>
                            <tr>
                                <th>الكنية</th>
                                <td>{{ $scout->scout_last_name }}</td>
                            </tr>
                            <tr>
                                <th>اسم الأب</th>
                                <td>{{ $scout->scout_father_name }}</td>
                            </tr>
                            <tr>
                                <th>اسم الأم</th>
                                <td>{{ $scout->scout_mother_name }}</td>
                            </tr>
                            <tr>
                                <th>الاسم بالانكليزية</th>
                                <td class="text-capitalize">{{ $scout->scout_name_en }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="p-2 mb-3 bg-white border rounded-xl">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <tbody>
                            <tr>
                                <th class="w-130 border-top-0">الجنس</th>
                                <td class="border-top-0">{{ $scout->scout_gender }}</td>
                            </tr>
                            <tr>
                                <th>العمر</th>
                                <td>{{ $age }}</td>
                            </tr>
                            <tr>
                                <th>الرقم الوطني</th>
                                <td>{{ $scout->scout_national_no }}</td>
                            </tr>
                            <tr>
                                <th>الحالة الاجتماعية</th>
                                <td>{{ $scout->scout_marital_status }}</td>
                            </tr>
                            <tr>
                                <th>عدد الأولاد</th>
                                <td>{{ $scout->scout_no_of_children }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-0 mb-2 row">
        <div class="col-md-6">
            <div class="p-2 mb-3 bg-white border rounded-xl">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <tbody>
                            <tr>
                                <th class="w-130 border-top-0">الرقم الكشفي</th>
                                <td class="border-top-0">{{ $scout->scout_number }}</td>
                            </tr>
                            <tr>
                                <th>تاريخ الانتساب</th>
                                <td>{{ $scout->scout_affiliation_date }}</td>
                            </tr>
                            <tr>
                                <th>اللقب</th>
                                <td>{{ $scout->scout_title }}</td>
                            </tr>
                            <tr>
                                <th>الفوج</th>
                                <td>{{ $regiment_name }}</td>
                            </tr>
                            <tr>
                                <th>المحافظة</th>
                                <td>{{ $scout->scout_government }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="p-2 mb-3 bg-white border rounded-xl">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <tbody>
                            <tr>
                                <th class="w-130 border-top-0">رقم الموبايل</th>
                                <td class=" border-top-0">{{ $scout->scout_mobile_phone }}</td>
                            </tr>
                            <tr>
                                <th class="___class_+?37___">الهاتف الأرضي</th>
                                <td class="___class_+?38___">{{ $scout->scout_home_phone }}</td>
                            </tr>
                            <tr>
                                <th class="___class_+?39___">البريد الالكتروني</th>
                                <td class=" text-break">{{ $scout->scout_email }}</td>
                            </tr>
                            <tr>
                                <th class="___class_+?41___">المدينة</th>
                                <td class="___class_+?42___">{{ $scout->scout_city }}</td>
                            </tr>
                            <tr>
                                <th class="___class_+?43___">العنوان</th>
                                <td class="___class_+?44___">{{ $scout->scout_address }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <form class="mb-0" wire:submit.prevent="updateScoutPersonalInfo">
        <div wire:ignore.self class="modal fade" id="updateScoutPersonalInfo" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="static modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header" dir="rtl">
                        <h5 class="modal-title" id="exampleModalLabel">تعديل المعلومات الشخصية للكشاف
                        </h5>
                        <button type="button" class="ml-0 close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <x-add-scout.personal-infos :scoutProfilePicture="$scoutProfilePicture" :regiments="$regiments"
                            :fileName="$fileName" />
                    </div>
                    <div class="modal-footer" dir="rtl">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                class="fas fa-times"></i></button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form class="mb-0" wire:submit.prevent="suspend_scout">
        <div wire:ignore.self class="modal fade" id="suspend_scout" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="static modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header" dir="rtl">
                        <h5 class="modal-title" id="exampleModalLabel">إيقاف نشاط الكشاف
                        </h5>
                        <button type="button" class="ml-0 close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label>أدخل تاريخ توقف نشاط هذا الكشاف</label>
                        <input type="text" class="date form-control" wire:model="suspension_date" onchange="this.dispatchEvent(new InputEvent('input'))">
                        @error('suspension_date')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="modal-footer" dir="rtl">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                class="fas fa-times"></i></button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    <form class="mb-0" wire:submit.prevent="deleteScout">
        <div wire:ignore.self class="modal fade" id="deleteScout" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="static modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header" dir="rtl">
                        <h5 class="modal-title" id="exampleModalLabel">حذف الكشاف
                        </h5>
                        <button type="button" class="ml-0 close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5>هل تريد حذف هذا الكشاف؟</h5>
                    </div>
                    <div class="modal-footer" dir="rtl">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                class="fas fa-times"></i></button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
