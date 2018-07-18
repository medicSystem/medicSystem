$(document).ready(function () {
    $('#country_type').on('click', function (e) {
        if ($('#country_type').val() == 'belarus') {
            $('#phone_number').attr('disabled', false).attr('pattern', "^(\\+375|80)(29|25|44|33)(\\d{3})(\\d{2})(\\d{2})$").val('+375')
        } else {
            if ($('#country_type').val() == 'russia') {
                $('#phone_number').attr('disabled', false).val('+7').attr('pattern', "^((8|\\+7)[\\- ]?)?(\\(?\\d{3}\\)?[\\- ]?)?[\\d\\- ]{7,10}$").attr('maxlength', 12)
            }
        }
    })
});