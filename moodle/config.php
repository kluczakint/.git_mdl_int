<?php  // Moodle configuration file
unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'mysqli';
$CFG->dblibrary = 'native';
$CFG->dbhost    = 'localhost';
$CFG->dbname    = 'copy';
$CFG->dbuser    = 'root';
$CFG->dbpass    = '1qw2!QW@';
$CFG->prefix    = 'mdl_';
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbport' => '',
  'dbsocket' => '',
);

$CFG->wwwroot   = 'http://192.168.19.8/moodle';
$CFG->dataroot  = '/home/nginx/moodledata/'; //tutaj umieszczamy prawidłową ścieżkę do folderu moodledata
$CFG->admin     = 'admin';


//poniżej nie modyfikujemy
$CFG->directorypermissions = 0777;
$CFG->defaultblocks_override = 'progress';
$CFG->defaultblocks_site = 'progress';
$CFG->defaultblocks_topics = 'progress';
$CFG->defaultblocks_weeks = 'progress';
$CFG->defaultblocks = 'progress';


require_once(dirname(__FILE__) . '/lib/setup.php');
// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!