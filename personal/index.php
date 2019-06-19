<?
define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

if (isset($_REQUEST["backurl"]) && strlen($_REQUEST["backurl"]) > 0)
    LocalRedirect($backurl);

$APPLICATION->SetTitle("Личный кабинет");
?>

<? $APPLICATION->IncludeComponent(
    "bitrix:sale.personal.section",
    "personal",
    Array(
        "ACCOUNT_PAYMENT_ELIMINATED_PAY_SYSTEMS" => array(0 => "0",),
        "ACCOUNT_PAYMENT_PERSON_TYPE" => "1",
        "ACCOUNT_PAYMENT_SELL_SHOW_FIXED_VALUES" => "Y",
        "ACCOUNT_PAYMENT_SELL_TOTAL" => array(0 => "100", 1 => "200", 2 => "500", 3 => "1000", 4 => "5000", 5 => "",),
        "ACCOUNT_PAYMENT_SELL_USER_INPUT" => "Y",
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "ALLOW_INNER" => "N",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "3600",
        "CACHE_TYPE" => "A",
        "CHECK_RIGHTS_PRIVATE" => "N",
        "COMPATIBLE_LOCATION_MODE_PROFILE" => "N",
        "CUSTOM_PAGES" => "",
        "CUSTOM_SELECT_PROPS" => array(""),
        "MAIN_CHAIN_NAME" => "",
        "NAV_TEMPLATE" => "",
        "ONLY_INNER_FULL" => "N",
        "ORDERS_PER_PAGE" => "20",
        "ORDER_DEFAULT_SORT" => "STATUS",
        "ORDER_HIDE_USER_INFO" => array("0"),
        "ORDER_HISTORIC_STATUSES" => array("F"),
        "ORDER_REFRESH_PRICES" => "N",
        "ORDER_RESTRICT_CHANGE_PAYSYSTEM" => array("0"),
        "PATH_TO_BASKET" => "/personal/cart",
        "PATH_TO_CATALOG" => "/catalog/",
        "PATH_TO_CONTACT" => "/contacts/",
        "PATH_TO_PAYMENT" => "/personal/order/payment",
        "PER_PAGE" => "20",
        "PROFILES_PER_PAGE" => "20",
        "PROP_1" => array(),
        "PROP_2" => array(),
        "SAVE_IN_SESSION" => "Y",
        "SEF_FOLDER" => "/personal/",
        "SEF_MODE" => "Y",
        "SEF_URL_TEMPLATES" => Array("account" => "account/", "index" => "index.php", "order_cancel" => "cancel/#ID#", "order_detail" => "orders/#ID#", "orders" => "orders/", "private" => "private/", "profile" => "profile/", "profile_detail" => "profiles/#ID#", "subscribe" => "subscribe/"),
        "SEND_INFO_PRIVATE" => "N",
        "SET_TITLE" => "Y",
        "SHOW_ACCOUNT_COMPONENT" => "Y",
        "SHOW_ACCOUNT_PAGE" => "Y",
        "SHOW_ACCOUNT_PAY_COMPONENT" => "Y",
        "SHOW_BASKET_PAGE" => "Y",
        "SHOW_CONTACT_PAGE" => "Y",
        "SHOW_ORDER_PAGE" => "Y",
        "SHOW_PRIVATE_PAGE" => "Y",
        "SHOW_PROFILE_PAGE" => "Y",
        "SHOW_SUBSCRIBE_PAGE" => "Y",
        "USER_PROPERTY_PRIVATE" => "",
        "USE_AJAX_LOCATIONS_PROFILE" => "N"
    )
); ?><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>