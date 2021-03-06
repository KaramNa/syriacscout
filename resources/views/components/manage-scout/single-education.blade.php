@props(['studyYear', 'finishDate', 'eduSrch' ,'inputFlag'])
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label class="d-flex justify-content-start">الدرجة العلمية</label>
            <select class="form-control @error('scout_education_pace') border-danger @enderror"
                wire:model="scout_education_pace">
                <option value="" selected>اختر الدرجة العلمية</option>
                <option value="معهد">معهد</option>
                <option value="جامعة">جامعة</option>
                <option value="ماجستير">ماجستير</option>
                <option value="دكتوراه">دكتوراه</option>
            </select>
            @error('scout_education_pace')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="d-flex justify-content-start">التخصص</label>
            <input type="text" class="form-control @error('scout_education_name') border-danger @enderror"
                placeholder="أدخل التخصص" wire:model="scout_education_name">
                @if (count($eduSrch) > 0 && $inputFlag === "scout_education_name")
                        <div
                            class="position-absolute z-1000 w-95 search-results d-flex justify-between">
                            <ul class="list-unstyled mt-2 bg-light p-0 scrollable rounded-lg">
                                @foreach ($eduSrch as $s)
                                    <li class="cursor-pointer hover:bg-blue p-2"
                                        wire:click="chooseValue('{{ $s['scout_education_name'] }}', 'scout_education_name')">
                                        {{ $s['scout_education_name'] }}
                                    </li>
                                @endforeach
                            </ul>
                            <span class="cursor-pointer h3 mt-2 bg-light" wire:click="resetFilterResult">&times;</span>
                        </div>
                @endif
            @error('scout_education_name')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label class="d-flex justify-content-start">تاريخ البدء</label>
            <input class="date form-control @error('scout_education_start_date') border-danger @enderror" type="text"
                placeholder="أدخل تاريخ البدء" wire:model="scout_education_start_date"
                onchange="this.dispatchEvent(new InputEvent('input'))">
            @error('scout_education_start_date')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="d-flex justify-content-start">المكان</label>
            <input type="text" class="form-control @error('scout_education_place') border-danger @enderror"
                placeholder="أدخل مكان التعلم" wire:model="scout_education_place">
                @if (count($eduSrch) > 0 && $inputFlag === "scout_education_place")
                        <div
                            class="position-absolute z-1000 w-95 search-results d-flex justify-between">
                            <ul class="list-unstyled mt-2 bg-light p-0 scrollable rounded-lg">
                                @foreach ($eduSrch as $s)
                                    <li class="cursor-pointer hover:bg-blue p-2"
                                        wire:click="chooseValue('{{ $s['scout_education_place'] }}', 'scout_education_place')">
                                        {{ $s['scout_education_place'] }}
                                    </li>
                                @endforeach
                            </ul>
                            <span class="cursor-pointer h3 mt-2 bg-light" wire:click="resetFilterResult">&times;</span>
                        </div>
                @endif
            @error('scout_education_place')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label class="d-flex justify-content-start">السنة الدراسية</label>
            <select class="form-control @error('scout_education_year') border-danger @enderror"
                wire:model="scout_education_year" name="scout_education_year"
                {{ $studyYear == true ? 'disabled' : '' }}>
                <option value="" selected>اختر السنة الدراسية</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
            @error('scout_education_year')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <div class="d-flex justify-content-between">
                <label class="d-flex justify-content-start">تاريخ الانتهاء</label>
                <div>
                    <label for="scout_education_end_date_switch">تخرج</label>
                    <input type="checkbox" name="finish_check" wire:model="finish_check">
                </div>
            </div>
            <input
                class="date form-control @error('scout_education_end_date') border-danger
                                        @enderror"
                type="text" placeholder="أدخل تاريخ الانتهاء" wire:model="scout_education_end_date"
                name="scout_education_end_date" onchange="this.dispatchEvent(new InputEvent('input'))"
                {{ $finishDate == true ? 'disabled' : '' }}>
            @error('scout_education_end_date')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
</div>
