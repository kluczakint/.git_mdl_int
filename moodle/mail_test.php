<?php
require_once('config.php');
require_once($CFG->libdir.'/adminlib.php');


$subject = 'Test wysyłania wiadomości e-mail';
$message = "Treść testowej wiadmości";
$supportuser = core_user::get_support_user();
$result = email_to_user( $supportuser, $supportuser, $subject, $message);

	 
    //if POST was used, display the message straight away
    if ($result) echo 'Dziękujemy, Twoja wiadomość została dostarczona, skontaktujemy się z Tobą w możliwie najszybszym czasie.';
    else echo 'Sorry, unexpected error. Please try again later';
    //else if GET was used, return the boolean value so that
    //ajax script can react accordingly
    //1 means success, 0 means failed
   