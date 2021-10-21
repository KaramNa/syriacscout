<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label>اللغة</label>
            <select class="form-control @error('scout_lang') border-danger @enderror" placeholder="أدخل اللغة"
                wire:model="scout_lang">
                <x-languages />
            </select>
            @error('scout_lang')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label>المستوى</label>
            <select class="form-control @error('scout_lang_level') border-danger @enderror"
                wire:model="scout_lang_level">
                <option value="" selected>اختر المستوى</option>
                <option value="A1">A1</option>
                <option value="A2">A2</option>
                <option value="B1">B1</option>
                <option value="B2">B2</option>
                <option value="C1">C1</option>
                <option value="C2">C2</option>
            </select>
            @error('scout_lang_level')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
</div>
