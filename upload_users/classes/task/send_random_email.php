<?php
namespace local_upload_users\task;

defined('MOODLE_INTERNAL') || die();

class send_random_email extends \core\task\scheduled_task {
    /**
     * Get a descriptive name for this task (shown to admins).
     *
     * @return string
     */
    public function get_name() {
        return get_string('send_random_email_task', 'local_upload_users');
    }

    /**
     * Do the job.
     * Throw exceptions on errors (the job will be retried).
     */
    public function execute() {
        \local_upload_users\controller::email_cron();
    }
}