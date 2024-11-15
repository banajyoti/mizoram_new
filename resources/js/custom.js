$(document).ready(function () {


    // forgot-password-JS starts ***********

    // Toggle visibility for Send OTP and Verify sections
    $('#send_OTP').click(() => $('.phone').toggleClass('hidden') && $('.verify_phone').toggleClass('hidden'));
    $('#back_to_phone').click(() => $('.verify_phone').toggleClass('hidden') && $('.phone').toggleClass('hidden'));

    // Handle 'Verify' button actions
    $('#verified').click(function () {
        $('.phone').removeClass('hidden').find('i.bi-check-circle-fill').addClass('text-green-500');
        $('.verify_phone, #send_OTP').addClass('hidden');
        $('#p_number').prop('disabled', true).removeClass('bg-gray-50').addClass('bg-gray-100');
        $('#change_p_number').removeClass('hidden');
    });

    // Enable phone number editing
    $('#change_p_number').click(function () {
        $('#p_number').prop('disabled', false).removeClass('bg-gray-100').addClass('bg-gray-50');
        $('#change_p_number').addClass('hidden');
        $('#send_OTP').removeClass('hidden');
        $('.phone i.bi-check-circle-fill').removeClass('text-green-500');
    });




});


