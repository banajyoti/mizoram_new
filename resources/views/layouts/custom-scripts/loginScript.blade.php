<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include SweetAlert 2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $('#loginButton').on('click', function(event) {
            // Prevent the default form submission
            event.preventDefault();

            // Collect form data
            const recId = $('#rec_id').val();
            const mobileNumber = $('#mob_no').val();
            const dob = $('#dob').val();

            // Simple validation: Ensure that either Recruitment ID or Mobile Number & DOB is filled
            if (!dob && (!recId || !mobileNumber)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    confirmButtonColor: '#FF0000',
                    text: 'Please provide either a Recruitment ID or both Mobile Number and Date of Birth.'
                });
                return;
            }

            // Prepare data for AJAX request
            const data = {
                rec_id: recId, // Optional: If provided
                mobile_no: mobileNumber, // Optional: If provided
                dob: dob // Required
            };

            // Send AJAX request to the login route
            $.ajax({
                url: '{{ route('login') }}', // Your login route URL
                type: 'POST',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                        'content') // CSRF token for security
                },
                success: function(response) {
                    if (response.status === 'success') {
                        // Handle success
                        $('#userId').text(response.id);
                        // Handle successful login
                        Swal.fire({
                            icon: 'success',
                            title: 'Login Successful',
                            text: response.message,
                            showConfirmButton: false,
                            confirmButtonColor: '#2DB325',
                            timer: 1500 // Auto-hide after 1.5 seconds
                        }).then(() => {
                            // Redirect after successful login
                            window.location.href = response.redirect_url;
                        });
                    } else {
                        // Handle failed login
                        Swal.fire({
                            icon: 'error',
                            title: 'Login Failed',
                            confirmButtonColor: '#FF0000',
                            text: response.message
                        });
                    }
                },
                error: function(xhr) {
                    // Handle errors (invalid form submission, etc.)
                    const response = xhr.responseJSON; // Get the response from the server
                    if (response && response.message) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            confirmButtonColor: '#FF0000',
                            text: response
                                .message // Show detailed error message from the server
                        });
                    } else {
                        // Fallback in case of an unexpected error or no message in the response
                        Swal.fire({
                            icon: 'error',
                            title: 'Unexpected Error',
                            confirmButtonColor: '#FF0000',
                            text: 'An unexpected error occurred. Please try again.'
                        });
                    }
                }
            });
        });
    });
</script>
