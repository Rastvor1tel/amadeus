#!/usr/bin/php 
<?php

ini_set('short_open_tag', 1);
ini_set('max_execution_time', 1800);
ini_set('max_input_time', 1800);

date_default_timezone_set('Europe/Moscow');

set_time_limit(0); 
@ignore_user_abort(true);

$_SERVER['DOCUMENT_ROOT'] = realpath(dirname(__FILE__) . '/../../../../');
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

define('NO_KEEP_STATISTIC', true);
define('NOT_CHECK_PERMISSIONS', true);
//define('FORMAT_DATETIME', 'DD.MM.YYYY HH:MI:SS');

define('LANG', 's1');
//define('SITE_ID', 's1');

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php'); 

azbn_selfAPI(array(
	'method' => 'default',
));

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/epilog_after.php');