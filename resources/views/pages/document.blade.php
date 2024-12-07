@include('layouts.header')

<head>
    <!-- Include SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        #imageModal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 9999;
        }

        #enlargedImage {
            max-width: 100%;
            max-height: 80vh;
            object-fit: contain;
        }

        #closeModal {
            font-size: 24px;
            color: #333;
            cursor: pointer;
        }
    </style>

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


    @php $count = 1; @endphp
    <div class="p-1 md:p-4 grow border border-gray-300 rounded-lg space-y-8">
        <p class="m-auto text-yellow-500 text-center rounded-md text-[0.65rem] md:text-sm font-medium">Candidate need to
            upload all the mandatory <span class="text-red-600">*</span> documents.</p>
        <table class="min-w-full table-auto border-collapse border border-gray-300">
            <thead>
                <tr class="text-center align-middle text-sm font-semibold border-b border-gray-300">
                    <td class="theme-2 w-1/12 border-r border-gray-300">
                        <p class="m-0 text-lg font-semibold">Sl. No.</p>
                    </td>
                    <td class="theme-2 w-3/12 border-r border-gray-300">
                        <p class="m-0 text-lg font-semibold">Document Name </p>
                    </td>
                    <td class="theme-2 w-2/12 border-r border-gray-300">
                        <p class="m-0 text-lg font-semibold">Action</p>
                    </td>
                    <td class="theme-2 w-2/12">
                        <p class="m-0 text-lg font-semibold">Preview</p>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b border-gray-300">
                    <td class="p-2 border-r border-gray-300 text-center">{{ $count++ }}</td>
                    <td class="p-2 border-r border-gray-300">
                        <p class="text-center">Passport size photo</p>
                        <p class="text-[0.65rem] md:text-xs text-gray-500 text-center">JPG, PNG <br
                                class="block md:hidden">(MAX. SIZE 450kb)</p>
                    </td>
                    <td class="p-2 border-r border-gray-300 flex justify-center items-center">
                        <label for="upload_photo"
                            class="btn p-0 py-1 px-3 text-sm font-medium rounded-full my-1 my-md-0 bg-blue-500 text-white hover:bg-blue-600 focus:ring-2 focus:ring-blue-400 cursor-pointer">
                            <i class="bi bi-cloud-arrow-up"></i> UPLOAD
                        </label>
                        <input type="file" id="upload_photo" name="photo" class="hidden upload_doc" data-id="photo"
                            accept="image/jpg, image/jpeg, image/png" onchange="uploadFile(event, 'photo')">
                    </td>
                    <td class="p-2 text-center">
                        @if (isset($documents->photo) && !empty($documents->photo))
                            <img src="{{ asset('storage/public/uploads/upload_photo/' . $documents->photo) }}"
                                alt="Uploaded Image" class="w-16 h-16 object-cover cursor-pointer"
                                onclick="enlargeImage(this)">
                        @else
                            <span class="p-2">-- No photo --</span>
                        @endif
                    </td>
                </tr>

                <tr class="border-b border-gray-300">
                    <td class="p-2 border-r border-gray-300 text-center align-middle">{{ $count++ }}</td>
                    <td class="p-2 border-r border-gray-300">
                        <p class="text-center">Signature</p>
                        <p class="text-[0.65rem] md:text-xs text-gray-500 text-center">JPG, PNG <br
                                class="block md:hidden">(MAX. SIZE 100kb)</p>
                    </td>
                    <td class="p-2 border-r border-gray-300 flex justify-center items-center">
                        <label for="upload_signature"
                            class="btn p-0 py-1 px-3 text-sm font-medium rounded-full my-1 my-md-0 bg-blue-500 text-white hover:bg-blue-600 focus:ring-2 focus:ring-blue-400 cursor-pointer">
                            <i class="bi bi-cloud-arrow-up"></i> UPLOAD
                        </label>
                        <input type="file" id="upload_signature" name="signature" class="hidden upload_doc"
                            data-id="signature" accept="image/jpg, image/jpeg, image/png"
                            onchange="uploadFile(event, 'signature')">
                    </td>
                    <td class="p-2 text-center">
                        @if (isset($documents->signature) && !empty($documents->signature))
                            <img src="{{ asset('storage/public/uploads/upload_signature/' . $documents->signature) }}"
                                alt="Uploaded Image" class="w-16 h-16 object-cover cursor-pointer"
                                onclick="enlargeImage(this)">
                        @else
                            <span class="p-2">-- No signature --</span>
                        @endif
                    </td>
                </tr>

                <tr class="border-b border-gray-300">
                    <td class="p-2 border-r border-gray-300 text-center align-middle">{{ $count++ }}</td>

                    <td class="p-2 border-r border-gray-300">
                        <p class="text-center">Age proof Certificate</p>
                        <p class="text-[0.65rem] md:text-xs text-red-500 text-center">
                            PDF <br class="block md:hidden">(MAX. SIZE 200kb)
                        </p>
                    </td>
                    <td class="p-2 border-r border-gray-300 flex justify-center items-center"><label
                            for="upload_age_prof_cert"
                            class="btn p-0 py-1 px-3 text-sm font-medium rounded-full my-1 my-md-0 bg-blue-500 text-white hover:bg-blue-600 focus:ring-2 focus:ring-blue-400">
                            <i class="bi bi-cloud-arrow-up"></i> UPLOAD
                        </label>
                        <input type="file" id="upload_age_prof_cert" name="age_prof_cert"
                            class="hidden upload_doc" data-id="age_prof_cert" accept=".pdf"
                            onchange="uploadFile(event, 'age_prof_cert')">
                    </td>
                    <td class="p-2 text-center">
                        @if (isset($documents->age_prof_cert) && !empty($documents->age_prof_cert))
                            <a href="#"
                                onclick="openPdfModal('{{ asset('storage/public/uploads/age_prof_cert/' . $documents->age_prof_cert) }}')"
                                class="text-blue-500 underline">View PDF</a>
                        @else
                            <span class="p-2">-- No PDF --</span>
                        @endif
                    </td>
                </tr>
                <tr class="border-b border-gray-300">
                    <td class="p-2 border-r border-gray-300 text-center align-middle">{{ $count++ }}</td>

                    <td class="p-2 border-r border-gray-300">
                        <p class="text-center">Class X Marksheet</p>
                        <p class="text-[0.65rem] md:text-xs text-red-500 text-center">
                            PDF <br class="block md:hidden">(MAX. SIZE 200kb)
                        </p>
                    </td>
                    <td class="p-2 border-r border-gray-300 flex justify-center items-center"><label
                            for="upload_class_x_cert"
                            class="btn p-0 py-1 px-3 text-sm font-medium rounded-full my-1 my-md-0 bg-blue-500 text-white hover:bg-blue-600 focus:ring-2 focus:ring-blue-400">
                            <i class="bi bi-cloud-arrow-up"></i> UPLOAD
                        </label>
                        <input type="file" id="upload_class_x_cert" name="class_x_cert" class="hidden upload_doc"
                            data-id="class_x_cert" accept=".pdf" onchange="uploadFile(event, 'class_x_cert')">
                    </td>
                    <td class="p-2 text-center">
                        @if (isset($documents->class_x_cert) && !empty($documents->class_x_cert))
                            <a href="#"
                                onclick="openPdfModal('{{ asset('storage/public/uploads/class_x_cert/' . $documents->class_x_cert) }}')"
                                class="text-blue-500 underline">View PDF</a>
                        @else
                            <span class="p-2">-- No PDF --</span>
                        @endif
                    </td>
                </tr>
                @if ($questionaries->min_score_mizo == 1)
                    <tr class="border-b border-gray-300">
                        <td class="p-2 border-r border-gray-300 text-center align-middle">{{ $count++ }}</td>

                        <td class="p-2 border-r border-gray-300">
                            <p class="text-center">Mizo Language Proficiency Test Cert.</p>
                            <p class="text-[0.65rem] md:text-xs text-red-500 text-center">
                                PDF <br class="block md:hidden">(MAX. SIZE 200kb)
                            </p>
                        </td>
                        <td class="p-2 border-r border-gray-300 flex justify-center items-center"><label
                                for="upload_mizu_lang_cert"
                                class="btn p-0 py-1 px-3 text-sm font-medium rounded-full my-1 my-md-0 bg-blue-500 text-white hover:bg-blue-600 focus:ring-2 focus:ring-blue-400">
                                <i class="bi bi-cloud-arrow-up"></i> UPLOAD
                            </label>
                            <input type="file" id="upload_mizu_lang_cert" name="mizu_lang_cert"
                                class="hidden upload_doc" data-id="mizu_lang_cert" accept=".pdf"
                                onchange="uploadFile(event, 'mizu_lang_cert')">
                        </td>
                        <td class="p-2 text-center">
                            @if (isset($documents->mizu_lang_cert) && !empty($documents->mizu_lang_cert))
                                <a href="#"
                                    onclick="openPdfModal('{{ asset('storage/public/uploads/mizu_lang_cert/' . $documents->mizu_lang_cert) }}')"
                                    class="text-blue-500 underline">View PDF</a>
                            @else
                                <span class="p-2">-- No PDF --</span>
                            @endif
                        </td>
                    </tr>
                @endif
                @if ($questionaries->class_x_mizo == 1)
                    <tr class="border-b border-gray-300">
                        <td class="p-2 border-r border-gray-300 text-center align-middle">{{ $count++ }}</td>

                        <td class="p-2 border-r border-gray-300">
                            <p class="text-center">Mizo subject in Class-X standard
                                (HSLC)</p>
                                <p class="text-[0.65rem] md:text-xs text-red-500 text-center">
                                    PDF <br class="block md:hidden">(MAX. SIZE 200kb)
                                </p>
                        </td>
                        <td class="p-2 border-r border-gray-300 flex justify-center items-center"><label
                                for="upload_mizu_class_x"
                                class="btn p-0 py-1 px-3 text-sm font-medium rounded-full my-1 my-md-0 bg-blue-500 text-white hover:bg-blue-600 focus:ring-2 focus:ring-blue-400">
                                <i class="bi bi-cloud-arrow-up"></i> UPLOAD
                            </label>
                            <input type="file" id="upload_mizu_class_x" name="mizu_class_x"
                                class="hidden upload_doc" data-id="mizu_class_x" accept=".pdf"
                                onchange="uploadFile(event, 'mizu_class_x')">
                        </td>
                        <td class="p-2 text-center">
                            @if (isset($documents->mizu_class_x) && !empty($documents->mizu_class_x))
                                <a href="#"
                                    onclick="openPdfModal('{{ asset('storage/public/uploads/mizu_class_x/' . $documents->mizu_class_x) }}')"
                                    class="text-blue-500 underline">View PDF</a>
                            @else
                                <span class="p-2">-- No PDF --</span>
                            @endif
                        </td>
                    </tr>
                @endif
                @if ($questionaries->mizo_as_mil == 1)
                    <tr class="border-b border-gray-300">
                        <td class="p-2 border-r border-gray-300 text-center align-middle">{{ $count++ }}</td>

                        <td class="p-2 border-r border-gray-300">
                            <p class="text-center">Mizo subject as MIL in Class-X
                                standard in outside Mizoram</p>
                                <p class="text-[0.65rem] md:text-xs text-red-500 text-center">
                                    PDF <br class="block md:hidden">(MAX. SIZE 200kb)
                                </p>
                        </td>
                        <td class="p-2 border-r border-gray-300 flex justify-center items-center"><label
                                for="upload_mizu_class_x_outside"
                                class="btn p-0 py-1 px-3 text-sm font-medium rounded-full my-1 my-md-0 bg-blue-500 text-white hover:bg-blue-600 focus:ring-2 focus:ring-blue-400">
                                <i class="bi bi-cloud-arrow-up"></i> UPLOAD
                            </label>
                            <input type="file" id="upload_mizu_class_x_outside" name="mizu_class_x_outside"
                                class="hidden upload_doc" data-id="mizu_class_x_outside" accept=".pdf"
                                onchange="uploadFile(event, 'mizu_class_x_outside')">
                        </td>
                        <td class="p-2 text-center">
                            @if (isset($documents->mizu_class_x_outside) && !empty($documents->mizu_class_x_outside))
                                <a href="#"
                                    onclick="openPdfModal('{{ asset('storage/public/uploads/mizu_class_x_outside/' . $documents->mizu_class_x_outside) }}')"
                                    class="text-blue-500 underline">View PDF</a>
                            @else
                                <span class="p-2">-- No PDF --</span>
                            @endif
                        </td>
                    </tr>
                @endif
                @if ($questionaries->home_guard == 1)
                    <tr class="border-b border-gray-300">
                        <td class="p-2 border-r border-gray-300 text-center align-middle">{{ $count++ }}</td>

                        <td class="p-2 border-r border-gray-300">
                            <p class="text-center">Homeguard Certificate</p>
                            <p class="text-[0.65rem] md:text-xs text-red-500 text-center">
                                PDF <br class="block md:hidden">(MAX. SIZE 200kb)
                            </p>
                        </td>
                        <td class="p-2 border-r border-gray-300 flex justify-center items-center"><label
                                for="upload_homeguard_cert"
                                class="btn p-0 py-1 px-3 text-sm font-medium rounded-full my-1 my-md-0 bg-blue-500 text-white hover:bg-blue-600 focus:ring-2 focus:ring-blue-400">
                                <i class="bi bi-cloud-arrow-up"></i> UPLOAD
                            </label>
                            <input type="file" id="upload_homeguard_cert" name="homeguard_cert"
                                class="hidden upload_doc" data-id="homeguard_cert" accept=".pdf"
                                onchange="uploadFile(event, 'homeguard_cert')">
                        </td>
                        <td class="p-2 text-center">
                            @if (isset($documents->homeguard_cert) && !empty($documents->homeguard_cert))
                                <a href="#"
                                    onclick="openPdfModal('{{ asset('storage/public/uploads/homeguard_cert/' . $documents->homeguard_cert) }}')"
                                    class="text-blue-500 underline">View PDF</a>
                            @else
                                <span class="p-2">-- No PDF --</span>
                            @endif
                        </td>
                    </tr>
                @endif
                @if (
                    $userDetails->category_id == 2 ||
                        $userDetails->category_id == 3 ||
                        $userDetails->category_id == 4 ||
                        $userDetails->category_id == 5 ||
                        $userDetails->category_id == 6)
                    <tr class="border-b border-gray-300">
                        <td class="p-2 border-r border-gray-300 text-center align-middle">{{ $count++ }}</td>

                        <td class="p-2 border-r border-gray-300">
                            <p class="text-center">Cast Certificate</p>
                            <p class="text-[0.65rem] md:text-xs text-red-500 text-center">
                                PDF <br class="block md:hidden">(MAX. SIZE 200kb)
                            </p>
                        </td>
                        <td class="p-2 border-r border-gray-300 flex justify-center items-center"><label
                                for="upload_caste_cert"
                                class="btn p-0 py-1 px-3 text-sm font-medium rounded-full my-1 my-md-0 bg-blue-500 text-white hover:bg-blue-600 focus:ring-2 focus:ring-blue-400">
                                <i class="bi bi-cloud-arrow-up"></i> UPLOAD
                            </label>
                            <input type="file" id="upload_caste_cert" name="caste_cert" class="hidden upload_doc"
                                data-id="caste_cert" accept=".pdf" onchange="uploadFile(event, 'caste_cert')">
                        </td>
                        <td class="p-2 text-center">
                            @if (isset($documents->caste_cert) && !empty($documents->caste_cert))
                                <a href="#"
                                    onclick="openPdfModal('{{ asset('storage/public/uploads/caste_cert/' . $documents->caste_cert) }}')"
                                    class="text-blue-500 underline">View PDF</a>
                            @else
                                <span class="p-2">-- No PDF --</span>
                            @endif
                        </td>
                    </tr>
                @endif
                @if ($questionaries->ncc_cert == 1)
                    <tr class="border-b border-gray-300">
                        <td class="p-2 border-r border-gray-300 text-center align-middle">{{ $count++ }}</td>

                        <td class="p-2 border-r border-gray-300">
                            <p class="text-center">NCC Certificate</p>
                            <p class="text-[0.65rem] md:text-xs text-red-500 text-center">
                                PDF <br class="block md:hidden">(MAX. SIZE 200kb)
                            </p>
                        </td>
                        <td class="p-2 border-r border-gray-300 flex justify-center items-center"><label
                                for="upload_ncc_cert"
                                class="btn p-0 py-1 px-3 text-sm font-medium rounded-full my-1 my-md-0 bg-blue-500 text-white hover:bg-blue-600 focus:ring-2 focus:ring-blue-400">
                                <i class="bi bi-cloud-arrow-up"></i> UPLOAD
                            </label>
                            <input type="file" id="upload_ncc_cert" name="ncc_cert" class="hidden upload_doc"
                                data-id="ncc_cert" accept=".pdf" onchange="uploadFile(event, 'ncc_cert')">
                        </td>
                        <td class="p-2 text-center">
                            @if (isset($documents->ncc_cert) && !empty($documents->ncc_cert))
                                <a href="#"
                                    onclick="openPdfModal('{{ asset('storage/public/uploads/ncc_cert/' . $documents->ncc_cert) }}')"
                                    class="text-blue-500 underline">View PDF</a>
                            @else
                                <span class="p-2">-- No PDF --</span>
                            @endif
                        </td>
                    </tr>
                @endif
                <tr class="border-b border-gray-300">
                    <td class="p-2 border-r border-gray-300 text-center align-middle">{{ $count++ }}</td>

                    <td class="p-2 border-r border-gray-300">
                        <p class="text-center">Computer Certificate</p>
                        <p class="text-[0.65rem] md:text-xs text-red-500 text-center">
                            PDF <br class="block md:hidden">(MAX. SIZE 200kb)
                        </p>
                    </td>
                    <td class="p-2 border-r border-gray-300 flex justify-center items-center"><label
                            for="upload_comp_cert"
                            class="btn p-0 py-1 px-3 text-sm font-medium rounded-full my-1 my-md-0 bg-blue-500 text-white hover:bg-blue-600 focus:ring-2 focus:ring-blue-400">
                            <i class="bi bi-cloud-arrow-up"></i> UPLOAD
                        </label>
                        <input type="file" id="upload_comp_cert" name="comp_cert" class="hidden upload_doc"
                            data-id="comp_cert" accept=".pdf" onchange="uploadFile(event, 'comp_cert')">
                    </td>
                    <td class="p-2 text-center">
                        @if (isset($documents->comp_cert) && !empty($documents->comp_cert))
                            <a href="#"
                                onclick="openPdfModal('{{ asset('storage/public/uploads/comp_cert/' . $documents->comp_cert) }}')"
                                class="text-blue-500 underline">View PDF</a>
                        @else
                            <span class="p-2">-- No PDF --</span>
                        @endif
                    </td>
                </tr>

                @if ($questionaries->auto_mobile == 1)
                    <tr class="border-b border-gray-300">
                        <td class="p-2 border-r border-gray-300 text-center align-middle">{{ $count++ }}</td>

                        <td class="p-2 border-r border-gray-300">
                            <p class="text-center">Mechanic Experience Certificate</p>
                            <p class="text-[0.65rem] md:text-xs text-red-500 text-center">
                                PDF <br class="block md:hidden">(MAX. SIZE 200kb)
                            </p>
                        </td>
                        <td class="p-2 border-r border-gray-300 flex justify-center items-center"><label
                                for="upload_mechanic_ex_cert"
                                class="btn p-0 py-1 px-3 text-sm font-medium rounded-full my-1 my-md-0 bg-blue-500 text-white hover:bg-blue-600 focus:ring-2 focus:ring-blue-400">
                                <i class="bi bi-cloud-arrow-up"></i> UPLOAD
                            </label>
                            <input type="file" id="upload_mechanic_ex_cert" name="mechanic_ex_cert"
                                class="hidden upload_doc" data-id="mechanic_ex_cert" accept=".pdf"
                                onchange="uploadFile(event, 'mechanic_ex_cert')">
                        </td>
                        <td class="p-2 text-center">
                            @if (isset($documents->mechanic_ex_cert) && !empty($documents->mechanic_ex_cert))
                                <a href="#"
                                    onclick="openPdfModal('{{ asset('storage/public/uploads/mechanic_ex_cert/' . $documents->mechanic_ex_cert) }}')"
                                    class="text-blue-500 underline">View PDF</a>
                            @else
                                <span class="p-2">-- No PDF --</span>
                            @endif
                        </td>
                    </tr>
                @endif
                @if ($questionaries->iti_eqi == 1)
                    <tr class="border-b border-gray-300">
                        <td class="p-2 border-r border-gray-300 text-center align-middle">{{ $count++ }}</td>

                        <td class="p-2 border-r border-gray-300">
                            <p class="text-center">Industrial Training Institute Certificate</p>
                            <p class="text-[0.65rem] md:text-xs text-red-500 text-center">
                                PDF <br class="block md:hidden">(MAX. SIZE 200kb)
                            </p>
                        </td>
                        <td class="p-2 border-r border-gray-300 flex justify-center items-center"><label
                                for="upload_iti_ex_cert"
                                class="btn p-0 py-1 px-3 text-sm font-medium rounded-full my-1 my-md-0 bg-blue-500 text-white hover:bg-blue-600 focus:ring-2 focus:ring-blue-400">
                                <i class="bi bi-cloud-arrow-up"></i> UPLOAD
                            </label>
                            <input type="file" id="upload_iti_ex_cert" name="iti_ex_cert"
                                class="hidden upload_doc" data-id="iti_ex_cert" accept=".pdf"
                                onchange="uploadFile(event, 'iti_ex_cert')">
                        </td>
                        <td class="p-2 text-center">
                            @if (isset($documents->iti_ex_cert) && !empty($documents->iti_ex_cert))
                                <a href="#"
                                    onclick="openPdfModal('{{ asset('storage/public/uploads/iti_ex_cert/' . $documents->iti_ex_cert) }}')"
                                    class="text-blue-500 underline">View PDF</a>
                            @else
                                <span class="p-2">-- No PDF --</span>
                            @endif
                        </td>
                    </tr>
                @endif
                @if ($userDetails->ex_ser == 1)
                    <tr class="border-b border-gray-300">
                        <td class="p-2 border-r border-gray-300 text-center align-middle">{{ $count++ }}</td>

                        <td class="p-2 border-r border-gray-300">
                            <p class="text-center">Ex-Serviceman Certificate</p>
                            <p class="text-[0.65rem] md:text-xs text-red-500 text-center">
                                PDF <br class="block md:hidden">(MAX. SIZE 200kb)
                            </p>
                        </td>
                        <td class="p-2 border-r border-gray-300 flex justify-center items-center"><label
                                for="upload_ex_service"
                                class="btn p-0 py-1 px-3 text-sm font-medium rounded-full my-1 my-md-0 bg-blue-500 text-white hover:bg-blue-600 focus:ring-2 focus:ring-blue-400">
                                <i class="bi bi-cloud-arrow-up"></i> UPLOAD
                            </label>
                            <input type="file" id="upload_ex_service" name="ex_service" class="hidden upload_doc"
                                data-id="ex_service" accept=".pdf" onchange="uploadFile(event, 'ex_service')">
                        </td>
                        <td class="p-2 text-center">
                            @if (isset($documents->ex_service) && !empty($documents->ex_service))
                                <a href="#"
                                    onclick="openPdfModal('{{ asset('storage/public/uploads/ex_service/' . $documents->ex_service) }}')"
                                    class="text-blue-500 underline">View PDF</a>
                            @else
                                <span class="p-2">-- No PDF --</span>
                            @endif
                        </td>
                    </tr>
                @endif
                @if ($userDetails->m_sport == 1)
                    <tr class="border-b border-gray-300">
                        <td class="p-2 border-r border-gray-300 text-center align-middle">{{ $count++ }}</td>

                        <td class="p-2 border-r border-gray-300">
                            <p class="text-center">Sports Certificate</p>
                            <p class="text-[0.65rem] md:text-xs text-red-500 text-center">
                                PDF <br class="block md:hidden">(MAX. SIZE 200kb)
                            </p>
                        </td>
                        <td class="p-2 border-r border-gray-300 flex justify-center items-center"><label
                                for="upload_sports_cert"
                                class="btn p-0 py-1 px-3 text-sm font-medium rounded rounded-full my-1 my-md-0 bg-blue-500 text-white hover:bg-blue-600 focus:ring-2 focus:ring-blue-400">
                                <i class="bi bi-cloud-arrow-up"></i> UPLOAD
                            </label>
                            <input type="file" id="upload_sports_cert" name="sports_cert"
                                class="hidden upload_doc" data-id="sports_cert" accept=".pdf"
                                onchange="uploadFile(event, 'sports_cert')">
                        </td>
                        <td class="p-2 text-center">
                            @if (isset($documents->sports_cert) && !empty($documents->sports_cert))
                                <a href="#"
                                    onclick="openPdfModal('{{ asset('storage/public/uploads/sports_cert/' . $documents->sports_cert) }}')"
                                    class="text-blue-500 underline">View PDF</a>
                            @else
                                <span class="p-2">-- No PDF --</span>
                            @endif
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
<!-- Modal to view enlarged image -->
<div id="enlargeModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
    <div class="relative w-auto h-auto max-w-3xl max-h-[80%] bg-white rounded-lg">
        <span id="closeModal"
            class="absolute top-2 right-2 cursor-pointer text-white font-bold text-2xl">&times;</span>
        <img id="modalImage" src="" alt="Enlarged Image" class="w-full h-full object-contain border-4 border-blue-500 rounded-md">
    </div>
