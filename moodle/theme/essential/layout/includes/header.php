<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * This is built using the Clean template to allow for new theme's using
 * Moodle's new Bootstrap theme engine
 *
 *
 * @package   theme_essential
 * @copyright 2013 Julian Ridden
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$hasfacebook    = (empty($PAGE->theme->settings->facebook)) ? false : $PAGE->theme->settings->facebook;
$hastwitter     = (empty($PAGE->theme->settings->twitter)) ? false : $PAGE->theme->settings->twitter;
$hasgoogleplus  = (empty($PAGE->theme->settings->googleplus)) ? false : $PAGE->theme->settings->googleplus;
$haslinkedin    = (empty($PAGE->theme->settings->linkedin)) ? false : $PAGE->theme->settings->linkedin;
$hasyoutube     = (empty($PAGE->theme->settings->youtube)) ? false : $PAGE->theme->settings->youtube;
$hasflickr      = (empty($PAGE->theme->settings->flickr)) ? false : $PAGE->theme->settings->flickr;
$hasvk          = (empty($PAGE->theme->settings->vk)) ? false : $PAGE->theme->settings->vk;
$haspinterest   = (empty($PAGE->theme->settings->pinterest)) ? false : $PAGE->theme->settings->pinterest;
$hasinstagram   = (empty($PAGE->theme->settings->instagram)) ? false : $PAGE->theme->settings->instagram;
$hasskype       = (empty($PAGE->theme->settings->skype)) ? false : $PAGE->theme->settings->skype;
$hasios         = (empty($PAGE->theme->settings->ios)) ? false : $PAGE->theme->settings->ios;
$hasandroid     = (empty($PAGE->theme->settings->android)) ? false : $PAGE->theme->settings->android;
$haswebsite     = (empty($PAGE->theme->settings->website)) ? false : $PAGE->theme->settings->website;

$hastagline = ($SITE->summary);

// If any of the above social networks are true, sets this to true.
$hassocialnetworks = ($hasfacebook || $hastwitter || $hasgoogleplus || $hasflickr || $hasinstagram || $hasvk || $haslinkedin || $haspinterest || $hasskype || $haslinkedin || $haswebsite || $hasyoutube ) ? true : false;
$hasmobileapps = ($hasios || $hasandroid ) ? true : false;
$hasheaderprofilepic = (empty($PAGE->theme->settings->headerprofilepic)) ? false : $PAGE->theme->settings->headerprofilepic;


/* Modified to check for IE 7/8. Switch headers to remove backgound-size CSS (in Custom CSS) functionality if true */
$checkuseragent = '';
if (!empty($_SERVER['HTTP_USER_AGENT'])) {
    $checkuseragent = $_SERVER['HTTP_USER_AGENT'];
		 //echo '<h2>Twoja przeglądarka przedstawia się jako:<br>
		 //'.$checkuseragent.'</h2>';
}
?>

<?php
// Check if IE7 browser and display message
if (strpos($checkuseragent, 'MSIE 7')) {
	echo get_string('ie7message', 'theme_essential');
}?>

<?php
if (strpos($checkuseragent, 'MSIE 8') || strpos($checkuseragent, 'MSIE 7')) {?>
    <header id="page-header-IE7-8" class="clearfix">
<?php
} else { ?>
    <header id="page-header" class="clearfix">
<?php
} ?>

