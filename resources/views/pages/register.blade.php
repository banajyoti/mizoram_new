@include('layouts.header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Registration Form</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Flatpickr CSS -->
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">

    <!-- Tailwind CSS (via CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Include Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- Your other scripts -->
</head>
<div class="grow md:p-4 grid lg:grid-cols-5 gap-3">
    <div class="lg:col-span-3 borde">
        <div class="h-full p-2 space-y-3">
            <div class=" text-center">
                <span class="text-xs poppins font-medium bg-yellow-400 px-2 py-1 rounded-lg block">
                    Candidates are requested to go through the complete advertisement and read the complete instructions
                    before applying.
                    ( <a class="pl-1 text-[0.65rem] font-semibold text-blue-600 hover:text-blue-700" href="#"
                        target="_blank"><i class="bi bi-download text-[0.65rem] pr-1"></i>ADVERTISEMENT</a> )
                </span>
            </div>
            <p class="text-xl Nunito">Instructions</p>
            <div class="">
                <ol class="list-decimal list-inside text-sm space-y-4">
                    <li class="space-y-2">
                        <span class="font-medium pr-1">For Passport Size Photograph:</span>
                        <div class="ps-3">
                            <ul class="list-disc list-inside space-y-2">
                                <li>
                                    Photograph must be in colour and must be in white background and must have been
                                    recently taken.
                                </li>
                                <li>
                                    The maximum file size should be 450 kb | <span class="font-semibold">Format: JPEG,
                                        JPG & PNG.</span>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="space-y-2">
                        <span class="font-medium pr-1">For Signature:</span>
                        <div class="ps-3">
                            <ul class="list-disc list-inside space-y-2">
                                <li>
                                    Signature must be taken with a <span class="font-semibold">black</span> or <span
                                        class="font-semibold">dark blue</span> ink on a <span
                                        class="font-semibold">white paper</span>.
                                </li>
                                <li>
                                    The maximum file size should be 100 kb | <span class="font-semibold">Format: JPEG,
                                        JPG & PNG.</span>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="space-y-2">
                        <span class="font-medium pr-1">Documents to be uploaded:</span>
                        <div class="ps-3">
                            <ul class="list-disc list-inside space-y-2">
                                <li>
                                    Certificate of proof of age. <span class="font-semibold">(Certificate of
                                        H.S.L.C./ Birth Certificate)
                                </li>
                                <li>
                                    Marksheet of H.S.L.C
                                </li>
                                <li>
                                    Certificate of Caste from Competent Authority. <span class="font-semibold">NO CASTE
                                        CERTIFICATE ISSUED BY OTHER STATES WILL BE ACCEPTED</span>
                                </li>
                                <li>
                                    Certificate of NCC from Competent Authority (if applicable).
                                </li>
                                <li>
                                    Home Guards Training Certificate issued by Competent Authority (if applicable).
                                </li>
                                <li>
                                    In case of Ex-serviceman, he/ she must upload:
                                    <div class="ps-3">
                                        <ol class="list-decimal list-inside">
                                            <li>
                                                Copy of Discharged Book.
                                            </li>
                                        </ol>
                                    </div>
                                </li>
                                <li>
                                    Certificate of ITI certificate / Experience Certificate
                                    (if applicable).
                                </li>
                                <li>
                                    Meritorious Sports Certificate Issued by Competent Authority (if applicable).
                                </li>
                            </ul>
                        </div>
                    </li>
                </ol>
            </div>
            <p class="m-0 text-red-600 text-sm">Note: The maximum file size of the scanned document should be 200 kb |
                Format: PDF </p>
        </div>
    </div>
    <div class="lg:col-span-2 borde border-green-500">
        <div class="h-full p-2 space-y-6">
            <div class="flex items-center justify-between">
                <p class="m-0 text-xl text-blue-500 Nunito">Registration form</p>
                <p class="m-0 text-xs text-green-500 font-medium flex items-center"><i
                        class="bi bi-circle-fill text-[0.45rem] pe-1"></i> Registration Online</p>
            </div>
            <p class="text-xs text-red-500 font-medium">
                Note: Candidates must register in the application portal once for all the advertisements. However, the
                candidature will be cancelled who generate multiple Recruitment IDs.
            </p>
            <p class="text-xs font-medium text-center">
                All<span class="px-1 text-red-500 text-black text-base">*</span>marked fields are mendatory.
            </p>
            <form id="registrationForm" method="POST">
                @csrf
                <div class="grid grid-cols-6 sm:grid-cols-12 gap-4">
                    <div class="col-span-4">
                        <div class="h-full flex flex-col">
                            <label for="sal"
                                class="block mb-auto px-1 text-sm font-medium text-gray-600">Salutation<span
                                    class="ps-1 text-red-500">*</span></label>
                            <select id="sal" name="salutation"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                                <option selected disabled>select</option>
                                <option value="Sri">Sri.</option>
                                <option value="Mr">Mr.</option>
                                <option value="Mrs">Mrs.</option>
                                <option value="Ms">Ms.</option>
                                <option value="Md">Md.</option>
                            </select>
                            @error('salutation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-8">
                        <div class="h-full flex flex-col">
                            <label for="full_name"
                                class="block mb-auto px-1 text-sm font-medium text-gray-600">Candidate Name<span
                                    class="ps-1 text-red-500">*</span></label>
                            <input type="text" id="full_name" onkeydown="return /[a-z ]/i.test(event.key)"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                name="full_name" value="{{ old('full_name') }}" placeholder="First Name" required />
                        </div>
                        @error('full_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- <div class="col-span-3">
                        <div class="h-full flex flex-col">
                            <label for="middle_name" class="block mb-auto px-1 text-sm font-medium text-gray-600">Middle
                                Name</label>
                            <input type="text" id="middle_name" onkeydown="return /[a-z]/i.test(event.key)"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                name="middle_name" value="{{ old('middle_name') }}" placeholder="Middle Name"
                                required />
                            @error('middle_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div> --}}
                    {{-- <div class="col-span-3">
                        <div class="h-full flex flex-col">
                            <label for="last_name" class="block mb-auto px-1 text-sm font-medium text-gray-600">Last
                                Name<span class="ps-1 text-red-500">*</span></label>
                            <input type="text" id="last_name" onkeydown="return /[a-z]/i.test(event.key)"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" required />
                            @error('last_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div> --}}
                    <div class="col-span-6">
                        <div class="h-full flex flex-col">
                            <label for="father_name" class="block mb-auto px-1 text-sm font-medium text-gray-600">Father
                                Name<span class="ps-1 text-red-500">*</span></label>
                            <input type="text" id="father_name" onkeydown="return /[a-z ]/i.test(event.key)"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                name="father_name" value="{{ old('father_name') }}" placeholder="Father Name"
                                required />
                            @error('father_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-6">
                        <div class="h-full flex flex-col">
                            <label for="mother_name" class="block mb-auto px-1 text-sm font-medium text-gray-600">Mother
                                Name<span class="ps-1 text-red-500">*</span></label>
                            <input type="text" id="mother_name" onkeydown="return /[a-z ]/i.test(event.key)"
                                class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                name="mother_name" value="{{ old('mother_name') }}" placeholder="Mother Name"
                                required />
                            @error('mother_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-6 sm:col-span-12">
                        <div class="h-full flex flex-col">
                            <label for="permanent_residence"
                                class="block mb-auto px-1 text-sm font-medium text-gray-600">
                                Are you a permanent resident of Mizoram? <span class="ps-1 text-red-500">*</span>
                            </label>
                            <div class="flex space-x-4 mt-2">
                                <!-- Yes option -->
                                <div class="flex items-center">
                                    <input type="radio" id="yes" name="permanent_residence" value="1"
                                        class="mr-2" onclick="toggleCategoryField()">
                                    <label for="yes" class="text-sm text-gray-600">Yes</label>
                                </div>
                                <!-- No option -->
                                <div class="flex items-center">
                                    <input type="radio" id="no" name="permanent_residence" value="0"
                                        class="mr-2" onclick="toggleCategoryField()">
                                    <label for="no" class="text-sm text-gray-600">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-3">
                        <div class="h-full flex flex-col">
                            <label for="high_qual"
                                class="block mb-auto px-1 text-sm font-medium text-gray-600">Highest Qualification<span
                                    class="ps-1 text-red-500">*</span></label>
                            <select id="high_qual" name="high_qual"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                                <option selected disabled>select</option>
                                <option value="1">HSLC</option>
                                <option value="2">HS</option>
                                <option value="3">Diploma</option>
                                <option value="4">Graduation</option>
                                <option value="5">Post Graduation</option>
                            </select>
                            @error('high_qual')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-3">
                        <div class="h-full flex flex-col">
                            <label for="gender"
                                class="block mb-auto px-1 text-sm font-medium text-gray-600">Gender<span
                                    class="ps-1 text-red-500">*</span></label>
                            <select id="gender" name="gender_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                                <option selected disabled>select</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                                <option value="3">Others</option>
                            </select>
                            @error('gender_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- Category field for Permanent Residents (Yes) -->
                    <div id="category-field" class="col-span-3 hidden">
                        <div class="h-full flex flex-col">
                            <label for="cast_cat" class="block mb-auto px-1 text-sm font-medium text-gray-600">
                                Cast/Category <span class="ps-1 text-red-500">*</span>
                            </label>
                            <select id="cast_cat" name="category_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                                <option selected disabled>select</option>
                                <option value="1">General</option>
                                <option value="2">OBC</option>
                                {{-- <option value="3">MOBC</option> --}}
                                <option value="3">SC</option>
                                <option value="4">ST</option>
                                {{-- <option value="6">ST (H)</option> --}}
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- Category field for Non-Permanent Residents (No) -->
                    <div id="category-field-no" class="col-span-3 hidden">
                        <div class="h-full flex flex-col">
                            <label for="cast_cat" class="block mb-auto px-1 text-sm font-medium text-gray-600">
                                Cast/Category <span class="ps-1 text-red-500">*</span>
                            </label>
                            <select id="cast_cat_no" name="category_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                                <option selected disabled>select</option>
                                <option value="1">General</option>
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-3">
                        <div class="h-full flex flex-col">
                            <label for="dob" class="block mb-auto px-1 text-sm font-medium text-gray-600">Date of
                                Birth<span class="ps-1 text-red-500">*</span></label>
                            <input type="date" id="dob" onchange="myFunction()" onfocus="blur()"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 datepicker"
                                name="dob" value="" placeholder="Date of Birth" required />
                            @error('dob')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="col-span-3">
                        <div class="h-full flex flex-col">
                            <label for="dob" class="block mb-auto px-1 text-sm font-medium text-gray-600">Date of
                                Birth<span class="ps-1 text-red-500">*</span></label>
                            <input type="text" id="dob" onchange="myFunction()" onfocus="blur()"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 datepicker"
                                name="dob" value="" placeholder="Date of Birth" required />
                            @error('dob')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div> --}}
                    <div class="col-span-3 sm:col-span-4">
                        <div class="h-full flex flex-col">
                            <label for="dob" class="block mb-aut px-1 text-sm font-medium text-gray-600">Age as
                                on 01-01-2025<span class="ps-1 text-red-500">*</span></label>
                            <input type="text" id="agee"
                                class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                name="age" placeholder="Age as on 1st January, 2025" readonly />
                            <input type="hidden" maxlength="2" size="2" id="date2"
                                placeholder="Date" />
                            <input type="hidden" maxlength="2" size="2" id="month2"
                                placeholder="Month" />
                            <input type="hidden" maxlength="4" size="4" id="year2"
                                placeholder="Year" />
                        </div>
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <div class="h-full flex flex-col">
                            <label for="email"
                                class="block mb-aut px-1 text-sm font-medium text-gray-600">Email</label>
                            <input type="" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 email"
                                name="email" value="" placeholder="Email Address" />
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <p id="result"></p>
                        </div>
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <!-- Div-1 -->
                        <div class="h-ful flex flex-col phone">
                            <div class="flex items-center justify-between">
                                <label for="p_number" class="block mb-auto px-1 text-sm font-medium text-gray-600">
                                    <i class="bi bi-check-circle-fill text-[0.70rem] pr-1"></i>
                                    Phone Number
                                    <span class="ps-1 text-red-500">*</span>
                                </label>
                                <button class="pr-2 text-xs flex items-center hover:text-red-500 hidden"
                                    id="change_p_number"><i
                                        class="bi bi-arrow-repeat text-sm pr-1"></i>change</button>
                            </div>
                            <div class="flex gap-2">
                                <input type="text" id="p_number" onkeypress="return isNumber(event)"
                                    minlength="10" maxlength="10"
                                    class="grow bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                    name="phone" value="" maxlength="4" minlength="4"
                                    placeholder="Phone Number" required />
                                <button type="button"
                                    class="text-xs text-white hover:text-green-100 bg-green-600 hover:bg-green-700 rounded-lg p-2 whitespace-nowrap"
                                    onclick="hideButton()" id="send_OTP">Send OTP</button>
                            </div>
                        </div>
                        <!-- Div-2 -->
                        <div class="h-ful flex flex-col verify_phone hidden">
                            <label for="email"
                                class="block px-1 text-sm font-medium text-gray-600 flex items-center">
                                <button type="button"
                                    class="rounded-md px-1 mr-1 bg-gray-200 hover:bg-gray-300 text-blue-600"
                                    id="back_to_phone"><i
                                        class="bi bi-chevron-double-left text-[0.65rem]"></i></button>
                                Enter OTP
                                <span class="ps-1 text-red-500">*</span>
                            </label>
                            <div class="flex gap-1 mt-auto">
                                <input type="text" id="otp"
                                    class="grow bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 text-center"
                                    name="otp" value="" minlength="4" maxlength="4"
                                    placeholder="X X X X" required />
                                @error('otp')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <button type="button"
                                    class="text-xs text-white hover:text-green-100 bg-green-600 hover:bg-green-700 rounded-lg px-2 py-0.5"
                                    id="verified">Verify</button>
                                <button type="button"
                                    class="text-xs text-white hover:text-yellow-100 bg-yellow-500 hover:bg-yellow-600 rounded-lg px-2 py-0.5"
                                    id="resend_OTP">Resend</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-4">
                        <div class="h-full flex flex-col">
                            <label for="ex-ser" class="block mb-auto px-1 text-sm font-medium text-gray-600">Are you
                                an Ex-Serviceman?<span class="ps-1 text-red-500">*</span></label>
                            <select id="ex_ser" name="ex_ser"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                onchange="toggleDateFields()">
                                <option selected disabled>select</option>
                                <option value="1">YES</option>
                                <option value="2">NO</option>
                            </select>
                            @error('ex_ser')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Start Date -->
                    <div class="col-span-4" id="start_date_container" style="display: none;">
                        <div class="h-full flex flex-col">
                            <label for="start_date" class="block mb-auto px-1 text-sm font-medium text-gray-600">Start
                                date<span class="ps-1 text-red-500">*</span></label>
                            <input type="date" id="start_date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 datepicker"
                                name="start_date" value="" placeholder="Start date"
                                onchange="validateDates()" />
                            @error('start_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- End Date -->
                    <div class="col-span-4" id="end_date_container" style="display: none;">
                        <div class="h-full flex flex-col">
                            <label for="end_date" class="block mb-auto px-1 text-sm font-medium text-gray-600">End
                                date<span class="ps-1 text-red-500">*</span></label>
                            <input type="date" id="end_date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 datepicker"
                                name="end_date" value="" placeholder="End date" onchange="validateDates()" />
                            @error('end_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Error Message for Invalid Dates -->
                    <div class="col-span-12" id="date_error" style="display: none; color: red;">
                        <span>The start date should not be later than the end date. Please correct it.</span>
                    </div>

                    <!-- Calculated Experience Display -->
                    <div class="col-span-4" id="age_display" style="display: none;">
                        <div class="h-full flex flex-col">
                            <label class="block mb-auto px-1 text-sm font-medium text-gray-600">Calculated
                                Experience</label>
                            <input type="text" id="calculated_age" name="calculated_age"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2"
                                readonly />
                        </div>
                    </div>

                    <!-- This is where the additional text box will be appended -->
                    {{-- <div id="ex_ser_textbox" class="col-span-4 hidden">
                        <div class="h-full flex flex-col">
                            <label for="total_ex" class="block mb-auto px-1 text-sm font-medium text-gray-600">Please
                                provide no of years served/put in service?<span
                                    class="ps-1 text-red-500">*</span></label>
                            <input type="text" name="total_ex" id="total_ex" onkeypress="return isNumber(event)"
                                minlength="1" maxlength="2"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" />
                        </div>
                    </div> --}}

                    {{-- <div class="col-span-6 sm:col-span-8">
                        <div class="h-full flex flex-col">
                            <label for="X-inMizo" class="block mb-auto px-1 text-sm font-medium text-gray-600">Have
                                you completed your Class-X Standard (HSLC) in Mizoram?<span
                                    class="ps-1 text-red-500">*</span></label>
                            <select id="X_inMizo" name="X_inMizo"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                                <option selected disabled>select</option>
                                <option value="1">YES</option>
                                <option value="2">NO</option>
                            </select>
                            @error('X_inMizo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div> --}}
                    <div class="col-span-4 sm:col-span-6" id="ms">
                        <div class="h-full flex flex-col">
                            <label for="m_sport" class="block mb-auto px-1 text-sm font-medium text-gray-600">
                                Are you a Meritorious Sportspersons?<span class="ps-1 text-red-500">*</span>
                            </label>
                            <select id="m_sport" name="m_sport"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                                <option selected disabled>select</option>
                                <option value="1">YES</option>
                                <option value="2">NO</option>
                            </select>
                            @error('m_sport')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div id="sports-section" class="col-span-4 sm:col-span-6 hidden">
                        <div class="h-full flex flex-col">
                            <label for="games" class="block mb-auto px-1 text-sm font-medium text-gray-600">
                                Represented Games /Sports<span class="ps-1 text-red-500">*</span>
                            </label>
                            <select id="g_id" name="g_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                                <option selected disabled>select</option>s
                                @foreach ($games as $game)
                                    <option value="{{ $game->id }}"
                                        {{ old('name') == $game->id ? 'selected' : '' }}>
                                        {{ $game->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('g_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div id="categories-section" class="col-span-6 sm:col-span-12 hidden">
                        <div class="h-full flex flex-col">
                            <label for="X_inMizo" class="block mb-auto px-1 text-sm font-medium text-gray-600">
                                Categories of Meritorious Sportspersons <span class="ps-1 text-red-500">*</span>
                            </label>
                            {{-- <select id="c_ms_id" name="c_ms_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 overflow-hidden truncate w-2">
                                <option selected disabled>select</option>
                                @foreach ($gameCategoires as $gc)
                                    <option value="{{ $gc->id }}"
                                        {{ old('name') == $gc->id ? 'selected' : '' }}>
                                        {{ $gc->name }}
                                    </option>
                                @endforeach
                            </select> --}}
                            <select id="c_ms_id" name="c_ms_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 overflow-hidden text-ellipsis">
                                <option selected disabled>select</option>
                                @foreach ($gameCategoires as $gc)
                                    <option value="{{ $gc->id }}"
                                        {{ old('name') == $gc->id ? 'selected' : '' }} title="{{ $gc->name }}">
                                        {{ Str::limit($gc->name, 90) }}
                                        <!-- Limit the text here, you can adjust the number -->
                                    </option>
                                @endforeach
                            </select>
                            @error('c_ms_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div><br>
                <div class="inline-block flex items-start">
                    <input id="reg_declaration" type="checkbox" value=""
                        class="mt-0.5 w-5 h-5 rounded-md text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                    <label for="reg_declaration" class="ms-2 text-sm font text-gray-900 ">Please check and confirm
                        your details before registration. Data once submitted cannot be changed.<span
                            class="ps-1 text-red-500">*</span></label>
                </div><br>
                <div class="flex items-center justify-between">
                    <a type="button"
                        class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-3xl text-sm w-full sm:w-auto px-5 py-2.5 text-center"
                        href="{{ route('home') }}">
                        Back
                    </a>
                    <button type="button" data-modal-target="save-reg-form" data-modal-toggle="save-reg-form"
                        id="submitButton"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-3xl text-sm w-full sm:w-auto px-5 py-2.5 text-center hidden"
                        href="">
                        Register Now!
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('layouts.footer')
@include('layouts.modals')
@include('layouts.custom-scripts.registerScript')
<script>
    // Function to show/hide date fields based on the ex_ser selection
    function toggleDateFields() {
        var exSerValue = document.getElementById('ex_ser').value;
        var startDateContainer = document.getElementById('start_date_container');
        var endDateContainer = document.getElementById('end_date_container');

        if (exSerValue == '1') {
            // Show date fields if YES is selected
            startDateContainer.style.display = 'block';
            endDateContainer.style.display = 'block';
        } else {
            // Hide date fields if NO or other value is selected
            startDateContainer.style.display = 'none';
            endDateContainer.style.display = 'none';
        }
    }
</script>
<script>
    function validateDates() {
        var startDate = document.getElementById('start_date').value;
        var endDate = document.getElementById('end_date').value;

        // Get the Register button
        var submitButton = document.getElementById('submitButton');
        var ageDisplay = document.getElementById('age_display');
        var ageInput = document.getElementById('calculated_age');
        var dateError = document.getElementById('date_error');

        // Check if both start and end dates are filled
        if (startDate && endDate) {
            var start = new Date(startDate);
            var end = new Date(endDate);

            // Compare start date with end date
            if (start > end) {
                // Show error message if start date is later than end date
                dateError.style.display = 'block';
                document.getElementById('start_date').style.borderColor = 'red';
                document.getElementById('end_date').style.borderColor = 'red';

                // Hide the Register Now button
                submitButton.style.display = 'none';

                // Hide the calculated experience
                ageDisplay.style.display = 'none';
            } else {
                // Hide error message if start date is valid
                dateError.style.display = 'none';
                document.getElementById('start_date').style.borderColor = '';
                document.getElementById('end_date').style.borderColor = '';

                // Show the Register Now button
                submitButton.style.display = 'block';

                // Calculate the age or experience
                var experience = calculateExperience(start, end);

                // Display the calculated experience
                ageInput.value = experience;
                ageDisplay.style.display = 'block';
            }
        }
    }

    function calculateExperience(start, end) {
        // Calculate the difference in years, months, and days
        var years = end.getFullYear() - start.getFullYear();
        var months = end.getMonth() - start.getMonth();
        var days = end.getDate() - start.getDate();

        // Adjust if the month or day is negative
        if (months < 0) {
            years--;
            months += 12;
        }
        if (days < 0) {
            months--;
            days += new Date(end.getFullYear(), end.getMonth(), 0).getDate(); // Get the last day of the month
        }

        return years + ' Years ' + months + ' Months ' + days + ' Days';
    }
</script>
