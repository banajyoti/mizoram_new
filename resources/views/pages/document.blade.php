@include('layouts.header')

<head>
    <!-- Include SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                <a
                    class="grow inline-block lg:w-full border border-green-600 shadow-md rounded-lg p-2 flex items-center text-green-600 font-medium transition-all text-xs">
                    <div class="h-8 w-8 bg-gray-200 rounded-full lg:mr-2 text-black text-xs flex"><span
                            class="m-auto text-sm TimesNR"><i class="bi bi-file-earmark-pdf"></i></span></div>
                    <span class="hidden lg:inline-block">Document's</span>
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



    <div class="p-1 md:p-4 grow border border-gray-300 rounded-lg space-y-8">
        <p class="m-auto text-yellow-500 text-center rounded-md text-[0.65rem] md:text-sm font-medium">Candidate need to
            upload all the mandatory <span class="text-red-600">*</span> documents.</p>
        <form id="document-form" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-wrap justify-center gap-5">
                <div class="p-2 space-y-2">
                    <div class="flex items-center">
                        <span class="text-sm pr-1">01.</span>
                        <p class="text-xs">Passport size photo</p>
                    </div>
                    <div class="flex items-center justify-center w-full">
                        <label for="photo"
                            class="flex flex-col items-center justify-center h-28 md:h-54 w-32 md:w-48 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 p-2">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                @if (isset($documents->photo) && !empty($documents->photo))
                                    <p class="mb-2 text-[0.65rem] md:text-sm text-gray-500 text-center"><span
                                            class="font-semibold">Document Uploaded</span></p>
                                    <p class="text-[0.65rem] md:text-xs text-gray-500 text-center">JPG, PNG <br
                                            class="block md:hidden">(MAX. SIZE 200kb)</p>
                                @else
                                    <i class="bi bi-cloud-arrow-up text-xl md:text-3xl text-gray-500"></i>
                                    <p class="mb-2 text-[0.65rem] md:text-sm text-gray-500 text-center"><span
                                            class="font-semibold">Click to upload</span></p>
                                    <p class="text-[0.65rem] md:text-xs text-gray-500 text-center">PNG, JPG, JPEG <br
                                            class="block md:hidden">(MAX. SIZE 200kb)</p>
                                @endif
                            </div>
                            <input id="photo" type="file" class="hidden" name="photo" accept="image/*" />
                        </label>
                    </div>

                    @if (isset($documents->photo) && !empty($documents->photo))
                        <a id="photo_view"
                            class="block p-2 bg-gray-200 hover:bg-blue-600 hover:text-white rounded-md text-xs text-center"
                            href="{{ asset('storage/public/uploads/upload_photo/' . $documents->photo) }}"
                            target="_blank">View Document</a>
                    @else
                        <a id="photo_view"
                            class="block p-2 bg-gray-200 hover:bg-blue-600 hover:text-white rounded-md text-xs text-center"
                            href="" target="_blank">View Document</a>
                    @endif
                </div>


                <div class="p-2 space-y-2">
                    <!-- Field 02: Signature -->
                    <div class="flex items-center">
                        <span class="text-sm pr-1">02.</span>
                        <p class="text-xs">Signature</p>
                    </div>
                    <div class="flex items-center justify-center w-full">
                        <label for="signature"
                            class="flex flex-col items-center justify-center h-28 md:h-54 w-32 md:w-48 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 p-2">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                @if (isset($documents->signature) && !empty($documents->signature))
                                    <p class="mb-2 text-[0.65rem] md:text-sm text-gray-500 text-center"><span
                                            class="font-semibold">Document Uploaded</span></p>
                                    <p class="text-[0.65rem] md:text-xs text-gray-500 text-center">JPG, PNG <br
                                            class="block md:hidden">(MAX. SIZE 200kb)</p>
                                @else
                                    <i class="bi bi-cloud-arrow-up text-xl md:text-3xl text-gray-500"></i>
                                    <p class="mb-2 text-[0.65rem] md:text-sm text-gray-500 text-center"><span
                                            class="font-semibold">Click to upload</span></p>
                                    <p class="text-[0.65rem] md:text-xs text-gray-500 text-center">JPG, PNG <br
                                            class="block md:hidden">(MAX. SIZE 200kb)</p>
                                @endif
                            </div>
                            <input id="signature" type="file" class="hidden" name="signature" accept="image/*" />
                        </label>
                    </div>
                    @if (isset($documents->signature) && !empty($documents->signature))
                        <a id="signature_view"
                            class="block p-2 bg-gray-200 hover:bg-blue-600 hover:text-white rounded-md text-xs text-center"
                            href="{{ asset('storage/public/uploads/upload_signature/' . $documents->signature) }}"
                            target="_blank">View Document</a>
                    @else
                        <a id="signature_view"
                            class="block p-2 bg-gray-200 hover:bg-blue-600 hover:text-white rounded-md text-xs text-center"
                            href="" target="_blank">View Document</a>
                    @endif
                </div>

                <div class="p-2 space-y-2">
                    <div class="flex items-center">
                        <span class="text-sm pr-1">03.</span>
                        <p class="text-xs">Age proof Certificate</p>
                    </div>
                    <div class="flex items-center justify-center w-full">
                        <label for="age_proof"
                            class="flex flex-col items-center justify-center h-28 md:h-54 w-32 md:w-48 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 p-2">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                @if (isset($documents->age_prof_cert) && !empty($documents->age_prof_cert))
                                    <p class="mb-2 text-[0.65rem] md:text-sm text-gray-500 text-center"><span
                                            class="font-semibold">Document Uploaded</span></p>
                                    <p class="text-[0.65rem] md:text-xs text-gray-500 text-center">JPG, PNG <br
                                            class="block md:hidden">(MAX. SIZE 200kb)</p>
                                @else
                                    <i class="bi bi-cloud-arrow-up text-xl md:text-3xl text-gray-500"></i>
                                    <p class="mb-2 text-[0.65rem] md:text-sm text-gray-500 text-center"><span
                                            class="font-semibold">Click to upload</span></p>
                                    <p class="text-[0.65rem] md:text-xs text-gray-500 text-center">PDF <br
                                            class="block md:hidden">(MAX. SIZE 200kb)</p>
                                @endif
                            </div>
                            <input id="age_proof" type="file" class="hidden" name="age_prof_cert" />
                        </label>
                    </div>
                    @if (isset($documents->age_prof_cert) && !empty($documents->age_prof_cert))
                        <a id="age_proof_view"
                            class="block p-2 bg-gray-200 hover:bg-blue-600 hover:text-white rounded-md text-xs text-center"
                            href="{{ asset('storage/public/uploads/age_prof_cert/' . $documents->age_prof_cert) }}"
                            target="_blank">View Document</a>
                    @else
                        <a id="age_proof_view"
                            class="block p-2 bg-gray-200 hover:bg-blue-600 hover:text-white rounded-md text-xs text-center"
                            href="" target="_blank">View Document</a>
                    @endif
                </div>

                <div class="p-2 space-y-2">
                    <div class="flex items-center">
                        <span class="text-sm pr-1">04.</span>
                        <p class="text-xs">Class X Marksheet</p>
                    </div>
                    <div class="flex items-center justify-center w-full">
                        <label for="x_marksheet"
                            class="flex flex-col items-center justify-center h-28 md:h-54 w-32 md:w-48 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 p-2">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                @if (isset($documents->class_x_cert) && !empty($documents->class_x_cert))
                                    <p class="mb-2 text-[0.65rem] md:text-sm text-gray-500 text-center"><span
                                            class="font-semibold">Document Uploaded</span></p>
                                    <p class="text-[0.65rem] md:text-xs text-gray-500 text-center">JPG, PNG <br
                                            class="block md:hidden">(MAX. SIZE 200kb)</p>
                                @else
                                    <i class="bi bi-cloud-arrow-up text-xl md:text-3xl text-gray-500"></i>
                                    <p class="mb-2 text-[0.65rem] md:text-sm text-gray-500 text-center"><span
                                            class="font-semibold">Click to upload</span></p>
                                    <p class="text-[0.65rem] md:text-xs text-gray-500 text-center">PDF <br
                                            class="block md:hidden">(MAX. SIZE 200kb)</p>
                                @endif
                            </div>
                            <input id="x_marksheet" type="file" class="hidden" name="class_x_cert" />
                        </label>
                    </div>
                    @if (isset($documents->class_x_cert) && !empty($documents->class_x_cert))
                        <a id="x_marksheet_view"
                            class="block p-2 bg-gray-200 hover:bg-blue-600 hover:text-white rounded-md text-xs text-center"
                            href="{{ asset('storage/public/uploads/class_x_cert/' . $documents->class_x_cert) }}"
                            target="_blank">View Document</a>
                    @else
                        <a id="x_marksheet_view"
                            class="block p-2 bg-gray-200 hover:bg-blue-600 hover:text-white rounded-md text-xs text-center"
                            href="" target="_blank">View Document</a>
                    @endif
                </div>

                @if ($questionaries->min_score_mizo == 1 || $questionaries->mizo_as_mil == 1)
                    <div class="p-2 space-y-2">
                        <div class="flex items-center">
                            <span class="text-sm pr-1">05.</span>
                            @if ($questionaries->min_score_mizo == 1)
                                <p class="text-xs">Mizo Language Proficiency Cert. (Min Score)</p>
                            @elseif ($questionaries->mizo_as_mil == 1)
                                <p class="text-xs">Mizo Language Proficiency Cert. (MIL)</p>
                            @endif
                        </div>
                        <div class="flex items-center justify-center w-full">
                            <label for="mizo_lang_prof"
                                class="flex flex-col items-center justify-center h-28 md:h-54 w-32 md:w-48 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 p-2">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    @if (isset($documents->mizu_lang_cert) && !empty($documents->mizu_lang_cert))
                                        <p class="mb-2 text-[0.65rem] md:text-sm text-gray-500 text-center"><span
                                                class="font-semibold">Document Uploaded</span></p>
                                        <p class="text-[0.65rem] md:text-xs text-gray-500 text-center">JPG, PNG <br
                                                class="block md:hidden">(MAX. SIZE 200kb)</p>
                                    @else
                                        <i class="bi bi-cloud-arrow-up text-xl md:text-3xl text-gray-500"></i>
                                        <p class="mb-2 text-[0.65rem] md:text-sm text-gray-500 text-center"><span
                                                class="font-semibold">Click to upload</span></p>
                                        <p class="text-[0.65rem] md:text-xs text-gray-500 text-center">PDF <br
                                                class="block md:hidden">(MAX. SIZE 200kb)</p>
                                    @endif
                                </div>
                                <input id="mizo_lang_prof" type="file" class="hidden" name="mizu_lang_cert" />
                            </label>
                        </div>
                        @if (isset($documents->mizu_lang_cert) && !empty($documents->mizu_lang_cert))
                            <a id="mizo_lang_prof_view"
                                class="block p-2 bg-gray-200 hover:bg-blue-600 hover:text-white rounded-md text-xs text-center"
                                href="{{ asset('storage/public/uploads/mechanic_ex_cert/' . $documents->mizu_lang_cert) }}"
                                target="_blank">View Document</a>
                        @else
                            <a id="mizo_lang_prof_view"
                                class="block p-2 bg-gray-200 hover:bg-blue-600 hover:text-white rounded-md text-xs text-center"
                                href="" target="_blank">View Document</a>
                        @endif
                    </div>
                @endif

                @if ($questionaries->home_guard == 1)
                    <div class="p-2 space-y-2">
                        <div class="flex items-center">
                            <span class="text-sm pr-1">06.</span>
                            <p class="text-xs">Homeguard Certificate</p>
                        </div>
                        <div class="flex items-center justify-center w-full">
                            <label for="homeguard"
                                class="flex flex-col items-center justify-center h-28 md:h-54 w-32 md:w-48 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 p-2">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    @if (isset($documents->homeguard_cert) && !empty($documents->homeguard_cert))
                                        <p class="mb-2 text-[0.65rem] md:text-sm text-gray-500 text-center"><span
                                                class="font-semibold">Document Uploaded</span></p>
                                        <p class="text-[0.65rem] md:text-xs text-gray-500 text-center">JPG, PNG <br
                                                class="block md:hidden">(MAX. SIZE 200kb)</p>
                                    @else
                                        <i class="bi bi-cloud-arrow-up text-xl md:text-3xl text-gray-500"></i>
                                        <p class="mb-2 text-[0.65rem] md:text-sm text-gray-500 text-center"><span
                                                class="font-semibold">Click to upload</span></p>
                                        <p class="text-[0.65rem] md:text-xs text-gray-500 text-center">PDF <br
                                                class="block md:hidden">(MAX. SIZE 200kb)</p>
                                    @endif
                                </div>
                                <input id="homeguard" type="file" class="hidden" name="homeguard_cert" />
                            </label>
                        </div>
                        @if (isset($documents->homeguard_cert) && !empty($documents->homeguard_cert))
                            <a id="homeguard_view"
                                class="block p-2 bg-gray-200 hover:bg-blue-600 hover:text-white rounded-md text-xs text-center"
                                href="{{ asset('storage/public/uploads/homeguard_cert/' . $documents->homeguard_cert) }}"
                                target="_blank">View Document</a>
                        @else
                            <a id="homeguard_view"
                                class="block p-2 bg-gray-200 hover:bg-blue-600 hover:text-white rounded-md text-xs text-center"
                                href="" target="_blank">View Document</a>
                        @endif
                    </div>
                @endif

                @if (
                    $userDetails->category_id == 2 ||
                        $userDetails->category_id == 3 ||
                        $userDetails->category_id == 4 ||
                        $userDetails->category_id == 5 ||
                        $userDetails->category_id == 6)
                    <div class="p-2 space-y-2">
                        <div class="flex items-center">
                            <span class="text-sm pr-1">07.</span>
                            <p class="text-xs">Cast Certificate</p>
                        </div>
                        <div class="flex items-center justify-center w-full">
                            <label for="cast_cert"
                                class="flex flex-col items-center justify-center h-28 md:h-54 w-32 md:w-48 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 p-2">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    @if (isset($documents->caste_cert) && !empty($documents->caste_cert))
                                        <p class="mb-2 text-[0.65rem] md:text-sm text-gray-500 text-center"><span
                                                class="font-semibold">Document Uploaded</span></p>
                                        <p class="text-[0.65rem] md:text-xs text-gray-500 text-center">JPG, PNG <br
                                                class="block md:hidden">(MAX. SIZE 200kb)</p>
                                    @else
                                        <i class="bi bi-cloud-arrow-up text-xl md:text-3xl text-gray-500"></i>
                                        <p class="mb-2 text-[0.65rem] md:text-sm text-gray-500 text-center"><span
                                                class="font-semibold">Click to upload</span></p>
                                        <p class="text-[0.65rem] md:text-xs text-gray-500 text-center">PDF <br
                                                class="block md:hidden">(MAX. SIZE 200kb)</p>
                                    @endif
                                </div>
                                <input id="cast_cert" type="file" class="hidden" name="caste_cert" />
                            </label>
                        </div>
                        @if (isset($documents->caste_cert) && !empty($documents->caste_cert))
                            <a id="cast_cert_view"
                                class="block p-2 bg-gray-200 hover:bg-blue-600 hover:text-white rounded-md text-xs text-center"
                                href="{{ asset('storage/public/uploads/caste_cert/' . $documents->caste_cert) }}"
                                target="_blank">View Document</a>
                        @else
                            <a id="cast_cert_view"
                                class="block p-2 bg-gray-200 hover:bg-blue-600 hover:text-white rounded-md text-xs text-center"
                                href="" target="_blank">View Document</a>
                        @endif
                    </div>
                @endif

                @if ($questionaries->ncc_cert == 1)
                    <div class="p-2 space-y-2">
                        <div class="flex items-center">
                            <span class="text-sm pr-1">08.</span>
                            <p class="text-xs">NCC Certificate</p>
                        </div>
                        <div class="flex items-center justify-center w-full">
                            <label for="ncc"
                                class="flex flex-col items-center justify-center h-28 md:h-54 w-32 md:w-48 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 p-2">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    @if (isset($documents->ncc_cert) && !empty($documents->ncc_cert))
                                        <p class="mb-2 text-[0.65rem] md:text-sm text-gray-500 text-center"><span
                                                class="font-semibold">Document Uploaded</span></p>
                                        <p class="text-[0.65rem] md:text-xs text-gray-500 text-center">JPG, PNG <br
                                                class="block md:hidden">(MAX. SIZE 200kb)</p>
                                    @else
                                        <i class="bi bi-cloud-arrow-up text-xl md:text-3xl text-gray-500"></i>
                                        <p class="mb-2 text-[0.65rem] md:text-sm text-gray-500 text-center"><span
                                                class="font-semibold">Click to upload</span></p>
                                        <p class="text-[0.65rem] md:text-xs text-gray-500 text-center">PDF <br
                                                class="block md:hidden">(MAX. SIZE 200kb)</p>
                                    @endif
                                </div>
                                <input id="ncc" type="file" class="hidden" name="ncc_cert" />
                            </label>
                        </div>
                        @if (isset($documents->ncc_cert) && !empty($documents->ncc_cert))
                            <a id="ncc_view"
                                class="block p-2 bg-gray-200 hover:bg-blue-600 hover:text-white rounded-md text-xs text-center"
                                href="{{ asset('storage/public/uploads/ncc_cert/' . $documents->ncc_cert) }}"
                                target="_blank">View Document</a>
                        @else
                            <a id="ncc_view"
                                class="block p-2 bg-gray-200 hover:bg-blue-600 hover:text-white rounded-md text-xs text-center"
                                href="" target="_blank">View Document</a>
                        @endif
                    </div>
                @endif


                <div class="p-2 space-y-2">
                    <div class="flex items-center">
                        <span class="text-sm pr-1">09.</span>
                        <p class="text-xs">Computer Certificate</p>
                    </div>
                    <div class="flex items-center justify-center w-full">
                        <label for="computer_cert"
                            class="flex flex-col items-center justify-center h-28 md:h-54 w-32 md:w-48 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 p-2">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                @if (isset($documents->comp_cert) && !empty($documents->comp_cert))
                                    <p class="mb-2 text-[0.65rem] md:text-sm text-gray-500 text-center"><span
                                            class="font-semibold">Document Uploaded</span></p>
                                    <p class="text-[0.65rem] md:text-xs text-gray-500 text-center">JPG, PNG <br
                                            class="block md:hidden">(MAX. SIZE 200kb)</p>
                                @else
                                    <i class="bi bi-cloud-arrow-up text-xl md:text-3xl text-gray-500"></i>
                                    <p class="mb-2 text-[0.65rem] md:text-sm text-gray-500 text-center"><span
                                            class="font-semibold">Click to upload</span></p>
                                    <p class="text-[0.65rem] md:text-xs text-gray-500 text-center">PDF <br
                                            class="block md:hidden">(MAX. SIZE 200kb)</p>
                                @endif
                            </div>
                            <input id="computer_cert" type="file" class="hidden" name="comp_cert" accept="application/pdf" />
                        </label>
                    </div>
                    @if (isset($documents->comp_cert) && !empty($documents->comp_cert))
                        <a id="computer_cert_view"
                            class="block p-2 bg-gray-200 hover:bg-blue-600 hover:text-white rounded-md text-xs text-center"
                            href="{{ asset('storage/public/uploads/comp_cert/' . $documents->comp_cert) }}"
                            target="_blank">View Document</a>
                    @else
                        <a id="computer_cert_view"
                            class="block p-2 bg-gray-200 hover:bg-blue-600 hover:text-white rounded-md text-xs text-center"
                            href="" target="_blank">View Document</a>
                    @endif
                </div>

                @if ($questionaries->auto_mobile == 1)
                    <div class="p-2 space-y-2">
                        <div class="flex items-center">
                            <span class="text-sm pr-1">10.</span>
                            <p class="text-xs">Mechanic Experience Certificate</p>
                        </div>
                        <div class="flex items-center justify-center w-full">
                            <label for="mechanic_cert"
                                class="flex flex-col items-center justify-center h-28 md:h-54 w-32 md:w-48 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 p-2">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    @if (isset($documents->mechanic_ex_cert) && !empty($documents->mechanic_ex_cert))
                                        <p class="mb-2 text-[0.65rem] md:text-sm text-gray-500 text-center"><span
                                                class="font-semibold">Document Uploaded</span></p>
                                        <p class="text-[0.65rem] md:text-xs text-gray-500 text-center">JPG, PNG <br
                                                class="block md:hidden">(MAX. SIZE 200kb)</p>
                                    @else
                                        <i class="bi bi-cloud-arrow-up text-xl md:text-3xl text-gray-500"></i>
                                        <p class="mb-2 text-[0.65rem] md:text-sm text-gray-500 text-center"><span
                                                class="font-semibold">Click to upload</span></p>
                                        <p class="text-[0.65rem] md:text-xs text-gray-500 text-center">PDF <br
                                                class="block md:hidden">(MAX. SIZE 200kb)</p>
                                    @endif
                                </div>
                                <input id="mechanic_cert" type="file" class="hidden" name="mechanic_ex_cert" />
                            </label>
                        </div>
                        @if (isset($documents->mechanic_ex_cert) && !empty($documents->mechanic_ex_cert))
                            <a id="mechanic_cert_view"
                                class="block p-2 bg-gray-200 hover:bg-blue-600 hover:text-white rounded-md text-xs text-center"
                                href="{{ asset('storage/public/uploads/mechanic_ex_cert/' . $documents->mechanic_ex_cert) }}"
                                target="_blank">View Document</a>
                        @else
                            <a id="mechanic_cert_view"
                                class="block p-2 bg-gray-200 hover:bg-blue-600 hover:text-white rounded-md text-xs text-center"
                                href="" target="_blank">View Document</a>
                        @endif
                    </div>
                @endif

                @if ($questionaries->iti_eqi == 1)
                    <div class="p-2 space-y-2">
                        <div class="flex items-center">
                            <span class="text-sm pr-1">11.</span>
                            <p class="text-xs">Industrial Training Institute Certificate</p>
                        </div>
                        <div class="flex items-center justify-center w-full">
                            <label for="iti_cert"
                                class="flex flex-col items-center justify-center h-28 md:h-54 w-32 md:w-48 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 p-2">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    @if (isset($documents->iti_ex_cert) && !empty($documents->iti_ex_cert))
                                        <p class="mb-2 text-[0.65rem] md:text-sm text-gray-500 text-center"><span
                                                class="font-semibold">Document Uploaded</span></p>
                                        <p class="text-[0.65rem] md:text-xs text-gray-500 text-center">JPG, PNG <br
                                                class="block md:hidden">(MAX. SIZE 200kb)</p>
                                    @else
                                        <i class="bi bi-cloud-arrow-up text-xl md:text-3xl text-gray-500"></i>
                                        <p class="mb-2 text-[0.65rem] md:text-sm text-gray-500 text-center"><span
                                                class="font-semibold">Click to upload</span></p>
                                        <p class="text-[0.65rem] md:text-xs text-gray-500 text-center">PDF <br
                                                class="block md:hidden">(MAX. SIZE 200kb)</p>
                                    @endif
                                </div>
                                <input id="iti_cert" type="file" class="hidden" name="iti_ex_cert" />
                            </label>
                        </div>
                        @if (isset($documents->iti_ex_cert) && !empty($documents->iti_ex_cert))
                            <a id="iti_cert_view"
                                class="block p-2 bg-gray-200 hover:bg-blue-600 hover:text-white rounded-md text-xs text-center"
                                href="{{ asset('storage/public/uploads/iti_ex_cert/' . $documents->iti_ex_cert) }}"
                                target="_blank">View Document</a>
                        @else
                            <a id="iti_cert_view"
                                class="block p-2 bg-gray-200 hover:bg-blue-600 hover:text-white rounded-md text-xs text-center"
                                href="" target="_blank">View Document</a>
                        @endif
                    </div>
                @endif
            </div>
        </form>
    </div>
</div>
<div class="mt-auto px-4 flex items-center">
    <a class="inline-block bg-gray-600 hover:bg-gray-700 text-white p-2 rounded-md Nunito"
        href="{{ route('profile') }}"><i class="bi bi-arrow-left-short pr-1"></i>Go Back</a>
    <a class="ml-auto inline-block bg-green-600 hover:bg-green-700 text-white p-2 rounded-md Nunito"
        href="javascript:void(0);" id="save-proceed-btn">
        <i class="bi bi-check-all pr-1"></i>Save & Proceed
    </a>
</div>

@include('layouts.footer')
@include('layouts.custom-scripts.documentScript')
