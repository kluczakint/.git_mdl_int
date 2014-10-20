<?php


defined('MOODLE_INTERNAL') || die;

require_once($CFG->dirroot.'/course/moodleform_mod.php');
require_once($CFG->dirroot.'/mod/page/lib.php');

class mod_enrolself_mod_form extends moodleform_mod {
    function definition() {
        global $CFG, $DB, $COURSE;

        $mform = $this->_form;

        //$config = get_config('enrolself');

        //-------------------------------------------------------
        $mform->addElement('header', 'general', get_string('general', 'form'));	
		$mform->addElement('text', 'name', get_string('name'), array('size'=>'48'));
        if (!empty($CFG->formatstringstriptags)) {
            $mform->setType('name', PARAM_TEXT);
        } else {
            $mform->setType('name', PARAM_CLEANHTML);
        }
        $mform->addRule('name', null, 'required', null, 'client');
        $mform->addRule('name', get_string('maximumchars', '', 255), 'maxlength', 255, 'client');
        $this->add_intro_editor(true);

		$courses = $DB->get_records('course');
		$options = array();
		foreach($courses as $course){
			if($COURSE->id == $course->id){
				continue;
			}
			$options[$course->id] = $course->fullname;
		}		
			
		$mform->addElement('select', 'enrol', get_string('enrol', 'enrolself'), $options);
		$mform->setType('enrol', PARAM_INT);
	

        //-------------------------------------------------------
        $this->standard_coursemodule_elements();

        //-------------------------------------------------------
        $this->add_action_buttons();

        //-------------------------------------------------------
        $mform->addElement('hidden', 'revision');
        $mform->setType('revision', PARAM_INT);
        $mform->setDefault('revision', 1);
    }

}

