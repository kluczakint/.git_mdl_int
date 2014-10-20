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
 * Progress Bar block English language translation
 *
 * @package    contrib
 * @subpackage block_progress
 * @copyright  2010 Michael de Raadt
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Module names
$string['assignment'] = 'Zadanie';
$string['book'] = 'Książka';
$string['certificate'] = 'Certyfikat';
$string['chat'] = 'Czat';
$string['choice'] = 'Wybór';
$string['data'] = 'Baza danych';
$string['feedback'] = 'Opdowiedź zwrotna';
$string['flashcardtrainer'] = 'Flashcard trainer';
$string['folder'] = 'Folder';
$string['forum'] = 'Forum';
$string['glossary'] = 'Glosariusz';
$string['hotpot'] = 'Hot Potatoes';
$string['imscp'] = 'IMS Content Package';
$string['journal'] = 'Journal';
$string['lesson'] = 'Lekcja';
$string['page'] = 'Strona';
$string['quiz'] = 'Quiz';
$string['resource'] = 'Plik';
$string['scorm'] = 'SCORM';
$string['url'] = 'URL';
$string['wiki'] = 'Wiki';

// Actions
$string['activity_completion'] = 'aktywność zakończona';
$string['answered'] = 'udzielono odpowiedź';
$string['attempted'] = 'rozpoczęty';
$string['awarded'] = 'nagrodzony';
$string['completed'] = 'ukończony';
$string['finished'] = 'zakończony';
$string['graded'] = 'oceniony';
$string['marked'] = 'zaznaczony';
$string['passed'] = 'zaliczony';
$string['posted_to'] = 'posted to';
$string['responded_to'] = 'responded to';
$string['submitted'] = 'wysłana';
$string['viewed'] = 'przejrzany';

// Stings for the Config page
$string['config_default_title'] = 'Wskaźnik postępu';
$string['config_header_action'] = 'Akcja';
$string['config_header_expected'] = 'Oczekiwany do';
$string['config_header_icon'] = 'Ikona';
$string['config_header_locked'] = 'Zablokowny do deadline\'u';
$string['config_header_monitored'] = 'Monitorowany';
$string['config_icons'] = 'Użyj ikon na pasku';
$string['config_monitored'] = 'Monitorowana zawartość';
$string['config_now'] = 'Użyj';
$string['config_title'] = 'Tytuł bloku';

