function loginUser() {
    var username = $('#username').val();
    var password = $('#password').val();
    if (username.length === 0) {
        document.getElementById("error_area").innerHTML = '<div class="chip red white-text">Enter Username! <i class="fa fa-times-circle"></i></div>';
        return;
    }
    if (password.length === 0) {
        document.getElementById("error_area").innerHTML = '<div class="chip red white-text">Enter Password <i class="fa fa-times-circle"></i></div>';
        return;
    }
    var u = "controllers/controller.php?cmd=1&username="+username+"&password="+password;
    $.ajax({url: u}).done(function (data) {
        var response = $.parseJSON(data);
        var txt;
        if (response.result === 0) {
            txt = "<div class='chip red white-text'>"+response.message+" <i class='fa fa-times-circle'></i></div>";
        } else if (response.result === 1) {
            window.location.assign('index.php');
        }
        $("#error_area").html(txt);
    });
}
$(function () {
   $('#loginForm').submit(function (e) {
       e.preventDefault();
       loginUser();
   }); 
});