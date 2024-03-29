<?php

if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.');    ///  It must be included from a Moodle page
}

require_once($CFG->dirroot.'/lib/formslib.php');

class user_editadvanced_form extends moodleform {

    // Define the form
    function definition() {
        global $USER, $CFG, $COURSE;

        $mform =& $this->_form;
        $editoroptions = null;
        $filemanageroptions = null;
        $userid = $USER->id;

        if (is_array($this->_customdata)) {
            if (array_key_exists('editoroptions', $this->_customdata)) {
                $editoroptions = $this->_customdata['editoroptions'];
            }
            if (array_key_exists('filemanageroptions', $this->_customdata)) {
                $filemanageroptions = $this->_customdata['filemanageroptions'];
            }
            if (array_key_exists('userid', $this->_customdata)) {
                $userid = $this->_customdata['userid'];
            }
        }

        //Accessibility: "Required" is bad legend text.
        $strgeneral  = get_string('general');
        $strrequired = get_string('required');

        /// Add some extra hidden fields
        $mform->addElement('hidden', 'id');
        $mform->setType('id', PARAM_INT);
        $mform->addElement('hidden', 'course', $COURSE->id);
        $mform->setType('course', PARAM_INT);

        /// Print the required moodle fields first
        $mform->addElement('header', 'moodle', $strgeneral);

        $mform->addElement('text', 'username', get_string('username'), 'size="20"');
        $mform->addRule('username', $strrequired, 'required', null, 'client');
        $mform->setType('username', PARAM_RAW);

        $auths = core_component::get_plugin_list('auth');
        $enabled = get_string('pluginenabled', 'core_plugin');
        $disabled = get_string('plugindisabled', 'core_plugin');
        $auth_options = array($enabled=>array(), $disabled=>array());
        foreach ($auths as $auth => $unused) {
            if (is_enabled_auth($auth)) {
                $auth_options[$enabled][$auth] = get_string('pluginname', "auth_{$auth}");
            } else {
                $auth_options[$disabled][$auth] = get_string('pluginname', "auth_{$auth}");
            }
        }
        $mform->addElement('selectgroups', 'auth', get_string('chooseauthmethod','auth'), $auth_options);
        $mform->addHelpButton('auth', 'chooseauthmethod', 'auth');

        $mform->addElement('advcheckbox', 'suspended', get_string('suspended','auth'));
        $mform->addHelpButton('suspended', 'suspended', 'auth');

        $mform->addElement('checkbox', 'createpassword', get_string('createpassword','auth'));

        if (!empty($CFG->passwordpolicy)){
            $mform->addElement('static', 'passwordpolicyinfo', '', print_password_policy());
        }
        $mform->addElement('passwordunmask', 'newpassword', get_string('newpassword'), 'size="20"');
        $mform->addHelpButton('newpassword', 'newpassword');
        $mform->setType('newpassword', PARAM_RAW);
        $mform->disabledIf('newpassword', 'createpassword', 'checked');

        $mform->addElement('advcheckbox', 'preference_auth_forcepasswordchange', get_string('forcepasswordchange'));
        $mform->addHelpButton('preference_auth_forcepasswordchange', 'forcepasswordchange');
        $mform->disabledIf('preference_auth_forcepasswordchange', 'createpassword', 'checked');

        /// shared fields
        useredit_shared_definition($mform, $editoroptions, $filemanageroptions);

        /// Next the customisable profile fields
        profile_definition($mform, $userid);

        if ($userid == -1) {
            $btnstring = get_string('createuser');
        } else {
            $btnstring = get_string('updatemyprofile');
        }

        $this->add_action_buttons(false, $btnstring);
			
		/*  $htmlsave = '</fieldset><fieldset><div id="fitem_id_submitbutton" class="fitem fitem_actionbuttons fitem_fsubmit"><div class="felement fsubmit" id="yui_3_13_0_3_1411634429458_448">
			<input name="submitbutton" value="Zmień profil" type="submit" id="id_submitbutton">
			</form>
			<form action="'.$CFG->wwwroot.'/user/profile.php?id='.$USER->id.'" method="get">
				<input type="submit" value="Anuluj">
			</form>
			</div></div>';	
			
			 $mform->addElement('html', $htmlsave); */
			
    }

