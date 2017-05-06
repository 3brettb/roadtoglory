<?php

    include_once(app_path().'\Helpers\System\system.php');

    use \Carbon\Carbon;
    use \App\ResourceModels\System\Task;
    use \App\ResourceModels\System\Update;

    $tasks = Task::all();
    $now = Carbon::now();

    $tasks_completed = 0;
    $task_total = 0;
    $has_error = false;
    $work = array();

    foreach($tasks as $task){
        $task_next = new Carbon($task->next, 'America/New_York');
        $completed = false;
        $error = null;
        if($task_next < $now){
            $task_total++;
            try{
                $task_data = json_decode($task->data);
                include_once($task->name);
                set_next($task, $task_next, substr($task->period, 0, 1), substr($task->period, 1));
            } catch(Exception $e) {
                $has_error = true;
                $error = new \stdClass();
                $error->message = $e->getMessage();
                $error->file = $e->getFile();
                $error->line = $e->getLine();
            }
            
            array_push($work, add_system_work($task, $completed, $error));
        }
        $tasks_completed += ($completed) ? 1 : 0;
    }

    function set_next($task, $carbon, $type, $value){
        // Minute, Hour, Day, Week, Month, Year
        switch($type){
            case "M":
                $task->next = $carbon->addMinutes($value)->format('Y-m-d h:i:s');
                break;
            case "H":
                $task->next = $carbon->addHours($value)->format('Y-m-d h:i:s');
                break;
            case "D":
                $task->next = $carbon->addDays($value)->format('Y-m-d h:i:s');
                break;
            case "W":
                $task->next = $carbon->addWeeks($value)->format('Y-m-d h:i:s');
                break;
            case "X":
                $task->next = $carbon->addMonths($value)->format('Y-m-d h:i:s');
                break;
            case "Y":
                $task->next = $carbon->addYears($value)->format('Y-m-d h:i:s');
                break;
            case "0":
            default:
                break;
        }
        $task->save();
    }

    if($has_error){
        system_update($work, '\system\\'.basename(__FILE__), "Tasks Completed: $tasks_completed of $task_total", "error");
    }
    else if ($task_total > 0){
        system_update($work, '\system\\'.basename(__FILE__), "Tasks Completed: $tasks_completed of $task_total");
    }

    dd(Update::orderBy('date', 'DESC')->get());
?>