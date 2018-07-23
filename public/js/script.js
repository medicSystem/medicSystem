$(document).ready(function () {

    $('#modal_close, #overlay').on('click', function (e) {
        $('#agree').attr('disabled', false)
    })
    $(window).scroll(
        function () {
            var top = $(this).scrollTop();
            if (top >= 100) {
                $('#header').removeClass("header");
                $('#header').addClass("header-scroll");
                $('#footer').removeClass("footer")
                $('#footer').addClass("footer-scroll")
                $('#title').removeClass("title")
                $('#title').addClass("title-scroll")
                $('#footer-title').removeClass("footer-title")
                $('#footer-title').addClass("footer-title-scroll")

            } else if (top <= 200) {
                $('#header').removeClass("header-scroll");
                $('#header').addClass("header");
                $('#footer').removeClass("footer-scroll")
                $('#footer').addClass("footer")
                $('#title').removeClass("title-scroll")
                $('#title').addClass("title")
                $('#footer-title').removeClass("footer-title-scroll")
                $('#footer-title').addClass("footer-title")
            }
        }
    )
    $('#go').click(function (event) {
        event.preventDefault();

        $('#overlay').fadeIn(400,
            function () {
                $('#modal_form')
                    .css('display', 'block')
                    .animate({opacity: 1, top: '50%'}, 200);
            });
    });

    $('#modal_close, #overlay').click(function () {
        $('#modal_form')
            .animate({opacity: 0, top: '45%'}, 200,
                function () {
                    $(this).css('display', 'none');
                    $('#overlay').fadeOut(400);
                }
            );
    });
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
