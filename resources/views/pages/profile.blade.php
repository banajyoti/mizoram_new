@include('layouts.header')
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
<style>
    .readonly-field {
        background-color: #f3f4f6;
        /* Light gray background */
        border-color: #d1d5db;
        /* Border color for readonly fields */
        cursor: not-allowed;
        /* Change cursor to not-allowed to indicate no editing */
    }
</style>
@include('layouts.nav-2')
<div class="px-4 grow flex flex-col">
    <div class="flex gap-3">
        <div class="grow flex flex-col group">
            <div class="h-full flex flex-col items-center md:items-start">
                <a class="grow inline-block lg:w-full border border-gray-300 hover:border-blue-600 hover:shadow-md rounded-lg p-2 flex items-center hover:text-blue-600 font-medium transition-all text-xs"
                    href="{{ route('questionaries') }}">
                    <div class="h-8 w-8 bg-gray-200 rounded-full lg:mr-2 text-black text-xs flex"><span
                            class="m-auto text-sm TimesNR">Q</span></div>
                    <span class="hidden lg:inline-block">Questionaries</span>
                </a>
                <div class="flex h-6 ml-6">
                    <div class="h-full w-[2px] bg-gray-300 group-hover:bg-blue-600"></div>
                </div>
            </div>
        </div>
        <div class="grow flex flex-col group">
            <div class="h-full flex flex-col items-center md:items-start">
                <a class="grow inline-block lg:w-full border border-gray-300 hover:border-blue-600 hover:shadow-md rounded-lg p-2 flex items-center hover:text-blue-600 font-medium transition-all text-xs"
                    href="{{ route('preference') }}">
                    <div class="h-8 w-8 bg-gray-200 rounded-full lg:mr-2 text-black text-xs flex"><span
                            class="m-auto text-sm TimesNR"><i class="bi bi-arrow-down-up"></i></span></div>
                    <span class="hidden lg:inline-block">Post Preferences</span>
                </a>
                <div class="flex h-6 ml-6">
                    <div class="h-full w-[2px] bg-gray-300 group-hover:bg-blue-600"></div>
                </div>
            </div>
        </div>
        <div class="grow flex flex-col group">
            <div class="h-full flex flex-col items-center md:items-start">
                <a
                    class="grow inline-block lg:w-full border border-green-600 shadow-md rounded-lg p-2 flex items-center text-green-600 font-medium transition-all text-xs">
                    <div class="h-8 w-8 bg-gray-200 rounded-full lg:mr-2 text-black text-xs flex"><span
                            class="m-auto text-sm TimesNR"><i class="bi bi-person"></i></span></div>
                    <span class="hidden lg:inline-block">Profile</span>
                </a>
                <div class="flex h-6 ml-6">
                    <div class="h-full w-[2px] bg-green-600"></div>
                </div>
            </div>
        </div>
        <div class="grow flex flex-col group">
            <div class="h-full flex flex-col items-center md:items-start">
                <a class="grow inline-block lg:w-full border border-gray-300 hover:border-blue-600 hover:shadow-md rounded-lg p-2 flex items-center hover:text-blue-600 font-medium transition-all text-xs"
                    href="#">
                    <div class="h-8 w-8 bg-gray-200 rounded-full lg:mr-2 text-black text-xs flex"><span
                            class="m-auto text-sm TimesNR"><i class="bi bi-file-earmark-pdf"></i></span></div>
                    <span class="hidden lg:inline-block">Document's</span>
                </a>
                <div class="flex h-6 ml-6">
                    <div class="h-full w-[2px] bg-gray-300 group-hover:bg-blue-600"></div>
                </div>
            </div>
        </div>
        <div class="grow flex flex-col group">
			<div class="h-full flex flex-col items-center md:items-start">
				<a class="grow inline-block lg:w-full border border-gray-300 hover:border-blue-600 hover:shadow-md rounded-lg p-2 flex items-center hover:text-blue-600 font-medium transition-all text-xs" href="preview.php">
					<div class="h-8 w-8 bg-gray-200 rounded-full lg:mr-2 text-black text-xs flex"><span class="m-auto text-sm TimesNR"><i class="bi bi-eye"></i></span></div>
					<span class="hidden lg:inline-block">Preview</span>
				</a>
				<div class="flex h-6 ml-6">
					<div class="h-full w-[2px] bg-gray-300 group-hover:bg-blue-600"></div>
				</div>
			</div>
		</div>
		<div class="grow flex flex-col group">
			<div class="h-full flex flex-col items-center md:items-start">
				<a class="grow inline-block lg:w-full border border-gray-300 hover:border-blue-600 hover:shadow-md rounded-lg p-2 flex items-center hover:text-blue-600 font-medium transition-all text-xs" href="payment.php">
					<div class="h-8 w-8 bg-gray-200 rounded-full lg:mr-2 text-black text-xs flex"><span class="m-auto text-sm TimesNR">₹</span></div>
					<span class="hidden lg:inline-block">Payment</span>
				</a>
				<div class="flex h-6 ml-6">
					<div class="h-full w-[2px] bg-gray-300 group-hover:bg-blue-600"></div>
				</div>
			</div>
		</div>
    </div>
    <form id="profile-form" action="" method="POST">
        @csrf
        <div class="p-4 grow border border-gray-300 rounded-lg space-y-8">
            <p class="m-auto text-yellow-500 text-center rounded-md text-[0.65rem] md:text-sm font-medium">Candidate
                need to fillout all the mandatory <span class="text-red-600">*</span> marked feilds.</p>
            <div class="space-y-3">
                <p class="text-md text-center">Personal Details</p>
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-12 md:col-span-4 lg:col-span-3 xl:col-span-2">
                        <div class="h-full flex flex-col">
                            <label for="sal"
                                class="block mb-auto px-1 text-sm font-medium text-gray-600">Salutation</label>
                            <input type="text" id="sal" value="{{ $registerDetails->salutation }}"
                                class="bg-gray-200  border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                name="" value="Smt." required disabled />
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-4 lg:col-span-3 xl:col-span-2">
                        <div class="h-full flex flex-col">
                            <label for="can_name" class="block mb-auto px-1 text-sm font-medium text-gray-600">Candidate
                                Name</label>
                            <input type="text" id="can_name" value="{{ $registerDetails->first_name }}"
                                class="bg-gray-200  border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                name="" value="Xyaa Triwedi Shriwastav" required disabled />
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-4 lg:col-span-3 xl:col-span-2">
                        <div class="h-full flex flex-col">
                            <label for="cast_cat" class="block mb-auto px-1 text-sm font-medium text-gray-600">Cast/
                                Category</label>
                            <input type="text" id="cast_cat" value="{{ $registerDetails->c }}"
                                class="bg-gray-200  border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                name="" value="General" required disabled />
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-4 lg:col-span-3 xl:col-span-2">
                        <div class="h-full flex flex-col">
                            <label for="gender"
                                class="block mb-auto px-1 text-sm font-medium text-gray-600">Gender</label>
                            <input type="text" id="high_qual"
                                value="{{ $registerDetails->gender_id == 1 ? 'Male' : ($registerDetails->gender_id == 2 ? 'Female' : 'Others') }}"
                                class="bg-gray-200 border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                required disabled />
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-4 lg:col-span-3 xl:col-span-2">
                        <div class="h-full flex flex-col">
                            <label for="dob" class="block mb-auto px-1 text-sm font-medium text-gray-600">Date of
                                Birth</label>
                            <input type="text" id="dob" value="{{ $registerDetails->dob }}"
                                class="bg-gray-200  border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                name="" value="27-08-20000" required disabled />
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-4 lg:col-span-3 xl:col-span-2">
                        <div class="h-full flex flex-col">
                            <label for="age_asOn" class="block mb-auto px-1 text-sm font-medium text-gray-600">Age as
                                on 01-01-2025</label>
                            <input type="text" id="age_asOn" value="{{ $registerDetails->age }}"
                                class="bg-gray-200  border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                name="" value="24 Yr, 11 Mnt, 29 D" placeholder="" disabled />
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-4 lg:col-span-3 xl:col-span-2">
                        <div class="h-full flex flex-col">
                            <label for="father_name"
                                class="block mb-auto px-1 text-sm font-medium text-gray-600">Father Name</label>
                            <input type="text" id="father_name"
                                class="bg-gray-200  border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                name="" value="{{ $registerDetails->father_name }}" required disabled />
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-4 lg:col-span-3 xl:col-span-2">
                        <div class="h-full flex flex-col">
                            <label for="mother_name"
                                class="block mb-auto px-1 text-sm font-medium text-gray-600">Mother Name</label>
                            <input type="text" id="mother_name"
                                class="bg-gray-200  border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                name="" value="{{ $registerDetails->mother_name }}" required disabled />
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-4 lg:col-span-3 xl:col-span-2">
                        <div class="h-full flex flex-col">
                            <label for="high_qual"
                                class="block mb-auto px-1 text-sm font-medium text-gray-600">Highest
                                Qualification</label>
                            <input type="text" id="high_qual"
                                value="{{ $registerDetails->high_qual == 1 ? 'HSLC' : ($registerDetails->high_qual == 2 ? 'HS' : ($registerDetails->high_qual == 3 ? 'Diploma' : ($registerDetails->high_qual == 4 ? 'Graduation' : ($registerDetails->high_qual == 5 ? 'Post Graduation' : 'PhD')))) }}"
                                class="bg-gray-200 border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                required disabled />
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-4 lg:col-span-3 xl:col-span-2">
                        <div class="h-full flex flex-col">
                            <label for="p_number" class="block mb-auto px-1 text-sm font-medium text-gray-600">Phone
                                Number</label>
                            <input type="text" id="p_number" value="{{ $registerDetails->phone }}"
                                class="bg-gray-200  border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                name="" value="+91 86542 54XXX" required disabled />
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-4 lg:col-span-3 xl:col-span-2">
                        <div class="h-full flex flex-col">
                            <label for="alt_Pnumber" class="block mb-auto px-1 text-sm font-medium text-gray-600">Alt.
                                Phone Number</label>
                            <input type="" id="alt_Pnumber" onkeypress="return isNumber(event)"
                                minlength="10" maxlength="10"
                                class="bg-gray-50  border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                name="alt_mobile" value="{{ old('alt_mobile', $userProfiles->alt_mobile ?? '') }}"
                                placeholder="Alternate number" required />
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-4 lg:col-span-3 xl:col-span-2">
                        <div class="h-full flex flex-col">
                            <label for="email"
                                class="block mb-auto px-1 text-sm font-medium text-gray-600">Email</label>
                            <input type="text" id="email" value="{{ $registerDetails->email }}"
                                class="bg-gray-200  border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                name="" value="dummieemail432@domain.com" required disabled />
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-4 lg:col-span-3 xl:col-span-2">
                        <div class="h-full flex flex-col">
                            <label for="ex-ser" class="block mb-auto px-1 text-sm font-medium text-gray-600">Are you
                                an Ex-Serviceman?</label>
                            <input type="text" id="ex-ser"
                                value="{{ $registerDetails->ex_ser == 1 ? 'YES' : 'NO' }}"
                                class="bg-gray-200  border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                name="" value="YES" required disabled />
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-8 lg:col-span-6 xl:col-span-4">
                        <div class="h-full flex flex-col">
                            <label for="X-inMizo" class="block mb-auto px-1 text-sm font-medium text-gray-600">Have
                                you completed your Class-X Standard (HSLC) in Mizoram?</label>
                            <input type="text" id="X-inMizo"
                                value="{{ $registerDetails->X_inMizo == 1 ? 'YES' : 'NO' }}"
                                class="bg-gray-200  border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                name="" value="NO" required disabled />
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-4 lg:col-span-3 xl:col-span-2">
                        <div class="h-full flex flex-col">
                            <label for="religion"
                                class="block mb-auto px-1 text-sm font-medium text-gray-600">Religion<span
                                    class="ps-1 text-red-500">*</span></label>
                            <select id="religion" name="religion"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 @error('religion') is-invalid @enderror">
                                <option selected disabled>select</option>
                                <option value="1"
                                    {{ old('religion', $userProfiles->religion ?? '') == '1' ? 'selected' : '' }}>Hindu
                                </option>
                                <option value="2"
                                    {{ old('religion', $userProfiles->religion ?? '') == '2' ? 'selected' : '' }}>
                                    Muslim</option>
                                <option value="3"
                                    {{ old('religion', $userProfiles->religion ?? '') == '3' ? 'selected' : '' }}>
                                    Christian</option>
                                <option value="4"
                                    {{ old('religion', $userProfiles->religion ?? '') == '4' ? 'selected' : '' }}>Sikh
                                </option>
                                <option value="5"
                                    {{ old('religion', $userProfiles->religion ?? '') == '5' ? 'selected' : '' }}>
                                    Buddhist</option>
                                <option value="6"
                                    {{ old('religion', $userProfiles->religion ?? '') == '6' ? 'selected' : '' }}>Jain
                                </option>
                                <option value="7"
                                    {{ old('religion', $userProfiles->religion ?? '') == '7' ? 'selected' : '' }}>Other
                                    Religions</option>
                            </select>
                            @error('religion')
                                <div class="text-sm text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-4 lg:col-span-3 xl:col-span-2">
                        <div class="h-full flex flex-col">
                            <label for="nation"
                                class="block mb-auto px-1 text-sm font-medium text-gray-600">Nationality<span
                                    class="ps-1 text-red-500">*</span></label>
                            <input type="text" id="nation"
                                class="bg-gray-50  border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                name="nationality" value="{{ old('nationality', $userProfiles->nationality ?? '') }}"
                                placeholder="Nationality" required />
                            @error('nationality')
                                <div class="text-sm text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-4 lg:col-span-3 xl:col-span-2">
                        <div class="h-full flex flex-col">
                            <label for="adhar" class="block mb-auto px-1 text-sm font-medium text-gray-600">Aadhaar
                                Number</label>
                            <input type="text" id="adhar" minlength="12" maxlength="12"
                                onkeypress="return isNumber(event)"
                                class="bg-gray-50 border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                name="adhar_no" value="{{ old('adhar_no', $userProfiles->adhar_no ?? '') }}"
                                placeholder="Aadhaar Number" required />
                            @error('adhar_no')
                                <div class="text-sm text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-3">
                <p class="text-md text-center">Communication Details</p>
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-12">
                        <div class="h-full flex flex-col">
                            <p class=" text-xs font-semibold text-gray-400">Permanent Address</p>
                        </div>
                    </div>

                    <!-- Street 1 -->
                    <div class="col-span-12 md:col-span-12 lg:col-span-6 xl:col-span-3">
                        <div class="h-full flex flex-col">
                            <label for="street1" class="block mb-auto px-1 text-sm font-medium text-gray-600">Address
                                Line
                                1<span class="ps-1 text-red-500">*</span></label>
                            <input type="text" id="p_address1" name="permanent_address[street1]"
                                value="{{ old('permanent_address.street1', $userProfiles->p_address1 ?? '') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                placeholder="Street 1" required />
                            @error('permanent_address.street1')
                                <div class="text-sm text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Street 2 -->
                    <div class="col-span-12 md:col-span-12 lg:col-span-6 xl:col-span-3">
                        <div class="h-full flex flex-col">
                            <label for="street2" class="block mb-auto px-1 text-sm font-medium text-gray-600">Address
                                Line
                                2</label>
                            <input type="text" id="p_address2" name="permanent_address[street2]"
                                value="{{ old('permanent_address.street2', $userProfiles->p_address2 ?? '') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                placeholder="Street 2" />
                            @error('permanent_address.street2')
                                <div class="text-sm text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- State -->
                    <div class="col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-2">
                        <div class="h-full flex flex-col">
                            <label for="State" class="block mb-auto px-1 text-sm font-medium text-gray-600">
                                State<span class="ps-1 text-red-500">*</span>
                            </label>
                            <select id="p_state_id" name="permanent_address[state_id]"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                required>
                                <option value="" selected disabled>Select</option>
                                @foreach ($states as $state)
                                    <option value="{{ $state->id }}"
                                        {{ old('permanent_address.state_id', $userProfiles && $userProfiles->p_state_id ? $userProfiles->p_state_id : '') == $state->id ? 'selected' : '' }}>
                                        {{ $state->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('permanent_address.state_id')
                                <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- District -->
                    <div class="col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-2 hidden" id="district-container">
                        <div class="h-full flex flex-col">
                            <label for="district" class="block mb-auto px-1 text-sm font-medium text-gray-600">
                                District<span class="ps-1 text-red-500">*</span>
                            </label>
                            <select id="p_district_id" name="permanent_address[district]"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                required>
                                <option value="">Select</option>
                                @foreach ($districts as $district)
                                    <option value="{{ $district->id }}"
                                        {{ old('permanent_address.district', $userProfiles->p_district_id ?? '') == $district->id ? 'selected' : '' }}>
                                        {{ $district->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('permanent_address.district')
                                <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Text box for District (initially hidden) -->
                    <div class="col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-2 hidden"
                        id="district-textbox-container">
                        <div class="h-full flex flex-col">
                            <label for="district-text" class="block mb-auto px-1 text-sm font-medium text-gray-600">
                                District (Please specify)<span class="ps-1 text-red-500">*</span>
                            </label>
                            <input type="text" id="district-text" name="permanent_address[district_text]"
                                value="{{ old('permanent_address.district_text', $userProfiles->p_other_district ?? '') }}"
                                onkeydown="return /[a-z ]/i.test(event.key)"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" />

                        </div>
                    </div>

                    <!-- Police Station -->
                    <div class="col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-2">
                        <div class="h-full flex flex-col">
                            <label for="police_station"
                                class="block mb-auto px-1 text-sm font-medium text-gray-600">Police Station<span
                                    class="ps-1 text-red-500">*</span></label>
                            <input type="text" id="p_police_id" name="permanent_address[police_station]"
                                onkeydown="return /[a-z ]/i.test(event.key)"
                                value="{{ old('permanent_address.police_station', $userProfiles->p_police_id ?? '') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                placeholder="Police Station" required />
                            @error('permanent_address.police_station')
                                <div class="text-sm text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Post Office -->
                    <div class="col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-3">
                        <div class="h-full flex flex-col">
                            <label for="post_office" class="block mb-auto px-1 text-sm font-medium text-gray-600">Post
                                Office<span class="ps-1 text-red-500">*</span></label>
                            <input type="text" id="p_post_office" name="permanent_address[post_office]"
                                onkeydown="return /[a-z ]/i.test(event.key)"
                                value="{{ old('permanent_address.post_office', $userProfiles->p_post_office ?? '') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                placeholder="Post Office" required />
                            @error('permanent_address.post_office')
                                <div class="text-sm text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Pincode -->
                    <div class="col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-3">
                        <div class="h-full flex flex-col">
                            <label for="pincode"
                                class="block mb-auto px-1 text-sm font-medium text-gray-600">Pincode<span
                                    class="ps-1 text-red-500">*</span></label>
                            <input type="text" id="p_pin" name="permanent_address[pincode]" maxlength="6"
                                minlength="6" onkeypress="return isNumber(event)"
                                value="{{ old('permanent_address.pincode', $userProfiles->p_pin ?? '') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                placeholder="Pincode" required />
                            @error('permanent_address.pincode')
                                <div class="text-sm text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="inline-block flex items-center">
                    <input type="checkBox" id="checkBox"
                        class="mt-0.5 w-5 h-5 rounded-md text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                    <label for="address_same" class="ms-2 text-sm font text-gray-900">
                        Please check if Permanent Address is the same as Correspondence Address.
                    </label>
                </div>

                <!-- Correspondence Address Fields -->
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-12">
                        <div class="h-full flex flex-col">
                            <p class="text-xs font-semibold text-gray-400">Correspondence Address</p>
                        </div>
                    </div>

                    <!-- Correspondence Street 1 -->
                    <div class="col-span-12 md:col-span-12 lg:col-span-6 xl:col-span-3">
                        <div class="h-full flex flex-col">
                            <label for="C-street1"
                                class="block mb-auto px-1 text-sm font-medium text-gray-600">Address Line
                                1<span class="ps-1 text-red-500">*</span></label>
                            <input type="text" id="c_address1" name="correspondence_address[street1]"
                                value="{{ old('permanent_address.street1', $userProfiles->c_address1 ?? '') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                placeholder="Street 1" required />
                            @error('correspondence_address.street1')
                                <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Correspondence Street 2 -->
                    <div class="col-span-12 md:col-span-12 lg:col-span-6 xl:col-span-3">
                        <div class="h-full flex flex-col">
                            <label for="C-street2"
                                class="block mb-auto px-1 text-sm font-medium text-gray-600">Address Line
                                2</label>
                            <input type="text" id="c_address2" name="correspondence_address[street2]"
                                value="{{ old('permanent_address.street2', $userProfiles->c_address2 ?? '') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                placeholder="Street 2" />
                            @error('correspondence_address.street2')
                                <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- State -->
                    <div class="col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-2">
                        <div class="h-full flex flex-col">
                            <label for="State"
                                class="block mb-auto px-1 text-sm font-medium text-gray-600">State<span
                                    class="ps-1 text-red-500">*</span></label>
                            <select id="c_state_id" name="correspondence_address[state_id]"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                required>
                                <option value="" selected disabled>Select</option>
                                @foreach ($states as $state)
                                    <option value="{{ $state->id }}"
                                        {{ old('correspondence_address.state_id', $userProfiles->c_state_id ?? '') == $state->id ? 'selected' : '' }}>
                                        {{ $state->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('correspondence_address.state_id')
                                <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- District -->
                    <div class="col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-2" id="c_district-container">
                        <div class="h-full flex flex-col">
                            <label for="district" class="block mb-auto px-1 text-sm font-medium text-gray-600">
                                District<span class="ps-1 text-red-500">*</span>
                            </label>
                            <select id="c_district_id" name="correspondence_address[district]"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                required>
                                <option value="" selected disabled>Select</option>
                                @foreach ($districts as $district)
                                    <option value="{{ $district->id }}"
                                        {{ old('correspondence_address.district', $userProfiles->c_district_id ?? '') == $district->id ? 'selected' : '' }}>
                                        {{ $district->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('correspondence_address.district')
                                <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Text box for District (initially hidden) -->
                    <div class="col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-2 hidden"
                        id="c_district-textbox-container">
                        <div class="h-full flex flex-col">
                            <label for="district-text" class="block mb-auto px-1 text-sm font-medium text-gray-600">
                                District (Please specify)<span class="ps-1 text-red-500">*</span>
                            </label>
                            <input type="text" id="c_district-text" name="correspondence_address[district_text]"
                                value="{{ old('correspondence_address.district_text', $userProfiles->c_other_district ?? '') }}"
                                onkeydown="return /[a-z ]/i.test(event.key)"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" />
                        </div>
                    </div>

                    <!-- Correspondence Police Station -->
                    <div class="col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-2">
                        <div class="h-full flex flex-col">
                            <label for="C-police_station"
                                class="block mb-auto px-1 text-sm font-medium text-gray-600">Police Station<span
                                    class="ps-1 text-red-500">*</span></label>
                            <input type="text" id="c_police_id" name="correspondence_address[police_station]"
                                onkeydown="return /[a-z ]/i.test(event.key)"
                                value="{{ old('permanent_address.police_station', $userProfiles->c_police_id ?? '') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                placeholder="Police Station" required />
                            @error('correspondence_address.police_station')
                                <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Correspondence Post Office -->
                    <div class="col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-3">
                        <div class="h-full flex flex-col">
                            <label for="C-post_office"
                                class="block mb-auto px-1 text-sm font-medium text-gray-600">Post Office<span
                                    class="ps-1 text-red-500">*</span></label>
                            <input type="text" id="c_post_office" name="correspondence_address[post_office]"
                                onkeydown="return /[a-z ]/i.test(event.key)"
                                value="{{ old('permanent_address.post_office', $userProfiles->c_post_office ?? '') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                placeholder="Post Office" required />
                            @error('correspondence_address.post_office')
                                <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Correspondence Pincode -->
                    <div class="col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-3">
                        <div class="h-full flex flex-col">
                            <label for="C-pincode"
                                class="block mb-auto px-1 text-sm font-medium text-gray-600">Pincode<span
                                    class="ps-1 text-red-500">*</span></label>
                            <input type="text" id="c_pin" name="correspondence_address[pincode]"
                                maxlength="6" minlength="6" onkeypress="return isNumber(event)"
                                value="{{ old('permanent_address.pincode', $userProfiles->c_pin ?? '') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                placeholder="Pincode" required />
                            @error('correspondence_address.pincode')
                                <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="space-y-3">
                    <p class="text-md text-center">Education Qualification</p>

                    <!-- School and Education Details -->
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-3">
                            <div class="h-full flex flex-col">
                                <label for="board_school"
                                    class="block mb-auto px-1 text-sm font-medium text-gray-600">Board/ School<span
                                        class="ps-1 text-red-500">*</span></label>
                                <input type="text" id="board_school" name="education[board_school]"
                                    onkeydown="return /[a-z ]/i.test(event.key)"
                                    value="{{ old('permanent_address.board_school', $userProfiles->board_id ?? '') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                    placeholder="Board/ School" required />
                                @error('education.board_school')
                                    <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-3">
                            <div class="h-full flex flex-col">
                                <label for="school_name"
                                    class="block mb-auto px-1 text-sm font-medium text-gray-600">School Name</label>
                                <input type="text" id="school_name" name="education[school_name]"
                                    onkeydown="return /[a-z ]/i.test(event.key)"
                                    value="{{ old('permanent_address.school_name', $userProfiles->school_name ?? '') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                    placeholder="School Name" />
                                @error('education.school_name')
                                    <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-2 xl:col-span-2">
                            <div class="h-full flex flex-col">
                                <label for="roll_no"
                                    class="block mb-auto px-1 text-sm font-medium text-gray-600">Roll
                                    Number<span class="ps-1 text-red-500">*</span></label>
                                <input type="text" id="roll_no" name="education[roll_no]"
                                    value="{{ old('permanent_address.roll_no', $userProfiles->roll_no ?? '') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                    placeholder="Roll Number" required />
                                @error('education.roll_no')
                                    <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-2 xl:col-span-2">
                            <div class="h-full flex flex-col">
                                <label for="yop"
                                    class="block mb-auto px-1 text-sm font-medium text-gray-600">Year of
                                    Passing<span class="ps-1 text-red-500">*</span></label>
                                <input type="text" id="yop" name="education[yop]"
                                    onkeypress="return isNumber(event)" minlength="4" maxlength="4"
                                    value="{{ old('permanent_address.yop', $userProfiles->year_of_passing ?? '') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                    placeholder="Year of Passing" required />
                                @error('education.yop')
                                    <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-span-12 md:col-span-4 lg:col-span-2 xl:col-span-2">
                            <div class="h-full flex flex-col">
                                <label for="percentage"
                                    class="block mb-auto px-1 text-sm font-medium text-gray-600">Percentage %<span
                                        class="ps-1 text-red-500">*</span></label>
                                <input type="text" id="percentage" name="education[percentage]"
                                    value="{{ old('permanent_address.percentage', $userProfiles->percentage ?? '') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                    placeholder="Percentage %" required />
                                @error('education.percentage')
                                    <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="mt-auto px-4 flex items-center">
    <a class="inline-block bg-gray-600 hover:bg-gray-700 text-white p-2 rounded-md Nunito"
        href="{{ route('preference') }}"><i class="bi bi-arrow-left-short pr-1"></i>Go Back</a>
    <a id="save-proceed-btn"
        class="ml-auto inline-block bg-green-600 hover:bg-green-700 text-white p-2 rounded-md Nunito"><i
            class="bi bi-check-all pr-1"></i>Save & proceede</a>
</div>
@include('layouts.footer')
@include('layouts.custom-scripts.profileScript')
