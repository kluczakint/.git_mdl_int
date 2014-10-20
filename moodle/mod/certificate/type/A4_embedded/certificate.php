<?php

// This file is part of the Certificate module for Moodle - http://moodle.org/
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
 * A4_embedded certificate type
 *
 * @package    mod
 * @subpackage certificate
 * @copyright  Mark Nelson <markn@moodle.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.'); // It must be included from view.php
}

$pdf = new PDF($certificate->orientation, 'mm', 'A4', true, 'UTF-8', false);

$pdf->SetTitle($certificate->name);
$pdf->SetProtection(array('modify'));
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetAutoPageBreak(false, 0);
$pdf->AddPage();

// Define variables
// Landscape
if ($certificate->orientation == 'L') {
    $x = 10;
    $y = 30;
    $sealx = 220;
    $sealy = 10;
    $sigx = 47;
    $sigy = 155;
    $custx = 47;
    $custy = 155;
    $wmarkx = 40;
    $wmarky = 31;
    $wmarkw = 212;
    $wmarkh = 148;
    $brdrx = 0;
    $brdry = 0;
    $brdrw = 297;
    $brdrh = 210;
    $codey = 175;
} else { // Portrait
    $x = 10;
    $y = 40;
    $sealx = 140;
    $sealy = 20;
    $sigx = 30;
    $sigy = 230;
    $custx = 30;
    $custy = 230;
    $wmarkx = 26;
    $wmarky = 58;
    $wmarkw = 158;
    $wmarkh = 170;
    $brdrx = 0;
    $brdry = 0;
    $brdrw = 210;
    $brdrh = 297;
    $codey = 250;
}
$pdf->SetMargins(25, 15, 25);
// Add images and lines
//certificate_print_image($pdf, $certificate, CERT_IMAGE_BORDER, 10, 10, 10, 20);
//certificate_draw_frame($pdf, $certificate);
// Set alpha to semi-transparency
//$pdf->SetAlpha(0.2);
//certificate_print_image($pdf, $certificate, CERT_IMAGE_WATERMARK, $wmarkx, $wmarky, $wmarkw, $wmarkh);
$pdf->SetAlpha(1);

$pdf->SetLineStyle(array('width' => 3, 'color' => array(8, 75, 136)));
$pdf->Rect(0, 0, 297, 210);
                // create middle line border in selected color
					 
$pdf->SetLineStyle(array('width' => 16, 'color' => array(8, 75, 136)));
$pdf->Rect(0, 0, 30, 12);
$pdf->Rect(288, 0, 297, 210);
// create inner line border in selected color


certificate_print_image($pdf, $certificate, CERT_IMAGE_SEAL, 212, 6, 62, '');
certificate_print_image($pdf, $certificate, CERT_IMAGE_SIGNATURE, 117, 180, 40, '');

$x = 0; 
$y = 0;

certificate_print_text($pdf, $x+44, $y + 8, 'L', 'freesans', '', 14,  'Warszawa, dnia '.certificate_get_date($certificate, $certrecord, $course));

$y = 40;
// Add text
$pdf->SetTextColor(0, 0, 0);
certificate_print_text($pdf, $x, $y, 'C', 'freesans', 'B', 50, 'Zaświadczenie');

$pdf->SetLineStyle(array('width' => 1, 'color' => array(155, 155, 155)));
$pdf->Rect(40, 65, 240, 0);

$pdf->SetTextColor(0, 0, 0);

$y = 43;

//certificate_print_text($pdf, $x, $y + 20, 'C', 'freesans', '', 20, get_string('certify', 'certificate'));
certificate_print_text($pdf, $x, $y + 26, 'C', 'freesans', 'B', 30, 'Pan/i '. fullname($USER));
certificate_print_text($pdf, $x, $y + 45, 'C', 'freesans', '', 20, get_string('statement', 'certificate'));


certificate_print_text($pdf, $x, $y + 58, 'C', 'freesans', 'B', 20, nl2br($certificate->customtext));



$i = 0;

$sigx = 200; $sigy = 140;
if ($certificate->printteacher) {
    $context = context_module::instance($cm->id);
    if ($teachers = get_users_by_capability($context, 'mod/certificate:printteacher', '', $sort = 'u.lastname ASC', '', '', '', '', false)) {
        foreach ($teachers as $teacher) {
            $i++;
				
            certificate_print_text($pdf, $sigx, $sigy + ($i * 7), 'L', 'freesans', 'I', 16, fullname($teacher));
				
				$last = $sigy + ($i * 7);
        }
    }
}


$pdf->SetLineStyle(array('width' => 1, 'color' => array(155, 155, 155)));
$pdf->Rect(180, $last+13, 100, 0);
certificate_print_text($pdf, $x+200, $last + 17, 'L', 'freesans', '', 16, 'Prowadzący szkolenie');


//certificate_print_text($pdf, $x, $y + 72, 'C', 'freesans', '', 20, $course->fullname);
/*
certificate_print_text($pdf, $x, $y + 102, 'C', 'freesans', '', 10, certificate_get_grade($certificate, $course));
certificate_print_text($pdf, $x, $y + 112, 'C', 'freesans', '', 10, certificate_get_outcome($certificate, $course));
if ($certificate->printhours) {
    certificate_print_text($pdf, $x, $y + 122, 'C', 'freesans', '', 10, get_string('credithours', 'certificate') . ': ' . $certificate->printhours);
}
certificate_print_text($pdf, $x, $codey, 'C', 'freesans', '', 10, certificate_get_code($certificate, $certrecord));
$i = 0;
if ($certificate->printteacher) {
    $context = context_module::instance($cm->id);
    if ($teachers = get_users_by_capability($context, 'mod/certificate:printteacher', '', $sort = 'u.lastname ASC', '', '', '', '', false)) {
        foreach ($teachers as $teacher) {
            $i++;
            certificate_print_text($pdf, $sigx, $sigy + ($i * 4), 'L', 'freesans', '', 12, fullname($teacher));
        }
    }
}
 */

?>