@foreach ($curWorkInputs as $key => $value)
    <hr>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="d-flex justify-content-start">المهنة</label>
                <input type="text"
                    class="form-control @error('scout_current_work.' . $value) border-danger @enderror"
                    placeholder="أدخل المهنة" wire:model="scout_current_work.{{ $value }}">
                @error('scout_current_work.' . $value)
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="d-flex justify-content-start">الوصف</label>
                <input type="text"
                    class="form-control @error('scout_current_work_details.' . $value) border-danger @enderror"
                    placeholder="أدخل وصف للمهنة" wire:model="scout_current_work_details.{{ $value }}">
                @error('scout_current_work_details.' . $value)
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
                <input type="text"
                    class="date form-control @error('scout_current_work_start_date.' . $value) border-danger @enderror"
                    placeholder="أدخل تاريخ البدء" wire:model="scout_current_work_start_date.{{ $value }}"
                    onchange="this.dispatchEvent(new InputEvent('input'))">
                @error('scout_current_work_start_date.' . $value)
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="d-flex justify-content-start">مكان العمل</label>
                <input type="text"
                    class="form-control @error('scout_cururent_work_place.' . $value) border-danger @enderror"
                    placeholder="أدخل مكان العمل" wire:model="scout_cururent_work_place.{{ $value }}">
                @error('scout_cururent_work_place.' . $value)
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="mt-2 d-flex justify-content-end">
        <button name="remove_current_work" type="button" class="btn btn-danger"
            wire:click.prevent="removeCurWork({{ $key }})"><i class="fas fa-times"></i></button>
    </div>

@endforeach
