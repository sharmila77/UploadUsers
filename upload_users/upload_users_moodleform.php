<?php

global $CFG;
defined('MOODLE_INTERNAL') || die();
require_once($CFG->dirroot . '/lib/formslib.php');

class upload_users_moodleform extends moodleform {
    public function definition() {
        global $OUTPUT, $CFG;
        $mform = & $this->_form;
        $mform->addElement('filepicker', 'userfile', get_string('upload_users_file', 'local_upload_users'));
        $mform->addRule('userfile', get_string('required'), 'required');
        $mform->setType('userfile', PARAM_FILE);
        $this->add_action_buttons(false, get_string('pluginname', 'local_upload_users'));
    }

    public function validation($data, $files) {
        $errors = parent::validation($data, $files);
        return $errors;
    }
}
