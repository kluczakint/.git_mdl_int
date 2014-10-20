<?php

defined('MOODLE_INTERNAL') || die;

/**
 * List of features supported in Page module
 * @param string $feature FEATURE_xx constant for requested feature
 * @return mixed True if module supports feature, false if not, null if doesn't know
 */
function enrolself_supports($feature) {
    switch($feature) {
        case FEATURE_MOD_ARCHETYPE:           return MOD_ARCHETYPE_RESOURCE;
        case FEATURE_GROUPS:                  return false;
        case FEATURE_GROUPINGS:               return false;
        case FEATURE_GROUPMEMBERSONLY:        return true;
        case FEATURE_MOD_INTRO:               return true;
        case FEATURE_COMPLETION_TRACKS_VIEWS: return true;
        case FEATURE_GRADE_HAS_GRADE:         return false;
        case FEATURE_GRADE_OUTCOMES:          return false;
        case FEATURE_BACKUP_MOODLE2:          return true;
        case FEATURE_SHOW_DESCRIPTION:        return true;

        default: return null;
    }
}

/**
 * Returns all other caps used in module
 * @return array
 */
function enrolself_get_extra_capabilities() {
    return array('moodle/site:accessallgroups');
}

/**
 * This function is used by the reset_course_userdata function in moodlelib.
 * @param $data the data submitted from the reset course.
 * @return array status array
 */
function enrolself_reset_userdata($data) {
    return array();
}

/**
 * List of view style log actions
 * @return array
 */
function enrolself_get_view_actions() {
    return array('view','view all');
}

/**
 * List of update style log actions
 * @return array
 */
function enrolself_get_post_actions() {
    return array('update', 'add');
}

/**
 * Add enrolself instance.
 * @param stdClass $data
 * @param mod_enrolself_mod_form $mform
 * @return int new enrolself instance id
 */
function enrolself_add_instance($data, $mform = null) {
    global $CFG, $DB;
    require_once("$CFG->libdir/resourcelib.php");

    $data->id = $DB->insert_record('enrolself', $data);


    return $data->id;
}

/**
 * Update enrolself instance.
 * @param object $data
 * @param object $mform
 * @return bool true
 */
function enrolself_update_instance($data, $mform) {
    global $CFG, $DB;
	require_once("$CFG->libdir/resourcelib.php");
	
	$data->timemodified = time();
    $data->id           = $data->instance;
    $data->revision++;

    $DB->update_record('enrolself', $data);
	
    return true;
}

/**
 * Delete enrolself instance.
 * @param int $id
 * @return bool true
 */
function enrolself_delete_instance($id) {
    global $DB;

    if (!$enrolself = $DB->get_record('enrolself', array('id'=>$id))) {
        return false;
    }

    // note: all context files are deleted automatically

    $DB->delete_records('enrolself', array('id'=>$enrolself->id));

    return true;
}









