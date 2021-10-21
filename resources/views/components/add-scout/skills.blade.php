@foreach ($skillInputs as $key => $value)
    <hr>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="d-flex justify-content-start">المهارة</label>
                <input type="text"
                    class="form-control @error('scout_skill_name.' . $value) border-danger @enderror"
                    placeholder="أدخل اسم المهارة" wire:model="scout_skill_name.{{$value}}">
                @error('scout_skill_name.' . $value)
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
                    class="form-control @error('scout_skill_details.' . $value) border-danger @enderror"
                    placeholder="أدخل وصف للمهارة" wire:model="scout_skill_details.{{$value}}">
                @error('scout_skill_details.' . $value)
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="mt-2">
        <button name="remove_skill" type="button" class="btn btn-danger"
            wire:click.prevent="removeSkill({{ $key }})"><i class="fas fa-times"></i></button>
    </div>
@endforeach

