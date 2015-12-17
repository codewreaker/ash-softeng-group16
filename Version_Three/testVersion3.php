<?php
    /**
    *@author Israel Oladejo
    *@Copyright December 2015
    *@Test #1
    **/
    
header('My test file');
include("se_task.php");
    /**
    *This class is used for the test case for Task (se_task) class
    **/
class TestTask extends PHPUnit_Framework_TestCase
  
    /**
     *This function is responsible for testing the add_task function in the class
     *@param no parameter
     *@return boolean
     **/
    public function testAddTask()
    {
	    $task=new se_task();
        task_id="1";
        task_name="Count Injection Stock";
        start_time="11/06/2015 15:00";
        end_time="12/07/2015 17:30";
        user_id="73812017";
        setter_id="61192016";
        status="Completed";
        report="Pending";
        
	    $this->assertEquals(true, $task->addTask($task_id, $task_name, $start_time, $end_time, $user_id, $setter_id, $status, $report));
    }
      /**
     * Used to test the get_task function in the Task (se_task) class
     * @param no parameter
     * @return boolean
     */
    public function testGetTask()
    {
	 $task=new Task();
	 $this->assertNotEquals(false, $task->get_task());
    }
	
   
} 
?>