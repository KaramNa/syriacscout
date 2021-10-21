@foreach ($langInputs as $key => $value)
    <hr>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="d-flex justify-content-start">اللغة</label>
                <select class="form-control @error('scout_lang.' . $value) border-danger @enderror"
                    placeholder="أدخل اللغة" wire:model="scout_lang.{{ $value }}">
                    <x-languages />
                </select>

                @error('scout_lang.' . $value)
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="d-flex justify-content-start">المستوى</label>
                <select class="form-control @error('scout_lang_level.' . $value) border-danger @enderror"
                    wire:model="scout_lang_level.{{ $value }}">
                    <option value="" selected>اختر المستوى</option>
                    <option value="A1">A1</option>
                    <option value="A2">A2</option>
                    <option value="B1">B1</option>
                    <option value="B2">B2</option>
                    <option value="C1">C1</option>
                    <option value="C2">C2</option>
                </select>
                @error('scout_lang_level.' . $value)
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="mt-2">
        <button name="remove_language" type="button" class="btn btn-danger"
            wire:click.prevent="removeLanguage({{ $key }})"><i class="fas fa-times"></i></button>
    </div>

@endforeach
