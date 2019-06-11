<?

if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) {
	die();
}

use \Bitrix\Main\Localization\Loc as Bitrix__Loc;

Bitrix__Loc::loadMessages(__FILE__);

$arComponentDescription = array(
	'NAME' => 'Список категорий',
	'DESCRIPTION' => '',
	'ICON' => '/images/icon.png',
	'SORT' => 10,
	'CACHE_PATH' => 'Y',
	'PATH' => array(
		'ID' => AZBN__NS,
		'NAME' => AZBN__NS,
		'SORT' => 10,
		'CHILD' => array(
			'ID' => 'catalog',
			'NAME' => 'Каталог',
			'SORT' => 10,
		)
	),
);
