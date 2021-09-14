<?php

function checkCompletedTask($task_id, $db){
    $queryGetTask = $db->prepare("select * from tasks where task_id=".$task_id);
    $queryGetTask->execute();
    $fetched_task = $queryGetTask->fetch(PDO::FETCH_ASSOC);
    $completed_time = $fetched_task["completed"];
    
    if($completed_time == NULL){
        echo "NO TIME";
        return false;
    }
    else{
        echo "TIME";
        return true;
    }
}
