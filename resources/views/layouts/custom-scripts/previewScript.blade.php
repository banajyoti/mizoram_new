<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('#confirm-btn').hide();
        $('#default-checkbox').on('change', function() {
            if ($(this).is(':checked')) {
                $('#confirm-btn').show();
            } else {
                $('#confirm-btn').hide();
            }
        });

        $('#confirm-btn').on('click', function(event) {
            event.preventDefault();
            $.ajax({
                url: '{{ route('preview') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'question',
                            title: 'Do you want to proceed?',
                            text: "Once you submit, you cannot edit.",
                            showCancelButton: true,
                            confirmButtonColor: '#2DB325',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, Proceed',
                            cancelButtonText: 'Cancel',
                            reverseButtons: true
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Form Submitted',
                                    text: response.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(() => {
                                    window.location.href =
                                        '{{ route('getPayment') }}';
                                });
                            }
                        });
                    }
                },

                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred while submitting your form. Please try again.'
                    });
                }
            });
        });
    });
</script>
