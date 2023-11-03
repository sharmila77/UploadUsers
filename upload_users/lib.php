<?php

function create_upload_users_job($cir) {
    global $DB;
    $cir->init();

    while ($fields = $cir->next()) {
        $user = new StdClass();

        if (empty($fields)) {
            continue;
        }

        $user->firstname = str_replace('"', '', trim($fields[0]));
        $user->lastname = str_replace('"', '', trim($fields[1]));
        $user->email = str_replace('"', '', trim($fields[2]));
        $user->sent_on = 0;
        $user->time_created = time();

        // Insert users into the database
        $DB->insert_record('upload_users', $user);
    }
    return true;
}
