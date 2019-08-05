<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$parentSection = 0;
foreach ($arResult['SECTIONS'] as $key => &$arSection) {
    if ($arSection['DEPTH_LEVEL'] == 1) {
        if ($arSection['SECTION_PAGE_URL'] == $APPLICATION->GetCurPage(false)) $arSection['CUR_SECTION'] = 'Y';
        $parentSection = $key;
    } else {
        if ($arSection['SECTION_PAGE_URL'] == $APPLICATION->GetCurPage(false)) {
            $arSection['CUR_SECTION'] = 'Y';
            $arResult['SECTIONS'][$parentSection]['CUR_SECTION'] = 'Y';
        }
        $arResult['SECTIONS'][$parentSection]['SUBSECTIONS'][] = $arSection;
        unset($arResult['SECTIONS'][$key]);
    }
}
$arResult['SECTIONS'] = array_values($arResult['SECTIONS']);
