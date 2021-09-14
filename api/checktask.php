<?php
//I do this so I can use functions from functions.php
require "../functions.php";

//make connection to Database for data :D
try {
    $db = new PDO("mysql:host=localhost;dbname=smarttodo;", "root", "mysqlww");
} catch (PDOException $exception) {
    //echo any error with database
    echo $exception->getmessage();
}

$task_id = htmlspecialchars($_GET["id"]);

//check if the task is completed
if (checkCompletedTask($task_id, $db)) {
    //prepare query
    $query = $db->prepare("UPDATE `tasks` SET `completed` = NULL WHERE `task_id` = '" . $task_id . "';");

    //execute update query
    $query->execute();
} else {
    //prepare query
    $query = $db->prepare("UPDATE `tasks` SET `completed` = NOW() WHERE `task_id` = '" . $task_id . "';");

    //execute update query
    $query->execute();
}
