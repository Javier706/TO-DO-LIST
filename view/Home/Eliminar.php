<?php
if(isset($_GET['id'])){
    include("controller/TasksController.php");
   $task = new TasksController();
   $task->delete($_GET['id']);
    header("location: ./index.php");
}else{
    http_response_code(403);
}

?>