$(function () {
    var prophet_toast;

    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    $("#hth").click(function () {
        prophet_toast("three", 1, "success");
    });


    prophet_toast = function (id, type, message) {
        if (type == 1) {
            $('#' + id + ' .toast').addClass("red").fadeIn(400).delay(3000).fadeOut(400);
            $('.toast').html(message);
        } else if (type == 2) {
            $('.toast').addClass("green").fadeIn(400).delay(3000).fadeOut(400);
            $('.toast').html(message);
        }
    }
});