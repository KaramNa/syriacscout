<div class="row">
    <div class="col-lg-6">
        <div class="form-group ">
            <label>المهارة</label>
            <input type="text" class=" form-control @error('scout_skill_name') border-danger @enderror"
                placeholder="أدخل اسم المهارة" wire:model="scout_skill_name">
            @error('scout_skill_name')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group ">
            <label>الوصف</label>
            <input type="text" class=" form-control @error('scout_skill_details') border-danger @enderror"
                placeholder="أدخل وصف للمهارة" wire:model="scout_skill_details">
            @error('scout_skill_details')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
</div>
