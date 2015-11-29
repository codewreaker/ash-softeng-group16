    var prophet_toast;
    var revealUsername;
    var enablePopElements;
    var alertBars;

    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    //A function that makes the full username display on hover of the user icon
    revealUsername = function () {
        $('.sidebar-brand').on('mouseenter', function () {
            $("#sidebar-wrapper").addClass("marquee");
            $(".curr_user").removeClass("wrap-text");
        });

        $('.sidebar-brand').on('mouseleave', function () {
            $("#sidebar-wrapper").removeClass("marquee");
            $(".curr_user").addClass("wrap-text");
        });
    }

    enablePopElements= function () {
        $(".alert-area").hide();
        $('[data-toggle="popover"]').popover();
        $('[data-toggle="tooltip"]').tooltip();
        $('#logout_btn').tooltip('show');
    }

    prophet_toast = function (id, type, message) {
        if (type == 1) {
            $('#' + id + ' .toast').addClass("red").fadeIn(400).delay(3000).fadeOut(400);
            $('.toast').html(message);
        } else if (type == 2) {
            $('.toast').addClass("green").fadeIn(400).delay(3000).fadeOut(400);
            $('.toast').html(message);
        }
    }

    alertBars = function($msg){
          $(".alert-area").show();
          $(".alert-area-text").html($msg);
    }

    $(function () {
        revealUsername();
        enablePopElements();
    });
