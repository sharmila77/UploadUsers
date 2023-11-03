<?php
defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {
    $settings = new admin_settingpage('local_upload_users', get_string('pluginname', 'local_upload_users'));
    $ADMIN->add('localplugins', $settings);

    // Setting to enable and disable checkbox to send random email
    $settings->add(new admin_setting_configcheckbox('local_upload_users/send_random_email',
        \get_string('send_random_email', 'local_upload_users'),
        \get_string('send_random_email_desc', 'local_upload_users'),
        '0'));
}

