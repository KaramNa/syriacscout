
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="d-flex justify-content-start">الدورة</label>
                                    <input type="text"
                                        class="form-control @error('scout_course') border-danger @enderror"
                                        placeholder="أدخل اسم الدورة" wire:model="scout_course">
                                    @error('scout_course')
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
                                        class="form-control @error('scout_course_place') border-danger @enderror"
                                        placeholder="أدخل مكان الدورة" wire:model="scout_course_place">
                                    @error('scout_course_place')
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
                                        class="form-control @error('scout_course_duration') border-danger @enderror"
                                        placeholder="أدخل مدة الدورة" wire:model="scout_course_duration">
                                    @error('scout_course_duration')
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
                                        class="form-control @error('scout_course_year') border-danger @enderror"
                                        placeholder="أدخل عام انجاز الدورة" wire:model="scout_course_year">
                                    @error('scout_course_year')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                    class="fas fa-times"></i></button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i></button>
                        </div>
                    