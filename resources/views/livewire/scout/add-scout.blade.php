<div>
    @section('title', __('navbar.add scout'))

    @include('layouts.navbar')

    <div class="container pt-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if (session()->has('success'))
                    <div class="mt-5 text-center alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="mt-5">
                    <form wire:submit.prevent="addScout">
                        @if ($currentStep == 1)
                            <div class="step-one">
                                <div class="shadow card">
                                    <div class="text-white card-header bg-dark d-flex justify-content-start">المعلومات
                                        الشخصية</div>
                                    <div class="card-body">
                                        <x-add-scout.personal-infos :scoutProfilePicture="$scoutProfilePicture"
                                            :regiments="$regiments" :fileName="$fileName" />
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($currentStep == 2)
                            <div class="step-two">
                                <div class="shadow card">
                                    <div class="text-white card-header bg-dark d-flex justify-content-start">الخبرات
                                        العلمية والدورات المتبعة</div>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between w-100">
                                            <span class="font-weight-bold">التحصيل العلمي</span>
                                            <button id="add_new_education" class="text-white btn bg-dark" type="button"
                                                wire:click.prevent="addEdu">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                        <div id="education">
                                            <x-add-scout.education :educationInputs="$educationInputs"
                                                :finishDate="$finishDate" :studyYear="$studyYear" :eduSrch="$eduSrch" :inputFlag="$inputFlag" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($currentStep == 3)
                            <div class="step-three">
                                <div class="shadow card">
                                    <div class="text-white card-header bg-dark d-flex justify-content-start">الخبرات
                                        العلمية والدورات المتبعة</div>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between w-100">
                                            <span class="font-weight-bold">اللغات</span>
                                            <button id="add_new_language" class="text-white btn bg-dark" type="button"
                                                wire:click.prevent="addLanguage">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                        <div id="languages">
                                            <x-add-scout.languages :langInputs="$langInputs" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($currentStep == 4)
                            <div class="step-four">
                                <div class="shadow card">
                                    <div class="text-white card-header bg-dark d-flex justify-content-start">الخبرات
                                        العلمية والدورات المتبعة</div>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between w-100">
                                            <span class="font-weight-bold">المهارات</span>
                                            <button id="add_new_skill" class="text-white btn bg-dark" type="button"
                                                wire:click.prevent="addSkill">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                        <div id="skills">
                                            <x-add-scout.skills :skillInputs="$skillInputs" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($currentStep == 5)
                            <div class="step-five">
                                <div class="shadow card">
                                    <div class="text-white card-header bg-dark d-flex justify-content-start">الخبرات
                                        العلمية والدورات المتبعة</div>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between w-100">
                                            <span class="font-weight-bold">الدورات المتبعة</span>
                                            <button id="add_new_course" class="text-white btn bg-dark" type="button"
                                                wire:click.prevent="addCourse">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                        <div id="courses">
                                            <x-add-scout.courses :courseInputs="$courseInputs" />
                                        </div>
                                    </div>
                                </div>
                        @endif

                        @if ($currentStep == 6)
                            <div class="step-six">
                                <div class="shadow card">
                                    <div class="text-white card-header bg-dark d-flex justify-content-start">الخبرات
                                        العلمية والدورات المتبعة</div>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between w-100">
                                            <span class="font-weight-bold">العمل الحالي</span>
                                            <button id="add_new_current_work" class="text-white btn bg-dark"
                                                type="button" wire:click.prevent="addCurWork">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                        <div id="current_work">
                                            <x-add-scout.current-work :curWorkInputs="$curWorkInputs" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($currentStep == 7)
                            <div class="step-seven">
                                <div class="shadow card">
                                    <div class="text-white card-header bg-dark d-flex justify-content-start">الخبرات
                                        العلمية والدورات المتبعة</div>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between w-100">
                                            <span class="font-weight-bold">العمل السابق والخبرات السابقة</span>
                                            <button id="add_new_experience" class="text-white btn bg-dark" type="button"
                                                wire:click.prevent="addExp">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                        <div id="experiences">
                                            <x-add-scout.experience :expInputs="$expInputs" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="py-2 my-5 bg-white action-buttons d-flex justify-content-between">
                            @if ($currentStep == 1)
                                <div></div>
                            @endif

                            @if ($currentStep >= 2 && $currentStep <= 7) 
                            <button class="text-white btn btn-primary" type="button"
                                    wire:click="decreaseStep">السابق</button>
                            <button class="text-white btn btn-danger" type="button"
                                    onclick='window.location.reload();'>إلغاء</button>
                            @endif

                            @if ($currentStep == 7)
                                <button class="text-white btn btn-dark" type="submit">حفظ</button>
                            @endif

                            @if ($currentStep >= 1 && $currentStep <= 6) <button
                                    class="text-white btn btn-success" type="button"
                                    wire:click="increaseStep">التالي</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
