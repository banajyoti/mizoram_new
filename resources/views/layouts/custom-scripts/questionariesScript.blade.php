<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script>
    $(document).ready(function() {
        var formData = {};

        function submitRadioData(sectionName) {
            var selectedValue = $('input[name="' + sectionName + '"]:checked').val() ||
                '';

            console.log('Selected Value for ' + sectionName + ':', selectedValue);
            formData[sectionName] = selectedValue;

            var displayText = selectedValue === '1' ? 'Yes, I have.' : 'No, I haven\'t.';

            if (sectionName === 'min_score_mizo') {
                $('#min_score_display').text('Answer: ' + displayText);
            } else if (sectionName === 'class_x_mizo') {
                $('#class_x_display').text('Answer: ' + displayText);
            } else if (sectionName === 'mizo_as_mil') {
                $('#mizo_as_mil_display').text('Answer: ' + displayText);
            } else if (sectionName === 'comp_cert') {
                $('#comp_cert_display').text('Answer: ' + displayText);
            } else if (sectionName === 'ncc_cert') {
                $('#ncc_cert_display').text('Answer: ' + displayText);
            } else if (sectionName === 'home_guard') {
                $('#home_guard_display').text('Answer: ' + displayText);
            } else if (sectionName === 'iti_eqi') {
                $('#iti_eqi_display').text('Answer: ' + displayText);
            } else if (sectionName === 'auto_mobile') {
                $('#auto_mobile_display').text('Answer: ' + displayText);
            }

            toggleSaveButton();

            function toggleSaveButton() {
                const minScoreMizo = $('input[name="min_score_mizo"]:checked').val();
                const classXMizo = $('input[name="class_x_mizo"]:checked').val();
                const mizoAsMil = $('input[name="mizo_as_mil"]:checked').val();
                const compCert = $('input[name="comp_cert"]:checked').val();
                const mStatus = $('input[name="m_status"]:checked').val();
                const mQuestion = $('input[name="m_question"]:checked').val();

                if ((minScoreMizo === '1' || classXMizo === '1' || mizoAsMil === '1') && compCert === '1' &&
                    mStatus === '0' || mQuestion === '0') {
                    $('#save_button').show();
                } else {
                    $('#save_button').hide();
                }

                if (classXMizo === '0') {
                    $('#x2').removeClass('hidden');
                } else {
                    $('#x2').addClass('hidden');
                }

                if (mizoAsMil === '0') {
                    $('#x3').removeClass('hidden');
                } else {
                    $('#x3').addClass('hidden');
                }
            }

            if (formData['ncc_cert'] === '1') {
                $('.choose_ncc_div').removeClass('hidden');
            } else {
                $('.choose_ncc_div').addClass('hidden');
            }

            if (formData['m_status'] === '1') {
                console.log('Showing element');
                $('.choose_m_status').removeClass('hidden');
            } else {
                console.log('Hiding element');
                $('.choose_m_status').addClass('hidden');
            }

            if (formData['auto_mobile'] === '1') {
                $('.mechExperience').removeClass('hidden');
            } else {
                $('.mechExperience').addClass('hidden');
            }
        }

        function submitAllData() {
            var form = document.getElementById('myForm');
            var formData = new FormData($('#myForm')[0]);

            var userId = $('input[name="user_id"]').val();
            var nccGrade = $('input[name="ncc_grade"]:checked').val();
            console.log('FormData:', formData);
            $.ajax({
                url: '{{ route('questionaries') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == 400) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'All fields are mendatory.',
                            confirmButtonText: 'OK',
                            confirmButtonClass: 'btn btn-danger',
                            confirmButtonColor: '##B32525'
                        });
                    } else {
                        // Handle success response
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message,
                            confirmButtonText: 'OK',
                            confirmButtonClass: 'btn btn-success',
                            confirmButtonColor: '#2DB325'
                        }).then(() => {
                            // Redirect after successful submission
                            window.location.href = '{{ route('preference') }}';
                        });
                    }
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'An error occurred. Please try again.',
                        confirmButtonText: 'OK',
                        confirmButtonClass: 'btn btn-danger',
                        confirmButtonColor: '##B32525'
                    });
                }
            });
        }

        // Attach event listeners for each section to detect change
        $('input[name="min_score_mizo"]').change(function() {
            submitRadioData('min_score_mizo');
        });

        $('input[name="class_x_mizo"]').change(function() {
            submitRadioData('class_x_mizo');
        });

        $('input[name="mizo_as_mil"]').change(function() {
            submitRadioData('mizo_as_mil');
        });

        $('input[name="comp_cert"]').change(function() {
            submitRadioData('comp_cert');
        });

        $('input[name="ncc_cert"]').change(function() {
            submitRadioData('ncc_cert');
        });

        $('input[name="home_guard"]').change(function() {
            submitRadioData('home_guard');
        });

        $('input[name="iti_eqi"]').change(function() {
            submitRadioData('iti_eqi');
        });

        $('input[name="auto_mobile"]').change(function() {
            submitRadioData('auto_mobile');
        });

        $('input[name="ncc_grade"]').change(function() {
            submitRadioData('ncc_grade');
        });

        $('input[name="m_status"]').change(function() {
            submitRadioData('m_status');
        });

        $('input[name="m_question"]').change(function() {
            submitRadioData('m_question');
        });

        $('input[name="mech_experience"]').change(function() {
            submitRadioData('mech_experience');
        });

        $('#save_button').click(function() {
            submitAllData();
        });

        if ($('input[name="ncc_cert"]:checked').val() === '1') {
            $('.choose_ncc_div').removeClass('hidden');
        } else {
            $('.choose_ncc_div').addClass('hidden');
        }

        $('.revert_ncc_choise').click(function() {
            $('.choose_ncc_div').addClass('hidden');
            $('input[name="ncc_cert"]').prop('checked', false);
            formData['ncc_cert'] = '';

            toggleSaveButton();
        });

        if ($('input[name="m_status"]:checked').val() === '1') {
            $('.choose_m_status').removeClass('hidden');
        } else {
            $('.choose_m_status').addClass('hidden');
        }

        if ($('input[name="m_status"]:checked').val() === '1') {
            $('.choose_m_status').removeClass('hidden');
        } else {
            $('.choose_m_status').addClass('hidden');
        }

        if ($('input[name="auto_mobile"]:checked').val() === '1') {
            $('.mechExperience').removeClass('hidden');
        } else {
            $('.mechExperience').addClass('hidden');
        }
    });
</script>
<script>
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
