<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $searchQuery;

function searchHighlight($searchQuery, $text) {
    $titleCase = mb_convert_case($searchQuery, MB_CASE_TITLE, "UTF-8");
    $lowerCase = strtolower($searchQuery);
    $result = str_replace( $lowerCase, '<span>'.$lowerCase.'</span>', $text);
    $result = str_replace($titleCase, '<span>'.$titleCase.'</span>', $result);
    return $result;
}

foreach ($arResult['ITEMS'] as &$arItem) {
    $arItem['PREVIEW_PICTURE']['SRC'] = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array('width'=>500, 'height'=>690), BX_RESIZE_IMAGE_PROPORTIONAL, true)['src'];
    $arItem['PRICE'] = CCurrencyLang::CurrencyFormat(getMinOffersPrice($arItem['OFFERS']), 'RUB');
    $arItem['~NAME'] = searchHighlight($searchQuery, $arItem['NAME']);
    $arItem['~DETAIL_TEXT'] = TruncateText(searchHighlight($searchQuery, $arItem['DETAIL_TEXT']), 150);
}
