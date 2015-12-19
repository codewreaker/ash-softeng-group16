function deleteTask(){
var id = encodeURI(document.getElementById("idfield").value);
var url = "http://cs.ashesi.edu.gh/~csashesi/class2016/makafui-amezah/Software%20Engineering/user_controller.php?cmd=1&id="+id;
               var obj = sendRequest ( url );
               Materialize.toast('Deleted', 3000, 'rounded');
        }	





