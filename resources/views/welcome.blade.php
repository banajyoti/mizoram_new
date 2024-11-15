<script>
    $(document).ready(function() {
    // Show confirmation modal when the submit button is clicked
    $('#submitButton').on('click', function(event) {
        event.preventDefault(); // Prevent the form from submitting immediately
        $('#save-reg-form').removeClass('hidden'); // Show the confirmation modal
    });

    // Close the confirmation modal when clicking "No, cancel"
    $('[data-modal-hide="save-reg-form"]').on('click', function() {
        $('#save-reg-form').addClass('hidden'); // Hide the confirmation modal
    });

    // Handle the "Yes, I'm sure" button click in the confirmation modal
    $('[data-modal-target="reg-form-saved"]').on('click', function() {
        // Collect form data
        var formData = $('#registrationForm').serialize();

        // Send AJAX request to submit the form data
        $.ajax({
            url: '{{ route('register') }}', // Your registration route
            type: 'POST',
            data: formData,
            success: function(response) {
                // Hide the confirmation modal
                $('#save-reg-form').addClass('hidden');

                // Update the content of the success modal
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

                // Insert the success content into the modal
                $('#modalContent').html(successContent);
                $('#reg-form-saved').removeClass('hidden'); // Show the success modal
            },
            error: function(xhr) {
                // Hide the success modal if it is showing
                $('#reg-form-saved').addClass('hidden'); // Hide the success modal

                // Clear previous error messages
                $('#responseMessage').empty();

                // If there are validation errors, display them in the modal
                try {
                    const jsonResponse = JSON.parse(xhr.responseText);
                    var errorMessages = '';
                    if (jsonResponse.errors) {
                        $.each(jsonResponse.errors, function(field, messages) {
                            // Loop through each error and display it
                            errorMessages += `<p class="text-red-500 text-sm">${messages[0]}</p>`;
                        });

                        // Show the error messages in the modal
                        $('#responseMessage').html(errorMessages);
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

                // Show the error modal
                $('#responseModal').removeClass('hidden');
            }
        });
    });

    // Close the error modal when clicking the close button
    $('[data-modal-hide="responseModal"]').on('click', function() {
        $('#responseModal').addClass('hidden'); // Hide the error modal
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
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('OTP sent successfully!');
                    document.querySelector('.verify_phone').classList.remove('hidden'); // Show OTP input
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
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
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
{{-- <script>
    // Get the checkbox and the button elements
    const checkbox = document.getElementById("reg_declaration");
    const submitButton = document.getElementById("submitButton");

    // Add an event listener to the checkbox to detect changes
    checkbox.addEventListener("change", function() {
        if (checkbox.checked) {
            // Show the button if the checkbox is checked
            submitButton.classList.remove("hidden");
        } else {
            // Hide the button if the checkbox is unchecked
            submitButton.classList.add("hidden");
        }
    });
</script> --}}
