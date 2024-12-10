<script>
    $(document).ready(function() {
        // Function to handle file upload
        function uploadFile(event, fileType) {
            const fileInput = $(event.target);
            const file = fileInput[0].files[0];

            if (!file) {
                return;
            }

            let maxSize = 0;
            switch (fileType) {
                case 'photo':
                    maxSize = 450000; // 450KB for photo
                    break;
                case 'signature':
                    maxSize = 100000; // 100KB for signature
                    break;
                default:
                    maxSize = 200000; // Default max size for other files (200KB)
                    break;
            }

            if (file.size > maxSize) {
                alert(`File size exceeds the maximum limit for ${fileType}.`);
                return;
            }

            let formData = new FormData();
            formData.append(fileType, file);

            let uploadUrl = '/document'; // URL for file upload (Laravel route)
            $(`#${fileType}-status`).text(`Uploading ${fileType}...`);

            $.ajax({
                url: uploadUrl,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add CSRF token to the request headers for Laravel
                },
                success: function(data) {
                    // Format the fileType by replacing underscores with spaces and capitalizing the first letter of each word
                    let formattedFileType = fileType.replace(/_/g, ' ').replace(/\b\w/g, char =>
                        char.toUpperCase());

                    if (data.success) {
                        // Update the status text for success
                        $(`#${fileType}-status`).text(
                            `${formattedFileType} uploaded successfully!`);

                        // Show success SweetAlert
                        Swal.fire({
                            icon: 'success',
                            title: `${formattedFileType} Uploaded`,
                            text: `${formattedFileType} uploaded successfully!`,
                            confirmButtonText: 'Okay',
                            confirmButtonColor: '#2DB325'
                        }).then((result) => {
                            // Check if the "Okay" button was clicked
                            if (result.isConfirmed) {
                                location.reload(); // Reload the page after success
                            }
                        });
                    } else {
                        // Update the status text for failure
                        $(`#${fileType}-status`).text(`Failed to upload ${formattedFileType}.`);

                        // Show error SweetAlert
                        Swal.fire({
                            icon: 'error',
                            title: 'Upload Failed',
                            text: `Failed to upload ${formattedFileType}. Please try again.`,
                            confirmButtonText: 'Okay',
                            confirmButtonColor: '#FF0000'
                        });
                    }
                },

                error: function(error) {
                    $(`#${fileType}-status`).text(`Error uploading ${fileType}.`);

                    // Show error SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'There was an error while uploading the file. Please try again.',
                        confirmButtonText: 'Okay',
                        confirmButtonColor: '#FF0000'
                    });
                    console.error('Error:', error);
                }
            });
        }

        // Attach the upload function to all file input fields
        $('.upload_doc').on('change', function(event) {
            const fileType = $(this).data('id'); // Get file type from data-id attribute
            uploadFile(event, fileType);
        });
    });
</script>

<script>
    // Function to open the modal and show the enlarged image
    function enlargeImage(imgElement) {
        var modal = document.getElementById('enlargeModal');
        var modalImage = document.getElementById('modalImage');
        var closeModal = document.getElementById('closeModal');

        // Set the source of the modal image to the clicked image
        modalImage.src = imgElement.src;

        // Show the modal
        modal.classList.remove('hidden');

        // Close the modal when the close button is clicked
        closeModal.onclick = function() {
            modal.classList.add('hidden');
        };

        // Optionally close the modal if clicking outside the image
        window.onclick = function(event) {
            if (event.target === modal) {
                modal.classList.add('hidden');
            }
        };
    }
</script>
<script>
    // Function to open the modal and show the PDF
    function openPdfModal(pdfUrl) {
        var modal = document.getElementById('pdfModal');
        var iframe = document.getElementById('pdfIframe');
        var closeModal = document.getElementById('closePdfModal');

        // Set the PDF source to the clicked PDF file URL
        iframe.src = pdfUrl;

        // Show the modal
        modal.classList.remove('hidden');

        // Close the modal when the close button is clicked
        closeModal.onclick = function() {
            modal.classList.add('hidden');
            iframe.src = ""; // Clear the iframe source to stop PDF rendering
        };

        // Optionally close the modal if clicking outside the image
        window.onclick = function(event) {
            if (event.target === modal) {
                modal.classList.add('hidden');
                iframe.src = ""; // Clear the iframe source to stop PDF rendering
            }
        };
    }
</script>
