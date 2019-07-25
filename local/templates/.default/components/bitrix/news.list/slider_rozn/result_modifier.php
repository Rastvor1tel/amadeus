<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arSection = CIBlockSection::GetList([], ['IBLOCK_ID' => $arResult['SECTION']['PATH'][0]['IBLOCK_ID'], 'ID' => $arResult['SECTION']['PATH'][0]['ID']], false, ['UF_*'], false)->Fetch();

$arResult['SLIDER'] = [
    'TITLE' => $arSection['UF_TITLE'],
    'SUBTITLE' => $arSection['UF_SUBTITLE'],
    'LINK' => $arSection['UF_LINK']
];