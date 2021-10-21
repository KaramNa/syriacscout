<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label class="d-flex justify-content-start">المهنة</label>
            <input type="text" class="form-control @error('scout_current_work') border-danger @enderror"
                placeholder="أدخل المهنة" wire:model="scout_current_work">
            @error('scout_current_work')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="d-flex justify-content-start">الوصف</label>
            <input type="text" class="form-control @error('scout_current_work_details') border-danger @enderror"
                placeholder="أدخل وصف للمهنة" wire:model="scout_current_work_details">
            @error('scout_current_work_details')
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
            <input type="text" class="date form-control @error('scout_current_work_start_date') border-danger @enderror"
                placeholder="أدخل تاريخ البدء" wire:model="scout_current_work_start_date"
                onchange="this.dispatchEvent(new InputEvent('input'))">
            @error('scout_current_work_start_date')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="d-flex justify-content-start">مكان العمل</label>
            <input type="text" class="form-control @error('scout_cururent_work_place') border-danger @enderror"
                placeholder="أدخل مكان العمل" wire:model="scout_cururent_work_place">
            @error('scout_cururent_work_place')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
</div>
