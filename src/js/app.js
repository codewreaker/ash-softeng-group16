    // a function that switches a username to slide and back to static
    var revealUsername;
    // a function to enable elements that need to appear when either hovered over or clicked
    var enablePopElements;
    // a function that enables a bar at the top of the page
    var alertBars;
    // a function that sends request to a php page
    var sendRequest;
    // a function to add a task
    var addTask;
    // a function to display a table for the data
    var displayTable;

    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    // a function that switches a username to slide and back to static
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

    // a function to enable elements that need to appear when either hovered over or clicked
    enablePopElements = function () {
        $(".alert-area").hide();
        $('[data-toggle="popover"]').popover();
        $('[data-toggle="tooltip"]').tooltip();
        $('#logout_btn').tooltip('show');
    }

    // a function that enables a bar at the top of the page
    alertBars = function ($msg) {
        $(".alert-area").show();
        $(".alert-area-text").html($msg);
    }

    // a function that sends request to a php page
    sendRequest = function (dataString) {
        var obj = $.ajax({
            type: "POST",
            url: "src/classes/operations.php",
            //url: "http://cs.ashesi.edu.gh/~csashesi/class2016/prophet-agyeman-prempeh/mobile_web_server/login.php", //for web
            data: dataString,
            async: false,
            cache: false
        });
        var result = $.parseJSON(obj.responseText);
        return result;
    }


    // a function to add a task
    addTask = function(){

    }



    /*
     *This part of the code creates a table with the JSON data
     *and appends it to the HTML body
     */
    displayTable = function () {
        var dataString = 'opt=7';
        $obj = sendRequest(dataString);
        if ($obj.result == 1) {
            var data = $obj.tasks;
            var count = 0;
            var $color;
            var prev;
            var mid = "";
            var end;
            $("#completed_tasks").html(data.length);
            num_of_reports = 0;
            $("#number_of_reports").html();

            prev = '<table class="table table-striped table-hover table-bodered"><thead><th>status</th><th>Task</th><th>Due Time</th>'+
                   '<th>Options</th></thead><tbody>';
            for (var i = 0; i < data.length; i++) {
                if (count % 2 == 0) {
                    $color = " ";
                } else {
                    $color = "odd";
                }
                mid = mid + '<tr class="' + $color + '" id="' + data[i].task_id + '">' +
                    '<td>' + check_status(data[i].status) + '</td>' +
                    '<td>' + data[i].task_name + '</td>' +
                    '<td>' + data[i].end_time + '</td>' +
                    '<td class="table-control"><a class="fa fa-edit red-text"></a>|<a class="fa fa-trash orange-text"></a></td>'
                    '</tr>';
                count++;
            }
            end = '</tbody></table>';
            var table = prev + mid + end;
            $(".task-section").html(table);
        } else {
            alertMessage("Could not fetch JSON", 3, 1);
        }
    }

    /* This function checks the state of the task and returns a corresponding check */
    function check_status(id) {
//        var state = '<i class="fa fa-check">';
//        var dataString = 'opt=8&report_id=' + id;
//        var $obj = sendRequest(dataString);
//        var data = $obj.report;
        if (id == 1) {
            num_of_reports++;
            $("#number_of_completed").html(num_of_reports);
            $("#number_of_reports").html(num_of_reports);
            state = '<i class="fa fa-check green-text">';
        } else {
            state = '<i class="fa fa-times red">'
        }
        return state;
    }

    $(function () {
        revealUsername();
        enablePopElements();
        displayTable();
    });
