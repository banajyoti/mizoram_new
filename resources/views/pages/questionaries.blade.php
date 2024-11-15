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
                <a
                    class="grow inline-block lg:w-full border border-green-600 shadow-md rounded-lg p-2 flex items-center text-green-600 font-medium transition-all text-xs">
                    <div class="h-8 w-8 bg-gray-200 rounded-full lg:mr-2 text-black text-xs flex"><span
                            class="m-auto text-sm TimesNR">Q</span></div>
                    <span class="hidden lg:inline-block">Questionaries</span>
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

    <div class="p-4 grow border border-gray-300 rounded-lg space-y-4">
        <p class="m-auto text-yellow-500 text-center rounded-md text-[0.65rem] md:text-sm font-medium">Candidate need to
            fillout all the mandatory <span class="text-red-600">*</span> questions.</p>
        <form id="myForm" action="" method="post">
            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
            <div class="grid grid-cols-2 gap-6">
                <div class="col-span-2 lg:col-span-1 p-0 md:p-6 md:py-8 border rounded-lg border-gray-300">
                    <div class="h-full">
                        <div class="flex items-center">
                            <i class="bi bi-grip-vertical pr-2 hidden md:block"></i>
                            <div class="grow p-2 md:p-4 bg-gray-100 rounded-t-lg md:rounded-lg space-y-2">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center text-gray-500">
                                        <i class="bi bi-bezier text-lg pr-1"></i>
                                        <span class="text-xs font-semibold">MIZO Language Proficiency</span>
                                    </div>
                                    <div class="flex items-center text-gray-500">
                                        <span class="text-xs font-semibold"><span
                                                class="text-lg text-red-600 pr-1">*</span>Required</span>
                                        <i class="bi bi-align-top text-lg pr-1"></i>
                                    </div>
                                </div>
                                <div class="flex lg:items-start 2xl:items-center">
                                    <i class="bi bi-1-circle-fill text-blue-600 text-xl mr-2"></i>
                                    <p class="text-md">Have you achieved a minimum score in Mizo Language Proficiency
                                        qualifying test?</p>
                                </div>
                            </div>
                        </div>
                        <div class="my-2 md:mt-2 flex items-center gap-1 md:gap-2">
                            <p class="px-6 text-gray-500 hidden md:block" id="min_score_display">
                                Answer<i class="bi bi-1-circle text-sm text-gray-400 px-1"></i>:
                                @if ($data && isset($data->min_score_mizo))
                                    @if ($data->min_score_mizo == 1)
                                        I have
                                    @else
                                        I haven't
                                    @endif
                                @else
                                    Data not available
                                @endif
                            </p>
                            <div class="ml-auto">
                                <input id="no_min_score_mizo" {{ ($data->min_score_mizo ?? '') == 0 ? 'checked' : '' }}
                                    value="0" type="radio" name="min_score_mizo" class="hidden peer">
                                <label for="no_min_score_mizo"
                                    class="inline-block border border-gray-300 hover:border-gray-600 hover:text-gray-800 peer-checked:border-gray-600 peer-checked:bg-gray-600 peer-checked:text-white rounded-md h-11 w-28 flex items-center justify-center text-sm">No,
                                    i haven't.</label>
                            </div>
                            <div class="mr-2 md:mr-0">
                                <input id="yes_min_score_mizo"
                                    {{ ($data->min_score_mizo ?? '') == 1 ? 'checked' : '' }} value="1"
                                    type="radio" name="min_score_mizo" class="hidden peer">
                                <label for="yes_min_score_mizo"
                                    class="inline-block border border-gray-300 hover:border-blue-600 hover:text-blue-800 peer-checked:border-blue-600 peer-checked:bg-blue-600 peer-checked:text-white rounded-md h-11 w-28 flex items-center justify-center text-sm">Yes,
                                    i have.</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-2 lg:col-span-1 p-0 md:p-6 md:py-8 border rounded-lg border-gray-300">
                    <div class="h-full">
                        <div class="flex items-center">
                            <i class="bi bi-grip-vertical pr-2 hidden md:block"></i>
                            <div class="grow p-2 md:p-4 bg-gray-100 rounded-t-lg md:rounded-lg space-y-2">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center text-gray-500">
                                        <i class="bi bi-bezier text-lg pr-1"></i>
                                        <span class="text-xs font-semibold">MIZO Language Proficiency</span>
                                    </div>
                                    <div class="flex items-center text-gray-500">
                                        <span class="text-xs font-semibold"><span
                                                class="text-lg text-red-600 pr-1">*</span>Required</span>
                                        <i class="bi bi-align-top text-lg pr-1"></i>
                                    </div>
                                </div>
                                <div class="flex lg:items-start 2xl:items-center">
                                    <i class="bi bi-2-circle-fill text-blue-600 text-xl mr-2"></i>
                                    <p class="text-md">Have you studied Mizo subject in Class-X standard (HSLC) or
                                        above within Mizoram?</p>
                                </div>
                            </div>
                        </div>
                        <div class="my-2 md:mt-2 flex items-center gap-1 md:gap-2">
                            <p class="px-6 text-gray-500 hidden md:block" id="min_score_display">
                                Answer<i class="bi bi-1-circle text-sm text-gray-400 px-1"></i>:
                                @if ($data && isset($data->class_x_mizo))
                                    @if ($data->class_x_mizo == 1)
                                        i have
                                    @else
                                        i haven't
                                    @endif
                                @else
                                    Data not available
                                @endif
                            </p>
                            <div class="ml-auto">
                                <input id="no_class_x_mizo" {{ ($data->class_x_mizo ?? '') == 0 ? 'checked' : '' }}
                                    value="0" type="radio" name="class_x_mizo" class="hidden peer">
                                <label for="no_class_x_mizo"
                                    class="inline-block border border-gray-300 hover:border-gray-600 hover:text-gray-800 peer-checked:border-gray-600 peer-checked:bg-gray-600 peer-checked:text-white rounded-md h-11 w-28 flex items-center justify-center text-sm">No,
                                    i haven't.</label>
                            </div>
                            <div class="mr-2 md:mr-0">
                                <input id="yes_class_x_mizo" {{ ($data->class_x_mizo ?? '') == 1 ? 'checked' : '' }}
                                    value="1" type="radio" name="class_x_mizo" class="hidden peer">
                                <label for="yes_class_x_mizo"
                                    class="inline-block border border-gray-300 hover:border-blue-600 hover:text-blue-800 peer-checked:border-blue-600 peer-checked:bg-blue-600 peer-checked:text-white rounded-md h-11 w-28 flex items-center justify-center text-sm">Yes,
                                    i have.</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-2 lg:col-span-1 p-0 md:p-6 md:py-8 border rounded-lg border-gray-300">
                    <div class="h-full">
                        <div class="flex items-center">
                            <i class="bi bi-grip-vertical pr-2 hidden md:block"></i>
                            <div class="grow p-2 md:p-4 bg-gray-100 rounded-t-lg md:rounded-lg space-y-2">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center text-gray-500">
                                        <i class="bi bi-bezier text-lg pr-1"></i>
                                        <span class="text-xs font-semibold">MIZO Language Proficiency</span>
                                    </div>
                                    <div class="flex items-center text-gray-500">
                                        <span class="text-xs font-semibold"><span
                                                class="text-lg text-red-600 pr-1">*</span>Required</span>
                                        <i class="bi bi-align-top text-lg pr-1"></i>
                                    </div>
                                </div>
                                <div class="flex lg:items-start xl:items-center">
                                    <i class="bi bi-3-circle-fill text-blue-600 text-xl mr-2"></i>
                                    <p class="text-md">Have you studied Mizo subject as MIL in Class-X standard in
                                        outside Mizoram?</p>
                                </div>
                            </div>
                        </div>
                        <div class="my-2 md:mt-2 flex items-center gap-1 md:gap-2">
                            <p class="px-6 text-gray-500 hidden md:block" id="min_score_display">
                                Answer<i class="bi bi-1-circle text-sm text-gray-400 px-1"></i>:
                                @if ($data && isset($data->mizo_as_mil))
                                    @if ($data->class_x_mizo == 1)
                                        i have
                                    @else
                                        i haven't
                                    @endif
                                @else
                                    Data not available
                                @endif
                            </p>
                            <div class="ml-auto">
                                <input id="no_mizo_as_mil" {{ ($data->mizo_as_mil ?? '') == 0 ? 'checked' : '' }}
                                    value="0" type="radio" name="mizo_as_mil" class="hidden peer">
                                <label for="no_mizo_as_mil"
                                    class="inline-block border border-gray-300 hover:border-gray-600 hover:text-gray-800 peer-checked:border-gray-600 peer-checked:bg-gray-600 peer-checked:text-white rounded-md h-11 w-28 flex items-center justify-center text-sm">No,
                                    i haven't.</label>
                            </div>
                            <div class="mr-2 md:mr-0">
                                <input id="yes_mizo_as_mil" {{ ($data->mizo_as_mil ?? '') == 1 ? 'checked' : '' }}
                                    value="1" type="radio" name="mizo_as_mil" class="hidden peer">
                                <label for="yes_mizo_as_mil"
                                    class="inline-block border border-gray-300 hover:border-blue-600 hover:text-blue-800 peer-checked:border-blue-600 peer-checked:bg-blue-600 peer-checked:text-white rounded-md h-11 w-28 flex items-center justify-center text-sm">Yes,
                                    i have.</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-2 lg:col-span-1 p-0 md:p-6 md:py-8 border rounded-lg border-gray-300">
                    <div class="h-full">
                        <div class="flex items-center">
                            <i class="bi bi-grip-vertical pr-2 hidden md:block"></i>
                            <div class="grow p-2 md:p-4 bg-gray-100 rounded-t-lg md:rounded-lg space-y-2">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center text-gray-500">
                                        <i class="bi bi-bezier text-lg pr-1"></i>
                                        <span class="text-xs font-semibold">Certificate</span>
                                    </div>
                                    <div class="flex items-center text-gray-500">
                                        <span class="text-xs font-semibold"><span
                                                class="text-lg text-red-600 pr-1">*</span>Required</span>
                                        <i class="bi bi-align-top text-lg pr-1"></i>
                                    </div>
                                </div>
                                <div class="flex lg:items-start xl:items-center">
                                    <i class="bi bi-4-circle-fill text-blue-600 text-xl mr-2"></i>
                                    <p class="text-md">Do you have Computer Certificate?</p>
                                </div>
                            </div>
                        </div>
                        <div class="my-2 md:mt-2 flex items-center gap-1 md:gap-2">
                            <p class="px-6 text-gray-500 hidden md:block" id="min_score_display">
                                Answer<i class="bi bi-1-circle text-sm text-gray-400 px-1"></i>:
                                @if ($data && isset($data->comp_cert))
                                    @if ($data->comp_cert == 1)
                                        i have
                                    @else
                                        i don't.
                                    @endif
                                @else
                                    Data not available
                                @endif
                            </p>
                            <div class="ml-auto">
                                <input id="no_comp_cert" {{ ($data->comp_cert ?? '') == 0 ? 'checked' : '' }}
                                    value="0" type="radio" name="comp_cert" class="hidden peer">
                                <label for="no_comp_cert"
                                    class="inline-block border border-gray-300 hover:border-gray-600 hover:text-gray-800 peer-checked:border-gray-600 peer-checked:bg-gray-600 peer-checked:text-white rounded-md h-11 w-28 flex items-center justify-center text-sm">No,
                                    i don't.</label>
                            </div>
                            <div class="mr-2 md:mr-0">
                                <input id="yes_comp_cert" {{ ($data->comp_cert ?? '') == 1 ? 'checked' : '' }}
                                    value="1" type="radio" name="comp_cert" class="hidden peer">
                                <label for="yes_comp_cert"
                                    class="inline-block border border-gray-300 hover:border-blue-600 hover:text-blue-800 peer-checked:border-blue-600 peer-checked:bg-blue-600 peer-checked:text-white rounded-md h-11 w-28 flex items-center justify-center text-sm">Yes,
                                    i have.</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-2 lg:col-span-1 p-0 md:p-6 md:py-8 border rounded-lg border-gray-300">
                    <div class="h-full">
                        <div class="flex items-center">
                            <i class="bi bi-grip-vertical pr-2 hidden md:block"></i>
                            <div class="grow p-2 md:p-4 bg-gray-100 rounded-t-lg md:rounded-lg space-y-2">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center text-gray-500">
                                        <i class="bi bi-bezier text-lg pr-1"></i>
                                        <span class="text-xs font-semibold">Certificate</span>
                                    </div>
                                    <div class="flex items-center text-gray-500">
                                        <span class="text-xs font-semibold"><span
                                                class="text-lg text-red-600 pr-1">*</span>Required</span>
                                        <i class="bi bi-align-top text-lg pr-1"></i>
                                    </div>
                                </div>
                                <div class="flex lg:items-start xl:items-center">
                                    <i class="bi bi-5-circle-fill text-blue-600 text-xl mr-2"></i>
                                    <p class="text-md">Do you have NCC Certificate?</p>
                                </div>
                            </div>
                        </div>
                        <div class="my-2 md:mt-2 flex items-center gap-1 md:gap-2 ncc_answer_div">
                            <p class="px-6 text-gray-500 hidden md:block" id="min_score_display">
                                Answer<i class="bi bi-1-circle text-sm text-gray-400 px-1"></i>:
                                @if ($data && isset($data->ncc_cert))
                                    @if ($data->ncc_cert == 1)
                                        i have
                                    @else
                                        i don't.
                                    @endif
                                @else
                                    Data not available
                                @endif
                            </p>
                            <div class="ml-auto">
                                <input id="no_ncc_cert" {{ ($data->ncc_cert ?? '') == 0 ? 'checked' : '' }}
                                    value="0" type="radio" name="ncc_cert" class="hidden peer">
                                <label for="no_ncc_cert"
                                    class="inline-block border border-gray-300 hover:border-gray-600 hover:text-gray-800 peer-checked:border-gray-600 peer-checked:bg-gray-600 peer-checked:text-white rounded-md h-11 w-28 flex items-center justify-center text-sm">No,
                                    i don't.</label>
                            </div>
                            <div class="mr-2 md:mr-0">
                                <input id="yes_ncc_cert" {{ ($data->ncc_cert ?? '') == 1 ? 'checked' : '' }}
                                    value="1" type="radio" name="ncc_cert" class="hidden peer">
                                <label for="yes_ncc_cert"
                                    class="inline-block border border-gray-300 hover:border-blue-600 hover:text-blue-800 peer-checked:border-blue-600 peer-checked:bg-blue-600 peer-checked:text-white rounded-md h-11 w-28 flex items-center justify-center text-sm">Yes,
                                    i have.</label>
                            </div>
                        </div>
                        <div class="m-2 flex lg:flex-col xl:flex-row items-center choose_ncc_div hidden">
                            <p class="px-6 text-gray-500 hidden md:block mr-auto xl:mr-0" id="ncc_grade_display">
                                Choose NCC Grade:</p>
                            <div class="flex items-center gap-1 ml-auto">
                                <div class="xl:ml-auto flex items-center">
                                    <div
                                        class="flex items-center p-2 mx-1 border border-gray-300 hover:border-blue-500 rounded-md">
                                        <input id="bordered-radio-1" type="radio" value="1" name="ncc_grade"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                            @if (isset($data->ncc_grade) && $data->ncc_grade == 1) checked @endif>
                                        <label for="bordered-radio-1" class="w-full ms-2 text-sm text-gray-900">
                                            <span class="hidden md:inline-block">NCC:</span>
                                            <span class="ps-1 font-medium text-lg">A</span>
                                        </label>
                                    </div>

                                    <div
                                        class="flex items-center p-2 mx-1 border border-gray-300 hover:border-blue-500 rounded-md">
                                        <input id="bordered-radio-2" type="radio" value="2" name="ncc_grade"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                            @if (isset($data->ncc_grade) && $data->ncc_grade == 2) checked @endif>
                                        <label for="bordered-radio-2" class="w-full ms-2 text-sm text-gray-900">
                                            <span class="hidden md:inline-block">NCC:</span>
                                            <span class="ps-1 font-medium text-lg">B</span>
                                        </label>
                                    </div>

                                    <div
                                        class="flex items-center p-2 mx-1 border border-gray-300 hover:border-blue-500 rounded-md">
                                        <input id="bordered-radio-3" type="radio" value="3" name="ncc_grade"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                            @if (isset($data->ncc_grade) && $data->ncc_grade == 3) checked @endif>
                                        <label for="bordered-radio-3" class="w-full ms-2 text-sm text-gray-900">
                                            <span class="hidden md:inline-block">NCC:</span>
                                            <span class="ps-1 font-medium text-lg">C</span>
                                        </label>
                                    </div>
                                </div>

                                <button type="button"
                                    class="p-2.5 border border-gray-300 hover:border-red-500 rounded-md hover:text-red-500 revert_ncc_choise"
                                    title="Revert NCC choise"><i class="bi bi-x-lg"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-2 lg:col-span-1 p-0 md:p-6 md:py-8 border rounded-lg border-gray-300">
                    <div class="h-full">
                        <div class="flex items-center">
                            <i class="bi bi-grip-vertical pr-2 hidden md:block"></i>
                            <div class="grow p-2 md:p-4 bg-gray-100 rounded-t-lg md:rounded-lg space-y-2">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center text-gray-500">
                                        <i class="bi bi-bezier text-lg pr-1"></i>
                                        <span class="text-xs font-semibold">Home Guard Volunteers</span>
                                    </div>
                                    <div class="flex items-center text-gray-500">
                                        <span class="text-xs font-semibold"><span
                                                class="text-lg text-red-600 pr-1">*</span>Required</span>
                                        <i class="bi bi-align-top text-lg pr-1"></i>
                                    </div>
                                </div>
                                <div class="flex lg:items-start xl:items-center">
                                    <i class="bi bi-6-circle-fill text-blue-600 text-xl mr-2"></i>
                                    <p class="text-md">Are you a Home Guard Volunteer (MRHG)?</p>
                                </div>
                            </div>
                        </div>
                        <div class="my-2 md:mt-2 flex items-center gap-1 md:gap-2">
                            <p class="px-6 text-gray-500 hidden md:block" id="min_score_display">
                                Answer<i class="bi bi-1-circle text-sm text-gray-400 px-1"></i>:
                                @if ($data && isset($data->home_guard))
                                    @if ($data->home_guard == 1)
                                        i'm.
                                    @else
                                        i'm not.
                                    @endif
                                @else
                                    Data not available
                                @endif
                            </p>
                            <div class="ml-auto">
                                <input id="no_home_guard" {{ ($data->home_guard ?? '') == 0 ? 'checked' : '' }}
                                    value="0" type="radio" name="home_guard" class="hidden peer">
                                <label for="no_home_guard"
                                    class="inline-block border border-gray-300 hover:border-gray-600 hover:text-gray-800 peer-checked:border-gray-600 peer-checked:bg-gray-600 peer-checked:text-white rounded-md h-11 w-28 flex items-center justify-center text-sm">No,
                                    i'm.</label>
                            </div>
                            <div class="mr-2 md:mr-0">
                                <input id="yes_home_guard" {{ ($data->home_guard ?? '') == 1 ? 'checked' : '' }}
                                    value="1" type="radio" name="home_guard" class="hidden peer">
                                <label for="yes_home_guard"
                                    class="inline-block border border-gray-300 hover:border-blue-600 hover:text-blue-800 peer-checked:border-blue-600 peer-checked:bg-blue-600 peer-checked:text-white rounded-md h-11 w-28 flex items-center justify-center text-sm">Yes,
                                    i'm not.</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-2 lg:col-span-1 p-0 md:p-6 md:py-8 border rounded-lg border-gray-300">
                    <div class="h-full">
                        <div class="flex items-center">
                            <i class="bi bi-grip-vertical pr-2 hidden md:block"></i>
                            <div class="grow p-2 md:p-4 bg-gray-100 rounded-t-lg md:rounded-lg space-y-2">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center text-gray-500">
                                        <i class="bi bi-bezier text-lg pr-1"></i>
                                        <span class="text-xs font-semibold">Mechanic</span>
                                    </div>
                                    <div class="flex items-center text-gray-500">
                                        <span class="text-xs font-semibold"><span
                                                class="text-lg text-red-600 pr-1">*</span>Required</span>
                                        <i class="bi bi-align-top text-lg pr-1"></i>
                                    </div>
                                </div>
                                <div class="flex lg:items-start xl:items-center">
                                    <i class="bi bi-7-circle-fill text-blue-600 text-xl mr-2"></i>
                                    <p class="text-md">Have you completed 1 (one) year training course in concerned
                                        Trade at the Industrial Training Institute or its equivalent institution?</p>
                                </div>
                            </div>
                        </div>
                        <div class="my-2 md:mt-2 flex items-center gap-1 md:gap-2">
                            <p class="px-6 text-gray-500 hidden md:block" id="min_score_display">
                                Answer<i class="bi bi-1-circle text-sm text-gray-400 px-1"></i>:
                                @if ($data && isset($data->iti_eqi))
                                    @if ($data->iti_eqi == 1)
                                        i have.
                                    @else
                                        i haven't.
                                    @endif
                                @else
                                    Data not available
                                @endif
                            </p>
                            <div class="ml-auto">
                                <input id="no_iti_eqi" {{ ($data->iti_eqi ?? '') == 0 ? 'checked' : '' }}
                                    value="0" type="radio" name="iti_eqi" class="hidden peer">
                                <label for="no_iti_eqi"
                                    class="inline-block border border-gray-300 hover:border-gray-600 hover:text-gray-800 peer-checked:border-gray-600 peer-checked:bg-gray-600 peer-checked:text-white rounded-md h-11 w-28 flex items-center justify-center text-sm">No,
                                    i haven't.</label>
                            </div>
                            <div class="mr-2 md:mr-0">
                                <input id="yes_iti_eqi" {{ ($data->iti_eqi ?? '') == 1 ? 'checked' : '' }}
                                    value="1" type="radio" name="iti_eqi" class="hidden peer">
                                <label for="yes_iti_eqi"
                                    class="inline-block border border-gray-300 hover:border-blue-600 hover:text-blue-800 peer-checked:border-blue-600 peer-checked:bg-blue-600 peer-checked:text-white rounded-md h-11 w-28 flex items-center justify-center text-sm">Yes,
                                    i have.</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-2 lg:col-span-1 p-0 md:p-6 md:py-8 border rounded-lg border-gray-300">
                    <div class="h-full">
                        <div class="flex items-center">
                            <i class="bi bi-grip-vertical pr-2 hidden md:block"></i>
                            <div class="grow p-2 md:p-4 bg-gray-100 rounded-t-lg md:rounded-lg space-y-2">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center text-gray-500">
                                        <i class="bi bi-bezier text-lg pr-1"></i>
                                        <span class="text-xs font-semibold">Mechanic</span>
                                    </div>
                                    <div class="flex items-center text-gray-500">
                                        <span class="text-xs font-semibold"><span
                                                class="text-lg text-red-600 pr-1">*</span>Required</span>
                                        <i class="bi bi-align-top text-lg pr-1"></i>
                                    </div>
                                </div>
                                <div class="flex lg:items-start xl:items-center">
                                    <i class="bi bi-8-circle-fill text-blue-600 text-xl mr-2"></i>
                                    <p class="text-md">Do you have work experience of at least 5 (five) years in
                                        Government or private automobile Workshop as a mechanic?</p>
                                </div>
                            </div>
                        </div>
                        <div class="my-2 md:mt-2 flex items-center gap-1 md:gap-2">
                            <p class="px-6 text-gray-500 hidden md:block" id="min_score_display">
                                Answer<i class="bi bi-1-circle text-sm text-gray-400 px-1"></i>:
                                @if ($data && isset($data->auto_mobile))
                                    @if ($data->auto_mobile == 1)
                                        i have.
                                    @else
                                        i haven't.
                                    @endif
                                @else
                                    Data not available
                                @endif
                            </p>
                            <div class="ml-auto">

                                <input id="auto_mobile_1" type="radio"
                                    {{ ($data->auto_mobile ?? '') == 0 ? 'checked' : '' }} value="0"
                                    name="auto_mobile" class="hidden peer">
                                <label for="auto_mobile_1"
                                    class="inline-block border border-gray-300 hover:border-gray-600 hover:text-gray-800 peer-checked:border-gray-600 peer-checked:bg-gray-600 peer-checked:text-white rounded-md h-11 w-28 flex items-center justify-center text-sm">No,
                                    i haven't.</label>
                            </div>
                            <div class="mr-2 md:mr-0">
                                <input id="auto_mobile_2" type="radio"
                                    {{ ($data->auto_mobile ?? '') == 1 ? 'checked' : '' }} value="1"
                                    name="auto_mobile" class="hidden peer">
                                <label for="auto_mobile_2"
                                    class="inline-block border border-gray-300 hover:border-blue-600 hover:text-blue-800 peer-checked:border-blue-600 peer-checked:bg-blue-600 peer-checked:text-white rounded-md h-11 w-28 flex items-center justify-center text-sm">Yes,
                                    i have.</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="px-4 mt-auto flex items-center">
    <a id="save_button" type="submit"
        class="ml-auto inline-block bg-green-600 hover:bg-green-700 text-white p-2 rounded-md Nunito {{ !empty($data) ? '' : 'hidden' }}">
        <i class="bi bi-check-all pr-1"></i>Save & proceed
    </a>
</div>

@include('layouts.footer')
@include('layouts.custom-scripts.questionariesScript')
