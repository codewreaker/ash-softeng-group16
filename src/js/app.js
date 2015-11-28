    var prophet_toast;
    var reveal_username;

    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    //A function that makes the full username display on hover of the user icon
    reveal_username = function(){
         $('.sidebar-brand').on('mouseenter',function(){
        $("#sidebar-wrapper").addClass("marquee");
        $(".curr_user").removeClass("wrap-text");
    });

    $('.sidebar-brand').on('mouseleave',function(){
        $("#sidebar-wrapper").removeClass("marquee");
        $(".curr_user").addClass("wrap-text");
    });
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

$(function () {
    reveal_username();
});
