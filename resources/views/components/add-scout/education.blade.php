@foreach ($educationInputs as $key => $value)
    <hr>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="d-flex justify-content-start">الدرجة العلمية</label>
                <select class="form-control @error('scout_education_pace.' . $value) border-danger @enderror"
                    wire:model="scout_education_pace.{{ $value }}">
                    <option value="" selected>اختر الدرجة العلمية</option>
                    <option value="معهد">معهد</option>
                    <option value="جامعة">جامعة</option>
                    <option value="ماجستير">ماجستير</option>
                    <option value="دكتوراه">دكتوراه</option>
                </select>
                @error('scout_education_pace.' . $value)
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="d-flex justify-content-start">التخصص</label>
                <input type="text" class="form-control @error('scout_education_name.' . $value) border-danger @enderror"
                    placeholder="أدخل التخصص" wire:model="scout_education_name.{{ $value }}">
                @error('scout_education_name.' . $value)
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
                <input class="date form-control @error('scout_education_start_date.' . $value) border-danger @enderror"
                    type="text" placeholder="أدخل تاريخ البدء"
                    wire:model="scout_education_start_date.{{ $value }}"
                    onchange="this.dispatchEvent(new InputEvent('input'))">
                @error('scout_education_start_date.' . $value)
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="d-flex justify-content-start">المكان</label>
                <input type="text"
                    class="form-control @error('scout_education_place.' . $value) border-danger @enderror"
                    placeholder="أدخل مكان التعلم" wire:model="scout_education_place.{{ $value }}"
                    onchange="a()">
                @error('scout_education_place.' . $value)
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
                <select class="form-control @error('scout_education_year.' . $value) border-danger @enderror"
                    wire:model="scout_education_year.{{ $value }}" name="scout_education_year"
                    {{ $studyYear[$key] == true ? 'disabled' : '' }}>
                    <option value="" selected>اختر السنة الدراسية</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
                @error('scout_education_year.' . $value)
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
                        <label for="scout_education_end_date_switch{{ $value }}">تخرج</label>
                        <input type="checkbox" name="finish_check" wire:model="finish_check.{{ $value }}">
                    </div>
                </div>
                <input
                    class="date form-control @error('scout_education_end_date.' . $value) border-danger
                    @enderror"
                    type="text" placeholder="أدخل تاريخ الانتهاء"
                    wire:model="scout_education_end_date.{{ $value }}"
                    name="scout_education_end_date.{{ $value }}"
                    onchange="this.dispatchEvent(new InputEvent('input'))"
                    {{ $finishDate[$key] == true ? 'disabled' : '' }}>
                @error('scout_education_end_date.' . $value)
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="mt-2">
        <button name="remove_education" type="button" class="btn btn-danger"
            wire:click.prevent="removeEdu({{ $key }})"><i class="fas fa-times"></i></button>
    </div>
@endforeach
