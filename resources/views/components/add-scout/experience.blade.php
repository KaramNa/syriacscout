@foreach ($expInputs as $key => $value)

    <hr>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="d-flex justify-content-start">المهنة</label>
                <input type="text"
                    class="form-control @error('scout_experience.' . $value) border-danger @enderror"
                    placeholder="أدخل المهنة" wire:model="scout_experience.{{ $value }}">
                @error('scout_experience.' . $value)
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
                    class="form-control @error('scout_experience_details.' . $value) border-danger @enderror"
                    placeholder="أدخل وصف للمهنة" wire:model="scout_experience_details.{{ $value }}">
                @error('scout_experience_details.' . $value)
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
                <label class="d-flex justify-content-start">تاريخ البداية</label>
                <input type="text"
                    class="date form-control @error('scout_experience_start_date.' . $value) border-danger @enderror"
                    placeholder="أدخل تاريخ البداية" wire:model="scout_experience_start_date.{{ $value }}"
                    onchange="this.dispatchEvent(new InputEvent('input'))">
                @error('scout_experience_start_date.' . $value)
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="d-flex justify-content-start">تاريخ النهاية</label>
                <input type="text"
                    class="date form-control @error('scout_experience_end_date.' . $value) border-danger @enderror"
                    placeholder="أدخل تاريخ النهاية" wire:model="scout_experience_end_date.{{ $value }}"
                    onchange="this.dispatchEvent(new InputEvent('input'))">
                @error('scout_experience_end_date.' . $value)
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label class="d-flex justify-content-start">مكان العمل</label>
                <input type="text"
                    class="form-control @error('scout_experience_place.' . $value) border-danger @enderror"
                    placeholder="أدخل مكان العمل" wire:model="scout_experience_place.{{ $value }}"
                    onchange="this.dispatchEvent(new InputEvent('input'))">
                @error('scout_experience_place.' . $value)
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="mt-2">
        <button name="remove_experience" type="button" class="btn btn-danger"
            wire:click.prevent="removeExp({{ $key }})"><i class="fas fa-times"></i></button>
    </div>
@endforeach