<div class="container-fluid nopad">
    <div class="row-fluid">
					<div class="span12 pull-right headerpasek" style="text-align: right;">
							<?php
							echo $OUTPUT->login_info();
							?>
						</div>
				</div>
				</div>

    <div class="container-fluid">
    <div class="row-fluid">

    <!-- HEADER: LOGO AREA -->
        <?php if ($hassocialnetworks && $hasmobileapps) { ?>
        	<div class="span6">
        <?php } else if (!$hassocialnetworks && $hasmobileapps) { ?>
        	<div class="span6">
        <?php } else if ($hassocialnetworks && !$hasmobileapps) { ?>
        	<div class="span6">
        <?php } else { ?>
        	<div class="span6">
        <?php } ?>
            <?php
				$haslogo = 1;
				if (!$haslogo) { ?>
                <i id="headerlogo" class="fa fa-<?php echo $PAGE->theme->settings->siteicon ?>"></i>
                <?php if ($hastagline) { ?>
                	<h1 id="title"><?php echo $SITE->shortname; ?></h1>
                	<h2 id="subtitle"><?php p(strip_tags(format_text($hastagline, FORMAT_HTML))) ?></h2>
                <?php } else { ?>
                	<h1 id="title" style="line-height: 2em"><?php echo $SITE->shortname; ?></h1>
                <?php } ?>

            <?php } else { ?>

                <a class="logo" href="<?php echo $CFG->wwwroot; ?>" title="<?php print_string('home'); ?>"></a>
            <?php } ?>
        </div>

			<div class="span5 pull-right bg2">

				<?php
			//		require_once('loginmenu.php');
				?>

			</div>

        <?php

		  /*	if (isloggedin() && $hasheaderprofilepic) { ?>
        <div class="span1 pull-right" id="profilepic">
            <p id="socialheading"><?php echo $USER->firstname; ?></p>
            <ul class="socials unstyled">
                <li>
                    <a href="<?php echo $CFG->wwwroot.'/user/profile.php?id='.$USER->id; ?>">
                        <?php echo $OUTPUT->user_picture($USER); ?>
                    </a>
                </li>
            </ul>

        </div>
        <?php
        } */

        // If true, displays the heading and available social links; displays nothing if false.
        if ($hassocialnetworks) {
        ?>
        <div class="span3 pull-right">
        <p id="socialheading"><?php echo get_string('socialnetworks','theme_essential')?></p>
            <ul class="socials unstyled">
                <?php if ($hasgoogleplus) { ?>
                <li><a href="<?php echo $hasgoogleplus; ?>" class="googleplus"><i class="fa fa-google-plus-square"></i></a></li>
                <?php } ?>
                <?php if ($hastwitter) { ?>
                <li><a href="<?php echo $hastwitter; ?>" class="twitter"><i class="fa fa-twitter-square"></i></a></li>
                <?php } ?>
                <?php if ($hasfacebook) { ?>
                <li><a href="<?php echo $hasfacebook; ?>" class="facebook"><i class="fa fa-facebook-square"></i></a></li>
                <?php } ?>
                <?php if ($haslinkedin) { ?>
                <li><a href="<?php echo $haslinkedin; ?>" class="linkedin"><i class="fa fa-linkedin-square"></i></a></li>
                <?php } ?>
                <?php if ($hasyoutube) { ?>
                <li><a href="<?php echo $hasyoutube; ?>" class="youtube"><i class="fa fa-youtube-square"></i></a></li>
                <?php } ?>
                <?php if ($hasflickr) { ?>
                <li><a href="<?php echo $hasflickr; ?>" class="flickr"><i class="fa fa-flickr"></i></a></li>
                <?php } ?>
                <?php if ($haspinterest) { ?>
                <li><a href="<?php echo $haspinterest; ?>" class="pinterest"><i class="fa fa-pinterest-square"></i></a></li>
                <?php } ?>
                <?php if ($hasinstagram) { ?>
                <li><a href="<?php echo $hasinstagram; ?>" class="instagram"><span class="fa-stack fa-lg"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-instagram fa-stack-1x fa-inverse"></i></span></a></li>
                <?php } ?>
                <?php if ($hasvk) { ?>
                <li><a href="<?php echo $hasvk; ?>" class="vk"><span class="fa-stack fa-lg"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-vk fa-stack-1x fa-inverse"></i></span></a></li>
                <?php } ?>
                <?php if ($hasskype) { ?>
                <li><a href="<?php echo $hasskype; ?>" class="skype"><span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-skype fa-stack-1x fa-inverse"></i></span></a></li>
                <?php } ?>
                <?php if ($haswebsite) { ?>
                <li><a href="<?php echo $haswebsite; ?>" class="website"><span class="fa-stack fa-lg"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-globe fa-stack-1x fa-inverse"></i></span></a></li>
                <?php } ?>
	    </ul>
        </div>
        <?php
        }

        // If true, displays the heading and available social links; displays nothing if false.
        if ($hasmobileapps) {
        ?>
        <div class="span2 pull-right">
        <p id="socialheading"><?php echo get_string('mobileappsheading','theme_essential')?></p>
            <ul class="socials unstyled">
                <?php if ($hasios) { ?>
                <li><a href="<?php echo $hasios; ?>" class="ios"><span class="fa-stack fa-lg"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-apple fa-stack-1x fa-inverse"></i></span></a></li>
                <?php } ?>
                <?php if ($hasandroid) { ?>
                <li><a href="<?php echo $hasandroid; ?>" class="android"><span class="fa-stack fa-lg"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-android fa-stack-1x fa-inverse"></i></span></a></li>
                <?php } ?>
	    </ul>
        </div>
        <?php
        }

        if (!empty($courseheader)) { ?>
        <div id="course-header"><?php echo $courseheader; ?></div>
        <?php } ?>
    </div>
</header>
