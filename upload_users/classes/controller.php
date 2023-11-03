<?php

namespace local_upload_users;

use stdClass;

class controller {
    public static function email_cron() {
        global $DB;
        $sql = "SELECT * FROM {upload_users} WHERE sent_on = ?";
        $classes = $DB->get_records_sql($sql, [0]);
        foreach ($classes as $class) {
            if($class) {
                \mtrace('Sending Random Email for EmailId: ' . $class->email);
                $user = new stdClass();
                $user->id = $class->id;
                $user->email = $class->email;
                $user->suspended = 0;
                $user->deleted = 0;
                $message = 'Hello, ' . $class->firstname . '\n' . 'You have received sample Random message. Enjoy!!';
                email_to_user($user,\core_user::get_noreply_user(), get_string('random_email', 'local_upload_users'),
                                $message);
                $class->sent_on = 1;
                $class->timecreated = time();
                $DB->update_record('upload_users', $class);
            }
        }
    }
}