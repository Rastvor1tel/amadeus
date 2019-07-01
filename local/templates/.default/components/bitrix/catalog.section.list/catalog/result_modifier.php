<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$parentSection = 0;
foreach ($arResult['SECTIONS'] as $key => $arSection) {
    if ($arSection['DEPTH_LEVEL'] == 1) {
        $parentSection = $key;
    } else {
        $arResult['SECTIONS'][$parentSection]['SUBSECTIONS'][] = $arSection;
        unset($arResult['SECTIONS'][$key]);
    }
}
$arResult['SECTIONS'] = array_values($arResult['SECTIONS']);
