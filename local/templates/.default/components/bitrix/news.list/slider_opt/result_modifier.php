<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arSection = CIBlockSection::GetList([], ['IBLOCK_ID' => $arResult['SECTION']['PATH'][0]['IBLOCK_ID'], 'ID' => $arResult['SECTION']['PATH'][0]['ID']], false, ['UF_*'], false)->Fetch();

$arResult['SLIDER'] = [
    'TITLE' => 'Трикотажная одежда',
    'SUBTITLE' => 'Интернет-магазин',
    'LINK' => '/catalog/'
];