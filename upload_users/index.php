<?php

require_once('../../config.php');
global $DB, $CFG, $PAGE, $OUTPUT;

$PAGE->set_context(context_system::instance());
$PAGE->set_url('/local/upload_users/index.php');

$users = $DB->get_records('upload_users');

// Prepare an array of users for Mustache
$usersData = [];
foreach ($users as $user) {
    $userEntry = new stdClass();
    $userEntry->firstname = $user->firstname;
    $userEntry->lastname = $user->lastname;
    $userEntry->email = $user->email;
    $userEntry->timecreated = ($user->sent_on == 1) ? date("Y-m-d H:i:s", $user->time_created) : 'Email not yet sent';
    $usersData[] = $userEntry;
}

$content = new stdClass();
$content->users = $usersData; // Pass the users array to the Mustache template

// Output the content
echo $OUTPUT->header();
echo $OUTPUT->render_from_template('local_upload_users/user_lists', $content);
echo $OUTPUT->footer();
