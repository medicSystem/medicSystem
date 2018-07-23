import $ from "jquery";

$(document).ready(function () {
    $('#modal_close, #overlay').on('click', function (e) {
        $('#agree').attr('disabled', false)
    })
});
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