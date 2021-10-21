    <div class="mb-3 row">
        <div class="col-6">
            <div class="form-group d-flex flex-column align-items-start">
                <label class="d-flex justify-content-start">{{ __('personalInfo.Personal photo') }}</label><br>
                <button type="button" class="btn btn-dark"
                    onclick="document.getElementById('scoutProfilePicture').click()"
                    {{ $scoutProfilePicture == true || $fileName !== 'avatar.jpg' ? 'disabled' : '' }}>
                    {{ __('personalInfo.Choose a picture') }}</button><br>
                <input type="file" accept="image/*" wire:model="scoutProfilePicture" id="scoutProfilePicture" hidden>
                @error('scoutProfilePicture')
                    <div class="text-danger d-flex justify-content-start">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        @if ($scoutProfilePicture)
            <div class="text-center col-6">
                <div wire:loading wire:target="scoutProfilePicture" class="text-left"><i
                        class="mt-4 fas fa-spinner fa-pulse h1"></i></div>
                <img src="{{ $scoutProfilePicture->temporaryUrl() }}" class="rounded img-responsive"
                    alt="scout profile picture" style="width: 100px; height:100px" wire:loading.remove
                    wire:target="scoutProfilePicture">
                <div class="mt-1">
                    <button type="button" class="btn btn-danger btn-sm" wire:click.prevent="removeProfilePicture">
                        <i class="fas fa-times" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        @else
            <div class="text-center col-6">
                <div wire:loading wire:target="scoutProfilePicture"><i class="mt-4 fas fa-spinner fa-pulse h1"></i>
                </div>
                <img src="{{ asset('images/profile_pictures/' . $fileName) }}" class="rounded img-responsive"
                    alt="scout profile picture" style="width: 100px; height:100px" wire:loading.remove
                    wire:target="scoutProfilePicture">
                @if ($fileName !== 'avatar.jpg')
                    <div class="mt-1">
                        <button type="button" class="btn btn-danger btn-sm" wire:click.prevent="removeProfilePicture">
                            <i class="fas fa-times" aria-hidden="true"></i>
                        </button>
                    </div>

                @endif
            </div>
        @endif

    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="d-flex justify-content-start">{{ __('personalInfo.Name') }}</label>
                <input type="text" class="form-control @error('scout_first_name') border-danger @enderror"
                    placeholder="{{ __('personalInfo.Enter name') }}" wire:model="scout_first_name">
                @error('scout_first_name')
                    <div class="text-danger d-flex justify-content-start">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="d-flex justify-content-start">{{ __('personalInfo.Lastname') }}</label>
                <input type="text" class="form-control @error('scout_last_name') border-danger @enderror"
                    placeholder="{{ __('personalInfo.Enter lastname') }}" wire:model="scout_last_name">
                @error('scout_last_name')
                    <div class="text-danger d-flex justify-content-start">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="d-flex justify-content-start">{{ __('personalInfo.Father name') }}</label>
                <input type="text" class="form-control @error('scout_father_name') border-danger @enderror"
                    placeholder="{{ __('personalInfo.Enter father name') }}" wire:model="scout_father_name">
                @error('scout_father_name')
                    <div class="text-danger d-flex justify-content-start">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="d-flex justify-content-start">{{ __('personalInfo.Mother name') }}</label>
                <input type="text" class="form-control @error('scout_mother_name') border-danger @enderror"
                    placeholder="{{ __('personalInfo.Enter mother name') }}" wire:model="scout_mother_name">
                @error('scout_mother_name')
                    <div class="text-danger d-flex justify-content-start">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="d-flex justify-content-start">{{ __('personalInfo.Gender') }}</label>
                <select class="form-control @error('scout_gender') border-danger @enderror" wire:model="scout_gender">
                    <option value="" selected>{{ __('personalInfo.Choose gender') }}</option>
                    <option value="{{ __('personalInfo.Male') }}">{{ __('personalInfo.Male') }}</option>
                    <option value="{{ __('personalInfo.Female') }}">{{ __('personalInfo.Female') }}</option>
                </select>
                @error('scout_gender')
                    <div class="text-danger d-flex justify-content-start">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="d-flex justify-content-start">{{ __('personalInfo.Birth date') }}</label>
                <input type="text" class="date form-control @error('scout_birthdate') border-danger @enderror"
                    placeholder="{{ __('personalInfo.Enter birth date') }}" wire:model="scout_birthdate"
                    onchange="this.dispatchEvent(new InputEvent('input'))">
                @error('scout_birthdate')
                    <div class="text-danger d-flex justify-content-start">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="d-flex justify-content-start">{{ __('personalInfo.National number') }}</label>
                <input type="text" class="form-control @error('scout_national_no') border-danger @enderror"
                    placeholder="{{ __('personalInfo.Enter national number') }}" wire:model="scout_national_no">
                @error('scout_national_no')
                    <div class="text-danger d-flex justify-content-start">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="d-flex justify-content-start">{{ __('personalInfo.Email') }}</label>
                <input type="text" class="form-control @error('scout_email') border-danger @enderror"
                    placeholder="{{ __('personalInfo.Enter Email') }}" wire:model="scout_email">
                @error('scout_email')
                    <div class="text-danger d-flex justify-content-start">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="d-flex justify-content-start">{{ __('personalInfo.Mobile phone') }}</label>
                <input type="text" class="form-control @error('scout_mobile_phone') border-danger @enderror"
                    placeholder="{{ __('personalInfo.Enter mobile phone') }}" wire:model="scout_mobile_phone">
                @error('scout_mobile_phone')
                    <div class="text-danger d-flex justify-content-start">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="d-flex justify-content-start"
                    class="d-block">{{ __('personalInfo.Land phone') }}</label>
                <input type="text" class="form-control @error('scout_home_phone') border-danger @enderror"
                    placeholder="{{ __('personalInfo.Enter land phone') }}" wire:model="scout_home_phone">
                @error('scout_home_phone')
                    <div class="text-danger d-flex justify-content-start">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="d-flex justify-content-start">{{ __('personalInfo.Scout number') }}</label>
                <input type="text" class="form-control @error('scout_number') border-danger @enderror"
                    placeholder="{{ __('personalInfo.Enter scout number') }}" wire:model="scout_number">
                @error('scout_number')
                    <div class="text-danger d-flex justify-content-start">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="d-flex justify-content-start">{{ __('personalInfo.Affiliation date') }}</label>
                <input type="text" class="date form-control @error('scout_affiliation_date') border-danger @enderror"
                    placeholder="{{ __('personalInfo.Enter affiliation date') }}" wire:model="scout_affiliation_date"
                    onchange="this.dispatchEvent(new InputEvent('input'))">
                @error('scout_affiliation_date')
                    <div class="text-danger d-flex justify-content-start">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="d-flex justify-content-start">{{ __('personalInfo.Title') }}</label>
                <select class="form-control  @error('scout_title') border-danger @enderror" wire:model="scout_title">
                    <option value="" selected>{{ __('personalInfo.Choose title') }}</option>
                    <option value="{{ __('personalInfo.Male leader') }}">{{ __('personalInfo.Male leader') }}
                    </option>
                    <option value="{{ __('personalInfo.Female leader') }}">{{ __('personalInfo.Female leader') }}
                    </option>
                    <option value="{{ __('personalInfo.Rambling') }}">{{ __('personalInfo.Rambling') }}</option>
                    <option value="{{ __('personalInfo.Major') }}">{{ __('personalInfo.Major') }}</option>
                </select>
                @error('scout_title')
                    <div class="text-danger d-flex justify-content-start">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="d-flex justify-content-start">{{ __('personalInfo.Regiment') }}</label>
                @if (auth()->user()->user_type == 'admin')
                    <input type="text" class="form-control" wire:model="scout_regiment" disabled>
                @elseif (auth()->user()->user_type == 'superUser')
                    <select class="form-control  @error('scout_regiment') border-danger @enderror"
                        wire:model="scout_regiment">
                        <option value="" selected>{{ __('personalInfo.Choose regiment') }}</option>
                        @if ($regiments)
                            @foreach ($regiments as $regiment)
                                <option value="{{ $regiment->id }}">{{ $regiment->regiment_name }}
                                </option>
                            @endforeach
                        @endif

                    </select>
                    @error('scout_regiment')
                        <div class="text-danger d-flex justify-content-start">
                            {{ $message }}
                        </div>
                    @enderror
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="d-flex justify-content-start">{{ __('personalInfo.Marital status') }}</label>
                <select class="form-control @error('scout_marital_status') border-danger @enderror"
                    wire:model="scout_marital_status">
                    <option value="" selected>{{ __('personalInfo.Choose marital status') }}</option>
                    <option value="{{ __('personalInfo.Single') }}">{{ __('personalInfo.Single') }}</option>
                    <option value="{{ __('personalInfo.Married') }}">{{ __('personalInfo.Married') }}</option>
                    <option value="{{ __('personalInfo.Divorced') }}">{{ __('personalInfo.Divorced') }}</option>
                    <option value="{{ __('personalInfo.Widower') }}">{{ __('personalInfo.Widower') }}</option>
                </select>
                @error('scout_marital_status')
                    <div class="text-danger d-flex justify-content-start">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <div class="d-flex justify-content-start">
                    <label>{{ __('personalInfo.Number of children') }}</label>
                    <span>({{ __('personalInfo.Enter 0 if there is none') }})</span>
                </div>
                <input type="text" class="form-control @error('scout_no_of_children') border-danger @enderror"
                    placeholder="{{ __('personalInfo.Enter number of children') }}"
                    wire:model="scout_no_of_children">
                @error('scout_no_of_children')
                    <div class="text-danger d-flex justify-content-start">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="d-flex justify-content-start">{{ __('personalInfo.Name in English') }}</label>
                <input type="text" class="form-control @error('scout_name_en') border-danger @enderror"
                    placeholder="{{ __('personalInfo.Enter name in English') }}" wire:model="scout_name_en">
                @error('scout_name_en')
                    <div class="text-danger d-flex justify-content-start">
                        @if ($message == 'هذا الحقل مطلوب')
                            {{ $message }}
                        @else
                            {{ __('personalInfo.Name should be written in English') }}
                        @endif
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="d-flex justify-content-start">{{ __('personalInfo.Government') }}</label>
                <select class="form-control  @error('scout_government') border-danger @enderror"
                    wire:model="scout_government">
                    <option value="" selected>{{ __('personalInfo.Choose government') }}</option>
                    <option value="إدلب">إدلب</option>
                    <option value="الحسكة">الحسكة</option>
                    <option value="حلب">حلب</option>
                    <option value="حماة">حماة</option>
                    <option value="حمص">حمص</option>
                    <option value="دير الزور">دير الزور</option>
                    <option value="دمشق">دمشق</option>
                    <option value="درعا">درعا</option>
                    <option value="الرقة">الرقة</option>
                    <option value="ريف دمشق">ريف دمشق</option>
                    <option value="السويداء">السويداء</option>
                    <option value="طرطوس">طرطوس</option>
                    <option value="القنيطرة">القنيطرة</option>
                    <option value="اللاذقية">اللاذقية</option>
                </select>
                @error('scout_government')
                    <div class="text-danger d-flex justify-content-start">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="d-flex justify-content-start">{{ __('personalInfo.City') }}</label>
                <input type="text" class="form-control @error('scout_city') border-danger @enderror"
                    placeholder="{{ __('personalInfo.Enter city') }}" wire:model="scout_city">
                @error('scout_city')
                    <div class="text-danger d-flex justify-content-start">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="d-flex justify-content-start">{{ __('personalInfo.Address') }}</label>
                <input type="text" class="form-control @error('scout_address') border-danger @enderror"
                    name="scout_address" placeholder="{{ __('personalInfo.Enter address') }}"
                    wire:model="scout_address">
                @error('scout_address')
                    <div class="text-danger d-flex justify-content-start">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
