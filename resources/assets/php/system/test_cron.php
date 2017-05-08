#! /usr/bin/php
<?php

    include_once(app_path().'\Helpers\System\system.php');

    add_cron("/test_cron.php", "Cron Alive");
    
?>