    function definition_after_data() {
        global $USER, $CFG, $DB, $OUTPUT;

        $mform =& $this->_form;
        if ($userid = $mform->getElementValue('id')) {
            $user = $DB->get_record('user', array('id'=>$userid));
        } else {
            $user = false;
        }

        // if language does not exist, use site default lang
        if ($langsel = $mform->getElementValue('lang')) {
            $lang = reset($langsel);
            // check lang exists
            if (!get_string_manager()->translation_exists($lang, false)) {
                $lang_el =& $mform->getElement('lang');
                $lang_el->setValue($CFG->lang);
            }
        }

        // user can not change own auth method
        if ($userid == $USER->id) {
            $mform->hardFreeze('auth');
            $mform->hardFreeze('preference_auth_forcepasswordchange');
        }

        // admin must choose some password and supply correct email
        if (!empty($USER->newadminuser)) {
            $mform->addRule('newpassword', get_string('required'), 'required', null, 'client');
            if ($mform->elementExists('suspended')) {
                $mform->removeElement('suspended');
            }
        }

        // require password for new users
        if ($userid > 0) {
            if ($mform->elementExists('createpassword')) {
                $mform->removeElement('createpassword');
            }
        }

        if ($user and is_mnet_remote_user($user)) {
            // only local accounts can be suspended
            if ($mform->elementExists('suspended')) {
                $mform->removeElement('suspended');
            }
        }
        if ($user and ($user->id == $USER->id or is_siteadmin($user))) {
            // prevent self and admin mess ups
            if ($mform->elementExists('suspended')) {
                $mform->hardFreeze('suspended');
            }
        }

        // print picture
        if (empty($USER->newadminuser)) {
            if ($user) {
                $context = context_user::instance($user->id, MUST_EXIST);
                $fs = get_file_storage();
                $hasuploadedpicture = ($fs->file_exists($context->id, 'user', 'icon', 0, '/', 'f2.png') || $fs->file_exists($context->id, 'user', 'icon', 0, '/', 'f2.jpg'));
                if (!empty($user->picture) && $hasuploadedpicture) {
                    $imagevalue = $OUTPUT->user_picture($user, array('courseid' => SITEID, 'size'=>64));
                } else {
                    $imagevalue = get_string('none');
                }
            } else {
                $imagevalue = get_string('none');
            }
            $imageelement = $mform->getElement('currentpicture');
            $imageelement->setValue($imagevalue);

            if ($user && $mform->elementExists('deletepicture') && !$hasuploadedpicture) {
                $mform->removeElement('deletepicture');
            }
        }
		
        /// Next the customisable profile fields
        profile_definition_after_data($mform, $userid);
			
		  
    }

    function validation($usernew, $files) {
        global $CFG, $DB;

        $usernew = (object)$usernew;
        $usernew->username = trim($usernew->username);

        $user = $DB->get_record('user', array('id'=>$usernew->id));
        $err = array();

        if (!$user and !empty($usernew->createpassword)) {
            if ($usernew->suspended) {
                // Show some error because we can not mail suspended users.
                $err['suspended'] = get_string('error');
            }
        } else {
            if (!empty($usernew->newpassword)) {
                $errmsg = ''; // Prevent eclipse warning.
                if (!check_password_policy($usernew->newpassword, $errmsg)) {
                    $err['newpassword'] = $errmsg;
                }
            } else if (!$user) {
                $err['newpassword'] = get_string('required');
            }
        }

        if (empty($usernew->username)) {
            //might be only whitespace
            $err['username'] = get_string('required');
        } else if (!$user or $user->username !== $usernew->username) {
            //check new username does not exist
            if ($DB->record_exists('user', array('username'=>$usernew->username, 'mnethostid'=>$CFG->mnet_localhost_id))) {
                $err['username'] = get_string('usernameexists');
            }
            //check allowed characters
            if ($usernew->username !== core_text::strtolower($usernew->username)) {
                $err['username'] = get_string('usernamelowercase');
            } else {
                if ($usernew->username !== clean_param($usernew->username, PARAM_USERNAME)) {
                    $err['username'] = get_string('invalidusername');
                }
            }
        }

        if (!$user or $user->email !== $usernew->email) {
            if (!validate_email($usernew->email)) {
                $err['email'] = get_string('invalidemail');
            } else if ($DB->record_exists('user', array('email'=>$usernew->email, 'mnethostid'=>$CFG->mnet_localhost_id))) {
                $err['email'] = get_string('emailexists');
            }
        }

        /// Next the customisable profile fields
        $err += profile_validation($usernew, $files);

        if (count($err) == 0){
            return true;
        } else {
            return $err;
        }
    }
}


