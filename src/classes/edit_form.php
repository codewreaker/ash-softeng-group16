<?php
/**
* @author Frances Wireko
* @copyright 2015-11-25
*/

/**
* This class contain a form for editing tasks
**/
?>


<html>
<head>
	<style></style>
	<title>Index</title>
	<link rel="stylesheet" href="css/style.css">
	<script></script>
</head>
<body >

<form action="edit_task.php" method="GET" >
    
		<div>Task Id:   <input type="text" size="14" name="ti"></div>
        <div>Task Name:   <input type="text" size="14" name="tn"></div>
        <div>Start Time:   <input type="text" size="14" name="st"></div>
        <div>End Time:   <input type="text" size="14" name="et"></div>
        <div>User Id:   <input type="text" size="14" name="ui"></div>
        <div>Setter Id:   <input type="text" size="14" name="si"></div>
        <div>Status:   <input type="text" size="14" name="sp"></div>
        <div>Report: <input type="text" size="14" name="tr"></div>
    
    <button id="save" value="save"  type="submit"></button>
</form>

<?php
    
?>
</table>
</body>
</html>
