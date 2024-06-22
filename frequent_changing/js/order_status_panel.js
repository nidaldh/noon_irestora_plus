$(function () {
    "use strict";

    /**
     * Full Screen
     */
    function toggleFullscreen(elem) {
        elem = elem || document.documentElement;
        if (
            !document.fullscreenElement &&
            !document.mozFullScreenElement &&
            !document.webkitFullscreenElement &&
            !document.msFullscreenElement
        ) {
            if (elem.requestFullscreen) {
                elem.requestFullscreen();
            } else if (elem.msRequestFullscreen) {
                elem.msRequestFullscreen();
            } else if (elem.mozRequestFullScreen) {
                elem.mozRequestFullScreen();
            } else if (elem.webkitRequestFullscreen) {
                elem.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
            }
        } else {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            }
        }
    }

    $(document).on("click", "#fullscreen", function (e) {
        toggleFullscreen();
    });

    function get_cart_data() {
        let base_url = $("#base_url").val();
        $.ajax({
            url: base_url + "order-status-screen-data",
            method: "POST",
            dataType:'json',
            success: function (response) {
                $(".ready_div").html(response.ready_div);
                $(".preparing_div").html(response.preparing_div);
            }
        });
    }

    setInterval(function(){
        get_cart_data();
    }, 5000);
    get_cart_data();
});


