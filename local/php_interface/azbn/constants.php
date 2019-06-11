<?

define('AZBN__VERSION', 0.7);
define('AZBN__NS', 'azbn7');
define('SITE__NS', SITE_ID);

@ini_set('session.gc_maxlifetime', 9999999999);

/*

define('BX_COMPOSITE_DEBUG', true );
define('LOG_FILENAME', $_SERVER['DOCUMENT_ROOT'] . '/upload/composite_log.txt');

//Также можно удалить композитный кеш при помощи api: 
$staticHtmlCache = \Bitrix\Main\Data\StaticHtmlCache::getInstance();
$staticHtmlCache->deleteAll();

*/