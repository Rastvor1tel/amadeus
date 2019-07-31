<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arResult['PREVIEW_PICTURE']['SRC'] = CFile::ResizeImageGet($arResult['PREVIEW_PICTURE'], array('width'=>500, 'height'=>690), BX_RESIZE_IMAGE_PROPORTIONAL, true)['src'];
$arResult['PRICE'] = CCurrencyLang::CurrencyFormat(getMinOffersPrice($arResult['OFFERS']), 'RUB');