</div>

<!-- Modal for Enlarging PDF -->
<div id="pdfModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
    <div class="relative w-auto h-auto max-w-3xl max-h-[80%] bg-white rounded-lg">
        <span id="closePdfModal"
            class="absolute top-2 right-2 cursor-pointer text-blue font-bold text-2xl">&times;</span>
        <iframe id="pdfIframe" src="" width="100%" height="500px" class="border-4 border-blue-500 rounded-md"></iframe>
    </div>
</div>


@php
    // List of all fields that must be checked for being empty
    $requiredFields = ['photo', 'signature', 'age_prof_cert', 'class_x_cert', 'comp_cert'];

    // Check if 'mizu_lang_cert' is required based on the questionaries value
    if ($questionaries->min_score_mizo != 0) {
        // Add 'mizu_lang_cert' to the list if min_score_mizo is not 0
        $requiredFields[] = 'mizu_lang_cert';
    }
    if ($questionaries->class_x_mizo != 0) {
        $requiredFields[] = 'mizu_class_x';
    }
    if ($questionaries->mizo_as_mil != 0) {
        $requiredFields[] = 'mizu_class_x_outside';
    }
    if ($questionaries->home_guard != 0) {
        $requiredFields[] = 'homeguard_cert';
    }
    if ($questionaries->ncc_cert != 0) {
        $requiredFields[] = 'ncc_cert';
    }
    if ($questionaries->auto_mobile != 0) {
        $requiredFields[] = 'mechanic_ex_cert';
    }
    if ($questionaries->iti_eqi != 0) {
        $requiredFields[] = 'iti_ex_cert';
    }
    if ($userDetails->ex_ser != 0) {
        $requiredFields[] = 'ex_service';
    }
    if ($userDetails->m_sport != 0) {
        $requiredFields[] = 'sports_cert';
    }
    if ($userDetails->category_id != 1) {
        $requiredFields[] = 'caste_cert';
    }

    // Check if any required field is empty
    $anyFieldEmpty = false;

    // Loop through all required fields to check if any is empty
    foreach ($requiredFields as $field) {
        // Check if any document field is empty or not set
        if (empty($documents->$field) || $documents->$field == null) {
            $anyFieldEmpty = true;
            break; // Exit the loop early if any field is empty
        }
    }

    // Additional check for 'mizu_lang_cert' if min_score_mizo == 1
    if ($questionaries->min_score_mizo == 1 && empty($documents->mizu_lang_cert)) {
        $anyFieldEmpty = true;
    }
    if ($questionaries->class_x_mizo == 1 && empty($documents->class_x_cert)) {
        $anyFieldEmpty = true;
    }
    if ($questionaries->mizo_as_mil == 1 && empty($documents->mizu_class_x_outside)) {
        $anyFieldEmpty = true;
    }
    if ($questionaries->home_guard == 1 && empty($documents->homeguard_cert)) {
        $anyFieldEmpty = true;
    }
    if ($questionaries->ncc_cert == 1 && empty($documents->ncc_cert)) {
        $anyFieldEmpty = true;
    }
    if ($questionaries->auto_mobile == 1 && empty($documents->mechanic_ex_cert)) {
        $anyFieldEmpty = true;
    }
    if ($questionaries->iti_eqi == 1 && empty($documents->iti_ex_cert)) {
        $anyFieldEmpty = true;
    }
    if ($userDetails->ex_ser == 1 && empty($documents->ex_service)) {
        $anyFieldEmpty = true;
    }
    if ($userDetails->m_sport == 1 && empty($documents->sports_cert)) {
        $anyFieldEmpty = true;
    }
    if ($userDetails->category_id != 1 && empty($documents->caste_cert)) {
        $anyFieldEmpty = true;
    }
