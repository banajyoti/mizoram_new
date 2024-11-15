<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.body.addEventListener('change', function(e) {
        if (e.target && e.target.id === 'photo') {
            let file = e.target.files[0];
            let fileLink = document.getElementById('photo_view');
            let maxSize = 200 * 1024; // Maximum file size: 200 KB (in bytes)

            if (file) {
                // Check if the file is a PDF
                if (file.type === 'image/') {
                    // Check if the file size is less than or equal to 200 KB
                    if (file.size <= maxSize) {
                        let reader = new FileReader();
                        reader.onload = function() {
                            let fileUrl = reader.result;
                            // Update the "View Document" link to point to the file URL
                            fileLink.href = fileUrl;
                            // Show the "View Document" link
                            fileLink.classList.remove('hidden');
                        };
                        reader.readAsDataURL(file); // Read the PDF as a Data URL
                    } else {
                        // If the file size is larger than 200 KB, show an alert
                        alert("File size is too large. Please select a file smaller than 200 KB.");
                        fileLink.classList.add('hidden'); // Hide the View Document link
                    }
                } else {
                    // If the file is not a PDF, show an alert
                    alert("Please upload a valid image file (JPG, PNG, GIF).");
                    fileLink.classList.add('hidden'); // Hide the View Document link
                }
            } else {
                // If no file is selected, hide the View Document link
                fileLink.classList.add('hidden');
            }
        }
    });

    // Add event listener for the Signature input
    document.getElementById('signature').addEventListener('change', function(e) {
        let file = e.target.files[0];
        let fileLink = document.getElementById('signature_view');
        let maxSize = 200 * 1024; // Maximum file size: 200 KB (in bytes)

        if (file) {
            // Check if the file is an image (JPG, PNG, GIF, etc.)
            if (file.type.startsWith('image/')) {
                // Check if the file size is less than or equal to 200 KB
                if (file.size <= maxSize) {
                    let reader = new FileReader();
                    reader.onload = function() {
                        let fileUrl = reader.result;
                        // Update the "View Document" link to point to the file URL
                        fileLink.href = fileUrl;
                        // Show the "View Document" link
                        fileLink.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file); // Read the image as a data URL
                } else {
                    // If the file size is larger than 200 KB, show an alert
                    alert("File size is too large. Please select a file smaller than 200 KB.");
                    fileLink.classList.add('hidden'); // Hide the View Document link
                }
            } else {
                // If the file is not an image, show an alert
                alert("Please upload a valid image file (JPG, PNG, GIF).");
                fileLink.classList.add('hidden'); // Hide the View Document link
            }
        } else {
            // If no file is selected, hide the View Document link
            fileLink.classList.add('hidden');
        }
    });


    // Add event listener for the Age Proof Certificate input
    document.getElementById('age_proof').addEventListener('change', function(e) {
        let file = e.target.files[0];
        let fileLink = document.getElementById('age_proof_view');
        let maxSize = 200 * 1024; // Maximum file size: 200 KB (in bytes)

        if (file) {
            // Check if the file is a PDF
            if (file.type === 'application/pdf') {
                // Check if the file size is less than or equal to 200 KB
                if (file.size <= maxSize) {
                    let reader = new FileReader();
                    reader.onload = function() {
                        let fileUrl = reader.result;
                        // Update the "View Document" link to point to the file URL
                        fileLink.href = fileUrl;
                        // Show the "View Document" link
                        fileLink.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file); // Read the PDF as a Data URL
                } else {
                    // If the file size is larger than 200 KB, show an alert
                    alert("File size is too large. Please select a file smaller than 200 KB.");
                    fileLink.classList.add('hidden'); // Hide the View Document link
                }
            } else {
                // If the file is not a PDF, show an alert
                alert("Please upload a valid PDF document.");
                fileLink.classList.add('hidden'); // Hide the View Document link
            }
        } else {
            // If no file is selected, hide the View Document link
            fileLink.classList.add('hidden');
        }
    });

    // Add event listener for the Class X Marksheet input
    document.getElementById('x_marksheet').addEventListener('change', function(e) {
        let file = e.target.files[0];
        let fileLink = document.getElementById('x_marksheet_view');
        let maxSize = 200 * 1024; // Maximum file size: 200 KB (in bytes)

        if (file) {
            // Check if the file is a PDF
            if (file.type === 'application/pdf') {
                // Check if the file size is less than or equal to 200 KB
                if (file.size <= maxSize) {
                    let reader = new FileReader();
                    reader.onload = function() {
                        let fileUrl = reader.result;
                        // Update the "View Document" link to point to the file URL
                        fileLink.href = fileUrl;
                        // Show the "View Document" link
                        fileLink.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file); // Read the PDF as a Data URL
                } else {
                    // If the file size is larger than 200 KB, show an alert
                    alert("File size is too large. Please select a file smaller than 200 KB.");
                    fileLink.classList.add('hidden'); // Hide the View Document link
                }
            } else {
                // If the file is not a PDF, show an alert
                alert("Please upload a valid PDF document.");
                fileLink.classList.add('hidden'); // Hide the View Document link
            }
        } else {
            // If no file is selected, hide the View Document link
            fileLink.classList.add('hidden');
        }
    });

    // Add event listener for the Mizo Language Proficiency Cert input
    document.getElementById('mizo_lang_prof').addEventListener('change', function(e) {
        let file = e.target.files[0];
        let fileLink = document.getElementById('mizo_lang_prof_view');
        let maxSize = 200 * 1024; // Maximum file size: 200 KB (in bytes)

        if (file) {
            // Check if the file is a PDF
            if (file.type === 'application/pdf') {
                // Check if the file size is less than or equal to 200 KB
                if (file.size <= maxSize) {
                    let reader = new FileReader();
                    reader.onload = function() {
                        let fileUrl = reader.result;
                        // Update the "View Document" link to point to the file URL
                        fileLink.href = fileUrl;
                        // Show the "View Document" link
                        fileLink.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file); // Read the PDF as a Data URL
                } else {
                    // If the file size is larger than 200 KB, show an alert
                    alert("File size is too large. Please select a file smaller than 200 KB.");
                    fileLink.classList.add('hidden'); // Hide the View Document link
                }
            } else {
                // If the file is not a PDF, show an alert
                alert("Please upload a valid PDF document.");
                fileLink.classList.add('hidden'); // Hide the View Document link
            }
        } else {
            // If no file is selected, hide the View Document link
            fileLink.classList.add('hidden');
        }
    });


    // Add event listener for the Homeguard Certificate input
    document.body.addEventListener('change', function(e) {
        if (e.target && e.target.id === 'homeguard') {
            let file = e.target.files[0];
            let fileLink = document.getElementById('homeguard_view');
            let maxSize = 200 * 1024; // Maximum file size: 200 KB (in bytes)

            if (file) {
                // Check if the file is a PDF
                if (file.type === 'application/pdf') {
                    // Check if the file size is less than or equal to 200 KB
                    if (file.size <= maxSize) {
                        let reader = new FileReader();
                        reader.onload = function() {
                            let fileUrl = reader.result;
                            // Update the "View Document" link to point to the file URL
                            fileLink.href = fileUrl;
                            // Show the "View Document" link
                            fileLink.classList.remove('hidden');
                        };
                        reader.readAsDataURL(file); // Read the PDF as a Data URL
                    } else {
                        // If the file size is larger than 200 KB, show an alert
                        alert("File size is too large. Please select a file smaller than 200 KB.");
                        fileLink.classList.add('hidden'); // Hide the View Document link
                    }
                } else {
                    // If the file is not a PDF, show an alert
                    alert("Please upload a valid PDF document.");
                    fileLink.classList.add('hidden'); // Hide the View Document link
                }
            } else {
                // If no file is selected, hide the View Document link
                fileLink.classList.add('hidden');
            }
        }
    });

    // Add event listener for the Caste Certificate input
    document.body.addEventListener('change', function(e) {
        if (e.target && e.target.id === 'cast_cert') {
            let file = e.target.files[0];
            let fileLink = document.getElementById('cast_cert_view');
            let maxSize = 200 * 1024; // Maximum file size: 200 KB (in bytes)

            if (file) {
                if (file.type === 'application/pdf') {
                    if (file.size <= maxSize) {
                        let reader = new FileReader();
                        reader.onload = function() {
                            let fileUrl = reader.result;
                            fileLink.href = fileUrl;
                            fileLink.classList.remove('hidden');
                        };
                        reader.readAsDataURL(file); // Read the PDF as a Data URL
                    } else {
                        alert("File size is too large. Please select a file smaller than 200 KB.");
                        fileLink.classList.add('hidden');
                    }
                } else {
                    alert("Please upload a valid PDF document.");
                    fileLink.classList.add('hidden');
                }
            } else {
                fileLink.classList.add('hidden');
            }
        }
    });

    // Add event listener for the NCC Certificate input
    document.addEventListener('DOMContentLoaded', function() {
        const nccInput = document.getElementById('ncc'); // Get the ncc input element

        // Check if the element exists before adding the event listener
        if (nccInput) {
            nccInput.addEventListener('change', function(e) {
                let file = e.target.files[0];
                let fileLink = document.getElementById('ncc_view');
                let maxSize = 200 * 1024; // Maximum file size: 200 KB (in bytes)

                if (file) {
                    // Check if the file is a PDF
                    if (file.type === 'application/pdf') {
                        // Check if the file size is less than or equal to 200 KB
                        if (file.size <= maxSize) {
                            let reader = new FileReader();
                            reader.onload = function() {
                                let fileUrl = reader.result;
                                // Update the "View Document" link to point to the file URL
                                fileLink.href = fileUrl;
                                // Show the "View Document" link
                                fileLink.classList.remove('hidden');
                            };
                            reader.readAsDataURL(file); // Read the PDF as a Data URL
                        } else {
                            // If the file size is larger than 200 KB, show an alert
                            alert("File size is too large. Please select a file smaller than 200 KB.");
                            fileLink.classList.add('hidden'); // Hide the View Document link
                        }
                    } else {
                        // If the file is not a PDF, show an alert
                        alert("Please upload a valid PDF document.");
                        fileLink.classList.add('hidden'); // Hide the View Document link
                    }
                } else {
                    // If no file is selected, hide the View Document link
                    fileLink.classList.add('hidden');
                }
            });
        }
    });


    // Add event listener for the Computer Certificate input
    document.getElementById('computer_cert').addEventListener('change', function(e) {
        let file = e.target.files[0];
        let fileLink = document.getElementById('computer_cert_view');
        let maxSize = 200 * 1024; // Maximum file size: 200 KB (in bytes)

        if (file) {
            // Check if the file is a PDF
            if (file.type === 'application/pdf') {
                // Check if the file size is less than or equal to 200 KB
                if (file.size <= maxSize) {
                    let reader = new FileReader();
                    reader.onload = function() {
                        let fileUrl = reader.result;
                        // Update the "View Document" link to point to the file URL
                        fileLink.href = fileUrl;
                        // Show the "View Document" link
                        fileLink.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file); // Read the PDF as a Data URL
                } else {
                    // If the file size is larger than 200 KB, show an alert
                    alert("File size is too large. Please select a file smaller than 200 KB.");
                    fileLink.classList.add('hidden'); // Hide the View Document link
                }
            } else {
                // If the file is not a PDF, show an alert
                alert("Please upload a valid PDF document.");
                fileLink.classList.add('hidden'); // Hide the View Document link
            }
        } else {
            // If no file is selected, hide the View Document link
            fileLink.classList.add('hidden');
        }
    });


    // Add event listener for the Mechanic Experience Certificate input
    document.body.addEventListener('change', function(e) {
        if (e.target && e.target.id === 'mechanic_cert') {
            let file = e.target.files[0];
            let fileLink = document.getElementById('mechanic_cert_view');
            let maxSize = 200 * 1024; // Maximum file size: 200 KB (in bytes)

            if (file) {
                // Check if the file is a PDF
                if (file.type === 'application/pdf') {
                    // Check if the file size is less than or equal to 200 KB
                    if (file.size <= maxSize) {
                        let reader = new FileReader();
                        reader.onload = function() {
                            let fileUrl = reader.result;
                            // Update the "View Document" link to point to the file URL
                            fileLink.href = fileUrl;
                            // Show the "View Document" link
                            fileLink.classList.remove('hidden');
                        };
                        reader.readAsDataURL(file); // Read the PDF as a Data URL
                    } else {
                        // If the file size is larger than 200 KB, show an alert
                        alert("File size is too large. Please select a file smaller than 200 KB.");
                        fileLink.classList.add('hidden'); // Hide the View Document link
                    }
                } else {
                    // If the file is not a PDF, show an alert
                    alert("Please upload a valid PDF document.");
                    fileLink.classList.add('hidden'); // Hide the View Document link
                }
            } else {
                // If no file is selected, hide the View Document link
                fileLink.classList.add('hidden');
            }
        }
    });

    // Add event listener for the ITI Experience Certificate input
    document.body.addEventListener('change', function(e) {
        if (e.target && e.target.id === 'iti_cert') {
            let file = e.target.files[0];
            let fileLink = document.getElementById('iti_cert_view');
            let maxSize = 200 * 1024; // Maximum file size: 200 KB (in bytes)

            if (file) {
                // Check if the file is a PDF
                if (file.type === 'application/pdf') {
                    // Check if the file size is less than or equal to 200 KB
                    if (file.size <= maxSize) {
                        let reader = new FileReader();
                        reader.onload = function() {
                            let fileUrl = reader.result;
                            // Update the "View Document" link to point to the file URL
                            fileLink.href = fileUrl;
                            // Show the "View Document" link
                            fileLink.classList.remove('hidden');
                        };
                        reader.readAsDataURL(file); // Read the PDF as a Data URL
                    } else {
                        // If the file size is larger than 200 KB, show an alert
                        alert("File size is too large. Please select a file smaller than 200 KB.");
                        fileLink.classList.add('hidden'); // Hide the View Document link
                    }
                } else {
                    // If the file is not a PDF, show an alert
                    alert("Please upload a valid PDF document.");
                    fileLink.classList.add('hidden'); // Hide the View Document link
                }
            } else {
                // If no file is selected, hide the View Document link
                fileLink.classList.add('hidden');
            }
        }
    });

    $(document).ready(function() {
        $('#save-proceed-btn').click(function(e) {
            e.preventDefault();

            $('#document-form').submit();
        });

        $('#document-form').submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: '{{ route('document') }}',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    Swal.fire({
                        title: "Success!",
                        text: response.message,
                        icon: "success",
                        confirmButtonColor: '#2DB325',
                        confirmButtonText: 'OK',
                    }).then(() => {
                        window.location.href = '{{ route('preview') }}';
                    });
                },
                error: function(xhr, status, error) {
                    var errors = xhr.responseJSON.errors;
                    var errorMessage = '';
                    for (var field in errors) {
                        if (Array.isArray(errors[field])) {
                            errorMessage += errors[field].join(', ') + '\n';
                        } else {
                            errorMessage += errors[field] + '\n';
                        }
                    }

                    Swal.fire({
                        title: "Error!",
                        text: errorMessage,
                        icon: "error",
                        confirmButtonText: 'OK',
                    });
                }
            });
        });
    });
</script>
