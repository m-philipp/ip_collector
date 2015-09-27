<?php

date_default_timezone_set('UTC');

// Load Epiphany
include_once './epiphany/Epi.php';

// set config path depending on location of config.ini (= basic test if deployed or not)
/*
 * Password Hashing is done via:
 * hash("sha512", getConfig()->get('mysql')->salt . $pw);
 **/
$config = './';


EPi::setPath('config', $config);
Epi::setPath('base', './epiphany');
Epi::setPath('documentRoot', './');
Epi::setPath('view', './');

// Initialize all Epi modules that are used
Epi::init('route', 'template', 'api', 'database', 'config', 'session');
getConfig()->load('config.ini');

// Connect to database
$sql_conf = getConfig()->get('mysql');

EpiDatabase::employ('mysql', $sql_conf->database,
    $sql_conf->server,
    $sql_conf->user,
    $sql_conf->password);
EpiSession::employ(EpiSession::PHP);


//Load class that implements routing functionality
include './router.php';



//Setup routes for navigation and API calls
getRoute()->get('/', array('Router', 'home'));

getRoute()->get('/view', array('Router', 'view'));

getRoute()->get('/imprint', array('Router', 'imprint'));

getRoute()->get('/collect', array('Router', 'defaultCollect'));
getRoute()->get('/collect/(.*)', array('Router', 'collect'));

getRoute()->run();
