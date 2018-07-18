$(document).ready(function () {
    $('#modal_close, #overlay').on('click', function (e) {
        $('#agree').attr('disabled', false)
    })
});