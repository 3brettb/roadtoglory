<?php

    use \App\ResourceModels\System\Cron;

    $up = new Cron();
    $up->script = "test_cron.php";
    $up->info = "test ran";
    $up->save();

?>