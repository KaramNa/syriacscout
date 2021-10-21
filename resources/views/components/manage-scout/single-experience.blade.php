<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label class="d-flex justify-content-start">المهنة</label>
            <input type="text"
                class="form-control @error('scout_experience') border-danger @enderror"
                placeholder="أدخل المهنة" wire:model="scout_experience">
            @error('scout_experience')
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
                class="form-control @error('scout_experience_details') border-danger @enderror"
                placeholder="أدخل وصف للمهنة" wire:model="scout_experience_details">
            @error('scout_experience_details')
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
                class="date form-control @error('scout_experience_start_date') border-danger @enderror"
                placeholder="أدخل تاريخ البداية" wire:model="scout_experience_start_date"
                onchange="this.dispatchEvent(new InputEvent('input'))">
            @error('scout_experience_start_date')
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
                class="date form-control @error('scout_experience_end_date') border-danger @enderror"
                placeholder="أدخل تاريخ النهاية" wire:model="scout_experience_end_date"
                onchange="this.dispatchEvent(new InputEvent('input'))">
            @error('scout_experience_end_date')
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
                class="form-control @error('scout_experience_place') border-danger @enderror"
                placeholder="أدخل مكان العمل" wire:model="scout_experience_place"
                onchange="this.dispatchEvent(new InputEvent('input'))">
            @error('scout_experience_place')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
</div>
