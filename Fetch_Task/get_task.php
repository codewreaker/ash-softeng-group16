


    function get_task(){
        $str_query = "SELECT `task_id`, `task_name`, `description`,`task_personnel`, `due_date`, `report_id` FROM `t_task` ";
        if(!$this->query($str_query)){
            return false;
        }else{
            return true;
        }
    }