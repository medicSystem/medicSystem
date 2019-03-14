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
    $('#country_type').on('change', function (e) {
        if ($('#country_type').val() == 'belarus') {
            $('#phone_number').attr('disabled', false).attr('pattern', "^(\\+375|80)(29|25|44|33)(\\d{3})(\\d{2})(\\d{2})$").val('+375').attr('maxlength', 13)
        } else {
            if ($('#country_type').val() == 'russia') {
                $('#phone_number').attr('disabled', false).val('+7').attr('pattern', "^((8|\\+7)[\\- ]?)?(\\(?\\d{3}\\)?[\\- ]?)?[\\d\\- ]{7,10}$").attr('maxlength', 12)
            }
        }
    })
    $('.drop-btn').on('click', function () {
        var display = $('.dropdown-menu').css("display")
        if (display == 'none') {
            $('.dropdown-menu').css({"display": "block"})
        } else {
            $('.dropdown-menu').css({"display": "none"})
        }
    })
    $('.drop-btn').on('blur', function () {
        $('.dropdown-menu').hover(function () {
            $('.dropdown-menu').css({"display": "block"})
        })
        $('.dropdown-menu').focusin(function () {
            $('.dropdown-menu').css({"display": "block"})
        })
        $('.dropdown-menu').focusout(function () {
            $('.dropdown-menu').css({"display": "none"})
        })
    })
    $(window).on('load resize', function() {
        var width = $(window).width();
        if (width >= 525){
            $('#footer-title').addClass("fl-right").css({"padding-right": "1.6%;"})
            $('#footer-email').addClass("fl-right").css({"padding-right": "1.6%;"})
            $('#footer-num').addClass("fl-right")
        }else{
            $('#footer-title').removeClass("fl-right")
            $('#footer-email').removeClass("fl-right")
            $('#footer-num').removeClass("fl-right")
        }
    })
});
