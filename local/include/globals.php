<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (CSite::InGroup(GROUP_ID_OPT)) {
    $GLOBALS["IBLOCK_TYPE"] = "1c_catalog";
    $GLOBALS["IBLOCK_ID"] = 36;
    $GLOBALS["PRICE_TYPE"] = "Розничная цена";
    $GLOBALS["PRICE_ID"] = 4;
} else {
    $GLOBALS["IBLOCK_TYPE"] = "1c_catalog";
    $GLOBALS["IBLOCK_ID"] = 28;
    $GLOBALS["PRICE_TYPE"] = "Розничная цена";
    $GLOBALS["PRICE_ID"] = 4;
}

if ($_COOKIE['roleValue'] == 'opt') {
    $GLOBALS['PHONE'] = COption::GetOptionString('grain.customsettings', 'phone-opt');
    $GLOBALS['VIBER'] = COption::GetOptionString('grain.customsettings','viber-opt');
    $GLOBALS['WHATSAPP'] = COption::GetOptionString('grain.customsettings','whatsapp-opt');
} elseif ($_COOKIE['roleValue'] == 'rozn') {
    $GLOBALS['PHONE'] = COption::GetOptionString('grain.customsettings', 'phone-rozn');
    $GLOBALS['VIBER'] = COption::GetOptionString('grain.customsettings','viber');
    $GLOBALS['WHATSAPP'] = COption::GetOptionString('grain.customsettings','whatsapp');
} else {
    if (CSite::InGroup(GROUP_ID_OPT)) {
        $GLOBALS['PHONE'] = COption::GetOptionString('grain.customsettings', 'phone-opt');
        $GLOBALS['VIBER'] = COption::GetOptionString('grain.customsettings', 'viber-opt');
        $GLOBALS['WHATSAPP'] = COption::GetOptionString('grain.customsettings','whatsapp-opt');
    } else {
        $GLOBALS['PHONE'] = COption::GetOptionString('grain.customsettings', 'phone-rozn');
        $GLOBALS['VIBER'] = COption::GetOptionString('grain.customsettings', 'viber');
        $GLOBALS['WHATSAPP'] = COption::GetOptionString('grain.customsettings','whatsapp');
    }
}

$GLOBALS['TELEGRAM'] = COption::GetOptionString('grain.customsettings','telegram');
$GLOBALS['ADRESS'] = COption::GetOptionString('grain.customsettings','adress');
$GLOBALS['WORKING_TIME'] = COption::GetOptionString('grain.customsettings','workingtime');
$GLOBALS['ORGANISATION'] = COption::GetOptionString('grain.customsettings','name');
$GLOBALS['LOCATION'] = COption::GetOptionString('grain.customsettings','coordinates');

//importOffersPrice();