@endphp

<div class="mt-auto px-4 flex items-center">
    <a class="inline-block bg-gray-600 hover:bg-gray-700 text-white p-2 rounded-md Nunito"
        href="{{ route('profile') }}"><i class="bi bi-arrow-left-short pr-1"></i>Go Back</a>
    <!-- Display Save & Proceed button if no fields are empty -->
    @if (!$anyFieldEmpty)
        <a class="ml-auto inline-block bg-green-600 hover:bg-green-700 text-white p-2 rounded-md Nunito"
            href="{{ route('preview') }}">
            <i class="bi bi-check-all pr-1"></i>Save & Proceed
        </a>
    @endif
</div>

@include('layouts.footer')
@include('layouts.custom-scripts.newDocumentScript')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        // Function to handle file upload
        function uploadFile(event, fileType) {
            const fileInput = $(event.target);
            const file = fileInput[0].files[0];

            if (!file) {
                return;
            }

            let maxSize = 0;
            switch (fileType) {
                case 'photo':
                    maxSize = 450000; // 450KB for photo
                    break;
                case 'signature':
                    maxSize = 100000; // 100KB for signature
                    break;
                default:
                    maxSize = 200000; // Default max size for other files (200KB)
                    break;
            }

            if (file.size > maxSize) {
                alert(`File size exceeds the maximum limit for ${fileType}.`);
                return;
            }

            let formData = new FormData();
            formData.append(fileType, file);

            let uploadUrl = '/document'; // URL for file upload (Laravel route)
            $(`#${fileType}-status`).text(`Uploading ${fileType}...`);

            $.ajax({
                url: uploadUrl,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add CSRF token to the request headers for Laravel
                },
                success: function(data) {
                    if (data.success) {
                        $(`#${fileType}-status`).text(
                            `${fileType.charAt(0).toUpperCase() + fileType.slice(1)} uploaded successfully!`
                        );

                        // Show success SweetAlert
                        Swal.fire({
                            icon: 'success',
                            title: `${fileType.charAt(0).toUpperCase() + fileType.slice(1)} Uploaded`,
                            text: `${fileType.charAt(0).toUpperCase() + fileType.slice(1)} uploaded successfully!`,
                            confirmButtonText: 'Okay',
                            confirmButtonColor: '#2DB325'
                        }).then((result) => {
                            // Check if the "Okay" button was clicked
                            if (result.isConfirmed) {
                                location.reload(); // Reload the page after success
                            }
                        });
                    } else {
                        $(`#${fileType}-status`).text(`Failed to upload ${fileType}.`);

                        // Show error SweetAlert
                        Swal.fire({
                            icon: 'error',
                            title: 'Upload Failed',
                            text: `Failed to upload ${fileType}. Please try again.`,
                            confirmButtonText: 'Okay',
                            confirmButtonColor: '#FF0000'
                        });
                    }
                },
                error: function(error) {
                    $(`#${fileType}-status`).text(`Error uploading ${fileType}.`);

                    // Show error SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'There was an error while uploading the file. Please try again.',
                        confirmButtonText: 'Okay',
                        confirmButtonColor: '#FF0000'
                    });
                    console.error('Error:', error);
                }
            });
        }

        // Attach the upload function to all file input fields
        $('.upload_doc').on('change', function(event) {
            const fileType = $(this).data('id'); // Get file type from data-id attribute
            uploadFile(event, fileType);
        });
    });
