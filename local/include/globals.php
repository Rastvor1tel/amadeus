<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (CSite::InGroup(GROUP_ID_OPT)) {
    $GLOBALS["IBLOCK_TYPE"] = "1c_catalog";
    $GLOBALS["IBLOCK_ID"] = 28;
    $GLOBALS["PRICE_TYPE"] = "сайт";
} else {
    $GLOBALS["IBLOCK_TYPE"] = "1c_catalog";
    $GLOBALS["IBLOCK_ID"] = 32;
    $GLOBALS["PRICE_TYPE"] = "Розничная цена";
}

if ($_COOKIE['roleValue'] == 'opt') {
    $GLOBALS['PHONE'] = COption::GetOptionString('grain.customsettings', 'phone-opt');
} elseif ($_COOKIE['roleValue'] == 'rozn') {
    $GLOBALS['PHONE'] = COption::GetOptionString('grain.customsettings', 'phone-rozn');
} else {
    if (CSite::InGroup(GROUP_ID_OPT))
        $GLOBALS['PHONE'] = COption::GetOptionString('grain.customsettings', 'phone-opt');
    else
        $GLOBALS['PHONE'] = COption::GetOptionString('grain.customsettings', 'phone-rozn');
}

$GLOBALS['ADRESS'] = COption::GetOptionString('grain.customsettings','adress');
$GLOBALS['WORKING_TIME'] = COption::GetOptionString('grain.customsettings','workingtime');
$GLOBALS['ORGANISATION'] = COption::GetOptionString('grain.customsettings','name');
$GLOBALS['LOCATION'] = COption::GetOptionString('grain.customsettings','coordinates');
