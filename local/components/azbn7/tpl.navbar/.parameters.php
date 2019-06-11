<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) {
	die();
}

use \Bitrix\Main\Localization\Loc as Bitrix__Loc;

Bitrix__Loc::loadMessages(__FILE__);

if(!CModule::IncludeModule('iblock')) {
	return;
}

$arComponentParameters = array(
	'GROUPS' => array(
	),
	'PARAMETERS'  =>  array(
		
		'CACHE_TIME' => Array(
			'DEFAULT' => 3600,
		),
		
	),
);
