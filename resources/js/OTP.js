
$(function () {

    // this will be called when the DOM is ready

    $('#otp1').on('keyup', function () {
        if (event.keyCode == 46 || event.keyCode == 8) {
            $('#otp1').focus();
        } else {
            $('#otp2').focus();
        }
    });
    $('#otp2').on('keyup', function () {
        if (event.keyCode == 46 || event.keyCode == 8) {
            $('#otp1').focus();
        } else {
            $('#otp3').focus();
        }
    });
    $('#otp3').on('keyup', function () {
        if (event.keyCode == 46 || event.keyCode == 8) {
            $('#otp2').focus();
        } else {
            $('#otp4').focus();
        }
    });
    $('#otp4').on('keyup', function () {
        if (event.keyCode == 46 || event.keyCode == 8) {
            $('#otp3').focus();
        }
    });




});
