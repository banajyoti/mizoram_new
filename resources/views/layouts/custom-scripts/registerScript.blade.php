<script>
    $(document).ready(function() {
        $('#submitButton').on('click', function(event) {
            event.preventDefault();
            $('#save-reg-form').removeClass('hidden');
        });

        $('[data-modal-hide="save-reg-form"]').on('click', function() {
            $('#save-reg-form').addClass('hidden');
            $('div[class*="bg-gray-900/50"]').addClass('hidden');
        });

        $('[data-modal-target="reg-form-saved"]').on('click', function() {
            var formData = $('#registrationForm').serialize();
            $.ajax({
                url: '{{ route('register') }}',
                type: 'POST',
                data: formData,
                success: function(response) {
                    console.log(response.registration_number)
                    $('#save-reg-form').addClass('hidden');
                    $('div[class*="bg-gray-900/50"]').addClass('hidden');
                    var successContent = `
                    <i class="bi bi-check-circle text-5xl text-green-700"></i>
                    <h3 class="text-lg font-normal text-gray-500">Registration form submitted successfully!</h3>
                    <div>
                        <p class="m-0 text-xs font-semibold text-gray-500">- Recruitment ID -</p>
                        <p class="m-0 text-lg font-semibold text-gray-950" id="registrationId">${response.registration_number}</p>
                    </div>
                    <div>
                        <p class="mb-2 text-xs font-medium text-gray-500">(Login to continue form fill-up as per the advertised post's.)</p>
                        <a data-modal-hide="reg-form-saved" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-white focus:outline-none bg-blue-600 rounded-lg border border-blue-200 hover:bg-blue-700 focus:z-10 focus:ring-4 focus:ring-blue-100" href="{{ route('login') }}">Back to Login</a>
                    </div>
                `;

                    $('#model-content').html(successContent);
                    $('#reg-form-saved').removeClass('hidden');

                },
                error: function(xhr) {
                    $('#responseMessage').empty();
                    try {
                        const jsonResponse = JSON.parse(xhr.responseText);
                        var errorMessages = '';
                        console.log(jsonResponse.errors)

                        if (jsonResponse.errors) {
                            $.each(jsonResponse.errors, function(field, messages) {
                                errorMessages +=
                                    `<div class="flex items-center space-x-2 mb-2">
            <span class="text-red-500 text-xl">⚠️</span>
            <p class="text-red-500 text-sm">${messages[0]}</p>
        </div>`;
                            });
                            console.log(errorMessages)

                            $('#model-content').html(
                                `<h3 class="mb-5 text-lg font-normal text-gray-500">There were some errors with your registration:</h3>`
                            );
                            $('#model-content').append(errorMessages);
                            $('#model-content').append(`<button data-modal-hide="reg-form-saved" type="button"
                    class="close-model-error py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-gray-200 rounded-lg border border-gray-200 hover:bg-gray-300 focus:z-10 focus:ring-4 focus:ring-gray-100">
                    Close
                </button>`);
                            $('#reg-form-saved').removeClass(
                                'hidden');
                        } else {
                            $('#responseMessage').html(`
                            <p class="text-red-500 text-sm">An unknown error occurred. Please try again.</p>
                        `);
                        }
                    } catch (e) {
                        $('#responseMessage').html(`
                        <p class="text-red-500 text-sm">An error occurred: ${xhr.responseText}</p>
                    `);
                    }
                }
            });
        });

        $(document).ready(function() {
            // Hide modal when the Close button is clicked
            $(document).on('click', '.close-model-error', function() {
                $('#reg-form-saved').addClass('hidden'); // Hide the modal
                $('div[class*="bg-gray-900/50"]').addClass('hidden');

            })
        });

        // Handle sending OTP
        document.getElementById('send_OTP').addEventListener('click', function() {
            const phoneNumber = document.getElementById('p_number').value;

            if (!phoneNumber) {
                alert('Please enter your phone number.');
                return;
            }

            // Create FormData object
            const formData = new FormData();
            formData.append('phone', phoneNumber);

            fetch('/send-otp', {
                    method: 'POST',
                    dataType: 'text',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('OTP sent successfully!');
                        document.querySelector('.verify_phone').classList.remove(
                            'hidden'); // Show OTP input
                    } else {
                        alert('Error sending OTP. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while sending the OTP.');
                });
        });

        // Event listener for Resend OTP button
        document.getElementById('resend_OTP').addEventListener('click', function() {
            const phoneNumber = document.getElementById('p_number').value;

            if (!phoneNumber) {
                alert('Please enter your phone number.');
                return;
            }

            // Create FormData object for resending OTP
            const formData = new FormData();
            formData.append('phone', phoneNumber);

            fetch('/resend-otp', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('OTP resent successfully!');
                    } else {
                        alert('Error resending OTP. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while resending the OTP.');
                });
        });

        // Handle OTP verification
        document.getElementById('verified').addEventListener('click', function() {
            const otp = document.getElementById('otp').value;

            if (!otp) {
                alert('Please enter the OTP.');
                return;
            }

            // Create FormData object
            const formData = new FormData();
            formData.append('otp', otp);

            fetch('/verify-otp', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('OTP verified successfully!');
                        document.querySelector('.verify_phone').classList.add('hidden');

                        // Show the submit button
                        document.getElementById('submitButton').classList.remove('hidden');

                        // Make the phone number field readonly
                        document.getElementById('p_number').setAttribute('readonly', true);
                    } else {
                        alert('Invalid OTP. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while verifying the OTP.');
                });
        });
    });
