@include('layouts.header')
@include('layouts.nav-2')
<div class="px-4 grow flex flex-col">
    <div class="flex gap-3">
        <div class="grow flex flex-col group">
            <div class="h-full flex flex-col items-center md:items-start">
                <a class="grow inline-block lg:w-full border border-gray-300 hover:border-blue-600 hover:shadow-md rounded-lg p-2 flex items-center hover:text-blue-600 font-medium transition-all text-xs"
                    href="#">
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
                            class="m-auto text-sm TimesNR"><i class="bi bi-building"></i></span></div>
                            <span class="hidden lg:inline-block">Exam Centre Preference</span>
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


    <div class="p-4 grow border border-gray-300 rounded-lg flex">
        <div class="m-auto text-center space-y-3">
            <p class="text-2xl font-medium TimesNR">" {{ $userDetails->registration_number }} "</p>
            <p class="md:text-md text-green-600 font-medium">Proceed to pay as per the post.</p>
            {{-- <p class="text-sm">Post's</p>
            <div class="flex flex-wrap items-center justify-center gap-3">
                <span class="inlone-block p-2 px-4 w-full md:w-auto border rounded-xl border-blue-600"><i
                        class="bi bi-1-circle text-blue-800 pr-2"></i>AB (ARMED BRANCH)</span>
                <span class="inlone-block p-2 px-4 w-full md:w-auto border rounded-xl border-blue-600"><i
                        class="bi bi-2-circle text-blue-800 pr-2"></i>UB (UNARMED BRANCH)</span>
                <span class="inlone-block p-2 px-4 w-full md:w-auto border rounded-xl border-blue-600"><i
                        class="bi bi-3-circle text-blue-800 pr-2"></i>CONSTABLE</span>
            </div> --}}
            <p class="text-xs font-medium text-gray-500">(Post's are displayed in respect to preference order)</p>
            @if ($userDetails->category_id == 1)
                <div class="text-xl">Total Amount: ₹ 200</div>
            @else
                <div class="text-xl">Total Amount: ₹ 150</div>
            @endif
            <div class="pt-6 proceed_payment_div">
                {{-- <button type="button" class="proceed_payment inline-block bg-blue-600 hover:bg-blue-700 text-white p-2 px-3 rounded-lg">Proceede to Pay<i class="bi bi-chevron-double-right ps-1 text-sm"></i></button> --}}
                <button type="button"
                    class="proceed_payment inline-block bg-blue-600 hover:bg-blue-700 text-white p-2 px-3 rounded-lg"
                    onclick="window.location='{{ route('dashboard') }}'">
                    Proceed to Pay <i class="bi bi-chevron-double-right ps-1 text-sm"></i>
                </button>

            </div>
            <div class="pt-6 payment_completed_div hidden">
                <p class="md:text-xl text-green-600 font-medium">Payment Completed!</p>
                <p class="text-xs text-gray-600 font-medium">Click on proceed button to continue.</p>
            </div>


            <!-- jquery where on click 'proceed_payment' button-
   1. Remove class 'hidden' from 'payment_completed_div' div.
   2. Add class 'hidden' in 'proceed_payment_div' div. -->
        </div>
    </div>
</div>
<div class="mt-auto px-4 flex items-center">
    <a class="inline-block bg-gray-600 hover:bg-gray-700 text-white p-2 rounded-md Nunito" href="#"><i
            class="bi bi-arrow-left-short pr-1"></i>Go Back</a>
    <a class="ml-auto inline-block bg-gray-600 hover:bg-gray-700 text-white p-2 rounded-md Nunito"
        href="{{ route('dashboard') }}"><i class="bi bi-house pr-1"></i>Home</a>
</div>

@include('layouts.footer')
