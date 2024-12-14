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
                <a
                    class="grow inline-block lg:w-full border border-green-600 shadow-md rounded-lg p-2 flex items-center text-green-600 font-medium transition-all text-xs">
                    <div class="h-8 w-8 bg-gray-200 rounded-full lg:mr-2 text-black text-xs flex"><span
                            class="m-auto text-sm TimesNR"><i class="bi bi-building"></i></span></div>
                    <span class="hidden lg:inline-block">Exam Centre Preference</span>
                </a>
                <div class="flex h-6 sm:ml-6">
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
        <div class="grow flex flex-col group">
            <div class="h-full flex flex-col items-center md:items-start">
                <a class="grow inline-block lg:w-full border border-gray-300 hover:border-blue-600 hover:shadow-md rounded-lg p-2 flex items-center hover:text-blue-600 font-medium transition-all text-xs"
                    href="#">
                    <div class="h-8 w-8 bg-gray-200 rounded-full lg:mr-2 text-black text-xs flex"><span
                            class="m-auto text-sm TimesNR"><i class="bi bi-download"></i></span></div>
                    <span class="hidden lg:inline-block">Download</span>
                </a>
                <div class="flex h-6 ml-6">
                    <div class="h-full w-[2px] bg-gray-300 group-hover:bg-blue-600"></div>
                </div>
            </div>
        </div>
    </div>



    <div class="p-4 grow border border-gray-300 rounded-lg space-y-2">
        <p class="m-auto text-yellow-500 text-center rounded-md text-[0.65rem] md:text-sm font-medium">Candidate are
            requested to select the PET and examination centre</p>
        <div class="flex flex-col items-center justify-center space-y-4">
            <form id="centrePreferenceForm" action="{{ route('centrePreference') }}" method="POST">
                @csrf
                <div class="mb-6 lg:w-[60vw] flex flex-col flex-wrap items-center">
                    <div class="p-2 border border-yellow-500 rounded-lg p-4 px-8">
                        <p class="mb-2 text-gray-600">Select centre's that you want to apply for</p>
                        <div class="grow flex gap-2">
                            <select id="centre_id" name="centre_id"
                                class="my-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled>--select centre--</option>
                                @foreach ($examCentres as $ex)
                                    <option value="{{ $ex->id }}">{{ $ex->name }}</option>
                                @endforeach
                            </select>
                            <div class="my-auto">
                                <button type="submit"
                                    class="my-auto whitespace-nowrap bg-blue-600 hover:bg-blue-700 p-2.5 text-white rounded-lg fs-12 {{ $preferenceCount == 2 ? 'hidden' : '' }}"
                                    onclick="return confirm('Are you sure?');" id="add-more">
                                    <i class="bi bi-plus"></i>Add
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- List of posts with preference order (Data Table) -->
            <p class="text-gray-600">List of centre's with preference order</p>
            <div class="lg:w-[60vw] hidden md:grid grid-cols-12" id="post-preference-table">
                <div class="col-span-2 border">
                    <div class="h-full p-2 text-sm lg:text-md text-center">
                        Preference Number
                    </div>
                </div>
                <div class="col-span-7 border">
                    <div class="h-full p-2 text-sm lg:text-md">
                        Centre Name
                    </div>
                </div>
                <div class="col-span-3 border">
                    <div class="h-full p-2 text-sm lg:text-md text-center">
                        #
                    </div>
                </div>
                <!-- Dynamically render preferences from the database -->
                @foreach ($preferences as $preference)
                    <div class="col-span-2 border post-row">
                        <div class="h-full p-2 text-sm lg:text-md text-center">
                            {{ $preference->preferences }}
                        </div>
                    </div>
                    <div class="col-span-7 border post-row">
                        <div class="h-full p-2 text-sm lg:text-md">
                            {{ $preference->name }} <!-- Assuming you have a relationship with Post model -->
                        </div>
                    </div>
                    <div class="col-span-3 border post-row">
                        <div class="h-full p-2 text-sm lg:text-md text-center">
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
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="mt-auto px-4 flex items-center">
    <a class="inline-block bg-gray-600 hover:bg-gray-700 text-white p-2 rounded-md Nunito"
        href="{{ route('profile') }}"><i class="bi bi-arrow-left-short pr-1"></i>Go Back</a>
    <a class="ml-auto inline-block bg-green-600 hover:bg-green-700 text-white p-2 rounded-md Nunito
        {{ $preferenceCount == 2 ? '' : 'hidden' }}"
        href="{{ route('document') }}">
        <i class="bi bi-check-all pr-1"></i>Save & proceed
    </a>
    {{-- <a class="ml-auto inline-block bg-green-600 hover:bg-green-700 text-white p-2 rounded-md Nunito {{ !empty($check) ? '' : 'hidden' }}"
        href="{{ route('document') }}"><i class="bi bi-check-all pr-1"></i>Save & proceed</a> --}}
