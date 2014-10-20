<?php


require('../../config.php');
require_once($CFG->libdir.'/completionlib.php');

$id      = optional_param('id', 0, PARAM_INT); // Course Module ID

if (!$cm = get_coursemodule_from_id('enrolself', $id)) {
	print_error('invalidcoursemodule');
}
$enrolself = $DB->get_record('enrolself', array('id'=>$cm->instance), '*', MUST_EXIST);

$course = $DB->get_record('course', array('id'=>$cm->course), '*', MUST_EXIST);
$courseenrol = $DB->get_record('course', array('id'=>$enrolself->enrol), '*', MUST_EXIST);

require_course_login($course, true, $cm);
$context = context_module::instance($cm->id);
require_capability('mod/enrolself:view', $context);

// Update 'viewed' state if required by completion system
require_once($CFG->libdir . '/completionlib.php');
$completion = new completion_info($course);
$completion->set_module_viewed($cm);


require_once($CFG->dirroot.'/enrol/manual/locallib.php');

if (!$enrol_manual = enrol_get_plugin('manual')) {
	throw new coding_exception('Can not instantiate enrol_manual');
}

$instance = $DB->get_record('enrol', array('courseid'=>$courseenrol->id, 'enrol'=>'manual'), '*', MUST_EXIST);
$role = $DB->get_record('role', array('shortname'=>'student'), '*', MUST_EXIST);


$enrol_manual->enrol_user($instance, $USER->id, $role->id, time());
add_to_log($courseenrol->id, 'course', 'enrol', '../enrol/users.php?id='.$courseenrol->id, $courseenrol->id);

redirect($CFG->wwwroot.'/course/view.php?id='.$courseenrol->id);