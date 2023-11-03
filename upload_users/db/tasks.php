<?php

defined('MOODLE_INTERNAL') || die();

$tasks = array(
    //Task to send random email to users via scheduled tasks
    array(
        'classname' => 'local_upload_users\task\send_random_email',
        'blocking' => 0,
        'minute' => '*',
        'hour' => '*',
        'day' => '*',
        'dayofweek' => '*',
        'month' => '*'
    )
);
