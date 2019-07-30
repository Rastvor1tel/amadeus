<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (CSite::InGroup(GROUP_ID_OPT)) {
    $GLOBALS["IBLOCK_TYPE"] = "1c_catalog";
    $GLOBALS["IBLOCK_ID"] = 28;
    $GLOBALS["PRICE_TYPE"] = "сайт";
    $GLOBALS['PHONE'] = COption::GetOptionString('grain.customsettings','phone-opt');
} else {
    $GLOBALS["IBLOCK_TYPE"] = "catalog";
    $GLOBALS["IBLOCK_ID"] = 2;
    $GLOBALS["PRICE_TYPE"] = "Розничная цена";
    $GLOBALS['PHONE'] = COption::GetOptionString('grain.customsettings','phone-rozn');
}

$GLOBALS['ADRESS'] = COption::GetOptionString('grain.customsettings','adress');
$GLOBALS['WORKING_TIME'] = COption::GetOptionString('grain.customsettings','workingtime');
$GLOBALS['ORGANISATION'] = COption::GetOptionString('grain.customsettings','name');
$GLOBALS['LOCATION'] = COption::GetOptionString('grain.customsettings','coordinates');
