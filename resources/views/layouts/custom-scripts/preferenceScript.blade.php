<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        var preferenceCount = 1;
        $('.add-post-btn').on('click', function() {
            var section = $(this).data('section');
            var postText = '';
            var postId = '';

            if (section === 'ab') {
                postText = 'Constable (AB)';
                postId = 1;
            } else if (section === 'ub') {
                postText = 'Constable (UB)';
                postId = 2;
            } else if (section === 'constable') {
                postText = 'Constable (Mechanic)';
                postId = 3;
            }

            var newPostHtml = `
            <div class="mb-8 post-list-item" data-post-id="${postId}">
                <div class="lg:w-[60vw] grid grid-cols-12">
                    <div class="col-span-2 md:col-span-2 border">
                        <div class="h-full p-2 text-center">
                            ${preferenceCount} <!-- Displaying the preferenceCount -->
                        </div>
                    </div>
                    <div class="col-span-10 md:col-span-7 border">
                        <div class="h-full p-2">
                            ${postText}  <!-- Displaying the postText -->
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-3 border">
                        <div class="h-full p-2 text-center">
                            <button type="button" class="p-1 px-2 rounded bg-gray-200 hover:bg-gray-600 hover:text-white updatePref">
                                <i class="bi bi-chevron-up"></i>
                            </button>
                            <button type="button" class="p-1 px-2 rounded bg-gray-200 hover:bg-gray-600 hover:text-white updatePref">
                                <i class="bi bi-chevron-down"></i>
                            </button>
                            <button type="button" class="p-1 px-2 rounded bg-gray-200 hover:bg-gray-400 text-red-500 updatePref">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `;

            $('#post-list-container').append(newPostHtml);
            preferenceCount++;

            submitPostToDatabase(postId, preferenceCount -
                1);

            $(this).hide();
            $(this).closest('.col-span-12').find('.post-added-btn')
                .show();
        });

        function submitPostToDatabase(postId, preference) {
            var postData = {
                _token: $('meta[name="csrf-token"]').attr('content'),
                post_id: postId,
                preference: preference
            };

            $.ajax({
                url: '/preference',
                method: 'POST',
                contentType: 'application/json',
                dataType: 'json',
                data: JSON.stringify(postData),
                success: function(response) {
                    window.location.reload();
                    console.log('Post saved successfully', response);
                    swal.fire({
                        title: 'Success!',
                        text: 'Your preference has been updated.',
                        icon: 'success',
                        confirmButtonClass: 'btn btn-success',
                        confirmButtonColor: '#2DB325'
                    }).then(function() {
                        if (response.preferences) {
                            updatePreferencesList(response.preferences);
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', status, error);
                    console.log(xhr.responseText);

                    swal.fire({
                        title: 'Oops!',
                        text: 'Something went wrong while saving your preference.',
                        icon: 'error',
                        confirmButtonClass: 'btn btn-danger',
                        confirmButtonColor: '##B32525'
                    });
                }
            });
        }

        function updatePreferencesList(preferences) {
            $('#post-list-container').empty();

            preferences.forEach(function(preference) {
                var postText = '';
                if (preference.post_id == 1) postText = 'Constable (AB)';
                else if (preference.post_id == 2) postText = 'Constable (UB)';
                else postText = 'Constable (Mechanic)';

                $('#post-list-container').append(`
                <div class="mb-8 post-list-item" data-post-id="${preference.post_id}">
                    <div class="lg:w-[60vw] grid grid-cols-12">
                        <div class="col-span-2 md:col-span-2 border">
                            <div class="h-full p-2 text-center">
                                ${preference.preferences} <!-- Displaying the preference -->
                            </div>
                        </div>
                        <div class="col-span-10 md:col-span-7 border">
                            <div class="h-full p-2">
                                ${postText}
                            </div>
                        </div>
                        <div class="col-span-12 md:col-span-3 border">
                            <div class="h-full p-2 text-center">
                                <button type="button" class="p-1 px-2 rounded bg-gray-200 hover:bg-gray-600 hover:text-white updatePref">
                                    <i class="bi bi-chevron-up"></i>
                                </button>
                                <button type="button" class="p-1 px-2 rounded bg-gray-200 hover:bg-gray-600 hover:text-white updatePref">
                                    <i class="bi bi-chevron-down"></i>
                                </button>
                                <button type="button" class="p-1 px-2 rounded bg-gray-200 hover:bg-gray-400 text-red-500 updatePref">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `);
            });
        }

        // Handle showing/hiding buttons based on if there are existing posts
        function togglePostButtons(sectionId) {
            var section = $(`#${sectionId}`);
            var addPostBtn = section.find('.add-post-btn');
            var postAddedBtn = section.find('.post-added-btn');

            // If the section has posts, hide "Add Post" button and show "Post Added" button
            if (section.find('.post-list-item').length > 0) {
                addPostBtn.hide(); // Hide the "Add Post" button
                postAddedBtn.show(); // Show the "Post Added" button
            } else {
                addPostBtn.show(); // Show the "Add Post" button
                postAddedBtn.hide(); // Hide the "Post Added" button
            }
        }
    });
</script>

<script>
    $(document).on('click', '.updatePref', function(e) {
        e.preventDefault();

        var elm = $(this);
        $('.pageloader').fadeIn();
        var prefId = $(this).attr('prefId');
        var type = $(this).attr('typeId');
        var actionUrl = "/update-preference/" + prefId + "/" + type;
        elm.attr('disabled', true);

        $.ajax({
            type: 'GET',
            url: actionUrl,
            success: function(data) {
                $('.pageloader').fadeOut();
                // Show a success message using SweetAlert
                swal.fire({
                    title: 'Success!',
                    text: 'Your preference has been updated.',
                    icon: 'success',
                    confirmButtonClass: 'btn btn-success',
                    confirmButtonColor: '#2DB325'
                }).then(function() {
                    window.location.reload(); // Reload the page after user confirms
                });
            },
            error: function(data) {
                $(".pageloader").fadeOut();
                elm.attr('disabled', false);
                var msg = ajaxErrorMsg(data); // Assuming this function generates an error message

                // Show an error message using SweetAlert
                swal.fire({
                    title: 'Sorry!',
                    html: msg,
                    icon: 'error',
                    confirmButtonClass: 'btn btn-danger',
                    confirmButtonColor: '##B32525'
                });
            },
        });
    });
</script>
