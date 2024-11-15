@include('layouts.header')
<div class="grow flex px-4 sm:px-12 sm:py-2 bg-whit">
    <div class="mt-4 ms:mt-10 mx-auto">
        <div class="container mx-auto">
            <p class="m-0 mb-5 sm:text-lg">Follow the Steps to apply<i class="bi bi-arrow-right pl-1 text-sm"></i></p>
            <div class="mb-4 lg:mb-12">
                <div class="grid grid-cols-6 sm:grid-cols-5 gap-1 sm:gap-2 lg:gap-5">
                    <div class="col-span-3 sm:col-span-1 flex flex-col">
                        <div class="flex items-center pb-4 xl:pb-10">
                            <div
                                class="z-10 flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full ring-0 ring-white sm:ring-8 shrink-0">
                                <span class="text-xs font-medium">1</span>
                            </div>
                            <div class="flex w-full bg-gray-200 h-0.5"></div>
                        </div>
                        <div class="grow lg:mt-3 sm:border-b-2 border-green-600">
                            <img class="lg:mb-3 h-8 lg:h-10" src="{{ asset('img/click_b.png') }}" alt="">
                            <h3 class="text-sm sm:text-lg font-semibold text-blue-900 mb-1 sm:mb-3">Register</h3>
                            <p class="text-xs sm:text-xs md:text-md xl:text-base font-normal text-gray-700 pb-4">
                                Register as a new user by providing your details and get Mizoram Police Recruitment ID.
                            </p>
                        </div>
                    </div>
                    <div class="col-span-3 sm:col-span-1 flex flex-col">
                        <div class="flex items-center pb-4 xl:pb-10">
                            <div
                                class="z-10 flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full ring-0 ring-white sm:ring-8 shrink-0">
                                <span class="text-xs font-medium">2</span>
                            </div>
                            <div class="flex w-full bg-gray-200 h-0.5"></div>
                        </div>
                        <div class="grow lg:mt-3 sm:border-b-2 border-green-600">
                            <img class="lg:mb-3 h-8 lg:h-10" src="{{ asset('img/click_b.png') }}" alt="">
                            <h3 class="text-sm sm:text-lg font-semibold text-blue-900 mb-1 sm:mb-3">Login</h3>
                            <p class="text-xs sm:text-xs md:text-md xl:text-base font-normal text-gray-700 pb-4">Log In
                                to complete the application form with Mizoram Police Recruitment ID.</p>
                        </div>
                    </div>
                    <div class="col-span-3 sm:col-span-1 flex flex-col">
                        <div class="flex items-center pb-4 xl:pb-10">
                            <div
                                class="z-10 flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full ring-0 ring-white sm:ring-8 shrink-0">
                                <span class="text-xs font-medium">3</span>
                            </div>
                            <div class="flex w-full bg-gray-200 h-0.5"></div>
                        </div>
                        <div class="grow lg:mt-3 sm:border-b-2 border-green-600">
                            <img class="lg:mb-3 h-8 lg:h-10" src="{{ asset('img/click_b.png') }}" alt="">
                            <h3 class="text-sm sm:text-lg font-semibold text-blue-900 mb-1 sm:mb-3">Apply</h3>
                            <p class="text-xs sm:text-xs md:text-md xl:text-base font-normal text-gray-700 pb-4">Apply
                                post as per eligibility citeria of Mizoram Police Recruitment.</p>
                        </div>
                    </div>
                    <div class="col-span-3 sm:col-span-1 flex flex-col">
                        <div class="flex items-center pb-4 xl:pb-10">
                            <div
                                class="z-10 flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full ring-0 ring-white sm:ring-8 shrink-0">
                                <span class="text-xs font-medium">4</span>
                            </div>
                            <div class="flex w-full bg-gray-200 h-0.5"></div>
                        </div>
                        <div class="grow lg:mt-3 sm:border-b-2 border-green-600">
                            <img class="lg:mb-3 h-8 lg:h-10" src="{{ asset('img/click_b.png') }}" alt="">
                            <h3 class="text-sm sm:text-lg font-semibold text-blue-900 mb-1 sm:mb-3">Payment</h3>
                            <p class="text-xs sm:text-xs md:text-md xl:text-base font-normal text-gray-700 pb-4">
                                Applying successfully proceede to payment as per the post.</p>
                        </div>
                    </div>
                    <div class="col-span-6 sm:col-span-1 flex flex-col">
                        <div class="flex items-center pb-4 xl:pb-10">
                            <div
                                class="z-10 flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full ring-0 ring-white sm:ring-8 shrink-0">
                                <span class="text-xs font-medium">5</span>
                            </div>
                            <div class="flex w-full bg-gray-200 h-0.5"></div>
                        </div>
                        <div class="grow lg:mt-3 sm:border-b-2 border-green-600">
                            <img class="lg:mb-3 h-8 lg:h-10" src="{{ asset('img/click_b.png') }}" alt="">
                            <h3 class="text-sm sm:text-lg font-semibold text-blue-900 mb-1 sm:mb-3">Download</h3>
                            <p class="text-xs sm:text-xs md:text-md xl:text-base font-normal text-gray-700 pb-4">
                                Download acknowledgement after completition on form for the selected post.</p>
                        </div>
                    </div>
                </div>
                <!-- <ol class="items-center sm:flex">
    <li class="relative mb-6 sm:mb-0">
    <div class="flex items-center pb-10">
    <div class="z-10 flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full ring-0 ring-white sm:ring-8 shrink-0">
    <span class="text-xs font-medium">1</span>
    </div>
    <div class="hidden sm:flex w-full bg-gray-200 h-0.5"></div>
    </div>
    <div class="mt-3 sm:pe-8">
    <img class="mb-3 h-10" src="img/click_b.png" alt="">
    <h3 class="text-lg font-semibold text-blue-900 mb-3">Register</h3>
    <p class="text-base font-normal text-gray-700 border-b-2 border-green-600 pb-4">Register as a new user by providing your details and get Mizoram Police Recruitment ID.</p>
    </div>
    </li>
    <li class="relative mb-6 sm:mb-0">
    <div class="flex items-center pb-10">
    <div class="z-10 flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full ring-0 ring-white sm:ring-8 shrink-0">
    <span class="text-xs font-medium">2</span>
    </div>
    <div class="hidden sm:flex w-full bg-gray-200 h-0.5"></div>
    </div>
    <div class="mt-3 sm:pe-8">
    <img class="mb-3 h-10" src="img/click_b.png" alt="">
    <h3 class="text-lg font-semibold text-blue-900 mb-3">Login</h3>
    <p class="text-base font-normal text-gray-700 border-b-2 border-green-600 pb-4">Log In to complete the application form with Mizoram Police Recruitment ID.</p>
    </div>
    </li>
    <li class="relative mb-6 sm:mb-0">
    <div class="flex items-center pb-10">
    <div class="z-10 flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full ring-0 ring-white sm:ring-8 shrink-0">
    <span class="text-xs font-medium">3</span>
    </div>
    <div class="hidden sm:flex w-full bg-gray-200 h-0.5"></div>
    </div>
    <div class="mt-3 sm:pe-8">
    <img class="mb-3 h-10" src="img/click_b.png" alt="">
    <h3 class="text-lg font-semibold text-blue-900 mb-3">Apply</h3>
    <p class="text-base font-normal text-gray-700 border-b-2 border-green-600 pb-4">Apply post as per eligibility citeria of Mizoram Police Recruitment.</p>
    </div>
    </li>
    <li class="relative mb-6 sm:mb-0">
    <div class="flex items-center pb-10">
    <div class="z-10 flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full ring-0 ring-white sm:ring-8 shrink-0">
    <span class="text-xs font-medium">4</span>
    </div>
    <div class="hidden sm:flex w-full bg-gray-200 h-0.5"></div>
    </div>
    <div class="mt-3 sm:pe-8">
    <img class="mb-3 h-10" src="img/click_b.png" alt="">
    <h3 class="text-lg font-semibold text-blue-900 mb-3">Payment</h3>
    <p class="text-base font-normal text-gray-700 border-b-2 border-green-600 pb-4">Applying successfully proceede to payment as per the post.</p>
    </div>
    </li>
    <li class="relative mb-6 sm:mb-0">
    <div class="flex items-center pb-10">
    <div class="z-10 flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full ring-0 ring-white sm:ring-8 shrink-0">
    <span class="text-xs font-medium">5</span>
    </div>
    <div class="hidden sm:flex w-full bg-gray-200 h-0.5"></div>
    </div>
    <div class="mt-3 sm:pe-8">
    <img class="mb-3 h-10" src="img/click_b.png" alt="">
    <h3 class="text-lg font-semibold text-blue-900 mb-3">Download</h3>
    <p class="text-base font-normal text-gray-700 border-b-2 border-green-600 pb-4">Download acknowledgement after completition on form for the selected post.</p>
    </div>
    </li>
    </ol> -->
            </div>
            <div class="">
                <div class="mb-4 sm:mb-8">
                    <p class="m-2 text-dark font-semibold md:text-xl lg:text-2xl Nunito">Instructions<i
                            class="bi bi-card-text pl-2 text-lg"></i></p>
                    <p class="m-0 poppins text-[0.60rem] sm:text-sm sm:font-semibold">
                        <span class="p-1 px-2 rounded-lg bg-yellow-500 text-white inline-block">Candidates must follow
                            the following steps during submission of online application:</span>
                    </p>
                </div>
                <div class="mb-4 sm:mb-10 px-0 px-lg-4">
                    <ul class="list-disc list-inside">
                        <li class="mb-3 poppins text-xs lg:text-base">
                            Register in the Portal using valid mobile number.(Note: Candidates are advised to keep the
                            mobile number unchanged until the recruitment process is over)
                        </li>
                        <li class="mb-3 poppins text-xs lg:text-base">
                            After successful registration candidates will get an Mizoram Police Recruitment ID.
                            Candidates will have to apply for any posts advertised through SLPRB during the year
                            2023-2024 by logging in with this ID.
                        </li>
                        <li class="mb-3 poppins text-xs lg:text-base">
                            Candidates must register themselves in the portal and generate one time recruitment ID.
                            However, candidature of those generating multiple recruitment ID will be cancelled.
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mb-8 sm:mb-0">
                <a class="block p-2 rounded-lg text-sm text-center bg-blue-800 hover:bg-blue-900 text-white"
                    href="{{ route('login') }}">Apply Online <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
