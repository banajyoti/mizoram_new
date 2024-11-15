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
                <a
                    class="grow inline-block lg:w-full border border-green-600 shadow-md rounded-lg p-2 flex items-center text-green-600 font-medium transition-all text-xs">
                    <div class="h-8 w-8 bg-gray-200 rounded-full lg:mr-2 text-black text-xs flex"><span
                            class="m-auto text-sm TimesNR"><i class="bi bi-arrow-down-up"></i></span></div>
                    <span class="hidden lg:inline-block">Post Preferences</span>
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
                <a class="grow inline-block lg:w-full border border-gray-300 hover:border-blue-600 hover:shadow-md rounded-lg p-2 flex items-center hover:text-blue-600 font-medium transition-all text-xs"
                    href="preview.php">
                    <div class="h-8 w-8 bg-gray-200 rounded-full lg:mr-2 text-black text-xs flex"><span
                            class="m-auto text-sm TimesNR"><i class="bi bi-eye"></i></span></div>
                    <span class="hidden lg:inline-block">Preview</span>
                </a>
                <div class="flex h-6 ml-6">
                    <div class="h-full w-[2px] bg-gray-300 group-hover:bg-blue-600"></div>
                </div>
            </div>
        </div>
        <div class="grow flex flex-col group">
            <div class="h-full flex flex-col items-center md:items-start">
                <a class="grow inline-block lg:w-full border border-gray-300 hover:border-blue-600 hover:shadow-md rounded-lg p-2 flex items-center hover:text-blue-600 font-medium transition-all text-xs"
                    href="payment.php">
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

    <div class="p-4 grow border border-gray-300 rounded-lg space-y-8">
        <p class="m-auto text-yellow-500 text-center rounded-md text-[0.65rem] md:text-sm font-medium">Candidate are
            requested to slect the post as per their preference</p>
        <div class="flex flex-col items-center justify-center space-y-">
            <div class="mb-8">
                <p class="mb-2 text-gray-600">Select post's manually that you want to apply for</p>
                <!-- AB (ARMED BRANCH) Section -->
                <div class="mb-2 md:mb-0 lg:w-[40vw] grid grid-cols-12" id="ab-section">
                    <div class="col-span-12 md:col-span-9 border">
                        <div class="h-full p-2 flex justify-center md:justify-start items-center">
                            AB (ARMED BRANCH)
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-3 border">
                        <div class="h-full p-2 text-center">
                            <button type="button"
                                class="p-1 px-2 bg-gray-200 hover:bg-blue-600 hover:text-white text-xs w-full add-post-btn"
                                data-section="ab" @if ($postStatuses['ab']) style="display: none;" @endif>
                                <i class="bi bi-plus-lg pr-1"></i>ADD POST
                            </button>
                            <button type="button" class="p-1 px-2 text-green-600 text-xs w-full pe-none post-added-btn"
                                @if (!$postStatuses['ab']) style="display: none;" @endif>
                                <i class="bi bi-check-all pr-1"></i>POST ADDED
                            </button>
                        </div>
                    </div>
                </div>

                <!-- UB (UNARMED BRANCH) Section -->
                <div class="mb-2 md:mb-0 lg:w-[40vw] grid grid-cols-12" id="ub-section">
                    <div class="col-span-12 md:col-span-9 border">
                        <div class="h-full p-2 flex justify-center md:justify-start items-center">
                            UB (UNARMED BRANCH)
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-3 border">
                        <div class="h-full p-2 text-center">
                            <button type="button"
                                class="p-1 px-2 bg-gray-200 hover:bg-blue-600 hover:text-white text-xs w-full add-post-btn"
                                data-section="ub" @if ($postStatuses['ub']) style="display: none;" @endif>
                                <i class="bi bi-plus-lg pr-1"></i>ADD POST
                            </button>
                            <button type="button" class="p-1 px-2 text-green-600 text-xs w-full pe-none post-added-btn"
                                @if (!$postStatuses['ub']) style="display: none;" @endif>
                                <i class="bi bi-check-all pr-1"></i>POST ADDED
                            </button>
                        </div>
                    </div>
                </div>

                <!-- CONSTABLE Section -->
                @if ($questionaries->iti_eqi == 1 && $questionaries->auto_mobile == 1)
                    <div class="mb-2 md:mb-0 lg:w-[40vw] grid grid-cols-12" id="constable-section">
                        <div class="col-span-12 md:col-span-9 border">
                            <div class="h-full p-2 flex justify-center md:justify-start items-center">
                                CONSTABLE
                            </div>
                        </div>
                        <div class="col-span-12 md:col-span-3 border">
                            <div class="h-full p-2 text-center">
                                <button type="button"
                                    class="p-1 px-2 bg-gray-200 hover:bg-blue-600 hover:text-white text-xs w-full add-post-btn"
                                    data-section="constable"
                                    @if ($postStatuses['constable']) style="display: none;" @endif>
                                    <i class="bi bi-plus-lg pr-1"></i>ADD POST
                                </button>
                                <button type="button"
                                    class="p-1 px-2 text-green-600 text-xs w-full pe-none post-added-btn"
                                    @if (!$postStatuses['constable']) style="display: none;" @endif>
                                    <i class="bi bi-check-all pr-1"></i>POST ADDED
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <p class="mb-4 text-gray-600 border-b">List of post's with preference order</p>
            <div class="lg:w-[60vw] hidden md:grid grid-cols-12">
                <div class="col-span-2 border">
                    <div class="h-full p-2 text-sm lg:text-md text-center">
                        Preference Number
                    </div>
                </div>
                <div class="col-span-7 border">
                    <div class="h-full p-2 text-sm lg:text-md">
                        Post Name
                    </div>
                </div>
                <div class="col-span-3 border">
                    <div class="h-full p-2 text-sm lg:text-md text-center">
                        #
                    </div>
                </div>
            </div>
            <div id="post-list-container">
                @foreach ($preferences as $preference)
                    <div class="mb-8 post-list-item" data-post-id="{{ $preference->post_id }}">
                        <div class="lg:w-[60vw] grid grid-cols-12">
                            <div class="col-span-2 md:col-span-2 border">
                                <div class="h-full p-2 text-center">
                                    {{ $preference->preferences }}
                                </div>
                            </div>
                            <div class="col-span-10 md:col-span-7 border">
                                <div class="h-full p-2">
                                    @if ($preference->post_id == 1)
                                        AB (ARMED BRANCH)
                                    @elseif ($preference->post_id == 2)
                                        UB (UNARMED BRANCH)
                                    @else
                                        CONSTABLE
                                    @endif
                                </div>
                            </div>
                            <div class="col-span-12 md:col-span-3 border">
                                <div class="h-full p-2 text-center">
                                    @if ($preference->preference == 1)
                                        <button type="button"
                                            class="p-1 px-2 rounded bg-gray-200 hover:bg-gray-600 hover:text-white updatePref"
                                            disabled prefId="{{ $preference->id }}">
                                            <i class="bi bi-chevron-up"></i>
                                        </button>
                                    @else
                                        <button type="button"
                                            class="p-1 px-2 rounded bg-gray-200 hover:bg-gray-600 hover:text-white updatePref"
                                            prefId="{{ $preference->id }}" typeId="1">
                                            <i class="bi bi-chevron-up"></i>
                                        </button>
                                    @endif
                                    @if ($preference->preference == $preferences->count())
                                        <button type="button"
                                            class="p-1 px-2 rounded bg-gray-200 hover:bg-gray-600 hover:text-white updatePref"
                                            disabled prefId="{{ $preference->id }}">
                                            <i class="bi bi-chevron-down"></i>
                                        </button>
                                    @else
                                        <button type="button"
                                            class="p-1 px-2 rounded bg-gray-200 hover:bg-gray-600 hover:text-white updatePref"
                                            prefId="{{ $preference->id }}" typeId="2">
                                            <i class="bi bi-chevron-down"></i>
                                        </button>
                                    @endif
                                    <button type="button"
                                        class="p-1 px-2 rounded bg-gray-200 hover:bg-gray-400 text-red-500 updatePref"
                                        prefId="{{ $preference->id }}" typeId="3"> <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="mt-auto px-4 flex items-center">
    <a class="inline-block bg-gray-600 hover:bg-gray-700 text-white p-2 rounded-md Nunito"
        href="{{ route('questionaries') }}"><i class="bi bi-arrow-left-short pr-1"></i>Go Back</a>
    <a class="ml-auto inline-block bg-green-600 hover:bg-green-700 text-white p-2 rounded-md Nunito {{ !empty($check) ? '' : 'hidden' }}"
        href="{{ route('profile') }}"><i class="bi bi-check-all pr-1"></i>Save & proceede</a>
</div>

@include('layouts.footer')
@include('layouts.custom-scripts.preferenceScript')
