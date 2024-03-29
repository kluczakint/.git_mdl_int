<?php

/**
 * Language strings for the certificate module
 *
 * @package    mod
 * @subpackage certificate
 * @copyright  Mark Nelson <mark@moodle.com.au>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['addlinklabel'] = 'Add another linked activity option';
$string['addlinktitle'] = 'Click to add another linked activity option';
$string['areaintro'] = 'Wstęp do zaświadczenia';
$string['awarded'] = 'Awarded';
$string['awardedto'] = 'Otrzymał';
$string['back'] = 'Wróć';
$string['border'] = 'Ramka';
$string['borderblack'] = 'Czarna';
$string['borderblue'] = 'Niebieska';
$string['borderbrown'] = 'Brązowa';
$string['bordercolor'] = 'Linie ramki';
$string['bordercolor_help'] = 'Since images can substantially increase the size of the pdf file, you may choose to print a border of lines instead of using a border image (be sure the Border Image option is set to No).  The Border Lines option will print a nice border of three lines of varying widths in the chosen color.';
$string['bordergreen'] = 'Zielone';
$string['borderlines'] = 'Linie';
$string['borderstyle'] = 'Obrazek ramki';
$string['borderstyle_help'] = 'The Border Image option allows you to choose a border image from the certificate/pix/borders folder.  Select the border image that you want around the certificate edges or select no border.';
$string['certificate:view'] = 'Zobacz Zaświadczenie';
$string['certificate:manage'] = 'Zarządzaj zaświadczeniem';
$string['certificate:printteacher'] = 'Drukuj nauczyciela';
$string['certificate:student'] = 'Pobierz Zaświadczenie';
$string['certificate'] = 'Weryfikacja kodu zaświadczenia:';
$string['certificatename'] = 'Nazwa zaświadczenia';
$string['certificatereport'] = 'Raport zaświadczenia';
$string['certificatesfor'] = 'Zaświadczenia dla';
$string['certificatetype'] = 'Typ zaświadczenia';
$string['certificatetype_help'] = 'This is where you determine the layout of the certificate. The certificate type folder includes four default certificates:
A4 Embedded prints on A4 size paper with embedded font.
A4 Non-Embedded prints on A4 size paper without embedded fonts.
Letter Embedded prints on letter size paper with embedded font.
Letter Non-Embedded prints on letter size paper without embedded fonts.

The non-embedded types use the Helvetica and Times fonts.  If you feel your users will not have these fonts on their computer, or if your language uses characters or symbols that are not accommodated by the Helvetica and Times fonts, then choose an embedded type.  The embedded types use the Dejavusans and Dejavuserif fonts.  This will make the pdf files rather large; thus it is not recommended to use an embedded type unless you must.

New type folders can be added to the certificate/type folder. The name of the folder and any new language strings for the new type must be added to the certificate language file.';
$string['certify'] = 'Niniejszym zaświadczamy, że';
$string['code'] = 'Kod';
$string['completiondate'] = 'Ukończenie kursu';
$string['course'] = 'dla';
$string['coursegrade'] = 'Ocena w kursie';
$string['coursename'] = 'Kurs';
$string['credithours'] = 'Credit Hours';
$string['customtext'] = 'Niestandardowy tekst';
$string['customtext_help'] = 'If you want the certificate to print different names for the teacher than those who are assigned
the role of teacher, do not select Print Teacher or any signature image except for the line image.  Enter the teacher names in this text box as you would like them to appear.  By default, this text is placed in the lower left of the certificate. The following html tags are available: &lt;br&gt;, &lt;p&gt;, &lt;b&gt;, &lt;i&gt;, &lt;u&gt;, &lt;img&gt; (src and width (or height) are mandatory), &lt;a&gt; (href is mandatory), &lt;font&gt; (possible attributes are: color, (hex color code), face, (arial, times, courier, helvetica, symbol)).';
$string['date'] = 'w';
$string['datefmt'] = 'Format daty';
$string['datefmt_help'] = 'Choose a date format to print the date on the certificate. Or, choose the last option to have the date printed in the format of the user\'s chosen language.';
$string['datehelp'] = 'Data';
$string['deletissuedcertificates'] = 'Usuń wygenerowane zaświadczenia';
$string['delivery'] = 'Doręczenie';
$string['delivery_help'] = 'Choose here how you would like your students to get their certificate.
Open in Browser: Opens the certificate in a new browser window.
Force Download: Opens the browser file download window.
Email Certificate: Choosing this option sends the certificate to the student as an email attachment.
After a user receives their certificate, if they click on the certificate link from the course homepage, they will see the date they received their certificate and will be able to review their received certificate.';
$string['designoptions'] = 'Opcje wyglądu';
$string['download'] = 'Wymuś pobieranie';
$string['emailcertificate'] = 'Wyślij emailem (musisz zaznaczyć Zapisz!)';
$string['emailothers'] = 'Wyślij innym';
$string['emailothers_help'] = 'Enter the email addresses here, separated by a comma, of those who should be alerted with an email whenever students receive a certificate.';
$string['emailstudenttext'] = 'Attached is your certificate for {$a->course}.';
$string['emailteachers'] = 'Email nauczycielom';
$string['emailteachers_help'] = 'If enabled, then teachers are alerted with an email whenever students receive a certificate.';
$string['emailteachermail'] = '
{$a->student} otrzymał zaświadczenie: \'{$a->certificate}\'
w {$a->course}.

Możesz go przejżeć pod adresem:

    {$a->url}';
$string['emailteachermailhtml'] = '
{$a->student} otrzymał zaświadczenie: \'<i>{$a->certificate}</i>\'
w {$a->course}.

Możesz go przejżeć pod adresem:

    <a href="{$a->url}">Raport zaświadczenia</a>.';
$string['entercode'] = 'Wprowadź kod z zaświadczenia:';
$string['getcertificate'] = 'Pobierz zaświadczenie';
$string['grade'] = 'Ocena';
$string['gradedate'] = 'Data oceny';
$string['gradefmt'] = 'Format oceny';
$string['gradefmt_help'] = 'There are three available formats if you choose to print a grade on the certificate:

Ocena procentowa: Prints the grade as a percentage.
Ocena punktowa: Prints the point value of the grade.
Ocena słowna: Prints the percentage grade as a letter.';
$string['gradeletter'] = 'Ocena słowna';
$string['gradepercent'] = 'Ocena procentowa';
$string['gradepoints'] = 'Ocena punktowa';
$string['incompletemessage'] = 'In order to download your certificate, you must first complete all required '.'activities. Please return to the course to complete your coursework.';
$string['intro'] = 'Wstęp';
$string['issueoptions'] = 'Opcje generowania';
$string['issued'] = 'Wygenerowany';
$string['issueddate'] = 'Data wygenerowania';
$string['landscape'] = 'Poziomy';
$string['lastviewed'] = 'Otrzymałeś te zaświadczenie:';
$string['letter'] = 'List';
$string['lockingoptions'] = 'Opcje blokady';
$string['modulename'] = 'Zaświadczenie';
$string['modulenameplural'] = 'Zaświadczenia';
$string['mycertificates'] = 'Moje zaświadczenia';
$string['nocertificates'] = 'Brak zaświadczeń';
$string['nocertificatesissued'] = 'Nie wygenerowano jeszcze żadnych zaświadczeń';
$string['nocertificatesreceived'] = 'nie otrzymał żadnych zaświadczeń.';
$string['nogrades'] = 'Nie ma dostępnych ocen';
$string['notapplicable'] = 'N/A';
$string['notfound'] = 'Numer zaświadczenia nie mógł być zweryfikowany.';
$string['notissued'] = 'Nie wygenerowany';
$string['notissuedyet'] = 'Jeszcze nie wygenerowany';
$string['notreceived'] = 'Nie otrzymałeś tego zaświadczenia';
$string['openbrowser'] = 'Otwórz w nowym oknie';
$string['opendownload'] = 'Kliknij przycisk poniżej, aby zapisać zaświadczenie na dysku Twojego komputera.';
$string['openemail'] = 'Click the button below and your certificate will be sent to you as an email attachment.';
$string['openwindow'] = 'Kliknij przycisk poniżej, aby otworzyć zaświadczenie w nowym oknie przeglądarki.';
$string['or'] = 'Lub';
$string['orientation'] = 'Orientacja';
$string['orientation_help'] = 'Choose whether you want your certificate orientation to be portrait or landscape.';
$string['pluginadministration'] = 'Administracja zaświadczeniem';
$string['pluginname'] = 'Zaświadczenie';
$string['portrait'] = 'Portret';
$string['printdate'] = 'Drukuj datę';
$string['printdate_help'] = 'This is the date that will be printed, if a print date is selected. If the course completion date is selected but the student has not completed the course, the date received will be printed. You can also choose to print the date based on when an activity was graded. If a certificate is issued before that activity is graded, the date received will be printed.';
$string['printerfriendly'] = 'Printer-friendly page';
$string['printhours'] = 'Print Credit Hours';
$string['printhours_help'] = 'Enter here the number of credit hours to be printed on the certificate.';
$string['printgrade'] = 'Drukuj ocenę';
$string['printgrade_help'] = 'You can choose any available course grade items from the gradebook to print the user\'s grade received for that item on the certificate.  The grade items are listed in the order in which they appear in the gradebook. Choose the format of the grade below.';
$string['printnumber'] = 'Drukuj kod';
$string['printnumber_help'] = 'A unique 10-digit code of random letters and numbers can be printed on the certificate. This number can then be verified by comparing it to the code number displayed in the certificates report.';
$string['printoutcome'] = 'Drukuj wyniki';
$string['printoutcome_help'] = 'You can choose any course outcome to print the name of the outcome and the user\'s received outcome on the certificate.  An example might be: Assignment Outcome: Proficient.';
$string['printseal'] = 'Pieczęć lub Logo';
$string['printseal_help'] = 'This option allows you to select a seal or logo to print on the certificate from the certificate/pix/seals folder. By default, this image is placed in the lower right corner of the certificate.';
$string['printsignature'] = 'Podpis';
$string['printsignature_help'] = 'This option allows you to print a signature image from the certificate/pix/signatures folder.  You can print a graphic representation of a signature, or print a line for a written signature. By default, this image is placed in the lower left of the certificate.';
$string['printteacher'] = 'Wydrukuj nazwy nauczycieli';
$string['printteacher_help'] = 'For printing the teacher name on the certificate, set the role of teacher at the module level.  Do this if, for example, you have more than one teacher for the course or you have more than one certificate in the course and you want to print different teacher names on each certificate.  Click to edit the certificate, then click on the Locally assigned roles tab.  Then assign the role of Teacher (editing teacher) to the certificate (they do not HAVE to be a teacher in the course--you can assign that role to anyone).  Those names will be printed on the certificate for teacher.';
$string['printwmark'] = 'Znak wodny';
$string['printwmark_help'] = 'A watermark file can be placed in the background of the certificate. A watermark is a faded graphic. A watermark could be a logo, seal, crest, wording, or whatever you want to use as a graphic background.';
$string['receivedcerts'] = 'Otrzymane zaświadczenia';
$string['receiveddate'] = 'Data otrzymania';
$string['reissuecert'] = 'Reissue Certificates';
$string['reissuecert_help'] = 'If you choose yes here, then this certificate will be reissued with a new date, grade and code number every time a user clicks on the certificate link. Note:  Although a table will show their past received dates, no review button will be available to users.  Only the latest issued certificate will appear in the certificate report.';
$string['removecert'] = 'Issued certificates removed';
$string['report'] = 'Report';
$string['reportcert'] = 'Report Certificates';
$string['reportcert_help'] = 'If you choose yes here, then this certificate\'s date received, code number, and the course name will be shown on the user certificate reports.  If you choose to print a grade on this certificate, then that grade will also be shown on the certificate report.';
$string['reviewcertificate'] = 'Pobierz swoje zaświadczenie';
$string['savecert'] = 'Zapisz zaświadczenie';
$string['savecert_help'] = 'If you choose this option, then a copy of each user\'s certificate pdf file is saved in the course files moddata folder for that certificate. A link to each user\'s saved certificate will be displayed in the certificate report.';
$string['sigline'] = 'line';
$string['statement'] = 'Ukończył/a:';
$string['summaryofattempts'] = 'Podsumowanie otrzymanych zaświadczeń';
$string['textoptions'] = 'Opcje tekstowe';
$string['title'] = 'ZAŚWIADCZENIE';
$string['to'] = 'Otrzymał';
$string['typeA4_embedded'] = 'Formatu A4';
$string['typeA4'] = 'A4';
$string['typeletter_embedded'] = 'Letter Embedded';
$string['typeletter_non_embedded'] = 'Letter Non-Embedded';
$string['userdateformat'] = 'Format daty użytkownika';
$string['validate'] = 'Weryfikuj';
$string['verifycertificate'] = 'Weryfikuj zaświadczenie';
$string['viewcertificateviews'] = 'Zobacz {$a} wygenerowanych zaświadczeń';
$string['viewed'] = 'Wygenerowano te zaświadczenie:';
$string['viewtranscript'] = 'Zobacz zaświadczenia';

//KŁ:
$string['required'] = 'Wymagane aktywności';
$string['config_header_monitored'] = 'Monitoring';
$string['scorm'] = 'SCORM';
$string['config_header_expected'] = 'Ukończ przed';
$string['config_header_action'] = 'Wymagana akcja';
$string['completed'] = 'Ukończony';
$string['attempted'] = 'Attempted';
$string['passed'] = 'Zaliczony';
$string['notfinished'] = 'Najpierw musisz ukończyć szkolenie.';
$string['back'] = 'Wstecz';

$string['coursetimereq'] = 'Wymagany czas spędzony w kursue (minuty)';