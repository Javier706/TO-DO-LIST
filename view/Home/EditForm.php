<?php
require_once("controller/TasksController.php");

$task = new TasksController();
$task->actualizar();
header('location: ./index.php');