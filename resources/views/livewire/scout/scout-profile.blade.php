<div>
    @section('title', 'Scout Profile')
    @section('css')
        <link href="{{ asset('css/sidebarStyle.min.css') }}" rel="stylesheet">
        <script src="{{ asset('js/sidebarScript.js') }}"></script>
    @stop
    @include('layouts.navbar')
    <div class="pt-5 page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper overflow-auto h-100" wire:ignore>
            <div class="sidebar-content">
                <div class="px-3 py-2 d-flex justify-content-end">
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="sidebar-header">
                    <div class="user-pic">
                        <img class="img-responsive img-rounded"
                            src="{{ asset('storage/images/profile_pictures/' . $scout_profile_picture) }}"
                            alt="User picture">
                    </div>
                    <div class="user-info">
                        <span class="user-name">{{ $scout_first_name }}
                            <strong>{{ $scout_last_name }}</strong>
                        </span>
                        <span class="user-regiment mt-1">{{ __('personalInfo.Regiment') }}:
                            {{ $regiment_name }}</span>
                        @if ($suspension_date === null)
                            <span class="mt-1">{{ __('common.status') }}: {{ __('common.active') }}</span>
                        @else
                            <span class="mt-1">{{ __('common.status') }}: {{ __('common.not active') }}
                                {{ $suspension_date }}</span>
                        @endif
                    </div>
                </div>
                <!-- sidebar-header  -->
                <div class="sidebar-menu">
                    <ul>
                        <li class="sidebar-dropdown active">
                            <a class="d-flex justify-content-start align-items-center"
                                wire:click.prevent="setCurrentSection(1)">
                                <i class="fa fa-user-alt"></i>
                                <span class="pr-2 text-light">المعلومات الشخصية</span>
                            </a>
                        </li>
                        <li class="sidebar-dropdown">
                            <a class="d-flex justify-content-start align-items-center"
                                wire:click.prevent="setCurrentSection(2)">
                                <i class="fa fa-graduation-cap"></i>
                                <span class="pr-2 text-light">التحصيل العلمي</span>
                            </a>
                        </li>
                        <li class="sidebar-dropdown">
                            <a class="d-flex justify-content-start align-items-center"
                                wire:click.prevent="setCurrentSection(3)">
                                <i class="fa fa-globe"></i>
                                <span class="pr-2 text-light">اللغات</span>
                            </a>
                        </li>
                        <li class="sidebar-dropdown">
                            <a class="d-flex justify-content-start align-items-center"
                                wire:click.prevent="setCurrentSection(4)">
                                <i class="fa fa-brain"></i>
                                <span class="pr-2 text-light">المهارات</span>
                            </a>
                        </li>
                        <li class="sidebar-dropdown">
                            <a class="d-flex justify-content-start align-items-center"
                                wire:click.prevent="setCurrentSection(5)">
                                <i class="fa fa-certificate"></i>
                                <span class="pr-2 text-light">الدورات المتبعة</span>
                            </a>
                        </li>
                        <li class="sidebar-dropdown">
                            <a class="d-flex justify-content-start align-items-center"
                                wire:click.prevent="setCurrentSection(6)">
                                <i class="fa fa-briefcase"></i>
                                <span class="pr-2 text-light">العمل الحالي</span>
                            </a>
                        </li>
                        <li class="sidebar-dropdown">
                            <a class="d-flex justify-content-start align-items-center"
                                wire:click.prevent="setCurrentSection(7)">
                                <i class="fa fa-trophy"></i>
                                <span class="pr-2 text-light">العمل والخبرات السابقة</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->
        </nav>
        <!-- sidebar-wrapper  -->
        <main class="page-content">
            <div class="px-2 container-fluid">
                @if ($current_section == 1)
                    <livewire:scout.manage-personal-info :scout="$scout"
                        :edit_scout_permission="$edit_scout_permission" />
                @endif

                @if ($current_section == 2)
                    <livewire:scout.manage-education :scoutId="$scoutId"
                        :edit_scout_permission="$edit_scout_permission" />
                @endif

                @if ($current_section == 3)
                    <livewire:scout.manage-languages :scoutId="$scoutId"
                        :edit_scout_permission="$edit_scout_permission" />
                @endif

                @if ($current_section == 4)
                    <livewire:scout.manage-skills :scoutId="$scoutId" :edit_scout_permission="$edit_scout_permission" />
                @endif

                @if ($current_section == 5)
                    <livewire:scout.manage-courses :scoutId="$scoutId"
                        :edit_scout_permission="$edit_scout_permission" />
                @endif

                @if ($current_section == 6)
                    <livewire:scout.manage-current-work :scoutId="$scoutId"
                        :edit_scout_permission="$edit_scout_permission" />
                @endif

                @if ($current_section == 7)
                    <livewire:scout.manage-experience :scoutId="$scoutId"
                        :edit_scout_permission="$edit_scout_permission" />
                @endif
            </div>
        </main>
        <!-- page-content" -->
    </div>
</div>
