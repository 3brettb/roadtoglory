#! /usr/bin/php
<?php

    use \App\ResourceModels\System\Cron;

    $up = new Cron();
    $up->script = "test_cron.php";
    $up->info = "Cron Alive";
    $up->save();
    
?>