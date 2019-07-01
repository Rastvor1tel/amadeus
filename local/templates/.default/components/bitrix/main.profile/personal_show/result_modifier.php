<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arResult['arUser']['FIO'] = $arResult['arUser']['NAME'].' '.$arResult['arUser']['SECOND_NAME'].' '.$arResult['arUser']['LAST_NAME'];
$arResult['arUser']['PHOTO'] = CFile::ResizeImageGet($arResult['arUser']['PERSONAL_PHOTO'], ['width'=>500, 'height'=>500], BX_RESIZE_IMAGE_EXACT, true)['src'];
$arResult['EDIT_LINK'] = '/personal/private/';
if ($arResult['arUser']['PERSONAL_GENDER']) {
    if ($arResult['arUser']['PERSONAL_GENDER'] == 'M')
        $arResult['arUser']['GENDER'] = 'Мужской';
    else
        $arResult['arUser']['GENDER'] = 'Женский';
}
?>