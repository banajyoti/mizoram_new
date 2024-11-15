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
                        if (jsonResponse.errors) {
                            $.each(jsonResponse.errors, function(field, messages) {
                                errorMessages +=
                                    `<div class="flex items-center space-x-2 mb-2">
            <span class="text-red-500 text-xl">⚠️</span>
            <p class="text-red-500 text-sm">${messages[0]}</p>
        </div>`;
                            });

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
            ddd = "2024/07/01";
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
</script>
