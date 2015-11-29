// a function to switch pages
var switch_pages;
//a function to send a request to a php server file
var sendRequest;
// a function that creates a new profile for a user
var sign_up;
// a function that sends an ajax request to log a user in
var login;
// A function to logout
var logout;
// A custom toast I made myself prophet just being cool :-*
var prophet_toast;
// A bar that appears at the top of the main page to display a message
var alertBars;



sign_up = function () {
    $('#signup_user').click(function () {
        $a = $('#signup_email').val();
        $b = $('#signup_pword').val();
        $c = $('#signup_fullname').val();
        $d = $('#signup_role option:selected').text();
        $e = $('#signup_contact').val();
        $f = $('#signup_role option:selected').val();
        $str = 'opt=1&signup_email=' + $a + '&signup_pword=' + $b + '&signup_fullname=' + $c + '&signup_role=' + $d + '&signup_contact=' + $e + '&is_admin=' + $f;

        $obj = sendRequest($str);
        if ($obj.result == 1) {
            prophet_toast(2, $obj.message);
            setTimeout(function () {
                window.location.replace("main.html");
            }, 3000);
        } else {
            prophet_toast(1, $obj.message);
        }

    });
}

login = function () {
    $('#login').click(function () {
        $a = $('#login_email').val();
        $b = $('#login_pword').val();
        $str = 'opt=2&login_email='+$a+'&login_pword='+$b;
        $obj = sendRequest($str);
        if ($obj.result == 1) {
            prophet_toast(2, $obj.message);
            setTimeout(function () {
                window.location.replace("main.html");
            }, 3000);
        } else {
            prophet_toast(1, $obj.message);
        }
    });
}

logout = function () {
    $('#logout_btn').click(function () {
          alertBars("succesfully logged out");
        setTimeout(function () {
                window.location.replace("login.html");
            }, 3000);
//        $str = 'opt=3';
//        $obj = sendRequest($str);
//        alert($object.result);
//        if ($obj.result == 1) {
//            setTimeout(function () {
//                window.location.replace("login.html");
//            }, 3000);
//        } else {}
    });
}


//This function will be used to send an Ajax call to a database
sendRequest = function (dataString) {
    var obj = $.ajax({
        type: "POST",
        url: "src/classes/login_class.php",
        //url: "http://cs.ashesi.edu.gh/~csashesi/class2016/prophet-agyeman-prempeh/mobile_web_server/login.php", //for web
        data: dataString,
        async: false,
        cache: false
    });
    var result = $.parseJSON(obj.responseText);
    return result;
}


switch_pages = function () {
    $('#signup_page').hide();
    $('#signup').click(function () {
        $('#signup_page').show();
        $('#login_page').hide();
    });
    $('#signup_cancel').click(function () {

        $('#login_page').show();
        $('#signup_page').hide();
    });
}

prophet_toast = function (type, message) {
    if (type == 1) {
        $('.toast').addClass("red").fadeIn(400).delay(3000).fadeOut(400);
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

// code
$(function () {
    switch_pages();
    sign_up();
    login();
    logout();

});
