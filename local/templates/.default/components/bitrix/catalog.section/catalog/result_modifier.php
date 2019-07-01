<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach ($arResult['ITEMS'] as &$arItem) {
    $arItem['PREVIEW_PICTURE']['SRC'] = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array('width'=>500, 'height'=>690), BX_RESIZE_IMAGE_PROPORTIONAL, true)['src'];
    //print_r($arItem['OFFERS']);
    $arItem['PRICE'] = CCurrencyLang::CurrencyFormat(getMinOffersPrice($arItem['OFFERS']), 'RUB');
}