</script>

<script>
    // Function to open the modal and show the enlarged image
    function enlargeImage(imgElement) {
        var modal = document.getElementById('enlargeModal');
        var modalImage = document.getElementById('modalImage');
        var closeModal = document.getElementById('closeModal');

        // Set the source of the modal image to the clicked image
        modalImage.src = imgElement.src;

        // Show the modal
        modal.classList.remove('hidden');

        // Close the modal when the close button is clicked
        closeModal.onclick = function() {
            modal.classList.add('hidden');
        };

        // Optionally close the modal if clicking outside the image
        window.onclick = function(event) {
            if (event.target === modal) {
                modal.classList.add('hidden');
            }
        };
    }
</script>
<script>
    // Function to open the modal and show the PDF
    function openPdfModal(pdfUrl) {
        var modal = document.getElementById('pdfModal');
        var iframe = document.getElementById('pdfIframe');
        var closeModal = document.getElementById('closePdfModal');

        // Set the PDF source to the clicked PDF file URL
        iframe.src = pdfUrl;

        // Show the modal
        modal.classList.remove('hidden');

        // Close the modal when the close button is clicked
        closeModal.onclick = function() {
            modal.classList.add('hidden');
            iframe.src = ""; // Clear the iframe source to stop PDF rendering
        };

        // Optionally close the modal if clicking outside the image
        window.onclick = function(event) {
            if (event.target === modal) {
                modal.classList.add('hidden');
                iframe.src = ""; // Clear the iframe source to stop PDF rendering
            }
        };
    }
</script>
