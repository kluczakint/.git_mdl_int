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

$footerl = 'footer-left';
$footerm = 'footer-middle';
$footerr = 'footer-right';

$hascopyright = (empty($PAGE->theme->settings->copyright)) ? false : $PAGE->theme->settings->copyright;
$hasfootnote = (empty($PAGE->theme->settings->footnote)) ? false : $PAGE->theme->settings->footnote;
$hasfooterleft = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('footer-left', $OUTPUT));
$hasfootermiddle = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('footer-middle', $OUTPUT));
$hasfooterright = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('footer-right', $OUTPUT));


if($hasfooterleft OR $hasfootermiddle OR $hasfooterright) {
?>
	<div class="row-fluid">
		<?php
            		echo $OUTPUT->essentialblocks($footerl, 'span4');

            		echo $OUTPUT->essentialblocks($footerm, 'span4');

            		echo $OUTPUT->essentialblocks($footerr, 'span4');
		?>
 	</div>
<?php
}
?>

<div class="row-fluid">
	<div class="span12" align="center" style="text-align: center;">
		<img src="<?php echo $OUTPUT->pix_url('ue', 'theme');
?>" alt="">
	  <br>
	  <br>
			
	</div>
</div>


	<div class="row-fluid">

    <?php

	 $hascopyright = '';
			
			
	 
	 
        echo '<div class="menufoot"><div class="span6"><a href="'.$CFG->wwwroot.'/course">kursy</a>   |  <a href="'.$CFG->wwwroot.'/mod/page/view.php?id=4">pomoc techniczna</a>  |   <a href="'.$CFG->wwwroot.'/mod/page/view.php?id=5">regulamin</a>  |   <a href="'.$CFG->wwwroot.'/mod/page/view.php?id=6">polityka prywatności</a></div>';

        echo '<div class="span6 pull-right prawa">&copy; GUGIK '.date("Y").'
		  	</div>
					</div>
					
								<br><div class="span12" style="text-align: right; padding: 0px 24px; color: #888;">
								Główny Urząd Geodezji i Kartografii, ul. Wspólna 2, 00-926 Warszawa, tel. +48 22 661 80 17, +48 22 629 18 67, email: gugik@gugik.gov.pl
							</div>';


    ?>
	</div>


