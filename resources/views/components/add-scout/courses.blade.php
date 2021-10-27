@foreach ($courseInputs as $key => $value)
    <hr>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="d-flex justify-content-start">الدورة</label>
                <input type="text"
                    class="form-control @error('scout_course.' . $value) border-danger @enderror"
                    placeholder="أدخل اسم الدورة" wire:model="scout_course.{{$value}}">
                @error('scout_course.' . $value)
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
                    class="form-control @error('scout_course_place.' . $value) border-danger @enderror"
                    placeholder="أدخل مكان الدورة" wire:model="scout_course_place.{{$value}}">
                @error('scout_course_place.' . $value)
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
                <label class="d-flex justify-content-start">المدة</label>
                <input type="text"
                    class="form-control @error('scout_course_duration.' . $value) border-danger @enderror"
                    placeholder="أدخل مدة الدورة" wire:model="scout_course_duration.{{$value}}">
                @error('scout_course_duration.' . $value)
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="d-flex justify-content-start">السنة</label>
                <input type="text"
                    class="form-control @error('scout_course_year.' . $value) border-danger @enderror"
                    placeholder="أدخل عام انجاز الدورة" wire:model="scout_course_year.{{$value}}">
                @error('scout_course_year.' . $value)
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="mt-2 d-flex justify-content-end">
        <button name="remove_course" type="button" class="btn btn-danger" wire:click.prevent="removeCourse({{$key}})"><i class="fas fa-times"></i></button>
    </div>
@endforeach
