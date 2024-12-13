@include('layouts.header')

<head>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
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
                <a class="grow inline-block lg:w-full border border-gray-300 hover:border-blue-600 hover:shadow-md rounded-lg p-2 flex items-center hover:text-blue-600 font-medium transition-all text-xs"
                    href="{{ route('profile') }}">
                    <div class="h-8 w-8 bg-gray-200 rounded-full lg:mr-2 text-black text-xs flex"><span
                            class="m-auto text-sm TimesNR"><i class="bi bi-person"></i></span></div>
                    <span class="hidden lg:inline-block">Profile</span>
                </a>
                <div class="flex h-6 ml-6">
                    <div class="h-full w-[2px] bg-gray-300 group-hover:bg-blue-600"></div>
                </div>
            </div>
        </div>
        <div class="grow flex flex-col group">
            <div class="h-full flex flex-col items-center md:items-start">
                <a class="grow inline-block lg:w-full border border-gray-300 hover:border-blue-600 hover:shadow-md rounded-lg p-1 sm:p-2 flex items-center hover:text-blue-600 font-medium transition-all text-xs"
                    href="#">
                    <div class="h-6 w-6 sm:h-8 sm:w-8 bg-gray-200 rounded-full lg:mr-2 text-black text-xs flex"><span
                            class="m-auto text-sm TimesNR"><i class="bi bi-file-building"></i></span></div>
                    <span class="hidden lg:inline-block">Exam Centre Preference</span>
                </a>
                <div class="flex h-6 sm:ml-6">
                    <div class="h-full w-[2px] bg-gray-300 group-hover:bg-blue-600"></div>
                </div>
            </div>
        </div>
        <div class="grow flex flex-col group">
            <div class="h-full flex flex-col items-center md:items-start">
                <a class="grow inline-block lg:w-full border border-gray-300 hover:border-blue-600 hover:shadow-md rounded-lg p-2 flex items-center hover:text-blue-600 font-medium transition-all text-xs"
                    href="{{ route('document') }}">
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
                <a href="{{ route('preview') }}"
                    class="grow inline-block lg:w-full border border-green-600 shadow-md rounded-lg p-2 flex items-center text-green-600 font-medium transition-all text-xs">
                    <div class="h-8 w-8 bg-gray-200 rounded-full lg:mr-2 text-black text-xs flex"><span
                            class="m-auto text-sm TimesNR"><i class="bi bi-eye"></i></span></div>
                    <span class="hidden lg:inline-block">Preview</span>
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
                            class="m-auto text-sm TimesNR">₹</span></div>
                    <span class="hidden lg:inline-block">Payment</span>
                </a>
                <div class="flex h-6 ml-6">
                    <div class="h-full w-[2px] bg-gray-300 group-hover:bg-blue-600"></div>
                </div>
            </div>
        </div>
    </div>


    <div class="p-4 grow border border-gray-300 rounded-lg space-y-4">
        <p class="m-auto text-yellow-500 text-center rounded-md text-[0.65rem] md:text-sm font-medium">Candidate profile
            Preview.</p>
        <form action="">
            <div class="grid grid-cols-12 gap-4">
                <div class="border border-1 rounded-md p-2 col-span-12 md:col-span-6 lg::col-span-4 xl:col-span-3">
                    <p class="text-xs uppercase font-semibold text-gray-600">Candidate Name</p>
                    <p class="text-sm font-medium">{{ $userDetails->full_name }}</p>
                </div>
                <div class="border border-1 rounded-md p-2 col-span-6 md:col-span-3 lg::col-span-4 xl:col-span-3">
                    <p class="text-xs uppercase font-semibold text-gray-600">Cast/ Category</p>
                    @if ($userDetails->category_id == 1)
                        <p class="text-sm font-medium">General</p>
                    @elseif ($userDetails->category_id == 2)
                        <p class="text-sm font-medium">OBC</p>
                    @elseif ($userDetails->category_id == 3)
                        <p class="text-sm font-medium">SC</p>
                    @elseif ($userDetails->category_id == 4)
                        <p class="text-sm font-medium">ST</p>
                    @endif
                </div>
                <div class="border border-1 rounded-md p-2 col-span-6 md:col-span-3 lg::col-span-4 xl:col-span-3">
                    <p class="text-xs uppercase font-semibold text-gray-600">Gender</p>
                    @if ($userDetails->gender_id == 1)
                        <p class="text-sm font-medium">Male</p>
                    @elseif($userDetails->gender_id == 2)
                        <p class="text-sm font-medium">Male</p>
                    @else
                        <p class="text-sm font-medium">Others</p>
                    @endif
                </div>
                <div class="border border-1 rounded-md p-2 col-span-6 md:col-span-3 lg::col-span-4 xl:col-span-3">
                    <p class="text-xs uppercase font-semibold text-gray-600">Date of Birth</p>
                    <p class="text-sm font-medium">{{ $userDetails->dob }}</p>
                </div>
                <div class="border border-1 rounded-md p-2 col-span-6 md:col-span-4 lg::col-span-4 xl:col-span-3">
                    <p class="text-xs uppercase font-semibold text-gray-600">Age as on 01-01-2025</p>
                    <p class="text-sm font-medium">{{ $userDetails->age }}</p>
                </div>
                <div class="border border-1 rounded-md p-2 col-span-12 md:col-span-5 lg::col-span-4 xl:col-span-3">
                    <p class="text-xs uppercase font-semibold text-gray-600">Father Name</p>
                    <p class="text-sm font-medium">{{ $userDetails->father_name }}</p>
                </div>
                <div class="border border-1 rounded-md p-2 col-span-12 md:col-span-5 lg::col-span-4 xl:col-span-3">
                    <p class="text-xs uppercase font-semibold text-gray-600">Mother Name</p>
                    <p class="text-sm font-medium">{{ $userDetails->mother_name }}</p>
                </div>
                <div class="border border-1 rounded-md p-2 col-span-12 md:col-span-4 lg::col-span-4 xl:col-span-3">
                    <p class="text-xs uppercase font-semibold text-gray-600">Highest Qualification</p>
                    @if ($userDetails->high_qual == 1)
                        <p class="text-sm font-medium">HSLC</p>
                    @endif
                </div>
                <div class="border border-1 rounded-md p-2 col-span-6 md:col-span-3 lg::col-span-4 xl:col-span-3">
                    <p class="text-xs uppercase font-semibold text-gray-600">Phone Number</p>
                    <p class="text-sm font-medium">+91 {{ $userDetails->phone }}</p>
                </div>
                <div class="border border-1 rounded-md p-2 col-span-6 md:col-span-3 lg::col-span-4 xl:col-span-3">
                    <p class="text-xs uppercase font-semibold text-gray-600">Alt. Phone Number</p>
                    <p class="text-sm font-medium">+91 {{ $userDetails->alt_mobile ?? 'N/A' }}</p>
                </div>
                <div class="border border-1 rounded-md p-2 col-span-12 md:col-span-5 lg::col-span-4 xl:col-span-3">
                    <p class="text-xs uppercase font-semibold text-gray-600">Email</p>
                    <p class="text-sm font-medium">{{ $userDetails->email }}</p>
                </div>
                <div class="border border-1 rounded-md p-2 col-span-12 md:col-span-4 lg::col-span-4 xl:col-span-3">
                    <p class="text-xs uppercase font-semibold text-gray-600">Are you an Ex-Serviceman?</p>
                    @if ($userDetails->ex_ser == 1)
                        <p class="text-sm font-medium">YES</p>
                    @else
                        <p class="text-sm font-medium">NO</p>
                    @endif
                </div>
                <div class="border border-1 rounded-md p-2 col-span-12 md:col-span-8 lg::col-span-4 xl:col-span-3">
                    <p class="text-xs uppercase font-semibold text-gray-600">Have you completed your Class-X Standard
                        (HSLC) in Mizoram?</p>
                    @if ($userDetails->X_inMizo == 1)
                        <p class="text-sm font-medium">YES</p>
                    @else
                        <p class="text-sm font-medium">NO</p>
                    @endif
                </div>
                {{-- <div class="border border-1 rounded-md p-2 col-span-6 md:col-span-2 lg::col-span-4 xl:col-span-3">
                    <p class="text-xs uppercase font-semibold text-gray-600">Religion</p>
                    @if ($userDetails->religion == 1)
                        <p class="text-sm font-medium">Hindu</p>
                    @elseif ($userDetails->religion == 2)
                        <p class="text-sm font-medium">Muslim</p>
                    @elseif ($userDetails->religion == 3)
                        <p class="text-sm font-medium">Christian</p>
                    @elseif ($userDetails->religion == 4)
                        <p class="text-sm font-medium">Sikh</p>
                    @elseif ($userDetails->religion == 5)
                        <p class="text-sm font-medium">Buddhist</p>
                    @elseif ($userDetails->religion == 6)
                        <p class="text-sm font-medium">Jain</p>
                    @else
                        <p class="text-sm font-medium">Other Religions</p>
                    @endif
                </div> --}}
                <div class="border border-1 rounded-md p-2 col-span-6 md:col-span-2 lg::col-span-4 xl:col-span-3">
                    <p class="text-xs uppercase font-semibold text-gray-600">Nationality</p>
                    <p class="text-sm font-medium">{{ $userDetails->nationality }}</p>
                </div>
                <div class="border border-1 rounded-md p-2 col-span-12 md:col-span-3 lg::col-span-4 xl:col-span-3">
                    <p class="text-xs uppercase font-semibold text-gray-600">Aadhaar Number</p>
                    <p class="text-sm font-medium">{{ $userDetails->adhar_no ?? 'N/A' }}</p>
                </div>
                <div class="border border-1 rounded-md p-2 col-span-12 md:col-span-3 lg::col-span-4 xl:col-span-3">
                    <p class="text-xs uppercase font-semibold text-gray-600">Voter ID
                        Number (EPIC)</p>
                    <p class="text-sm font-medium">{{ $userDetails->voter_no ?? 'N/A' }}</p>
                </div>
                <div class="border border-1 rounded-md p-2 col-span-12 md:col-span-3 lg::col-span-4 xl:col-span-3">
                    <p class="text-xs uppercase font-semibold text-gray-600">Identification Marks</p>
                    <p class="text-sm font-medium">{{ $userDetails->identity_mark ?? 'N/A' }}</p>
                </div>

                <div class="rounded-md p-1 col-span-12 bg-gray-200"></div>

                <div class="border border-1 rounded-md p-2 col-span-12 md:col-span-6 lg:col-span-6 xl:col-span-3">
                    <p class="text-xs uppercase font-semibold text-gray-600">Permanent Address</p>
                    <p class="text-sm font-medium">{{ $userDetails->p_address1 }} , {{ $userDetails->p_address2 }}
                    </p>
                </div>
                <div class="border border-1 rounded-md p-2 col-span-12 md:col-span-6 lg:col-span-6 xl:col-span-3">
                    <p class="text-xs uppercase font-semibold text-gray-600">Village</p>
                    <p class="text-sm font-medium">{{ $userDetails->p_village }}
                    </p>
                </div>
                <div class="border border-1 rounded-md p-2 col-span-12 md:col-span-6 lg:col-span-6 xl:col-span-3">
                    <p class="text-xs uppercase font-semibold text-gray-600">state</p>
                    <p class="text-sm font-medium">{{ $userDetails->pState }}</p>
                </div>
                @if ($userDetails->p_state_id == 17)
                    <div class="border border-1 rounded-md p-2 col-span-12 md:col-span-6 lg:col-span-6 xl:col-span-3">
                        <p class="text-xs uppercase font-semibold text-gray-600">District</p>
                        <p class="text-sm font-medium">{{ $userDetails->pDist }}</p>
                    </div>
                @else
                    <div class="border border-1 rounded-md p-2 col-span-12 md:col-span-6 lg:col-span-6 xl:col-span-3">
                        <p class="text-xs uppercase font-semibold text-gray-600">District</p>
                        <p class="text-sm font-medium">{{ $userDetails->p_other_district }}</p>
                    </div>
                @endif
                <div class="border border-1 rounded-md p-2 col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-3">
                    <p class="text-xs uppercase font-semibold text-gray-600">Police Station</p>
                    <p class="text-sm font-medium">{{ $userDetails->p_police_id }}</p>
                </div>
                <div class="border border-1 rounded-md p-2 col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-3">
                    <p class="text-xs uppercase font-semibold text-gray-600">Post Office</p>
                    <p class="text-sm font-medium">{{ $userDetails->p_post_office }}</p>
                </div>
                <div class="border border-1 rounded-md p-2 col-span-12 md:col-span-4 mlgcol-span-4 xl:col-span-1">
                    <p class="text-xs uppercase font-semibold text-gray-600">Pincode</p>
                    <p class="text-sm font-medium">{{ $userDetails->p_pin }}</p>
                </div>
                <div
                    class="border border-1 rounded-md p-2 col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-5 hidden xl:block">
                </div>

                <div class="border border-1 rounded-md p-2 col-span-12 md:col-span-6 lg:col-span-6 xl:col-span-3">
                    <p class="text-xs uppercase font-semibold text-gray-600">Correspondance Address</p>
                    <p class="text-sm font-medium">{{ $userDetails->c_address1 }} , {{ $userDetails->c_address2 }}
                    </p>
                </div>
                <div class="border border-1 rounded-md p-2 col-span-12 md:col-span-6 lg:col-span-6 xl:col-span-3">
                    <p class="text-xs uppercase font-semibold text-gray-600">Village</p>
                    <p class="text-sm font-medium">{{ $userDetails->c_village }}
                    </p>
                </div>
                <div class="border border-1 rounded-md p-2 col-span-12 md:col-span-6 lg:col-span-6 xl:col-span-3">
                    <p class="text-xs uppercase font-semibold text-gray-600">state</p>
                    <p class="text-sm font-medium">{{ $userDetails->cState }}</p>
                </div>
                @if ($userDetails->c_state_id == 17)
                    <div class="border border-1 rounded-md p-2 col-span-12 md:col-span-6 lg:col-span-6 xl:col-span-3">
                        <p class="text-xs uppercase font-semibold text-gray-600">District</p>
                        <p class="text-sm font-medium">{{ $userDetails->cDist }}</p>
                    </div>
                @else
                    <div class="border border-1 rounded-md p-2 col-span-12 md:col-span-6 lg:col-span-6 xl:col-span-3">
                        <p class="text-xs uppercase font-semibold text-gray-600">District</p>
                        <p class="text-sm font-medium">{{ $userDetails->c_other_district }}</p>
                    </div>
                @endif
                <div class="border border-1 rounded-md p-2 col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-3">
                    <p class="text-xs uppercase font-semibold text-gray-600">Police Station</p>
                    <p class="text-sm font-medium">{{ $userDetails->c_police_id }}</p>
                </div>
                <div class="border border-1 rounded-md p-2 col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-3">
                    <p class="text-xs uppercase font-semibold text-gray-600">Post Office</p>
                    <p class="text-sm font-medium">{{ $userDetails->c_post_office }}</p>
                </div>
                <div class="border border-1 rounded-md p-2 col-span-12 md:col-span-4 mlgcol-span-4 xl:col-span-1">
                    <p class="text-xs uppercase font-semibold text-gray-600">Pincode</p>
                    <p class="text-sm font-medium">{{ $userDetails->c_pin }}</p>
                </div>
                <div
                    class="border border-1 rounded-md p-2 col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-5 hidden xl:block">
                </div>

                <div class="rounded-md p-1 col-span-12 bg-gray-200"></div>

                @if ($userDetails->min_score_mizo == 1)
                    <div class="border border-1 rounded-md p-2 col-span-12 md:col-span-6 lg:col-span-12 xl:col-span-4">
                        <p class="text-xs uppercase font-semibold text-gray-600">Have you achieved a minimum score in Mizo
                            Language Proficiency qualifying test?</p>
                        <p class="text-sm font-medium">YES</p>
                    </div>
                @endif
                @if ($userDetails->class_x_mizo == 1)
                    <div class="border border-1 rounded-md p-2 col-span-12 md:col-span-6 lg:col-span-12 xl:col-span-4">
                        <p class="text-xs uppercase font-semibold text-gray-600">Have you studied Mizo subject in
                            Class-X
                            standard (HSLC) or above within Mizoram?</p>
                        <p class="text-sm font-medium">YES</p>
                    </div>
                @endif
                @if ($userDetails->mizo_as_mil == 1)
                    <div class="border border-1 rounded-md p-2 col-span-12 md:col-span-6 lg:col-span-12 xl:col-span-4">
                        <p class="text-xs uppercase font-semibold text-gray-600">Have you studied Mizo subject as MIL in
                            Class-X standard in outside Mizoram?</p>
                        <p class="text-sm font-medium">YES</p>
                    </div>
                @endif
                <div class="border border-1 rounded-md p-2 col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-4">
                    <p class="text-xs uppercase font-semibold text-gray-600">Do you have Computer Certificate?</p>
                    @if ($userDetails->comp == 1)
                        <p class="text-sm font-medium">YES</p>
                    @else
                        <p class="text-sm font-medium">NO</p>
                    @endif
                </div>
                <div class="border border-1 rounded-md p-2 col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-4">
                    <p class="text-xs uppercase font-semibold text-gray-600">Do you have NCC Certificate?</p>
                    @if ($userDetails->ncc == 1)
                        <p class="text-sm font-medium">YES</p>
                    @else
                        <p class="text-sm font-medium">NO</p>
                    @endif
                </div>
                <div class="border border-1 rounded-md p-2 col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-4">
                    <p class="text-xs uppercase font-semibold text-gray-600">Are you a Home Guard Volunteer (MRHG)?</p>
                    @if ($userDetails->home_guard == 1)
                        <p class="text-sm font-medium">YES</p>
                    @else
                        <p class="text-sm font-medium">NO</p>
                    @endif
                </div>
                <div class="border border-1 rounded-md p-2 col-span-12 md:col-span-6 lg:col-span-12 xl:col-span-6">
                    <p class="text-xs uppercase font-semibold text-gray-600">Have you completed 1 (one) year training
                        course in concerned Trade at the Industrial Training Institute or its equivalent institution?
                    </p>
                    @if ($userDetails->iti_eqi == 1)
                        <p class="text-sm font-medium">YES</p>
                    @else
                        <p class="text-sm font-medium">NO</p>
                    @endif
                </div>
                <div class="border border-1 rounded-md p-2 col-span-12 md:col-span-6 lg:col-span-12 xl:col-span-6">
                    <p class="text-xs uppercase font-semibold text-gray-600">Do you have work experience of at least 5
                        (five) years in Government or private automobile Workshop as a mechanic?</p>
                    @if ($userDetails->auto_mobile == 1)
                        <p class="text-sm font-medium">YES</p>
                    @else
                        <p class="text-sm font-medium">NO</p>
                    @endif
                </div>

                <div class="rounded-md p-1 col-span-12 bg-gray-200"></div>

                @foreach ($preferences->sortBy('preferences') as $p)
                    <!-- Sorting preferences based on preference number -->
                    <!-- Preference 1 Post -->
                    @if ($p->preferences == 1)
                        <div
                            class="border border-1 rounded-md p-2 col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-4">
                            <p class="text-xs uppercase font-semibold text-gray-600">Preference 1, Post</p>
                            <p class="text-sm font-medium">{{ $p->post }}</p>
                        </div>
                    @endif

                    <!-- Preference 2 Post -->
                    @if ($p->preferences == 2)
                        <div
                            class="border border-1 rounded-md p-2 col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-4">
                            <p class="text-xs uppercase font-semibold text-gray-600">Preference 2, Post</p>
                            <p class="text-sm font-medium">{{ $p->post }}</p>
                        </div>
                    @endif

                    <!-- Preference 3 Post (only if the user has either ITI or Auto Mobile qualification) -->
                    @if (($userDetails->iti_eqi == 1 || $userDetails->auto_mobile == 1) && $p->preferences == 3)
                        <div
                            class="border border-1 rounded-md p-2 col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-4">
                            <p class="text-xs uppercase font-semibold text-gray-600">Preference 3, Post</p>
                            <p class="text-sm font-medium">{{ $p->post }}</p>
                        </div>
                    @endif
                @endforeach


                <div class="rounded-md p-1 col-span-12 bg-gray-200"></div>
                <div
                    class="border border-1 rounded-md p-2 col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-2 flex flex-col gap-2">
                    <p class="text-xs uppercase font-semibold text-gray-600 mb-auto">Photo</p>
                    <div class="bg-gray-200 rounded p-1 text-sm flex items-center justify-between">
                        <span class="inline-block text-green-700 font-medium">UPLOADED</span>
                        <a type="button" class="inline-block py-0.5 px-1.5 rounded bg-white hover:bg-gray-50"
                            href="{{ asset('storage/public/uploads/upload_photo/' . $userDetails->photo) }}"
                            target="_blank"><i class="bi bi-eye"></i></a>
                    </div>
                </div>
                <div
                    class="border border-1 rounded-md p-2 col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-2 flex flex-col gap-2">
                    <p class="text-xs uppercase font-semibold text-gray-600 mb-auto">Signature</p>
                    <div class="bg-gray-200 rounded p-1 text-sm flex items-center justify-between">
                        <span class="inline-block text-green-700 font-medium">UPLOADED</span>
                        <a type="button" class="inline-block py-0.5 px-1.5 rounded bg-white hover:bg-gray-50"
                            href="{{ asset('storage/public/uploads/upload_signature/' . $userDetails->signature) }}"
                            target="_blank"><i class="bi bi-eye"></i></a>
                    </div>
                </div>
                <div
                    class="border border-1 rounded-md p-2 col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-2 flex flex-col gap-2">
                    <p class="text-xs uppercase font-semibold text-gray-600 mb-auto">Age proof Certificate</p>
                    <div class="bg-gray-200 rounded p-1 text-sm flex items-center justify-between">
                        <span class="inline-block text-green-700 font-medium">UPLOADED</span>
                        <a type="button" class="inline-block py-0.5 px-1.5 rounded bg-white hover:bg-gray-50"
                            href="{{ asset('storage/public/uploads/age_prof_cert/' . $userDetails->age_prof_cert) }}"
                            target="_blank"><i class="bi bi-eye"></i></a>
                    </div>
                </div>
                <div
                    class="border border-1 rounded-md p-2 col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-2 flex flex-col gap-2">
                    <p class="text-xs uppercase font-semibold text-gray-600 mb-auto">Class X Marksheet</p>
                    <div class="bg-gray-200 rounded p-1 text-sm flex items-center justify-between">
                        <span class="inline-block text-green-700 font-medium">UPLOADED</span>
                        <a type="button" class="inline-block py-0.5 px-1.5 rounded bg-white hover:bg-gray-50"
                            href="{{ asset('storage/public/uploads/class_x_cert/' . $userDetails->class_x_cert) }}"
                            target="_blank"><i class="bi bi-eye"></i></a>
                    </div>
                </div>
                @if ($userDetails->ms == 1)
                    <div
                        class="border border-1 rounded-md p-2 col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-2 flex flex-col gap-2">
                        <p class="text-xs uppercase font-semibold text-gray-600 mb-auto">Mizo Language Proficiency Test
                            Cert
                        </p>
                        <div class="bg-gray-200 rounded p-1 text-sm flex items-center justify-between">
                            <span class="inline-block text-green-700 font-medium">UPLOADED</span>
                            <a type="button" class="inline-block py-0.5 px-1.5 rounded bg-white hover:bg-gray-50"
                                href="{{ asset('storage/public/uploads/mizu_lang_cert/' . $userDetails->mizu_lang_cert) }}"
                                target="_blank"><i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                @endif
                @if ($userDetails->mx == 1)
                    <div
                        class="border border-1 rounded-md p-2 col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-2 flex flex-col gap-2">
                        <p class="text-xs uppercase font-semibold text-gray-600 mb-auto">Mizo subject in Class-X
                            standard
                            (HSLC)
                        </p>
                        <div class="bg-gray-200 rounded p-1 text-sm flex items-center justify-between">
                            <span class="inline-block text-green-700 font-medium">UPLOADED</span>
                            <a type="button" class="inline-block py-0.5 px-1.5 rounded bg-white hover:bg-gray-50"
                                href="{{ asset('storage/public/uploads/mizu_class_x/' . $userDetails->mizu_class_x) }}"
                                target="_blank"><i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                @endif
                @if ($userDetails->mm == 1)
                    <div
                        class="border border-1 rounded-md p-2 col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-2 flex flex-col gap-2">
                        <p class="text-xs uppercase font-semibold text-gray-600 mb-auto">Mizo subject as MIL in Class-X
                            standard in outside Mizoram
                        </p>
                        <div class="bg-gray-200 rounded p-1 text-sm flex items-center justify-between">
                            <span class="inline-block text-green-700 font-medium">UPLOADED</span>
                            <a type="button" class="inline-block py-0.5 px-1.5 rounded bg-white hover:bg-gray-50"
                                href="{{ asset('storage/public/uploads/mizu_class_x_outside/' . $userDetails->mizu_class_x_outside) }}"
                                target="_blank"><i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                @endif
                @if ($userDetails->home_guard == 1)
                    <div
                        class="border border-1 rounded-md p-2 col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-2 flex flex-col gap-2">
                        <p class="text-xs uppercase font-semibold text-gray-600 mb-auto">Homeguard Certificate</p>
                        <div class="bg-gray-200 rounded p-1 text-sm flex items-center justify-between">
                            <span class="inline-block text-green-700 font-medium">UPLOADED</span>
                            <a type="button" class="inline-block py-0.5 px-1.5 rounded bg-white hover:bg-gray-50"
                                href="{{ asset('storage/public/uploads/homeguard_cert/' . $userDetails->homeguard_cert) }}"
                                target="_blank"><i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                @endif
                @if (
                    $userDetails->category_id == 2 ||
                        $userDetails->category_id == 3 ||
                        $userDetails->category_id == 3 ||
                        $userDetails->category_id == 4 ||
                        $userDetails->category_id == 5 ||
                        $userDetails->category_id == 6)
                    <div
                        class="border border-1 rounded-md p-2 col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-2 flex flex-col gap-2">
                        <p class="text-xs uppercase font-semibold text-gray-600 mb-auto">Cast Certificate</p>
                        <div class="bg-gray-200 rounded p-1 text-sm flex items-center justify-between">
                            <span class="inline-block text-green-700 font-medium">UPLOADED</span>
                            <a type="button" class="inline-block py-0.5 px-1.5 rounded bg-white hover:bg-gray-50"
                                href="{{ asset('storage/public/uploads/caste_cert/' . $userDetails->caste_cert) }}"
                                target="_blank"><i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                @endif
                @if ($userDetails->ncc == 1)
                    <div
                        class="border border-1 rounded-md p-2 col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-2 flex flex-col gap-2">
                        <p class="text-xs uppercase font-semibold text-gray-600 mb-auto">NCC Certificate</p>
                        <div class="bg-gray-200 rounded p-1 text-sm flex items-center justify-between">
                            <span class="inline-block text-green-700 font-medium">UPLOADED</span>
                            <a type="button" class="inline-block py-0.5 px-1.5 rounded bg-white hover:bg-gray-50"
                                href="{{ asset('storage/public/uploads/ncc_cert/' . $userDetails->ncc_cert) }}"
                                target="_blank"><i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                @endif
                @if ($userDetails->comp == 1)
                    <div
                        class="border border-1 rounded-md p-2 col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-2 flex flex-col gap-2">
                        <p class="text-xs uppercase font-semibold text-gray-600 mb-auto">Computer Certificate</p>
                        <div class="bg-gray-200 rounded p-1 text-sm flex items-center justify-between">
                            <span class="inline-block text-green-700 font-medium">UPLOADED</span>
                            <a type="button" class="inline-block py-0.5 px-1.5 rounded bg-white hover:bg-gray-50"
                                href="{{ asset('storage/public/uploads/comp_cert/' . $userDetails->comp_cert) }}"
                                target="_blank"><i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                @endif
                @if ($userDetails->iti_eqi == 1)
                    <div
                        class="border border-1 rounded-md p-2 col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-2 flex flex-col gap-2">
                        <p class="text-xs uppercase font-semibold text-gray-600 mb-auto">ITI Experiance Certificate
                        </p>
                        <div class="bg-gray-200 rounded p-1 text-sm flex items-center justify-between">
                            <span class="inline-block text-green-700 font-medium">UPLOADED</span>
                            <a type="button" class="inline-block py-0.5 px-1.5 rounded bg-white hover:bg-gray-50"
                                href="{{ asset('storage/public/uploads/iti_ex_cert/' . $userDetails->iti_ex_cert) }}"
                                target="_blank"><i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                @endif
                @if ($userDetails->auto_mobile == 1)
                    <div
                        class="border border-1 rounded-md p-2 col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-2 flex flex-col gap-2">
                        <p class="text-xs uppercase font-semibold text-gray-600 mb-auto">Mechanic Experiance
                            Certificate
                        </p>
                        <div class="bg-gray-200 rounded p-1 text-sm flex items-center justify-between">
                            <span class="inline-block text-green-700 font-medium">UPLOADED</span>
                            <a type="button" class="inline-block py-0.5 px-1.5 rounded bg-white hover:bg-gray-50"
                                href="{{ asset('storage/public/uploads/mechanic_ex_cert/' . $userDetails->mechanic_ex_cert) }}"
                                target="_blank"><i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                @endif
                @if ($userDetails->ex_ser == 1)
                    <div
                        class="border border-1 rounded-md p-2 col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-2 flex flex-col gap-2">
                        <p class="text-xs uppercase font-semibold text-gray-600 mb-auto">Ex-Serviceman
                            Certificate
                        </p>
                        <div class="bg-gray-200 rounded p-1 text-sm flex items-center justify-between">
                            <span class="inline-block text-green-700 font-medium">UPLOADED</span>
                            <a type="button" class="inline-block py-0.5 px-1.5 rounded bg-white hover:bg-gray-50"
                                href="{{ asset('storage/public/uploads/ex_service/' . $userDetails->ex_service) }}"
                                target="_blank"><i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                @endif
                @if ($userDetails->m_sport == 1)
                    <div
                        class="border border-1 rounded-md p-2 col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-2 flex flex-col gap-2">
                        <p class="text-xs uppercase font-semibold text-gray-600 mb-auto">Sports
                            Certificate
                        </p>
                        <div class="bg-gray-200 rounded p-1 text-sm flex items-center justify-between">
                            <span class="inline-block text-green-700 font-medium">UPLOADED</span>
                            <a type="button" class="inline-block py-0.5 px-1.5 rounded bg-white hover:bg-gray-50"
                                href="{{ asset('storage/public/uploads/sports_cert/' . $userDetails->sports_cert) }}"
                                target="_blank"><i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                @endif
                <div
                    class="border border-1 rounded-md p-2 col-span- md:col-span-6 lg:col-span-4 xl:col-span-4 hidden lg:block">
                    <p class="text-xs uppercase font-semibold text-gray-600"></p>
                    <p class="text-sm font-medium"></p>
                </div>

                <div class="rounded-md p-1 col-span-12 bg-gray-200"></div>

                <div class="border border-1 rounded-md p-2 col-span-12">
                    <div class="flex items-start">
                        <input id="default-checkbox" type="checkbox" value=""
                            class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-500 rounded-md focus:ring-blue-500 focus:ring-2">
                        <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900">
                            I hearby declare that the particular given by me in this form are true to the best of my
                            knowledge and belife and any mistake/misinformation, detected at the time of addmision
                            or at
                            any stage in future, will result in the cancelation of admission/canditature. I have
                            read
                            the information bulletin and understood all the procedure. In case i finish any false
                            information, my result will not be declared/my candidature will automatically stand
                            cancled.
                            I Shall abide by terms and conditions therein.
                        </label>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="mt-auto px-4 flex items-center">
    <a class="inline-block bg-gray-600 hover:bg-gray-700 text-white p-2 rounded-md Nunito"
        href="{{ route('document') }}"><i class="bi bi-arrow-left-short pr-1"></i>Go Back</a>
    <a id="confirm-btn"
        class="ml-auto inline-block bg-green-600 hover:bg-green-700 text-white p-2 rounded-md Nunito"><i
            class="bi bi-check-all pr-1"></i>Confirm & proceed</a>
</div>
@include('layouts.footer')
@include('layouts.custom-scripts.previewScript')