</script>
<script>
    document.getElementById('reg_declaration').addEventListener('change', function() {
        const submitButton = document.getElementById('submitButton');

        if (this.checked) {
            submitButton.classList.remove('hidden'); // Show the button
        } else {
            submitButton.classList.add('hidden'); // Hide the button
        }
    });

    /** jQUERY for calculate age **/
    function myFunction() {
        var dob = document.getElementById("dob").value;

        var form = document.getElementById("form"),
            date = document.getElementById("date2"),
            month = document.getElementById("month2"),
            year = document.getElementById("year2"),

            age = document.getElementById("age"),
            days = document.getElementById("days"),
            mons = document.getElementById("months"),
            ddd = "2025/01/01";
        today = new Date(ddd);
        console.log(today);

        year.value = today.getFullYear();
        month.value = today.getMonth() + 1;
        date.value = today.getDate();

        var arr = dob.split("-");
        var by = arr[0];
        var bm = arr[1];
        var bd = arr[2];

        var ty = Number.parseFloat(year.value),
            tm = Number.parseFloat(month.value),
            td = Number.parseFloat(date.value);
        console.log(ty);

        if (td < bd) {
            days = (td - bd + 30);
            tm = tm - 1;
        } else {
            days = (td - bd);
        }

        if (tm < bm) {
            months = (tm - bm + 12);
            ty = ty - 1;
        } else {
            months = (tm - bm);
        }
        agee.value = (ty - by) + ' years ' + months + ' months ' + days + ' days';
    }
</script>

<script>
    $('input[type=text], textarea').keyup(function() {
        $(this).val(function() {
            return this.value.toUpperCase();
        })
    });

    /** jQUERY for email validation **/
    const validateEmail = (email) => {
        return email.match(
            /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
    };

    const validate = () => {
        const $result = $('#result');
        const email = $('.email').val();
        $result.text('');

        if (validateEmail(email)) {
            $result.text(email + ' is valid.');
            $result.css('color', 'green');
        } else {
            $result.text(email + ' is invalid.');
            $result.css('color', 'red');
        }
        return false;
    }

    $('#email').on('input', validate);

    /** jQUERY for phone number validation **/
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }

    function hideButton() {
        // Get the Send OTP button by its ID
        var otpButton = document.getElementById('send_OTP');

        // Hide the button by setting its display property to 'none'
        otpButton.style.display = 'none';

        // Optionally, you can also add some logic here to send the OTP.
    }
</script>
<script>
    function toggleCategoryField() {
        var yesRadio = document.getElementById("yes");
        var noRadio = document.getElementById("no");

        var categoryField = document.getElementById("category-field");
        var categoryFieldNo = document.getElementById("category-field-no");
        var mSport = document.getElementById("ms");
        var sportsSection = document.getElementById('sports-section');
        var categoriesSection = document.getElementById('categories-section');

        // Show/Hide based on radio button selection
        if (yesRadio.checked) {
            categoryField.classList.remove("hidden");
            categoryFieldNo.classList.add("hidden");
            mSport.classList.remove("hidden");
            // sportsSection.classList.remove("hidden");
            // categoriesSection.classList.remove("hidden");
        } else if (noRadio.checked) {
            categoryFieldNo.classList.remove("hidden");
            categoryField.classList.add("hidden");
            mSport.classList.add("hidden");
            sportsSection.classList.add("hidden");
            categoriesSection.classList.add("hidden");
        }
    }

    // Initial check on page load to set correct state
    window.onload = function() {
        // Hide mSport initially
        var mSport = document.getElementById("ms");
        mSport.classList.add("hidden");

        toggleCategoryField(); // Ensure correct display based on the selected radio button
    };
</script>

<script>
    document.getElementById('m_sport').addEventListener('change', function() {
        var sportValue = this.value;

        // Get the divs for games and categories sections
        var sportsSection = document.getElementById('sports-section');
        var categoriesSection = document.getElementById('categories-section');

        // Show or hide based on the value selected
        if (sportValue === '1') { // YES
            sportsSection.classList.remove('hidden');
            categoriesSection.classList.remove('hidden');
        } else if (sportValue === '2') { // NO
            sportsSection.classList.add('hidden');
            categoriesSection.classList.add('hidden');
        }
    });

    // Listen for the change event on the "Are you an Ex-Serviceman?" dropdown
    // document.getElementById('ex_ser').addEventListener('change', function() {
    //     const selectedValue = this.value;
    //     const textBox = document.getElementById('ex_ser_textbox');

    //     // If 'YES' is selected, show the text box
    //     if (selectedValue === '1') {
    //         textBox.classList.remove('hidden');
    //     } else {
    //         // If 'NO' is selected, hide the text box
    //         textBox.classList.add('hidden');
    //     }
    // });
</script>
{{-- <script>
    // Initialize Flatpickr on the input with the id 'dob'
    flatpickr("#dob", {
        dateFormat: "Y-m-d",  // Format the selected date (e.g., 2024-12-10)
        disableMobile: true,   // Disable the mobile native date picker on mobile devices
        inline: false,         // The calendar is shown as an overlay (set true to make it inline)
        placeholder: "Select Date",  // Placeholder text
        minDate: "1900-01-01", // Set minimum allowed date
        maxDate: "2024-12-31", // Set maximum allowed date
    });
</script> --}}
