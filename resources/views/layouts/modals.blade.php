<!-- --------------------------------------------------------------------------------------------------------------------------------------- -->

<!-- Confirm Registartion Modal -->


<div id="save-reg-form" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 justify-center items-center w-full h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <!-- Close button -->
            <button type="button"
                class="absolute top-3 right-3 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                data-modal-hide="save-reg-form">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to submit the registration
                    form?</h3>
                <button data-modal-hide="save-reg-form" type="button" data-modal-target="reg-form-saved"
                    data-modal-toggle="reg-form-saved"
                    class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                    Yes, I'm sure
                </button>
                <button data-modal-hide="save-reg-form" type="button"
                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-gray-200 rounded-lg border border-gray-200 hover:bg-gray-300 focus:z-10 focus:ring-4 focus:ring-gray-100">No,
                    cancel</button>
            </div>
        </div>
    </div>
</div>


<!-- --------------------------------------------------------------------------------------------------------------------------------------- -->

<!-- Registartion form submitted modal -->


<!-- Success Modal -->
<div id="reg-form-saved" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 justify-center items-center w-full h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <!-- Close Button -->
            <button type="button"
                class="absolute top-3 right-3 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                data-modal-hide="reg-form-saved">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center space-y-3" id="model-content">
                <!-- Success Icon -->
                <i class="bi bi-check-circle text-5xl text-green-700"></i>
                <h3 class="text-lg font-normal text-gray-500">Registration form submitted successfully!</h3>
                <div class="">
                    <p class="m-0 text-xs font-semibold text-gray-500">- Recruitment ID -</p>
                    <p class="m-0 text-lg font-semibold text-gray-950" id="registrationId"></p>
                </div>
                <div class="">
                    <p class="mb-2 text-xs font-medium text-gray-500">(Login to continue form fillup as per the
                        advertised post's.)</p>
                    <a data-modal-hide="reg-form-saved" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-white focus:outline-none bg-blue-600 rounded-lg border border-blue-200 hover:bg-blue-700 focus:z-10 focus:ring-4 focus:ring-blue-100"
                        href="{{ route('login') }}">Back to Login</a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- --------------------------------------------------------------------------------------------------------------------------------------- -->

<!-- Error Message Modal -->
<!-- Error Modal -->
<div id="responseModal" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex justify-center items-center w-full h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <button type="button"
                class="absolute top-3 right-3 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center"
                data-modal-hide="responseModal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <h3 class="mb-5 text-lg font-bold text-black">
                    There were some errors with your registration:
                </h3>
                <div id="responseMessage"></div> <!-- Error messages will appear here -->
                <button data-modal-hide="responseModal" type="button"
                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-gray-200 rounded-lg border border-gray-200 hover:bg-gray-300 focus:z-10 focus:ring-4 focus:ring-gray-100">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
