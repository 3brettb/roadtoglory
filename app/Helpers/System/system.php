<?php

    use \App\ResourceModels\System\Update;

    function system_update($work, $script, $output=null, $status="success"){
        $update = new Update();
        $update->work = json_encode($work);
        $update->script = $script;
        $update->status = $status;
        $update->output = json_encode($output);
        $update->save();
    }

    function add_system_work($task, $completed, $error=null){
        $new = new \stdClass();
        $new->task = $task;
        $new->completed = $completed;
        $new->error = $error;
        return $new;
    }