</div>
@include('layouts.footer')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script>
    $(document).on('click', '.updatePref', function(e) {
        e.preventDefault();
        var elm = $(this);
        $('.pageloader').fadeIn();
        var prefId = $(this).attr('prefId');
        var type = $(this).attr('typeId');
        var actionUrl = "/centre-update-preference/" + prefId + "/" + type;
        elm.attr('disabled', true);

        $.ajax({
            type: 'GET',
            url: actionUrl,
            success: function(data) {
                $('.pageloader').fadeOut();
                elm.attr('disabled', false);

                // Success alert
                swal.fire({
                    title: 'Success!',
                    text: 'Your preference has been updated.',
                    icon: 'success',
                    confirmButtonClass: 'btn btn-success',
                    confirmButtonColor: '#2DB325'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.reload(); // Refresh the page after success
                    }
                });
            },
            error: function(data) {
                $(".pageloader").fadeOut();
                elm.attr('disabled', false);

                // Error handling
                var msg = ajaxErrorMsg(data); // Assuming this function generates the error message
                swal.fire({
                    title: 'Sorry!',
                    html: msg, // Display the error message here
                    icon: 'error',
                    confirmButtonClass: 'btn btn-danger',
                    confirmButtonColor: '##B32525'
                });
            },
        });
    });
</script>

<script>
    $(document).ready(function() {
        // When the form is submitted
        $('#centrePreferenceForm').on('submit', function(e) {
            e.preventDefault(); // Prevent normal form submission

            var formData = new FormData(this); // Create a FormData object to handle form data

            // Perform AJAX request
            $.ajax({
                url: $(this).attr('action'), // Use the form action URL
                type: 'POST',
                data: formData,
                processData: false, // Prevent jQuery from processing the data
                contentType: false, // Prevent jQuery from setting contentType
                success: function(response) {
                    // Handle the success response
                    if (response.success) {
                        // Show a success SweetAlert message
                        swal.fire({
                            title: 'Success!',
                            text: response.message, // Display success message
                            icon: 'success',
                            confirmButtonClass: 'btn btn-success',
                            confirmButtonColor: '#2DB325'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href =
                                    '{{ route('centrePreference') }}'; // Redirect to the desired route
                            }
                        });
                    } else {
                        // Handle error responses with SweetAlert
                        swal.fire({
                            title: 'Error!',
                            text: response.message, // Display error message
                            icon: 'error',
                            confirmButtonClass: 'btn btn-danger',
                            confirmButtonColor: '#2DB325'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    // Handle any AJAX errors
                    swal.fire({
                        title: 'Oops!',
                        text: 'There was an error. Please try again later.',
                        icon: 'error',
                        confirmButtonClass: 'btn btn-danger',
                        confirmButtonColor: '##B32525'
                    });
                }
            });
        });
    });
</script>
{{-- <script>
    // Optionally, you can also check for preference count on page load (if not passed directly)
    $(document).ready(function() {
        var preferenceCount = {{ $preferenceCount }};

        if (preferenceCount >= 4) {
            $('#add-more').attr('disabled', true);
        } else {
            $('#add-more').attr('disabled', false);
        }
    });
</script> --}}