// Help strings
$string['why_set_the_title'] = 'Dlaczego warto ustawić tytuł instancji bloku?';
$string['why_set_the_title_help'] = '
<p>Może istnieć wiele wystąpień bloku pasku postępu. Możesz korzystać z różnych bloków pasek postępu, monitorować różne zestawy działań lub zasobów. Można śledzić postęp w zadaniach w jednym bloku, a quizy w innym. Z tego powodu można przesłonić domyślny tytuł i ustawić bardziej odpowiedni tytuł bloku dla każdej instancji.</p>
';
$string['why_use_icons'] = 'Dlaczego warto korzystać z ikon?';
$string['why_use_icons_help'] = '
<p>Możesz dodać dziubek i krzyżowe ikony na pasku postępu, aby ten blok był wizualnie bardziej odpowiedni dla uczniów z daltonizmem. </ P>
<p>Może to również znaczenie  rozjaśnić działanie bloku jeżeli kolory nie są intuicyjne, zarówno ze względów kulturowych lub osobiste.</p>
';
$string['why_display_now'] = 'Dlaczego możesz pokazać/ukryć znaczkik TERAZ?';
$string['why_display_now_help'] = '
<p>Not all course are focussed on completion of tasks by specific times. Some courses may have an open-enrollment, allowing students to enrol and complete when they can.</p>
<p>To use the Progess Bar as a tool in such courses, create "Expected by" dates in the far-future and set the "Use NOW" setting to No.</p>
';
$string['what_does_monitored_mean'] = 'Co oznacza status monitorowany?';
$string['what_does_monitored_mean_help'] = '
<p>The purpose of this block is to encourage students to manage their time effectively. Each student can monitor their progress in completing the activies and resources you have created.</p>
<p>On the configuration page you will see a list of all the modules that you have created which can be monitored by the Progress Bar block. Modules will only be monitored and appear as a small square in the progress bar if you select Yes to monitor the module.</p>
';
$string['what_locked_means'] = 'Co oznacza zablokowany do deadline\'u';
$string['what_locked_means_help'] = '
<p>Where an activity can, in its own settings, have a deadline, and a deadline is set, it is optional to use the deadline of the activity, or to set another separate time used for the activity in the Progress Bar.</p>
<p>To lock the Progress Bar to an activity\'s deadline it must have a deadline enabled and set. If the deadline is locked, changing the deadline in the activity\'s settings will automatically change the time associated with the activity in the Progress Bar.</p>
<p>When an activity is not locked to a deadline of the activity, changing the date and time in the Progress Bar settings will not affect the deadline of the activity.</p>
';
$string['what_expected_by_means'] = 'Co oznacza oczekiwany do?';
$string['what_expected_by_means_help'] = '
<p>The <em>Expected by</em> date-time is when the related activity/resource is expected to be completed (viewed, sumbitted, posted-to, etc...).</p>
<p>If there is already a deadline associated with an activity, like an assignment deadline, this deadline can be used as the expected time for the event as long as the "Locked to Deadline" checkbox is checked. By unselecting locking an independant expected time can be created, and altering this will not affect the actual deadline of the activity.</p>
<p>When you first visit the configuration page for the Progress Bar, or if you create a new activity/resource and return to the configuration page, a guess will be made about the expected date-time for the activity/resource.
<ul>
    <li>For an activity with an existing deadline, this deadline will used.</li>
    <li>When there is no activity deadline, but the course format used is a weekly format, the end of the week (just before midnight Sunday) is assumed.</li>
    <li>For an activity/resource not used in a weekly course format, the end of the current week (just before midnight next Sunday) is used.</li>
</ul>
</p>
<p>Once an expected date-time is set, it is independant of any deadline or other information for that activity/resource.</p>
';
$string['what_actions_can_be_monitored'] = 'Jakie akcje mogą być monitorowane?';
$string['what_actions_can_be_monitored_help'] = '
<p>Different activities and resources can be monitored.</p>
<p>Because different activities and resources are used differently, what is monitored for each module varies. For example, for assignments, submission can be monitored; quizzes can be monitored on attempt; forums can be monitored for student postings; choice activities can monitored for answering and viewing resources is monitored.</p>
<p>Some activities can have more than one activity associated with them. In such cases, you can select the appropriate activity for each instance of that activity.</p>
';

// Other terms
$string['date_format'] = '%a %d %b, %I:%M %p';
$string['mouse_over_prompt'] = 'Szczegóły po najecheniu kursorem.';
$string['no_events_config_message'] = 'There are no activities or resources to monitor the progress of. Create some activities and/or resources then configure this block.';
$string['no_events_message'] = 'Brak aktywności wskazanych do monitorowania.';
$string['no_visible_events_message'] = 'None of the monitored events are currently visible.';
$string['now_indicator'] = 'TERAZ';
$string['pluginname'] = 'Wskaźnik postępu';
$string['time_expected'] = 'Oczekiwany';

// Default colours that may have different cultural meanings
$string['attempted_colour'] = '#33CC00';
$string['notAttempted_colour'] = '#FF3300';
$string['futureNotAttempted_colour'] = '#FF3300';

// Overview page strings
$string['lastonline'] = 'Ostatnio online';
$string['overview'] = 'Status użytkowników';
$string['progress'] = 'Postęp';
$string['progressbar'] = 'Wskaźnik postępu';

// For cabailities
$string['progress:overview'] = 'Zobacz raport progresu dla wszystkich użytkowników kursu.';